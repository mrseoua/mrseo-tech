#!/usr/bin/env python3
"""Static source checks: not a substitute for live crawl, performance or ranking tests."""
import json, re
from pathlib import Path
ROOT=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
def load(path,marker):
    source=(ROOT/path).read_text(encoding="utf8")
    m=re.search(r"<<<'"+re.escape(marker)+r"'\s*\n([\s\S]*?)\n"+re.escape(marker),source)
    assert m, (path,"missing source")
    return json.loads(m.group(1))
menu=next(g for g in load("inc/mega-menu-trial.php","MRSEO_UA_MENU_GROUPS") if g["key"]=="seo")
slugs=[x[0] for group in menu["sections"] for x in group["items"]]
assert len(slugs)==len(set(slugs))==18
semantic=load("inc/ua-semantic-map.php","MRSEO_UA_SEMANTIC_MAP")
pages=["seo"]+slugs
titles,descs,primaries=[],[],[]
for slug in pages:
    assert slug in semantic,slug
    d=semantic[slug]
    for k in ("title","description","primary"):
        assert d.get(k),(slug,k)
    # Some route-specific lead copy lives in a service template rather than the keyword map.
    assert 34<=len(d["title"])<=74,(slug,"title length")
    assert 100<=len(d["description"])<=185,(slug,"description length")
    assert not re.search(r"[\U0001F000-\U0001FAFF\u2600-\u27BF]",d["description"]),(slug,"emoji")
    titles.append(d["title"]);descs.append(d["description"]);primaries.append(d["primary"])
assert len(set(titles))==len(set(descs))==len(set(primaries))==19
assert "а не автоматичне виправлення" in semantic["seo-audit"]["lead"]
assert "Впровадження змін погоджуємо окремо" in semantic["website-audit"]["lead"]
assert "впроваджуємо їх" in semantic["indexing-fixes"]["lead"]
assert len(semantic["website-audit"]["related"])>=2
assert len(semantic["traffic-recovery"]["related"])>=2
for slug in ("website-audit","traffic-recovery"):
    assert all(t in semantic or t in ("store-conversion",) for t,_ in semantic[slug]["related"])
page=(ROOT/"premium-seo-cluster.php").read_text(encoding="utf8")
for slug in ("local-seo","ecommerce-seo","service-business-seo","international-seo","seo-audit"):
    assert "'"+slug+"'=>array(" in page,slug
assert 'class="psc-seo-related"' in page
assert "mrseo_url($related[0],'uk')" in page
hub=(ROOT/"inc/premium-ua-interiors/seo.php").read_text(encoding="utf8")
assert "mrseo_seo_catalog" not in hub, "The SEO hub must not promote 18 services as top-level choices"
assert "seo-cinematic-directions.php" in hub
visual=(ROOT/"inc/seo-cinematic-directions.php").read_text(encoding="utf8")
assert len(re.findall(r"array\\('(?:seo-audit|ecommerce-seo|local-seo|service-business-seo|international-seo)'",visual))==5
for slug in ("seo-audit","ecommerce-seo","local-seo","service-business-seo","international-seo"):
    assert "'"+slug+"'" in visual,slug
assert "X-Robots-Tag: noindex, nofollow" in (ROOT/"functions.php").read_text(encoding="utf8")
assert "function mrseo_i18n_current_entry" in (ROOT/"inc/international-seo.php").read_text(encoding="utf8")
print("UA SEO: all 19 legacy metadata sets preserved, five primary cinematic links in hub, scoped intent and contextual links OK")
