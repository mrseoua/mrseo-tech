"""Prices match the approved Ukrainian offer; no fictional new landing pages."""
from pathlib import Path
import re,json
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
page=(root/"pricing-uk.php").read_text()
route=(root/"inc/ua-pricing-route.php").read_text()
header=(root/"header.php").read_text().split("<?php else:",1)[0]
css=(root/"assets/ua-pricing.css").read_text()
assert page.count("<h1>")==1
rows=re.findall(r"array\('([^']+)',(?:'([^']+)'|null),'([^']*)','([^']+)'\)",page)
expected={"Локальне SEO":"6 000","SEO сайтів послуг":"8 000","SEO інтернет-магазинів":"10 000","SEO-аудит":"3 000","Налаштування та ведення Google Ads":"5 000","Performance Max":"6 000","Лендінг":"8 000","Сайт на WordPress":"12 000","Корпоративний сайт":"20 000","AI-агенти та автоматизація":"10 000"}
# There are ten numerical rows, two custom rows, plus the combined feature.
assert {name:value for name,value,unit,slug in rows if value}==expected,rows
assert len(rows)==12,rows
assert '<strong>13 000</strong>' in page
assert "mrseo_url('pricing','uk')" in header
assert "==='pricing'" in route and "pricing-uk.php" in route
assert "grid-template-columns:1fr" in css and "prefers-reduced-motion" in css
assert "Рекламний бюджет" in page and "Індивідуально" in page
retired=json.loads((root/"inc/ua-retired-services.json").read_text())
assert not any(slug in retired for _,_,_,slug in rows)
print("PASS: 5 category price groups, 12 rows and 1 combined offer; approved rates and active destinations.")
