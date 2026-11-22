<?php
/** Dedicated Ukrainian Horoshop premium subservices, without invented translations. */
if(!defined('ABSPATH'))exit;
function mrseo_hs_pages(){
 static $pages=null;
 if($pages===null)$pages=json_decode(<<<'MRSEO_HS_PAGES'
{
  "setup": [
    "Створення магазину на Хорошоп",
    "Магазин ще не запущено?",
    "Створюємо структуру каталогу, налаштовуємо замовлення й перевіряємо першу покупку.",
    "СТВОРЕННЯ МАГАЗИНУ",
    "Потрібен новий магазин, а товарні категорії, оплата й доставка ще не пов’язані в зрозумілий процес.",
    "Структура каталогу",
    "Узгоджуємо категорії, атрибути, картки товарів та навігацію.",
    "Оформлення замовлення",
    "Перевіряємо корзину, способи доставки, оплати та доступні інтеграції.",
    "Контроль запуску",
    "Тестуємо шлях покупця на телефоні й комп’ютері та фіксуємо невирішені питання.",
    "Працюючий сценарій від вибору товару до тестового замовлення.",
    "Чи потрібна окрема розробка?",
    "Не обов’язково. Спочатку оцінюємо стандартні можливості та тариф Хорошоп.",
    "Чи входить SEO в запуск?",
    "Базова структура й технічна готовність — так; регулярне просування узгоджується окремо.",
    "online-store-development",
    "Створення інтернет-магазинів"
  ],
  "seo": [
    "SEO-просування Хорошоп",
    "Товари є. Покупців із Google мало?",
    "Розвиваємо категорії та фільтри за пошуковим попитом, а не за кількістю URL.",
    "SEO ХОРОШОП",
    "У каталозі багато товарів, але пріоритетні категорії майже не отримують переходів із Google.",
    "Пошуковий попит",
    "Групуємо комерційні запити й визначаємо потрібні сторінки.",
    "Категорії і фільтри",
    "Погоджуємо SEO-посадкові з урахуванням можливостей та обмежень платформи.",
    "Контент і посилання",
    "Готуємо Title, H1, описи й внутрішні переходи між релевантними сторінками.",
    "Карта сторінок під попит і пріоритетний план оптимізації.",
    "Чи варто індексувати всі фільтри?",
    "Ні. Відбираємо лише цінні комбінації, щоб не створювати дублікати.",
    "Коли зросте трафік?",
    "Це залежить від конкуренції, сайту та роботи Google; термінів і позицій не гарантуємо.",
    "ecommerce-seo",
    "SEO інтернет-магазинів"
  ],
  "audit": [
    "SEO-аудит Хорошоп",
    "Google бачить зайві сторінки?",
    "Перевіряємо індексацію та технічні URL, щоб відокремити причини від симптомів.",
    "АУДИТ ХОРОШОП",
    "Важливі категорії не індексуються, а службові адреси та фільтри потрапляють у видачу.",
    "Індексація",
    "Перевіряємо вибірку URL, canonical, sitemap і дані Search Console.",
    "Структура магазину",
    "Аналізуємо фільтри, пагінацію, редиректи та внутрішні посилання.",
    "План виправлень",
    "Визначаємо, що можна зробити в налаштуваннях Хорошоп, а що обмежено платформою.",
    "Звіт із проблемними URL, доказами та пріоритетами робіт.",
    "Ви одразу виправляєте всі помилки?",
    "Ні. Аудит — окрема діагностика; впровадження узгоджуємо після звіту.",
    "Чи потрібен Search Console?",
    "Доступ допомагає оцінити реальну індексацію, але перелік доступів погоджуємо.",
    "seo-audit",
    "Технічний SEO-аудит"
  ],
  "ads": [
    "Google Ads для Хорошоп",
    "Реклама витрачає бюджет?",
    "Зв’язуємо товарні кампанії з реальними покупками та витратами.",
    "РЕКЛАМА ХОРОШОП",
    "Кліки є, але незрозуміло, які саме кампанії та товари приносять замовлення.",
    "Конверсії",
    "Зіставляємо рекламні покупки з реальними замовленнями магазину.",
    "Shopping і Performance Max",
    "Перевіряємо дані фіда, структуру кампаній і товарні групи.",
    "Контроль витрат",
    "Узгоджуємо показники за покупками, витратами та маржею за наявності даних.",
    "Перевірені конверсії та узгоджена структура кампаній.",
    "Чи потрібен Merchant Center?",
    "Для товарних оголошень — так; для пошукових кампаній необов’язково.",
    "Чи гарантуєте ROAS?",
    "Ні. Результат залежить від попиту, асортименту, конкуренції та бюджету.",
    "google-ads",
    "Послуги Google Ads"
  ],
  "feeds": [
    "Товарні фіди Хорошоп",
    "Google відхиляє товари?",
    "Знаходимо невідповідності у фіді, картках товарів і оформленні покупки.",
    "ТОВАРНІ ДАНІ",
    "Merchant Center відхиляє позиції через ціни, наявність, атрибути або правила сайту.",
    "Дані товарів",
    "Перевіряємо назви, ідентифікатори, ціни й залишки у фіді.",
    "Відповідність сторінок",
    "Зіставляємо фід із картками, доставкою та оплатою на сайті.",
    "Повторна діагностика",
    "Виправляємо доступні налаштування й перевіряємо статус товарів.",
    "Список причин і виправлень із результатами повторної перевірки.",
    "Чи гарантуєте розблокування Merchant Center?",
    "Ні. Остаточні рішення ухвалює Google.",
    "Чи все можна змінити в Хорошоп?",
    "Не завжди: перевіряємо функції конкретного тарифу і правила Google.",
    "merchant-center",
    "Налаштування Merchant Center"
  ],
  "ga4": [
    "GA4 та конверсії Хорошоп",
    "Замовлення є. Дані не сходяться?",
    "Перевіряємо події покупок, суми й дублікати в GA4 та Google Ads.",
    "АНАЛІТИКА ХОРОШОП",
    "У рекламі показані покупки, але їхня кількість або сума не збігається із замовленнями.",
    "Подія purchase",
    "Перевіряємо ідентифікатор, валюту, вартість і момент передавання покупки.",
    "Дублікати",
    "Шукаємо повторні спрацювання та втрату подій на етапі оплати.",
    "Google Ads",
    "Перевіряємо імпорт конверсій і налаштування основної цільової дії.",
    "Протокол тестових покупок і список знайдених розбіжностей.",
    "Чи потрібен Tag Manager?",
    "Залежить від підключених інтеграцій. Спершу перевіряємо наявні інструменти.",
    "Чому GA4 відрізняється від CRM?",
    "Причини можуть бути в моделі обліку, згоді на аналітику й різних статусах замовлень.",
    "ga4-conversions",
    "Налаштування GA4"
  ]
}
MRSEO_HS_PAGES
,true,512,JSON_THROW_ON_ERROR);
 return $pages;
}
function mrseo_hs_key(){
 if(mrseo_locale()!=='uk')return null;
 $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
 if(!preg_match('~^horoshop/(setup|seo|audit|ads|feeds|ga4)$~D',$path,$m))return null;
 return isset(mrseo_hs_pages()[$m[1]])?$m[1]:null;
}
function mrseo_hs_url($key){return home_url('/horoshop/'.$key.'/');}
add_action('init',function(){
 add_rewrite_rule('^horoshop/(setup|seo|audit|ads|feeds|ga4)/?$','index.php?mrseo_service=horoshop','top');
},12);
add_action('init',function(){
 if(get_option('mrseo_hs_premium_routes_v1')!=='ready'){
  flush_rewrite_rules(false);
  update_option('mrseo_hs_premium_routes_v1','ready',false);
 }
},45);
add_filter('pre_handle_404',function($pre){return mrseo_hs_key()?true:$pre;},110);
add_filter('redirect_canonical',function($url){return mrseo_hs_key()?false:$url;},110);
add_filter('template_include',function($template){
 return mrseo_hs_key()?get_template_directory().'/horoshop-service-premium.php':$template;
},110);
/**
 * Commercial intent per page, separated from the broad navigational Horoshop queries.
 * Serpstat g_ua snapshot 2026-11-22: development 390, SEO stores 30,
 * ads setup 70, product feed 10. Low-volume/no-data Horoshop combinations
 * are included naturally, never represented as measured traffic.
 */
