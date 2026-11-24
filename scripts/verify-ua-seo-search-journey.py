#!/usr/bin/env python3
"""Cinematic Ukrainian SEO hub QA: unchanged intent, five directions, noindex and visual continuity."""
from pathlib import Path
r=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
page=(r/"inc/premium-ua-interiors/seo.php").read_text()
hero=(r/"inc/seo-cinematic-hero.php").read_text()
directions=(r/"inc/seo-cinematic-directions.php").read_text()
css=(r/"assets/seo-reference.css").read_text()
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
assert 'class="seo-art"' in hero and "seo-reference/hero.webp" in hero
assert 'class="seo-actions"' in hero
assert 'id="ukseo-services"' in directions
assert directions.count('class="seo-card"')==5
for slug in ("seo-audit","ecommerce-seo","local-seo","service-business-seo","international-seo"):
 assert "mrseo_url('"+slug+"','uk')" in directions,slug
assert directions.count("seo-reference/")==5
assert "seo-approach" in directions and "seo-cards" in directions
assert "10+ років" in hero and "Контроль" in hero
assert "noindex" in functions and "X-Robots-Tag: noindex, nofollow" in functions
assert "--mrseo-brand-red:#A84432;" in style
for token in ("--red:var(--mrseo-brand-red,#A84432)",".seo-cards",".seo-approach","@media(max-width:760px)","@media(prefers-reduced-motion:reduce)"):
 assert token in css,token
for name in ("hero","audit","shop","local","services","global"):
 data=(r/"assets/seo-reference"/(name+".webp")).read_bytes()
 assert data[:4]==b"RIFF" and data[8:12]==b"WEBP",name
assert "seo-reference.css" in wrapper and "seo-cinematic.js" in wrapper
assert "4.0.0" in wrapper
assert "prefers-reduced-motion: reduce" in js and "aria-pressed" in js and "visibilitychange" in js
assert css.count("{")==css.count("}"),"Unbalanced CSS block braces"
assert 'class="pt-globe"' in home
print("PASS cinematic SEO: branded open hero, 5 approved links, original content/FAQ, mobile and noindex; homepage untouched")
