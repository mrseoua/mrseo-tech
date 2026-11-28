<?php
/** Local CI only. Never deploy this fixture as a theme or plugin. */
if(!defined('ABSPATH'))exit;
if(wp_parse_url(home_url(),PHP_URL_HOST)!=='127.0.0.1')return;
add_filter('pre_wp_mail',static function($return,$mail){
 $path='/tmp/mrseo-ci-mail.json';
 $records=is_file($path)?json_decode(file_get_contents($path),true):array();
 $records[]=$mail;
 file_put_contents($path,wp_json_encode($records),LOCK_EX);
 return !str_contains($mail['message'],'CI simulate mail failure'); // no external SMTP request
},10,2);

// Test-only inspector: the isolated localhost DB has synthetic data only.
add_action('admin_post_nopriv_mrseo_ci_enquiry_inspect',static function(){
 if(($_SERVER['REMOTE_ADDR']??'')!=='127.0.0.1')wp_die('Local only',403);
 $records=get_posts(array('post_type'=>'mrseo_enquiry','post_status'=>'private','numberposts'=>-1,'orderby'=>'ID','order'=>'ASC'));
 $data=array_map(static fn($p)=>array('id'=>$p->ID,'status'=>$p->post_status,'body'=>$p->post_content,'mail'=>get_post_meta($p->ID,'_mrseo_mail_state',true)),$records);
 if(isset($_POST['reset_rate']))delete_transient('mrseo_form_'.md5('127.0.0.1'));
 wp_send_json($data);
});

// Isolated test mode only; simulate Siteverify without network or production credentials.
if(($_SERVER['HTTP_X_MRSEO_CI_TURNSTILE']??'')==='mock'){
 define('MRSEO_TURNSTILE_ENABLED',true);
 define('MRSEO_TURNSTILE_SECRET_KEY','ci-only-not-a-production-secret');
 add_filter('pre_http_request',static function($pre,$args,$url){
  if($url!=='https://challenges.cloudflare.com/turnstile/v0/siteverify')return $pre;
  $token=$args['body']['response']??'';
  if($token==='ci-outage')return new WP_Error('ci_outage','Simulated network failure');
  $valid=in_array($token,array('ci-valid','ci-wrong-host','ci-wrong-action'),true)&&($args['body']['secret']??'')==='ci-only-not-a-production-secret';
  return array('headers'=>array(),'body'=>wp_json_encode(array('success'=>$valid,
   'hostname'=>$token==='ci-wrong-host'?'wrong.example':'mrseo.tech',
   'action'=>$token==='ci-wrong-action'?'other':'contact')),
   'response'=>array('code'=>200,'message'=>'OK'),'cookies'=>array());
 },10,3);
}
