#!/usr/bin/env python3
"""Verify seven genuinely Russian WebDev pages and reciprocal SEO, without modifying UA design."""
from pathlib import Path
import json,re,hashlib
root=Path(__file__).resolve().parents[1]
t=root/"wp-content/themes/mrseo-tech"
read=lambda p:(t/p).read_text(encoding="utf-8")
ru=read("inc/ru-dev-premium-content.php")
ua=read("inc/ua-dev-new-pages.php")
def block(raw,marker):
    return json.loads(raw.split("<<<'"+marker+"'\n",1)[1].split("\n"+marker,1)[0])
pages=block(ru,"MRSEO_RU_DEV_PREMIUM")
ua_pages=block(ua,"MRSEO_UA_DEV_CONTENT")
slugs=["client-portals","data-parsing","payment-integration","mobile-app-development","ecommerce-mobile-apps","corporate-mobile-apps","pwa-development"]
assert list(pages)==slugs
assert set(pages)==set(ua_pages)
assert len({p["scene"] for p in pages.values()})==7
assert len({p["title"] for p in pages.values()})==7
assert len({p["meta"] for p in pages.values()})==7
assert len({p["intro"] for p in pages.values()})==7
for slug,p in pages.items():
    assert 30<=len(p["title"])<=85,(slug,"title",len(p["title"]))
    assert 80<=len(p["meta"])<=190,(slug,"meta",len(p["meta"]))
    assert len(p["intro"])>140 and len(p["result"])>60,slug
    assert len(p["problems"])==len(p["actions"])==len(p["faq"])==3,slug
    assert len(p["related"])==2 and len(p["terms"])>=3,slug
    assert all(len(v)==2 and all(v) for field in ("problems","actions","faq","related") for v in p[field]),slug
    assert not re.search('[іїєґІЇЄҐ]',json.dumps(p,ensure_ascii=False)),(slug,"UA characters")
    assert p["scene"]==ua_pages[slug]["scene"],(slug,"art mismatch")
    assert p["title"]!=ua_pages[slug]["title"]
    assert all(target in pages or target in ("web-applications","api-integrations","catalog-automation","online-store-development") for target,_ in p["related"])
route=read("inc/ru-dev-premium-routes.php")
tmpl=read("ru-dev-premium-landing.php")
art=read("inc/ru-dev-premium-art.php")
js=read("assets/ru-dev-premium-images.js")
css=read("assets/ru-dev-premium-hub.css")
dev=read("development-landing.php")
fn=read("functions.php")
i18n=read("inc/i18n-routing.php")
seo=read("inc/international-seo.php")
ua_route=read("inc/ua-dev-new-routes.php")
assert "mrseo_ru_dev_route()" in route and "mrseo_locale()!=='ru'" in route
assert "add_rewrite_rule('^ru/(" in route
assert "pre_handle_404" in route and "template_include" in route and "redirect_canonical" in route
assert "get_template_directory().'/ru-dev-premium-landing.php'" in route
assert "ru-dev-premium-images.js" in route
assert "ua-dev-premium-images.css" in route
assert "esc_attr($p['meta'])" in route
assert "mrseo_ru_dev_page()" in tmpl and "mrseo_ru_dev_route()" in tmpl
assert "mrseo_rdv_master_scene($scene)" in tmpl and "mrseo_rdv_lower_art($scene,'problem',$p['problems'])" in tmpl
assert "mrseo_rdv_lower_art($scene,'solution',$p['actions'])" in tmpl
assert "class=\"pti-page puc-page udv-page" in tmpl and "data-udv-stage" in tmpl
assert "get_header()" in tmpl and "get_footer()" in tmpl and "aria-labelledby" in tmpl
assert tmpl.count('<h1 id="udv-h1">')==1
assert "mrseo_url('contact','ru')" in tmpl and "mrseo_url('web-development','ru')" in tmpl
assert "ГЛАВНАЯ" not in tmpl and "Главная" in tmpl
assert "ua-dev-premium-" in art and "Разработка" not in art
assert "ДИАГНОСТИКА" in art and "РЕАЛИЗАЦИЯ" in art
assert "Анимация отключена" in js and "Возобновить анимацию" in js
assert "Призупинити" not in js
assert "if($dev_locale==='ru' && function_exists('mrseo_ru_dev_pages'))" in dev
assert "mrseo_i18n_exact_url('ru',$slug)" in dev
assert "rdv-hub-grid" in css and "prefers-reduced-motion:reduce" in css
assert "require_once get_template_directory() . '/inc/ru-dev-premium-routes.php';" in fn
assert "X-Robots-Tag: noindex, nofollow" in fn
assert "mrseo_ru_dev_pages" in i18n and "mrseo_i18n_exact_url('ru',$slug)" in i18n
assert "webdev-ua-ru:" in seo and "array('uk'=>$slug,'ru'=>$slug)" in seo
assert "Only one exact Ukrainian version exists" not in ua_route
assert 'echo \'<link rel="canonical"' not in ua_route
assert "mrseo_i18n_inventory()" in seo
assert "mrseo_ru_dev_pages()" in seo
images=[]
for p in pages.values():
    b=(t/f"assets/ua-dev-premium-{p['scene']}.webp").read_bytes()
    assert b[:4]==b"RIFF" and b[8:12]==b"WEBP"
    images.append(hashlib.sha256(b).hexdigest())
assert len(set(images))==7
print("PASS: 7 unique RU WebDev pages, original Russian intent, approved assets, links, canonical/hreflang and staging robots")
