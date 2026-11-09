<?php
/**
 * Exactly thirteen real Russian counterpart pages for the approved UA service
 * landings. Dedicated editorial copy; shared visual template, no duplicate UI.
 * The route must exist before being advertised in menus or hreflang.
 */
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/ru-website-services-part1.php';
require_once __DIR__.'/ru-website-services-part2.php';

function mrseo_ru_website_data($slug=null){
 static $pages=null;
 if($pages===null){
  $pages=array_merge(mrseo_ru_website_part1(),mrseo_ru_website_part2());
 }
 return $slug===null?$pages:($pages[$slug]??null);
}
function mrseo_ru_website_slugs(){
 return array_keys(mrseo_ru_website_data());
}
function mrseo_ru_website_route(){
 if(mrseo_locale()!=='ru')return false;
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 if(!str_starts_with($path,'ru/'))return false;
 return in_array(substr($path,3),mrseo_ru_website_slugs(),true);
}
add_action('init',function(){
 $slugs=implode('|',mrseo_ru_website_slugs());
 add_rewrite_rule('^ru/('.$slugs.')/?$',
  'index.php?mrseo_lang=ru&mrseo_service=$matches[1]','top');
},11);
add_filter('pre_handle_404',function($pre){
 return mrseo_ru_website_route()?true:$pre;
},95);
add_filter('redirect_canonical',function($url){
 return mrseo_ru_website_route()?false:$url;
},110);
add_filter('template_include',function($template){
 return mrseo_ru_website_route()?
   get_template_directory().'/ua-website-landing.php':$template;
},140);
add_filter('pre_get_document_title',function($title){
 if(!mrseo_ru_website_route())return $title;
 $p=mrseo_ru_website_data(mrseo_slug());
 return $p?$p['title'].' | MrSeo.tech':$title;
},140);
add_action('wp_head',function(){
 if(!mrseo_ru_website_route())return;
 $p=mrseo_ru_website_data(mrseo_slug());
 if($p)echo '<meta name="description" content="'.
  esc_attr(($p['description']??wp_trim_words($p['lead'],26,'…'))).'">'."\n";
 // The existing shared SEO inventory owns canonical and hreflang.
},4);
add_action('init',function(){
 if(get_option('mrseo_ru_website_routes_v1')!=='ready'){
  flush_rewrite_rules(false);
  update_option('mrseo_ru_website_routes_v1','ready',false);
 }
},41);
