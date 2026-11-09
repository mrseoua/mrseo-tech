<?php
/**
 * Reversible five-column service navigation pilot.
 * Do not invent routes: missing subservice landing pages are text, not anchors.
 * Default Ukrainian and four primary markets have the approved service taxonomy;
 * other EU markets reuse existing native-language service labels and page copy.
 */
if (!defined('ABSPATH')) exit;

function mrseo_trial_menu_translations() {
 static $all=null;
 if($all!==null)return $all;
 $json=<<<'MRSEO_TRIAL_NAV_JSON'
{
 "uk":{
  "seo":["SEO-просування","Допомагаємо клієнтам знаходити ваш бізнес у Google.","Локальне SEO","SEO інтернет-магазинів","SEO сайтів послуг","Міжнародне SEO","SEO-аудит"],
  "ads":["Google Ads","Реклама, яка приводить потрібних клієнтів.","Пошукова реклама Google","Google Shopping та Performance Max","Google Ads для локального бізнесу","Аудит Google Ads","Google Merchant Center"],
  "commerce":["Інтернет-магазини","Створення, розвиток і автоматизація продажів.","Створення інтернет-магазинів","Інтернет-магазини на Хорошоп","Збільшення конверсії магазину","Автоматизація інтернет-магазину","Модернізація та перенесення магазину"],
  "sites":["Створення сайтів","Сайти, які представляють бізнес і збирають заявки.","Сайти для локального бізнесу","Сайти послуг","Лендінги для реклами","Корпоративні сайти","Редизайн та оновлення сайтів"],
  "dev":["Веброзробка","Вирішуємо технічні проблеми та автоматизуємо процеси.","Підтримка та доопрацювання сайтів","Інтеграції та автоматизація","Оптимізація, безпека та доступність","CRM та особисті кабінети","Вебзастосунки та MVP"],
  "bottom":["Не знайшли свою задачу?","Опишіть проблему або ідею — підкажемо, з чого почати.","Обговорити проєкт"]
 },
 "ru":{
  "seo":["SEO-продвижение","Помогаем клиентам находить ваш бизнес в Google.","Локальное SEO","SEO интернет-магазинов","SEO сайтов услуг","Международное SEO","SEO-аудит"],
  "ads":["Google Ads","Реклама для привлечения нужных клиентов.","Поисковая реклама Google","Google Shopping и Performance Max","Google Ads для локального бизнеса","Аудит Google Ads","Google Merchant Center"],
  "commerce":["Интернет-магазины","Создание, развитие и автоматизация продаж.","Создание интернет-магазинов","Интернет-магазины на Хорошоп","Повышение конверсии магазина","Автоматизация интернет-магазина","Модернизация и перенос магазина"],
  "sites":["Создание сайтов","Сайты для доверия к бизнесу и новых заявок.","Сайты для локального бизнеса","Сайты услуг","Лендинги для рекламы","Корпоративные сайты","Редизайн и обновление сайтов"],
  "dev":["Веб-разработка","Решаем технические проблемы и автоматизируем процессы.","Поддержка и доработка сайтов","Интеграции и автоматизация","Оптимизация, безопасность и доступность","CRM и личные кабинеты","Веб-приложения и MVP"],
  "bottom":["Не нашли нужную услугу?","Расскажите о задаче — подскажем, как её решить.","Обсудить проект"]
 },
 "en":{
  "seo":["SEO services","Help customers find your business in Google.","Local SEO","E-commerce SEO","SEO for service businesses","International SEO","SEO audit"],
  "ads":["Google Ads","Campaigns built around real customer demand.","Google Search Ads","Google Shopping & Performance Max","Local business advertising","Google Ads audit","Google Merchant Center"],
  "commerce":["E-commerce","Build, improve and automate online stores.","E-commerce website development","WooCommerce & Shopify stores","Conversion optimisation","E-commerce automation","Store redesign & migration"],
  "sites":["Website creation","Websites that build trust and generate enquiries.","Local business websites","Service business websites","Landing pages for ads","Corporate websites","Website redesign"],
  "dev":["Web development","Fix technical issues and build useful integrations.","Website maintenance & fixes","Integrations & automation","Speed, security & accessibility","CRM & customer portals","Web apps & MVP development"],
  "bottom":["Have a project or a problem?","Tell us what is not working or what you want to build.","Discuss your project"]
 },
 "pl":{
  "seo":["Pozycjonowanie SEO","Pomagamy klientom znaleźć Twoją firmę w Google.","SEO lokalne","SEO sklepów internetowych","SEO stron usługowych","SEO międzynarodowe","Audyt SEO"],
  "ads":["Google Ads","Reklamy nastawione na realne zapytania klientów.","Reklamy w wyszukiwarce Google","Google Shopping i Performance Max","Google Ads dla lokalnych firm","Audyt Google Ads","Google Merchant Center"],
  "commerce":["Sklepy internetowe","Tworzenie, rozwój i automatyzacja sprzedaży.","Tworzenie sklepów internetowych","Sklepy WooCommerce i Shopify","Optymalizacja konwersji sklepu","Automatyzacja sklepu","Modernizacja i migracja sklepu"],
  "sites":["Tworzenie stron","Strony budujące zaufanie i pozyskujące zapytania.","Strony dla lokalnych firm","Strony firm usługowych","Landing page do reklam","Strony firmowe","Redesign i modernizacja stron"],
  "dev":["Web development","Rozwiązujemy problemy techniczne i automatyzujemy pracę.","Opieka i rozbudowa stron","Integracje i automatyzacja","Szybkość, bezpieczeństwo i dostępność","CRM i panele klientów","Aplikacje webowe i MVP"],
  "bottom":["Nie widzisz odpowiedniej usługi?","Opisz potrzebę lub problem — zaproponujemy rozwiązanie.","Porozmawiajmy o projekcie"]
 },
 "de":{
  "seo":["SEO & Suchmaschinenoptimierung","Damit Kunden Ihr Unternehmen bei Google finden.","Lokale SEO","SEO für Onlineshops","SEO für Dienstleister","Internationale SEO","SEO-Audit"],
  "ads":["Google Ads","Anzeigen für relevante Anfragen potenzieller Kunden.","Google Suchanzeigen","Google Shopping & Performance Max","Google Ads für lokale Unternehmen","Google Ads Audit","Google Merchant Center"],
  "commerce":["Onlineshops","Shops erstellen, verbessern und automatisieren.","Onlineshop-Erstellung","WooCommerce & Shopify","Conversion-Optimierung im Shop","Shop-Automatisierung","Shop-Relaunch & Migration"],
  "sites":["Website-Erstellung","Websites, die Vertrauen schaffen und Anfragen gewinnen.","Websites für lokale Unternehmen","Websites für Dienstleister","Landingpages für Anzeigen","Unternehmenswebsites","Website-Relaunch"],
  "dev":["Webentwicklung","Technische Probleme lösen und Abläufe automatisieren.","Website-Wartung und Anpassungen","Integrationen & Automatisierung","Performance, Sicherheit & Barrierefreiheit","CRM & Kundenportale","Webanwendungen & MVP"],
  "bottom":["Sie finden Ihre Leistung nicht?","Beschreiben Sie Ihr Projekt oder Problem — wir klären die nächsten Schritte.","Projekt besprechen"]
 }
}
MRSEO_TRIAL_NAV_JSON;
 $all=json_decode($json,true,512,JSON_THROW_ON_ERROR);
 return $all;
}

