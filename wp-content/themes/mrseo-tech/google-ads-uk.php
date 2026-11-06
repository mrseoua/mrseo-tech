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
    <div><span class="ukseo-kicker">ДЕ БІЗНЕС ВТРАЧАЄ ГРОШІ</span><h2 id="ukads-problems-title">Чому реклама витрачає гроші, але не дає потрібного результату?</h2></div>
    <p>Показуємо, де губляться заявки, які кампанії витрачають зайві гроші та що варто виправити.</p>
   </div>
   <div class="ukseo-problem-grid">
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">01 <span aria-hidden="true">◎</span></div>
     <h3>Дані не збігаються</h3>
     <p>Рекламний кабінет показує заявки або покупки, яких ви не бачите у своїх замовленнях.</p>
     <div class="ukseo-card-diagnosis"><span>Перевіряємо</span><strong>Чи правильно рахуються заявки, покупки та їхня вартість.</strong></div>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">02 <span aria-hidden="true">↗</span></div>
     <h3>Бюджет іде не туди</h3>
     <p>Продажі є, але після витрат на рекламу й товар прибутку може майже не залишитися.</p>
     <div class="ukseo-card-diagnosis"><span>Перевіряємо</span><strong>Які товари й запити приносять продажі, а які лише витрачають бюджет.</strong></div>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">03 <span aria-hidden="true">◇</span></div>
     <h3>Зміни без системи</h3>
     <p>Рекламу часто переналаштовують, але не перевіряють, чи допомогла попередня зміна.</p>
     <div class="ukseo-card-diagnosis"><span>Перевіряємо</span><strong>Що змінювали, навіщо та як вимірювали результат.</strong></div>
    </article>
   </div>
  </div>
 </section>
 <?php mrseo_render_ua_commercial_visual('google-ads','journey'); ?>
 <section class="ukads-pricing" id="ukads-pricing" aria-labelledby="ukads-pricing-title">
  <div class="container">
   <div class="ukseo-section-head ukads-pricing-heading">
    <div><span class="ukseo-kicker">ВАРТІСТЬ GOOGLE ADS</span><h2 id="ukads-pricing-title">Скільки коштує <em>налаштування та ведення реклами?</em></h2></div>
    <p>Ви платите нам за налаштування й ведення. Бюджет на кліки та покази поповнюєте у Google окремо.</p>
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
     <p class="ukads-price-lead">Для компаній, яким потрібні заявки або дзвінки з пошуку Google.</p>
     <div class="ukads-price-cost"><span>ЩОМІСЯЦЯ ЗА ВЕДЕННЯ ВІД</span><strong>5 000 <small>₴/міс.</small></strong></div>
     <div class="ukads-price-setup">Разове налаштування — <strong>від 5 900 ₴</strong></div>
     <ul>
      <li>Перевіряємо, чи правильно рахуються заявки</li>
      <li>Налаштовуємо й ведемо рекламу в пошуку Google</li>
      <li>Стежимо за витратами й підказуємо, що поліпшити на сайті</li>
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
     <p class="ukads-price-lead">Для магазинів, які хочуть рекламувати товари в Google й розуміти, які з них продаються.</p>
     <div class="ukads-price-cost"><span>ЩОМІСЯЦЯ ЗА ВЕДЕННЯ ВІД</span><strong>10 000 <small>₴/міс.</small></strong></div>
     <div class="ukads-price-setup">Разове налаштування — <strong>від 9 500 ₴</strong></div>
     <ul>
      <li>Перевіряємо товари, ціни та облік замовлень</li>
      <li>Ведемо товарну рекламу Shopping і Performance Max</li>
      <li>Показуємо, які товари варто рекламувати активніше</li>
     </ul>
     <a href="<?php echo esc_url(mrseo_url('contact'));?>" class="ukads-price-link">Обговорити магазин <span aria-hidden="true">↗</span></a>
    </article>
   </div>
   <div class="ukads-pricing-footer">
    <div class="ukads-budget-coin" aria-hidden="true"><span>₴</span></div>
    <div><strong>Гроші на рекламу оплачуються окремо — безпосередньо Google.</strong><p>Ведення — щомісячна оплата. Налаштування — разовий платіж. Точна ціна залежить від кількості кампаній та обсягу роботи. Перелік робіт погоджуємо до старту.</p></div>
   </div>
  </div>
 </section>
 <section class="ukseo-work ukads-decision" aria-labelledby="ukads-process-title">
  <div class="container">
   <div class="ukseo-section-head">
    <div><span class="ukseo-kicker">ЯК МИ ПРАЦЮЄМО</span><h2 id="ukads-process-title">Спочатку перевірка. <em>Потім рішення.</em></h2></div>
    <p>Ви розумієте, що ми перевіряємо, змінюємо і як оцінюємо результат.</p>
   </div>
   <ol class="ukseo-steps ukads-steps">
    <li><div class="ukseo-step-index">01</div><div><h3>Визначаємо ціль</h3><p>Домовляємося, скільки можна витрачати на заявку або продаж.</p></div><strong>Зрозуміла ціль і допустимі витрати</strong></li>
    <li><div class="ukseo-step-index">02</div><div><h3>Перевіряємо дані</h3><p>Перевіряємо, чи всі заявки й покупки правильно відображаються у звітах.</p></div><strong>Зрозуміло, де помилки в даних</strong></li>
    <li><div class="ukseo-step-index">03</div><div><h3>Плануємо зміни</h3><p>Обираємо кампанії, запити й товари, які потребують змін.</p></div><strong>План конкретних змін</strong></li>
    <li><div class="ukseo-step-index">04</div><div><h3>Контролюємо ефект</h3><p>Дивимося, як змінилися заявки, продажі й витрати після наших дій.</p></div><strong>Пояснення результату й наступний крок</strong></li>
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
   <div><span class="ukseo-kicker">ЩО ОТРИМУЄТЕ</span><h2 id="ukads-deliver-title">Ви бачите, <em>за що платите і що змінюється.</em></h2><p>Замість незрозумілих звітів — пояснення проблем, план дій і перевірка результату.</p></div>
   <div class="ukseo-delivery-list">
    <div><span aria-hidden="true">01</span><div><h3>Діагностика</h3><p>Де втрачаються заявки або рекламні гроші.</p></div></div>
    <div><span aria-hidden="true">02</span><div><h3>План дій</h3><p>Що саме виправляємо, в якій послідовності та навіщо.</p></div></div>
    <div><span aria-hidden="true">03</span><div><h3>Прозорий контроль</h3><p>Які заявки й продажі отримано та що робимо далі.</p></div></div>
   </div>
  </div>
 </section>
 <?php mrseo_ua_ads_depth_scene('deliverables'); ?>
 <section class="ukseo-faq" aria-labelledby="ukads-faq-title">
  <div class="container ukseo-faq-grid">
   <div><span class="ukseo-kicker">КОРОТКО ПРО ВАЖЛИВЕ</span><h2 id="ukads-faq-title">Перед початком роботи.</h2><p>Три відповіді без маркетингових обіцянок.</p></div>
   <div class="ukseo-faq-items">
    <details><summary>Чи треба перезапускати рекламу?<span aria-hidden="true">+</span></summary><p>Не обов’язково. Спочатку перевіряємо діючі кампанії та історію змін. Перезапуск пропонуємо лише за потреби.</p></details>
    <details><summary>Як зрозуміти, чи реклама приносить прибуток?<span aria-hidden="true">+</span></summary><p>Дивимося не тільки на продажі й витрати на рекламу. Важливо також врахувати собівартість товару, доставку та повернення. Показник ROAS у Google Ads сам по собі не дорівнює чистому прибутку.</p></details>
    <details><summary>Що потрібно для старту?<span aria-hidden="true">+</span></summary><p>Адреса вашого сайту й короткий опис задачі. Для перевірки реклами згодом попросимо доступ до Google Ads та аналітики. Паролі нам надсилати не потрібно.</p></details>
   </div>
  </div>
 </section>
 <section class="ukseo-final ukads-final" aria-labelledby="ukads-final-title">
  <div class="container ukseo-final-grid">
   <div><span class="ukseo-kicker">НАСТУПНИЙ КРОК</span><h2 id="ukads-final-title">Реклама вже працює? <em>Знайдімо, де губляться гроші.</em></h2><p>Надішліть адресу сайту та розкажіть, що не влаштовує в рекламі. Пояснимо, з чого почати.</p></div>
   <div class="ukads-final-action">
    <div class="ukads-final-seal" aria-hidden="true"><span>АНАЛІЗ</span><strong>→</strong><span>РІШЕННЯ</span><i>✓</i></div>
    <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити рекламу <span aria-hidden="true">↗</span></a>
   </div>
  </div>
 </section>
</div>
<?php get_footer(); ?>
