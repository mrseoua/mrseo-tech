<?php
/** UK-only service additions. Never manufacture other-country URL equivalents. */
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/en-gb-services-part1.php';
require_once __DIR__.'/en-gb-services-part2.php';
require_once __DIR__.'/en-gb-services-part3.php';
function mrseo_en_gb_data($slug=null){
 static $data=null;
 if($data===null){
  $data=array_merge(mrseo_en_gb_part1(),mrseo_en_gb_part2(),mrseo_en_gb_part3());
  foreach($data as $slug=>&$page){
   $page['group']=in_array($slug,array('local-seo','service-business-seo','international-seo'),true)?'SEO':(
    $slug==='local-google-ads'?'Google Ads':(
    in_array($slug,array('store-conversion','store-migration','woocommerce-shopify-stores','catalog-automation'),true)?'E-commerce':(
    $slug==='ga4-conversions'?'Analytics':(
    in_array($slug,array('website-speed-security','api-integrations','web-applications'),true)?'Web development':'Website design'))));
  }
  unset($page);
 }
 return $slug===null?$data:($data[$slug]??null);
}
function mrseo_en_gb_slugs(){return array_keys(mrseo_en_gb_data());}
/** Landing-page language switch fallback: always a REAL broader page, never an invented URL. */
function mrseo_en_gb_parent($slug,$locale){
 $sites=array('local-business-websites','landing-pages','corporate-websites','website-redesign');
 $seo=array('local-seo','service-business-seo','international-seo');
 $shops=array('store-conversion','store-migration','woocommerce-shopify-stores','catalog-automation');
 if(in_array($locale,array('uk','ru'),true) &&
    in_array($slug,array('catalog-automation','api-integrations','web-applications'),true))return $slug;
 if(in_array($slug,$sites,true))
  return in_array($locale,array('uk','ru'),true)?'service-websites':
   ($locale==='pl'?'tworzenie-stron-internetowych':
    ($locale==='de'?'web-development':'website-design'));
 if(in_array($slug,$seo,true))return 'seo';
 if($slug==='local-google-ads')return 'google-ads';
 if(in_array($slug,$shops,true))
  return in_array($locale,array('uk','ru'),true)?'online-store-development':
   ($locale==='pl'?'tworzenie-sklepow-internetowych':
    ($locale==='de'?'ecommerce-seo':'online-shop-development'));
 if($slug==='ga4-conversions')return 'analytics';
 return 'web-development';
}
function mrseo_en_gb_route(){
 if(mrseo_locale()!=='en')return false;
 $s=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 if(!str_starts_with($s,'en/'))return false;
 return in_array(substr($s,3),mrseo_en_gb_slugs(),true);
}
add_action('init',function(){
 $slugs=implode('|',array_map('preg_quote',mrseo_en_gb_slugs()));
 add_rewrite_rule('^en/('.$slugs.')/?$',
  'index.php?mrseo_lang=en&mrseo_service=$matches[1]','top');
},13);
add_filter('pre_handle_404',function($pre){return mrseo_en_gb_route()?true:$pre;},95);
add_filter('redirect_canonical',function($url){return mrseo_en_gb_route()?false:$url;},110);
add_filter('template_include',function($tpl){
 return mrseo_en_gb_route()?get_template_directory().'/ua-website-landing.php':$tpl;
},140);
add_filter('pre_get_document_title',function($title){
 if(!mrseo_en_gb_route())return $title;
 $p=mrseo_en_gb_data(mrseo_slug());
 return $p?$p['title'].' | MrSeo.tech':$title;
},140);
add_action('wp_head',function(){
 if(!mrseo_en_gb_route())return;
 $p=mrseo_en_gb_data(mrseo_slug());
 if($p)echo '<meta name="description" content="'.esc_attr($p['description']).'">'."\n";
},4);
add_action('init',function(){
 if(get_option('mrseo_en_gb_services_v1')!=='ready'){
  flush_rewrite_rules(false);
  update_option('mrseo_en_gb_services_v1','ready',false);
 }
},41);
