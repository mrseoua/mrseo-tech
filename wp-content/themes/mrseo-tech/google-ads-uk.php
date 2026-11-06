<?php
/** Ukrainian-only premium Google Ads page. Other locales and services unchanged. */
if (!defined('ABSPATH')) exit;
if(mrseo_locale()==='uk')require_once get_template_directory().'/inc/ua-commercial-visuals.php';
require_once get_template_directory().'/inc/ua-google-ads-3d.php';
get_header();
?>
<div class="ukseo ukseo--ads" id="main-content">
 <section class="ukseo-hero" aria-labelledby="ukads-title">
  <div class="container ukseo-hero-grid">
   <div class="ukseo-hero-copy">
    <nav class="ukseo-crumbs" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url()); ?>">Головна</a><span aria-hidden="true">/</span><span>Google Ads</span></nav>
    <div class="ukseo-kicker">НАЛАШТУВАННЯ ТА ВЕДЕННЯ GOOGLE ADS</div>
    <h1 id="ukads-title">Реклама витрачає бюджет. <em>А чи приносить вона вигідні замовлення?</em></h1>
    <p class="ukseo-hero-lead">Кліки самі по собі не оплачують рекламу. Перевіряємо, чи правильно враховуються заявки й покупки, які кампанії та товари отримують бюджет і що реально відомо про їхню окупність. Лише після цього пропонуємо зміни.</p>
    <div class="ukseo-actions">
     <a class="ukseo-button ukseo-button-dark" href="<?php echo esc_url(mrseo_url('contact')); ?>">Розібрати мою рекламу <span aria-hidden="true">↗</span></a>
     <a class="ukseo-text-link" href="#ukads-problems">Звідки беруться втрати <span aria-hidden="true">↓</span></a>
    </div>
    <p class="ukseo-hero-foot">Google Ads · Пошук · Shopping · Performance Max · вимірювання конверсій.</p>
   </div>
   <div class="ukseo-hero-art">
    <?php mrseo_render_motion_scene('google-ads'); ?>
    <div class="ukseo-visual-caption"><span class="ukseo-visual-caption-mark">01 / РЕКЛАМА</span><span>Витрати → перевірена конверсія → рішення</span></div>
   </div>
  </div>
 </section>
 <section class="ukseo-cases" id="ukads-problems" aria-labelledby="ukads-problems-title">
  <div class="container">
   <div class="ukseo-section-head">
    <div><span class="ukseo-kicker">ДЕ БІЗНЕС ВТРАЧАЄ ГРОШІ</span><h2 id="ukads-problems-title">Три проблеми, які не видно за кількістю кліків.</h2></div>
    <p>Знаходимо причину, а не просто змінюємо налаштування рекламного кабінету.</p>
   </div>
   <div class="ukseo-problem-grid">
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">01 <span aria-hidden="true">◎</span></div>
     <h3>Дані не збігаються</h3>
     <p>У Google Ads є продажі, а в магазині чи CRM — інші цифри.</p>
     <div class="ukseo-card-diagnosis"><span>Перевіряємо</span><strong>Конверсії, дублікати та суми замовлень.</strong></div>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">02 <span aria-hidden="true">↗</span></div>
     <h3>Бюджет іде не туди</h3>
     <p>Кампанії приносять дохід, але маржа товарів або вартість заявки не підходять бізнесу.</p>
     <div class="ukseo-card-diagnosis"><span>Перевіряємо</span><strong>Витрати, пріоритети й економіку продажів.</strong></div>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">03 <span aria-hidden="true">◇</span></div>
     <h3>Зміни без системи</h3>
     <p>Кампанії постійно коригують, але ніхто не може пояснити, що саме спрацювало.</p>
     <div class="ukseo-card-diagnosis"><span>Перевіряємо</span><strong>Історію змін та критерії оцінки.</strong></div>
    </article>
   </div>
  </div>
 </section>
 <?php mrseo_render_ua_commercial_visual('google-ads','journey'); ?>
 <section class="ukads-pricing" id="ukads-pricing" aria-labelledby="ukads-pricing-title">
  <div class="container">
   <div class="ukseo-section-head ukads-pricing-heading">
    <div><span class="ukseo-kicker">ВАРТІСТЬ GOOGLE ADS</span><h2 id="ukads-pricing-title">Зрозумілі умови. <em>Без прихованого рекламного бюджету.</em></h2></div>
    <p>Дві стартові пропозиції. Оплата нашої роботи й витрати на рекламу в Google — різні платежі.</p>
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
     <p class="ukads-price-lead">Для послуг, локального бізнесу та невеликих рекламних кампаній.</p>
     <div class="ukads-price-cost"><span>ВЕДЕННЯ ВІД</span><strong>7 900 <small>₴/міс.</small></strong></div>
     <div class="ukads-price-setup">Налаштування окремо — <strong>від 5 900 ₴</strong></div>
     <ul>
      <li>Перевірка конверсій і поточного акаунта</li>
      <li>Ведення пошукових кампаній</li>
      <li>Контроль витрат і рекомендації щодо сайту</li>
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
     <p class="ukads-price-lead">Для товарних кампаній, Merchant Center і Performance Max.</p>
     <div class="ukads-price-cost"><span>ВЕДЕННЯ ВІД</span><strong>12 900 <small>₴/міс.</small></strong></div>
     <div class="ukads-price-setup">Налаштування окремо — <strong>від 9 500 ₴</strong></div>
     <ul>
      <li>Перевірка фіда, товарів і конверсій</li>
      <li>Керування Shopping та Performance Max</li>
      <li>Пріоритети асортименту й контроль ефективності</li>
     </ul>
     <a href="<?php echo esc_url(mrseo_url('contact'));?>" class="ukads-price-link">Обговорити магазин <span aria-hidden="true">↗</span></a>
    </article>
   </div>
   <div class="ukads-pricing-footer">
    <div class="ukads-budget-coin" aria-hidden="true"><span>₴</span></div>
    <div><strong>Рекламний бюджет оплачується безпосередньо Google.</strong><p>Ціни наведено як стартові. Точна пропозиція залежить від кількості кампаній, цілей і складності робіт. Що входить у ведення — погоджуємо до початку.</p></div>
   </div>
  </div>
 </section>
 <section class="ukseo-work ukads-decision" aria-labelledby="ukads-process-title">
  <div class="container">
   <div class="ukseo-section-head">
    <div><span class="ukseo-kicker">ЯК МИ ПРАЦЮЄМО</span><h2 id="ukads-process-title">Спочатку перевірка. <em>Потім рішення.</em></h2></div>
    <p>Чотири короткі етапи — кожен зі зрозумілим результатом.</p>
   </div>
   <ol class="ukseo-steps ukads-steps">
    <li><div class="ukseo-step-index">01</div><div><h3>Визначаємо ціль</h3><p>Які заявки, продажі та витрати мають сенс для бізнесу.</p></div><strong>Критерії ефективності</strong></li>
    <li><div class="ukseo-step-index">02</div><div><h3>Перевіряємо дані</h3><p>Зіставляємо Ads, GA4 і доступні замовлення.</p></div><strong>Причини розбіжностей</strong></li>
    <li><div class="ukseo-step-index">03</div><div><h3>Плануємо зміни</h3><p>Визначаємо, що виправити й протестувати спочатку.</p></div><strong>Пріоритетний план</strong></li>
    <li><div class="ukseo-step-index">04</div><div><h3>Контролюємо ефект</h3><p>Перевіряємо результат з урахуванням затримок конверсій.</p></div><strong>Наступне рішення</strong></li>
   </ol>
   <div class="ukads-flow-plate" aria-hidden="true">
    <div class="ukads-flow-track"></div>
    <div class="ukads-flow-node"><span>01</span><strong>Ціль</strong><b>◎</b></div>
    <div class="ukads-flow-node"><span>02</span><strong>Дані</strong><b>▦</b></div>
    <div class="ukads-flow-node"><span>03</span><strong>План</strong><b>↗</b></div>
    <div class="ukads-flow-node"><span>04</span><strong>Контроль</strong><b>✓</b></div>
   </div>
  </div>
 </section>
 <?php mrseo_render_ua_commercial_visual('google-ads','decisions'); ?>
 <section class="ukseo-delivery ukads-deliver" aria-labelledby="ukads-deliver-title">
  <div class="container ukseo-delivery-grid">
   <div><span class="ukseo-kicker">ЩО ОТРИМУЄТЕ</span><h2 id="ukads-deliver-title">Не перелік правок. <em>Зрозумілу систему рішень.</em></h2><p>Показуємо, що знайшли, що змінюємо й за якими даними перевірятимемо ефект.</p></div>
   <div class="ukseo-delivery-list">
    <div><span aria-hidden="true">01</span><div><h3>Діагностика</h3><p>Що заважає рекламі працювати ефективно.</p></div></div>
    <div><span aria-hidden="true">02</span><div><h3>План дій</h3><p>Що змінити насамперед і чому.</p></div></div>
    <div><span aria-hidden="true">03</span><div><h3>Прозорий контроль</h3><p>Як оцінюємо результати та наступні кроки.</p></div></div>
   </div>
  </div>
 </section>
 <?php mrseo_ua_ads_depth_scene('deliverables'); ?>
 <section class="ukseo-faq" aria-labelledby="ukads-faq-title">
  <div class="container ukseo-faq-grid">
   <div><span class="ukseo-kicker">КОРОТКО ПРО ВАЖЛИВЕ</span><h2 id="ukads-faq-title">Перед початком роботи.</h2><p>Три відповіді без маркетингових обіцянок.</p></div>
   <div class="ukseo-faq-items">
    <details><summary>Чи треба перезапускати рекламу?<span aria-hidden="true">+</span></summary><p>Не обов’язково. Спочатку перевіряємо діючі кампанії та історію змін. Перезапуск пропонуємо лише за потреби.</p></details>
    <details><summary>ROAS означає прибуток?<span aria-hidden="true">+</span></summary><p>Ні. ROAS співвідносить цінність конверсій із витратами на рекламу, але не враховує автоматично собівартість, доставку та повернення.</p></details>
    <details><summary>Що потрібно для старту?<span aria-hidden="true">+</span></summary><p>Адреса сайту, цілі бізнесу та погоджені доступи до рекламного кабінету й аналітики. Паролі через форму не надсилайте.</p></details>
   </div>
  </div>
 </section>
 <section class="ukseo-final ukads-final" aria-labelledby="ukads-final-title">
  <div class="container ukseo-final-grid">
   <div><span class="ukseo-kicker">НАСТУПНИЙ КРОК</span><h2 id="ukads-final-title">Реклама вже працює? <em>Знайдімо, де губляться гроші.</em></h2><p>Надішліть адресу сайту й коротко опишіть ситуацію. Почнемо з того, що потрібно перевірити.</p></div>
   <div class="ukads-final-action">
    <div class="ukads-final-seal" aria-hidden="true"><span>АНАЛІЗ</span><strong>→</strong><span>РІШЕННЯ</span><i>✓</i></div>
    <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити рекламу <span aria-hidden="true">↗</span></a>
   </div>
  </div>
 </section>
</div>
<?php get_footer(); ?>
