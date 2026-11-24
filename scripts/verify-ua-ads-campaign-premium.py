#!/usr/bin/env python3
"""Five UA paid campaign redesign: unchanged content/router, scoped stylesheet and original semantic illustrations."""
from pathlib import Path
import json,re,xml.etree.ElementTree as ET
r=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
def data(file,marker):
 s=(r/file).read_text()
 return json.loads(s.split("<<<'"+marker+"'\n",1)[1].split("\n"+marker,1)[0])
menu=data("inc/mega-menu-trial.php","MRSEO_UA_MENU_GROUPS")
slugs=[i[0] for i in next(g for g in menu if g["key"]=="ads")["sections"][0]["items"]]
assert slugs==["google-search-ads","performance-max","google-shopping","local-google-ads","google-remarketing"]
a=data("inc/premium-ads-campaign-art.php","MRSEO_ADS_PREMIUM_ART")
assert set(a)=={f"{s}-{kind}" for s in slugs for kind in ("hero","problem-1","problem-2","problem-3","solution","next")}|{"performance-max-plan"}
ns={"s":"http://www.w3.org/2000/svg"}
for k,v in a.items():
 root=ET.fromstring(v)
 assert root.attrib["data-puc-scene"]==k
 assert root.attrib["data-mrseo-ads-art"]=="premium-v1"
 assert root.attrib["viewBox"]=="0 0 720 520"
 assert not root.findall(".//s:script",ns)
 ids=[e.attrib["id"] for e in root.iter() if "id" in e.attrib]
 assert len(set(ids))==len(ids)
 assert all(ref in ids for ref in re.findall(r"url\(#([^)]+)\)",v))
 assert re.search(r"<animate(?:Motion|Transform)?\b",v)
 if k.endswith("-hero"):
  assert [e.attrib["data-puc-part"] for e in root.iter() if "data-puc-part" in e.attrib]==["0","1","2"]
 for m in re.findall(r"<animateMotion\b[^>]*/>",v):
  assert "opacity" in v[v.index(m)+len(m):v.index(m)+len(m)+200],k
assert len(set(a.values()))==31
t=(r/"premium-ua-commercial.php").read_text()
assert "mrseo_puc_ads_campaign_slugs()" in t and "premium-ads-campaign.css" in t
assert "mrseo_puc_copy($psc_slug)" in t and "wp_kses($value" in t
assert "mrseo_puc_ads_campaign_art($id)" in (r/"inc/premium-ua-commercial-art.php").read_text()
css=(r/"assets/premium-ads-campaign.css").read_text()
assert ".puc-ads-campaign" in css and "prefers-reduced-motion" in css
assert "X-Robots-Tag: noindex, nofollow" in (r/"functions.php").read_text()
print("PASS: five exact campaign routes, 31 distinct animated SVGs, scoped design, existing content adapter and noindex")