function mrseo_trial_menu_native($locale) {
 $copy=mrseo_trial_menu_translations();
 if(isset($copy[$locale]))return $copy[$locale];
 // Fifteen additional EU markets: load the existing native-language adapter.
 // The legacy renderer loaded this lazily; the trial renderer must do so itself.
 require_once __DIR__.'/eu-orbit-copy.php';
 if(!function_exists('mrseo_eu_service_labels') || !function_exists('mrseo_eu_premium_mega_copy'))return $copy['uk'];
 $labels=mrseo_eu_service_labels($locale);
 $native=mrseo_eu_premium_mega_copy($locale);
 if(!$native || !$labels)return $copy['uk'];
 $groups=$native['sections'];
 return array(
  'seo'=>array($labels['seo'],$groups['seo']['lead'],$labels['seo'],$labels['ecommerce-seo'],$labels['seo-audit']),
  'ads'=>array($labels['google-ads'],$groups['ads']['lead'],$labels['google-ads'],$groups['ads']['topics'][0]??'',$groups['ads']['topics'][1]??''),
  'commerce'=>array($labels['online-shop-development'],$groups['commerce']['lead'],$labels['online-shop-development'],$groups['commerce']['topics'][0]??'',$groups['commerce']['topics'][1]??''),
  'sites'=>array($labels['website-design'],$native['summary'],$labels['website-design']),
  'dev'=>array($labels['web-development'],$groups['dev']['lead'],$labels['web-development'],$groups['dev']['topics'][0]??'',$groups['dev']['topics'][1]??''),
  'bottom'=>array($native['ctaHeading'],$native['ctaText'],$native['cta'])
 );
}

