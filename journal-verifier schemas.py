"""
Pydantic models describing the API's request and response shapes.
Keeping these separate makes the contract with the frontend explicit
and gives FastAPI automatic request validation + OpenAPI docs.
"""
from typing import List, Optional
from pydantic import BaseModel, Field


class VerifyRequest(BaseModel):
    journal_name: str = Field(..., min_length=2, description="Name of the journal as given by the user")
    journal_url: str = Field(..., min_length=4, description="URL the user was pointed to / is unsure about")


class Evidence(BaseModel):
    category: str          # "predatory" | "hijacked" | "cloned" | "legitimate" | "info"
    severity: str           # "high" | "medium" | "low" | "positive" | "info"
    message: str


class SourceCheck(BaseModel):
    source: str
    status: str              # "match" | "mismatch" | "not_found" | "error" | "not_checked"
    detail: str


class VerifyResponse(BaseModel):
    journal_name: str
    submitted_url: str
    probabilities: dict            # {predatory, hijacked, cloned, legitimate} -> float (0-100)
    verdict: str                    # human readable headline verdict
    evidence: List[Evidence]
    source_checks: List[SourceCheck]
    original_journal_url: Optional[str] = None
    original_url_confidence: Optional[str] = None   # "high" | "medium" | "low" | "unknown"
    scraped_ok: bool
    notes: List[str] = []
