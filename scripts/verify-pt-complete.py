#!/usr/bin/env python3
"""Portuguese market release gate: 19 original pages, 25 real services and isolated styling."""
from pathlib import Path
import json,re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
def read(path):return (root/path).read_text(encoding="utf-8")
def json_php(path,marker):
    m=re.search(r"<<<'"+re.escape(marker)+r"'\n([\s\S]*?)\n"+re.escape(marker)+r";?\n",read(path))
    assert m,(path,"missing JSON nowdoc")
    return json.loads(m.group(1))
a=json_php("inc/pt-service-part1.php","MRSEO_PT_P1")
b=json_php("inc/pt-service-part2.php","MRSEO_PT_P2")
pages={**a,**b}
assert len(a)==10 and len(b)==9 and len(pages)==19
for key in ("title","description","kicker","lead","intro","introText","risk","cta"):
    vals=[p[key] for p in pages.values()]
    assert len(set(vals))==19,(key,"duplicate copy")
    assert all(len(v)>12 and (key!="description" or len(v)<=195) for v in vals),key
for slug,p in pages.items():
    assert re.fullmatch(r"[a-z0-9]+(?:-[a-z0-9]+)*",slug),slug
    assert len(p["hero"])==2 and all(len(x)>10 for x in p["hero"]),(slug,"hero")
    assert len(p["problems"])==3 and all(len(x)==3 and all(len(y)>10 for y in x) for x in p["problems"]),(slug,"problems")
    assert len(p["process"])==4 and all(len(x)==2 for x in p["process"]),(slug,"process")
    assert len(p["outcomes"])==3 and all(len(x)==2 for x in p["outcomes"]),(slug,"outcomes")
    assert len(p["faq"])==3 and all(len(x)==2 for x in p["faq"]),(slug,"faq")
    assert len(p["example"])==4 and p["example"][0]=="SITUAÇÃO ILUSTRATIVA",(slug,"example")
    assert len(p["visual"])==3 and len(set(p["visual"]))==3,(slug,"visual")
    assert len(p["related"])==2 and all(x[0]!=slug for x in p["related"]),(slug,"related")
assert "IVA" in pages["google-shopping"]["risk"]
assert "CSS" in pages["google-shopping"]["faq"][1][0] and "Comparison Shopping Service" in pages["google-shopping"]["faq"][1][1]
assert len({x["description"] for x in pages.values()}) == 19
assert len({p["hero"][0] for p in pages.values()}) == 19
assert len({tuple(tuple(x) for x in p["process"]) for p in pages.values()}) == 19
assert all(all(len(node)<=8 for node in p["visual"]) for p in pages.values())
assert "não inclui automaticamente" in pages["google-ads-audit"]["risk"].lower()
menu=read("inc/mega-menu-trial.php")
mm=re.search(r"if\(\$locale==='pt'\)return array\(([\s\S]*?)\n\s*\);",menu)
assert mm,"PT menu routes missing"
links=[]
for group in ("seo","ads","commerce","sites","dev"):
    row=re.search(r"'"+group+r"'=>array\(([^)]*)\)",mm.group(1))
    assert row,group
    items=re.findall(r"'([^']+)'",row.group(1))
    assert len(items)==5,(group,items)
    links.extend(items)
assert len(links)==len(set(links))==25,links
existing={"ecommerce-seo","seo-audit","google-ads","web-development","website-design","online-shop-development"}
assert set(links)==set(pages)|existing
assert "null" not in mm.group(1) and "horoshop" not in mm.group(1)
nav=json_php("inc/mega-menu-trial.php","MRSEO_TRIAL_NAV_JSON")
assert "pt" in nav and all(len(nav["pt"][x])==7 for x in ("seo","ads","commerce","sites","dev"))
scenes=json_php("inc/pt-service-art.php","MRSEO_PT_ART")
assert len(scenes)==19 and set(scenes)==set(pages)
assert len({v["variant"] for v in scenes.values()})==19
assert all(scenes[k]["nodes"]==p["visual"] for k,p in pages.items())
tpl=read("pt-service-landing.php")
assert tpl.count("<h1 ")==1 and "mrseo_pt_render_unique_scene($pl_slug)" in tpl
assert "mrseo_url('contact','pt')" in tpl and 'class="pl-svc pt-svc' in tpl
assert "EXEMPLO / PROCESSO" in tpl and "mrseo_locale()!=='pt'" in tpl
assert "mrseo_pt_service_rules_v1" in read("inc/pt-service-routing.php")
fn=read("functions.php")
assert "/inc/pt-service-routing.php" in fn
assert "wp_enqueue_style('mrseo-pt-services'" in fn
assert "wp_enqueue_script('mrseo-pt-hero-contact'" in fn
assert "mrseo_pt_service_route()" in fn
assert "mrseo_pt_service_slugs" in read("inc/international-seo.php")
assert "prefers-reduced-motion:reduce" in read("assets/pt-services.css")
assert "IntersectionObserver" in read("assets/pt-service-hero-contact.js")
assert "mrseo-pt-scene-visible" in read("assets/pt-services.css")
assert "X-Robots-Tag: noindex, nofollow" in fn
base=json.loads(read("locales/pt-full.json"))
assert base["code"]=="pt-PT" and len(base["pages"]["contact"]["lead"])>25
print("PT PASS: 19 original services, 25 real menu links, 19 unique scenes and staging noindex")
