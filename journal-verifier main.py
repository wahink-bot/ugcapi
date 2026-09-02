"""
FastAPI backend entrypoint.

POST /api/verify  { journal_name, journal_url }  ->  VerifyResponse

Orchestration order:
  1. Scrape the submitted URL.
  2. Query DOAJ for the closest-matching real journal by name.
  3. For every ISSN found on the scraped page, resolve it via Crossref.
  4. Run a WHOIS lookup on the submitted domain.
  5. Hand everything to the scoring engine and return its verdict.

Run with:  uvicorn main:app --reload --port 8000
"""
from typing import Dict

from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware

from schemas import VerifyRequest, VerifyResponse, SourceCheck
from scraper import scrape_journal_site
from verifiers import query_doaj, query_crossref_by_issn, query_whois
from scoring import score_journal

app = FastAPI(
    title="Journal Verification API",
    description="Checks a journal name + URL for predatory / hijacked / cloned risk signals.",
    version="1.0.0",
)

# Wide-open CORS for local development. Restrict this to your real
# frontend origin before deploying publicly.
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_methods=["*"],
    allow_headers=["*"],
)


@app.get("/api/health")
def health():
    return {"status": "ok"}


@app.post("/api/verify", response_model=VerifyResponse)
def verify_journal(req: VerifyRequest):
    journal_name = req.journal_name.strip()
    journal_url = req.journal_url.strip()

    if not journal_name or not journal_url:
        raise HTTPException(status_code=400, detail="journal_name and journal_url are required")

    source_checks = []

    # 1) Scrape
    scrape = scrape_journal_site(journal_url)
    source_checks.append(SourceCheck(
        source="Submitted website",
        status="match" if scrape.ok else "error",
        detail="Fetched and parsed successfully." if scrape.ok else (scrape.error or "Unknown scrape error"),
    ))

    # 2) DOAJ
    doaj = query_doaj(journal_name)
    if doaj.ok:
        source_checks.append(SourceCheck(
            source="DOAJ",
            status="match" if doaj.matches else "not_found",
            detail=f"{len(doaj.matches)} candidate title(s) returned." if doaj.matches
                   else "No matching titles found in DOAJ.",
        ))
    else:
        source_checks.append(SourceCheck(source="DOAJ", status="error", detail=doaj.error or "DOAJ query failed"))

    # 3) Crossref, once per ISSN found on the page
    crossref_by_issn: Dict[str, object] = {}
    if scrape.ok:
        for issn in scrape.issns_found:
            cr = query_crossref_by_issn(issn)
            crossref_by_issn[issn] = cr
            if cr.ok:
                source_checks.append(SourceCheck(
                    source=f"Crossref (ISSN {issn})",
                    status="match" if cr.found else "not_found",
                    detail=f"Registered to '{cr.title}'." if cr.found else "ISSN not found in Crossref.",
                ))
            else:
                source_checks.append(SourceCheck(
                    source=f"Crossref (ISSN {issn})", status="error", detail=cr.error or "Crossref query failed",
                ))

    # 4) WHOIS
    whois_res = query_whois(journal_url)
    source_checks.append(SourceCheck(
        source="WHOIS",
        status="match" if whois_res.ok else "error",
        detail=f"Domain age data retrieved." if whois_res.ok else (whois_res.error or "WHOIS lookup failed"),
    ))

    # 5) Score
    result = score_journal(
        journal_name=journal_name,
        submitted_url=journal_url,
        scrape=scrape,
        doaj=doaj,
        crossref_by_issn=crossref_by_issn,
        whois_res=whois_res,
    )

    notes = []
    if not scrape.ok:
        notes.append("The submitted page could not be fetched, so several content-based checks were skipped.")
    if not doaj.ok:
        notes.append("DOAJ could not be reached, so name-based cross-referencing was limited.")
    notes.append(
        "This tool produces a heuristic risk assessment, not a legal or definitive determination. "
        "For high-stakes decisions, corroborate with Cabells Predatory Reports, the ISSN Portal, "
        "and the publisher's own official journal list."
    )

    return VerifyResponse(
        journal_name=journal_name,
        submitted_url=journal_url,
        probabilities=result.probabilities,
        verdict=result.verdict,
        evidence=result.evidence,
        source_checks=source_checks,
        original_journal_url=result.original_journal_url,
        original_url_confidence=result.original_url_confidence,
        scraped_ok=scrape.ok,
        notes=notes,
    )
