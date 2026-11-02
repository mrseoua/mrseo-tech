<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/new-service-copy-part1.php';
require_once __DIR__.'/new-service-copy-part2.php';
require_once __DIR__.'/new-service-copy-part3.php';
require_once __DIR__.'/new-service-editorial.php';
require_once __DIR__.'/ua-service-ux.php';

/** New standalone service pages; staged translations are intentionally limited to UA/RU. */
function mrseo_new_service_parent_slugs(){
 return array('website-audit'=>'seo-audit','traffic-recovery'=>'seo','google-shopping'=>'google-ads','merchant-center'=>'google-ads','online-store-development'=>'web-development','catalog-automation'=>'web-development','web-applications'=>'web-development','api-integrations'=>'web-development','custom-functionality'=>'web-development','ga4-conversions'=>'analytics','business-dashboards'=>'analytics','reporting-automation'=>'analytics');
}
function mrseo_new_service_slugs(){return array_keys(mrseo_new_service_parent_slugs());}
function mrseo_new_service_group($slug){
 $groups=array('website-audit'=>'audit','traffic-recovery'=>'audit','google-shopping'=>'ads','merchant-center'=>'ads','online-store-development'=>'commerce','catalog-automation'=>'commerce','web-applications'=>'dev','api-integrations'=>'dev','custom-functionality'=>'dev','ga4-conversions'=>'data','business-dashboards'=>'data','reporting-automation'=>'data');
 return $groups[$slug]??'dev';
}
function mrseo_new_service_copy($slug=null, $locale=null){
 static $all=null;
 if($all===null)$all=array_merge(mrseo_new_service_copy_part1(),mrseo_new_service_copy_part2(),mrseo_new_service_copy_part3());
 $slug=$slug?:mrseo_slug();$locale=$locale?:mrseo_locale();
 return $all[$slug][$locale]??null;
}
function mrseo_new_service_route(){
 if(!in_array(mrseo_locale(),array('uk','ru'),true))return false;
 if(!in_array(mrseo_slug(),mrseo_new_service_slugs(),true))return false;
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 return (bool)preg_match('~^(?:ru/)?(?:website-audit|traffic-recovery|google-shopping|merchant-center|online-store-development|catalog-automation|web-applications|api-integrations|custom-functionality|ga4-conversions|business-dashboards|reporting-automation)/?$~D',$path);
}
add_action('init',function(){
 $part=implode('|',mrseo_new_service_slugs());
 add_rewrite_rule('^('.$part.')/?$','index.php?mrseo_service=$matches[1]','top');
 add_rewrite_rule('^ru/('.$part.')/?$','index.php?mrseo_lang=ru&mrseo_service=$matches[1]','top');
},11);
add_filter('pre_handle_404',function($pre){return mrseo_new_service_route()?true:$pre;},90);
add_filter('template_include',function($template){
 return mrseo_new_service_route()?get_template_directory().'/new-service-landing.php':$template;
},101);
add_filter('redirect_canonical',function($url){
 return mrseo_new_service_route()?false:$url;
},99);
add_filter('pre_get_document_title',function($title){
 if(!mrseo_new_service_route())return $title;
 $p=mrseo_new_service_copy();
 return $p['title'].' | MrSeo.tech';
},90);
add_filter('body_class',function($classes){
 if(mrseo_new_service_route())$classes[]='mrseo-new-service-page';
 return $classes;
});
add_action('wp_head',function(){
 if(!mrseo_new_service_route())return;
 $slug=mrseo_slug();$copy=mrseo_new_service_copy();
 $desc=wp_trim_words($copy['lead'],25,'…');
 echo '<meta name="description" content="'.esc_attr($desc).'">'."\n";
 foreach(array('uk','ru') as $l){
  echo '<link rel="alternate" hreflang="'.$l.'" href="'.esc_url(mrseo_url($slug,$l)).'">'."\n";
 }
 echo '<link rel="alternate" hreflang="x-default" href="'.esc_url(mrseo_url($slug,'uk')).'">'."\n";
 echo '<link rel="canonical" href="'.esc_url(mrseo_url($slug)).'">'."\n";
},4);
add_action('init',function(){
 if(get_option('mrseo_new_service_rules_v1')!=='ready'){
   flush_rewrite_rules(false);
   update_option('mrseo_new_service_rules_v1','ready',false);
 }
},30);
