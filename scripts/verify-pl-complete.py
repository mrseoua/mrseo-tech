#!/usr/bin/env python3
"""Regression checks for 25 real Polish menu services and their unique content."""
import json
import re
from pathlib import Path

root = Path(__file__).resolve().parents[1] / "wp-content/themes/mrseo-tech"

def source(path):
    return (root / path).read_text(encoding="utf-8")

def extract(path, marker):
    raw = source(path)
    match = re.search(r"<<<'" + re.escape(marker) + r"'\n([\s\S]*?)\n" + re.escape(marker) + r"(?:;|\n)", raw)
    assert match, (path, "missing data")
    return json.loads(match.group(1))

data = {
    **extract("inc/pl-service-content.php", "MRSEO_PL_SERVICES"),
    **extract("inc/pl-next-services.php", "MRSEO_PL_NEXT"),
    **extract("inc/pl-final-services.php", "MRSEO_PL_FINAL"),
}
assert len(data) == 21, ("Polish original page count", len(data))
assert len(set(data)) == len(data)
titles, descriptions, leads, introductions = [], [], [], []
for slug, page in data.items():
    assert re.fullmatch(r"[a-z0-9]+(?:-[a-z0-9]+)*", slug), slug
    for key in ("title", "description", "kicker", "lead", "intro", "introText", "cta", "risk"):
        assert len(page[key].strip()) >= 12, (slug, key)
    assert len(page["description"]) <= 195, (slug, "meta too long")
    assert len(page["hero"]) == 2 and all(page["hero"]), (slug, "hero")
    assert len(page["problems"]) == 3 and all(len(x) == 3 for x in page["problems"]), (slug, "problems")
    assert len(page["process"]) == 4 and all(len(x) == 2 for x in page["process"]), (slug, "process")
    assert len(page["outcomes"]) == 3 and all(len(x) == 2 for x in page["outcomes"]), (slug, "outcomes")
    assert len(page["faq"]) >= 3 and all(len(x) == 2 for x in page["faq"]), (slug, "FAQ")
    assert len(page["example"]) == 4 and "PRZYKŁADOWA" in page["example"][0], (slug, "demonstration")
    assert len(page["visual"]) == 3 and len(set(page["visual"])) == 3, (slug, "scene")
    assert len(page["related"]) == 2 and all(len(x) == 3 for x in page["related"]), (slug, "links")
    assert all(x[0] != slug for x in page["related"]), (slug, "self links")
    assert not any(word in (page["lead"] + page["risk"]).lower() for word in ("gwarantujemy pierwsze", "100% skuteczności", "biuro w warszawie")), slug
    titles.append(page["title"])
    descriptions.append(page["description"])
    leads.append(page["lead"])
    introductions.append(page["introText"])
assert len(set(titles)) == len(data), "Duplicate Polish page titles"
assert len(set(descriptions)) == len(data), "Duplicate Polish descriptions"
assert len(set(leads)) == len(data), "Duplicate Polish leads"
assert len(set(introductions)) == len(data), "Repeated generic Polish service introduction"

menu = source("inc/mega-menu-trial.php")
found = re.search(r"if\(\$locale==='pl'\)return array\((.*?)\n \);", menu, re.S)
assert found, "Missing Polish routes"
all_links = []
for pillar in ("seo", "ads", "commerce", "sites", "dev"):
    match = re.search(r"'" + pillar + r"'=>array\(([^)]*)\)", found.group(1))
    assert match, pillar
    links = re.findall(r"'([^']+)'", match.group(1))
    assert len(links) == 5, (pillar, links)
    assert all(links), (pillar, "placeholder")
    all_links.extend(links)
assert len(all_links) == len(set(all_links)) == 25, ("Missing/duplicate menu route", all_links)
common = {"seo", "seo-audit", "ecommerce-seo", "google-ads", "web-development"}
assert set(all_links) - set(data) == {"seo-audit", "ecommerce-seo", "google-ads", "web-development"}, "Menu references missing dedicated services"
assert set(data) <= set(all_links), ("Unlinked Polish page", set(data)-set(all_links))
assert "horoshop" not in found.group(1).lower()
assert "mrseo_pl_service_slugs()" in menu
assert "mrseo_pl_service_rules_v2" in source("inc/pl-service-routing.php")
assert "mrseo_pl_final_service_data()" in source("inc/pl-service-content.php")
routing=source("inc/i18n-routing.php")
assert "mrseo_i18n_matching_slug($lang,$slug,'pl')" in routing
assert "mrseo_pl_service_slugs" in routing
seo=source("inc/international-seo.php")
assert "sklepy-woocommerce-shopify" in seo
assert "mrseo_pl_service_slugs" in seo
functions=source("functions.php")
assert "X-Robots-Tag: noindex, nofollow" in functions
assert source("pl-service-landing.php").count("<h1 ") == 1
print(f"PL complete PASS: {len(data)} original Polish landings + 4 existing core = 25 distinct menu services, unique copy, SEO and noindex")
