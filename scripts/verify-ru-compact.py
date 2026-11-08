#!/usr/bin/env python3
"""Read-only regression guard for 8 RU core + 12 specialist service routes.

Check rendered-template structure, copy inventory and locale scoping. WordPress
browser preview handles actual DOM/viewport interaction and SEO checks.
"""
from pathlib import Path
import json
import re

root = Path(__file__).resolve().parents[1] / "wp-content/themes/mrseo-tech"

def read(path):
    return (root / path).read_text(encoding="utf-8")

def raw_json(path, marker):
    body = read(path)
    match = re.search(re.escape(marker) + r"'\s*\n([\s\S]*?)\n" + re.escape(marker) + r";", body)
    assert match, f"Missing JSON marker {marker} in {path}"
    return json.loads(match.group(1))

core = raw_json("inc/ru-premium-content.php", "MRSEO_RU_PREMIUM")
expected_core = {"seo", "seo-audit", "ecommerce-seo", "google-ads",
                 "performance-max", "analytics", "service-websites", "horoshop"}
assert set(core) == expected_core, ("Russian core routes changed", sorted(core))
journeys = json.loads(read("assets/customer-journeys.json"))["pages"]
for slug in expected_core:
    data = core[slug]
    assert len(data["headline"]) == 2 and data["cta"], slug
    assert len(data["deliveries"]) == 3, slug
    assert len(journeys[slug]["ru"]["stories"]) == 3, slug
    assert all(len(story) == 4 for story in journeys[slug]["ru"]["stories"]), slug
    assert all(item[0] and item[1] for item in data["deliveries"]), slug
    assert data["related"][1] in expected_core | {"web-development"}, slug

parts = (
    raw_json("inc/new-service-copy-part1.php", "MRSEO_NEW_SERVICE_P1"),
    raw_json("inc/new-service-copy-part2.php", "MRSEO_NEW_SERVICE_P2"),
    raw_json("inc/new-service-copy-part3.php", "MRSEO_NEW_SERVICE_P3"),
)
specialist = {}
for part in parts:
    assert len(part) == 4
    specialist.update(part)
assert len(specialist) == 12
for slug, item in specialist.items():
    assert item["ru"]["title"] and len(item["ru"]["head"]) == 2, slug
    assert len(item["ru"]["problems"]) == 3, slug
    assert len(item["ru"]["outcomes"]) == 3, slug
    assert len(item["ru"]["faq"]) >= 2, slug
    assert all(len(p) == 3 and all(p) for p in item["ru"]["problems"]), slug
    assert len({x for x in item["ru"]["outcomes"]}) == 3, slug
    assert item["uk"]["title"], ("Ukrainian translation removed", slug)

core_template = read("ru-premium-page.php")
micro_template = read("new-service-landing.php")
for label, body in (("core", core_template), ("specialist", micro_template)):
    assert body.count("<h1 ") == 1, label
    assert "ukseo-hero" in body and "ukseo-cases" in body, label
    assert "ukseo-delivery" in body and "ukseo-faq" in body, label
    assert "ukseo-final" in body and "mrseo_url('contact')" in body, label
    assert not any(x in body for x in ("ukseo-decision", "ukseo-work", "ukseo-proof")), label
    assert body.index("ukseo-cases") < body.index("ukseo-delivery") < body.index("ukseo-faq") < body.index("ukseo-final"), label

assert "mrseo_render_motion_scene($slug,'ru')" in core_template
assert "ru-horoshop-brand" in core_template and "horoshop-partner-active.svg" in core_template
assert "ru-compact-next" in core_template and "mrseo_url('portfolio')" in core_template
assert "ns-page--compact" in micro_template
assert micro_template.count("<?php if($ru): ?>") == 1
assert "<nav class=\"ns-related\"" not in micro_template
assert "mrseo_ru_service_ux($slug,$lang)" in micro_template
assert 'data-service-group="' in micro_template

css = read("assets/ru-services-compact.css")
assert ".ru-premium" in css and ".ns-page--compact" in css
assert "@media(max-width:480px)" in css and "prefers-reduced-motion:reduce" in css
assert ".orbit" not in css and ".site-header" not in css

funcs = read("functions.php")
assert "mrseo-ru-services-compact" in funcs
assert "if(mrseo_locale()==='ru' && (in_array(mrseo_slug(),$ru_core_slugs,true)" in funcs
assert "X-Robots-Tag: noindex, nofollow" in funcs
assert "mrseo_locale()==='ru'" in funcs and "ruDescriptions" in funcs

routes = read("inc/i18n-routing.php")
assert "$ruTitles=array(" in routes
for slug in ("service-websites", "google-ads", "analytics"):
    assert "'" + slug + "'=>" in funcs and "'" + slug + "'=>" in routes
assert "Нужны заявки и продажи из Google?" in json.dumps(core["google-ads"],ensure_ascii=False)
assert "Какие каналы дают реальные заявки и продажи?" in json.dumps(core["analytics"],ensure_ascii=False)
assert "Нужен сайт для услуг?" in json.dumps(core["service-websites"],ensure_ascii=False)

footer = read("footer.php")
assert "mrseo_locale()==='ru'?'Аналитика'" in footer
assert "mrseo_locale()==='ru'?'SEO-аудит'" in footer
assert "Horoshop" not in read("assets/ru-services-compact.css")

print("RU compact PASS: 8 core + 12 specialist services, one themed hero per page, 3 problems, 3 outputs, CTA, distinct intents, noindex")
