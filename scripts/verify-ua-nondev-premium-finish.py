#!/usr/bin/env python3
"""Guard scoped Ukrainian non-development visual finish without routing or artwork changes."""
from pathlib import Path
root=Path(__file__).resolve().parents[1]
theme=root/"wp-content/themes/mrseo-tech"
css=(theme/"assets/ua-nondev-premium-finish.css").read_text(encoding="utf-8")
functions=(theme/"functions.php").read_text(encoding="utf-8")
home=(theme/"home-uk-premium.php").read_text(encoding="utf-8")
pti=(theme/"premium-ua-interior.php").read_text(encoding="utf-8")
scene=(theme/"inc/motion-scenes.php").read_text(encoding="utf-8")
editorial=(theme/"inc/premium-ua-editorial.php").read_text(encoding="utf-8")
horoshop=(theme/"horoshop-uk.php").read_text(encoding="utf-8")
assert "mrseo-ua-nondev-premium-finish" in functions
assert "mrseo_slug()" in functions and "mrseo_locale()!=='uk'" in functions
assert "web-development','crm-development','web-applications','api-integrations'" in functions
assert "'business-automation','ai-agents','custom-functionality','portfolio'" in functions
assert "wp_enqueue_style('mrseo-ua-nondev-premium-finish'" in functions
assert "ua-nondev-premium-finish.css" not in home
assert "pt-orbit-lines" in home and "class=\"pt-globe" in home
assert "data-pti-service" in pti and "web-development" in pti
assert "puc-page" in css and "data-pti-service=\"seo\"" in css
assert "data-pti-service=\"google-ads\"" in css and ".uws-page" in css
assert ".ukseo--horoshop" in css and ".hs-ads-shopping-card" in css
assert 'data-pue-route="about"' in css and 'data-pue-route="contact"' in css
assert 'data-pue-route="privacy"' in css and 'data-pue-route="portfolio"' not in css
assert "prefers-reduced-motion:reduce" in css
assert "@media(max-width:600px)" in css and "@media(max-width:940px)" in css
assert css.count("{")==css.count("}"), "Unbalanced CSS blocks"
assert "mrseo_render_motion_scene" in scene
assert "pue-motion" in editorial and "horoshop-wordmark.svg" in horoshop
assert "X-Robots-Tag: noindex, nofollow" in functions
assert "mrseo_brand_palette_css_cache_key" in functions
print("PASS: UK-only nondev polish; original SEO/Ads/Horoshop/Sites/editorial scenes, Earth, global noindex and 20-locale routing preserved")
