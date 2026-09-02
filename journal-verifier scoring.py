"""
Scoring engine.

Takes the raw scrape + the results of the authoritative-source checks
and turns them into:
  - a list of human-readable Evidence items (each tagged with a
    category and severity)
  - weighted risk points per category (predatory / hijacked / cloned)
  - a normalized probability distribution across
    {predatory, hijacked, cloned, legitimate} that sums to 100

The weights below are a starting rule-based heuristic (documented
inline). They are deliberately conservative: any single weak signal
should not be enough to brand a journal predatory/hijacked - it takes
a combination. Treat this file as the place to plug in a trained
classifier later (see README) without touching the rest of the app.
"""
from dataclasses import dataclass
from typing import List, Optional

from schemas import Evidence
from scraper import ScrapeResult
from verifiers import (
    DoajResult, CrossrefResult, WhoisResult,
    name_similarity, domain_similarity, _domain_of,
)

# --- weights -----------------------------------------------------------
# Each entry: (points, category, severity, message-template)
W = {
    "no_address": 12,
    "apc_hidden": 12,
    "fast_review": 18,
    "unverified_impact_factor": 18,
    "solicitation_language": 10,
    "not_in_doaj_claims_oa": 12,
    "low_word_count": 8,

    "issn_domain_mismatch": 40,
    "domain_recent_but_claims_history": 22,
    "crossref_publisher_mismatch": 20,
    "issn_not_found_anywhere": 10,

    "high_name_sim_low_domain_sim": 30,
    "issn_absent_name_close_match": 25,
    "tld_anomaly": 10,
}

LEGITIMACY_CAP = 100


@dataclass
class ScoreResult:
    probabilities: dict
    evidence: List[Evidence]
    verdict: str
    original_journal_url: Optional[str]
    original_url_confidence: str


def _pts(key: str) -> int:
    return W[key]


