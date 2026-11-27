<?php
/** Archived UA services: exact paths only; other locales and source copy preserved. */
if(!defined('ABSPATH'))exit;
function mrseo_ua_retired_services(){
 static $map=null;
 if($map===null)$map=json_decode(file_get_contents(__DIR__.'/ua-retired-services.json'),true,512,JSON_THROW_ON_ERROR);
 return $map;
}
function mrseo_ua_active_service_slug($slug){return mrseo_ua_retired_services()[$slug]??$slug;}
function mrseo_ua_retired_request(){
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 return mrseo_ua_retired_services()[$path]??null;
}
// Retire only the exact Ukrainian prototype URLs. Shared homepage templates
// remain available to all actual language homepages.
function mrseo_ua_retired_preview(){
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 return in_array($path,array('orbit-lab','orbit-light','premium-tech-preview'),true);
}
add_action('template_redirect',function(){
 if(!mrseo_ua_retired_preview())return;
 status_header(410);nocache_headers();
 header('Content-Type: text/plain; charset=UTF-8');
 header('X-Robots-Tag: noindex, nofollow',true);
 if(($_SERVER['REQUEST_METHOD']??'GET')!=='HEAD')echo 'Цю тестову сторінку видалено.';
 exit;
},-101);
add_action('template_redirect',function(){
 $target=mrseo_ua_retired_request();if(!$target)return;
 $url=home_url('/'.$target.'/');
 if(!empty($_SERVER['QUERY_STRING']))$url.='?'.$_SERVER['QUERY_STRING'];
 wp_safe_redirect($url,301,'MrSeo retired Ukrainian service');exit;
},-100);
