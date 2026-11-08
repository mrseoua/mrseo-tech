#!/usr/bin/env python3
"""Guard true parity and intent differentiation of thirteen approved RU/UA pairs."""
from pathlib import Path
import json
import re

root = Path(__file__).resolve().parents[1] / "wp-content/themes/mrseo-tech"

def data(path, marker):
    src = (root / path).read_text(encoding="utf-8")
    m = re.search(re.escape(marker) + r"'\s*\n([\s\S]*?)\n" +
                  re.escape(marker) + r";", src)
    assert m, (path, "Missing JSON heredoc")
    return json.loads(m.group(1))

ua = {}
ua.update(data("inc/ua-website-services.php", "MRSEO_UA_WEBSITES"))
ua.update(data("inc/ua-additional-services.php", "MRSEO_UA_ADDITIONAL_JSON"))
ru = {}
ru.update(data("inc/ru-website-services-part1.php", "MRSEO_RU_WEBSITES"))
ru.update(data("inc/ru-website-services-part2.php", "MRSEO_RU_ADDITIONAL"))
assert len(ua) == len(ru) == 13 and set(ua) == set(ru), "13 real UA/RU routes differ"
assert len(set(p["title"] for p in ru.values())) == 13
assert len(set(tuple(p["headline"]) for p in ru.values())) == 13
assert len(set(p["lead"] for p in ru.values())) == 13
assert len(set(p["description"] for p in ru.values())) == 13
assert len(set(p["result"] for p in ru.values())) == 13
assert len(set(p["scene"] for p in ru.values())) == 13
for slug, page in ru.items():
    assert page["scene"] == ua[slug]["scene"], ("Wrong service illustration",slug)
    assert len(page["headline"]) == 2 and all(page["headline"]), slug
    assert len(page["lead"]) >= 125 and len(page["result"]) >= 70, slug
    assert 45 <= len(page["description"]) <= 200, slug
    for field, length in (("pains",3),("benefits",3),("faq",3),("related",2)):
        assert len(page[field]) == length, (slug,field)
        assert all(len(pair) == 2 and all(pair) for pair in page[field]), (slug,field)
    assert all(len(x[0]) > 12 and len(x[1]) > 35 for x in page["pains"]), slug
    assert all(len(x[0]) > 12 and len(x[1]) > 45 for x in page["benefits"]), slug
    assert len(set(p[0] for p in page["faq"])) == 3, slug
    assert "<em>" in page["sectionTitle"] and "<em>" in page["ctaTitle"], slug
    assert page["ctaLead"] and page["button"] and page["scenelabel"], slug
    for destination, _ in page["related"]:
        assert destination in ru or destination in ("seo","seo-audit","ecommerce-seo",
            "google-ads","analytics","service-websites","web-development","horoshop",
            "online-store-development","ga4-conversions"), (slug,destination)
    assert page["title"] != ua[slug]["title"] and page["lead"] != ua[slug]["lead"]

menu = (root / "inc/mega-menu-trial.php").read_text()
m = re.search(r"if\(\$locale==='ru'\)\{\s*// Each service.*?return array\((.*?)\n  \);\n \}", menu,re.S)
assert m, "RU-specific real navigation missing"
route_str = m.group(1)
expected = {"seo":5,"ads":5,"commerce":5,"sites":5,"dev":5}
for key,count in expected.items():
    hit=re.search(r"'" + key + r"'=>array\(([^)]*)\)",route_str)
    assert hit,(key,"missing Russian menu category")
    vals=re.findall(r"'([^']+)'",hit.group(1))
    assert len(vals)==count and "null" not in hit.group(1),(key,"placeholder RU links")
assert "mrseo_ru_website_slugs()" in menu

tmpl = (root / "ua-website-landing.php").read_text()
assert "mrseo_ru_website_route()" in tmpl and "mrseo_ru_website_data(mrseo_slug())" in tmpl
assert "mrseo_render_ua_service_scene($kind,$ru?'ru':'uk')" in tmpl
assert tmpl.count("<h1 ") == 1 and tmpl.count("class=\"ukseo-final uws-final\"") == 1
assert "<nav class=\"uws-related\"" not in tmpl and "wp_trim_words" not in tmpl
scenes = (root / "inc/ua-service-scenes.php").read_text()
assert "if($locale==='ru')$presets=array(" in scenes
assert "if($locale==='ru')" in scenes and "if(!isset($presets[$kind]))return;" in scenes
registry=(root / "inc/ru-website-services.php").read_text()
assert "mrseo_ru_website_route()" in registry and "add_rewrite_rule" in registry
functions=(root/"functions.php").read_text()
assert "require_once get_template_directory() . '/inc/ru-website-services.php';" in functions
assert "mrseo-ru-website-scenes" in functions and "mrseo_ru_website_route()" in functions
assert "X-Robots-Tag: noindex, nofollow" in functions
style=(root/"assets/ru-website-scenes.css").read_text()
assert "@media(max-width:620px)" in style and "prefers-reduced-motion:reduce" in style
assert ".orbit" not in style
print("RU 13-page content + menu + visual parity PASS: 13 distinct services, 25 live menu items, locale-scoped scenes")
