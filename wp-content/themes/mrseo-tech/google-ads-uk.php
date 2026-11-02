<?php
/** Ukrainian-only premium Google Ads page. Other locales and services unchanged. */
if (!defined('ABSPATH')) exit;
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
    <div><span class="ukseo-kicker">ДЕ ВТРАЧАЄТЬСЯ ЕФЕКТИВНІСТЬ</span><h2 id="ukads-problems-title">Три ситуації, коли реклама працює не на бізнес.</h2></div>
    <p>Починаємо з перевірки фактів: показників рекламного кабінету недостатньо, якщо конверсії або економіка замовлень невідомі.</p>
   </div>
   <div class="ukseo-problem-grid">
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">01 <span aria-hidden="true">↗</span></div>
     <h3>Google Ads бачить продажі, яких немає у звіті магазину</h3>
     <p>Події дублюються, цінність передається неправильно або різні системи рахують замовлення по-різному.</p>
     <div class="ukseo-card-diagnosis"><span>Що перевіряємо</span><strong>Основні конверсії, transaction ID, вартість замовлення, атрибуцію та затримки даних.</strong></div>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">02 <span aria-hidden="true">↗</span></div>
     <h3>Бюджет іде на товари без потрібної маржі</h3>
     <p>Кампанія показує прийнятний ROAS, але витрати не враховують собівартість, доставку або повернення.</p>
     <div class="ukseo-card-diagnosis"><span>Що перевіряємо</span><strong>Асортимент, маржинальність, конверсії та розподіл витрат.</strong></div>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">03 <span aria-hidden="true">↗</span></div>
     <h3>Кампанії змінюють щотижня — ясності немає</h3>
     <p>Немає стабільного періоду спостереження, гіпотез тестів та зрозумілих критеріїв рішення.</p>
     <div class="ukseo-card-diagnosis"><span>Що перевіряємо</span><strong>Історію змін, стратегії ставок, обмеження даних і період навчання.</strong></div>
    </article>
   </div>
  </div>
 </section>
 <section class="ukseo-decision ukads-decision" aria-labelledby="ukads-decision-title">
  <div class="container ukseo-decision-layout">
   <div class="ukseo-decision-copy">
    <span class="ukseo-kicker">ЛОГІКА РІШЕННЯ</span>
    <h2 id="ukads-decision-title">Не «збільшити ROAS будь-якою ціною». <em>Зрозуміти, що приносить бізнесу результат.</em></h2>
    <p>Звітність починається з правильного сигналу. Якщо покупка врахована двічі, жодна автоматична стратегія не зробить висновки надійними. А якщо маржа товарів різна, один цільовий ROAS не завжди працює для всього каталогу.</p>
    <a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('analytics')); ?>">Коли проблема — у вимірюванні <span aria-hidden="true">↗</span></a>
   </div>
   <div class="ukseo-spec ukads-evidence" aria-label="Ілюстрація процесу прийняття рекламного рішення">
    <div class="ukseo-spec-top"><span>ПРИКЛАД ПОСЛІДОВНОСТІ АНАЛІЗУ</span><span aria-hidden="true">✳</span></div>
    <div class="ukads-signal"><span class="ukads-signal-dot"></span><span>СИГНАЛ ІЗ РЕКЛАМНОГО КАБІНЕТУ</span></div>
    <div class="ukseo-spec-row"><small>01 / ПЕРЕВІРКА</small><strong>Чи відповідають покупки, суми й цільові дії реальним замовленням?</strong></div>
    <div class="ukseo-spec-row"><small>02 / РІШЕННЯ</small><strong>Які кампанії, товари чи запити потребують змін з урахуванням економіки?</strong></div>
    <div class="ukseo-spec-row"><small>03 / КОНТРОЛЬ</small><strong>Що порівнювати після тесту з урахуванням навчання й затримки конверсій?</strong></div>
    <div class="ukseo-spec-foot">Це схема підходу, а не звіт із реального рекламного акаунта.</div>
   </div>
  </div>
 </section>
 <section class="ukseo-work" aria-labelledby="ukads-process-title">
  <div class="container">
   <div class="ukseo-section-head">
    <div><span class="ukseo-kicker">ПОСЛІДОВНІСТЬ РОБОТИ</span><h2 id="ukads-process-title">Спочатку дані. Потім кампанії. Далі — контроль.</h2></div>
    <p>Мета — не просто змінювати налаштування, а пояснювати бізнесу, чому кожне рішення потрібне.</p>
   </div>
   <ol class="ukseo-steps">
    <li><div class="ukseo-step-index">01</div><div><h3>Узгоджуємо економіку реклами</h3><p>Визначаємо пріоритетні продажі або ліди, прийнятні витрати, різницю між доходом і прибутком.</p></div><strong>Результат: критерії ефективності й обмеження</strong></li>
    <li><div class="ukseo-step-index">02</div><div><h3>Перевіряємо конверсії</h3><p>Зіставляємо Ads, GA4 і доступні замовлення, знаходимо дублікати, помилки цінності й джерела розбіжностей.</p></div><strong>Результат: план виправлення сигналів</strong></li>
    <li><div class="ukseo-step-index">03</div><div><h3>Формуємо пріоритетні зміни</h3><p>Оцінюємо кампанії, товарні групи, пошукові запити й посадкові сторінки. Погоджуємо конкретні гіпотези.</p></div><strong>Результат: зрозумілий план тестів і структури</strong></li>
    <li><div class="ukseo-step-index">04</div><div><h3>Відстежуємо ефект без поспіху</h3><p>Порівнюємо періоди з урахуванням затримки конверсій, сезонності та навчання алгоритмів.</p></div><strong>Результат: наступні дії на основі даних</strong></li>
   </ol>
  </div>
 </section>
 <section class="ukseo-delivery" aria-labelledby="ukads-deliver-title">
  <div class="container ukseo-delivery-grid">
   <div><span class="ukseo-kicker">ЩО ОТРИМУЄ КЛІЄНТ</span><h2 id="ukads-deliver-title">Не обіцянку «дешевших кліків». <em>Контроль рекламних рішень.</em></h2><p>Не всі кампанії потрібно перезапускати, а не кожна зміна дає швидкий ефект. Визначаємо послідовність робіт із прийнятним ризиком.</p></div>
   <div class="ukseo-delivery-list">
    <div><span aria-hidden="true">01</span><div><h3>Діагностику рекламної системи</h3><p>Якість конверсій, бюджетні обмеження й проблеми структури.</p></div></div>
    <div><span aria-hidden="true">02</span><div><h3>Пріоритетний план змін</h3><p>Що виправити першочергово, що тестувати та як приймати рішення.</p></div></div>
    <div><span aria-hidden="true">03</span><div><h3>Звіт за бізнес-показниками</h3><p>Витрати, підтверджені цінні дії, доступні дані про дохід і прибутковість.</p></div></div>
   </div>
  </div>
 </section>
 <section class="ukseo-proof" aria-labelledby="ukads-experience-title">
  <div class="container ukseo-proof-layout">
   <div><span class="ukseo-kicker">ПРОЗОРІСТЬ</span><h2 id="ukads-experience-title">Рішення мають бути зрозумілими. <em>Навіть коли алгоритм складний.</em></h2></div>
   <div><p>Пояснюємо, які дані перевіряли, що пропонуємо змінити та за яким критерієм оцінюємо результат. Окремо працюємо з товарними кампаніями та Performance Max — без удаваної точності там, де платформа обмежує деталізацію.</p><a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('performance-max')); ?>">Як працюємо з Performance Max <span aria-hidden="true">↗</span></a></div>
  </div>
 </section>
 <section class="ukseo-faq" aria-labelledby="ukads-faq-title">
  <div class="container ukseo-faq-grid">
   <div><span class="ukseo-kicker">ПЕРЕД ПОЧАТКОМ</span><h2 id="ukads-faq-title">Питання про Google Ads.</h2><p>Без обіцянок гарантованої окупності.</p></div>
   <div class="ukseo-faq-items">
    <details><summary>Чи потрібно одразу перезапускати кампанії?<span aria-hidden="true">+</span></summary><p>Ні. Спочатку перевіряємо поточні дані, структуру й історію змін. Перезапуск без причини може обнулити корисні спостереження й ускладнити оцінку.</p></details>
    <details><summary>Чим ROAS відрізняється від прибутку?<span aria-hidden="true">+</span></summary><p>ROAS порівнює цінність конверсій із рекламними витратами. Він не враховує автоматично собівартість, доставку, комісії та повернення. Тому орієнтири узгоджуємо з економікою бізнесу.</p></details>
    <details><summary>Що потрібно для первинного аналізу?<span aria-hidden="true">+</span></summary><p>Посилання на сайт, цілі та доступ із погодженими правами до рекламного акаунта й, за потреби, аналітики. Паролі через форму не надсилайте.</p></details>
   </div>
  </div>
 </section>
 <section class="ukseo-final" aria-labelledby="ukads-final-title">
  <div class="container ukseo-final-grid">
   <div><span class="ukseo-kicker">ПЕРШИЙ КРОК</span><h2 id="ukads-final-title">Реклама вже працює? <em>Перевірмо, на що йдуть гроші.</em></h2><p>Опишіть ситуацію, залиште адресу сайту та розкажіть, які результати викликають питання. Почнемо з перевірки сигналів і головних обмежень.</p></div>
   <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити рекламу <span aria-hidden="true">↗</span></a>
  </div>
 </section>
</div>
<?php get_footer(); ?>
