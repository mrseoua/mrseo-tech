<?php
/**
 * Nine intentionally different schematic hero scenes for Ukrainian services.
 * Static text is illustrative, not real customer performance data.
 * Animated with CSS only; reduced-motion honoured.
 */
if(!defined('ABSPATH')) exit;
function mrseo_render_ua_service_scene($kind,$locale='uk'){
 $presets=array(
  'local-seo'=>array('SEARCH','ПОШУК У МІСТІ','Послуга поруч із вами','Профіль компанії','Адреса · Час роботи','Маршрут / Дзвінок'),
  'service-seo'=>array('SEO','ПОШУК ПОСЛУГИ','Послуга для клієнта','Сторінка під запит','Умови · Довіра','Заявка'),
  'international-seo'=>array('GLOBAL','МІЖНАРОДНИЙ ПОШУК','Кожен ринок — свій запит','Україна · UA','Deutschland · DE','Polska · PL'),
  'local-ads'=>array('ADS','ПОШУКОВА РЕКЛАМА','Ваша послуга у місті','Місце показу','Запит клієнта','Дзвінок'),
  'ads-audit'=>array('AUDIT','ПЕРЕВІРКА БЮДЖЕТУ','Де губляться гроші?','Запити й витрати','Конверсії','План змін'),
  'store-conversion'=>array('SHOP','ШЛЯХ ПОКУПЦЯ','Від товару до замовлення','Каталог','Картка товару','Оформлення'),
  'store-migration'=>array('MOVE','ПЕРЕНЕСЕННЯ МАГАЗИНУ','Зберігаємо потрібне','Каталог і товари','URL та редиректи','Перевірка замовлення'),
  'maintenance'=>array('CARE','ПІДТРИМКА САЙТУ','Від помилки до рішення','Діагностика','Безпечне виправлення','Перевірка'),
  'speed-security'=>array('SPEED','ШВИДКІСТЬ І ЗАХИСТ','Зручніше для відвідувача','Завантаження','Безпека','Доступність')
 );
 // Dedicated Russian scene labels; UA graphics and their original wording stay intact.
 if($locale==='ru')$presets=array(
  'local-seo'=>array('ПОИСК','ПОИСК В ГОРОДЕ','Услуги рядом с вами','Профиль компании','Адрес · Время работы','Маршрут / Звонок'),
  'service-seo'=>array('SEO','ПОИСК УСЛУГ','Клиент ищет услугу','Страница под запрос','Условия · Доверие','Заявка'),
  'international-seo'=>array('СТРАНЫ','МЕЖДУНАРОДНЫЙ ПОИСК','Каждому рынку — свой спрос','Украина · RU','Германия · DE','Польша · PL'),
  'local-ads'=>array('РЕКЛАМА','РЕКЛАМА В ВАШЕМ ГОРОДЕ','Ваша услуга поблизости','География показа','Запрос клиента','Звонок'),
  'ads-audit'=>array('АУДИТ','ПРОВЕРКА РЕКЛАМЫ','Куда уходят деньги?','Запросы и расходы','Конверсии','План исправлений'),
  'store-conversion'=>array('МАГАЗИН','ПУТЬ ПОКУПАТЕЛЯ','От товара к заказу','Каталог','Карточка товара','Оформление'),
  'store-migration'=>array('ПЕРЕНОС','ПЕРЕНОС МАГАЗИНА','Сохраняем важное','Каталог и товары','URL и редиректы','Проверка заказа'),
  'maintenance'=>array('СЕРВИС','ПОДДЕРЖКА САЙТА','От ошибки к исправлению','Диагностика','Безопасное исправление','Проверка'),
  'speed-security'=>array('ЗАЩИТА','СКОРОСТЬ И БЕЗОПАСНОСТЬ','Удобнее для клиента','Загрузка','Безопасность','Доступность')
 );
 // British labels and four UK-only platform/integration scenes. Existing UA/RU are unchanged.
 if($locale==='en')$presets=array(
  'local-seo'=>array('LOCAL','SEARCH NEAR YOU','Services in your area','Relevant search','Business details','Call / directions'),
  'service-seo'=>array('SEO','SERVICE SEARCH','A customer needs a service','Useful landing page','Clear offer','Enquiry'),
  'international-seo'=>array('GLOBAL','INTERNATIONAL SEARCH','Real demand in each market','United Kingdom · GB','Germany · DE','France · FR'),
  'local-ads'=>array('PPC','LOCAL GOOGLE ADS','Relevant local customers','Service area','Search terms','Useful enquiries'),
  'ads-audit'=>array('AUDIT','GOOGLE ADS REVIEW','Where does the spend go?','Search terms / costs','Conversion checks','Priority report'),
  'store-conversion'=>array('SHOP','CUSTOMER JOURNEY','From product to purchase','Product choice','Basket','Checkout'),
  'store-migration'=>array('MOVE','STORE MIGRATION','Protect what already works','Catalogue','URLs and redirects','Test purchase'),
  'maintenance'=>array('CARE','SITE MAINTENANCE','From problem to fix','Diagnose','Controlled change','Verify'),
  'speed-security'=>array('SPEED','PERFORMANCE AND SECURITY','Make the site easier to use','Loading','Security','Accessibility'),
  'shop-platforms'=>array('STORE','PLATFORM CHOICE','Fit the shop to the business','WooCommerce','Shopify','Test checkout'),
  'catalog-automation'=>array('DATA','PRODUCT AUTOMATION','Keep product details aligned','Supplier data','Price and stock','Published feed'),
  'api-integrations'=>array('API','BUSINESS INTEGRATION','One reliable data flow','Website','CRM / service','Verified record'),
  'web-applications'=>array('APP','WEB APPLICATION MVP','One task working well','User role','Working screen','Tested task'),
  'ga4-conversions'=>array('GA4','EVENT VERIFICATION','A conversion that counts','Real enquiry','Correct event','Verified data')
 );
 if(!isset($presets[$kind]))return;
 $v=$presets[$kind];
 $type=in_array($kind,array('local-seo','service-seo','international-seo'),true)?'search':
  (in_array($kind,array('local-ads','ads-audit'),true)?'ads':
  (in_array($kind,array('store-conversion','store-migration','shop-platforms','catalog-automation'),true)?'commerce':'tech'));
 ?>
 <div class="uws-demo-body uws-scene uws-scene--<?php echo esc_attr($kind); ?> uws-scene--<?php echo esc_attr($type); ?>" aria-hidden="true">
  <div class="uws-scene-top"><span><?php echo esc_html($v[0]); ?></span><span class="uws-scene-led"><i></i><i></i><i></i></span></div>
  <div class="uws-scene-kicker"><?php echo esc_html($v[1]); ?></div>
  <strong class="uws-scene-headline"><?php echo esc_html($v[2]); ?></strong>
  <?php if($type==='search'): ?>
   <div class="uws-scene-search"><span class="uws-scene-magnify">⌕</span><span><?php echo esc_html($v[3]); ?></span><b>↗</b></div>
   <div class="uws-scene-results"><div><i class="uws-scene-pin"></i><span><?php echo esc_html($v[4]); ?></span></div><div><i class="uws-scene-pin"></i><span><?php echo esc_html($v[5]); ?></span></div></div>
  <?php elseif($type==='ads'): ?>
   <div class="uws-scene-ads-bars">
    <div><span><?php echo esc_html($v[3]); ?></span><i><b></b></i></div>
    <div><span><?php echo esc_html($v[4]); ?></span><i><b></b></i></div>
   </div>
   <div class="uws-scene-ads-out"><span class="uws-scene-pulse">●</span><?php echo esc_html($v[5]); ?> <b>↗</b></div>
  <?php elseif($type==='commerce'): ?>
   <div class="uws-scene-flow">
    <?php foreach(array_slice($v,3) as $i=>$item): ?><div class="uws-scene-flow-step"><span>0<?php echo esc_html($i+1); ?></span><b><?php echo esc_html($item); ?></b></div><?php endforeach; ?>
   </div>
   <div class="uws-scene-commerce-track"><span></span><span></span><span></span></div>
  <?php else: ?>
   <div class="uws-scene-tech-screen">
    <div class="uws-scene-tech-rings"><i></i><i></i><span>✓</span></div>
    <div class="uws-scene-tech-states">
     <?php foreach(array_slice($v,3) as $label): ?><span><b>✓</b><?php echo esc_html($label); ?></span><?php endforeach; ?>
    </div>
   </div>
  <?php endif; ?>
 </div>
 <?php
}
