"""
Verification module.

Wraps calls to authoritative, freely-queryable sources:

  - DOAJ (Directory of Open Access Journals) public search API
  - Crossref journals API (resolves ISSN -> official title/publisher)
  - WHOIS (domain registration age / registrant country)
  - Fuzzy name/domain matching against DOAJ candidates (typosquat / clone check)

Every function degrades gracefully: on network failure or "not found"
it returns a structured result with status="error"/"not_found" rather
than raising, so a missing third-party source never crashes a request.
"""
import re
from dataclasses import dataclass, field
from datetime import datetime, timezone
from typing import List, Optional
from urllib.parse import urlparse

import requests

try:
    import whois as pywhois  # python-whois
except ImportError:  # pragma: no cover
    pywhois = None

try:
    from rapidfuzz import fuzz
except ImportError:  # pragma: no cover
    fuzz = None

DOAJ_SEARCH_URL = "https://doaj.org/api/search/journals/{query}"
CROSSREF_JOURNAL_URL = "https://api.crossref.org/journals/{issn}"
REQUEST_TIMEOUT = 10


def _domain_of(url: str) -> str:
    if not url:
        return ""
    if not url.startswith(("http://", "https://")):
        url = "https://" + url
    netloc = urlparse(url).netloc.lower()
    return netloc[4:] if netloc.startswith("www.") else netloc


@dataclass
class DoajMatch:
    title: str
    issn: Optional[str]
    eissn: Optional[str]
    publisher: Optional[str]
    homepage_url: Optional[str]
    in_doaj: bool = True


@dataclass
class DoajResult:
    ok: bool
    matches: List[DoajMatch] = field(default_factory=list)
    error: Optional[str] = None


def query_doaj(journal_name: str) -> DoajResult:
    """Search DOAJ by journal name. Returns up to a handful of best matches."""
    try:
        resp = requests.get(
            DOAJ_SEARCH_URL.format(query=requests.utils.quote(journal_name)),
            timeout=REQUEST_TIMEOUT,
        )
        resp.raise_for_status()
        data = resp.json()
    except requests.RequestException as exc:
        return DoajResult(ok=False, error=str(exc))
    except ValueError as exc:
        return DoajResult(ok=False, error=f"Bad JSON from DOAJ: {exc}")

    matches = []
    for item in data.get("results", [])[:8]:
        bibjson = item.get("bibjson", {}) or {}
        issns = {i.get("type"): i.get("id") for i in bibjson.get("identifier", []) or []}
        links = bibjson.get("link", []) or []
        homepage = next((l.get("url") for l in links if l.get("type") == "homepage"), None)
        matches.append(
            DoajMatch(
                title=bibjson.get("title", ""),
                issn=issns.get("pissn"),
                eissn=issns.get("eissn"),
                publisher=(bibjson.get("publisher") or {}).get("name"),
                homepage_url=homepage,
            )
        )
    return DoajResult(ok=True, matches=matches)


@dataclass
class CrossrefResult:
    ok: bool
    found: bool = False
    title: Optional[str] = None
    publisher: Optional[str] = None
    error: Optional[str] = None


def query_crossref_by_issn(issn: str) -> CrossrefResult:
    try:
        resp = requests.get(CROSSREF_JOURNAL_URL.format(issn=issn), timeout=REQUEST_TIMEOUT)
        if resp.status_code == 404:
            return CrossrefResult(ok=True, found=False)
        resp.raise_for_status()
        data = resp.json()
    except requests.RequestException as exc:
        return CrossrefResult(ok=False, error=str(exc))
    except ValueError as exc:
        return CrossrefResult(ok=False, error=f"Bad JSON from Crossref: {exc}")

    msg = data.get("message", {})
    return CrossrefResult(
        ok=True,
        found=True,
        title=msg.get("title"),
        publisher=msg.get("publisher"),
    )


@dataclass
class WhoisResult:
    ok: bool
    domain: str
    creation_date: Optional[datetime] = None
    registrant_country: Optional[str] = None
    age_days: Optional[int] = None
    error: Optional[str] = None


def query_whois(url_or_domain: str) -> WhoisResult:
    domain = _domain_of(url_or_domain) or url_or_domain
    if pywhois is None:
        return WhoisResult(ok=False, domain=domain, error="python-whois not installed")
    try:
        w = pywhois.whois(domain)
    except Exception as exc:  # whois lib raises many custom/broad exceptions
        return WhoisResult(ok=False, domain=domain, error=str(exc))

    creation = w.creation_date
    if isinstance(creation, list):
        creation = creation[0] if creation else None
    age_days = None
    if isinstance(creation, datetime):
        now = datetime.now(timezone.utc)
        creation_cmp = creation if creation.tzinfo else creation.replace(tzinfo=timezone.utc)
        age_days = (now - creation_cmp).days

    country = None
    if hasattr(w, "country"):
        country = w.country if isinstance(w.country, str) else (w.country[0] if w.country else None)

    return WhoisResult(ok=True, domain=domain, creation_date=creation, registrant_country=country, age_days=age_days)


def name_similarity(a: str, b: str) -> float:
    """0-100 fuzzy similarity between two strings. Falls back to a crude
    ratio if rapidfuzz isn't available."""
    if not a or not b:
        return 0.0
    if fuzz is not None:
        return float(fuzz.token_sort_ratio(a.lower(), b.lower()))
    a_l, b_l = a.lower(), b.lower()
    shorter, longer = (a_l, b_l) if len(a_l) < len(b_l) else (b_l, a_l)
    return 100.0 if shorter in longer else 0.0


def domain_similarity(a_domain: str, b_domain: str) -> float:
    if not a_domain or not b_domain:
        return 0.0
    a_core = re.sub(r"\.(com|org|net|edu|info|co|io|us|xyz)$", "", a_domain)
    b_core = re.sub(r"\.(com|org|net|edu|info|co|io|us|xyz)$", "", b_domain)
    if fuzz is not None:
        return float(fuzz.ratio(a_core, b_core))
    return 100.0 if a_core == b_core else 0.0
