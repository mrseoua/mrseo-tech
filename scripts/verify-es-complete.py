#!/usr/bin/env python3
"""Spain market release gates: original commercial copy, actual service links and safety."""
from pathlib import Path
import json,re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
def read(path):return (root/path).read_text(encoding="utf-8")
def load(path,marker):
    m=re.search(r"<<<'"+re.escape(marker)+r"'\n([\s\S]*?)\n"+re.escape(marker)+r";?\n",read(path))
    assert m,(path,"missing or malformed JSON data")
    return json.loads(m.group(1))
p1=load("inc/es-service-part1.php","MRSEO_ES_P1")
p2=load("inc/es-service-part2.php","MRSEO_ES_P2")
pages={**p1,**p2}
assert len(p1)==10 and len(p2)==9 and len(pages)==19
titles=[];descriptions=[];leads=[];heroes=[];intros=[]
for slug,page in pages.items():
    assert re.fullmatch(r"[a-z0-9]+(?:-[a-z0-9]+)*",slug),slug
    for field in ("title","description","kicker","lead","intro","introText","risk","cta"):
        assert len(page[field].strip())>=(8 if field=="kicker" else 12),(slug,field)
    assert len(page["description"])<=195,(slug,"meta too long")
    assert len(page["hero"])==2 and all(len(x)>10 for x in page["hero"]),(slug,"hero")
    assert len(page["problems"])==3 and all(len(x)==3 and all(len(y)>12 for y in x) for x in page["problems"]),(slug,"problems")
    assert len(page["process"])==4 and all(len(x)==2 and all(x) for x in page["process"]),(slug,"process")
    assert len(page["outcomes"])==3 and all(len(x)==2 for x in page["outcomes"]),(slug,"outcomes")
    assert len(page["faq"])==3 and all(len(x)==2 and all(x) for x in page["faq"]),(slug,"faq")
    assert len(page["related"])==2 and all(len(x)==3 and x[0]!=slug for x in page["related"]),(slug,"related")
    assert len(page["example"])==4 and page["example"][0]=="EJEMPLO DE SITUACIÓN",(slug,"example")
    assert len(page["visual"])==3 and len(set(page["visual"]))==3,(slug,"visual")
    titles.append(page["title"]);descriptions.append(page["description"]);leads.append(page["lead"]);heroes.append(" ".join(page["hero"]))
    assert len(page["intro"])<=88 and " — " not in page["intro"],(slug,"cluttered section heading")
    intros.append(page["intro"])
assert len(set(titles))==len(set(descriptions))==len(set(leads))==len(set(heroes))==19,"Duplicated Spanish commercial copy"
assert len(set(intros))==19,"Spanish section headings must be original and concise"
# Spanish-local Google Shopping requirement, from official Merchant Center help.
assert "servicio de comparación de precios" in pages["google-shopping"]["lead"]
assert "En España" in pages["google-shopping"]["faq"][0][0]
assert "CSS" in pages["google-shopping"]["faq"][0][1]
assert "Google Shopping" in pages["google-shopping"]["faq"][0][1]
assert "aprobar" not in pages["merchant-center-help"]["cta"].lower()
menu=read("inc/mega-menu-trial.php")
m=re.search(r"if\(\$locale==='es'\)return array\((.*?)\n \);",menu,re.S)
assert m,"Spanish mega-menu route map missing"
links=[]
for pillar in ("seo","ads","commerce","sites","dev"):
    x=re.search(r"'"+pillar+r"'=>array\(([^)]*)\)",m.group(1))
    assert x,pillar
    group=re.findall(r"'([^']+)'",x.group(1))
    assert len(group)==5,(pillar,group)
    links.extend(group)
assert len(links)==len(set(links))==25,("Duplicate or missing Spanish menu entries",links)
shared={"ecommerce-seo","seo-audit","google-ads","web-development","website-design","online-shop-development"}
assert set(links)-set(pages)==shared,("Spanish services not completed",set(links)-set(pages))
assert set(pages)<=set(links),("Orphaned Spanish services",set(pages)-set(links))
assert "null" not in m.group(1) and "horoshop" not in m.group(1)
nav_match=re.search(r"<<<'MRSEO_TRIAL_NAV_JSON'\n([\s\S]*?)\nMRSEO_TRIAL_NAV_JSON;",menu)
assert nav_match,"Menu native translations missing"
nav=json.loads(nav_match.group(1))
assert "es" in nav and all(len(nav["es"][k])==7 for k in ("seo","ads","commerce","sites","dev"))
assert len(nav["es"]["bottom"])==3 and "¿" in nav["es"]["bottom"][0]
scenes=load("inc/es-service-art.php","MRSEO_ES_ART")
assert len(scenes)==19 and set(scenes)==set(pages)
assert len({v["variant"] for v in scenes.values()})==19
assert all(v["nodes"]==pages[k]["visual"] for k,v in scenes.items())
template=read("es-service-landing.php")
assert template.count("<h1 ")==1
assert "mrseo_es_render_unique_scene($pl_slug)" in template
assert "mrseo_url('contact','es')" in template
assert 'class="pl-svc es-svc' in template
assert "pl-svc-scene-steps" not in template
assert "if(mrseo_locale()!=='es'" in template
assert "EJEMPLO / PROCESO" in template
assert "mrseo_es_service_rules_v1" in read("inc/es-service-routing.php")
assert "require_once get_template_directory() . '/inc/es-service-routing.php'" in read("functions.php")
assert "wp_enqueue_style('mrseo-es-services'" in read("functions.php")
assert "function_exists('mrseo_es_service_route') && mrseo_es_service_route()" in read("functions.php")
assert "prefers-reduced-motion:reduce" in read("assets/es-services.css")
assert "mrseo-es-hero-contact" in read("functions.php")
assert "IntersectionObserver" in read("assets/es-service-hero-contact.js")
assert "mrseo-es-scene-visible" in read("assets/es-services.css")
assert "X-Robots-Tag: noindex, nofollow" in read("functions.php")
assert "mrseo_es_service_slugs" in read("inc/international-seo.php")
existing_es=load("inc/eu-content.php","MRSEO_EU_JSON")["es"]
assert existing_es["code"]=="es-ES" and existing_es["nav"][0]=="Servicios"
assert "No compartas contraseñas" in existing_es["pages"]["contact"]["lead"]
print("Spain content PASS: 19 original services + six existing routes = 25 linked menu items, 19 scenes, CSS and noindex")
