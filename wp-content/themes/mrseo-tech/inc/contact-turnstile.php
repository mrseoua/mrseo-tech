<?php
/** Opt-in Ukrainian contact pilot. Never store the production secret in the theme. */
if(!defined('ABSPATH'))exit;
function mrseo_turnstile_active($lang='uk'){
 return $lang==='uk'&&defined('MRSEO_TURNSTILE_ENABLED')&&MRSEO_TURNSTILE_ENABLED===true;
}
function mrseo_turnstile_verify($lang){
 if(!mrseo_turnstile_active($lang))return true;
 if(!defined('MRSEO_TURNSTILE_SECRET_KEY')||!is_string(MRSEO_TURNSTILE_SECRET_KEY)||trim(MRSEO_TURNSTILE_SECRET_KEY)==='')return false;
 $raw=$_POST['cf-turnstile-response']??'';
 if(!is_string($raw))return false;
 $token=wp_unslash($raw);
 if($token===''||strlen($token)>2048)return false;
 $response=wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify',array(
  'timeout'=>8,'redirection'=>0,'sslverify'=>true,
  'body'=>array('secret'=>MRSEO_TURNSTILE_SECRET_KEY,'response'=>$token)
 ));
 if(is_wp_error($response)||wp_remote_retrieve_response_code($response)!==200)return false;
 $result=json_decode(wp_remote_retrieve_body($response),true);
 return is_array($result)&&($result['success']??false)===true
  &&($result['hostname']??'')==='mrseo.tech'&&($result['action']??'')==='contact';
}
function mrseo_render_ua_turnstile(){
 if(!mrseo_turnstile_active())return;
 wp_enqueue_script('mrseo-turnstile','https://challenges.cloudflare.com/turnstile/v0/api.js',array(),null,array('in_footer'=>true,'strategy'=>'defer'));
 echo '<div class="cf-turnstile" data-sitekey="0x4AAAAAAGW4oUSM5z0gmwex" data-action="contact" data-size="compact" data-appearance="interaction-only" data-refresh-expired="auto"></div>';
 echo '<p class="mrseo-privacy-notice">Захист від автоматичного спаму: Cloudflare Turnstile. <a href="https://www.cloudflare.com/privacypolicy/" rel="noopener noreferrer" target="_blank">Політика приватності Cloudflare</a>.</p>';
}
