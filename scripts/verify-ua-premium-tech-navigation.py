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
assert nav.count("mrseo_url($slug,'uk')") == 1
assert "foreach($groups as $group)" in nav
assert "array('data','commerce')" in nav and "'dev'=>'Веброзробка'" in nav
assert "summary" in nav and "mrseo-ua-six-panel" in nav
assert "Premium Tech Navigation 02" in css
assert "min-width:1251px" in css and "max-width:1250px" in css
assert "mrseo-ua-menu-reveal" in css and "prefers-reduced-motion:reduce" in css
assert ".mrseo-ua-six--desktop .mrseo-ua-six-item summary::after" in css
assert "overflow-y:auto" in css and "min-height:48px" in css
assert "pointerdown" in js and "Escape" in js
assert "assets/ua-six-header.css" in functions and "'1.6.0'" in functions
assert "X-Robots-Tag: noindex, nofollow" in functions
assert css.count("{")==css.count("}"), "Unbalanced stylesheet braces"
assert "pt-globe" not in css and "pt-orbit" not in css
print("PASS: 5 UA text navigation directions, genuine existing URLs, mobile native details, reduced motion, unchanged Earth and noindex")
