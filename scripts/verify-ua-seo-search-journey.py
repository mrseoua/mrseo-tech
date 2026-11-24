#!/usr/bin/env python3
"""Homepage visual system shared by UA SEO hub and five children."""
from pathlib import Path
r=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
page=(r/"inc/premium-ua-interiors/seo.php").read_text()
hero=(r/"inc/seo-cinematic-hero.php").read_text()
directions=(r/"inc/seo-cinematic-directions.php").read_text()
css=(r/"assets/seo-home-system.css").read_text()
js=(r/"assets/seo-cinematic.js").read_text()
wrapper=(r/"premium-ua-interior.php").read_text()
cluster=(r/"premium-seo-cluster.php").read_text()
assert "seo-cinematic-hero.php" in page and "seo-cinematic-directions.php" in page
assert page.count('<section class="pti-section" id="ukseo-cases"')==1
assert page.count('data-pti-faq="seo"')==1
assert hero.count("<h1 ")==1 and 'id="pti-title"' in hero
assert "SEO-просування сайту допомагає клієнтам" in hero and "10+ років" in hero
assert 'class="seo-home-window seo-art"' in hero and 'class="seo-cine-motion"' in hero
assert 'id="ukseo-services"' in directions and "seo_home_cards=array(" in directions
for slug in ("seo-audit","ecommerce-seo","local-seo","service-business-seo","international-seo"):
 assert "array('"+slug+"'" in directions,slug
assert "mrseo_url($dir[0],'uk')" in directions
assert "seo-reference/" not in hero+directions
assert "seo-home-system.css" in wrapper and "seo-home-system.css" in cluster
assert "seo-reference.css" not in wrapper
assert "var(--mrseo-brand-red)" in css and "#e9e1d5" in css and "#172321" in css
assert "prefers-reduced-motion" in css and "prefers-reduced-motion: reduce" in js
assert css.count("{")==css.count("}")
assert "X-Robots-Tag: noindex, nofollow" in (r/"functions.php").read_text()
assert 'class="pt-globe"' in (r/"home-uk-premium.php").read_text()
print("PASS: homepage-aligned SEO family, five real links, noindex, existing FAQ and motion")