function mrseo_trial_menu_route_map($locale) {
 // 25 Ukrainian menu options now have a real, independent landing page.
 if($locale==='uk'){
  return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','performance-max','local-google-ads','google-ads-audit','merchant-center'),
   'commerce'=>array('online-store-development','horoshop','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('local-business-websites','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('website-maintenance','api-integrations','website-speed-security','web-development','web-applications')
  );
 }
 if($locale==='ru'){
  // Each service below has a complete genuine RU landing page — no placeholder links.
  return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','performance-max','local-google-ads','google-ads-audit','merchant-center'),
   'commerce'=>array('online-store-development','horoshop','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('local-business-websites','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('website-maintenance','api-integrations','website-speed-security','web-development','web-applications')
  );
 }
 if($locale==='en')return array(
  'seo'=>array(null,'ecommerce-seo',null,null,'seo-audit'),
  'ads'=>array('google-ads','google-shopping',null,'google-ads-audit','merchant-center-help'),
  'commerce'=>array('online-shop-development',null,null,null,null),
  'sites'=>array(null,'service-websites',null,null,null),
  'dev'=>array('wordpress-care',null,null,'web-development',null)
 );
 if($locale==='pl')return array(
  'seo'=>array(null,'ecommerce-seo',null,null,'seo-audit'),
  'ads'=>array('google-ads','google-shopping',null,'audyt-google-ads','problemy-merchant-center'),
  'commerce'=>array('tworzenie-sklepow-internetowych',null,null,null,null),
  'sites'=>array('tworzenie-stron-internetowych',null,null,null,null),
  'dev'=>array('opieka-wordpress',null,null,'web-development',null)
 );
 if($locale==='de')return array(
  'seo'=>array('seo','ecommerce-seo',null,null,'seo-audit'),
  'ads'=>array('google-ads',null,null,null,null),
  'commerce'=>array(null,null,null,null,null),
  'sites'=>array(null,null,null,null,null),
  'dev'=>array(null,null,null,'web-development',null)
 );
 return array(
  'seo'=>array('seo','ecommerce-seo','seo-audit'),
  'ads'=>array('google-ads',null,null),
  'commerce'=>array('online-shop-development',null,null),
  'sites'=>array('website-design'),
  'dev'=>array('web-development',null,null)
 );
}

