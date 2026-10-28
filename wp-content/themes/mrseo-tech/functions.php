<?php
if (!defined('ABSPATH')) exit;
require_once get_template_directory() . '/inc/site-pages.php';
require_once get_template_directory() . '/inc/i18n-routing.php';
function mrseo_setup() {
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
 add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
 register_nav_menus(array('primary'=>__('Primary Navigation','mrseo-tech')));
}
add_action('after_setup_theme','mrseo_setup');
function mrseo_assets(){
 wp_enqueue_style('mrseo-style',get_stylesheet_uri(),array(),'1.3.1');
 wp_enqueue_script('mrseo-ui',get_template_directory_uri().'/assets/site.js',array(),'1.3.1',true);
}
add_action('wp_enqueue_scripts','mrseo_assets');
function mrseo_meta_description(){
 $slug=mrseo_slug();
 if(!in_array($slug,array('','seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','about','contact'),true))return;
 if($slug===''){
  $desc=mrseo_t('MrSeo.tech — SEO, реклама Google та аналітика для розвитку бізнесу. Зрозумілі рішення й прозорий підхід.','MrSeo.tech — SEO, реклама Google и аналитика для развития бизнеса. Понятные решения и прозрачный подход.','MrSeo.tech — SEO, Google Ads and actionable marketing analytics for growing businesses.');
 }else{
  $d=mrseo_translation($slug);$desc=$d[2];
 }
 echo '<meta name="description" content="'.esc_attr($desc).'">'."\n";
}
add_action('wp_head','mrseo_meta_description',1);

/** Simple contact form handler; mail delivery depends on server configuration. */
function mrseo_handle_contact() {
 $post_lang=sanitize_key(wp_unslash($_POST['mrseo_lang']??'uk'));
 $redirect=mrseo_url('contact',in_array($post_lang,array('uk','ru','en'),true)?$post_lang:'uk');
 if ($_SERVER['REQUEST_METHOD']!=='POST' || !isset($_POST['mrseo_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mrseo_nonce'])),'mrseo_contact_submit')) {wp_safe_redirect(add_query_arg('message_status','invalid',$redirect));exit;}
 if(!empty($_POST['contact_company_extra'])) {wp_safe_redirect($redirect);exit;}
 $name=mb_substr(sanitize_text_field(wp_unslash($_POST['contact_name']??'')),0,90);
 $email=sanitize_email(wp_unslash($_POST['contact_email']??''));
 $site=esc_url_raw(wp_unslash($_POST['contact_site']??''));
 $message=mb_substr(sanitize_textarea_field(wp_unslash($_POST['contact_message']??'')),0,3000);
 if(!$name || !is_email($email) || mb_strlen($message)<10){wp_safe_redirect(add_query_arg('message_status','invalid',$redirect));exit;}
 $ip=isset($_SERVER['REMOTE_ADDR'])?sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])):'';
 $rate_key='mrseo_form_'.md5($ip);
 if(get_transient($rate_key)){wp_safe_redirect(add_query_arg('message_status','error',$redirect));exit;}
 set_transient($rate_key,1,90);
 $body="Имя: $name\nEmail: $email\nСайт: $site\n\n$message";
 $ok=wp_mail(get_option('admin_email'),'Заявка MrSeo.tech',$body,array('Reply-To: '.$email));
 wp_safe_redirect(add_query_arg('message_status',$ok?'sent':'error',$redirect));exit;
}
add_action('admin_post_nopriv_mrseo_contact','mrseo_handle_contact');
add_action('admin_post_mrseo_contact','mrseo_handle_contact');

/**
 * Staging protection. Remove only during an explicitly approved launch.
 * This applies regardless of the WordPress "discourage search engines" setting.
 */
add_filter('wp_robots', function($robots) {
    $robots['noindex'] = true;
    $robots['nofollow'] = true;
    unset($robots['index'], $robots['follow']);
    return $robots;
}, 99);
add_action('send_headers', function() {
    if (!is_admin()) header('X-Robots-Tag: noindex, nofollow', true);
});
