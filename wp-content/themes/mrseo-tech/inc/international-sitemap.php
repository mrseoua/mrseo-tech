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
 // Remove only incidental whitespace from an existing writable PHP output buffer.
 // Never hide warnings or arbitrary output; the strict XML audit must expose those.
 $prefix=ob_get_contents();
 if(is_string($prefix)&&$prefix!==''&&strspn($prefix," \t\r\n")===strlen($prefix)){
  $buffer=ob_get_status();
  if(($buffer['flags']??0)&PHP_OUTPUT_HANDLER_CLEANABLE)ob_clean();
 }
 status_header(200);nocache_headers();header('Content-Type: application/xml; charset=UTF-8');
 $esc=function($s){return htmlspecialchars($s,ENT_QUOTES|ENT_XML1,'UTF-8');};
 // The XML declaration is optional for UTF-8. A valid document without it also
 // tolerates XML whitespace already emitted by host/bootstrap code before this hook.
 // Encoding is explicit in Content-Type; preserve the exact sitemap inventory.
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
