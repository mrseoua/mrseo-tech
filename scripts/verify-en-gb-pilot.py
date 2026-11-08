#!/usr/bin/env python3
"""Safeguards for the first en-GB commercial-copy adaptation batch.

Other locales, route inventory, page structure and SEO are checked by the
existing international theme and WordPress-browser regression workflows.
"""
from pathlib import Path
import json
import re

root = Path(__file__).resolve().parents[1] / "wp-content/themes/mrseo-tech"
source = (root / "inc/uk-market-core-content.php").read_text(encoding="utf-8")
match = re.search(r"MRSEO_UK_CORE'\s*\n([\s\S]*?)\nMRSEO_UK_CORE;", source)
assert match, "Missing en-GB content inventory"
data = json.loads(match.group(1))
assert len(data) == 7, "Existing UK core route count changed"
pilot = ("seo", "seo-audit", "google-ads", "analytics")
boilerplate = (
    "Identify what the available evidence shows.",
    "Check how this affects the customer journey.",
    "Agree a testable correction or next step.",
    "A clearly defined deliverable for the agreed scope.",
    "Recommendations grounded in the review.",
    "A way to check the work and identify limitations.",
    "Establish the commercial goal and current constraints.",
    "Review the relevant accounts, pages and settings.",
    "Agree changes that can be safely implemented.",
    "Validate the outcome and document next steps.",
)
for slug in pilot:
    page = data[slug]
    assert page["title"] and page["desc"] and len(page["hero"]) == 2
    assert len(page["problems"]) == 3 and all(len(p) == 3 for p in page["problems"])
    assert len(page["process"]) == 4 and all(len(p) == 2 for p in page["process"])
    assert len(page["outcomes"]) == 3 and all(len(p) == 2 for p in page["outcomes"])
    assert len(page["faq"]) >= 3 and page["cta"]
    body = json.dumps([page["problems"], page["process"], page["outcomes"]])
    for generic in boilerplate:
        assert generic not in body, f"Generic content remains in {slug}: {generic}"
    details = [*([p[1] for p in page["problems"]]),
               *([p[2] for p in page["problems"]]),
               *([p[1] for p in page["process"]]),
               *([p[1] for p in page["outcomes"]])]
    assert all(len(text.strip()) >= 40 for text in details), f"Uninformative copy in {slug}"
    assert len(set(details)) == len(details), f"Duplicated text in {slug}"

assert "implementation is scoped separately" in json.dumps(data["seo-audit"]).lower()
assert "conversions" in json.dumps(data["google-ads"]).lower()
assert "ga4" in json.dumps(data["analytics"]).lower()
print("en-GB pilot PASS: 4 distinct client-intent pages, specific pains/actions/outputs, no generic boilerplate")
