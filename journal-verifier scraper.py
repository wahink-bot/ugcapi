"""
Scraper module.

Fetches the submitted journal URL and pulls out the raw signals the
scoring engine needs: ISSN, publisher/contact info, editorial board
mentions, indexing claims, APC disclosure, review-time claims, and
basic text-quality signals.

This module never raises on a "soft" failure (bad HTML, timeout, etc.)
- it always returns a ScrapeResult, with `ok=False` and an `error`
message if the page could not be retrieved, so the rest of the
pipeline can still run on whatever partial data is available.
"""
import re
import time
from dataclasses import dataclass, field
from typing import List, Optional
from urllib.parse import urlparse

import requests
from bs4 import BeautifulSoup

USER_AGENT = (
    "Mozilla/5.0 (compatible; JournalVerificationBot/1.0; "
    "+https://example.org/bot-info)"
)

ISSN_RE = re.compile(r"\b(\d{4}-\d{3}[\dxX])\b")
EMAIL_RE = re.compile(r"[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}")

INDEXING_KEYWORDS = [
    "scopus", "web of science", "wos", "pubmed", "medline", "doaj",
    "ebsco", "proquest", "index copernicus", "google scholar",
]

FAST_REVIEW_RE = re.compile(
    r"(peer[\s-]?review|review process|publication)[^.]{0,40}?"
    r"(\d{1,2})\s*(day|days|hour|hours)\b",
    re.IGNORECASE,
)

IMPACT_FACTOR_RE = re.compile(
    r"impact factor[^.\n]{0,60}?(\d\.\d{1,3})", re.IGNORECASE
)

SOLICITATION_PHRASES = [
    "we are pleased to invite", "call for papers" , "submit your manuscript today",
    "guaranteed publication", "fast track review", "rapid publication",
    "publish within", "no rejection",
]

EDITORIAL_HEADERS = ["editorial board", "editor-in-chief", "editorial team", "our editors"]


@dataclass
class ScrapeResult:
    ok: bool
    url: str
    final_url: Optional[str] = None
    domain: Optional[str] = None
    status_code: Optional[int] = None
    title: Optional[str] = None
    raw_text: str = ""
    issns_found: List[str] = field(default_factory=list)
    emails_found: List[str] = field(default_factory=list)
    indexing_claims: List[str] = field(default_factory=list)
    editorial_board_mentioned: bool = False
    apc_mentioned: bool = False
    apc_amount_found: Optional[str] = None
    fast_review_claims: List[str] = field(default_factory=list)
    impact_factor_claim: Optional[str] = None
    solicitation_language_found: List[str] = field(default_factory=list)
    has_physical_address_hint: bool = False
    word_count: int = 0
    error: Optional[str] = None


def _domain_of(url: str) -> str:
    netloc = urlparse(url).netloc.lower()
    return netloc[4:] if netloc.startswith("www.") else netloc


def scrape_journal_site(url: str, timeout: int = 12) -> ScrapeResult:
    if not url.startswith(("http://", "https://")):
        url = "https://" + url

    try:
        resp = requests.get(
            url,
            headers={"User-Agent": USER_AGENT},
            timeout=timeout,
            allow_redirects=True,
        )
    except requests.RequestException as exc:
        return ScrapeResult(ok=False, url=url, error=f"Could not reach site: {exc}")

    if resp.status_code >= 400:
        return ScrapeResult(
            ok=False, url=url, status_code=resp.status_code,
            error=f"Site returned HTTP {resp.status_code}",
        )

    soup = BeautifulSoup(resp.text, "html.parser")
    for tag in soup(["script", "style", "noscript"]):
        tag.decompose()
    text = " ".join(soup.get_text(separator=" ").split())
    lower = text.lower()

    title_tag = soup.find("title")
    title = title_tag.get_text(strip=True) if title_tag else None

    issns = sorted(set(ISSN_RE.findall(text)))
    emails = sorted(set(EMAIL_RE.findall(text)))

    indexing_claims = [kw for kw in INDEXING_KEYWORDS if kw in lower]

    editorial_mentioned = any(h in lower for h in EDITORIAL_HEADERS)

    apc_mentioned = "article processing charge" in lower or "apc" in lower or "publication fee" in lower
    apc_amount = None
    apc_amount_match = re.search(r"(usd|\$|eur|€|inr|₹)\s?\d{2,5}", lower)
    if apc_amount_match:
        apc_amount = apc_amount_match.group(0)

    fast_review = [f"{m.group(2)} {m.group(3)}" for m in FAST_REVIEW_RE.finditer(text)]

    impact_match = IMPACT_FACTOR_RE.search(text)
    impact_factor_claim = impact_match.group(1) if impact_match else None

    solicitation_found = [p for p in SOLICITATION_PHRASES if p in lower]

    address_hint = bool(re.search(r"\b\d{1,5}\s+\w+\s+(street|st\.|avenue|ave\.|road|rd\.|suite|floor)\b", lower))

    return ScrapeResult(
        ok=True,
        url=url,
        final_url=resp.url,
        domain=_domain_of(resp.url),
        status_code=resp.status_code,
        title=title,
        raw_text=text[:20000],  # cap stored text
        issns_found=issns,
        emails_found=emails,
        indexing_claims=indexing_claims,
        editorial_board_mentioned=editorial_mentioned,
        apc_mentioned=apc_mentioned,
        apc_amount_found=apc_amount,
        fast_review_claims=fast_review,
        impact_factor_claim=impact_factor_claim,
        solicitation_language_found=solicitation_found,
        has_physical_address_hint=address_hint,
        word_count=len(text.split()),
    )
