<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/languages.php';
require_once __DIR__.'/international-content.php';
require_once __DIR__.'/international-home-copy.php';
require_once __DIR__.'/uk-market-home-copy.php';
function mrseo_locale(){$s=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');$a=explode('/',$s);return in_array($a[0]??'',array('ru','en','pl','de','fr','it','es','nl','ro','cs','pt','sv','da','fi','hu','sk','el','bg','hr'),true)?$a[0]:'uk';}
function mrseo_slug(){$a=explode('/',trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/'));if(in_array($a[0]??'',array('ru','en','pl','de','fr','it','es','nl','ro','cs','pt','sv','da','fi','hu','sk','el','bg','hr'),true))array_shift($a);return sanitize_title($a[0]??'');}
function mrseo_url($slug='',$lang=null){
 $lang=$lang?:mrseo_locale();$slug=trim($slug,'/');
 if($slug==='privacy')return home_url('/'.($lang==='uk'?'':$lang.'/').'privacy/');
 // A real Russian page always wins over UK-only slug fallbacks. In particular,
 // google-ads-audit exists independently on /ru/ and must not become /ru/google-ads/.
 if($lang==='ru' && function_exists('mrseo_ru_website_slugs')
     && in_array($slug,mrseo_ru_website_slugs(),true))
  return mrseo_i18n_exact_url('ru',$slug);
 // Completed Dutch services must keep exact URL paths.
 if($lang==='nl' && function_exists('mrseo_nl_service_slugs')
    && in_array($slug,mrseo_nl_service_slugs(),true)
    && ($lang===mrseo_locale() || !function_exists('mrseo_i18n_matching_slug')))
  return mrseo_i18n_exact_url('nl',$slug);
 // Completed Spanish service URLs must never be silently redirected to an EU parent.
 if($lang==='es' && function_exists('mrseo_es_service_slugs')
    && in_array($slug,mrseo_es_service_slugs(),true)
    && ($lang===mrseo_locale() || !function_exists('mrseo_i18n_matching_slug')))
  return mrseo_i18n_exact_url('es',$slug);
 // Complete Italian service URLs must not fall back to generic EU parent pages.
 if($lang==='it' && function_exists('mrseo_it_service_slugs')
    && in_array($slug,mrseo_it_service_slugs(),true)
    && ($lang===mrseo_locale() || !function_exists('mrseo_i18n_matching_slug')))
  return mrseo_i18n_exact_url('it',$slug);
 // A completed French service must remain its actual URL, never the generic EU fallback.
 if($lang==='fr' && function_exists('mrseo_fr_service_slugs')
    && in_array($slug,mrseo_fr_service_slugs(),true)
    && ($lang===mrseo_locale() || !function_exists('mrseo_i18n_matching_slug')))
  return mrseo_i18n_exact_url('fr',$slug);
 // A completed German service must never be downgraded to a generic fallback.
 if($lang==='de' && mrseo_locale()==='de'
    && function_exists('mrseo_de_service_slugs')
    && in_array($slug,mrseo_de_service_slugs(),true))
  return mrseo_i18n_exact_url('de',$slug);
 if($lang==='uk' && mrseo_locale()==='uk' && function_exists('mrseo_ua_website_slugs')
    && in_array($slug,mrseo_ua_website_slugs(),true)){
  // These are genuine Ukrainian pages even when an EN-only slug shares its spelling.
  return home_url('/'.$slug.'/');
 }

 // When switching languages, prefer a real editorial equivalent, not a
 // merely related parent service. No fabricated regional URLs.
 if($lang!==mrseo_locale() && function_exists('mrseo_i18n_matching_slug')){
  $equivalent=mrseo_i18n_matching_slug(mrseo_locale(),$slug,$lang);
  if($equivalent!==null)return mrseo_i18n_exact_url($lang,$equivalent);
 }
 // UK-only offers have a genuine language selector destination on other markets.
 // First prefer reciprocal hreflang groups (handled above). Otherwise use an
 // existing related service, not a fabricated translation.
 if($lang!=='en' && mrseo_locale()==='en'
     && function_exists('mrseo_en_gb_slugs')
     && in_array($slug,mrseo_en_gb_slugs(),true)){
  return mrseo_i18n_exact_url($lang,mrseo_en_gb_parent($slug,$lang));
 }
 // Completed UA/RU services are exact counterparts. For any third language
 // without a finished matching page, the selector goes to a REAL parent URL.
 if(!in_array($lang,array('uk','ru'),true)
     && function_exists('mrseo_ua_website_slugs')
     && in_array($slug,mrseo_ua_website_slugs(),true)
     && ((function_exists('mrseo_ua_website_route') && mrseo_ua_website_route())
      || (function_exists('mrseo_ru_website_route') && mrseo_ru_website_route()))){
  $service=mrseo_ua_website_data($slug);
  $group=$service['group']??'Створення сайтів';
  if($lang==='ru'){
   $parents=array('SEO'=>'seo','Google Ads'=>'google-ads',
    'Інтернет-магазини'=>'online-store-development',
    'Веброзробка'=>'web-development','Створення сайтів'=>'service-websites');
  }elseif($lang==='pl'){
   $parents=array('SEO'=>'seo','Google Ads'=>'google-ads',
    'Інтернет-магазини'=>'tworzenie-sklepow-internetowych',
    'Веброзробка'=>'web-development','Створення сайтів'=>'tworzenie-stron-internetowych');
  }elseif($lang==='de'){
   $parents=array('SEO'=>'seo','Google Ads'=>'google-ads',
    'Інтернет-магазини'=>'web-development',
    'Веброзробка'=>'web-development','Створення сайтів'=>'web-development');
  }else{
   $parents=array('SEO'=>'seo','Google Ads'=>'google-ads',
    'Інтернет-магазини'=>'online-shop-development',
    'Веброзробка'=>'web-development','Створення сайтів'=>'website-design');
  }
  $slug=$parents[$group]??'';
 }
 // New market URLs may only point to actually completed pages.
 if(in_array($lang,array('fr','it','es','nl','ro','cs','pt','sv','da','fi','hu','sk','el','bg','hr'),true) && !in_array($slug,array('','seo','seo-audit','ecommerce-seo','google-ads','analytics','web-development','website-design','online-shop-development','about','portfolio','contact','privacy'),true)
    && !($lang==='fr' && function_exists('mrseo_fr_service_slugs') && in_array($slug,mrseo_fr_service_slugs(),true))
    && !($lang==='it' && function_exists('mrseo_it_service_slugs') && in_array($slug,mrseo_it_service_slugs(),true))
    && !($lang==='es' && function_exists('mrseo_es_service_slugs') && in_array($slug,mrseo_es_service_slugs(),true))
     && !($lang==='nl' && function_exists('mrseo_nl_service_slugs') && in_array($slug,mrseo_nl_service_slugs(),true))){
  if(in_array($slug,array('seo-audit','ecommerce-seo'),true))$slug='seo';
  elseif(in_array($slug,array('performance-max','google-shopping','merchant-center'),true))$slug='google-ads';
  elseif(in_array($slug,array('service-websites','online-store-development','website-design','wordpress-care'),true))$slug='web-development';
  else $slug='';
 }
 // A fully translated European route must not be downgraded by UK-only fallback aliases.
 if(in_array($lang,array('fr','it','es','nl','ro','cs','pt','sv','da','fi','hu','sk','el','bg','hr'),true)
    && (in_array($slug,mrseo_eu_slugs(),true)
      || ($lang==='fr' && function_exists('mrseo_fr_service_slugs') && in_array($slug,mrseo_fr_service_slugs(),true))
      || ($lang==='it' && function_exists('mrseo_it_service_slugs') && in_array($slug,mrseo_it_service_slugs(),true))
      || ($lang==='es' && function_exists('mrseo_es_service_slugs') && in_array($slug,mrseo_es_service_slugs(),true))
       || ($lang==='nl' && function_exists('mrseo_nl_service_slugs') && in_array($slug,mrseo_nl_service_slugs(),true)))){
  return mrseo_i18n_exact_url($lang,$slug);
 }
 // UK-only routes switch to real parent services in other languages.
 if($lang!=='en' && function_exists('mrseo_uk_market_new_slugs') && in_array($slug,mrseo_uk_market_new_slugs(),true)){
  $slug=mrseo_uk_market_parent($slug,$lang);
 }

 // Country-only Polish offers link to relevant existing pages when switching languages.
 if($lang!=='pl' && function_exists('mrseo_pl_service_slugs') && in_array($slug,mrseo_pl_service_slugs(),true)
    // A genuine completed alternate takes precedence over a Polish-only navigation fallback.
    && !(function_exists('mrseo_i18n_matching_slug') && mrseo_i18n_matching_slug($lang,$slug,'pl')!==null)
    && !($lang==='en' && function_exists('mrseo_uk_market_new_slugs') && in_array($slug,mrseo_uk_market_new_slugs(),true))
    && !($lang==='en' && function_exists('mrseo_en_gb_slugs') && in_array($slug,mrseo_en_gb_slugs(),true))){
  $slug=mrseo_pl_service_parent($slug,$lang);
 }
 // Existing service entrypoints must lead to real Poland-specific service pages.
 if($lang==='pl'){
  $pl_aliases=array('service-websites'=>'tworzenie-stron-internetowych','online-store-development'=>'tworzenie-sklepow-internetowych','merchant-center'=>'problemy-merchant-center');
  if(isset($pl_aliases[$slug])
      && !(function_exists('mrseo_pl_service_slugs') && in_array($slug,mrseo_pl_service_slugs(),true)))
      $slug=$pl_aliases[$slug];
 }
 // New pages have original UA/RU copy; other languages use a relevant completed parent page.
 if(function_exists('mrseo_new_service_parent_slugs') && !in_array($lang,array('uk','ru'),true)){
  $new_parents=mrseo_new_service_parent_slugs();
  if(isset($new_parents[$slug]) && !($lang==='en' && function_exists('mrseo_uk_market_new_slugs') && in_array($slug,mrseo_uk_market_new_slugs(),true)) && !($lang==='en' && function_exists('mrseo_en_gb_slugs') && in_array($slug,mrseo_en_gb_slugs(),true)) && !($lang==='pl' && function_exists('mrseo_pl_service_slugs') && in_array($slug,mrseo_pl_service_slugs(),true)))$slug=$new_parents[$slug];
 }
 if($slug==='horoshop' && !in_array($lang,array('uk','ru'),true))$slug='ecommerce-seo';
 if(in_array($lang,array('pl','de'),true) && !in_array($slug,mrseo_int_pages(),true)
    && !($lang==='pl' && function_exists('mrseo_pl_service_slugs') && in_array($slug,mrseo_pl_service_slugs(),true))
    && !($lang==='de' && function_exists('mrseo_de_service_slugs') && in_array($slug,mrseo_de_service_slugs(),true))){
  $slug=$slug==='performance-max'?'google-ads':($slug==='service-websites'?'seo':'');
 }
 return home_url('/'.($lang==='uk'?'':$lang.'/').($slug?$slug.'/':''));
}
function mrseo_t($uk,$ru,$en){
 $l=mrseo_locale();
 if($l==='pl'||$l==='de')return mrseo_int_home_copy($l,$en);
 // One shared visual template; localized texts are read from the existing
 // approved market content, never from a duplicate visual template.
 if(function_exists('mrseo_eu_markets') && isset(mrseo_eu_markets()[$l])){
  require_once __DIR__.'/eu-orbit-copy.php';
  return mrseo_eu_orbit_copy($l,$en);
 }
 return $l==='uk'?$uk:($l==='ru'?$ru:($l==='en'?mrseo_uk_home_copy($en):$en));
}
function mrseo_translation($slug){$all=mrseo_translation_drafts();$l=mrseo_locale();return $all[$l][$slug]??array('','','',array());}
function mrseo_is_case(){$p=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');return (bool)preg_match('~^(?:ru/|en/)?portfolio/[a-z0-9-]+/?$~',$p);}
function mrseo_case_id(){$p=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');$a=explode('/',$p);return sanitize_title(end($a));}
function mrseo_valid_route(){
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 if(preg_match('~^(pl|de)(?:/([^/]+))?$~D',$path,$matches)){
  return in_array($matches[2]??'',mrseo_int_pages(),true);
 }
 if($path==='en/horoshop')return false;
 return (bool)preg_match('~^(?:(?:ru|en)(?:/|$))?(?:seo|seo-audit|ecommerce-seo|service-websites|web-development|horoshop|google-ads|performance-max|analytics|about|contact|portfolio|orbit-lab|orbit-light)?/?$~D',$path);
}
function mrseo_virtual_page(){return in_array(mrseo_slug(),array('portfolio','orbit-lab','orbit-light'),true) || mrseo_locale()!=='uk';}
function mrseo_router($template){if(!mrseo_valid_route())return $template;if(mrseo_slug()==='web-development')return get_template_directory().'/development-landing.php';if(in_array(mrseo_locale(),array('pl','de'),true)){
 return get_template_directory().(mrseo_slug()===''?'/orbit-lab.php':'/international-landing.php');
}$slug=mrseo_slug();$allowed=array('','seo','seo-audit','ecommerce-seo','service-websites','horoshop','web-development','google-ads','performance-max','analytics','about','contact','portfolio','orbit-lab','orbit-light');if(!in_array($slug,$allowed,true))return $template;
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
add_filter('pre_get_document_title',function($title){if(!mrseo_valid_route())return $title;if(mrseo_locale()==='ru'){
 $ruTitles=array(
  'service-websites'=>'Создание сайтов услуг для бизнеса | MrSeo.tech',
  'google-ads'=>'Настройка и ведение Google Ads | MrSeo.tech',
  'analytics'=>'Маркетинговая аналитика: расходы, заявки и продажи | MrSeo.tech'
 );
 $ruSlug=mrseo_slug();
 if(isset($ruTitles[$ruSlug]))return $ruTitles[$ruSlug];
}if(mrseo_locale()==='uk'){$uaTitles=array('service-websites'=>'Створення сайтів послуг для бізнесу | MrSeo.tech','google-ads'=>'Налаштування та ведення Google Ads | MrSeo.tech','analytics'=>'Маркетингова аналітика: витрати й продажі | MrSeo.tech');$uaSlug=mrseo_slug();if(isset($uaTitles[$uaSlug]))return $uaTitles[$uaSlug];}if(in_array(mrseo_locale(),array('pl','de'),true)){$p=mrseo_int_page();return $p['title']??$title;}$slug=mrseo_slug();if(!$slug)return mrseo_locale()==='en'?'Website Design, SEO & Google Ads for UK Businesses | MrSeo.tech':'MrSeo.tech';if(mrseo_is_case())return '404 | MrSeo.tech';if($slug==='orbit-lab')return 'Orbit Lab — Private Concept | MrSeo.tech';if($slug==='orbit-light')return 'Orbital Growth Light — Concept 02 | MrSeo.tech';if($slug==='seo')return mrseo_t('SEO-просування сайтів у Google — замовити SEO','SEO-продвижение сайтов в Google — заказать SEO','SEO Services & Website Optimization').' | MrSeo.tech';if($slug==='about')return mrseo_t('Про нас — команда з 10-річним досвідом','О нас — команда с 10-летним опытом','About — a team with 10 years of experience').' | MrSeo.tech';if($slug==='portfolio')return mrseo_t('Портфоліо','Портфолио','Portfolio').' | MrSeo.tech';if($slug==='horoshop')return mrseo_t('SEO для Хорошоп — просування та розвиток магазину','SEO для Хорошоп — продвижение и развитие магазина','Horoshop SEO').' | MrSeo.tech';if($slug==='web-development')return mrseo_dev_page()['title'];if($slug==='service-websites')return mrseo_t('Створення та просування сайтів послуг','Создание и продвижение сайтов услуг','Service Website SEO & Development').' | MrSeo.tech';$d=mrseo_translation($slug);return $d[0].' | MrSeo.tech';},20);
// Canonical and hreflang are owned by inc/international-seo.php.
add_action('init',function(){
 add_rewrite_rule('^portfolio/([^/]+)/?$','index.php?mrseo_service=portfolio&mrseo_case=$matches[1]','top');
 add_rewrite_rule('^(ru|en)/portfolio/([^/]+)/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=portfolio&mrseo_case=$matches[2]','top');
 add_rewrite_rule('^orbit-lab/?$','index.php?mrseo_service=orbit-lab','top');
 add_rewrite_rule('^(ru|en)/orbit-lab/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=orbit-lab','top');
 add_rewrite_rule('^orbit-light/?$','index.php?mrseo_service=orbit-light','top');
 add_rewrite_rule('^(ru|en)/orbit-light/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=orbit-light','top');
 add_rewrite_rule('^ru/horoshop/?$','index.php?mrseo_lang=ru&mrseo_service=horoshop','top');
 add_rewrite_rule('^web-development/?$','index.php?mrseo_service=web-development','top');
 add_rewrite_rule('^(pl|de)/?$','index.php?mrseo_lang=$matches[1]','top');
 add_rewrite_rule('^(pl|de)/(seo|ecommerce-seo|seo-audit|google-ads|analytics|web-development|about|contact|portfolio)/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=$matches[2]','top');
 add_rewrite_rule('^(ru|en)/?$','index.php?mrseo_lang=$matches[1]','top');
 add_rewrite_rule('^(ru|en)/(seo|seo-audit|ecommerce-seo|service-websites|web-development|google-ads|performance-max|analytics|about|contact|portfolio)/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=$matches[2]','top');
},10);
add_filter('query_vars',function($vars){return array_merge($vars,array('mrseo_lang','mrseo_service','mrseo_case'));});
add_filter('redirect_canonical',function($url){return (mrseo_is_case()||mrseo_locale()!=='uk'||in_array(mrseo_slug(),array('portfolio','orbit-lab','orbit-light'),true))?false:$url;});
add_filter('pre_handle_404',function($pre){if(!mrseo_valid_route())return $pre;$slug=mrseo_slug();if(mrseo_is_case())return $pre;if(in_array($slug,array('orbit-lab','orbit-light','web-development'),true))return true;if(mrseo_locale()!=='uk'&&in_array($slug,array('','seo','seo-audit','ecommerce-seo','service-websites','horoshop','web-development','google-ads','performance-max','analytics','about','contact','portfolio'),true))return true;if($slug==='portfolio')return true;return $pre;});
add_action('init',function(){if(get_option('mrseo_i18n_rules_v12')!=='ready'){flush_rewrite_rules(false);update_option('mrseo_i18n_rules_v12','ready',false);}},30);
add_action('template_redirect',function(){
 if(mrseo_locale()==='en' && mrseo_slug()==='horoshop'){
  status_header(404);nocache_headers();
  $not_found=get_404_template();
  if($not_found){include $not_found;}else{wp_die('Page not found','404',array('response'=>404));}
  exit;
 }
},0);
add_action('template_redirect',function(){if(mrseo_is_case()){wp_safe_redirect(mrseo_url('portfolio'),301);exit;}},1);

// International XML sitemap contains only complete public routes; staging noindex is unchanged.
require_once __DIR__.'/international-sitemap.php';
