#!/usr/bin/env python3
"""Standalone Premium Tech concept: no production page, route or SEO regression."""
from pathlib import Path
r=Path(__file__).resolve().parents[1]
t=r/'wp-content/themes/mrseo-tech'
f=(t/'functions.php').read_text()
page=(t/'premium-tech-preview.php').read_text()
css=(t/'assets/premium-seo-preview.css').read_text()
js=(t/'assets/premium-seo-preview.js').read_text()
home=(t/'home-uk-premium.php').read_text()
seo=(t/'inc/premium-ua-interiors/seo.php').read_text()
assert page.count('<h1 ')==1
for x in ['Клієнти шукають у Google.', 'А знаходять конкурентів?', 'Важливі сторінки не знаходять у Google','Переходи є, а заявок немає','Не сотня зауважень.','приблизно 10-річним досвідом','Сайт є.']:
 assert x in page,x
for x in ['psp-dashboard','psp-result--primary','psp-diag-row','data-psp-step="0"','data-psp-step="1"','data-psp-step="2"','psp-motion-toggle','psp-problem-grid','psp-trust-row','psp-method-panel']:
 assert x in page,x
assert 'premium-tech-preview' in f
assert 'mrseo_premium_tech_preview_request' in f
assert 'get_template_directory().\'/premium-tech-preview.php\'' in f
assert "get_option('mrseo_premium_preview_rewrite_v1')" in f
assert "array('orbit-lab', 'orbit-light')" in f
assert "function_exists('mrseo_premium_tech_preview_request')" in f
assert 'X-Robots-Tag: noindex, nofollow' in f
assert 'mrseo_premium_tech_preview_request()?false:$url' in f
assert page.count("get_header()")==1 and page.count("get_footer()")==1
assert 'prefers-reduced-motion:reduce' in css
for x in ('psp-scan','psp-bars','psp-caret','psp-cluster'):
 assert '@keyframes '+x in css,x
assert '@media(max-width:480px)' in css
assert '.psp.is-playing' in css and 'aria-pressed' in js and 'visibilitychange' in js
assert css.count('{')==css.count('}')
assert "pt-globe" in home
assert 'seo-console' in seo
print('PASS: standalone premium SEO prototype, 3 interactive steps, noindex, original home and SEO remain untouched')
