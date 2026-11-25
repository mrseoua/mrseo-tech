<?php
if(!defined('ABSPATH'))exit;
/** Owner-approved UA sequence v2; preserve the accepted Ads positioning. */
function mrseo_ua_v2_approach($slug){
 if(mrseo_locale()!=='uk')return;
 if(function_exists('mrseo_ads_position_copy')&&mrseo_ads_position_copy($slug)){mrseo_ads_position_render($slug);return;}
 static $copy=null;
 if($copy===null)$copy=json_decode(<<<'MRSEO_UA_V2_APPROACH'
{"seo":"Пріоритет — потрібні бізнесу сторінки й реальний пошуковий попит, а не сотні формальних зауважень.","ecommerce-seo":"Розвиваємо категорії, які відповідають попиту покупців, а не створюємо тисячі зайвих URL.","service-business-seo":"Працюємо над сторінками послуг і шляхом до звернення, а не над формальним обсягом тексту.","international-seo":"Перевіряємо попит на цільових ринках; не продаємо переклад як готову стратегію просування.","seo-audit":"Аудит має дати докази й пріоритети, а не привід нав’язати щомісячне просування.","website-audit":"Показуємо конкретні перешкоди на шляху до заявки; виправлення погоджуємо окремо.","traffic-recovery":"Не обіцяємо повернути минулі позиції за календарем: відрізняємо зміни сайту від змін попиту.","semantic-core":"Карта запитів має пояснювати, які сторінки потрібні бізнесу, а не збільшувати кількість рядків у таблиці.","seo-content":"Пишемо для покупця й пошуку, а не продаємо тисячі символів заради обсягу.","metadata-optimization":"Метатеги відповідають реальній пропозиції сторінки, а не обіцяють те, чого на ній немає.","internal-linking":"Посилання мають допомагати знайти потрібну сторінку, а не існувати заради кількості.","competitor-seo-analysis":"Не копіюємо чужий сайт: шукаємо можливості під ваш асортимент і ресурси.","indexing-fixes":"Виправляємо підтверджені технічні причини; не продаємо гарантію рішення Google.","search-console-setup":"Налаштовуємо доступ і пояснюємо, як читати звіти, щоб власник не залежав від агенції.","crawl-configuration":"Не закриваємо URL навмання: відділяємо корисні сторінки від службових.","seo-redirects":"Зберігаємо шлях до відповідного контенту, а не переспрямовуємо все на головну.","structured-data":"Описуємо реальні дані товару або компанії, без вигаданих рейтингів.","ai-search-optimization":"Працюємо над перевіреними фактами й корисним змістом, без гарантій згадок у відповідях ШІ.","google-remarketing":"Погоджуємо доречні аудиторії, а не витрати заради повторних показів.","analytics":"Поєднуємо витрати й доступні дані про продажі, а не створюємо звіт заради графіків.","ga4-conversions":"Перевіряємо справжні покупки та звернення, а не рахуємо зайві події.","consent-mode":"Тестуємо поведінку тегів після вибору користувача, а не тільки вигляд банера.","business-dashboards":"Дашборд має допомагати ухвалити рішення, а не демонструвати десятки непотрібних метрик.","reporting-automation":"Автоматичний звіт має попереджати про помилки й пропуски даних, а не просто надходити за розкладом.","online-store-development":"Створюємо шлях від вибору товару до замовлення, а не лише красивий каталог.","catalog-automation":"Погоджуємо правила обміну та контроль помилок до масового оновлення каталогу.","store-conversion":"Починаємо з конкретних перешкод на шляху покупки, а не з повного редизайну.","store-migration":"Переносимо магазин лише коли це обґрунтовано; збереження даних і адрес плануємо до переїзду.","competitor-price-monitoring":"Ціна конкурента — лише сигнал; не рекомендуємо знижувати її без розуміння маржі.","service-websites":"Створюємо сайт, на якому клієнт розуміє послугу та може легко звернутися.","local-business-websites":"Місцевому бізнесу потрібен доступний контакт і зрозумілі послуги, а не складний портал.","landing-pages":"Одна сторінка має вести до зрозумілої дії, а не збирати всі можливі функції.","corporate-websites":"Показуємо перевірені компетенції й реальні напрями роботи, без вигаданих досягнень.","website-redesign":"Змінюємо те, що заважає користувачам, а не перебудовуємо сайт лише заради нового вигляду.","website-maintenance":"Погоджуємо конкретні задачі підтримки, а не продаємо непотрібну перебудову.","website-speed-security":"Починаємо з виміряних затримок і реальних ризиків, а не з випадкових плагінів.","wordpress-development":"Потрібні функції та зручний редактор важливіші за кількість плагінів.","web-development":"Визначаємо процес і потрібні функції; не продаємо складну систему, коли вистачає інтеграції.","business-automation":"Автоматизуємо підтверджені повторювані операції, а не ускладнюємо роботу команди.","crm-development":"Підлаштовуємо CRM під реальний процес продажів, а не навпаки.","web-applications":"Погоджуємо сценарії й мінімально потрібні функції до розробки вебзастосунку.","api-integrations":"Перевіряємо доступні API, поля та обробку помилок, перш ніж обіцяти інтеграцію.","custom-functionality":"Погоджуємо формули, правила й критерії перевірки замість великого пакета функцій.","ai-agents":"Починаємо з вузької перевірюваної задачі, контролю доступів і погодження важливих дій.","chatbot-development":"Бот має відповідати на реальні запитання й передавати складні звернення людині.","client-portals":"Кабінет має спрощувати доступ до статусів і документів, не відкриваючи чужих даних.","data-parsing":"Потрібні актуальні й зіставні дані, а не просто великий файл із цінами.","payment-integration":"Перевіряємо успіх, відмову та повторні повідомлення, а не лише кнопку оплати.","mobile-app-development":"Погоджуємо потрібні функції й підтримку платформ до вибору архітектури застосунку.","ecommerce-mobile-apps":"Мобільний магазин має працювати з актуальним каталогом і реальними замовленнями.","corporate-mobile-apps":"Застосунок команди має спрощувати робочі задачі, а не створювати ще один обов’язковий інструмент.","pwa-development":"Перевіряємо, чи вебзастосунок покриває потрібні функції, перш ніж продавати дорожчу нативну розробку.","horoshop":"Враховуємо реальні можливості Хорошоп і ваш тариф, не пропонуємо непотрібний переїзд.","horoshop/setup":"Погоджуємо потрібні налаштування магазину й перевірку замовлення, не продаємо зайві модулі.","horoshop/seo":"Працюємо над категоріями й фільтрами під попит у межах можливостей Хорошоп.","horoshop/audit":"Передаємо причини, проблемні URL та пріоритети; впровадження — за окремою домовленістю.","horoshop/ads":"Зіставляємо рекламні покупки з замовленнями Хорошоп, а не оцінюємо кампанії лише за кліками.","horoshop/search-ads":"Погоджуємо потрібні пошукові фрази й категорії, а не розширюємо покази заради витрат.","horoshop/shopping":"Спочатку перевіряємо товарні дані та відхилення, потім погоджуємо рекламу.","horoshop/pmax":"Оцінюємо асортимент, витрати та покупки, а не збільшуємо бюджет заради показів.","horoshop/feeds":"Виправляємо підтверджені розбіжності фіда, без гарантій схвалення Google.","horoshop/ga4":"Звіряємо ідентифікатори та суми покупок із замовленнями, а не продаємо зайві теги."}
MRSEO_UA_V2_APPROACH
,true,512,JSON_THROW_ON_ERROR);
 if(!isset($copy[$slug]))return;
 ?>
 <section class="ua-v2-approach" data-ua-stage="approach" aria-labelledby="ua-v2-approach-title"><div class="ua-v2-wrap ua-v2-approach-grid">
  <div><span class="ua-v2-label">03 / НАШ ПІДХІД</span><h2 id="ua-v2-approach-title">Без пафосу. Без переплат. <em>По суті.</em></h2></div>
  <div><p><?php echo esc_html($copy[$slug]);?></p><p>Вартість визначає погоджений обсяг роботи. Не нав’язуємо зайвих послуг і не підміняємо роботу красивими звітами.</p></div>
 </div></section>
 <?php
}
function mrseo_ua_v2_terms($detail=''){
 if(mrseo_locale()!=='uk')return;
 ?>
 <section class="ua-v2-terms" data-ua-stage="terms" aria-labelledby="ua-v2-terms-title"><div class="ua-v2-wrap ua-v2-terms-grid">
  <div><span class="ua-v2-label">06 / УМОВИ СПІВПРАЦІ</span><h2 id="ua-v2-terms-title">Зрозумілі умови. <em>Без сюрпризів.</em></h2></div>
  <div><p>До початку погоджуємо обсяг робіт, вартість, строки та формат оплати. Додаткові роботи — лише за домовленістю.</p><?php if($detail!==''):?><p><?php echo esc_html($detail);?></p><?php endif;?></div>
 </div></section>
 <?php
}
function mrseo_ua_v2_result($detail){
 if(mrseo_locale()!=='uk')return;
 ?>
 <section class="ua-v2-result" data-ua-stage="result" aria-labelledby="ua-v2-result-title"><div class="ua-v2-wrap ua-v2-terms-grid"><div><span class="ua-v2-label">05 / РЕЗУЛЬТАТ</span><h2 id="ua-v2-result-title">Що отримає <em>ваш бізнес.</em></h2></div><p><?php echo esc_html($detail);?></p></div></section>
 <?php
}
function mrseo_ua_v2_catalog($key,$nested=false){
 if(mrseo_locale()!=='uk'||!function_exists('mrseo_ua_menu_groups'))return;
 $group=null;foreach(mrseo_ua_menu_groups() as $candidate){if($candidate['key']===$key){$group=$candidate;break;}}
 if(!$group)return;
 $exclude=array('website-redesign','google-remarketing','custom-functionality','website-maintenance','website-speed-security');
 if(!$nested)echo '<section class="ua-v2-catalog" data-ua-stage="catalog"><div class="ua-v2-wrap"><span class="ua-v2-label">НАПРЯМИ РОБОТИ</span><h2>Оберіть потрібну послугу.</h2>';
 echo '<div class="ua-v2-catalog-groups">';
 foreach($group['sections'] as $section){
  $items=array_values(array_filter($section['items'],static function($item)use($exclude){return $item[0]!==mrseo_slug()&&!in_array($item[0],$exclude,true);}));
  if(!$items)continue;
  echo '<div class="ua-v2-catalog-group"><h3>'.esc_html($section['title']).'</h3><div class="ua-v2-catalog-links">';
  foreach($items as $item)echo '<a href="'.esc_url(mrseo_url($item[0],'uk')).'">'.esc_html($item[1]).' <span aria-hidden="true">↗</span></a>';
  echo '</div></div>';
 }
 echo '</div>';
 if(!$nested)echo '</div></section>';
}
