#!/usr/bin/env python3
"""Cinematic Ukrainian SEO hub QA: unchanged intent, five directions, noindex and visual continuity."""
from pathlib import Path
r=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
page=(r/"inc/premium-ua-interiors/seo.php").read_text()
hero=(r/"inc/seo-cinematic-hero.php").read_text()
directions=(r/"inc/seo-cinematic-directions.php").read_text()
css=(r/"assets/seo-cinematic.css").read_text()
js=(r/"assets/seo-cinematic.js").read_text()
wrapper=(r/"premium-ua-interior.php").read_text()
home=(r/"home-uk-premium.php").read_text()
functions=(r/"functions.php").read_text()
style=(r/"style.css").read_text()
assert "seo-cinematic-hero.php" in page and "seo-cinematic-directions.php" in page
assert page.count('<section class="pti-section" id="ukseo-cases"')==1
assert page.count('data-pti-faq="seo"')==1
assert "seo-editorial-feature" not in page
assert 'id="pti-title"' in hero and hero.count("<h1 ")==1
assert "Більше" in hero and "органічних" in hero and "клієнтів" in hero
assert "SEO-просування сайту в Google" in hero
assert "class=\"seo-cine-terrain\"" in hero and "class=\"seo-cine-search\"" in hero
assert "class=\"seo-cine-motion\"" in hero and "aria-pressed=\"false\"" in hero
assert 'id="ukseo-services"' in directions
assert "seo_cine_directions=array(" in directions
for slug in ("seo-audit","ecommerce-seo","local-seo","service-business-seo","international-seo"):
 assert "array('"+slug+"'" in directions,slug
assert "mrseo_url($dir[0],'uk')" in directions
assert "seo-cine-manifest" in directions and "seo-cine-direction-grid" in directions
assert "10+ років" in hero and "Рішення за вашими бізнес-цілями" in hero
assert "noindex" in functions and "X-Robots-Tag: noindex, nofollow" in functions
assert "--mrseo-brand-red:#A84432;" in style
for token in ("--sc-red:var(--mrseo-brand-red,#A84432)","--sc-ivory:#f7f3ed","--sc-ink:#242624","--sc-line:#ded3c7",
             ".seo-cine-direction-grid",".seo-cine-manifest","@media(max-width:600px)","@media(max-width:380px)",
             "@media(prefers-reduced-motion:reduce)","seo-cine-paused"):
 assert token in css,token
assert "seo-cinematic.css" in wrapper and "seo-cinematic.js" in wrapper
assert "4.0.0" in wrapper
assert "prefers-reduced-motion: reduce" in js and "aria-pressed" in js and "visibilitychange" in js
assert css.count("{")==css.count("}"),"Unbalanced CSS block braces"
assert 'class="pt-globe"' in home
print("PASS cinematic SEO: branded open hero, 5 approved links, original content/FAQ, mobile and noindex; homepage untouched")
