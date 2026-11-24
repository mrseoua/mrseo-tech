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
assert len(re.findall(r"^\s*array\('(?:seo-audit|ecommerce-seo|local-seo|service-business-seo|international-seo)',",visual,re.M))==5, "Exactly five commercial SEO directions"
for slug in ("seo-audit","ecommerce-seo","local-seo","service-business-seo","international-seo"):
    assert "'"+slug+"'" in visual,slug
assert "X-Robots-Tag: noindex, nofollow" in (ROOT/"functions.php").read_text(encoding="utf8")
assert "function mrseo_i18n_current_entry" in (ROOT/"inc/international-seo.php").read_text(encoding="utf8")
print("UA SEO: all 19 legacy metadata sets preserved, five primary cinematic links in hub, scoped intent and contextual links OK")

# Approved local reference and four sibling pages share the same design.
ref=(ROOT/"inc/local-seo-reference.php").read_text(encoding="utf8")
css=(ROOT/"assets/local-seo-reference.css").read_text(encoding="utf8")
assert "$psc_reference=$psc_slug==='local-seo'||$psc_ref_copy!==null;" in page and "inc/local-seo-reference.php" in page
assert "data-service-reference=" in page and "local-seo-reference.css" in page
assert ref.count('class="local-ref-answer"')==1 and len(re.findall(r"array\('0[123]','",ref))==3
assert "mrseo_psc_art($id)" in ref and "class=\"local-reference-static\"" in ref
assert 'id="uws-solution"' in ref and "psc_problem_id" in ref
assert "Скільки коштує локальне SEO?" in ref and "Коли можна очікувати зміни?" in ref
assert ref.count("mrseo_url('contact')")==1 and "portfolio" not in ref
assert "data-service-reference=" in css and "@media(max-width:700px)" in css
print("PASS: local SEO marketing reference, unchanged semantics, concrete work/conditions/CTA, scoped styles")

content=load("inc/seo-reference-content.php","MRSEO_SEO_REFERENCE")
sibling=(ROOT/"inc/seo-reference-sibling.php").read_text(encoding="utf8")
assert set(content)=={"ecommerce-seo","service-business-seo","international-seo","seo-audit"}
for slug,d in content.items():
    assert len(d["problems"])==len(d["work"])==len(d["metrics"])==len(d["terms"])==3,slug
    assert len(d["faq"])==2 and all(x[0] in semantic for x in d["links"]),slug
    assert "portfolio" not in str(d),slug
assert "inc/seo-reference-sibling.php" in page and "mrseo_seo_reference_content" in page
assert "local-reference-static" in sibling and "psc_ref_copy" in sibling and "portfolio" not in sibling
assert "окремо" in content["seo-audit"]["termsNote"]
print("PASS: four distinct sibling contents, approved reference layout, audit boundary, existing links, no cases")
