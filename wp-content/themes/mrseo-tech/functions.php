<?php
if (!defined('ABSPATH')) exit;
require_once get_template_directory() . '/inc/site-pages.php';
require_once get_template_directory() . '/inc/i18n-routing.php';
require_once get_template_directory() . '/inc/ua-virtual-routes.php';
require_once get_template_directory() . '/inc/language-dropdown.php';
require_once get_template_directory() . '/inc/contact-channels.php';
require_once get_template_directory() . '/inc/contact-ui.php';
require_once get_template_directory() . '/inc/mega-menu.php';
require_once get_template_directory() . '/inc/new-service-routes.php';
require_once get_template_directory() . '/inc/pl-service-routing.php';
require_once get_template_directory() . '/inc/uk-market-routing.php';
require_once get_template_directory() . '/inc/international-seo.php';
require_once get_template_directory() . '/inc/privacy-page.php';
require_once get_template_directory() . '/inc/customer-journeys.php';
require_once get_template_directory() . '/inc/motion-scenes.php';
function mrseo_setup() {
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
 add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
 register_nav_menus(array('primary'=>__('Primary Navigation','mrseo-tech')));
}
add_action('after_setup_theme','mrseo_setup');
function mrseo_assets(){
 wp_enqueue_style('mrseo-style',get_stylesheet_uri(),array(),'3.7.6');
 if(function_exists('mrseo_uk_market_route') && mrseo_uk_market_route()){
  wp_enqueue_style('mrseo-uk-market-base',get_template_directory_uri().'/assets/pl-services.css',array('mrseo-international'),'1.0.0');
  wp_enqueue_style('mrseo-uk-market',get_template_directory_uri().'/assets/uk-market.css',array('mrseo-uk-market-base'),'1.1.0');
 }
 if(function_exists('mrseo_pl_service_route') && mrseo_pl_service_route()){
  wp_enqueue_style('mrseo-pl-services',get_template_directory_uri().'/assets/pl-services.css',array('mrseo-international'),'1.0.0');
 }
 if(function_exists('mrseo_new_service_route') && mrseo_new_service_route()){
  wp_enqueue_style('mrseo-ukseo-new-base',get_template_directory_uri().'/assets/seo-uk-pilot.css',array('mrseo-style'),'1.0.2');
  wp_enqueue_style('mrseo-new-services',get_template_directory_uri().'/assets/new-services.css',array('mrseo-ukseo-new-base'),'1.1.0');
 }
 $motion_slugs=array('seo','seo-audit','ecommerce-seo','google-ads','analytics','web-development','service-websites','performance-max','about','portfolio','contact');
 if(mrseo_locale()==='ru')$motion_slugs[]='horoshop';
 if(in_array(mrseo_slug(),$motion_slugs,true)){
  wp_enqueue_style('mrseo-motion-scenes',get_template_directory_uri().'/assets/motion-scenes.css',array('mrseo-style'),'1.0.0');
  wp_enqueue_script('mrseo-motion-scenes',get_template_directory_uri().'/assets/motion-scenes.js',array(),'1.0.0',true);
 }
 // Ukrainian premium service visual system. Horoshop uses its own interactive hero.
 if(in_array(mrseo_locale(),array('uk','ru'),true) && in_array(mrseo_slug(),array('seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','service-websites','horoshop'),true)){
  $ua_base_deps=mrseo_slug()==='horoshop'?array('mrseo-style'):array('mrseo-motion-scenes');
  wp_enqueue_style('mrseo-ukseo-pilot',get_template_directory_uri().'/assets/seo-uk-pilot.css',$ua_base_deps,'1.0.2');
 }
 if(in_array(mrseo_locale(),array('uk','ru'),true) && mrseo_slug()==='seo-audit'){
  wp_enqueue_style('mrseo-ukaudit',get_template_directory_uri().'/assets/seo-audit-uk.css',array('mrseo-ukseo-pilot'),'1.0.0');
 }
 if(in_array(mrseo_locale(),array('uk','ru'),true) && mrseo_slug()==='ecommerce-seo'){
  wp_enqueue_style('mrseo-ukcommerce',get_template_directory_uri().'/assets/ecommerce-uk.css',array('mrseo-ukseo-pilot'),'1.0.0');
 }
 if(in_array(mrseo_locale(),array('uk','ru'),true) && mrseo_slug()==='google-ads'){
  wp_enqueue_style('mrseo-ukads',get_template_directory_uri().'/assets/google-ads-uk.css',array('mrseo-ukseo-pilot'),'1.0.0');
 }
 if(in_array(mrseo_locale(),array('pl','de'),true)||mrseo_slug()==='web-development'||(function_exists('mrseo_uk_market_route') && mrseo_uk_market_route())){
  wp_enqueue_style('mrseo-international',get_template_directory_uri().'/assets/international.css',array('mrseo-style'),'1.3.0');
 }
 if(mrseo_slug()==='web-development'){
  wp_enqueue_style('mrseo-development',get_template_directory_uri().'/assets/development.css',array('mrseo-international'),'1.0.0');
 }
 if(in_array(mrseo_slug(),array('seo','seo-audit','google-ads','performance-max','analytics','ecommerce-seo','horoshop','service-websites'),true)){
  wp_enqueue_style('mrseo-customer-journeys',get_template_directory_uri().'/assets/customer-journeys.css',array('mrseo-style'),'1.0.2');
 }
 if(mrseo_slug()==='horoshop' && in_array(mrseo_locale(),array('uk','ru'),true)){
  wp_enqueue_style('mrseo-horoshop-hero',get_template_directory_uri().'/assets/horoshop-hero.css',array('mrseo-style'),'3.1.0');
  wp_enqueue_script('mrseo-horoshop-interactive',get_template_directory_uri().'/assets/horoshop-interactive.js',array(),'3.0.0',true);
 }
 if(mrseo_slug()==='about')wp_enqueue_style('mrseo-about',get_template_directory_uri().'/assets/about-page.css',array('mrseo-style'),'1.0.0');
 // Remaining Ukrainian service pages and existing About/Portfolio/Contact/Development refinements.
 if(in_array(mrseo_locale(),array('uk','ru'),true) && in_array(mrseo_slug(),array('performance-max','analytics','service-websites','horoshop'),true)){
  $ua_extra_deps=mrseo_slug()==='horoshop'?array('mrseo-ukseo-pilot','mrseo-horoshop-hero'):array('mrseo-ukseo-pilot');
  wp_enqueue_style('mrseo-uk-rest',get_template_directory_uri().'/assets/uk-service-rest.css',$ua_extra_deps,'1.0.0');
 }
 if(in_array(mrseo_locale(),array('uk','ru'),true) && in_array(mrseo_slug(),array('about','portfolio','contact','web-development'),true)){
  $ua_polish_deps=mrseo_slug()==='about'?array('mrseo-about'):(mrseo_slug()==='web-development'?array('mrseo-development'):array('mrseo-style'));
  wp_enqueue_style('mrseo-uk-polish',get_template_directory_uri().'/assets/uk-interior-polish.css',$ua_polish_deps,'1.0.0');
 }
 if(mrseo_locale()==='ru' && in_array(mrseo_slug(),array('seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','service-websites','horoshop'),true)){
  wp_enqueue_style('mrseo-ru-premium',get_template_directory_uri().'/assets/ru-premium.css',array('mrseo-ukseo-pilot'),'1.0.1');
 }
 // Shared compact language dropdown, loaded after both header variants' styles.
 wp_enqueue_style('mrseo-language-dropdown',get_template_directory_uri().'/assets/language-dropdown.css',array('mrseo-style'),'1.0.1');
 wp_enqueue_style('mrseo-services-menu-toggle',get_template_directory_uri().'/assets/services-menu-toggle.css',array('mrseo-style'),'2.1.0');
 wp_enqueue_style('mrseo-footer-contact-channels',get_template_directory_uri().'/assets/footer-contact-channels.css',array('mrseo-style'),'1.0.0');
 // After theme/intl footer styles: fix the old .footer .container flex layout and normalize full-width footer.
 wp_enqueue_style('mrseo-footer-layout-premium',get_template_directory_uri().'/assets/footer-layout-premium.css',array('mrseo-footer-contact-channels'),'1.0.0');
 wp_enqueue_script('mrseo-ui',get_template_directory_uri().'/assets/site.js',array(),'3.7.3',true);
 wp_enqueue_style('mrseo-contact-ui',get_template_directory_uri().'/assets/contact-ui.css',array('mrseo-footer-layout-premium'),'1.0.2');
 wp_enqueue_script('mrseo-contact-ui',get_template_directory_uri().'/assets/contact-ui.js',array(),'1.0.0',true);
}
add_action('wp_enqueue_scripts','mrseo_assets');
function mrseo_meta_description(){
 if(mrseo_locale()==='en' && function_exists('mrseo_uk_market_route') && mrseo_uk_market_route())return;
 if(mrseo_locale()==='en' && mrseo_slug()===''){
  echo '<meta name="description" content="'.esc_attr('Website design, online shops, SEO, PPC and bespoke development for UK businesses. Build something new or improve your existing website with MrSeo.tech.').'">'."\n";
  return;
 }
 if(!mrseo_valid_route())return;
 if(mrseo_slug()==='web-development'){
  $dev=mrseo_dev_page();
  if($dev)echo '<meta name="description" content="'.esc_attr($dev['description']).'">'."\n";
  return;
 }
 if(in_array(mrseo_locale(),array('pl','de'),true)){
  $international=mrseo_int_page();
  if($international&&!empty($international['description']))
   echo '<meta name="description" content="'.esc_attr($international['description']).'">'."\n";
  return;
 }
 $slug=mrseo_slug();
 if(!in_array($slug,array('','seo','seo-audit','ecommerce-seo','service-websites','horoshop','google-ads','performance-max','analytics','about','contact','portfolio'),true))return;
 if($slug==='seo'){$desc=mrseo_t('SEO-просування сайтів у Google: усуваємо проблеми індексації, структури й пошукової видимості. Аудит, семантика, комерційні сторінки та аналітика.','SEO-продвижение сайтов в Google: исправляем проблемы индексации, структуры и видимости. Аудит, семантика, посадочные страницы и аналитика.','SEO services to improve technical accessibility, search intent coverage, website visibility and meaningful conversions.');}elseif($slug==='horoshop'){$desc=mrseo_t('SEO для Хорошоп: знаходимо причини слабкої видимості магазину, виправляємо проблеми категорій, фільтрів, індексації та товарного фіда.','SEO для Хорошоп: находим причины слабой видимости магазина, решаем проблемы категорий, фильтров, индексации и товарного фида.','Horoshop SEO: catalog architecture, indexing, product data and Google Ads.');}elseif($slug==='service-websites'){$desc=mrseo_t('Створення і SEO-просування сайтів послуг для отримання заявок: структура, комерційні сторінки, локальний пошук та аналітика.','Создание и SEO-продвижение сайтов услуг для заявок: структура, коммерческие страницы, локальный поиск и аналитика.','Service website development and SEO for lead generation, service landing pages and local search.');}elseif($slug==='about'){ $desc=mrseo_t('MrSeo.tech — невелика команда професіоналів із 10-річним досвідом у SEO, Google Ads, аналітиці та розробці сайтів. Допомагаємо бізнесу вирішувати конкретні задачі.','MrSeo.tech — небольшая команда профессионалов с 10-летним опытом в SEO, Google Ads, аналитике и разработке сайтов. Решаем задачи бизнеса без лишней сложности.','MrSeo.tech — a small team with 10 years of experience in SEO, Google Ads, analytics and website development. Clear solutions to real business challenges.'); }elseif($slug==='portfolio'){ $desc=mrseo_t('Портфоліо MrSeo.tech — 148 проєктів у різних нішах.','Портфолио MrSeo.tech — 148 проектов в разных нишах.','MrSeo.tech portfolio — 148 projects across different industries.'); }elseif($slug===''){
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
 $redirect=mrseo_url('contact',in_array($post_lang,array('uk','ru','en','pl','de'),true)?$post_lang:'uk');
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
 * Permanent noindex for internal design concepts. This remains ACTIVE after
 * global staging noindex is removed during an approved public launch.
 * Never list these concept routes in the international XML sitemap.
 */
function mrseo_private_concept_route() {
    return in_array(mrseo_slug(), array('orbit-lab', 'orbit-light'), true);
}
add_filter('wp_robots', function($robots) {
    if (mrseo_private_concept_route()) {
        $robots['noindex'] = true;
        $robots['nofollow'] = true;
        unset($robots['index'], $robots['follow']);
    }
    return $robots;
}, 90);
add_action('send_headers', function() {
    if (!is_admin() && mrseo_private_concept_route()) {
        header('X-Robots-Tag: noindex, nofollow', true);
    }
}, 90);

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

/**
 * Let automated readers fetch public pages while indexing stays disabled.
 * WordPress only serves this virtual robots.txt when no physical robots.txt exists.
 * Keep the separate wp_robots and X-Robots-Tag noindex safeguards above.
 */
function mrseo_public_robots_during_development($output, $public) {
    return "User-agent: *\nAllow: /\n";
}
add_filter('robots_txt', 'mrseo_public_robots_during_development', 99, 2);
