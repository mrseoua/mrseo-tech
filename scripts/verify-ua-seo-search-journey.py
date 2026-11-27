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
import runpy
_category_check=runpy.run_path(str(Path(__file__).with_name("category-render-check.py")))
render_category=_category_check["render_category"]
paths=_category_check["paths"]
assert "mrseo_category_orbit('seo')" in hero
assert render_category("seo","orbit").h1==1
assert "mrseo_category_catalog('seo')" in directions
assert "ukseo-services" in render_category("seo","catalog").ids
art=(r/"inc/seo-hub-premium-art.php").read_text()
for scene in ("sh-hero-main","sh-query","sh-find","sh-action","sh-audit","sh-commerce","sh-local","sh-service","sh-international"):
 assert scene in art and "animate" in art
assert "seo-premium-scene" in js and "buttons.forEach" in js
assert "category-orbit-engine.js" in (r/"inc/category-orbit.php").read_text()
assert '.seo-hero-visual' not in hero and 'seo-hero-visual' not in hero
assert 'clip-path:inset(50%)' in (r/'style.css').read_text()
assert 'ОРГАНІЧНИЙ ПОШУК' in art and 'Умовний приклад пошукової видачі' in art
assert 'running=new WeakMap()' in js
assert page.count('class="seo-problem"')==3 and page.count('class="seo-plan-step"')==3 and page.count('<details>')==3
assert 'data-pti-faq="seo"' in page and 'id="ukseo-cases"' in page and 'id="seo-approach"' in page
assert paths(render_category("seo","catalog"))=={"/"+slug+"/" for slug in ("seo-audit","ecommerce-seo","local-seo","service-business-seo","international-seo")}
assert "seo-reference/" not in hero+directions+page and "data:image" not in page and "pti-seo-object" not in page
assert "seo-hub.css" in wrapper and "seo-home-system.css" not in wrapper
assert "var(--mrseo-brand-red" in css and "#e9e1d5" in css and "#272d29" in css
assert "prefers-reduced-motion" in css and "prefers-reduced-motion: reduce" in js
assert css.count("{")==css.count("}")
assert "X-Robots-Tag: noindex, nofollow" in (r/"functions.php").read_text()
assert 'class="pt-globe"' in (r/"home-uk-premium.php").read_text()
print("PASS: complete SEO hub, three problems and steps, five directions, FAQ, noindex, home preserved")
