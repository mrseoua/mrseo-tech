#!/usr/bin/env python3
"""SEO visual coherence regression: approved home style, distinct live hero, no duplicated content."""
from pathlib import Path
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
page=(root/"inc/premium-ua-interiors/seo.php").read_text()
css=(root/"assets/seo-home-alignment.css").read_text()
wrapper=(root/"premium-ua-interior.php").read_text()
base=(root/"assets/premium-ua-interiors.css").read_text()
home=(root/"home-uk-premium.php").read_text()
functions=(root/"functions.php").read_text()
assert "seo-search-journey.php" not in page
assert not (root/"inc/premium-ua-interiors/seo-search-journey.php").exists()
assert not (root/"assets/seo-search-journey.css").exists()
assert "seo-home-alignment.css" in wrapper
assert "mrseo_slug()==='seo'" in wrapper
assert 'data-pti-service="seo"' in css
assert "width:min(100% - clamp(28px,5vw,88px),1580px)" in css
for token in ("#f9f5ee","#f7f3ed","#252c26","#b94134","border-radius:28px",
              "radial-gradient","grid-template-columns:1fr","max-width:600px",
              "prefers-reduced-motion:reduce"):
    assert token in css,token
assert page.count("<h1 ")==1
assert 'class="pti-scene pti-seo pti-seo-console"' in page
assert 'class="seo-console-results"' in page and 'class="seo-console-diagnostic"' in page
assert 'class="seo-console-scan"' in page
assert "animateMotion" not in page[:page.index('id="ukseo-cases"')]
for key in ("seo-console-sweep","seo-console-line","seo-console-bar","seo-console-check","seo-console-caret"):
    assert "@keyframes "+key in css,key
assert page.count('data-phase="')==3
assert "data-scene-status" in page
assert "pti-seo-console" in page and "pti-scene-controls" in page
assert 'id="ukseo-cases"' in page and 'id="ukseo-services"' in page
assert 'data-pti-faq="seo"' in page
assert "mrseo_ua_menu_groups()" not in page, "SEO hub must not expose the 18-service registry"
assert page.count('class="seo-editorial-feature ') == 5
assert page.count('class="seo-editorial-open"') == 5
for slug in ("seo-audit", "ecommerce-seo", "local-seo", "service-business-seo", "international-seo"):
    assert "mrseo_url('"+slug+"','uk')" in page, slug
assert "seo-editorial-scope" in page
assert "seo-editorial-intro" in css
assert "seo-editorial-feature:first-child" in css
assert "@media(max-width:520px)" in css
assert "3.0.0" in wrapper
assert "pti-seo" in base and "pti-stage" in base
assert 'class="pt-globe"' in home
assert "X-Robots-Tag: noindex, nofollow" in functions
assert css.count("{")==css.count("}")
print("PASS: SEO-specific hero stays animated, no redundant generic cards, aligned colors/layout, 1 H1, original SEO routes/FAQ and noindex")
