<?php
if(!defined('ABSPATH'))exit;
/** Shared final-market engine. Separate, reviewed locale data; only exact service URLs. */
function mrseo_final_market_codes(){return array('fi'=>'fi-FI','hu'=>'hu-HU','sk'=>'sk-SK','el'=>'el-GR','bg'=>'bg-BG','hr'=>'hr-HR');}
function mrseo_final_market_data($locale=null){
 static $cache=array();
 $locale=$locale??mrseo_locale();
 if(!array_key_exists($locale,mrseo_final_market_codes()))return array();
 if(!isset($cache[$locale])){
  $raw=file_get_contents(__DIR__.'/../locales/'.$locale.'-services.json');
  $cache[$locale]=json_decode($raw,true,512,JSON_THROW_ON_ERROR);
 }
 return $cache[$locale];
}
function mrseo_final_market_slugs($locale=null){return array_keys(mrseo_final_market_data($locale)['pages']??array());}
function mrseo_final_market_page($slug=null,$locale=null){return mrseo_final_market_data($locale)['pages'][$slug??mrseo_slug()]??null;}
function mrseo_final_market_route(){
 $locale=mrseo_locale();$slug=mrseo_slug();
 if(!in_array($slug,mrseo_final_market_slugs($locale),true))return false;
 return trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/')===$locale.'/'.$slug;
}
function mrseo_final_market_routes(){
 return array(
 'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
 'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
 'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
 'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
 'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications'));
}
function mrseo_final_market_alternates($slug){$out=array();foreach(mrseo_final_market_codes() as $locale=>$code)if(in_array($slug,mrseo_final_market_slugs($locale),true))$out[$locale]=$slug;return $out;}
add_action('init',function(){
 foreach(mrseo_final_market_codes() as $locale=>$code){
  $slugs=mrseo_final_market_slugs($locale);if(!$slugs)continue;
  $part=implode('|',array_map('preg_quote',$slugs));
  add_rewrite_rule('^'.$locale.'/('.$part.')/?$','index.php?mrseo_lang='.$locale.'&mrseo_service=$matches[1]','top');
 }
},11);
add_filter('pre_handle_404',function($pre){return mrseo_final_market_route()?true:$pre;},135);
add_filter('redirect_canonical',function($canonical){return mrseo_final_market_route()?false:$canonical;},135);
add_filter('template_include',function($template){return mrseo_final_market_route()?get_template_directory().'/final-market-landing.php':$template;},140);
add_filter('pre_get_document_title',function($title){$p=mrseo_final_market_route()?mrseo_final_market_page():null;return $p?$p['title']:$title;},140);
add_action('wp_head',function(){if(!mrseo_final_market_route())return;$p=mrseo_final_market_page();echo '<meta name="description" content="'.esc_attr($p['description']).'">'. "\n";},3);
add_action('init',function(){if(get_option('mrseo_final_market_rules_v1')!=='ready'){flush_rewrite_rules(false);update_option('mrseo_final_market_rules_v1','ready',false);}},35);
function mrseo_final_market_render_scene($slug,$page,$labels){
 $symbols=array('local-seo'=>'⌖','service-business-seo'=>'⌕','international-seo'=>'◎','google-shopping'=>'▦','local-google-ads'=>'◉','google-ads-audit'=>'▤','merchant-center-help'=>'◈','woocommerce-shopify-stores'=>'▣','store-conversion'=>'◍','catalog-automation'=>'⇄','store-migration'=>'⇢','service-websites'=>'▥','landing-pages'=>'↗','corporate-websites'=>'▧','website-redesign'=>'⛨','wordpress-care'=>'{ }','api-integrations'=>'◈','website-speed-security'=>'◇','web-applications'=>'▣');
 if(!isset($symbols[$slug]))return false;
 echo '<div class="pl-art pl-art--'.esc_attr($slug).'" aria-hidden="true"><div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div><div class="pl-art-symbol">'.esc_html($symbols[$slug]).'</div><div class="pl-art-chain">';
 foreach($page['visual'] as $i=>$label){echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';}
 echo '</div><span class="pl-art-status"><i></i> '.esc_html($labels['sceneStatus']).'</span></div>';return true;
}
