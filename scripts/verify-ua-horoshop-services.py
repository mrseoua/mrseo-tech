#!/usr/bin/env python3
"""Static regression for the six UA Horoshop service anchors and original partner hero."""
from pathlib import Path
import json,re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
page=(root/"horoshop-uk.php").read_text(encoding="utf-8")
header=(root/"inc/ua-header-six.php").read_text(encoding="utf-8")
css=(root/"assets/horoshop-services-ua.css").read_text(encoding="utf-8")
functions=(root/"functions.php").read_text(encoding="utf-8")
semantic=(root/"inc/ua-semantic-map.php").read_text(encoding="utf-8")
routes=(root/"inc/i18n-routing.php").read_text(encoding="utf-8")
anchors=["hs-setup","hs-seo","hs-audit","hs-ads","hs-feeds","hs-ga4"]
for anchor in anchors:
 assert page.count('id="'+anchor+'"')==1,("missing or duplicate card",anchor)
 assert "'"+anchor.split("-")[1]+"'" in header,("premium route",anchor)
 assert len(re.findall(r'<article[^>]*id="'+anchor+r'"',page))==1,("semantic article",anchor)
assert page.count('class="hs-service-card"')==6
assert page.count('class="hs-service-result"')==6
assert page.count('class="hs-service-pain"')==6
assert page.count('class="hs-service-number"')==6
assert page.count('class="hs-service-card"')==page.count('class="hs-service-result"')
assert "mrseo_hs_url($anchor)" in header
assert "horoshop-partner-active.svg" in page and "horoshop-wordmark.svg" in page
assert page.count('class="hs-switch')>=4
assert "mrseo_locale()==='uk'" in page
assert "prefers-reduced-motion:reduce" in css and "@media(max-width:760px)" in css
assert "mrseo-horoshop-services" in functions and "mrseo_locale()==='uk'" in functions
assert "X-Robots-Tag: noindex, nofollow" in functions
assert "if($slug==='horoshop' && !in_array($lang,array('uk','ru'),true))" in routes
m=re.search(r"<<<'MRSEO_UA_SEMANTIC_MAP'\s*\n([\s\S]*?)\nMRSEO_UA_SEMANTIC_MAP",semantic)
assert m,"semantic map"
data=json.loads(m.group(1))
info=data['horoshop']
assert len(info["description"])>=110
assert all(x in info['secondary'] for x in ["сайт на хорошоп","хорошоп створити сайт","seo хорошоп"])
assert "🛒" not in info["description"]

# Separate premium pages: one real WP route per offering; never placeholder anchors.
premium=(root/"horoshop-service-premium.php").read_text(encoding="utf-8")
premium_routes=(root/"inc/horoshop-premium-routes.php").read_text(encoding="utf-8")
premium_css=(root/"assets/horoshop-premium-pages.css").read_text(encoding="utf-8")
assert "horoshop-premium-routes.php" in functions
assert "mrseo_hs_key()" in premium and "hs-premium-visual" in premium
assert "get_header()" in premium and "get_footer()" in premium
assert "rel=\"canonical\"" in premium_routes
assert "add_rewrite_rule('^horoshop/(setup|seo|audit|ads|feeds|ga4)/?$'" in premium_routes
assert "mrseo_hs_url($anchor)" in header
for key in ("setup","seo","audit","ads","feeds","ga4"):
 assert "'"+key+"'" in header
 assert "mrseo_hs_url('"+key+"')" in page
 assert "'"+key+"'" in premium_routes or '"'+key+'"' in premium_routes
assert "prefers-reduced-motion:reduce" in premium_css
assert "@media(max-width:480px)" in premium_css
assert "mrseo-horoshop-premium-pages" in premium_routes
# Premium interaction regression: six distinct service motions and keyboard-operable stages.
motion=(root/"assets/horoshop-premium-motion.js").read_text(encoding="utf-8")
assert "horoshop-premium-motion.js" in premium_routes
assert "mrseo-horoshop-premium-motion" in premium_routes
assert "data-hs-active-stage" in premium
assert "hs-premium-stage-button" in premium
assert 'aria-pressed' in premium and 'aria-live="polite"' in premium
assert "hs-premium-stage-description" in premium
assert "hs-premium-scanline" in premium and premium.count("hs-premium-ping--")==3
assert all("hs-premium-"+name in premium_css for name in ("basket","search","audit","ads","feed","chart","scan","ring","route"))
assert all(key in motion for key in ("ArrowRight","ArrowLeft","IntersectionObserver","visibilitychange","prefers-reduced-motion","pauseAnimations"))
assert "data-hs-motion-paused" in premium_css
assert "@media(prefers-reduced-motion:reduce)" in premium_css
# Below-fold premium visual stories: six accurate intent-specific narratives.
story=(root/"inc/horoshop-premium-story.php").read_text(encoding="utf-8")
assert "require_once get_template_directory().'/inc/horoshop-premium-story.php';" in premium
assert "mrseo_hs_workbench($key)" in premium
assert "mrseo_hs_result_visual($key)" in premium
assert "hs-story-step-visual" in premium and "hs-story-final-orbit" in premium
for name in ("setup","seo","audit","ads","feeds","ga4"):
 assert "'"+name+"'=>array(" in story,("missing visual story",name)
for token in ("hs-story-workbench","hs-story-machine","hs-story-machine-flow",
              "hs-story-proof-row","hs-story-proof-note","hs-story-final-orbit"):
 assert token in story+premium,("missing scene",token)
 assert token in premium_css,("missing scene CSS",token)
assert "Схематична візуалізація процесу" in story
assert "не фактичний звіт" in story
assert "hs-story-motion-on" in motion and "visibilitychange" in motion
assert "prefers-reduced-motion:reduce" in premium_css
assert "1.2.0" in premium_routes
print("Horoshop UA: six premium routes, premium below-fold motion narratives and interactive hero, original partner visual, metadata, noindex and UA/RU routing preserved.")
