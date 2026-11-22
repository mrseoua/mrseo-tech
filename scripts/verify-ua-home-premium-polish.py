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
assert "Довіра важливіша за публічне портфоліо." in home
assert "без їхнього дозволу" in home
assert "class=\"ph-final\"" in home
assert home.index('class="ph-resolution"') < home.index('class="ph-confidential"') < home.index('class="ph-final"')
assert "class=\"pt-globe" in home and "pt-orbit-lines" in home
assert "horoshop-wordmark.svg" in scene
for name in ("seo","horoshop","sites","dev"):
    assert "cs-polish-card--"+name in scene
    assert ".cs-polish-card--"+name in css
assert "cs-campaigns-card" in scene and "cs-shopping-card" in scene and "cs-conversions-card" in scene
assert "prefers-reduced-motion:reduce" in css
assert "max-width:410px" in css and "max-width:710px" in css
assert ".pt-ua-home .ph-confidential" in css
assert ".pt-ua-home .cs-showcase" in css
assert ".pt-globe" not in css and ".pt-orbit" not in css
assert "cs-brand.cs-brand-horoshop" in reference
assert "X-Robots-Tag: noindex, nofollow" in (theme/"functions.php").read_text(encoding="utf-8")
print("PASS: five scene balance, responsive/reduced-motion CSS, no public portfolio, privacy-first copy, unchanged Earth/noindex")
