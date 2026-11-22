#!/usr/bin/env python3
"""Ukrainian small-business website verticals: real URLs, specific offer, safe index policy."""
import json
import re
from pathlib import Path
root=Path(__file__).resolve().parents[1]/'wp-content/themes/mrseo-tech'
data_file=(root/'inc/ua-business-niche-pages.php').read_text(encoding='utf-8')
m=re.search(r"MRSEO_UA_NICHE_DATA'\n([\s\S]*?)\nMRSEO_UA_NICHE_DATA",data_file)
assert m,'Niche content not found'
data=json.loads(m.group(1))
expected={
 'clinic-websites','beauty-salon-websites','restaurant-websites',
 'auto-service-websites','lawyer-websites','photographer-websites',
 'psychologist-websites'
}
assert set(data)==expected,('Wrong service routes',list(data))
assert len({p['seoTitle'] for p in data.values()})==7
assert len({p['description'] for p in data.values()})==7
assert len({p['lead'] for p in data.values()})==7
for slug,p in data.items():
 assert p['scene']=='local' and len(p['demo'])==3,(slug,'demo')
 assert len(p['headline'])==2 and p['kicker'] and p['scenelabel'],slug
 assert len(p['pains'])==3 and len(p['benefits'])==3 and len(p['faq'])==3,slug
 assert all(len(x)==2 for name in ('pains','benefits','faq') for x in p[name]),slug
 assert all(len(x)==2 for x in p['related']),slug
 assert len(p['result'])>=60,slug
 assert 80<=len(p['lead'])<=380,slug
 assert ' | MrSeo.tech' in p['seoTitle'] and len(p['seoTitle'])<=75,(slug,'title')
 assert 105<=len(p['description'])<=180,(slug,'description')
 assert not any(x in p['lead'] for x in ('100%','гарантуємо заявки','ТОП-1')),slug
source=(root/'inc/ua-website-services.php').read_text(encoding='utf-8')
assert "require_once __DIR__.'/ua-business-niche-pages.php';" in source
assert "$pages=array_merge($pages,mrseo_ua_business_niche_data());" in source
assert "mrseo_ua_website_routes_v2" in source
assert "$p['seoTitle']" in source
header=(root/'inc/ua-header-six.php').read_text(encoding='utf-8')
assert 'class="mrseo-ua-six-submenu"' in header
assert 'class="mrseo-ua-six-submenu-links"' in header
assert 'aria-label="Розгорнути сайти для малого бізнесу"' in header
assert "mrseo_url($nicheSlug,'uk')" in header
for slug in expected: assert "'"+slug+"'=>" in header,('missing niche menu',slug)
assert "'horoshop-setup'=>'setup'" not in header
hub=(root/'premium-ua-commercial.php').read_text(encoding='utf-8')
assert "if($psc_slug==='local-business-websites'" in hub
assert "mrseo_url($nicheSlug,'uk')" in hub
assert 'class="mrseo-niches-card"' in hub
page=(root/'ua-website-landing.php').read_text(encoding='utf-8')
assert "uws-page--niche" in page and "$p['demo'][0]" in page
assert "mrseo_url('local-business-websites','uk')" in page
style=(root/'assets/ua-business-niches.css').read_text(encoding='utf-8')
menu_style=(root/'assets/ua-six-header.css').read_text(encoding='utf-8')
functions=(root/'functions.php').read_text(encoding='utf-8')
assert "mrseo-ua-business-niches" in functions
assert "prefers-reduced-motion:reduce" in style and "max-width:610px" in style
assert "mrseo-ua-six-submenu" in menu_style and "max-width:1250px" in menu_style
assert "X-Robots-Tag: noindex, nofollow" in functions
test=(root.parents[2]/'scripts/verify-live-eu-responsive.cjs').read_text(encoding='utf-8')
assert "subcategories!==54" in test and "mobileCount!==54" in test
assert "[18,7,8,14,7][i]" in test
assert "seven niche links hidden or missing" in test
print('Seven Ukrainian real business-site routes, unique commercial SEO, nested mobile/desktop menu, parent links and global noindex verified.')
