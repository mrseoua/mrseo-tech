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
