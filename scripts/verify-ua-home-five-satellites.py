#!/usr/bin/env python3
"""Guard the five approved UA homepage Earth satellites; no layout or globe replacements."""
from pathlib import Path
import re
root=Path(__file__).resolve().parents[1]/'wp-content/themes/mrseo-tech'
home=(root/'home-uk-premium.php').read_text(encoding='utf-8')
script=(root/'assets/home-uk-premium.js').read_text(encoding='utf-8')
css=(root/'assets/home-uk-premium.css').read_text(encoding='utf-8')
browser=(root.parents[2]/'scripts/verify-live-eu-responsive.cjs').read_text(encoding='utf-8')
start=home.index('<a class="pt-node n0 is-active"')
end=home.index('</a></div><div class="pt-orbit-bottom">',start)+4
orbit=home[start:end]
nodes=re.findall(r'<a class="pt-node n(\d)(?: is-active)?" href="<\?php echo esc_url\(mrseo_url\(\'([^\']+)\'\)\);\?>" data-title="([^"]+)"',orbit)
expected=[('0','seo','SEO'),('1','google-ads','Google Ads'),('2','horoshop','Хорошоп'),('3','service-websites','Сайти'),('4','web-development','Веброзробка')]
assert nodes==expected,('Unexpected satellite order, count or URL',nodes)
assert orbit.count('class="pt-node n')==5
assert 'data-title="Аналітика"' not in orbit and 'data-title="Технічне SEO"' not in orbit
assert 'data-title="Інтернет-магазини"' not in orbit
assert 'horoshop-wordmark.svg' in orbit and 'class="pt-hs-mark"' in orbit
assert 'П’ять ключових напрямів' in home and 'Вісім напрямів розвитку' not in home
assert '<div class="pt-globe"' in home and 'assets/earth-day.jpg' in home
assert 'const a=-Math.PI/2+i*2*Math.PI/nodes.length+phase;' in script
assert "if(paths.length!==nodes.length)" in script
assert "nodes.map(n=>" in script and "nodes.forEach((n,i)=>" in script
assert 'prefers-reduced-motion' in css
assert '.pt-orbit>.pt-node.n4' in css
assert "uaHome?'.pt-node':'.lab-node'" in browser
assert "lang==='uk'?c.satellites!==5" in browser
assert "document.querySelectorAll('.pt-ua-home .pt-orbit-lines path').length===5" in browser
print('PASS: UA Earth has exactly 5 linked category satellites, correct orbital step, 5 connectors, and mobile/reduced-motion guards')
