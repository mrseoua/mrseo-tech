<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/pl-service-content.php';
/** Complete Poland-only landings. Other locales intentionally use their own existing pages. */
function mrseo_pl_service_route(){
 if(mrseo_locale()!=='pl')return false;
 $slug=mrseo_slug();
 if(!in_array($slug,mrseo_pl_service_slugs(),true))return false;
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 return $path==='pl/'.$slug;
}
add_action('init',function(){
 $part=implode('|',array_map('preg_quote',mrseo_pl_service_slugs()));
 add_rewrite_rule('^pl/('.$part.')/?$','index.php?mrseo_lang=pl&mrseo_service=$matches[1]','top');
},11);
add_filter('pre_handle_404',function($pre){return mrseo_pl_service_route()?true:$pre;},95);
add_filter('template_include',function($template){
 return mrseo_pl_service_route()?get_template_directory().'/pl-service-landing.php':$template;
},110);
add_filter('pre_get_document_title',function($title){
 $page=mrseo_pl_service_route()?mrseo_pl_service_page():null;
 return $page?$page['title']:$title;
},110);
add_action('wp_head',function(){
 if(!mrseo_pl_service_route())return;
 $page=mrseo_pl_service_page();
 echo '<meta name="description" content="'.esc_attr($page['description']).'">'."\n";
 // One canonical and reciprocal hreflang set is rendered by international-seo.php.
},3);
add_action('init',function(){
 if(get_option('mrseo_pl_service_rules_v1')!=='ready'){
  flush_rewrite_rules(false);
  update_option('mrseo_pl_service_rules_v1','ready',false);
 }
},35);

/** Dedicated six-column Polish menu: 3+3 in approved responsive grid. */
function mrseo_render_pl_mega_menu($mobile=false){
 if(function_exists('mrseo_render_mega_menu_trial')){mrseo_render_mega_menu_trial($mobile);return;}
 $sections=array(
  array('key'=>'dev','heading'=>'Strony internetowe','items'=>array(
   array('tworzenie-stron-internetowych','Tworzenie stron dla firm'),
   array('opieka-wordpress','Opieka nad WordPress'),
   array('web-development','Aplikacje i systemy na zamówienie'))),
  array('key'=>'commerce','heading'=>'Sklepy internetowe','items'=>array(
   array('tworzenie-sklepow-internetowych','Tworzenie sklepów'),
   array('ecommerce-seo','SEO sklepów internetowych'),
   array(null,'Migracja i rozwój katalogu'),
   array(null,'Integracje i automatyzacja'))),
  array('key'=>'seo','heading'=>'SEO i audyty','items'=>array(
   array('seo','Pozycjonowanie stron'),
   array('seo-audit','Audyt techniczny SEO'),
   array(null,'Spadki ruchu i migracje'),
   array(null,'SEO lokalne'))),
  array('key'=>'ads','heading'=>'Google Ads i Merchant','items'=>array(
   array('google-ads','Prowadzenie Google Ads'),
   array('audyt-google-ads','Audyt kampanii Google Ads'),
   array('google-shopping','Google Shopping'),
   array('problemy-merchant-center','Problemy Merchant Center'),
   array(null,'Performance Max'))),
  array('key'=>'dev','heading'=>'Aplikacje i integracje','items'=>array(
   array('web-development','Aplikacje i rozwiązania na zamówienie'),
   array(null,'Panele klienta i B2B'),
   array(null,'Integracje API'),
   array(null,'Kalkulatory i konfiguratory'))),
  array('key'=>'data','heading'=>'Analityka i dane','items'=>array(
   array('analytics','Analityka i konwersje GA4'),
   array(null,'Google Tag Manager'),
   array(null,'Dashboardy i BigQuery'),
   array(null,'Automatyzacja raportowania')))
 );
 $current=mrseo_slug();
 echo '<div class="mrseo-mega'.($mobile?' mrseo-mega--mobile-panel':'').' mrseo-mega--poland"><div class="mrseo-mega-grid">';
 foreach($sections as $section){
  echo '<section class="mrseo-mega-group mrseo-mega-group--'.esc_attr($section['key']).'">';
  echo '<h3>'.mrseo_mega_menu_icon($section['key']).'<span>'.esc_html($section['heading']).'</span></h3><div class="mrseo-mega-items">';
  foreach($section['items'] as $entry){
   if($entry[0]===null){echo '<span class="mrseo-mega-item">'.esc_html($entry[1]).'</span>';continue;}
   $active=$entry[0]===$current;
   echo '<a class="mrseo-mega-item'.($active?' is-current':'').'" href="'.esc_url(mrseo_url($entry[0],'pl')).'"'.($active?' aria-current="page"':'').'>'.esc_html($entry[1]).'</a>';
  }
  echo '</div></section>';
 }
 echo '</div><div class="mrseo-mega-bottom"><div class="mrseo-mega-bottom-copy"><strong>Potrzebujesz czegoś innego?</strong><p>Nowa strona, sklep, kampania czy problem techniczny? Opisz sytuację — dobierzemy odpowiedni zakres pracy.</p></div>';
 echo '<a class="mrseo-mega-contact" href="'.esc_url(mrseo_url('contact','pl')).'">Opisz swój projekt <span aria-hidden="true">↗</span></a></div></div>';
}
