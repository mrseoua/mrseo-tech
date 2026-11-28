<?php
/** Additional real Russian counterparts. UA and other locales remain unchanged. */
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/ru-dev-premium-routes.php';
function mrseo_ru_parity_new_slugs(){return array_merge(array_keys(mrseo_ru_dev_pages()),array('pricing'));}
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
 if(mrseo_ru_dev_route()||mrseo_ru_price_route()){
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
