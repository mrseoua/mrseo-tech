#!/usr/bin/env python3
"""Guard the approved lower Ukrainian homepage Cinematic Showcase (five linked categories)."""
from pathlib import Path
import re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
home=(root/"home-uk-premium.php").read_text(encoding="utf-8")
section=(root/"inc/home-cinematic-showcase.php").read_text(encoding="utf-8")
css=(root/"assets/home-cinematic-showcase.css").read_text(encoding="utf-8")
js=(root/"assets/home-cinematic-showcase.js").read_text(encoding="utf-8")
old_js=(root/"assets/home-uk-premium.js").read_text(encoding="utf-8")
browser=(root.parents[2]/"scripts/verify-live-eu-responsive.cjs").read_text(encoding="utf-8")
assert "require get_template_directory().'/inc/home-cinematic-showcase.php'" in home
assert "home-cinematic-showcase.css" in home and "home-cinematic-showcase.js" in home
assert '<section class="ph-services"' not in home and "class=\"ph-service ph-card-link\"" not in home
assert "class=\"pt-globe" in home and "class=\"pt-orbit" in home
assert "pt-orbit-lines" in home and "class=\"pt-node n4\"" in home
assert "const a=-Math.PI/2+i*2*Math.PI/nodes.length+phase;" in old_js
assert "document.querySelector('.ph-pause')" not in old_js
assert "mrseo-home-cinematic-showcase" in home
assert "if(!defined('ABSPATH'))exit;" in section
assert "data-cs-showcase" in section and "data-cs-select" in section and "data-cs-panel" in section
assert "aria-controls=" in section and "aria-expanded=" in section
assert "mrseo_hs_url($link[0])" in section and "mrseo_url($link[0],'uk')" in section
assert "mrseo_url('contact','uk')" in section
assert "Обговорити проєкт" in section and "Усі послуги" in section
parents=dict(re.findall(r"'(seo|ads|horoshop|sites|dev)'=>array\(\s*'name'=>'[^']+','parent'=>'([^']+)'",section))
assert parents=={"seo":"seo","ads":"google-ads","horoshop":"horoshop","sites":"service-websites","dev":"web-development"},parents
links=re.findall(r"array\('([^']+)','([^']+)'\)",section)
assert len(links)>=30,("Missing real commercial subcategory links",len(links))
for name in ('cs-art--','cs-visual-seo','cs-visual-ads','cs-visual-store','cs-visual-site','cs-visual-dev'):
 assert name in section,("Missing distinct service visual",name)
assert "+142%" not in section and "ROAS" not in section
assert "cs-showcase.cs-enhanced .cs-panel" in css
assert "prefers-reduced-motion:reduce" in css
assert "@media(max-width:410px)" in css
assert "cs-motion-off" not in old_js
assert "tabs.length!==5||panels.length!==5" in js
assert "aria-pressed" in js and "ArrowRight" in js and "ArrowLeft" in js
assert "root.classList.add('cs-enhanced')" in js
assert "uaCinematicLinks<30" in browser and "uaCinematicVisuals!==5" in browser
assert "X-Robots-Tag: noindex, nofollow" in (root/"functions.php").read_text(encoding="utf-8")
print("PASS: 5 premium homepage service categories, 30+ real links, independent animated scenes, JS/SEO fallback, noindex and preserved Earth")
