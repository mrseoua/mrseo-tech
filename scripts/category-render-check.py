# Render the shared PHP category components with minimal WordPress URL/escaping stubs.
import subprocess
from html.parser import HTMLParser
from pathlib import Path
THEME=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
class Markup(HTMLParser):
    def __init__(self, raw):
        super().__init__(); self.h1=0; self.links=[]; self.ids=[]; self.feed(raw)
    def handle_starttag(self, tag, attrs):
        a=dict(attrs)
        if tag=="h1": self.h1+=1
        if tag=="a": self.links.append(a.get("href",""))
        if "id" in a: self.ids.append(a["id"])
def render_category(slug, component):
    assert component in ("orbit","catalog")
    code="""<?php
define('ABSPATH',__DIR__.'/');
function add_action(...$args){}
function add_filter(...$args){}
function mrseo_locale(){return 'uk';}
function get_template_directory(){return getcwd();}
function get_template_directory_uri(){return 'https://example.test/theme';}
function home_url($s='/'){return 'https://example.test'.$s;}
function mrseo_url($s='',$lang='uk'){return home_url('/'.($s?trim($s,'/').'/':''));}
function mrseo_hs_url($s){return home_url('/horoshop/'.$s.'/');}
function wp_parse_url($s,$part){return parse_url($s,$part);}
function esc_html($s){return htmlspecialchars($s,ENT_QUOTES,'UTF-8');}
function esc_attr($s){return esc_html($s);}
function esc_url($s){return esc_html($s);}
require 'inc/mega-menu-trial.php';
require 'inc/ua-ads-position.php';
require 'inc/category-orbit.php';
"""
    code+=f"mrseo_category_{component}('{slug}');"
    p=subprocess.run(["php","-d","display_errors=stderr"],input=code,text=True,cwd=THEME,capture_output=True,check=True)
    assert not p.stderr,p.stderr
    return Markup(p.stdout)
def paths(markup):
    return {url.removeprefix("https://example.test") for url in markup.links if url.startswith("https://example.test/")}
