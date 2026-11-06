<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/uk-market-content.php';
require_once __DIR__.'/uk-market-core-content.php';
/** United Kingdom content on existing /en/ URLs; future regional aliases must be separate. */
function mrseo_uk_market_page($slug=null){
 $slug=$slug??mrseo_slug();
 $new=mrseo_uk_market_data();
 if(isset($new[$slug]))return $new[$slug];
 $old=mrseo_uk_core_data();
 return $old[$slug]??null;
}
function mrseo_uk_market_slugs(){return array_merge(array_keys(mrseo_uk_market_data()),array_keys(mrseo_uk_core_data()));}
function mrseo_uk_market_new_slugs(){return array_keys(mrseo_uk_market_data());}
function mrseo_uk_market_route(){
 if(mrseo_locale()!=='en')return false;
 $slug=mrseo_slug();
 if(!in_array($slug,mrseo_uk_market_slugs(),true))return false;
 return trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/')==='en/'.$slug;
}
function mrseo_uk_market_parent($slug,$to){
 $pl=array(
 'website-design'=>'tworzenie-stron-internetowych',
 'online-shop-development'=>'tworzenie-sklepow-internetowych',
 'google-ads-audit'=>'audyt-google-ads',
 'merchant-center-help'=>'problemy-merchant-center',
 'google-shopping'=>'google-shopping',
 'wordpress-care'=>'opieka-wordpress'
 );
 if($to==='pl')return $pl[$slug]??'';
 $ukru=array(
 'website-design'=>'service-websites',
 'online-shop-development'=>'online-store-development',
 'google-ads-audit'=>'google-ads',
 'merchant-center-help'=>'merchant-center',
 'google-shopping'=>'google-shopping',
 'wordpress-care'=>'web-development'
 );
 if(in_array($to,array('uk','ru'),true))return $ukru[$slug]??'';
 $de=array(
 'website-design'=>'web-development',
 'online-shop-development'=>'ecommerce-seo',
 'google-ads-audit'=>'google-ads',
 'merchant-center-help'=>'google-ads',
 'google-shopping'=>'google-ads',
 'wordpress-care'=>'web-development'
 );
 return $de[$slug]??'';
}
add_action('init',function(){
 $slugs=array_map('preg_quote',mrseo_uk_market_new_slugs());
 add_rewrite_rule('^en/('.implode('|',$slugs).')/?$','index.php?mrseo_lang=en&mrseo_service=$matches[1]','top');
},12);
add_filter('pre_handle_404',function($pre){return mrseo_uk_market_route()?true:$pre;},95);
add_filter('template_include',function($tpl){
 return mrseo_uk_market_route()?get_template_directory().'/uk-market-landing.php':$tpl;
},120);
add_filter('pre_get_document_title',function($title){
 $page=mrseo_uk_market_route()?mrseo_uk_market_page():null;
 return $page?$page['title']:$title;
},120);
add_action('wp_head',function(){
 if(!mrseo_uk_market_route())return;
 $slug=mrseo_slug();$page=mrseo_uk_market_page();
 echo '<meta name="description" content="'.esc_attr($page['desc']).'">'."\n";
 // One canonical and reciprocal hreflang set is rendered by international-seo.php.

},3);
add_action('init',function(){
 if(get_option('mrseo_uk_market_rules_v1')!=='ready'){
  flush_rewrite_rules(false);update_option('mrseo_uk_market_rules_v1','ready',false);
 }
},36);
/** UK-first navigation: real pages only, separate site creation from improvement work. */
function mrseo_render_uk_market_menu($mobile=false){
 if(function_exists('mrseo_render_mega_menu_trial')){mrseo_render_mega_menu_trial($mobile);return;}
 $groups=array(
 ['dev','Websites',[['website-design','Website design & development'],['service-websites','Service business websites'],['wordpress-care','WordPress maintenance']]],
 ['commerce','Online shops',[['online-shop-development','Ecommerce website development'],['ecommerce-seo','Ecommerce SEO'],['google-shopping','Google Shopping']]],
 ['seo','SEO & audits',[['seo','SEO services'],['seo-audit','Technical SEO audit']]],
 ['ads','PPC & Google Ads',[['google-ads','Google Ads management'],['google-ads-audit','Google Ads audit'],['performance-max','Performance Max'],['merchant-center-help','Merchant Center support']]],
 ['dev','Bespoke development',[['web-development','Web apps, CRM & API integration']]],
 ['data','Measurement',[['analytics','GA4 & conversion tracking']]]
 );
 echo '<div class="mrseo-mega'.($mobile?' mrseo-mega--mobile-panel':'').' mrseo-mega--uk-market"><div class="mrseo-mega-grid">';
 foreach($groups as $group){
  echo '<section class="mrseo-mega-group mrseo-mega-group--'.esc_attr($group[0]).'">';
  echo '<h3>'.mrseo_mega_menu_icon($group[0]).'<span>'.esc_html($group[1]).'</span></h3>';
  echo '<div class="mrseo-mega-items">';
  foreach($group[2] as $item){
   $active=$item[0]===mrseo_slug();
   echo '<a class="mrseo-mega-item'.($active?' is-current':'').'" href="'.esc_url(mrseo_url($item[0],'en')).'"'.($active?' aria-current="page"':'').'>'.esc_html($item[1]).'</a>';
  }
  echo '</div></section>';
 }
 echo '</div><div class="mrseo-mega-bottom"><div class="mrseo-mega-bottom-copy"><strong>Have a project or a problem to solve?</strong><p>New website, online shop, SEO, PPC or a bespoke system — start with what your business needs.</p></div>';
 echo '<a class="mrseo-mega-contact" href="'.esc_url(mrseo_url('contact','en')).'">Discuss your brief <span aria-hidden="true">↗</span></a></div></div>';
}
