<?php
if(!defined('ABSPATH'))exit;
function mrseo_ua_pricing_route(){
 return trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/')==='pricing';
}
add_action('init',static function(){
 add_rewrite_rule('^pricing/?$','index.php?mrseo_service=pricing','top');
},13);
add_action('init',static function(){
 if(get_option('mrseo_ua_pricing_v1')!=='ready'){flush_rewrite_rules(false);update_option('mrseo_ua_pricing_v1','ready',false);}
},49);
add_filter('pre_handle_404',static fn($pre)=>mrseo_ua_pricing_route()?true:$pre,130);
add_filter('redirect_canonical',static fn($url)=>mrseo_ua_pricing_route()?false:$url,130);
add_filter('template_include',static fn($template)=>mrseo_ua_pricing_route()?get_template_directory().'/pricing-uk.php':$template,130);
add_action('template_redirect',static function(){
 if(mrseo_ua_pricing_route()&&in_array($_SERVER['REQUEST_METHOD']??'GET',array('GET','HEAD'),true)&&substr(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),-1)!=='/'){
  $url=home_url('/pricing/');if(!empty($_SERVER['QUERY_STRING']))$url.='?'.$_SERVER['QUERY_STRING'];wp_safe_redirect($url,301);exit;
 }
},1);
add_action('wp_enqueue_scripts',static function(){
 if(mrseo_ua_pricing_route())wp_enqueue_style('mrseo-ua-pricing',get_template_directory_uri().'/assets/ua-pricing.css',array('mrseo-style'),'1.0.0');
},100);
