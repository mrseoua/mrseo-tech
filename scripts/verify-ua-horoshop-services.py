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
 if anchor!="hs-setup": assert "'"+anchor.split("-")[1]+"'" in header,("premium dropdown route",anchor)
 assert len(re.findall(r'<article[^>]*id="'+anchor+r'"',page))==1,("semantic article",anchor)
assert page.count('class="hs-service-card"')==6
assert page.count('class="hs-service-result"')==6
assert page.count('class="hs-service-pain"')==6
assert page.count('class="hs-service-number"')==6
assert page.count('class="hs-service-card"')==page.count('class="hs-service-result"')
assert "mrseo_hs_url($anchor)" in header
assert "Про послуги Хорошоп" not in header
assert "'horoshop-setup'=>'setup'" not in header
assert "horoshop-setup" not in header
assert all("'"+key+"'=>" in header for key in ('seo','audit','ads','search-ads','shopping','pmax','feeds','ga4'))
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
assert "search-ads|shopping|pmax" in premium_routes and "add_rewrite_rule(" in premium_routes
assert "mrseo_hs_url($anchor)" in header
for key in ("setup","seo","audit","ads","feeds","ga4"):
 if key!='setup': assert "'"+key+"'" in header
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
# Verified Horoshop partner trust + specific commercial metadata.
trust_css=(root/"assets/horoshop-partner-trust.css").read_text(encoding="utf-8")
assert "mrseo_hs_trust(true)" in page and "mrseo_hs_trust();" in premium
assert "Офіційний партнер Хорошоп" in story and "10-річним досвідом" in story
assert "horoshop.ua/ua/offers/seo-na-etape-razrabotki-im-na-horoshop/" in story
assert "noopener noreferrer" in story
assert "horoshop-partner-trust.css" in functions and "horoshop-partner-trust.css" in premium_routes
assert "prefers-reduced-motion:reduce" in trust_css
assert "mrseo_hs_search_meta($key)" in premium_routes
for key in ("setup","seo","audit","ads","feeds","ga4"):
 assert "'"+key+"'=>array(" in premium_routes,("unique metadata absent",key)
assert "Офіційний партнер Хорошоп" in info['description']
assert "10-річним досвідом" in info['description']

# Distinct intent: SEO promotion is ongoing work, audit is diagnosis/report only.
menu=(root/"inc/mega-menu-trial.php").read_text(encoding="utf-8")
assert "SEO-просування сайтів на Хорошоп" in menu
assert "SEO-аудит сайтів на Хорошоп" in menu
assert "SEO-просування сайтів на Хорошоп" in page
assert "SEO-аудит сайтів на Хорошоп" in page
assert '"SEO-просування сайтів на Хорошоп"' in premium_routes
assert '"SEO-аудит сайтів на Хорошоп"' in premium_routes
assert "'SEO-просування сайтів на Хорошоп | MrSeo.tech'" in premium_routes
assert "'SEO-аудит сайтів на Хорошоп | MrSeo.tech'" in premium_routes
assert "mrseo_hs_url('audit')" in premium and "mrseo_hs_url('seo')" in premium
assert "самі зміни — окрема послуга" in page
assert "Впровадження — лише після погодження" in premium_routes


# New independent Google Ads offerings on Horoshop: routes, service copy, visual scenes and navigation.
ads_visual=(root/"inc/horoshop-ads-scenes.php").read_text(encoding="utf-8")
ads_css=(root/"assets/horoshop-ads-scenes.css").read_text(encoding="utf-8")
for key in ('search-ads','shopping','pmax'):
 assert '"'+key+'": [' in premium_routes,('missing Horoshop route data',key)
 assert "'"+key+"'=>array(" in premium_routes,('missing unique SEO metadata',key)
 assert "'"+key+"'=>array(" in story,('missing story',key)
 assert "mrseo_hs_url('"+key+"')" in page,('missing overview navigation',key)
 assert "=>array(" not in header or "'"+key+"'=>" in header,('missing desktop/mobile menu route',key)
 assert ("$key==='"+key+"'" in ads_visual if key!="pmax" else "'pmax'=>array(" in ads_visual),('missing original animation illustration',key)
 assert "hs-ads-"+('search' if key=='search-ads' else 'shopping' if key=='shopping' else 'pmax')+"-preview" in ads_visual
assert "mrseo_hs_paid_scene($key)" in premium
assert "horoshop-ads-scenes.css" in functions and "horoshop-ads-scenes.css" in premium_routes
assert "prefers-reduced-motion:reduce" in ads_css
assert "mrseo_hs_premium_routes_v2" in premium_routes
assert page.count('class="hs-paid-catalog-card"')==3
assert "X-Robots-Tag: noindex, nofollow" in functions

import runpy
_category_check=runpy.run_path(str(Path(__file__).with_name("category-render-check.py")))
render_category=_category_check["render_category"]
paths=_category_check["paths"]
assert render_category("horoshop","orbit").h1==1
assert paths(render_category("horoshop","catalog"))=={"/horoshop/"+key+"/" for key in ("seo","audit","ads","feeds")}
assert {"hs-seo","hs-audit","hs-ads","hs-feeds"}<=set(render_category("horoshop","catalog").ids)
print("Horoshop UA: six premium routes, premium below-fold motion narratives and interactive hero, original partner visual, metadata, noindex and UA/RU routing preserved.")
