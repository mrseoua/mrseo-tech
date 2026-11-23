#!/usr/bin/env python3
"""SEO visual storyline regression: unique animation, mobile, existing page SEO."""
from pathlib import Path
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
page=(root/"inc/premium-ua-interiors/seo.php").read_text()
scene=(root/"inc/premium-ua-interiors/seo-search-journey.php").read_text()
css=(root/"assets/seo-search-journey.css").read_text()
wrapper=(root/"premium-ua-interior.php").read_text()
functions=(root/"functions.php").read_text()
assert page.count("require __DIR__.'/seo-search-journey.php';")==1
assert page.index("seo-search-journey.php") < page.index('id="ukseo-cases"')
assert page.count("<h1 ")==1
assert 'id="ukseo-cases"' in page and 'id="ukseo-services"' in page
assert "mrseo_ua_menu_groups()" in page and 'data-pti-faq="seo"' in page
assert "seo-search-journey.css" in wrapper and "mrseo_slug()==='seo'" in wrapper
assert 'class="seo-path-flow"' in scene and scene.count('class="seo-path-card"')==3
assert "<h1" not in scene and "<form" not in scene and '<a ' not in scene
for phrase in ("Що люди шукають?", "Чи є відповідь на сайті?", "Чи легко звернутися?",
               "Демонстрація логіки роботи", "Позиції та кількість звернень не гарантуємо"):
    assert phrase in scene, phrase
for animation in ("seo-path-advance", "seo-path-type", "seo-path-pulse",
                  "seo-path-highlight", "seo-path-form", "seo-path-advance-mobile"):
    assert "@keyframes "+animation in css
assert 'prefers-reduced-motion:reduce' in css
assert 'grid-template-columns:repeat(3,minmax(0,1fr))' in css
assert 'max-width:740px' in css and 'grid-template-columns:1fr' in css
assert 'data-pti-service="seo"' in css
assert "X-Robots-Tag: noindex, nofollow" in functions
assert css.count("{")==css.count("}")
print("PASS: unique animated SEO journey, intact original landing/links/FAQ, responsive + reduced-motion, noindex")
