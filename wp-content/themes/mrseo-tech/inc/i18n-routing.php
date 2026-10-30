<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/languages.php';
function mrseo_locale(){$s=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');$a=explode('/',$s);return in_array($a[0]??'',array('ru','en'),true)?$a[0]:'uk';}
function mrseo_slug(){$a=explode('/',trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/'));if(in_array($a[0]??'',array('ru','en'),true))array_shift($a);return sanitize_title($a[0]??'');}
function mrseo_url($slug='',$lang=null){$lang=$lang?:mrseo_locale();if(trim($slug,'/')==='horoshop' && !in_array($lang,array('uk','ru'),true))$slug='ecommerce-seo';return home_url('/'.($lang==='uk'?'':$lang.'/').($slug?trim($slug,'/').'/':''));}
function mrseo_t($uk,$ru,$en){$l=mrseo_locale();return $l==='uk'?$uk:($l==='ru'?$ru:$en);}
function mrseo_translation($slug){$all=mrseo_translation_drafts();$l=mrseo_locale();return $all[$l][$slug]??array('','','',array());}
function mrseo_is_case(){$p=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');return (bool)preg_match('~^(?:ru/|en/)?portfolio/[a-z0-9-]+/?$~',$p);}
function mrseo_case_id(){$p=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');$a=explode('/',$p);return sanitize_title(end($a));}
function mrseo_valid_route(){
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 if($path==='en/horoshop')return false;
 return (bool)preg_match('~^(?:(?:ru|en)(?:/|$))?(?:seo|seo-audit|ecommerce-seo|service-websites|horoshop|google-ads|performance-max|analytics|about|contact|portfolio|orbit-lab|orbit-light)?/?$~D',$path);
}
function mrseo_virtual_page(){return in_array(mrseo_slug(),array('portfolio','orbit-lab','orbit-light'),true) || mrseo_locale()!=='uk';}
function mrseo_router($template){if(!mrseo_valid_route())return $template;$slug=mrseo_slug();$allowed=array('','seo','seo-audit','ecommerce-seo','service-websites','horoshop','google-ads','performance-max','analytics','about','contact','portfolio','orbit-lab','orbit-light');if(!in_array($slug,$allowed,true))return $template;
if($slug==='')return get_template_directory().'/orbit-lab.php';
if($slug==='orbit-lab')return get_template_directory().'/orbit-lab.php';
if($slug==='orbit-light')return get_template_directory().'/orbit-light.php';
if($slug==='portfolio' && mrseo_is_case())return get_template_directory().'/portfolio-localized.php';
if($slug==='portfolio')return get_template_directory().'/portfolio-localized.php';
if(in_array($slug,array('service-websites','horoshop'),true))return get_template_directory().'/specialized-landing.php';
if($slug==='seo')return get_template_directory().'/seo-landing.php';
if($slug==='ecommerce-seo')return get_template_directory().'/ecommerce-landing.php';
if($slug==='about')return get_template_directory().'/about-localized.php';
if($slug==='contact')return get_template_directory().'/contact-localized.php';
return get_template_directory().'/service-localized.php';}
add_filter('template_include','mrseo_router',99);
add_filter('pre_get_document_title',function($title){if(!mrseo_valid_route())return $title;$slug=mrseo_slug();if(!$slug)return 'MrSeo.tech';if(mrseo_is_case())return '404 | MrSeo.tech';if($slug==='orbit-lab')return 'Orbit Lab — Private Concept | MrSeo.tech';if($slug==='orbit-light')return 'Orbital Growth Light — Concept 02 | MrSeo.tech';if($slug==='seo')return mrseo_t('SEO-просування сайтів у Google — замовити SEO','SEO-продвижение сайтов в Google — заказать SEO','SEO Services & Website Optimization').' | MrSeo.tech';if($slug==='about')return mrseo_t('Про нас — команда з 10-річним досвідом','О нас — команда с 10-летним опытом','About — a team with 10 years of experience').' | MrSeo.tech';if($slug==='portfolio')return mrseo_t('Портфоліо','Портфолио','Portfolio').' | MrSeo.tech';if($slug==='horoshop')return mrseo_t('SEO для Хорошоп — просування та розвиток магазину','SEO для Хорошоп — продвижение и развитие магазина','Horoshop SEO').' | MrSeo.tech';if($slug==='service-websites')return mrseo_t('Створення та просування сайтів послуг','Создание и продвижение сайтов услуг','Service Website SEO & Development').' | MrSeo.tech';$d=mrseo_translation($slug);return $d[0].' | MrSeo.tech';},20);
add_action('wp_head',function(){if(!mrseo_valid_route())return;$slug=mrseo_slug();$valid=array('','seo','seo-audit','ecommerce-seo','service-websites','horoshop','google-ads','performance-max','analytics','about','contact','portfolio');if(!in_array($slug,$valid,true)||mrseo_is_case())return;$path=$slug;$langs=$slug==='horoshop'?array('uk','ru'):array('uk','ru','en');foreach($langs as $l)echo '<link rel="alternate" hreflang="'.esc_attr($l).'" href="'.esc_url(mrseo_url($path,$l)).'">'."\n";echo '<link rel="alternate" hreflang="x-default" href="'.esc_url(mrseo_url($path,'uk')).'">'."\n";echo '<link rel="canonical" href="'.esc_url(mrseo_url($path)).'">'."\n";},2);
add_action('init',function(){
 add_rewrite_rule('^portfolio/([^/]+)/?$','index.php?mrseo_service=portfolio&mrseo_case=$matches[1]','top');
 add_rewrite_rule('^(ru|en)/portfolio/([^/]+)/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=portfolio&mrseo_case=$matches[2]','top');
 add_rewrite_rule('^orbit-lab/?$','index.php?mrseo_service=orbit-lab','top');
 add_rewrite_rule('^(ru|en)/orbit-lab/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=orbit-lab','top');
 add_rewrite_rule('^orbit-light/?$','index.php?mrseo_service=orbit-light','top');
 add_rewrite_rule('^(ru|en)/orbit-light/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=orbit-light','top');
 add_rewrite_rule('^ru/horoshop/?$','index.php?mrseo_lang=ru&mrseo_service=horoshop','top');
 add_rewrite_rule('^(ru|en)/?$','index.php?mrseo_lang=$matches[1]','top');
 add_rewrite_rule('^(ru|en)/(seo|seo-audit|ecommerce-seo|service-websites|google-ads|performance-max|analytics|about|contact|portfolio)/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=$matches[2]','top');
},10);
add_filter('query_vars',function($vars){return array_merge($vars,array('mrseo_lang','mrseo_service','mrseo_case'));});
add_filter('redirect_canonical',function($url){return (mrseo_is_case()||mrseo_locale()!=='uk'||in_array(mrseo_slug(),array('portfolio','orbit-lab','orbit-light'),true))?false:$url;});
add_filter('pre_handle_404',function($pre){if(!mrseo_valid_route())return $pre;$slug=mrseo_slug();if(mrseo_is_case())return $pre;if(in_array($slug,array('orbit-lab','orbit-light'),true))return true;if(mrseo_locale()!=='uk'&&in_array($slug,array('','seo','seo-audit','ecommerce-seo','service-websites','horoshop','google-ads','performance-max','analytics','about','contact','portfolio'),true))return true;if($slug==='portfolio')return true;return $pre;});
add_action('init',function(){if(get_option('mrseo_i18n_rules_v9')!=='ready'){flush_rewrite_rules(false);update_option('mrseo_i18n_rules_v9','ready',false);}},30);
add_action('template_redirect',function(){
 if(mrseo_locale()==='en' && mrseo_slug()==='horoshop'){
  status_header(404);nocache_headers();
  $not_found=get_404_template();
  if($not_found){include $not_found;}else{wp_die('Page not found','404',array('response'=>404));}
  exit;
 }
},0);
add_action('template_redirect',function(){if(mrseo_is_case()){wp_safe_redirect(mrseo_url('portfolio'),301);exit;}},1);
