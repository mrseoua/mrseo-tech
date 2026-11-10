#!/usr/bin/env python3
"""Require all 25 French service destinations and 19 original FR page narratives."""
from pathlib import Path
import json,re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
def read(path):return (root/path).read_text(encoding="utf-8")
def load(path,marker):
    text=read(path)
    m=re.search(r"<<<'"+re.escape(marker)+r"'\n([\s\S]*?)\n"+re.escape(marker)+r"\n",text)
    assert m,(path,"missing content")
    return json.loads(m.group(1))
part1=load("inc/fr-service-part1.php","MRSEO_FR_P1")
part2=load("inc/fr-service-part2.php","MRSEO_FR_P2")
data={**part1,**part2}
assert len(part1)==10 and len(part2)==9 and len(data)==19
titles=[];leads=[];descriptions=[];scenes=[]
for slug,page in data.items():
    assert re.fullmatch(r"[a-z0-9]+(?:-[a-z0-9]+)*",slug),slug
    for field in ("title","description","kicker","lead","intro","introText","risk","cta"):
        assert len(page[field])>=(8 if field=='kicker' else 15),(slug,field)
    assert len(page["description"])<=195,(slug,"description")
    assert len(page["hero"])==2 and all(len(x)>10 for x in page["hero"]),slug
    assert len(page["problems"])==3 and all(len(x)==3 and all(x) for x in page["problems"]),slug
    assert len(page["process"])==4 and all(len(x)==2 for x in page["process"]),slug
    assert len(page["outcomes"])==3 and all(len(x)==2 for x in page["outcomes"]),slug
    assert len(page["faq"])==3 and all(len(x)==2 for x in page["faq"]),slug
    assert len(page["related"])==2 and all(len(x)==3 for x in page["related"]),slug
    assert all(x[0]!=slug for x in page["related"]),slug
    assert len(page["example"])==4 and page["example"][0]=="EXEMPLE DE SITUATION",slug
    assert len(page["visual"])==3 and len(set(page["visual"]))==3,slug
    assert "garantie de première place" not in page["lead"],slug
    titles.append(page["title"]);leads.append(page["lead"]);descriptions.append(page["description"])
assert len(set(titles))==len(set(leads))==len(set(descriptions))==19,"Duplicated FR SEO content"

menu=read("inc/mega-menu-trial.php")
m=re.search(r"if\(\$locale==='fr'\)return array\((.*?)\n \);",menu,re.S)
assert m,"French menu missing"
links=[]
for pillar in ("seo","ads","commerce","sites","dev"):
    x=re.search(r"'"+pillar+r"'=>array\(([^)]*)\)",m.group(1))
    assert x,pillar
    group=re.findall(r"'([^']+)'",x.group(1))
    assert len(group)==5,(pillar,group)
    links.extend(group)
assert len(links)==len(set(links))==25,("Missing or duplicate French menu destination",links)
shared={"ecommerce-seo","seo-audit","google-ads","web-development","website-design","online-shop-development"}
assert set(links)-set(data)==shared,("French pages not completed",set(links)-set(data))
assert set(data)<=set(links),("Orphaned French pages",set(data)-set(links))
assert "null" not in m.group(1) and "horoshop" not in m.group(1)

scenes=load("inc/fr-service-art.php","MRSEO_FR_ART")
assert set(scenes)==set(data) and len({x["variant"] for x in scenes.values()})==19
assert all(x["nodes"]==data[k]["visual"] for k,x in scenes.items())
routing=read("inc/fr-service-routing.php")
assert "mrseo_fr_service_rules_v1" in routing
assert "mrseo_fr_service_slugs()" in routing
assert "mrseo_fr_service_route()?" in routing
template=read("fr-service-landing.php")
assert template.count('<h1 ')==1
assert "mrseo_fr_render_unique_scene($pl_slug)" in template
assert 'pl-svc-scene-steps' not in template, 'Duplicated hero stages must not reappear under the scene'
assert "mrseo_url('contact','fr')" in template
assert 'class="pl-svc fr-svc' in template
assert "EXEMPLE" in read("inc/fr-service-part1.php")
assert "Ścieżka" not in template
assert "require_once get_template_directory() . '/inc/fr-service-routing.php'" in read("functions.php")
assert "wp_enqueue_style('mrseo-fr-services'" in read("functions.php")
assert "prefers-reduced-motion:reduce" in read("assets/fr-services.css")
assert "X-Robots-Tag: noindex, nofollow" in read("functions.php")
seo=read("inc/international-seo.php")
assert "mrseo_fr_service_slugs" in seo
print("French QA PASS: 19 original French landings, 6 existing service pages, 25 menu anchors, 19 distinct scenes and strict noindex.")
