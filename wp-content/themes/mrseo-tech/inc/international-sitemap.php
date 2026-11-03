<?php
if(!defined('ABSPATH'))exit;
/**
 * Consistent country/language sitemap of completed virtual pages.
 * Note: staging noindex remains active; do not submit this sitemap until launch.
 */
function mrseo_localized_sitemap_paths(){
    // Same exact URLs and reciprocal alternatives as the HTML head.
    return mrseo_i18n_inventory();
}
add_action('init',function(){
 add_rewrite_rule('^mrseo-locales-sitemap\\.xml$','index.php?mrseo_locales_sitemap=1','top');
},10);
add_filter('query_vars',function($vars){$vars[]='mrseo_locales_sitemap';return $vars;});
add_filter('pre_handle_404',function($pre){
 if(get_query_var('mrseo_locales_sitemap'))return true;
 return $pre;
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
  if (!empty($entry['default'])) {
   echo '  <xhtml:link rel="alternate" hreflang="x-default" href="'.$esc($entry['default']).'" />'."\n";
  }
  echo ' </url>'."\n";
 }
 echo '</urlset>';
 exit;
},-5);
