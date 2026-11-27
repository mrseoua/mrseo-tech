<?php
/** Local CI only. Never deploy this fixture as a theme or plugin. */
if(!defined('ABSPATH'))exit;
if(wp_parse_url(home_url(),PHP_URL_HOST)!=='127.0.0.1')return;
add_filter('pre_wp_mail',static function($return,$mail){
 $path='/tmp/mrseo-ci-mail.json';
 $records=is_file($path)?json_decode(file_get_contents($path),true):array();
 $records[]=$mail;
 file_put_contents($path,wp_json_encode($records),LOCK_EX);
 return true; // simulate successful handoff; no external SMTP request
},10,2);
