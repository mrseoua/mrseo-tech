#!/usr/bin/env python3
"""Enforce genuine UK editorial/UI parity without changing Ukraine/Russia/EU routes."""
import json
import re
from pathlib import Path
root=Path(__file__).resolve().parents[1] / "wp-content/themes/mrseo-tech"

def text(path):
    return (root/path).read_text(encoding="utf-8")

def load(path,marker):
    data=text(path)
    m=re.search(re.escape(marker)+r"'\s*\n([\s\S]*?)\n"+re.escape(marker)+r";",data)
    assert m,(path,"missing JSON content")
    return json.loads(m.group(1))

core=load("inc/uk-market-core-content.php","MRSEO_UK_CORE")
existing=load("inc/uk-market-content.php","MRSEO_UK_MARKET")
part1=load("inc/en-gb-services-part1.php","MRSEO_GB_PART1")
part2=load("inc/en-gb-services-part2.php","MRSEO_GB_PART2")
part3=load("inc/en-gb-services-part3.php","MRSEO_GB_PART3")
new={**part1,**part2,**part3}
assert (len(core),len(existing),len(new))==(7,6,16)
assert len(set(core)|set(existing)|set(new))==29, "UK service slug collision"
assert len(set(p["title"] for p in new.values()))==16
assert len(set(p["description"] for p in new.values()))==16
assert len(set(tuple(p["headline"]) for p in new.values()))==16
assert len(set(p["result"] for p in new.values()))==16
for slug,p in new.items():
    assert 50<=len(p["description"])<=195,(slug,"meta description")
    assert len(p["lead"])>=115 and len(p["result"])>=65,slug
    assert len(p["headline"])==2 and all(p["headline"]),slug
    assert len(p["pains"])==len(p["benefits"])==len(p["faq"])==3,slug
    assert len(p["related"])==2 and all(len(row)==2 for row in p["related"]),slug
    assert all(len(row)==2 and all(row) for field in ("pains","benefits","faq") for row in p[field]),slug
    assert "<em>" in p["sectionTitle"] and "<em>" in p["ctaTitle"],slug
    assert p["button"] and p["scenelabel"] and p["ctaLead"],slug
    assert "guaranteed rankings" not in p["lead"].lower(),slug
    for dest,title in p["related"]:
        assert dest in new or dest in core or dest in existing or dest=="web-development",(slug,dest)
assert new["ga4-conversions"]["title"]!=core["analytics"]["title"]
assert "GA4" in new["ga4-conversions"]["kicker"]
assert "marketing" in core["analytics"]["title"].lower()
assert "new websites" in core["service-websites"]["desc"].lower()
assert "separate" in core["service-websites"]["lead"].lower()
boilerplate=(
 "Identify what the available evidence shows.",
 "Check how this affects the customer journey.",
 "Agree a testable correction or next step.",
 "A clearly defined deliverable for the agreed scope.",
 "Recommendations grounded in the review.",
 "A way to check the work and identify limitations.",
 "Establish the commercial goal and current constraints.",
 "Review the relevant accounts, pages and settings.",
 "Agree changes that can be safely implemented.",
 "Validate the outcome and document next steps.",
 "We inspect the relevant pages, systems and source data.",
 "We check specific changes and their effect against the agreed goal.",
)
for slug,p in {**core,**existing}.items():
    body=json.dumps(p,ensure_ascii=False)
    assert not any(x in body for x in boilerplate),("generic UK copy",slug)
    assert len(p["problems"])==len(p["outcomes"])==len(p["faq"])==3,slug
    assert p["title"] and p["desc"] and len(p["hero"])==2,slug

menu=text("inc/mega-menu-trial.php")
m=re.search(r"if\(\$locale==='en'\)return array\((.*?)\n \);",menu,re.S)
assert m, "Missing UK menu map"
for cat in ("seo","ads","commerce","sites","dev"):
    match=re.search(r"'"+cat+r"'=>array\(([^)]*)\)",m.group(1))
    assert match,(cat,"missing UK menu group")
    urls=re.findall(r"'([^']+)'",match.group(1))
    assert len(urls)==5 and len(set(urls))==5,(cat,urls)
    assert all(slug in new or slug in core or slug in existing or slug=="web-development" for slug in urls),(cat,urls)
assert "null" not in m.group(1) and "horoshop" not in m.group(1)
assert "mrseo_en_gb_slugs()" in menu

shared=text("ua-website-landing.php")
assert "mrseo_en_gb_route()" in shared and "mrseo_en_gb_data(mrseo_slug())" in shared
assert "mrseo_render_ua_service_scene($kind,$tr(" in shared
assert shared.count("<h1 ")==1 and shared.count('class="ukseo-final uws-final"')==1
assert "mrseo_ru_website_data(mrseo_slug())" in shared and "mrseo_ua_website_data(mrseo_slug())" in shared
existing_tpl=text("uk-market-landing.php")
assert "pl-svc--en-gb-compact" in existing_tpl
assert existing_tpl.count("<h1 ")==1
assert all("pl-svc-"+x in existing_tpl for x in ("hero","needs","outcomes","faq","final"))
assert not any("pl-svc-"+x in existing_tpl for x in ("example","process","limits","related"))
scene=text("inc/ua-service-scenes.php")
assert "if($locale==='en')$presets=array(" in scene
assert "'ga4-conversions'=>array(" in scene
assert "if($locale==='ru')$presets=array(" in scene
assert "if(!isset($presets[$kind]))return;" in scene
routing=text("inc/en-gb-services.php")
assert "mrseo_en_gb_parent" in routing and "add_rewrite_rule" in routing
assert "mrseo_en_gb_route()" in routing and "pre_get_document_title" in routing
functions=text("functions.php")
assert "inc/en-gb-services.php" in functions
assert "mrseo-en-gb-interior" in functions and "mrseo-en-gb-website-scenes" in functions
assert "mrseo_locale()==='en' && mrseo_slug()!==''" in functions
assert "X-Robots-Tag: noindex, nofollow" in functions
styles=text("assets/en-gb-interiors.css")+text("assets/en-gb-scenes.css")
assert "@media(prefers-reduced-motion:reduce)" in styles
assert "font-size:12px" in styles
assert ".orbit-lab" not in styles and ".lab-shell" not in styles
print("UK parity PASS: 29 UK service pages (13 existing + 16 new), 25 real menu destinations, distinct GA4/marketing, native UX, noindex.")
