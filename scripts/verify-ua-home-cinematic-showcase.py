#!/usr/bin/env python3
"""Strict QA for approved 3x2 Ukrainian homepage services grid, Earth and SEO."""
from pathlib import Path
import re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
home=(root/"home-uk-premium.php").read_text()
section=(root/"inc/home-six-services.php").read_text()
css=(root/"assets/home-six-services.css").read_text()
earth_js=(root/"assets/home-uk-premium.js").read_text()
functions=(root/"functions.php").read_text()
assert "require get_template_directory().'/inc/home-six-services.php'" in home
assert "home-six-services.css" in home
assert "home-cinematic-showcase.js" not in home
assert "home-cinematic-showcase.css" not in home
assert '<section class="hsix"' in section and 'id="pt-development"' in section
assert 'class="hsix-grid"' in section and '<h2 id="hsix-heading">' in section
assert 'class="hsix-card ' in section and '<h3>' in section
assert "foreach ($services as $service)" in section
actual=re.findall(r"'key'=>'([^']+)','number'=>'(\d+)','kicker'=>'([^']+)','name'=>'([^']+)','slug'=>'([^']+)'",section)
expected=[("seo","01","SEARCH","SEO","seo"),("ads","02","GOOGLE ADS","Google Ads","google-ads"),
("horoshop","03","HOROSHOP","Хорошоп","horoshop"),("sites","04","WEBSITES","Сайти","service-websites"),
("dev","05","DEVELOPMENT","Веброзробка","web-development")]
assert actual==expected,(actual,expected)
for item in ("hsix-search","hsix-chart","hsix-shop-screen","hsix-site-screen","hsix-code"):
    assert item in section,("Missing distinctive diagram",item)
assert "mrseo_url($service['slug'],'uk')" in section
assert "aria-label" in section and "role=\"img\"" in section
assert "loading=\"lazy\"" not in section # no duplicate opaque remote images
assert "200+" not in section and "+42%" not in section and "15+" not in section
assert "grid-template-columns:repeat(3,minmax(0,1fr))" in css
assert "grid-template-columns:repeat(2,minmax(0,1fr))" in css
assert "grid-template-columns:1fr" in css
assert "max-width:700px" in css and "max-width:370px" in css
assert "prefers-reduced-motion:reduce" in css
assert css.count("{")==css.count("}")
assert home.count('class="pt-home-title"')==1
assert 'class="pt-globe"' in home and 'assets/earth-day.jpg' in home
assert "class=\"pt-node n4\"" in home and "pt-orbit-lines" in home
assert "const a=-Math.PI/2+i*2*Math.PI/nodes.length+phase;" in earth_js
assert "home-uk-premium.js" in home
assert "X-Robots-Tag: noindex, nofollow" in functions
assert 'class="ph-confidential"' in home and "home-cinematic-polish.css" in home
print("PASS: 5 Ukrainian menu-aligned UI-card categories, legitimate URLs, 3/2/1 columns, Earth unchanged, confidentiality and global noindex")
