<?php
/** Ukrainian-only premium Google Ads page. Other locales and services unchanged. */
if (!defined('ABSPATH')) exit;
if(mrseo_locale()==='uk')require_once get_template_directory().'/inc/ua-commercial-visuals.php';
get_header();
?>
<div class="ukseo ukseo--ads" id="main-content">
 <section class="ukseo-hero" aria-labelledby="ukads-title">
  <div class="container ukseo-hero-grid">
   <div class="ukseo-hero-copy">
    <nav class="ukseo-crumbs" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url()); ?>">Головна</a><span aria-hidden="true">/</span><span>Google Ads</span></nav>
    <div class="ukseo-kicker">НАЛАШТУВАННЯ ТА ВЕДЕННЯ GOOGLE ADS</div>
    <h1 id="ukads-title">Реклама витрачає гроші. <em>А заявок і продажів мало?</em></h1>
    <p class="ukseo-hero-lead">Перевіримо, за які пошукові фрази списуються гроші, чи правильно рахуються заявки та які кампанії витрачають бюджет без зрозумілого результату.</p>
    <div class="ukseo-actions">
     <a class="ukseo-button ukseo-button-dark" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити мою рекламу <span aria-hidden="true">↗</span></a>
     <a class="ukseo-text-link" href="#ukads-problems">Упізнати свою проблему <span aria-hidden="true">↓</span></a>
    </div>
    <p class="ukseo-hero-foot">Пошук · Shopping · Performance Max</p>
   </div>
   <div class="ukseo-hero-art">
    <?php mrseo_render_motion_scene('google-ads'); ?>
    <div class="ukseo-visual-caption"><span class="ukseo-visual-caption-mark">GOOGLE ADS</span><span>Витрати → заявки → рішення</span></div>
   </div>
  </div>
 </section>
 <section class="ukseo-cases" id="ukads-problems" aria-labelledby="ukads-problems-title">
  <div class="container">
   <div class="ukseo-section-head">
    <div><span class="ukseo-kicker">ЗНАЙОМІ СИТУАЦІЇ?</span><h2 id="ukads-problems-title">Куди зникають <em>гроші на рекламу?</em></h2></div>
   </div>
   <div class="ukseo-problem-grid">
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">01 <span aria-hidden="true">↗</span></div>
     <h3>Кліки є. Заявок немає.</h3>
     <p>Бюджет витрачається на переходи, а дзвінків і форм із сайту майже немає.</p>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">02 <span aria-hidden="true">₴</span></div>
     <h3>Продажі є. Прибутку немає.</h3>
     <p>Замовлення приходять, але реклама забирає надто багато грошей.</p>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">03 <span aria-hidden="true">◎</span></div>
     <h3>Звіти не збігаються.</h3>
     <p>Google рахує продажі, а в магазині цих замовлень немає або їх менше.</p>
    </article>
   </div>
  </div>
 </section>
 <section class="ukads-pricing" id="ukads-pricing" aria-labelledby="ukads-pricing-title">
  <div class="container">
   <div class="ukseo-section-head ukads-pricing-heading">
    <div><span class="ukseo-kicker">ВАРТІСТЬ GOOGLE ADS</span><h2 id="ukads-pricing-title">Скільки коштує <em>Google Ads?</em></h2></div>
    <p>Окремо оплачуєте нашу роботу та рекламний бюджет у Google.</p>
   </div>
   <div class="ukads-price-grid">
    <article class="ukads-price-card ukads-price-card--search">
     <div class="ukads-price-top"><span>01 / ПОШУКОВА РЕКЛАМА</span><span aria-hidden="true">↗</span></div>
     <div class="ukads-price-glyph" aria-hidden="true">
      <span class="ukads-price-planet ukads-price-planet--search">⌕</span>
      <span class="ukads-price-chip ukads-price-chip--one">Запит</span>
      <span class="ukads-price-chip ukads-price-chip--two">Заявка ✓</span>
      <span class="ukads-price-path"></span>
     </div>
     <h3>Google Ads Start</h3>
     <p class="ukads-price-lead">Для бізнесу, якому потрібні дзвінки та заявки з Google.</p>
     <div class="ukads-price-cost"><span>ЩОМІСЯЦЯ ЗА ВЕДЕННЯ ВІД</span><strong>5 000 <small>₴/міс.</small></strong></div>
     <div class="ukads-price-setup">Разове налаштування — <strong>від 5 900 ₴</strong></div>
     <ul>
      <li>Перевірка заявок і конверсій</li>
      <li>Налаштування та ведення пошукових кампаній</li>
      <li>Контроль витрат і зрозумілі звіти</li>
     </ul>
     <a href="<?php echo esc_url(mrseo_url('contact'));?>" class="ukads-price-link">Обговорити рекламу <span aria-hidden="true">↗</span></a>
    </article>
    <article class="ukads-price-card ukads-price-card--commerce">
     <div class="ukads-price-top"><span>02 / ІНТЕРНЕТ-МАГАЗИНИ</span><span aria-hidden="true">↗</span></div>
     <div class="ukads-price-glyph" aria-hidden="true">
      <span class="ukads-price-planet ukads-price-planet--commerce">▦</span>
      <span class="ukads-price-chip ukads-price-chip--one">Каталог</span>
      <span class="ukads-price-chip ukads-price-chip--two">Покупка ✓</span>
      <span class="ukads-price-path"></span>
     </div>
     <h3>Shopping + PMax</h3>
     <p class="ukads-price-lead">Для магазинів, які хочуть продавати товари через Google.</p>
     <div class="ukads-price-cost"><span>ЩОМІСЯЦЯ ЗА ВЕДЕННЯ ВІД</span><strong>10 000 <small>₴/міс.</small></strong></div>
     <div class="ukads-price-setup">Разове налаштування — <strong>від 9 500 ₴</strong></div>
     <ul>
      <li>Перевірка Merchant Center і товарного фіда</li>
      <li>Ведення Shopping і Performance Max</li>
      <li>Аналіз продажів і витрат на товари</li>
     </ul>
     <a href="<?php echo esc_url(mrseo_url('contact'));?>" class="ukads-price-link">Обговорити магазин <span aria-hidden="true">↗</span></a>
    </article>
   </div>
   <div class="ukads-pricing-footer">
    <div class="ukads-budget-coin" aria-hidden="true"><span>₴</span></div>
    <div><strong>Рекламний бюджет сплачуєте Google окремо.</strong><p>Налаштування — разово, ведення — щомісяця. Обсяг робіт і точну ціну погоджуємо до старту.</p></div>
   </div>
  </div>
 </section>
 <?php mrseo_render_ua_commercial_visual('google-ads','decisions'); ?>
 <section class="ukseo-faq" aria-labelledby="ukads-faq-title">
  <div class="container ukseo-faq-grid">
   <div><span class="ukseo-kicker">КОРОТКО ПРО ВАЖЛИВЕ</span><h2 id="ukads-faq-title">Що потрібно <em>знати?</em></h2></div>
   <div class="ukseo-faq-items">
    <details><summary>Чи доведеться запускати рекламу з нуля?<span aria-hidden="true">+</span></summary><p>Не обов’язково. Спочатку перевіряємо наявні кампанії та зберігаємо те, що працює.</p></details>
    <details><summary>Як визначити, чи реклама вигідна?<span aria-hidden="true">+</span></summary><p>Дивимося на заявки, продажі та витрати. Для магазинів враховуємо собівартість: сам по собі ROAS не показує чистий прибуток.</p></details>
    <details><summary>Що потрібно для початку?<span aria-hidden="true">+</span></summary><p>Адреса сайту й опис проблеми. Доступи до Google Ads попросимо за потреби — паролі надсилати не потрібно.</p></details>
   </div>
  </div>
 </section>
 <section class="ukseo-final ukads-final" aria-labelledby="ukads-final-title">
  <div class="container ukseo-final-grid">
   <div><span class="ukseo-kicker">ОБГОВОРІМО ВАШУ РЕКЛАМУ</span><h2 id="ukads-final-title">Бюджет витрачається. <em>З’ясуймо, що заважає результату.</em></h2><p>Надішліть адресу сайту та коротко опишіть проблему. Почнемо з неї.</p></div>
   <div class="ukads-final-action">
    <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити рекламу <span aria-hidden="true">↗</span></a>
   </div>
  </div>
 </section>
</div>
<?php get_footer(); ?>
