#!/usr/bin/env python3
"""Final six markets: complete localized copy, navigation, independent service intent and safety."""
from pathlib import Path
import json,re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
def read(p): return (root/p).read_text(encoding="utf-8")
codes={"fi":"fi-FI","hu":"hu-HU","sk":"sk-SK","el":"el-GR","bg":"bg-BG","hr":"hr-HR"}
slugs=set("local-seo service-business-seo international-seo google-shopping local-google-ads google-ads-audit merchant-center-help woocommerce-shopify-stores store-conversion catalog-automation store-migration service-websites landing-pages corporate-websites website-redesign wordpress-care api-integrations website-speed-security web-applications".split())
existing=set("ecommerce-seo seo-audit google-ads web-development website-design online-shop-development".split())
engine=read("inc/final-market-services.php")
template=read("final-market-landing.php")
keys=set(re.findall(r"\$labels\['([^']+)'\]",engine+template))
keys.remove("caseLabels")
all_titles=[]; all_descriptions=[]; all_leads=[]
for locale,code in codes.items():
    data=json.loads(read(f"locales/{locale}-services.json"))
    base=json.loads(read(f"locales/{locale}-full.json"))
    assert data["code"]==base["code"]==code,locale
    pages=data["pages"]; labels=data["labels"]; nav=data["nav"]
    assert set(pages)==slugs,(locale,"missing or extra services")
    assert all(isinstance(labels.get(k),str) and labels[k].strip() for k in keys),(locale,"missing template label")
    assert len(labels["caseLabels"])==3 and all(labels["caseLabels"]),locale
    assert set(nav)=={"seo","ads","commerce","sites","dev","bottom"},locale
    assert all(len(nav[g])==7 and all(nav[g]) for g in ("seo","ads","commerce","sites","dev")) and len(nav["bottom"])==3,locale
    for key in ("title","description","lead","intro","introText","risk","cta"):
        vals=[p[key] for p in pages.values()]
        assert len(set(vals))==19 and all(isinstance(v,str) and len(v.strip())>10 for v in vals),(locale,key)
    for slug,p in pages.items():
        assert 70<len(p["description"])<=195,(locale,slug,"description")
        assert len(p["hero"])==2 and all(len(v)>8 for v in p["hero"]),(locale,slug,"hero")
        for k,n,w in (("problems",3,3),("process",4,2),("outcomes",3,2),("faq",3,2),("related",2,3)):
            assert len(p[k])==n and all(len(row)==w and all(isinstance(v,str) and v.strip() for v in row) for row in p[k]),(locale,slug,k)
        assert all(len(row[1])>12 for row in p["problems"]),(locale,slug,"problem body")
        assert len(p["example"])==4 and all(len(v)>5 for v in p["example"]),(locale,slug,"example")
        assert len(p["visual"])==len(set(p["visual"]))==3 and all(1<=len(v)<=8 for v in p["visual"]),(locale,slug,"visual")
        assert all(row[0] in slugs|set(base["pages"]) and row[0]!=slug for row in p["related"]),(locale,slug,"related")
        assert f".pl-art--{slug}" in read("assets/final-market-services.css"),(locale,slug,"art")
        all_titles.append(p["title"]);all_descriptions.append(p["description"]);all_leads.append(p["lead"])
    assert base["pages"]["google-ads"]["title"]!=pages["google-ads-audit"]["title"],locale
    assert base["market"]["brief"] in base["pages"]["contact"]["lead"],locale
    assert existing<=set(base["pages"]),locale
    print(f"{locale.upper()} PASS: 19 complete landings, 25 native menu links, contact brief, localized metadata and examples")
assert len(set(all_titles))==len(set(all_descriptions))==len(set(all_leads))==114
assert template.count("<h1 ")==1 and "mrseo_final_market_render_scene" in template
assert "mrseo_final_market_rules_v1" in engine
assert "mrseo_final_market_alternates" in read("inc/international-seo.php")
assert "mrseo_final_market_routes" in read("inc/mega-menu-trial.php")
assert "X-Robots-Tag: noindex, nofollow" in read("functions.php")
assert "prefers-reduced-motion:reduce" in read("assets/final-market-services.css")
assert "IntersectionObserver" in read("assets/final-market-contact.js")
print("FINAL MARKETS PASS: 114 complete localized service pages, 150 menu links, 6 native language packages.")
