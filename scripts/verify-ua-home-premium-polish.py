#!/usr/bin/env python3
"""Guard a scoped premium polish on the Ukrainian homepage without altering Earth."""
from pathlib import Path
root=Path(__file__).resolve().parents[1]
theme=root/"wp-content/themes/mrseo-tech"
home=(theme/"home-uk-premium.php").read_text(encoding="utf-8")
scene=(theme/"inc/home-cinematic-showcase.php").read_text(encoding="utf-8")
css=(theme/"assets/home-cinematic-polish.css").read_text(encoding="utf-8")
reference=(theme/"assets/home-cinematic-reference.css").read_text(encoding="utf-8")
assert "home-cinematic-polish.css" in home and "'mrseo-home-cinematic-reference'" in home
assert "class=\"ph-confidential\"" in home
assert "Ваші дані залишаються приватними." in home
assert "без дозволу клієнта" in home
assert 'class="ph-final"' not in home
assert home.index('class="ph-resolution"') < home.index('class="ph-confidential"')
assert home.count('class="pt-home-cta"') == 2, "Only hero and final privacy CTAs"
assert 'class="ph-confidential-action"' in home
assert "class=\"pt-globe" in home and "pt-orbit-lines" in home
assert "horoshop-wordmark.svg" in scene
assert "cs-polish-card" not in scene and "cs-polish-card" not in css
assert "cs-optimization-card" not in scene
assert "cs-art-spark" not in scene
assert '<small>SEO</small><span>ЗАПИТ</span>' not in scene
assert "home-cinematic-polish.css" in home and "'1.0.2'" in home
assert "background:linear-gradient(180deg,#f8f6f2" in css
assert "overflow:hidden; border-radius:18px" in css
assert "grid-template-columns:minmax(242px,.9fr) minmax(0,1.65fr)" in css
assert "cs-art--seo .cs-visual-float--left{display:none}" in css
assert ".pt-ua-home .cs-art-orbit--two" in css
assert "cs-campaigns-card" in scene and "cs-shopping-card" in scene and "cs-conversions-card" in scene
assert "prefers-reduced-motion:reduce" in css
assert "max-width:410px" in css and "max-width:710px" in css
assert ".pt-ua-home .ph-confidential" in css
assert ".pt-ua-home .cs-showcase" in css
assert ".pt-globe" not in css and ".pt-orbit" not in css
assert "cs-brand.cs-brand-horoshop" in reference
assert "X-Robots-Tag: noindex, nofollow" in (theme/"functions.php").read_text(encoding="utf-8")
print("PASS: five calm service scenes, 2 purposeful CTAs, combined confidentiality block, responsive/motion safety, unchanged Earth/noindex")