function mrseo_hs_search_meta($key){
 $meta=array(
  'setup'=>array(
   'Створення інтернет-магазину на Хорошоп | MrSeo.tech',
   'Створення магазину на Хорошоп: структура каталогу, оплата, доставка й тестове замовлення. Офіційний партнер Хорошоп, команда з 10-річним досвідом.'
  ),
  'seo'=>array(
   'SEO-просування магазину на Хорошоп | MrSeo.tech',
   'SEO для інтернет-магазину на Хорошоп: категорії, фільтри, метатеги й індексація. Офіційний партнер Хорошоп, команда з 10-річним досвідом.'
  ),
  'audit'=>array(
   'SEO-аудит магазину на Хорошоп | MrSeo.tech',
   'SEO-аудит Хорошоп: перевірка індексації, фільтрів, canonical та технічних URL. Звіт із пріоритетами від офіційного партнера Хорошоп.'
  ),
  'ads'=>array(
   'Google Ads для Хорошоп — Shopping та Performance Max | MrSeo.tech',
   'Google Ads для магазину на Хорошоп: Shopping, Performance Max, товарні кампанії й перевірка конверсій. Офіційний партнер Хорошоп.'
  ),
  'feeds'=>array(
   'Товарний фід Хорошоп і Google Merchant Center | MrSeo.tech',
   'Налаштування товарного фіда Хорошоп і Merchant Center: ціни, залишки, атрибути, відхилені товари. Офіційний партнер Хорошоп.'
  ),
  'ga4'=>array(
   'Налаштування GA4 та конверсій для Хорошоп | MrSeo.tech',
   'Налаштування GA4 для магазину на Хорошоп: подія purchase, вартість замовлення, дублікати та імпорт конверсій Google Ads. 10 років досвіду команди.'
  )
 );
 return $meta[$key]??null;
}
add_filter('pre_get_document_title',function($title){
 $k=mrseo_hs_key();$m=$k?mrseo_hs_search_meta($k):null;return $m?$m[0]:$title;
},1100);
add_action('wp',function(){
 if(mrseo_hs_key())remove_action('wp_head','rel_canonical');
},1);
add_action('wp_head',function(){
 $k=mrseo_hs_key();if(!$k)return;
 $p=mrseo_hs_pages()[$k];
 $m=mrseo_hs_search_meta($k);
 echo '<meta name="description" content="'.esc_attr($m[1]).'">'."\n";
 echo '<link rel="canonical" href="'.esc_url(mrseo_hs_url($k)).'">'."\n";
},2);
add_action('wp_enqueue_scripts',function(){
 if(!mrseo_hs_key())return;
 wp_enqueue_style('mrseo-horoshop-premium-pages',get_template_directory_uri().'/assets/horoshop-premium-pages.css',array('mrseo-style'),'1.2.0');
 wp_enqueue_style('mrseo-horoshop-partner-trust',get_template_directory_uri().'/assets/horoshop-partner-trust.css',array('mrseo-horoshop-premium-pages'),'1.0.0');
 wp_enqueue_script('mrseo-horoshop-premium-motion',get_template_directory_uri().'/assets/horoshop-premium-motion.js',array(),'1.0.0',true);
},105);
