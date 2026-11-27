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
# The cards must NEVER link to parent landing pages; only actual child URLs.
assert "mrseo_url($service['slug'],'uk')" not in section
assert "mrseo_home_subservice_groups($key)" in section
assert section.count('<details class="hsix-subservices"')==1  # one template, loop renders five
assert '<summary aria-label=' in section
assert 'class="hsix-subgroup"' in section
assert "esc_url($sub['url'])" in section and "esc_html($sub['label'])" in section
subnav=(root/"inc/home-service-sublinks.php").read_text()
assert "mrseo_ua_visible_menu_sections($key)" in subnav
assert "hsix-subpanel" in css and "hsix-subservices>summary" in css
assert "prefers-reduced-motion:reduce" in css
assert section.count('class="hsix-cta"')==1
assert "mrseo_url('contact','uk')" in section
assert "НЕ НАБІР ПОСЛУГ" in section
assert "hsix-cta" in css and "hsix-cta-content" in css
assert "hsix-card--dev{order:3}" in css and "hsix-card--sites{order:4}" in css
assert "hsix-card--horoshop{order:5}" in css
motion=(root/"assets/home-five-motion.js").read_text()
assert "IntersectionObserver" in motion and "prefers-reduced-motion" in motion
assert "hsix-motion-off" in motion
assert "home-five-motion.js" in home
assert "@keyframes hsix-chart-reveal" in css and "@keyframes hsix-device-rise" in css
assert "@keyframes hsix-dev-glow" in css and "@keyframes hsix-horoshop-check" in css
assert "@keyframes hsix-serp-pulse" in css
# Visible movement, not just static illustrations with nearly imperceptible opacity changes.
for animation in ("hsix-search-scan","hsix-seo-result","hsix-ads-draw",
                  "hsix-ads-bars","hsix-catalog-focus","hsix-catalog-check",
                  "hsix-site-preview","hsix-site-window-highlight",
                  "hsix-dev-code","hsix-dev-status"):
    assert "@keyframes "+animation in css, animation
for card in ("seo","ads","horoshop","sites","dev"):
    assert ".hsix-card--"+card in css
assert "prefers-reduced-motion:no-preference" in css
assert "stroke-dasharray:none!important" in css  # static complete graph in reduced-motion mode
assert "rootMargin:'60px 0px 60px 0px'" in motion
assert "entry.isIntersecting" in motion
assert "home-five-motion.js',array(),'1.1.0'" in home
assert "home-six-services.css',array('mrseo-home-uk-premium'),'1.3.0'" in home
assert "<section class=\"ph-resolution\"" not in home
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
