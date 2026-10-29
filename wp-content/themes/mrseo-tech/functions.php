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
 wp_enqueue_style('mrseo-style',get_stylesheet_uri(),array(),'3.7.0');
 wp_enqueue_script('mrseo-ui',get_template_directory_uri().'/assets/site.js',array(),'3.7.0',true);
}
add_action('wp_enqueue_scripts','mrseo_assets');
function mrseo_meta_description(){
 if(!mrseo_valid_route())return;
 $slug=mrseo_slug();
 if(!in_array($slug,array('','seo','seo-audit','ecommerce-seo','service-websites','horoshop','google-ads','performance-max','analytics','about','contact','portfolio'),true))return;
 if($slug==='seo'){$desc=mrseo_t('SEO-просування сайтів у Google: усуваємо проблеми індексації, структури й пошукової видимості. Аудит, семантика, комерційні сторінки та аналітика.','SEO-продвижение сайтов в Google: исправляем проблемы индексации, структуры и видимости. Аудит, семантика, посадочные страницы и аналитика.','SEO services to improve technical accessibility, search intent coverage, website visibility and meaningful conversions.');}elseif($slug==='horoshop'){$desc=mrseo_t('Створення, налаштування та SEO-просування магазинів на Хорошоп: категорії, фільтри, товари, індексація і Google Ads.','Создание, настройка и SEO-продвижение магазинов на Хорошоп: категории, фильтры, товары и Google Ads.','Horoshop store development and SEO: catalog architecture, indexing, product data and Google Ads.');}elseif($slug==='service-websites'){$desc=mrseo_t('Створення і SEO-просування сайтів послуг для отримання заявок: структура, комерційні сторінки, локальний пошук та аналітика.','Создание и SEO-продвижение сайтов услуг для заявок: структура, коммерческие страницы, локальный поиск и аналитика.','Service website development and SEO for lead generation, service landing pages and local search.');}elseif($slug==='portfolio'){ $desc=mrseo_t('Портфоліо MrSeo.tech — 148 проєктів у різних нішах.','Портфолио MrSeo.tech — 148 проектов в разных нишах.','MrSeo.tech portfolio — 148 projects across different industries.'); }elseif($slug===''){
  $desc=mrseo_t('MrSeo.tech — SEO, реклама Google та аналітика для розвитку бізнесу. Зрозумілі рішення й прозорий підхід.','MrSeo.tech — SEO, реклама Google и аналитика для развития бизнеса. Понятные решения и прозрачный подход.','MrSeo.tech — SEO, Google Ads and actionable marketing analytics for growing businesses.');
 }else{
  $d=mrseo_translation($slug);$desc=$d[2];
  if(in_array($slug,array('seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','about'),true)){
   require_once get_template_directory().'/inc/service-editorial.php';
   $editorial=mrseo_service_editorial();
   $lang=mrseo_locale();
   if(isset($editorial[$slug][$lang][1]))$desc=wp_trim_words($editorial[$slug][$lang][1],27,'…');
  }
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
