#!/usr/bin/env python3
"""Verify UA-only Premium Tech Navigation uses actual service routes and safe native disclosures."""
from pathlib import Path
root=Path(__file__).resolve().parents[1]
theme=root/"wp-content/themes/mrseo-tech"
header=(theme/"header.php").read_text(encoding="utf-8")
nav=(theme/"inc/ua-header-six.php").read_text(encoding="utf-8")
css=(theme/"assets/ua-catalog-header.css").read_text(encoding="utf-8")
js=(theme/"assets/site.js").read_text(encoding="utf-8")
functions=(theme/"functions.php").read_text(encoding="utf-8")
taxonomy=(theme/"inc/mega-menu-trial.php").read_text(encoding="utf-8")
nav=nav.split("function mrseo_ua_header_catalog()",1)[1]
assert "mrseo_ua_header_catalog()" in header and "mrseo-ua-mega-header" in header
# The header and category catalogue now share a renderer. Test emitted URLs,
# not the number of PHP statements in a refactored function.
import runpy
checks=runpy.run_path(str(Path(__file__).with_name("category-render-check.py")))
menu=checks["paths"](checks["render_category"]("seo","menu"))
parents={"/seo/","/google-ads/","/horoshop/","/service-websites/","/web-development/","/contact/"}
assert len(menu)==37 and parents<=menu
children=set()
for slug,count in {"seo":5,"google-ads":4,"horoshop":4,"service-websites":4,"web-development":14}.items():
    catalog=checks["paths"](checks["render_category"](slug,"catalog"))
    orbit=checks["paths"](checks["render_category"](slug,"orbit"))-{"/contact/"}
    assert len(catalog)==count and catalog==orbit
    assert not children.intersection(catalog)
    children.update(catalog)
assert children==menu-parents
assert "mrseo_ua_visible_menu_sections($key)" in nav
for heading in ("Бізнес-системи","Інтеграції й функціонал","Штучний інтелект","Мобільні застосунки"):
    assert heading in nav
assert "Сторінка готується" not in nav
assert "mrseo-catalog-parent" in nav and "mrseo-catalog-subgroup" in nav
assert "<details" not in nav
assert "pointerdown" in js and "Escape" in js and "hoverOnly" in js and "pointerenter" in js
assert "assets/ua-catalog-header.css" in functions
assert "grid-template-columns:repeat(4,minmax(0,1fr))" in css and "grid-template-columns:1fr" in css
assert "prefers-reduced-motion:reduce" in css and "overflow:auto" in css
assert "X-Robots-Tag: noindex, nofollow" in functions
assert css.count("{")==css.count("}"), "Unbalanced stylesheet braces"
assert "pt-globe" not in css and "pt-orbit" not in css
assert '$compact_exclude' in nav
print("PASS: unified compact catalogue; four WebDev groups, original route registry preserved; no placeholders; Earth/noindex untouched")
