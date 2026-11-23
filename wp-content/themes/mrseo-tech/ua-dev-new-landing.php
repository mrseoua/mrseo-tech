<?php
/** Premium Ukrainian-only landing, original page-specific technology scene. */
if(!defined('ABSPATH'))exit;
if(!mrseo_ua_dev_new_route()||!($p=mrseo_ua_dev_new_page())){
 status_header(404);include get_404_template();return;
}
$scene=$p['scene'];
// Storyboard describes a real workflow, not fabricated client results.
$motion_stages=array(
 'portal'=>array('Авторизація','Дані клієнта','Оновлення статусу'),
 'parsing'=>array('Джерело даних','Зіставлення полів','Оновлення каталогу'),
 'payment'=>array('Створення платежу','Підтвердження банку','Статус замовлення'),
 'mobile'=>array('Відкрити сервіс','Виконати дію','Отримати сповіщення'),
 'shop'=>array('Вибір товару','Кошик і оплата','Статус замовлення'),
 'team'=>array('Нове завдання','Робота команди','Звіт і синхронізація'),
 'pwa'=>array('Відкрити браузер','Встановити PWA','Доступ до даних')
);
get_header();
?>
<main class="udv-page udv-page--<?php echo esc_attr($scene);?>" id="main-content">
 <section class="udv-hero" aria-labelledby="udv-h1">
  <div class="container udv-hero-grid">
   <div class="udv-hero-copy">
    <nav class="udv-crumbs" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url('', 'uk'));?>">Головна</a><span aria-hidden="true">/</span><a href="<?php echo esc_url(mrseo_url('web-development','uk'));?>">Веброзробка</a><span aria-hidden="true">/</span><span><?php echo esc_html($p['title']);?></span></nav>
    <span class="udv-eyebrow"><?php echo esc_html($p['tag']);?></span>
    <h1 id="udv-h1"><?php echo esc_html($p['title']);?></h1>
    <p class="udv-hero-promise"><?php echo esc_html($p['highlight']);?></p>
    <p class="udv-lead"><?php echo esc_html($p['intro']);?></p>
    <div class="udv-actions"><a class="udv-cta" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити розробку <span aria-hidden="true">↗</span></a><a class="udv-text-cta" href="#udv-problems">Що вирішуємо <span aria-hidden="true">↓</span></a></div>
    <span class="udv-disclaimer">Склад робіт і технології визначаємо після аналізу задачі.</span>
   </div>
   <div class="udv-visual-wrap">
    <div class="udv-visual udv-visual--<?php echo esc_attr($scene);?>" data-udv-scene="<?php echo esc_attr($scene);?>" data-udv-step="0" role="group" aria-label="<?php echo esc_attr('Демонстрація процесу: '.$p['title'].'. Не клієнтський кейс.');?>">
     <div class="udv-console-header" aria-hidden="true"><span class="udv-console-lights"><i></i><i></i><i></i></span><span>MRSEO / <?php echo esc_html($p['tag']);?></span><span class="udv-console-state">● SYSTEM</span></div>
     <?php if($scene==='portal'):?>
      <div class="udv-art udv-art--portal" aria-hidden="true"><div class="udv-avatar"><span>●</span><strong>КАБІНЕТ КЛІЄНТА</strong><small>Персональний доступ</small></div><div class="udv-art-panel"><span>Мої замовлення <b>03</b></span><span>Документи <b>04</b></span><span>Звернення <b>01</b></span><div class="udv-status">Статус оновлено <i>✓</i></div></div><div class="udv-art-key">РОЛІ · ДОСТУП · ДАНІ</div><div class="udv-scene-chip udv-scene-chip--portal"><span class="udv-scene-beacon"></span><span>Доступ підтверджено</span></div></div>
     <?php elseif($scene==='parsing'):?>
      <div class="udv-art udv-art--parsing" aria-hidden="true"><div class="udv-source"><strong>ДЖЕРЕЛА</strong><span>API</span><span>CSV</span><span>ПРАЙС</span></div><div class="udv-data-flow"><span>→</span><b>ЗІСТАВЛЕННЯ</b><span>→</span><i class="udv-packet udv-packet--one"></i><i class="udv-packet udv-packet--two"></i></div><div class="udv-target"><strong>КАТАЛОГ</strong><div><i>SKU</i><i>ЦІНА</i><i>ЗАЛИШОК</i></div><span class="udv-target-verified">✓ Перевірено</span><span class="udv-data-progress"><i></i></span></div></div>
     <?php elseif($scene==='payment'):?>
      <div class="udv-art udv-art--payment" aria-hidden="true"><div class="udv-checkout"><small>ЗАМОВЛЕННЯ</small><strong>Оплата онлайн</strong><span>Захищений перехід ↗</span></div><div class="udv-pay-bridge">↔<small>API</small></div><div class="udv-checkout udv-checkout--status"><small>ПІДТВЕРДЖЕННЯ</small><strong>Статус отримано</strong><span>✓ Перевірка повідомлення</span></div><div class="udv-art-foot">PAYMENT → CALLBACK → ORDER</div><div class="udv-transaction-signal" aria-hidden="true"><span class="udv-transaction-point"></span><span class="udv-transaction-line"><i></i></span><span class="udv-transaction-point"></span></div></div>
     <?php elseif($scene==='mobile'):?>
      <div class="udv-art udv-art--mobile" aria-hidden="true"><div class="udv-phone"><span class="udv-phone-notch"></span><small>ВАШ СЕРВІС</small><strong>Вітаємо</strong><div class="udv-phone-big"><span>01</span><b>Мої завдання</b></div><div class="udv-phone-notification">● Нове сповіщення</div><div class="udv-phone-rows"><i></i><i></i><i></i></div><div class="udv-phone-dock"><span>⌂</span><span>◉</span><span>☷</span></div></div><div class="udv-mobile-tags"><span>iOS</span><span>Android</span><span>API</span></div></div>
     <?php elseif($scene==='shop'):?>
      <div class="udv-art udv-art--shop" aria-hidden="true"><div class="udv-phone"><span class="udv-phone-notch"></span><small>ВАШ МАГАЗИН</small><strong>Каталог товарів</strong><div class="udv-shop-grid"><span><i></i><b>Товар A</b></span><span><i></i><b>Товар B</b></span></div><div class="udv-shop-cart">Кошик <b>2 товари →</b></div><div class="udv-shop-receipt">✓ Замовлення створено</div></div><div class="udv-mobile-tags"><span>КАТАЛОГ</span><span>CRM</span><span>ОПЛАТА</span></div></div>
     <?php elseif($scene==='team'):?>
      <div class="udv-art udv-art--team" aria-hidden="true"><div class="udv-task-head"><strong>ЗАВДАННЯ КОМАНДИ</strong><span>● СИНХРОНІЗОВАНО</span></div><div class="udv-task-row"><span>01</span><div><strong>Виїзд до клієнта</strong><small>Технічний спеціаліст</small></div><b>В РОБОТІ</b></div><div class="udv-task-row"><span>02</span><div><strong>Погодження заявки</strong><small>Керівник зміни</small></div><b>ГОТОВО</b></div><div class="udv-task-row"><span>03</span><div><strong>Звіт по роботі</strong><small>Додати фото</small></div><b>НОВЕ</b></div><div class="udv-sync-indicator"><i></i> Статуси синхронізовано</div></div>
     <?php else:?>
      <div class="udv-art udv-art--pwa" aria-hidden="true"><div class="udv-pwa-browser"><div class="udv-pwa-toolbar">◉ <span>app.example</span> <i>⌄</i></div><div class="udv-pwa-content"><small>ВСТАНОВЛЮВАНИЙ ВЕБЗАСТОСУНОК</small><strong>Потрібне поруч</strong><div class="udv-pwa-tiles"><span>Дані</span><span>Заявки</span></div><span class="udv-pwa-offline">✓ Доступні локальні дані</span><span class="udv-pwa-install">↓ Встановити застосунок</span></div></div><div class="udv-mobile-tags"><span>PWA</span><span>CACHE</span><span>OFFLINE</span></div></div>
     <?php endif;?>
     <div class="udv-storyboard" aria-hidden="true">
      <?php foreach($motion_stages[$scene] as $step=>$title):?>
       <div class="udv-story-step<?php echo $step===0?' is-current':'';?>" data-udv-stage="<?php echo (int)$step;?>"><span class="udv-story-number"><?php echo esc_html(sprintf('%02d',$step+1));?></span><span class="udv-story-name"><?php echo esc_html($title);?></span></div>
      <?php endforeach;?>
     </div>
     <div class="udv-console-footer"><span>СХЕМА РІШЕННЯ · НЕ КЛІЄНТСЬКИЙ КЕЙС</span><button type="button" class="udv-motion-toggle" aria-pressed="false" aria-label="Призупинити демонстрацію">Пауза <span aria-hidden="true">Ⅱ</span></button></div>
    </div>
    <div class="udv-caption">Кожен проєкт має власну логіку — без універсальних шаблонів.</div>
   </div>
  </div>
 </section>
 <section class="udv-section udv-section--problems" id="udv-problems" aria-labelledby="udv-problems-h">
  <div class="container"><div class="udv-heading"><span class="udv-eyebrow">01 / ПРОБЛЕМА</span><h2 id="udv-problems-h"><?php echo esc_html($p['h1']);?></h2><p>Визначаємо, де саме бізнес втрачає час, дані або контроль над процесом.</p></div>
   <div class="udv-cards"><?php foreach($p['problems'] as $i=>$item):?><article class="udv-card"><span class="udv-count"><?php echo esc_html(sprintf('%02d',$i+1));?></span><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></article><?php endforeach;?></div>
  </div>
 </section>
 <section class="udv-section udv-section--solution" aria-labelledby="udv-solutions-h">
  <div class="container"><div class="udv-heading"><span class="udv-eyebrow">02 / РІШЕННЯ</span><h2 id="udv-solutions-h">Що зробимо для вашого бізнесу</h2><p>Працюємо з конкретними сценаріями, доступами й перевіркою результату.</p></div>
   <div class="udv-steps"><?php foreach($p['actions'] as $i=>$item):?><article class="udv-step"><span class="udv-count"><?php echo esc_html(sprintf('%02d',$i+1));?></span><div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></div></article><?php endforeach;?></div>
   <div class="udv-result"><span class="udv-eyebrow">КОНКРЕТНИЙ РЕЗУЛЬТАТ</span><p><?php echo esc_html($p['result']);?></p></div>
  </div>
 </section>
 <section class="udv-section udv-section--faq" aria-labelledby="udv-faq-h">
  <div class="container udv-faq-grid"><div class="udv-heading"><span class="udv-eyebrow">03 / ПЕРЕД СТАРТОМ</span><h2 id="udv-faq-h">Що варто знати</h2><p>Без універсальних цін і обіцянок: обсяг залежить від ваших систем та вимог.</p></div><div class="udv-faq-list"><?php foreach($p['faq'] as $item):?><details><summary><?php echo esc_html($item[0]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($item[1]);?></p></details><?php endforeach;?></div></div>
 </section>
 <section class="udv-section udv-section--close" aria-labelledby="udv-close-h"><div class="container udv-close-grid"><div><span class="udv-eyebrow">ОБГОВОРІМО ЗАДАЧУ</span><h2 id="udv-close-h">Рішення має працювати. <em>А не просто виглядати технологічно.</em></h2><p><?php echo esc_html($p['cta']);?></p><a href="<?php echo esc_url(mrseo_url('contact','uk'));?>" class="udv-cta udv-cta--light">Обговорити проєкт <span aria-hidden="true">↗</span></a></div><div class="udv-related"><strong>Пов’язані послуги</strong><?php foreach($p['related'] as $item):?><a href="<?php echo esc_url(mrseo_url($item[0],'uk'));?>"><?php echo esc_html($item[1]);?><span aria-hidden="true">↗</span></a><?php endforeach;?><a href="<?php echo esc_url(mrseo_url('web-development','uk'));?>">Усі напрями веброзробки <span aria-hidden="true">↗</span></a></div></div></section>
</main>
<?php get_footer(); ?>
