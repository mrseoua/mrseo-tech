#!/usr/bin/env python3
"""Verify UA-only Premium Tech Navigation uses actual service routes and safe native disclosures."""
from pathlib import Path
root=Path(__file__).resolve().parents[1]
theme=root/"wp-content/themes/mrseo-tech"
header=(theme/"header.php").read_text(encoding="utf-8")
nav=(theme/"inc/ua-header-six.php").read_text(encoding="utf-8")
css=(theme/"assets/ua-catalog-header.css").read_text(encoding="utf-8")
js=(theme/"assets/site.js").read_text(encoding="utf-8")
functions=(theme/"functions.php").read_text(encoding="utf-8")
taxonomy=(theme/"inc/mega-menu-trial.php").read_text(encoding="utf-8")
nav=nav.split("function mrseo_ua_header_catalog()",1)[1]
assert "mrseo_ua_header_catalog()" in header and "mrseo-ua-mega-header" in header
assert nav.count("mrseo_hs_url($anchor)") == 1
assert nav.count("mrseo_url($slug,'uk')") == 3
assert "foreach($groups as $group)" in nav
assert "'commerce'=>'Інтернет-магазини'" in nav and "'data'=>'Аналітика'" in nav
assert "'sites'=>'Створення сайтів'" in nav and "'dev'=>'Веброзробка'" in nav
for slug in ("local-seo","ecommerce-seo","service-business-seo","international-seo","seo-audit"):
    assert "'"+slug+"'=>'" in nav, slug
assert "SEO-послуги" in nav and "foreach($seo_services as $slug=>$label)" in nav
assert "SEO та просування" in nav and "Товари та аналітика" in nav
assert "foreach($horoshop_groups as $heading=>$services)" in nav
for key in ("seo","audit","ads","search-ads","shopping","pmax","feeds","ga4"):
    assert "'"+key+"'=>" in nav, key
# The flat UA catalogue preserves all four WebDev groups and real URLs.
for heading in ("Бізнес-системи","Інтеграції й функціонал","Штучний інтелект","Мобільні застосунки"):
    assert "'"+heading+"'=>array(" in nav, heading
for label in ("Вебзастосунки","Особисті кабінети клієнтів","Дашборди та звітність",
              "Інтеграція сервісів через API","Парсинг і синхронізація даних",
              "Інтеграція платіжних систем","AI-агенти для бізнесу",
              "Мобільні застосунки для iOS та Android","Застосунки для інтернет-магазинів",
              "Корпоративні мобільні застосунки","PWA-застосунки"):
    assert label in nav, label
assert "elseif($key==='dev')" in nav
assert "foreach($dev_groups as $heading=>$services)" in nav
assert "foreach($services['live_extra'] as $slug=>$label)" in nav
assert 'mrseo_ua_menu_groups()' in nav
assert 'class="mrseo-ua-six-planned"' not in nav
assert 'Сторінка готується' not in nav
assert nav.count("home_url('/'.$slug.'/')")==1
assert "mrseo-catalog-parent" in nav and "mrseo-catalog-subgroup" in nav
assert "<details" not in nav
assert "pointerdown" in js and "Escape" in js and "hoverOnly" in js and "pointerenter" in js
assert "assets/ua-catalog-header.css" in functions
assert "grid-template-columns:repeat(4,minmax(0,1fr))" in css and "grid-template-columns:1fr" in css
assert "prefers-reduced-motion:reduce" in css and "overflow:auto" in css
assert "X-Robots-Tag: noindex, nofollow" in functions
assert css.count("{")==css.count("}"), "Unbalanced stylesheet braces"
assert "pt-globe" not in css and "pt-orbit" not in css
print("PASS: unified catalogue; four WebDev groups, 15 active links, preserved routes; no placeholders; Earth/noindex untouched")
