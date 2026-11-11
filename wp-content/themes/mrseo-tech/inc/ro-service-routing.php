<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/ro-service-content.php';
/** Exact completed Romania service routes; never claim other regional pages. */
function mrseo_ro_service_route(){
 if(mrseo_locale()!=='ro')return false;
 $slug=mrseo_slug();
 if(!in_array($slug,mrseo_ro_service_slugs(),true))return false;
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 return $path==='ro/'.$slug;
}
add_action('init',function(){
 $part=implode('|',array_map('preg_quote',mrseo_ro_service_slugs()));
 add_rewrite_rule('^ro/('.$part.')/?$','index.php?mrseo_lang=ro&mrseo_service=$matches[1]','top');
},11);
add_filter('pre_handle_404',function($pre){return mrseo_ro_service_route()?true:$pre;},135);
add_filter('redirect_canonical',function($canonical){return mrseo_ro_service_route()?false:$canonical;},135);
add_filter('template_include',function($template){
 return mrseo_ro_service_route()?get_template_directory().'/ro-service-landing.php':$template;
},140);
add_filter('pre_get_document_title',function($title){
 $page=mrseo_ro_service_route()?mrseo_ro_service_page():null;
 return $page?$page['title']:$title;
},140);
add_action('wp_head',function(){
 if(!mrseo_ro_service_route())return;
 $page=mrseo_ro_service_page();
 echo '<meta name="description" content="'.esc_attr($page['description']).'">'."\n";
},3);
add_action('init',function(){
 if(get_option('mrseo_ro_service_rules_v1')!=='ready'){
  flush_rewrite_rules(false);
  update_option('mrseo_ro_service_rules_v1','ready',false);
 }
},35);
