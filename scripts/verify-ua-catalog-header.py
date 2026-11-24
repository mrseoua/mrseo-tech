#!/usr/bin/env python3
from pathlib import Path
r=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
h=(r/"header.php").read_text()
ua=h.split('<header class="site-header mrseo-ua-mega-header">',1)[1].split('</header>',1)[0]
assert ua.count('services-menu-toggle"')==1 and "mrseo_ua_header_catalog()" in ua
assert "mrseo_ua_header_six(" not in ua and "mrseo_render_header_contact()" in ua and "mrseo_render_language_dropdown" in ua
c=(r/"inc/ua-header-six.php").read_text().split("function mrseo_ua_header_catalog()",1)[1]
assert "mrseo_ua_menu_groups()" in c and "data-catalog-group" in c and "mrseo-catalog-parent" in c
assert "<details" not in c and "mrseo_hs_url" in c
css=(r/"assets/ua-catalog-header.css").read_text()
assert "width:100%!important" in css and "max-height:calc(100dvh" in css and "prefers-reduced-motion" in css
js=(r/"assets/site.js").read_text()
assert "hoverOnly" in js and "pointerenter" in js and "pointerleave" in js and "Escape" in js
assert "X-Robots-Tag: noindex, nofollow" in (r/"functions.php").read_text()
print("PASS: native UA one-trigger catalogue, preserved router, keyboard and hover, full-width desktop / responsive mobile")

assert "data-ua-mega=\"v4\"" in c
assert "if(!isset($names[$key]))continue;" in c
assert "'data'=>'Аналітика'" not in c and "'commerce'=>'Інтернет-магазини'" not in c
assert "background:#252b27" not in css and "background:linear-gradient(120deg,#f9f5ed,#f3ede3)" in css
# Compare original and new renderer inventory exactly, including order and displayed labels.
import subprocess,json
source=(r/"inc/mega-menu-trial.php").read_text()
groups=json.loads(source.split("<<<'MRSEO_UA_MENU_GROUPS'\n",1)[1].split("\nMRSEO_UA_MENU_GROUPS",1)[0])
php='''define("ABSPATH",1); function mrseo_ua_menu_groups(){return json_decode(base64_decode($GLOBALS["g"]),true);} function mrseo_slug(){return "";} function esc_url($v){return $v;} function esc_html($v){return $v;} function esc_attr($v){return $v;} function mrseo_url($v="",$l="uk"){return "/".$v."/";} function mrseo_hs_url($v){return "/horoshop/".$v."/";} function home_url($v){return $v;} '''
import base64,re
from html.parser import HTMLParser
class Links(HTMLParser):
 def __init__(self): super().__init__();self.links=[];self.current=None
 def handle_starttag(self,tag,attrs):
  if tag=="a":
   d=dict(attrs); self.current=[d.get("href",""),"",d.get("class","")]
 def handle_data(self,d):
  if self.current: self.current[1]+=d
 def handle_endtag(self,tag):
  if tag=="a" and self.current:
   self.links.append(self.current);self.current=None
code='$g="'+base64.b64encode(json.dumps(groups).encode()).decode()+'";'+php+'require '+json.dumps(str(r/"inc/ua-header-six.php"))+';ob_start();mrseo_ua_header_six(false);$a=ob_get_clean();ob_start();mrseo_ua_header_catalog();$b=ob_get_clean();echo json_encode([$a,$b]);'
old_html,new_html=json.loads(subprocess.check_output(["php","-r",code],text=True))
a,b=Links(),Links();a.feed(old_html);b.feed(new_html)
clean=lambda x:(x[0],x[1].replace("↗","").strip())
original=[clean(x) for x in a.links]
updated=[clean(x) for x in b.links if "mrseo-catalog-link" in x[2]]
excluded={"/google-ads-audit/","/merchant-center/","/website-maintenance/","/website-speed-security/","/custom-functionality/","/horoshop/search-ads/","/horoshop/shopping/","/horoshop/pmax/","/google-remarketing/","/website-redesign/","/horoshop/ga4/"}
assert len(original)==42
assert updated==[x for x in original if x[0] not in excluded],(original,updated)
assert len(updated)==31,len(updated)
assert all(url in {x[0] for x in updated} for url in ('/mobile-app-development/','/ecommerce-mobile-apps/','/corporate-mobile-apps/','/pwa-development/'))
assert len([x for x in b.links if "mrseo-catalog-parent" in x[2]])==5
print("PASS: 31 original labels and URLs, explicitly excluded 11 secondary links; five parent categories; light palette")

assert "mrseo-catalog-icon" in c and "mrseo-catalog-title" in c and "justify-content:flex-start!important" in css
assert "border:1px solid #d9ccbc" in css and "background:#eee5d8!important" in css
assert "border:1px solid #e3d8c9" in css and "flex:0 0 auto!important" in css
print("PASS: approved five-card preview, left-aligned titles, framed development groups, compact CTA")

assert "font-size:18px!important;font-weight:700" in css and "font-size:14px;font-weight:800" in css
