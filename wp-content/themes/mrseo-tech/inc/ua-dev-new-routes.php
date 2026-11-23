<?php
/** Seven original Ukrainian WebDev landings, intentionally not translated. */
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/ua-dev-new-pages.php';
function mrseo_ua_dev_new_route(){
 if(mrseo_locale()!=='uk')return false;
 $slug=mrseo_slug();
 if(!isset(mrseo_ua_dev_new_pages()[$slug]))return false;
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 return $path===$slug;
}
add_action('init',function(){
 $slugs=array_map('preg_quote',array_keys(mrseo_ua_dev_new_pages()));
 add_rewrite_rule('^('.implode('|',$slugs).')/?$','index.php?mrseo_service=$matches[1]','top');
},15);
add_action('init',function(){
 if(get_option('mrseo_ua_dev_routes_v1')!=='ready'){
  flush_rewrite_rules(false);
  update_option('mrseo_ua_dev_routes_v1','ready',false);
 }
},45);
add_filter('pre_handle_404',function($pre){return mrseo_ua_dev_new_route()?true:$pre;},96);
add_filter('template_include',function($template){
 return mrseo_ua_dev_new_route()?get_template_directory().'/ua-dev-new-landing.php':$template;
},125);
add_filter('redirect_canonical',function($url){return mrseo_ua_dev_new_route()?false:$url;},100);
add_action('wp',function(){
 if(mrseo_ua_dev_new_route())remove_action('wp_head','rel_canonical');
},2);
add_filter('pre_get_document_title',function($title){
 $page=mrseo_ua_dev_new_route()?mrseo_ua_dev_new_page():null;
 return $page?$page['title'].' | MrSeo.tech':$title;
},120);
add_action('wp_head',function(){
 if(!mrseo_ua_dev_new_route())return;
 $page=mrseo_ua_dev_new_page();
 echo '<meta name="description" content="'.esc_attr($page['meta']).'">'."\n";
 // Only one exact Ukrainian version exists; no fabricated hreflang alternates.
 echo '<link rel="canonical" href="'.esc_url(home_url('/'.mrseo_slug().'/')).'">'."\n";
},6);
add_action('wp_enqueue_scripts',function(){
 if(!mrseo_ua_dev_new_route() && !(mrseo_locale()==='uk'&&mrseo_slug()==='web-development'))return;
 wp_enqueue_style('mrseo-ua-dev-new-landings',get_template_directory_uri().'/assets/ua-dev-new-landings.css',array('mrseo-style'),'1.1.0');
 if(mrseo_ua_dev_new_route())wp_enqueue_script('mrseo-ua-dev-kinetic-scenes',get_template_directory_uri().'/assets/ua-dev-kinetic-scenes.js',array(),'1.0.0',true);
},145);
