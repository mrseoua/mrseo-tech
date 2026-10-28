<?php
if (!defined('ABSPATH')) exit;
require_once __DIR__.'/languages.php';
function mrseo_locale(){ $uri=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');$first=explode('/',$uri)[0];return in_array($first,array('ru','en'),true)?$first:'uk';}
function mrseo_slug(){ $uri=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');$a=explode('/',$uri);if(in_array($a[0]??'',array('ru','en'),true))array_shift($a);return sanitize_title($a[0]??'');}
function mrseo_url($slug='',$lang=null){$lang=$lang?:mrseo_locale();$path=($lang==='uk'?'':$lang.'/').($slug?trim($slug,'/').'/':'');return home_url('/'.$path);}
function mrseo_t($uk,$ru,$en){$v=mrseo_locale();return $v==='uk'?$uk:($v==='en'?$en:$ru);}
function mrseo_translation($slug){$all=mrseo_translation_drafts();$lang=mrseo_locale();return $all[$lang][$slug]??$all['uk'][$slug]??array('','','',array());}
function mrseo_router($template){$slug=mrseo_slug();$lang=mrseo_locale();
$allowed=array('','seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','about','contact');
if(!in_array($slug,$allowed,true))return $template;
if($slug==='')return get_template_directory().'/front-localized.php';
if($slug==='contact')return get_template_directory().'/contact-localized.php';
return get_template_directory().'/service-localized.php';
}
add_filter('template_include','mrseo_router',99);
add_filter('pre_get_document_title',function($title){if(mrseo_locale()==='uk')return $title;$slug=mrseo_slug();if(!$slug)return mrseo_t('MrSeo.tech','MrSeo.tech','MrSeo.tech');$d=mrseo_translation($slug);return $d[0].' | MrSeo.tech';},20);
add_filter('language_attributes',function($attr){return preg_replace('/lang="[^"]*"/','lang="'.esc_attr(mrseo_locale()).'"',$attr);});
add_action('wp_head',function(){ $slug=mrseo_slug();$allowed=array('','seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','about','contact');if(!in_array($slug,$allowed,true))return;foreach(array('uk','ru','en') as $lang){echo '<link rel="alternate" hreflang="'.esc_attr($lang).'" href="'.esc_url(mrseo_url($slug,$lang)).'">'."\n";}echo '<link rel="alternate" hreflang="x-default" href="'.esc_url(mrseo_url($slug,'uk')).'">'."\n";echo '<link rel="canonical" href="'.esc_url(mrseo_url($slug)).'">'."\n";},2);
add_action('init',function(){add_rewrite_rule('^(ru|en)/?$','index.php?mrseo_lang=$matches[1]','top');add_rewrite_rule('^(ru|en)/(seo|seo-audit|ecommerce-seo|google-ads|performance-max|analytics|about|contact)/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=$matches[2]','top');});
add_filter('query_vars',function($vars){$vars[]='mrseo_lang';$vars[]='mrseo_service';return $vars;});
add_filter('redirect_canonical',function($url){return mrseo_locale()==='uk'?$url:false;});
add_action('after_switch_theme',function(){flush_rewrite_rules();});

add_filter('pre_handle_404',function($pre){return mrseo_locale()!=='uk' && in_array(mrseo_slug(),array('','seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','about','contact'),true)?true:$pre;},10);
