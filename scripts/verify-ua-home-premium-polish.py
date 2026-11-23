#!/usr/bin/env python3
"""Protect approved Ukrainian homepage privacy block and Earth while redesigning services."""
from pathlib import Path
root=Path(__file__).resolve().parents[1]
theme=root/"wp-content/themes/mrseo-tech"
home=(theme/"home-uk-premium.php").read_text()
css=(theme/"assets/home-cinematic-polish.css").read_text()
six=(theme/"assets/home-six-services.css").read_text()
assert "home-cinematic-polish.css" in home and "home-six-services.css" in home
assert 'class="ph-confidential"' in home
assert "Ваші дані залишаються приватними." in home
assert "без дозволу клієнта" in home
assert 'class="ph-final"' not in home
assert 'class="ph-resolution"' not in home  # replaced by dark CTA tile, avoiding duplicate promise
assert 'class="hsix-cta"' in (theme/"inc/home-six-services.php").read_text()
assert "Є проблема?" in (theme/"inc/home-six-services.php").read_text()
assert home.count('class="pt-home-cta"')==2
assert 'class="ph-confidential-action"' in home
assert 'class="pt-globe"' in home and "pt-orbit-lines" in home
assert ".pt-ua-home .ph-confidential" in css
assert "prefers-reduced-motion:reduce" in css and "prefers-reduced-motion:reduce" in six
assert ".pt-globe" not in six and ".pt-orbit" not in six
assert "X-Robots-Tag: noindex, nofollow" in (theme/"functions.php").read_text()
print("PASS: privacy CTA and real Earth maintained, localized 5-card + one CTA layout isolated, noindex preserved")
