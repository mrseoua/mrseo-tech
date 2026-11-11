#!/usr/bin/env python3
"""Original Italian editorial and 25-service navigation regression checks."""
from pathlib import Path
import json,re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
def read(path):return (root/path).read_text(encoding="utf-8")
def load(path,marker):
    m=re.search(r"<<<'"+re.escape(marker)+r"'\n([\s\S]*?)\n"+re.escape(marker)+r";?\n",text)
    assert m,(path,"missing or malformed JSON")
    return json.loads(m.group(1))
p1=load("inc/it-service-part1.php","MRSEO_IT_P1")
p2=load("inc/it-service-part2.php","MRSEO_IT_P2")
pages={**p1,**p2}
assert len(p1)==10 and len(p2)==9 and len(pages)==19
titles=[];descriptions=[];leads=[];heroes=[]
for slug,page in pages.items():
    assert re.fullmatch(r"[a-z0-9]+(?:-[a-z0-9]+)*",slug),slug
    for key in ("title","description","kicker","lead","intro","introText","risk","cta"):
        assert len(page[key].strip())>=(8 if key=="kicker" else 12),(slug,key)
    assert len(page["description"])<=195,(slug,"long meta")
    assert len(page["hero"])==2 and all(len(x.strip())>=10 for x in page["hero"]),(slug,"hero")
    assert len(page["problems"])==3 and all(len(x)==3 and all(len(y)>12 for y in x) for x in page["problems"]),(slug,"problems")
    assert len(page["process"])==4 and all(len(x)==2 and all(x) for x in page["process"]),(slug,"process")
    assert len(page["outcomes"])==3 and all(len(x)==2 and all(x) for x in page["outcomes"]),(slug,"outcomes")
    assert len(page["faq"])==3 and all(len(x)==2 and all(x) for x in page["faq"]),(slug,"faq")
    assert len(page["related"])==2 and all(len(x)==3 and x[0]!=slug for x in page["related"]),(slug,"related")
    assert len(page["example"])==4 and page["example"][0]=="ESEMPIO DI SITUAZIONE",(slug,"example")
    assert len(page["visual"])==3 and len(set(page["visual"]))==3,(slug,"visual")
    assert "garantiamo il primo posto" not in page["lead"].lower(),slug
    titles.append(page["title"]);descriptions.append(page["description"]);leads.append(page["lead"]);heroes.append(" ".join(page["hero"]))
assert len(set(titles))==len(set(descriptions))==len(set(leads))==len(set(heroes))==19,"Italian duplicate copy"

# Italy-specific commerce facts and native-language quality guards.
assert "Servizio di shopping comparativo" in pages["google-shopping"]["lead"]
assert "In Italia" in pages["google-shopping"]["faq"][0][0]
assert "CSS" in pages["google-shopping"]["faq"][0][1]
assert "rifiuti Merchant" not in pages["merchant-center-help"]["cta"]
assert "per voi?" not in pages["web-applications"]["hero"][1]
assert "Potremo integrare" not in pages["web-applications"]["faq"][1][0]
assert "redirezioni" not in str(pages["website-redesign"])
existing_it=load("inc/eu-content.php","MRSEO_EU_JSON")["it"]
assert existing_it["code"]=="it-IT"
assert existing_it["nav"][0]=="Servizi"
assert "Non inviare credenziali" in existing_it["pages"]["contact"]["lead"]
assert existing_it["pages"]["contact"]["lead"].count("Non inviare")==1
assert "inviata" in existing_it["ui"][12]
assert "collaboriamo" in existing_it["ui"][16].lower()

menu=read("inc/mega-menu-trial.php")
m=re.search(r"if\(\$locale==='it'\)return array\((.*?)\n \);",menu,re.S)
assert m,"Missing Italian menu destinations"
links=[]
for pillar in ("seo","ads","commerce","sites","dev"):
    x=re.search(r"'"+pillar+r"'=>array\(([^)]*)\)",m.group(1))
    assert x,pillar
    group=re.findall(r"'([^']+)'",x.group(1))
    assert len(group)==5,(pillar,group)
    links.extend(group)
assert len(links)==len(set(links))==25,"25 unique working Italian menu destinations required"
shared={"ecommerce-seo","seo-audit","google-ads","web-development","website-design","online-shop-development"}
assert set(links)-set(pages)==shared,("Missing service",set(links)-set(pages))
assert set(pages)<=set(links),("Orphaned service",set(pages)-set(links))
assert "null" not in m.group(1) and "horoshop" not in m.group(1)
nav_match=re.search(r"<<<'MRSEO_TRIAL_NAV_JSON'\n([\s\S]*?)\nMRSEO_TRIAL_NAV_JSON;",menu)
assert nav_match,"Missing Italian mega-menu translations"
nav=json.loads(nav_match.group(1))
assert "it" in nav and all(len(nav["it"][x])==7 for x in ("seo","ads","commerce","sites","dev"))
scenes=load("inc/it-service-art.php","MRSEO_IT_ART")
assert set(scenes)==set(pages) and len({x["variant"] for x in scenes.values()})==19
assert all(x["nodes"]==pages[k]["visual"] for k,x in scenes.items())
template=read("it-service-landing.php")
assert template.count("<h1 ")==1
assert "mrseo_it_render_unique_scene($pl_slug)" in template
assert "mrseo_url('contact','it')" in template
assert 'class="pl-svc it-svc' in template
assert "pl-svc-scene-steps" not in template
assert "EXEMPIO" not in template and "ESEMPIO" in template
assert "if(mrseo_locale()!=='it'" in template
assert "mrseo_it_service_rules_v1" in read("inc/it-service-routing.php")
assert "require_once get_template_directory() . '/inc/it-service-routing.php'" in read("functions.php")
assert "wp_enqueue_style('mrseo-it-services'" in read("functions.php")
assert "function_exists('mrseo_it_service_route') && mrseo_it_service_route()" in read("functions.php")
assert "prefers-reduced-motion:reduce" in read("assets/it-services.css")
assert "X-Robots-Tag: noindex, nofollow" in read("functions.php")
assert "mrseo_it_service_slugs" in read("inc/international-seo.php")
print("Italy complete PASS: 19 original landings + six existing = 25 real menu services, 19 scenes, preserved robots")
