<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/de-service-content.php';
/** Exact original German service URLs; shared core routes remain handled by WP. */
function mrseo_de_service_route(){
 if(mrseo_locale()!=='de')return false;
 $slug=mrseo_slug();
 if(!in_array($slug,mrseo_de_service_slugs(),true))return false;
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 return $path==='de/'.$slug;
}
add_action('init',function(){
 $part=implode('|',array_map('preg_quote',mrseo_de_service_slugs()));
 add_rewrite_rule('^de/('.$part.')/?$','index.php?mrseo_lang=de&mrseo_service=$matches[1]','top');
},11);
add_filter('pre_handle_404',function($pre){return mrseo_de_service_route()?true:$pre;},95);
add_filter('template_include',function($template){
 return mrseo_de_service_route()?get_template_directory().'/de-service-landing.php':$template;
},110);
add_filter('pre_get_document_title',function($title){
 $page=mrseo_de_service_route()?mrseo_de_service_page():null;
 return $page?$page['title']:$title;
},110);
add_action('wp_head',function(){
 if(!mrseo_de_service_route())return;
 $page=mrseo_de_service_page();
 echo '<meta name="description" content="'.esc_attr($page['description']).'">'."\n";
 // Canonical/hreflang are registered by international-seo.php only.
},3);
add_action('init',function(){
 if(get_option('mrseo_de_service_rules_v1')!=='ready'){
  flush_rewrite_rules(false);
  update_option('mrseo_de_service_rules_v1','ready',false);
 }
},35);
