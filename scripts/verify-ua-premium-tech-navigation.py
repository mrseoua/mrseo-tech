#!/usr/bin/env python3
"""Verify UA-only Premium Tech Navigation uses actual service routes and safe native disclosures."""
from pathlib import Path
root=Path(__file__).resolve().parents[1]
theme=root/"wp-content/themes/mrseo-tech"
header=(theme/"header.php").read_text(encoding="utf-8")
nav=(theme/"inc/ua-header-six.php").read_text(encoding="utf-8")
css=(theme/"assets/ua-six-header.css").read_text(encoding="utf-8")
js=(theme/"assets/ua-six-header.js").read_text(encoding="utf-8")
functions=(theme/"functions.php").read_text(encoding="utf-8")
assert "mrseo_ua_header_six(false)" in header and "mrseo_ua_header_six(true)" in header
assert "mrseo-ua-header-v2" in header
assert "name=\"'.($mobile?'ua-six-mobile':'ua-six-desktop').'\"" in nav
assert nav.count("mrseo_hs_url($anchor)") == 1
assert nav.count("mrseo_url($slug,'uk')") == 2  # SEO shortlist + other categories
assert "foreach($groups as $group)" in nav
assert "array('data','commerce')" in nav and "'dev'=>'Веброзробка'" in nav
assert "'sites'=>'Сайти'" in nav
assert "'commerce'=>'Інтернет-магазини'" not in nav
for slug in ("local-seo","ecommerce-seo","service-business-seo","international-seo","seo-audit"):
    assert "'"+slug+"'=>'" in nav, slug
assert "SEO-послуги" in nav and "foreach($seo_services as $slug=>$label)" in nav
assert "Огляд напряму" not in nav and "mrseo-ua-six-overview-link" not in nav
assert "mrseo-ua-six-deco" in nav
assert "SEO та просування" in nav and "Товари та аналітика" in nav
assert "foreach($horoshop_groups as $heading=>$services)" in nav
for key in ("seo","audit","ads","search-ads","shopping","pmax","feeds","ga4"):
    assert "'"+key+"'=>" in nav, key
assert "Navigation 05" in css and "@keyframes mrseo-menu-line" in css
assert "mrseo-ua-six-item--horoshop .mrseo-ua-six-catalog" in css
assert "@media(prefers-reduced-motion:reduce)" in css

assert "mrseo_ua_menu_summaries()" in nav
assert 'mrseo-ua-six-overview' in nav and 'mrseo-ua-six-panel--mega' in nav
assert "summary" in nav and "mrseo-ua-six-panel" in nav
assert "Premium Tech Navigation 03" in css
assert "min-width:1351px" in css and "max-width:1350px" in css
assert "mrseo-ua-menu-reveal" in css and "prefers-reduced-motion:reduce" in css
assert ".mrseo-ua-six--desktop .mrseo-ua-six-item summary::after" in css
assert "overflow-y:auto" in css and "min-height:48px" in css
assert "pointerdown" in js and "Escape" in js
assert "assets/ua-six-header.css" in functions and "'1.9.0'" in functions
assert "white-space:nowrap;" in css and "grid-template-columns:minmax(300px,35%) minmax(0,1fr)" in css
assert "Navigation 04" in css
assert "X-Robots-Tag: noindex, nofollow" in functions
assert css.count("{")==css.count("}"), "Unbalanced stylesheet braces"
assert "pt-globe" not in css and "pt-orbit" not in css
print("PASS: 5 UA categories; balanced two-column Horoshop; no overview CTA; restrained reduced-motion pattern; unchanged Earth/noindex")
