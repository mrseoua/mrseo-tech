<?php
/** Genuine /ru/ counterparts for the seven approved Ukrainian WebDev pages. */
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/ru-dev-premium-content.php';
function mrseo_ru_dev_route(){
 if(mrseo_locale()!=='ru')return false;
 $slug=mrseo_slug();
 if(!isset(mrseo_ru_dev_pages()[$slug]))return false;
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 return $path==='ru/'.$slug;
}
add_action('init',function(){
 $slugs=array_map(static fn($x)=>preg_quote($x,'~'),array_keys(mrseo_ru_dev_pages()));
 add_rewrite_rule('^ru/('.implode('|',$slugs).')/?$','index.php?mrseo_lang=ru&mrseo_service=$matches[1]','top');
},16);
add_action('init',function(){
 if(get_option('mrseo_ru_dev_routes_v1')!=='ready'){
  flush_rewrite_rules(false);
  update_option('mrseo_ru_dev_routes_v1','ready',false);
 }
},46);
add_filter('pre_handle_404',function($pre){return mrseo_ru_dev_route()?true:$pre;},97);
add_filter('template_include',function($template){
 return mrseo_ru_dev_route()?get_template_directory().'/ru-dev-premium-landing.php':$template;
},151);
add_filter('redirect_canonical',function($url){return mrseo_ru_dev_route()?false:$url;},120);
add_action('wp',function(){
 if(mrseo_ru_dev_route())remove_action('wp_head','rel_canonical');
},3);
add_filter('pre_get_document_title',function($title){
 $p=mrseo_ru_dev_route()?mrseo_ru_dev_page():null;
 return $p?$p['title'].' | MrSeo.tech':$title;
},145);
add_action('wp_head',function(){
 if(!mrseo_ru_dev_route())return;
 $p=mrseo_ru_dev_page();
 echo '<meta name="description" content="'.esc_attr($p['meta']).'">'."\n";
 // Canonical and reciprocal hreflang come from international-seo.php.
},6);
add_action('wp_enqueue_scripts',function(){
 if(!mrseo_ru_dev_route())return;
 $uri=get_template_directory_uri();
 wp_enqueue_style('mrseo-ru-dev-base',$uri.'/assets/premium-ua-interiors.css',array('mrseo-style'),'1.1.1');
 wp_enqueue_style('mrseo-ru-dev-commercial',$uri.'/assets/premium-ua-commercial.css',array('mrseo-ru-dev-base'),'1.0.0');
 wp_enqueue_style('mrseo-ru-dev-layout',$uri.'/assets/ua-dev-new-landings.css',array('mrseo-ru-dev-commercial'),'2.2.0');
 wp_enqueue_style('mrseo-ru-dev-art',$uri.'/assets/ua-dev-premium-images.css',array('mrseo-ru-dev-layout'),'1.1.0');
 wp_enqueue_script('mrseo-ru-dev-art',$uri.'/assets/ua-dev-premium-images.js',array(),'1.0.0',true);
},146);

// Only the Russian Web Development hub needs this illustrated service directory.
add_action('wp_enqueue_scripts',function(){
 if(mrseo_locale()==='ru' && mrseo_slug()==='web-development')
  wp_enqueue_style('mrseo-ru-dev-premium-hub',get_template_directory_uri().'/assets/ru-dev-premium-hub.css',array('mrseo-style'),'1.0.0');
},150);
