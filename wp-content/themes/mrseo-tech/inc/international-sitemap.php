<?php
if(!defined('ABSPATH'))exit;
/**
 * Consistent country/language sitemap of completed virtual pages.
 * Note: staging noindex remains active; do not submit this sitemap until launch.
 */
function mrseo_localized_sitemap_paths(){
 $common=mrseo_int_pages();
 $languages=array('uk','ru','en','pl','de');
 $entries=array();
 foreach($common as $slug){
  $alternates=array();
  foreach($languages as $language){
   $hreflang=mrseo_int_locales()[$language]??$language;
   $alternates[$hreflang]=mrseo_url($slug,$language);
  }
  foreach($languages as $language){
   $entries[]=array('loc'=>mrseo_url($slug,$language),'alternates'=>$alternates,'default'=>mrseo_url($slug,'en'));
  }
 }
 foreach(array('service-websites','performance-max') as $slug){
  $alternates=array();
  foreach(array('uk','ru','en') as $language)$alternates[$language]=mrseo_url($slug,$language);
  foreach(array('uk','ru','en') as $language)$entries[]=array('loc'=>mrseo_url($slug,$language),'alternates'=>$alternates,'default'=>mrseo_url($slug,'en'));
 }
 $shopAlternates=array('uk'=>mrseo_url('horoshop','uk'),'ru'=>mrseo_url('horoshop','ru'));
 foreach(array('uk','ru') as $language)$entries[]=array('loc'=>mrseo_url('horoshop',$language),'alternates'=>$shopAlternates,'default'=>mrseo_url('horoshop','uk'));
 return $entries;
}
add_action('init',function(){
 add_rewrite_rule('^mrseo-locales-sitemap\\.xml$','index.php?mrseo_locales_sitemap=1','top');
},10);
add_filter('query_vars',function($vars){$vars[]='mrseo_locales_sitemap';return $vars;});
add_filter('pre_handle_404',function($pre){
 return get_query_var('mrseo_locales_sitemap')?$pre===false?true:$pre:$pre;
},1);
add_action('template_redirect',function(){
 if(!get_query_var('mrseo_locales_sitemap'))return;
 status_header(200);nocache_headers();header('Content-Type: application/xml; charset=UTF-8');
 $esc=function($s){return htmlspecialchars($s,ENT_QUOTES|ENT_XML1,'UTF-8');};
 echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
 echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">'."\n";
 foreach(mrseo_localized_sitemap_paths() as $entry){
  echo ' <url><loc>'.$esc($entry['loc']).'</loc>'."\n";
  foreach($entry['alternates'] as $locale=>$url){
   echo '  <xhtml:link rel="alternate" hreflang="'.$esc($locale).'" href="'.$esc($url).'" />'."\n";
  }
  echo '  <xhtml:link rel="alternate" hreflang="x-default" href="'.$esc($entry['default']).'" />'."\n";
  echo ' </url>'."\n";
 }
 echo '</urlset>';
 exit;
},-5);
