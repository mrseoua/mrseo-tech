<?php
/** Additional real Russian counterparts. UA and other locales remain unchanged. */
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/ru-dev-premium-routes.php';
require_once __DIR__.'/ru-parity-content.php';
function mrseo_ru_parity_new_slugs(){return array_merge(array_keys(mrseo_ru_dev_pages()),array('pricing'),array_keys(mrseo_ru_expansion_data()),array_map(static fn($k)=>'horoshop/'.$k,array_keys(mrseo_ru_hs_pages())));}
function mrseo_ru_price_route(){return mrseo_locale()==='ru'&&trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/')==='ru/pricing';}
add_action('init',static function(){add_rewrite_rule('^ru/pricing/?$','index.php?mrseo_lang=ru&mrseo_service=pricing','top');},13);
add_action('init',static function(){if(get_option('mrseo_ru_parity_v1')!=='ready'){flush_rewrite_rules(false);update_option('mrseo_ru_parity_v1','ready',false);}},49);
add_filter('pre_handle_404',static fn($pre)=>mrseo_ru_price_route()?true:$pre,130);
add_filter('redirect_canonical',static fn($url)=>mrseo_ru_price_route()?false:$url,130);
add_filter('template_include',static fn($template)=>mrseo_ru_price_route()?get_template_directory().'/pricing-ru.php':$template,130);
add_filter('pre_get_document_title',static fn($title)=>mrseo_ru_price_route()?'Цены на SEO, Google Ads и создание сайтов | MrSeo.tech':$title,1000);
add_action('wp_head',static function(){if(mrseo_ru_price_route())echo '<meta name="description" content="Стартовые цены MrSeo.tech: SEO от 6 000 грн/мес., Google Ads от 5 000 грн/мес., создание сайтов от 8 000 грн. Условия и индивидуальная оценка.">'."\n";},5);
add_action('wp_enqueue_scripts',static function(){
 if(mrseo_locale()!=='ru'||mrseo_slug()==='')return;
 $uri=get_template_directory_uri();
 if(mrseo_ru_price_route())wp_enqueue_style('mrseo-ru-pricing',$uri.'/assets/ua-pricing.css',array('mrseo-style'),'1.0.0');
 if(mrseo_ru_dev_route()||mrseo_ru_price_route()||mrseo_ru_expansion_route()||mrseo_ru_hs_key()){
  wp_enqueue_style('mrseo-ru-mobile-compact',$uri.'/assets/ru-mobile-compact.css',array('mrseo-style'),'1.0.0','(max-width: 680px)');
  wp_enqueue_script('mrseo-ru-mobile-compact',$uri.'/assets/ru-mobile-compact.js',array(),'1.0.0',true);
 }
},210);
function mrseo_ru_parity_approach($slug,$heading,$body){?>
 <section class="ua-v2-approach" data-ua-stage="approach" aria-labelledby="ru-approach-title"><div class="ua-v2-wrap ua-v2-approach-grid"><div><span class="ua-v2-label">03 / НАШ ПОДХОД</span><h2 id="ru-approach-title"><?php echo esc_html($heading);?></h2></div><p><?php echo esc_html($body);?></p></div></section>
<?php }
function mrseo_ru_parity_terms($detail=''){?>
 <section class="ua-v2-terms" data-ua-stage="terms" aria-labelledby="ru-terms-title"><div class="ua-v2-wrap ua-v2-terms-grid"><div><span class="ua-v2-label">06 / УСЛОВИЯ СОТРУДНИЧЕСТВА</span><h2 id="ru-terms-title">Понятные условия. <em>Без сюрпризов.</em></h2></div><div><p>До начала согласуем объём работ, стоимость, сроки и формат оплаты. Дополнительные работы — только по договорённости.</p><?php if($detail!==''):?><p><?php echo esc_html($detail);?></p><?php endif;?></div></div></section>
<?php }

function mrseo_ru_hs_url($key){return mrseo_i18n_exact_url('ru',isset(mrseo_ru_hs_pages()[$key])?'horoshop/'.$key:'horoshop');}
function mrseo_ru_parity_label($slug){
 $labels=array('seo'=>'SEO-продвижение','local-seo'=>'Локальное SEO','ecommerce-seo'=>'SEO интернет-магазинов','service-business-seo'=>'SEO сайтов услуг','international-seo'=>'Международное SEO','seo-audit'=>'SEO-аудит','google-ads'=>'Google Ads','performance-max'=>'Performance Max','google-shopping'=>'Google Shopping','local-google-ads'=>'Локальная реклама','google-search-ads'=>'Поисковая реклама','horoshop'=>'Хорошоп','service-websites'=>'Создание сайтов','wordpress-development'=>'Сайты на WordPress','local-business-websites'=>'Сайты для малого бизнеса','landing-pages'=>'Лендинги','corporate-websites'=>'Корпоративные сайты','web-development'=>'Веб-разработка','business-automation'=>'Автоматизация бизнеса','crm-development'=>'CRM для бизнеса','web-applications'=>'Веб-приложения','business-dashboards'=>'Дашборды и отчётность','client-portals'=>'Личные кабинеты клиентов','api-integrations'=>'Интеграция через API','data-parsing'=>'Парсинг и синхронизация данных','payment-integration'=>'Интеграция платёжных систем','ai-agents'=>'AI-агенты для бизнеса','chatbot-development'=>'Разработка чат-ботов','mobile-app-development'=>'Мобильные приложения iOS и Android','ecommerce-mobile-apps'=>'Приложение для интернет-магазина','corporate-mobile-apps'=>'Приложение для команды','pwa-development'=>'PWA-приложения','horoshop/seo'=>'SEO-продвижение сайтов на Хорошоп','horoshop/audit'=>'SEO-аудит сайтов на Хорошоп','horoshop/ads'=>'Google Ads для Хорошоп','horoshop/feeds'=>'Товарные фиды','pricing'=>'Стоимость');
 return $labels[$slug]??'Услуги';
}
add_action('init',static function(){
 $slugs=array_map(static fn($x)=>preg_quote($x,'~'),array_keys(mrseo_ru_expansion_data()));
 add_rewrite_rule('^ru/('.implode('|',$slugs).')/?$','index.php?mrseo_lang=ru&mrseo_service=$matches[1]','top');
 add_rewrite_rule('^ru/horoshop/(seo|audit|ads|feeds)/?$','index.php?mrseo_lang=ru&mrseo_service=horoshop','top');
},16);
add_action('init',static function(){if(get_option('mrseo_ru_parity_v2')!=='ready'){flush_rewrite_rules(false);update_option('mrseo_ru_parity_v2','ready',false);}},50);
add_filter('pre_handle_404',static fn($pre)=>mrseo_ru_expansion_route()||mrseo_ru_hs_key()?true:$pre,135);
add_filter('redirect_canonical',static fn($url)=>mrseo_ru_expansion_route()||mrseo_ru_hs_key()?false:$url,135);
add_filter('template_include',static function($template){
 if(mrseo_ru_hs_key())return get_template_directory().'/ru-horoshop-service-premium.php';
 if(mrseo_ru_expansion_route())return get_template_directory().'/ru-expansion-premium.php';
 return $template;
},195);
add_filter('pre_get_document_title',static function($title){
 if($k=mrseo_ru_hs_key())return mrseo_ru_hs_pages()[$k][0].' | MrSeo.tech';
 if(mrseo_ru_expansion_route())return mrseo_ru_expansion_data()[mrseo_slug()]['title'].' | MrSeo.tech';
 return $title;
},1100);
add_action('wp_head',static function(){
 $desc=null;if($k=mrseo_ru_hs_key())$desc=mrseo_ru_hs_pages()[$k][2];
 elseif(mrseo_ru_expansion_route())$desc=mrseo_ru_expansion_data()[mrseo_slug()]['lead'];
 if($desc!==null)echo '<meta name="description" content="'.esc_attr($desc).'">'."\n";
},5);
add_action('wp_enqueue_scripts',static function(){
 $uri=get_template_directory_uri();
 if(mrseo_ru_expansion_route()){
  wp_enqueue_style('mrseo-ru-puc-base',$uri.'/assets/premium-ua-interiors.css',array('mrseo-style'),'1.1.1');
  wp_enqueue_style('mrseo-ru-puc',$uri.'/assets/premium-ua-commercial.css',array('mrseo-ru-puc-base'),'1.0.0');
  wp_enqueue_script('mrseo-ru-puc',$uri.'/assets/premium-ua-commercial.js',array(),'1.1.0',true);
 }
 if(mrseo_ru_hs_key()){
  wp_enqueue_style('mrseo-ru-hs',$uri.'/assets/horoshop-premium-pages.css',array('mrseo-style'),'1.2.0');
  wp_enqueue_style('mrseo-ru-hs-trust',$uri.'/assets/horoshop-partner-trust.css',array('mrseo-ru-hs'),'1.0.0');
  wp_enqueue_script('mrseo-ru-hs-motion',$uri.'/assets/horoshop-premium-motion.js',array(),'1.0.0',true);
 }
},150);
