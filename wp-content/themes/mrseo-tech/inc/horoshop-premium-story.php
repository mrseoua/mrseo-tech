<?php
/** Horoshop-specific visual stories below the hero. No client stats or implied live integration. */
if(!defined('ABSPATH'))exit;
function mrseo_hs_story_content($key){
 $stories=array(
  'setup'=>array('Запуск магазину','Каталог товарів','Кошик і оплата','Тестове замовлення','Категорії','Спосіб доставки','Перевірка покупки','cart'),
  'seo'=>array('Видимість каталогу','Пошукові запити','Сторінки категорій','Зв’язки між сторінками','Запити покупців','SEO-структура','План оптимізації','search'),
  'audit'=>array('Технічний аудит','Перевірка URL','Індексація й canonical','Звіт із пріоритетами','Сторінки каталогу','Технічні дублікати','Рекомендації','scan'),
  'ads'=>array('Товарна реклама','Каталог і фід','Рекламні кампанії','Облік покупок','Дані товарів','Витрати та події','Перевірка конверсій','campaign'),
  'feeds'=>array('Merchant Center','Товарний фід','Перевірка атрибутів','Статуси товарів','Ціни й залишки','Проблемні позиції','Повторна перевірка','feed'),
  'search-ads'=>array('Пошукові оголошення','Комерційні запити','Релевантні оголошення','Перевірка покупок','Список запитів','Виключені фрази','План оптимізації','search'),
  'shopping'=>array('Google Shopping','Товарні дані','Діагностика Merchant','Shopping-кампанія','Ціни та наявність','Статуси товарів','Структура реклами','feed'),
  'pmax'=>array('Performance Max','Фід та асортимент','Групи ресурсів','Контроль конверсій','Товарні групи','Сигнали покупок','Контроль витрат','campaign'),
  'ga4'=>array('Аналітика покупок','Оформлення замовлення','Подія purchase','Звірка конверсій','ID транзакції','Сума і валюта','Розбіжності','analytics')
 );
 return $stories[$key]??null;
}
function mrseo_hs_workbench($key){
 $s=mrseo_hs_story_content($key);if(!$s)return;
 ?>
 <section class="hs-story-workbench" aria-labelledby="hs-story-workbench-title">
  <div class="hs-premium-wrap hs-story-workbench-grid">
   <div class="hs-story-narrative">
    <span class="hs-premium-eyebrow">НЕ ЛИШЕ РЕКОМЕНДАЦІЇ</span>
    <h2 id="hs-story-workbench-title">Показуємо процес. <em>Перевіряємо кожен крок.</em></h2>
    <p>Спочатку визначаємо причину проблеми, потім виконуємо погоджені дії та перевіряємо результат. Ось як виглядає послідовність роботи саме з вашою задачею.</p>
    <p class="hs-story-caution">Схематична візуалізація процесу — не дані реального магазину.</p>
   </div>
   <div class="hs-story-machine hs-story-machine--<?php echo esc_attr($s[7]);?>" role="img" aria-label="<?php echo esc_attr($s[0].': '.$s[1].', '.$s[2].', '.$s[3]);?>">
    <div class="hs-story-machine-head"><span class="hs-story-machine-mark" aria-hidden="true"><i></i><i></i><i></i></span><span><?php echo esc_html($s[0]);?></span><span class="hs-story-machine-status">СХЕМА ПРОЦЕСУ</span></div>
    <div class="hs-story-machine-body" aria-hidden="true">
     <div class="hs-story-machine-lane">
      <?php foreach(array(1,2,3) as $i): ?>
       <div class="hs-story-machine-node hs-story-machine-node--<?php echo esc_attr((string)$i);?>">
        <div class="hs-story-machine-icon"><span class="hs-story-machine-icon-mark"></span><span class="hs-story-machine-icon-line"></span><span class="hs-story-machine-icon-line"></span></div>
        <span class="hs-story-machine-index"><?php echo esc_html('0'.$i);?></span>
        <strong><?php echo esc_html($s[$i]);?></strong>
       </div>
      <?php endforeach;?>
      <div class="hs-story-machine-flow hs-story-machine-flow--first"><span></span></div>
      <div class="hs-story-machine-flow hs-story-machine-flow--second"><span></span></div>
     </div>
     <div class="hs-story-machine-trace"><span></span><span></span><span></span><span></span><span></span><span></span></div>
     <div class="hs-story-machine-foot"><span>Діагностика</span><span>Дія</span><span>Контроль</span></div>
    </div>
   </div>
  </div>
 </section>
 <?php
}
function mrseo_hs_result_visual($key){
 $s=mrseo_hs_story_content($key);if(!$s)return;
 ?>
 <div class="hs-story-proof" role="img" aria-label="<?php echo esc_attr('Схематична перевірка: '.$s[4].', '.$s[5].', '.$s[6]);?>">
  <div class="hs-story-proof-bar"><span class="hs-story-proof-indicator" aria-hidden="true"></span><span>КОНТРОЛЬ РЕЗУЛЬТАТУ</span><span class="hs-story-proof-symbol" aria-hidden="true">◎</span></div>
  <div class="hs-story-proof-content">
   <?php foreach(array(4,5,6) as $i):?>
   <div class="hs-story-proof-row"><span class="hs-story-proof-check" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5 9-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span><?php echo esc_html($s[$i]);?></span><span class="hs-story-proof-pulse" aria-hidden="true"></span></div>
   <?php endforeach;?>
   <div class="hs-story-proof-progress"><span></span></div>
   <p class="hs-story-proof-note">Погоджений перелік перевірок. Ілюстрація, не фактичний звіт.</p>
  </div>
 </div>
 <?php
}

