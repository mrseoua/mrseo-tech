#!/usr/bin/env python3
"""Whole-page UA SEO design regression. No changes to the child route, home or SEO metadata."""
from pathlib import Path
r=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
page=(r/"inc/premium-ua-interiors/seo.php").read_text()
hero=(r/"inc/seo-cinematic-hero.php").read_text()
directions=(r/"inc/seo-cinematic-directions.php").read_text()
css=(r/"assets/seo-hub.css").read_text()
js=(r/"assets/seo-cinematic.js").read_text()
wrapper=(r/"premium-ua-interior.php").read_text()
assert 'class="seo-hub"' in page and "seo-cinematic-hero.php" in page and "seo-cinematic-directions.php" in page
assert hero.count("<h1 ")==1 and 'id="pti-title"' in hero and "SEO-просування сайту допомагає клієнтам" in hero
assert hero.count('<li>')==3 and "seo-motion" in hero
art=(r/"inc/seo-hub-premium-art.php").read_text()
for scene in ("sh-hero-main","sh-query","sh-find","sh-action","sh-audit","sh-commerce","sh-local","sh-service","sh-international"):
 assert scene in art and "animate" in art
assert "seo-premium-scene" in js and "buttons.forEach" in js
assert "sh-hero-stage" in hero and "sh-hero-main" in hero
assert hero.count('class="seo-flow-object"')==3
assert '.seo-hero-visual' not in hero and 'seo-hero-visual' not in hero
assert 'clip-path:inset(50%)' in (r/'style.css').read_text()
assert page.count('class="seo-problem"')==3 and page.count('class="seo-plan-step"')==3 and page.count('<details>')==3
assert 'data-pti-faq="seo"' in page and 'id="ukseo-cases"' in page and 'id="seo-approach"' in page
assert 'id="ukseo-services"' in directions and 'mrseo_sh_art($scene);' in directions
for slug in ("seo-audit","ecommerce-seo","local-seo","service-business-seo","international-seo"):
 assert "array('"+slug+"'" in directions,slug
assert "mrseo_url($dir[0],'uk')" in directions
assert "seo-reference/" not in hero+directions+page and "data:image" not in page and "pti-seo-object" not in page
assert "seo-hub.css" in wrapper and "seo-home-system.css" not in wrapper
assert "var(--mrseo-brand-red" in css and "#e9e1d5" in css and "#272d29" in css
assert "prefers-reduced-motion" in css and "prefers-reduced-motion: reduce" in js
assert css.count("{")==css.count("}")
assert "X-Robots-Tag: noindex, nofollow" in (r/"functions.php").read_text()
assert 'class="pt-globe"' in (r/"home-uk-premium.php").read_text()
print("PASS: complete SEO hub, three problems and steps, five directions, FAQ, noindex, home preserved")
