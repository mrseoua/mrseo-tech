<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/languages.php';
function mrseo_locale(){$s=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');$a=explode('/',$s);return in_array($a[0]??'',array('ru','en'),true)?$a[0]:'uk';}
function mrseo_slug(){$a=explode('/',trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/'));if(in_array($a[0]??'',array('ru','en'),true))array_shift($a);return sanitize_title($a[0]??'');}
function mrseo_url($slug='',$lang=null){$lang=$lang?:mrseo_locale();return home_url('/'.($lang==='uk'?'':$lang.'/').($slug?trim($slug,'/').'/':''));}
function mrseo_t($uk,$ru,$en){$l=mrseo_locale();return $l==='uk'?$uk:($l==='ru'?$ru:$en);}
function mrseo_translation($slug){$all=mrseo_translation_drafts();$l=mrseo_locale();return $all[$l][$slug]??array('','','',array());}
function mrseo_is_case(){$p=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');return (bool)preg_match('~^(?:ru/|en/)?portfolio/[a-z0-9-]+/?$~',$p);}
function mrseo_case_id(){$p=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');$a=explode('/',$p);return sanitize_title(end($a));}
function mrseo_virtual_page(){return mrseo_slug()==='portfolio' || mrseo_locale()!=='uk';}
function mrseo_router($template){$slug=mrseo_slug();$allowed=array('','seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','about','contact','portfolio');if(!in_array($slug,$allowed,true))return $template;
if($slug==='')return get_template_directory().'/front-localized.php';
if($slug==='portfolio' && mrseo_is_case())return get_template_directory().'/portfolio-localized.php';
if($slug==='portfolio')return get_template_directory().'/portfolio-localized.php';
if($slug==='contact')return get_template_directory().'/contact-localized.php';
return get_template_directory().'/service-localized.php';}
add_filter('template_include','mrseo_router',99);
add_filter('pre_get_document_title',function($title){$slug=mrseo_slug();if(!$slug)return 'MrSeo.tech';if(mrseo_is_case())return '404 | MrSeo.tech';if($slug==='portfolio')return mrseo_t('Портфоліо','Портфолио','Portfolio').' | MrSeo.tech';$d=mrseo_translation($slug);return $d[0].' | MrSeo.tech';},20);
add_action('wp_head',function(){$slug=mrseo_slug();$valid=array('','seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','about','contact','portfolio');if(!in_array($slug,$valid,true)||mrseo_is_case())return;$path=$slug;foreach(array('uk','ru','en') as $l)echo '<link rel="alternate" hreflang="'.esc_attr($l).'" href="'.esc_url(mrseo_url($path,$l)).'">'."\n";echo '<link rel="alternate" hreflang="x-default" href="'.esc_url(mrseo_url($path,'uk')).'">'."\n";echo '<link rel="canonical" href="'.esc_url(mrseo_url($path)).'">'."\n";},2);
add_action('init',function(){
add_rewrite_rule('^portfolio/([^/]+)/?$','index.php?mrseo_service=portfolio&mrseo_case=$matches[1]','top');
add_rewrite_rule('^(ru|en)/portfolio/([^/]+)/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=portfolio&mrseo_case=$matches[2]','top');
add_rewrite_rule('^(ru|en)/?$','index.php?mrseo_lang=$matches[1]','top');
add_rewrite_rule('^(ru|en)/(seo|seo-audit|ecommerce-seo|google-ads|performance-max|analytics|about|contact|portfolio)/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=$matches[2]','top');
},10);
add_filter('query_vars',function($vars){return array_merge($vars,array('mrseo_lang','mrseo_service','mrseo_case'));});
add_filter('redirect_canonical',function($url){return (mrseo_is_case()||mrseo_locale()!=='uk'||mrseo_slug()==='portfolio')?false:$url;});
add_filter('pre_handle_404',function($pre){$s=mrseo_slug();if(mrseo_is_case())return $pre;if(mrseo_locale()!=='uk'&&in_array($s,array('','seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','about','contact','portfolio'),true))return true;if($s==='portfolio')return true;return $pre;});
add_action('init',function(){if(get_option('mrseo_i18n_rules_v4')!=='ready'){flush_rewrite_rules(false);update_option('mrseo_i18n_rules_v4','ready',false);}},30);

add_action('template_redirect',function(){if(mrseo_is_case()){wp_safe_redirect(mrseo_url('portfolio'),301);exit;}},1);
