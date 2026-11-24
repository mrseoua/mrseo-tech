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
# Live Serpstat g_ua commercial variants, verified 2026-11-22.
# Frequencies are per keyword, not summed traffic forecasts.
required_variants={
 "google-ads":["контекстна реклама сайту","контекстна реклама замовити","налаштування гугл реклами"],
 "performance-max":["perf max","перформанс макс"],
 "google-shopping":["гугл шопінг"],
 "google-ads-audit":["аудит контекстної реклами"],
 "merchant-center":["мерчант центр"],
}
for slug, variants in required_variants.items():
 assert all(kw in semantic[slug]["secondary"] for kw in variants),(slug,variants)

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

# The real hub uses the same problem-first layout as the five paid campaign pages.
assert main.count('class="service-problem-answer"')==3 and main.count('class="service-problem-copy"')==3
assert main.index('id="ukads-problems"')<main.index('id="ukads-services"')<main.index('data-pti-story="ads"')<main.index('id="ukads-pricing"')
assert main.count('class="service-deliverable"')==1
assert all("'"+slug+"'=>array(" in main for slug in child)
assert 'data-service-standard="v1"' in (root/"premium-ua-interior.php").read_text()
assert "service-standard.css" in (root/"premium-ua-interior.php").read_text()
assert "prefers-reduced-motion" in (root/"assets/service-standard.css").read_text()
print("PASS: Ads hub standard v1, seven service destinations, three clear problems/solutions, no pricing changes")
