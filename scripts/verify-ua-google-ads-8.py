#!/usr/bin/env python3
"""Static regression for 8 Ukrainian Google Ads services. Live HTML, speed and ranks need separate QA."""
from pathlib import Path
import json,re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
def embedded(path,marker):
 s=(root/path).read_text(encoding="utf-8")
 m=re.search(r"<<<'"+re.escape(marker)+r"'\s*\n([\s\S]*?)\n"+re.escape(marker),s)
 assert m,(path,"missing embedded JSON")
 return json.loads(m.group(1))
menu=next(g for g in embedded("inc/mega-menu-trial.php","MRSEO_UA_MENU_GROUPS") if g["key"]=="ads")
child=[s for section in menu["sections"] for s,_ in section["items"]]
assert len(child)==len(set(child))==7
pages=["google-ads",*child]
semantic=embedded("inc/ua-semantic-map.php","MRSEO_UA_SEMANTIC_MAP")
titles=[];descs=[];queries=[]
for slug in pages:
 assert slug in semantic,slug
 d=semantic[slug]
 assert d.get("title") and d.get("description") and d.get("primary"),slug
 assert 100<=len(d["description"])<=185,(slug,len(d["description"]))
 assert not re.search(r"[\U0001F000-\U0001FAFF\u2600-\u27BF]",d["description"]),slug
 titles.append(d["title"]);descs.append(d["description"]);queries.append(d["primary"])
assert len(set(titles))==len(set(descs))==len(set(queries))==8
main=(root/"inc/premium-ua-interiors/google-ads.php").read_text(encoding="utf-8")
assert "mrseo_ua_menu_groups()" in main
assert "mrseo_url($mrseo_ads_service[0],'uk')" in main
assert "mrseo_ads_catalog" in main
assert main.count("<h1 ")==1
assert all(price not in main for price in ("5 000", "5 900", "10 000", "9 500"))
assert "ФОРМАТИ СПІВПРАЦІ" in main
assert "Обговорити рекламу" in main and "Обговорити магазин" in main
assert "X-Robots-Tag: noindex, nofollow" in (root/"functions.php").read_text(encoding="utf-8")
assert "function mrseo_i18n_current_entry" in (root/"inc/international-seo.php").read_text(encoding="utf-8")
assert "ведення окремо" in semantic["google-ads-audit"]["description"]
assert "без гарантій розблокування" in semantic["merchant-center"]["description"]
assert all(u in semantic for u,_ in semantic["merchant-center"]["related"])
print("Eight Ukrainian Google Ads pages, seven child routes, unique metadata, no public prices and noindex intact.")