function mrseo_trial_menu_valid($slug,$locale) {
 if(!$slug)return false;
 if($locale==='uk' && function_exists('mrseo_ua_website_slugs')
    && in_array($slug,mrseo_ua_website_slugs(),true))return true;
 if($locale==='ru' && function_exists('mrseo_ru_website_slugs')
    && in_array($slug,mrseo_ru_website_slugs(),true))return true;
 if(in_array($locale,array('uk','ru'),true)){
  if(in_array($slug,array('seo','seo-audit','ecommerce-seo','google-ads','performance-max','horoshop','web-development','service-websites','analytics'),true))return true;
  return function_exists('mrseo_new_service_copy') && (bool)mrseo_new_service_copy($slug,$locale);
 }
 if($locale==='en'){
  return (function_exists('mrseo_uk_market_slugs') && in_array($slug,mrseo_uk_market_slugs(),true))
    || in_array($slug,array('seo','seo-audit','ecommerce-seo','google-ads','performance-max','service-websites','web-development','analytics'),true);
 }
 if($locale==='pl'){
  return (function_exists('mrseo_pl_service_slugs') && in_array($slug,mrseo_pl_service_slugs(),true))
    || (function_exists('mrseo_int_pages') && in_array($slug,mrseo_int_pages(),true));
 }
 if($locale==='de')return function_exists('mrseo_int_pages') && in_array($slug,mrseo_int_pages(),true);
 return function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true);
}

function mrseo_trial_menu_parent($key,$locale){
 if($key==='seo')return 'seo';
 if($key==='ads')return 'google-ads';
 if($key==='commerce'){
  if(in_array($locale,array('uk','ru'),true))return 'online-store-development';
  if($locale==='en')return 'online-shop-development';
  if($locale==='pl')return 'tworzenie-sklepow-internetowych';
  if($locale==='de')return null;
  return 'online-shop-development';
 }
 if($key==='sites'){
  if(in_array($locale,array('uk','ru'),true))return 'service-websites';
  if($locale==='en')return 'website-design';
  if($locale==='pl')return 'tworzenie-stron-internetowych';
  if($locale==='de')return null;
  return 'website-design';
 }
 return 'web-development';
}

function mrseo_render_mega_menu_trial($mobile=false){
 $locale=mrseo_locale();
 $copy=mrseo_trial_menu_native($locale);
 $routes=mrseo_trial_menu_route_map($locale);
 $current=mrseo_slug();
 $keys=array('seo','ads','commerce','sites','dev');
 echo '<div class="mrseo-mega mrseo-mega--trial'.($mobile?' mrseo-mega--mobile-panel':'').'">';
 echo '<div class="mrseo-mega-grid">';
 foreach($keys as $key){
  $group=$copy[$key]??null;
  if(!$group)continue;
  $parent=mrseo_trial_menu_parent($key,$locale);
  $parent_live=mrseo_trial_menu_valid($parent,$locale);
  echo '<section class="mrseo-mega-group mrseo-mega-group--'.esc_attr($key).'">';
  echo '<h3>'.mrseo_mega_menu_icon($key);
  if($parent_live){
   echo '<a class="mrseo-mega-heading-link" href="'.esc_url(mrseo_url($parent,$locale)).'">'.esc_html($group[0]).'</a>';
  }else echo '<span>'.esc_html($group[0]).'</span>';
  echo '</h3>';
  echo '<p class="mrseo-mega-lead">'.esc_html($group[1]).'</p>';
  echo '<div class="mrseo-mega-items">';
  foreach(array_slice($group,2) as $i=>$name){
   if(!$name)continue;
   $slug=$routes[$key][$i]??null;
   $live=mrseo_trial_menu_valid($slug,$locale);
   if($live){
    $active=$current===$slug;
    echo '<a class="mrseo-mega-item'.($active?' is-current':'').'" href="'.esc_url(mrseo_url($slug,$locale)).'"'.($active?' aria-current="page"':'').'>'.esc_html($name).'</a>';
   }else{
    // The offer is visible in the pilot but has no dedicated indexed route yet.
    echo '<span class="mrseo-mega-item mrseo-mega-item--planned">'.esc_html($name).'</span>';
   }
  }
  echo '</div></section>';
 }
 echo '</div><div class="mrseo-mega-bottom"><div class="mrseo-mega-bottom-copy">';
 echo '<strong>'.esc_html($copy['bottom'][0]).'</strong><p>'.esc_html($copy['bottom'][1]).'</p></div>';
 echo '<a class="mrseo-mega-contact" href="'.esc_url(mrseo_url('contact',$locale)).'">'.esc_html($copy['bottom'][2]).'<span aria-hidden="true">↗</span></a>';
 echo '</div></div>';
}
