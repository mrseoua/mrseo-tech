#!/usr/bin/env python3
"""Check the MrSeo.tech brand color contract without recoloring third-party logos."""
from pathlib import Path
import re
root=Path(__file__).resolve().parents[1] / "wp-content" / "themes" / "mrseo-tech"
style=(root/"style.css").read_text(encoding="utf-8")
assert "--mrseo-brand-red:#A84432;" in style
assert "--mrseo-brand-red-hover:#943726;" in style
assert "--mrseo-brand-red-soft:#F3E1DA;" in style
assert "--red:var(--mrseo-brand-red);" in style
assert "X-Robots-Tag: noindex, nofollow" in (root/"functions.php").read_text(encoding="utf-8")
functions=(root/"functions.php").read_text(encoding="utf-8")
assert "mrseo_brand_palette_css_cache_key" in functions
assert "add_query_arg('brand_palette','a84432',$src)" in functions
assert re.search(r"wp_enqueue_style\('mrseo-style',get_stylesheet_uri\(\),array\(\),'\d+\.\d+\.\d+'\)",functions), "Global style must have a versioned cache key"
target_files=[
 "style.css","assets/home-uk-premium.css","assets/home-cinematic-showcase.css",
 "assets/home-cinematic-reference.css","assets/ua-six-header.css","assets/ua-brand-accents.css",
 "assets/ua-simple-menu.css","assets/services-menu-toggle.css","assets/ua-websites.css",
 "assets/horoshop-premium-pages.css","assets/horoshop-partner-trust.css",
 "assets/horoshop-ads-scenes.css","assets/motion-scenes.css","assets/horoshop-hero.css",
 "assets/horoshop-services-ua.css","assets/ua-commercial-visuals.css",
 "assets/pl-services.css","assets/de-services.css","assets/fr-services.css",
 "assets/it-services.css","assets/es-services.css","assets/nl-services.css",
 "assets/ro-services.css","assets/cs-services.css","assets/pt-services.css",
 "assets/sv-services.css","assets/da-services.css","assets/final-market-services.css",
 "assets/uk-market.css","assets/international.css","assets/ru-premium.css",
 "assets/seo-uk-pilot.css","assets/ua-additional-scenes.css",
 "assets/new-services.css","assets/ua-seo-visuals.css","assets/seo-audit-uk.css",
 "assets/ecommerce-uk.css","assets/google-ads-uk.css","assets/ua-google-ads-pricing.css",
 "assets/development.css","assets/customer-journeys.css","assets/about-page.css",
 "assets/uk-service-rest.css","assets/ua-four-service-visuals.css",
 "assets/ua-final-interiors.css","assets/en-gb-interiors.css",
 "assets/language-dropdown.css","assets/contact-ui.css","assets/pl-unique-scenes.css"
]
def is_old_red(c):
 r,g,b=(int(c[i:i+2],16) for i in (1,3,5))
 return (123<=r<=216 and 34<=g<=124 and 29<=b<=104
         and r-g>=55 and -4<=g-b<=48)
total=0
for p in target_files:
 src=(root/p).read_text(encoding="utf-8")
 # Tokens defined at :root are the only direct brand hex colors allowed.
 if p=="style.css":
  src=src.replace("--mrseo-brand-red:#A84432;","")
  src=src.replace("--mrseo-brand-red-hover:#943726;","")
  src=src.replace("--mrseo-brand-red-soft:#F3E1DA;","")
 raw=re.findall(r"#[0-9A-Fa-f]{6}\b",src)
 stale=[c for c in raw if is_old_red(c)]
 assert not stale, (p,"unmapped old opaque red",sorted(set(stale))[:8])
 total+=src.count("var(--mrseo-brand-red)")
assert total>200,total
# This is an agency design token, not a replacement for platform logo colors.
assert "#4285f4" in (root/"assets/home-cinematic-reference.css").read_text(encoding="utf-8").lower()
assert "#34a853" in (root/"assets/home-cinematic-reference.css").read_text(encoding="utf-8").lower()
assert "#fbbc05" in (root/"assets/home-cinematic-reference.css").read_text(encoding="utf-8").lower()
cinematic=(root/"assets/home-cinematic-reference.css").read_text(encoding="utf-8").lower()
assert not any(old in cinematic for old in ("#b12c31","#b4282d","#b73136","#a61f29","#b32731","#b33035","#b12e33","#b3272d","#b52730"))
assert "horoshop-partner-trust" in (root/"inc/horoshop-premium-routes.php").read_text(encoding="utf-8")
assert "pt-orbit-lines" in (root/"home-uk-premium.php").read_text(encoding="utf-8")
print(f"PASS: {len(target_files)} CSS stylesheets share a single #A84432 primary-red token ({total} uses), brand logo colors and noindex preserved")
