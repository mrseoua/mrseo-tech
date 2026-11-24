#!/usr/bin/env python3
from pathlib import Path
r=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
h=(r/"header.php").read_text()
ua=h.split('<header class="site-header mrseo-ua-mega-header">',1)[1].split('</header>',1)[0]
assert ua.count('services-menu-toggle"')==1 and "mrseo_ua_header_catalog()" in ua
assert "mrseo_ua_header_six(" not in ua and "mrseo_render_header_contact()" in ua and "mrseo_render_language_dropdown" in ua
c=(r/"inc/ua-header-six.php").read_text().split("function mrseo_ua_header_catalog()",1)[1]
assert "mrseo_ua_menu_groups()" in c and "data-catalog-group" in c and "mrseo-catalog-parent" in c
assert "<details" not in c and "mrseo_hs_url" in c
css=(r/"assets/ua-catalog-header.css").read_text()
assert "width:100%!important" in css and "max-height:calc(100dvh" in css and "prefers-reduced-motion" in css
js=(r/"assets/site.js").read_text()
assert "hoverOnly" in js and "pointerenter" in js and "pointerleave" in js and "Escape" in js
assert "X-Robots-Tag: noindex, nofollow" in (r/"functions.php").read_text()
print("PASS: native UA one-trigger catalogue, preserved router, keyboard and hover, full-width desktop / responsive mobile")