/**
 * Visible Horoshop partnership proof and experience.
 * Official Horoshop offer links to the existing MrSeo entity at mrseo.com.ua.
 * Ten years refers to specialists' experience, not to the age of mrseo.tech
 * or to length of partnership.
 */
function mrseo_hs_trust($compact=false){
 $ru=mrseo_locale()==='ru';
 $proof='https://horoshop.ua/ua/offers/seo-na-etape-razrabotki-im-na-horoshop/';
 $badge=get_template_directory_uri().'/assets/horoshop-partner-active.svg';
 $heading=$ru?'Официальный партнёр Хорошоп':'Офіційний партнер Хорошоп';
 $intro=$ru?'За вашим магазином — команда специалистов с 10-летним опытом в SEO, Google Ads и электронной коммерции. Разбираемся в возможностях платформы и ищем решения для конкретных задач магазина.':'За вашим магазином — команда фахівців із 10-річним досвідом у SEO, Google Ads та електронній комерції. Розуміємо можливості платформи й знаходимо рішення під конкретні завдання магазину.';
 $detail=$ru?'Вместо общих обещаний проверяем структуру каталога, индексацию, товарные данные и учёт покупок. Отделяем задачи, которые можно решить настройками Хорошоп, от ограничений платформы и требований Google.':'Замість загальних обіцянок перевіряємо структуру каталогу, індексацію, товарні дані та облік покупок. Відділяємо задачі, які можна вирішити налаштуваннями Хорошоп, від обмежень платформи й вимог Google.';
 $service=mrseo_hs_key();
 if(!$ru&&$service){
  $focus=array(
   'setup'=>'Для нового магазину найважливіше — запустити шлях покупця без зайвих кроків: від каталогу до підтвердження замовлення.',
   'seo'=>'Для SEO магазину пріоритет — сторінки категорій із реальним попитом, керована індексація та зрозуміла навігація.',
   'audit'=>'Під час аудиту показуємо проблемні адреси та докази, а не просто перелік технічних термінів.',
   'ads'=>'Для реклами спершу звіряємо фід і покупки, а потім визначаємо структуру кампаній і спосіб контролю витрат.',
   'feeds'=>'У Merchant Center розбираємо причину конкретного відхилення, перевіряємо ціну, наявність та правила оформлення.',
   'ga4'=>'В аналітиці перевіряємо подію покупки, суму, валюту та повторні спрацювання, щоб рекламні рішення спиралися на дані.',
   'search-ads'=>'У пошуковій рекламі перевіряємо запити покупців, відповідність оголошень сторінкам Хорошоп і облік замовлень.',
   'shopping'=>'Для Google Shopping насамперед перевіряємо ціни, наявність та статус кожного товару в Merchant Center.',
   'pmax'=>'У Performance Max звіряємо фід, сегменти асортименту та реальні покупки до масштабування витрат.'
  );
  $detail.=' '.($focus[$service]??'');
 }
 ?>
 <section class="hs-trust<?php echo $compact?' hs-trust--compact':'';?>" aria-labelledby="<?php echo $compact?'hs-hub-trust-title':'hs-service-trust-title';?>">
  <div class="<?php echo $compact?'container':'hs-premium-wrap';?> hs-trust-grid">
   <div class="hs-trust-emblem">
    <div class="hs-trust-emblem-circle" aria-hidden="true"><i></i><i></i><i></i></div>
    <img src="<?php echo esc_url($badge);?>" width="105" height="78" alt="<?php echo esc_attr($heading.' — Partner ACTIVE');?>" loading="lazy" decoding="async">
    <span class="hs-trust-emblem-line" aria-hidden="true"></span>
   </div>
   <div class="hs-trust-copy">
    <span class="hs-trust-kicker"><?php echo esc_html($ru?'ПАРТНЁРСТВО, ПОДТВЕРЖДЁННОЕ ПЛАТФОРМОЙ':'ПАРТНЕРСТВО, ПІДТВЕРДЖЕНЕ ПЛАТФОРМОЮ');?></span>
    <h2 id="<?php echo $compact?'hs-hub-trust-title':'hs-service-trust-title';?>"><?php echo esc_html($heading);?>. <em><?php echo esc_html($ru?'10 лет практического опыта команды.':'10 років практичного досвіду команди.');?></em></h2>
    <p class="hs-trust-lead"><?php echo esc_html($intro);?></p>
    <p><?php echo esc_html($detail);?></p>
    <div class="hs-trust-actions"><a class="hs-trust-proof" href="<?php echo esc_url($proof);?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($ru?'Проверить партнёрство на сайте Хорошоп':'Перевірити партнерство на сайті Хорошоп');?> <span aria-hidden="true">↗</span></a><a class="hs-trust-contact" href="<?php echo esc_url(mrseo_url('contact',mrseo_locale()));?>"><?php echo esc_html($ru?'Обсудить свой магазин':'Обговорити свій магазин');?> <span aria-hidden="true">↗</span></a></div>
   </div>
  </div>
 </section>
 <?php
}
