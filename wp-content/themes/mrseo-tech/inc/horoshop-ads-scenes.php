<?php
/** Three distinct, illustrative, lightweight Horoshop Ads scenes. No account data. */
if(!defined('ABSPATH'))exit;
function mrseo_hs_paid_scene($key){
 if(!in_array($key,array('search-ads','shopping','pmax'),true))return;
 $labels=array(
  'search-ads'=>array('ПОШУКОВА КАМПАНІЯ','Від запиту до потрібної категорії','Запит → оголошення → сторінка товару. Показуємо, як прибрати зайві переходи і спрямувати покупця до потрібного асортименту.'),
  'shopping'=>array('ТОВАРНА ВИДАЧА','Товарна картка має відповідати магазину','Google звіряє дані фіда з інформацією на сайті. Важливі назва, актуальна ціна, наявність і коректне посилання.'),
  'pmax'=>array('АВТОМАТИЗОВАНА РЕКЛАМА','Одна система, кілька рекламних каналів','Performance Max використовує товарні дані, рекламні матеріали та сигнали покупок. Контроль починається з якості даних і конверсій.')
 );
 $m=$labels[$key];
 ?>
 <section class="hs-ads-journey hs-ads-journey--<?php echo esc_attr($key);?>" aria-labelledby="hs-ads-journey-title">
  <div class="hs-premium-wrap hs-ads-journey-grid">
   <div class="hs-ads-journey-copy">
    <span class="hs-premium-eyebrow"><?php echo esc_html($m[0]);?></span>
    <h2 id="hs-ads-journey-title"><?php echo esc_html($m[1]);?></h2>
    <p><?php echo esc_html($m[2]);?></p>
    <span class="hs-ads-journey-disclaimer">Схема для пояснення процесу, не статистика рекламного акаунта.</span>
    <a class="hs-premium-textlink" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити рекламну задачу <span aria-hidden="true">↗</span></a>
   </div>
   <div class="hs-ads-demo" aria-label="<?php echo esc_attr($m[1]);?>" role="img">
    <div class="hs-ads-demo-header"><span class="hs-ads-demo-dots" aria-hidden="true">● ● ●</span><span>HOROSHOP / GOOGLE ADS</span><span>DEMO</span></div>
    <?php if($key==='search-ads'):?>
     <div class="hs-ads-search-preview" aria-hidden="true">
      <div class="hs-ads-search-query"><span class="hs-ads-search-icon"></span><span>купити товар онлайн</span><span class="hs-ads-search-cursor"></span></div>
      <div class="hs-ads-search-result">
       <span class="hs-ads-search-mark">Реклама · ваш магазин</span>
       <strong>Товари з доставкою — магазин на Хорошоп</strong>
       <span>Знайдіть потрібну категорію та перевірте наявність товару.</span>
       <div class="hs-ads-search-link"><i></i><span>Категорія товарів</span><b>↗</b></div>
      </div>
      <div class="hs-ads-search-filters"><span>Комерційний запит</span><span>Мінус-слова</span><span>Сторінка категорії</span></div>
     </div>
    <?php elseif($key==='shopping'):?>
     <div class="hs-ads-shopping-preview" aria-hidden="true">
      <div class="hs-ads-shopping-status"><span class="hs-ads-shopping-activity"></span><span>Товарні дані → Google Merchant Center</span></div>
      <div class="hs-ads-shopping-products">
       <div class="hs-ads-shopping-card"><div class="hs-ads-shopping-item hs-ads-shopping-item--one"><i></i><b></b></div><strong>Товар 01</strong><span>Ціна та наявність</span><small>Дані перевірено</small></div>
       <div class="hs-ads-shopping-card"><div class="hs-ads-shopping-item hs-ads-shopping-item--two"><i></i><b></b></div><strong>Товар 02</strong><span>Назва й атрибути</span><small>Дані перевірено</small></div>
       <div class="hs-ads-shopping-card"><div class="hs-ads-shopping-item hs-ads-shopping-item--three"><i></i><b></b></div><strong>Товар 03</strong><span>Посилання на сайт</span><small>Дані перевірено</small></div>
      </div>
      <div class="hs-ads-shopping-flow"><span>Хорошоп</span><i></i><span>Фід товарів</span><i></i><span>Google Shopping</span></div>
     </div>
    <?php else:?>
     <div class="hs-ads-pmax-preview" aria-hidden="true">
      <div class="hs-ads-pmax-center"><div class="hs-ads-pmax-ring"></div><span>Performance<br>Max</span><i></i></div>
      <div class="hs-ads-pmax-channels">
       <div class="hs-ads-pmax-channel"><span>01</span><strong>Пошук</strong></div>
       <div class="hs-ads-pmax-channel"><span>02</span><strong>Shopping</strong></div>
       <div class="hs-ads-pmax-channel"><span>03</span><strong>Відео та інші</strong></div>
      </div>
      <div class="hs-ads-pmax-bottom"><span>Фід і матеріали</span><span class="hs-ads-pmax-bridge"></span><span>Покупки та цінність</span></div>
     </div>
    <?php endif;?>
   </div>
  </div>
 </section>
 <?php
}
