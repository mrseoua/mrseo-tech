#!/usr/bin/env python3
"""Require all 25 German service destinations and 21 original DE page narratives."""
from pathlib import Path
import json,re
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
def read(path):return (root/path).read_text(encoding="utf-8")
def load(path,marker):
    text=read(path)
    m=re.search(r"<<<'"+re.escape(marker)+r"'\n([\s\S]*?)\n"+re.escape(marker)+r"\n",text)
    assert m,(path,"missing content")
    return json.loads(m.group(1))
part1=load("inc/de-service-part1.php","MRSEO_DE_P1")
part2=load("inc/de-service-part2.php","MRSEO_DE_P2")
data={**part1,**part2}
assert len(part1)==10 and len(part2)==11 and len(data)==21
titles=[];leads=[];descriptions=[];scenes=[]
for slug,page in data.items():
    assert re.fullmatch(r"[a-z0-9]+(?:-[a-z0-9]+)*",slug),slug
    for field in ("title","description","kicker","lead","intro","introText","risk","cta"):
        assert len(page[field])>=15,(slug,field)
    assert len(page["description"])<=195,(slug,"description")
    assert len(page["hero"])==2 and all(len(x)>10 for x in page["hero"]),slug
    assert len(page["problems"])==3 and all(len(x)==3 and all(x) for x in page["problems"]),slug
    assert len(page["process"])==4 and all(len(x)==2 for x in page["process"]),slug
    assert len(page["outcomes"])==3 and all(len(x)==2 for x in page["outcomes"]),slug
    assert len(page["faq"])==3 and all(len(x)==2 for x in page["faq"]),slug
    assert len(page["related"])==2 and all(len(x)==3 for x in page["related"]),slug
    assert all(x[0]!=slug for x in page["related"]),slug
    assert len(page["example"])==4 and page["example"][0]=="BEISPIELHAFTE SITUATION",slug
    assert len(page["visual"])==3 and len(set(page["visual"]))==3,slug
    assert "garantiert Platz 1" not in page["lead"],slug
    titles.append(page["title"]);leads.append(page["lead"]);descriptions.append(page["description"])
assert len(set(titles))==len(set(leads))==len(set(descriptions))==21,"Duplicated DE SEO content"

menu=read("inc/mega-menu-trial.php")
m=re.search(r"if\(\$locale==='de'\)return array\((.*?)\n \);",menu,re.S)
assert m,"German menu missing"
links=[]
for pillar in ("seo","ads","commerce","sites","dev"):
    x=re.search(r"'"+pillar+r"'=>array\(([^)]*)\)",m.group(1))
    assert x,pillar
    group=re.findall(r"'([^']+)'",x.group(1))
    assert len(group)==5,(pillar,group)
    links.extend(group)
assert len(links)==len(set(links))==25,("Missing or duplicate German menu destination",links)
shared={"ecommerce-seo","seo-audit","google-ads","web-development"}
assert set(links)-set(data)==shared,("German pages not completed",set(links)-set(data))
assert set(data)<=set(links),("Orphaned German pages",set(data)-set(links))
assert "null" not in m.group(1) and "horoshop" not in m.group(1)

scenes=load("inc/de-service-art.php","MRSEO_DE_ART")
assert set(scenes)==set(data) and len({x["variant"] for x in scenes.values()})==21
assert all(x["nodes"]==data[k]["visual"] for k,x in scenes.items())
routing=read("inc/de-service-routing.php")
assert "mrseo_de_service_rules_v1" in routing
assert "mrseo_de_service_slugs()" in routing
assert "mrseo_de_service_route()?" in routing
template=read("de-service-landing.php")
assert template.count('<h1 ')==1
assert "mrseo_de_render_unique_scene($pl_slug)" in template
assert 'pl-svc-scene-steps' not in template, 'Duplicated hero stages must not reappear under the scene'
assert "mrseo_url('contact','de')" in template
assert 'class="pl-svc de-svc' in template
assert "BEISPIEL" in read("inc/de-service-part1.php")
assert "Ścieżka" not in template
assert "require_once get_template_directory() . '/inc/de-service-routing.php'" in read("functions.php")
assert "wp_enqueue_style('mrseo-de-services'" in read("functions.php")
assert "prefers-reduced-motion:reduce" in read("assets/de-services.css")
assert "X-Robots-Tag: noindex, nofollow" in read("functions.php")
seo=read("inc/international-seo.php")
assert "mrseo_de_service_slugs" in seo
print("Germany QA PASS: 21 original German landing pages, 4 existing cores, all 25 linked services, 21 distinct scenes and strict noindex.")
