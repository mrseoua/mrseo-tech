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
 assert "'"+anchor+"'" in header,("menu anchor",anchor)
 assert len(re.findall(r'<article[^>]*id="'+anchor+r'"',page))==1,("semantic article",anchor)
assert page.count('class="hs-service-card"')==6
assert page.count('class="hs-service-result"')==6
assert page.count('class="hs-service-pain"')==6
assert page.count('class="hs-service-number"')==6
assert page.count('class="hs-service-card"')==page.count('class="hs-service-result"')
assert "mrseo_url($group['parent'],'uk').'#'.$anchor" in header
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
print("Horoshop UA: six anchored commercial modules, original partner visual, metadata, noindex and UA/RU routing preserved.")
