<?php
/**
 * Ukrainian technical SEO audit: problem-first premium service page.
 * Scope: /seo-audit/ only. Other routes retain existing templates.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="ukseo ukseo--audit" id="main-content">
  <section class="ukseo-hero" aria-labelledby="ukaudit-title">
    <div class="container ukseo-hero-grid">
      <div class="ukseo-hero-copy">
        <nav class="ukseo-crumbs" aria-label="Навігація">
          <a href="<?php echo esc_url(mrseo_url()); ?>">Головна</a><span aria-hidden="true">/</span><span>Технічний SEO-аудит</span>
        </nav>
        <div class="ukseo-kicker">ТЕХНІЧНИЙ SEO-АУДИТ</div>
        <h1 id="ukaudit-title">Сайт відкривається. <em>А що насправді бачить Google?</em></h1>
        <p class="ukseo-hero-lead">Трафік упав після оновлення? Важливі сторінки не потрапляють у пошук? Каталог створює сотні схожих URL? Замість загального списку помилок знаходимо конкретні причини, показуємо проблемні адреси та визначаємо, що потрібно виправити насамперед.</p>
        <div class="ukseo-actions">
          <a class="ukseo-button ukseo-button-dark" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити аудит сайту <span aria-hidden="true">↗</span></a>
          <a class="ukseo-text-link" href="#ukaudit-problems">Які проблеми перевіряємо <span aria-hidden="true">↓</span></a>
        </div>
        <p class="ukseo-hero-foot">Без «100 критичних помилок» заради враження. З доказами, пріоритетами та зрозумілим планом.</p>
      </div>
      <div class="ukseo-hero-art">
        <?php mrseo_render_motion_scene('seo-audit'); ?>
        <div class="ukseo-visual-caption">
          <span class="ukseo-visual-caption-mark">01 / ДІАГНОСТИКА</span>
          <span>Проблема → приклади URL → перевірюване виправлення</span>
        </div>
      </div>
    </div>
  </section>

  <section class="ukseo-cases" id="ukaudit-problems" aria-labelledby="ukaudit-problems-title">
    <div class="container">
      <div class="ukseo-section-head">
        <div><span class="ukseo-kicker">СИМПТОМИ, ЯКІ ВАРТО ПЕРЕВІРИТИ</span><h2 id="ukaudit-problems-title">Що відбувається з вашим сайтом?</h2></div>
        <p>Ці симптоми можуть мати різні причини. Аудит потрібен, щоб підтвердити їх на конкретних сторінках, а не будувати припущення.</p>
      </div>
      <div class="ukseo-problem-grid">
        <article class="ukseo-problem-card">
          <div class="ukseo-card-number">01 <span aria-hidden="true">↗</span></div>
          <h3>Після оновлення зникли переходи</h3>
          <p>Змінили дизайн, структуру чи платформу — і Google почав показувати важливі сторінки рідше.</p>
          <div class="ukseo-card-diagnosis"><span>Шукаємо причину</span><strong>Редиректи, HTTP-статуси, зміни URL, canonical, доступність сторінок.</strong></div>
        </article>
        <article class="ukseo-problem-card">
          <div class="ukseo-card-number">02 <span aria-hidden="true">↗</span></div>
          <h3>Google пропускає важливі сторінки</h3>
          <p>Категорії або послуги існують, але не індексуються чи не отримують очікуваних показів.</p>
          <div class="ukseo-card-diagnosis"><span>Шукаємо причину</span><strong>Правила індексації, внутрішні посилання, sitemap, технічні сигнали й зміст.</strong></div>
        </article>
        <article class="ukseo-problem-card">
          <div class="ukseo-card-number">03 <span aria-hidden="true">↗</span></div>
          <h3>Дублі забирають увагу від потрібних URL</h3>
          <p>Фільтри, сортування й параметри генерують технічні сторінки, які важко контролювати.</p>
          <div class="ukseo-card-diagnosis"><span>Шукаємо причину</span><strong>Шаблони адрес, канонікали, параметри, перелінкування та XML-карти.</strong></div>
        </article>
      </div>
    </div>
  </section>

  <section class="ukseo-decision ukaudit-diagnosis" aria-labelledby="ukaudit-diagnosis-title">
    <div class="container ukseo-decision-layout">
      <div class="ukseo-decision-copy">
        <span class="ukseo-kicker">ВИСНОВОК, А НЕ ЧЕКЛІСТ</span>
        <h2 id="ukaudit-diagnosis-title">Не кожну помилку треба виправляти. <em>Важливо знайти ту, що шкодить бізнесу.</em></h2>
        <p>Пріоритет визначаємо за масштабом проблеми, цінністю сторінок, ризиком і складністю виправлення. Розробнику потрібне зрозуміле завдання, а вам — аргументи, чому воно важливе.</p>
        <a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('seo')); ?>">Чим аудит відрізняється від SEO-просування <span aria-hidden="true">↗</span></a>
      </div>
      <div class="ukseo-spec ukaudit-report" aria-label="Приклад результату технічного аудиту">
        <div class="ukseo-spec-top"><span>ПРИКЛАД ЗАДАЧІ ПІСЛЯ АУДИТУ</span><span aria-hidden="true">✳</span></div>
        <div class="ukaudit-report-header">
          <span class="ukaudit-report-tag">URL / INDEXABILITY</span>
          <strong>Некорисні URL сортування потрапляють до індексації</strong>
        </div>
        <div class="ukseo-spec-row"><small>ДЕ ЗНАЙШЛИ</small><strong>Шаблон адрес категорій з параметрами сортування</strong></div>
        <div class="ukseo-spec-row"><small>ЩО ЗМІНИТИ</small><strong>Уточнити правила індексації, canonical та внутрішніх посилань для цього шаблону</strong></div>
        <div class="ukseo-spec-row"><small>ЯК ПРИЙНЯТИ РОБОТУ</small><strong>Перевірити приклади URL, XML-карту, HTML-сигнали та подальшу динаміку у Search Console</strong></div>
        <div class="ukseo-spec-foot">Умовний приклад формату завдання. Не результат аудиту реального клієнта.</div>
      </div>
    </div>
  </section>

  <section class="ukseo-work" aria-labelledby="ukaudit-process-title">
    <div class="container">
      <div class="ukseo-section-head">
        <div><span class="ukseo-kicker">ЯК ПРОХОДИТЬ ДІАГНОСТИКА</span><h2 id="ukaudit-process-title">Від симптомів — до завдань для виправлення.</h2></div>
        <p>Мета аудиту — дати команді план, який можна впровадити та перевірити. Сам аудит не означає автоматичного внесення змін.</p>
      </div>
      <ol class="ukseo-steps">
        <li><div class="ukseo-step-index">01</div><div><h3>Визначаємо важливі сторінки</h3><p>Уточнюємо бізнес-цілі, пріоритетні розділи, історію змін і симптоми, які потрібно перевірити.</p></div><strong>Результат: обсяг аудиту та пріоритетні сценарії</strong></li>
        <li><div class="ukseo-step-index">02</div><div><h3>Перевіряємо сайт і сигнали Google</h3><p>Аналізуємо сканування, відповіді сервера, індексацію, внутрішні зв’язки, шаблони й доступні дані Search Console.</p></div><strong>Результат: підтверджені знахідки з прикладами URL</strong></li>
        <li><div class="ukseo-step-index">03</div><div><h3>Відокремлюємо ризики від дрібниць</h3><p>Оцінюємо можливий вплив проблеми, масштаб, залежності та порядок усунення.</p></div><strong>Результат: черга завдань із пріоритетами</strong></li>
        <li><div class="ukseo-step-index">04</div><div><h3>Передаємо план і критерії перевірки</h3><p>Пояснюємо, що має змінитися після виправлення та як перевірити роботу розробника.</p></div><strong>Результат: технічні завдання та план повторної перевірки</strong></li>
      </ol>
    </div>
  </section>

  <section class="ukseo-delivery" aria-labelledby="ukaudit-deliver-title">
    <div class="container ukseo-delivery-grid">
      <div>
        <span class="ukseo-kicker">ЩО ОТРИМУЄТЕ ПІСЛЯ АУДИТУ</span>
        <h2 id="ukaudit-deliver-title">Не PDF «для галочки». <em>План, з яким можна працювати.</em></h2>
        <p>Зміст звіту залежить від сайту. Заздалегідь узгоджуємо, які типи сторінок і проблем перевіряємо.</p>
      </div>
      <div class="ukseo-delivery-list">
        <div><span aria-hidden="true">01</span><div><h3>Проблеми з доказами</h3><p>Приклади URL, очікувана й фактична поведінка, пояснення ризиків.</p></div></div>
        <div><span aria-hidden="true">02</span><div><h3>Пріоритети для команди</h3><p>Порядок виправлень із врахуванням бізнес-цінності, масштабу та складності.</p></div></div>
        <div><span aria-hidden="true">03</span><div><h3>Критерії приймання</h3><p>Як розробнику перевірити зміну та за якими сигналами контролювати її після релізу.</p></div></div>
      </div>
    </div>
  </section>

  <section class="ukseo-proof ukaudit-boundary" aria-labelledby="ukaudit-boundary-title">
    <div class="container ukseo-proof-layout">
      <div><span class="ukseo-kicker">ВАЖЛИВА МЕЖА ПОСЛУГИ</span><h2 id="ukaudit-boundary-title">Аудит пояснює, що не працює. <em>Впровадження узгоджуємо окремо.</em></h2></div>
      <div><p>Якщо потрібна допомога з виправленнями, оцінимо технічні залежності та погодимо обсяг робіт. Не обіцяємо, що всі знайдені попередження впливають на позиції або що кожне виправлення одразу збільшить трафік.</p><a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('portfolio')); ?>">Подивитися наші проєкти <span aria-hidden="true">↗</span></a></div>
    </div>
  </section>

  <section class="ukseo-faq" aria-labelledby="ukaudit-faq-title">
    <div class="container ukseo-faq-grid">
      <div><span class="ukseo-kicker">ПОШИРЕНІ ЗАПИТАННЯ</span><h2 id="ukaudit-faq-title">Що варто знати до аудиту?</h2><p>Відповіді без зайвих технічних термінів і завищених очікувань.</p></div>
      <div class="ukseo-faq-items">
        <details><summary>Чи потрібні доступи до сайту одразу?<span aria-hidden="true">+</span></summary><p>Частину перевірок можна виконати без доступів. Для аналізу індексації та історії пошуку можуть знадобитися дані Search Console. Домовимося про безпечний спосіб надання потрібних прав — паролі через форму не надсилайте.</p></details>
        <details><summary>Чи виправляєте ви помилки після аудиту?<span aria-hidden="true">+</span></summary><p>Можемо окремо погодити впровадження або підготувати завдання для вашого розробника. Сам аудит — це діагностика, пріоритети та критерії перевірки, а не автоматичне внесення змін.</p></details>
        <details><summary>Від чого залежить вартість аудиту?<span aria-hidden="true">+</span></summary><p>Від розміру сайту, складності каталогу, кількості типів сторінок, історії міграцій і доступних даних. Спочатку визначаємо обсяг перевірки, після чого обговорюємо оцінку.</p></details>
      </div>
    </div>
  </section>

  <section class="ukseo-final" aria-labelledby="ukaudit-final-title">
    <div class="container ukseo-final-grid">
      <div><span class="ukseo-kicker">ПЕРШИЙ КРОК</span><h2 id="ukaudit-final-title">Не потрібен ще один список помилок. <em>Потрібно знайти причину.</em></h2><p>Надішліть адресу сайту й опишіть, що змінилося або які сторінки викликають питання. Визначимо, з чого розпочати діагностику.</p></div>
      <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити проблему сайту <span aria-hidden="true">↗</span></a>
    </div>
  </section>
</div>
<?php get_footer(); ?>