def score_journal(
    journal_name: str,
    submitted_url: str,
    scrape: ScrapeResult,
    doaj: DoajResult,
    crossref_by_issn: dict,          # issn -> CrossrefResult
    whois_res: Optional[WhoisResult],
) -> ScoreResult:
    evidence: List[Evidence] = []
    predatory_pts = 0
    hijacked_pts = 0
    cloned_pts = 0

    submitted_domain = _domain_of(submitted_url)

    # ---------------------------------------------------------------
    # 1) Find the best DOAJ match by name, independent of the scrape,
    #    to establish what "the real journal" looks like.
    # ---------------------------------------------------------------
    best_doaj_match = None
    best_name_sim = 0.0
    if doaj.ok:
        for m in doaj.matches:
            sim = name_similarity(journal_name, m.title)
            if sim > best_name_sim:
                best_name_sim = sim
                best_doaj_match = m

    doaj_domain = _domain_of(best_doaj_match.homepage_url) if (best_doaj_match and best_doaj_match.homepage_url) else ""
    dsim = domain_similarity(submitted_domain, doaj_domain) if doaj_domain else 0.0

    original_url = None
    original_confidence = "unknown"

    if best_doaj_match and best_name_sim >= 85:
        if best_doaj_match.homepage_url:
            original_url = best_doaj_match.homepage_url
            original_confidence = "high" if dsim >= 80 else "medium"
        evidence.append(Evidence(
            category="info", severity="info",
            message=f"DOAJ lists a journal named '{best_doaj_match.title}' "
                     f"(similarity {best_name_sim:.0f}%), published by "
                     f"{best_doaj_match.publisher or 'an unlisted publisher'}.",
        ))

        # -- Hijacked check: DOAJ's registered homepage domain differs
        #    from the domain the user was sent to.
        if doaj_domain and submitted_domain and doaj_domain != submitted_domain:
            hijacked_pts += _pts("issn_domain_mismatch")
            evidence.append(Evidence(
                category="hijacked", severity="high",
                message=f"DOAJ's official homepage for this journal is on "
                         f"'{doaj_domain}', but the submitted link points to "
                         f"'{submitted_domain}'. A mismatched official domain is "
                         f"the single strongest hijacking signal.",
            ))
        elif doaj_domain and submitted_domain and doaj_domain == submitted_domain:
            evidence.append(Evidence(
                category="legitimate", severity="positive",
                message=f"Submitted domain '{submitted_domain}' matches DOAJ's "
                         f"registered homepage domain for this title.",
            ))
    elif best_doaj_match and 60 <= best_name_sim < 85:
        # Name is close but not close enough -> possible clone/typosquat of a
        # real DOAJ-listed journal.
        cloned_pts += _pts("issn_absent_name_close_match")
        evidence.append(Evidence(
            category="cloned", severity="medium",
            message=f"The submitted journal name is similar to (but not an exact "
                     f"match for) a DOAJ-listed journal, '{best_doaj_match.title}' "
                     f"(similarity {best_name_sim:.0f}%). This name-similarity "
                     f"pattern is common in cloned/imitation journals.",
        ))
    else:
        evidence.append(Evidence(
            category="info", severity="info",
            message="No sufficiently close name match was found in DOAJ. This "
                     "does not by itself mean the journal is illegitimate - "
                     "many legitimate journals (subscription-based, very new, "
                     "or in fields outside DOAJ's scope) are not DOAJ-listed.",
        ))

    # ---------------------------------------------------------------
    # 2) ISSN cross-checks against Crossref, using ISSNs found on the
    #    scraped page itself.
    # ---------------------------------------------------------------
    if scrape.ok and scrape.issns_found:
        for issn in scrape.issns_found:
            cr: CrossrefResult = crossref_by_issn.get(issn)
            if cr is None or not cr.ok:
                continue
            if not cr.found:
                hijacked_pts += _pts("issn_not_found_anywhere")
                evidence.append(Evidence(
                    category="hijacked", severity="medium",
                    message=f"ISSN {issn} found on the page is not registered "
                             f"in Crossref's records. A real, active journal's "
                             f"ISSN is almost always resolvable.",
                ))
                continue

            evidence.append(Evidence(
                category="info", severity="info",
                message=f"Crossref records ISSN {issn} as belonging to "
                         f"'{cr.title}' (publisher: {cr.publisher or 'unknown'}).",
            ))
            title_sim = name_similarity(journal_name, cr.title or "")
            if title_sim < 60:
                hijacked_pts += _pts("issn_domain_mismatch") // 2
                evidence.append(Evidence(
                    category="hijacked", severity="high",
                    message=f"ISSN {issn} is registered to a different title "
                             f"('{cr.title}') than the journal name submitted "
                             f"('{journal_name}') - a classic sign of a hijacked "
                             f"or cloned ISSN.",
                ))
    elif scrape.ok and not scrape.issns_found:
        evidence.append(Evidence(
            category="predatory", severity="low",
            message="No ISSN could be found anywhere on the submitted page. "
                     "Legitimate journals almost always display their ISSN.",
        ))
        predatory_pts += 6

    # ---------------------------------------------------------------
    # 3) WHOIS domain-age vs claimed history.
    # ---------------------------------------------------------------
    claims_history = False
    if scrape.ok:
        low = scrape.raw_text.lower()
        for year_hint in ("since 19", "since 20", "established in", "founded in"):
            if year_hint in low:
                claims_history = True
                break

    if whois_res and whois_res.ok and whois_res.age_days is not None:
        age_years = whois_res.age_days / 365.0
        evidence.append(Evidence(
            category="info", severity="info",
            message=f"Domain '{whois_res.domain}' was registered approximately "
                     f"{age_years:.1f} years ago.",
        ))
        if age_years < 2 and claims_history:
            hijacked_pts += _pts("domain_recent_but_claims_history")
            evidence.append(Evidence(
                category="hijacked", severity="high",
                message=f"The website claims an established publication history, "
                         f"but the domain itself is only about {age_years:.1f} "
                         f"year(s) old. A young domain paired with claims of a "
                         f"long history is a common hijacking/cloning pattern.",
            ))
        elif age_years < 1:
            predatory_pts += 8
            evidence.append(Evidence(
                category="predatory", severity="medium",
                message=f"The domain is very new (~{age_years:.1f} years old), "
                         f"which alone is not conclusive but is worth weighing "
                         f"alongside other signals.",
            ))
    elif whois_res and not whois_res.ok:
        evidence.append(Evidence(
            category="info", severity="info",
            message=f"WHOIS lookup could not be completed ({whois_res.error}).",
        ))

    # ---------------------------------------------------------------
    # 4) Cloning: domain typosquat pattern check even without a DOAJ
    #    homepage to compare against (TLD anomaly / lookalike chars).
    # ---------------------------------------------------------------
    if submitted_domain:
        suspicious_tld = any(submitted_domain.endswith(t) for t in (".xyz", ".top", ".click", ".online", ".site"))
        if suspicious_tld:
            cloned_pts += _pts("tld_anomaly")
            evidence.append(Evidence(
                category="cloned", severity="low",
                message=f"The domain uses a low-cost/uncommon top-level domain "
                         f"('{submitted_domain.rsplit('.', 1)[-1]}') that is "
                         f"disproportionately common among cloned or throwaway "
                         f"academic scam sites.",
            ))
        if best_doaj_match and doaj_domain and 40 <= dsim < 80:
            cloned_pts += _pts("high_name_sim_low_domain_sim")
            evidence.append(Evidence(
                category="cloned", severity="medium",
                message=f"The submitted domain ('{submitted_domain}') is "
                         f"visually/structurally similar to the journal's "
                         f"official domain ('{doaj_domain}') without being "
                         f"identical - consistent with typosquatting.",
            ))

    # ---------------------------------------------------------------
    # 5) Predatory-practice content signals (independent of hijack/clone).
    # ---------------------------------------------------------------
    if scrape.ok:
        if not scrape.has_physical_address_hint:
            predatory_pts += _pts("no_address")
            evidence.append(Evidence(
                category="predatory", severity="medium",
                message="No verifiable physical/postal address could be found "
                         "on the site.",
            ))
        if scrape.apc_mentioned and not scrape.apc_amount_found:
            predatory_pts += _pts("apc_hidden")
            evidence.append(Evidence(
                category="predatory", severity="medium",
                message="The site mentions an article processing charge (APC) "
                         "but does not clearly state the amount up front.",
            ))
        if scrape.fast_review_claims:
            predatory_pts += _pts("fast_review")
            evidence.append(Evidence(
                category="predatory", severity="high",
                message=f"The site advertises unusually fast peer review/"
                         f"publication turnaround ({', '.join(scrape.fast_review_claims)}). "
                         f"Rigorous peer review of a full manuscript in this "
                         f"timeframe is not realistic.",
            ))
        if scrape.impact_factor_claim:
            predatory_pts += _pts("unverified_impact_factor")
            evidence.append(Evidence(
                category="predatory", severity="high",
                message=f"The site claims an 'impact factor' of "
                         f"{scrape.impact_factor_claim}. Unless this is confirmed "
                         f"via Clarivate's Journal Citation Reports, self-reported "
                         f"impact factors are a strong predatory indicator - "
                         f"several unaccredited agencies sell fake impact-factor "
                         f"certificates.",
            ))
        if scrape.solicitation_language_found:
            predatory_pts += _pts("solicitation_language")
            evidence.append(Evidence(
                category="predatory", severity="low",
                message=f"Promotional/solicitation phrasing was detected on the "
                         f"page ({', '.join(scrape.solicitation_language_found[:3])}).",
            ))
        if scrape.indexing_claims and not doaj.matches:
            predatory_pts += _pts("not_in_doaj_claims_oa")
            evidence.append(Evidence(
                category="predatory", severity="low",
                message=f"The site claims indexing in "
                         f"{', '.join(scrape.indexing_claims)}, but no matching "
                         f"record was found in DOAJ for this journal name. "
                         f"Indexing claims should be verified directly on each "
                         f"index's own site.",
            ))
        if scrape.word_count and scrape.word_count < 150:
            predatory_pts += _pts("low_word_count")
            evidence.append(Evidence(
                category="predatory", severity="low",
                message="The page has very little content, which is atypical "
                         "for an established journal's homepage.",
            ))
    else:
        evidence.append(Evidence(
            category="info", severity="info",
            message=f"The submitted URL could not be scraped ({scrape.error}). "
                     f"Scoring is based only on third-party source checks below.",
        ))

    # ---------------------------------------------------------------
    # Normalize into a probability distribution.
    # ---------------------------------------------------------------
    predatory_pts = min(predatory_pts, LEGITIMACY_CAP)
    hijacked_pts = min(hijacked_pts, LEGITIMACY_CAP)
    cloned_pts = min(cloned_pts, LEGITIMACY_CAP)

    total_risk = predatory_pts + hijacked_pts + cloned_pts
    legitimate_raw = max(5.0, LEGITIMACY_CAP - total_risk * 0.6)

    raw = {
        "predatory": predatory_pts + 1e-6,
        "hijacked": hijacked_pts + 1e-6,
        "cloned": cloned_pts + 1e-6,
        "legitimate": legitimate_raw,
    }
    total = sum(raw.values())
    probabilities = {k: round(v / total * 100, 1) for k, v in raw.items()}

    # fix rounding drift so it sums to exactly 100.0
    drift = round(100.0 - sum(probabilities.values()), 1)
    probabilities["legitimate"] = round(probabilities["legitimate"] + drift, 1)

    top_cat = max(probabilities, key=probabilities.get)
    verdict_map = {
        "predatory": "Likely predatory practices detected",
        "hijacked": "Signs of journal hijacking detected",
        "cloned": "Signs of cloning / imitation detected",
        "legitimate": "No strong red flags found",
    }
    verdict = verdict_map[top_cat]

    return ScoreResult(
        probabilities=probabilities,
        evidence=evidence,
        verdict=verdict,
        original_journal_url=original_url,
        original_url_confidence=original_confidence,
    )
