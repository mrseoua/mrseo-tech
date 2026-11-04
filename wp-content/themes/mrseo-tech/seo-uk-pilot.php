<?php
/**
 * Ukrainian-only problem-first SEO service design pilot.
 * Other locales keep their existing template until this editorial system is approved.
 * The homepage, international routing and robots policy remain unchanged.
 */
if (!defined('ABSPATH')) exit;
require_once get_template_directory().'/inc/ua-seo-visuals.php';
get_header();
?>
<div class="ukseo" id="main-content">
 <section class="ukseo-hero" aria-labelledby="ukseo-title">
  <div class="container ukseo-hero-grid">
   <div class="ukseo-hero-copy">
    <nav class="ukseo-crumbs" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url()); ?>">Головна</a><span aria-hidden="true">/</span><span>SEO-просування</span></nav>
    <p class="ukseo-kicker"><span aria-hidden="true"></span> SEO-ПРОСУВАННЯ САЙТІВ</p>
    <h1 id="ukseo-title">Ваші клієнти шукають у Google. <em>Чому вони знаходять конкурентів?</em></h1>
    <p class="ukseo-hero-lead">Сайт може мати чудовий вигляд і все одно втрачати заявки. З'ясовуємо, де саме губиться пошуковий попит: у структурі, індексації, змісті сторінок чи шляху до звернення. Потім виправляємо те, що справді заважає.</p>
    <div class="ukseo-actions">
     <a class="ukseo-button ukseo-button-dark" href="<?php echo esc_url(mrseo_url('contact')); ?>">Розібрати проблему мого сайту <span aria-hidden="true">↗</span></a>
     <a class="ukseo-text-link" href="#ukseo-cases">З чого почнемо <span aria-hidden="true">↓</span></a>
    </div>
    <p class="ukseo-hero-foot">Без обіцянок ТОП-3. З конкретними діями та перевіркою результату.</p>
   </div>
   <div class="ukseo-hero-art">
    <?php mrseo_render_motion_scene('seo'); ?>
    <div class="ukseo-visual-caption"><span class="ukseo-visual-caption-mark">01 / ПОШУК</span><span>Від запиту клієнта — до потрібної сторінки</span></div>
   </div>
  </div>
 </section>

 <section class="ukseo-cases" id="ukseo-cases" aria-labelledby="ukseo-cases-title">
  <div class="container">
   <div class="ukseo-section-head">
    <div><span class="ukseo-kicker">ДЕ ГУБЛЯТЬСЯ КЛІЄНТИ</span><h2 id="ukseo-cases-title">Впізнаєте ситуацію?</h2></div>
    <p>Замість універсального списку SEO-послуг — три типові симптоми. Причину підтверджуємо даними, а не здогадками.</p>
   </div>
   <div class="ukseo-problem-grid">
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">01 <span aria-hidden="true">↗</span></div>
     <h3>Важливі сторінки не знаходять</h3>
     <p>Послуга чи категорія існує, але майже не отримує показів у Google.</p>
     <div class="ukseo-card-diagnosis"><span>Що перевіряємо</span><strong>Індексацію, canonical, внутрішні посилання та відповідність запитам.</strong></div>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">02 <span aria-hidden="true">↗</span></div>
     <h3>Попит є, а вашої сторінки — немає</h3>
     <p>Покупці шукають конкретні послуги, бренди чи характеристики, а конкуренти мають під них окремі сторінки.</p>
     <div class="ukseo-card-diagnosis"><span>Що перевіряємо</span><strong>Пошукові наміри, структуру розділів і прогалини в посадкових сторінках.</strong></div>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">03 <span aria-hidden="true">↗</span></div>
     <h3>Відвідувачі приходять, але не звертаються</h3>
     <p>Сторінка отримує переходи, проте не пояснює пропозицію, не знімає сумніви або не веде до заявки.</p>
     <div class="ukseo-card-diagnosis"><span>Що перевіряємо</span><strong>Намір користувача, зміст сторінки та підтверджені цільові дії.</strong></div>
    </article>
   </div>
  </div>
 </section>

 <?php mrseo_render_ua_seo_visual('journey'); ?>

 <section class="ukseo-decision" aria-labelledby="ukseo-decision-title">
  <div class="container ukseo-decision-layout">
   <div class="ukseo-decision-copy">
    <span class="ukseo-kicker">НЕ ЩЕ ОДИН ЗВІТ</span>
    <h2 id="ukseo-decision-title">Важливо не знайти сто помилок. <em>Важливо знати, що виправляти першим.</em></h2>
    <p>Ми не пропонуємо тексти, посилання чи переробку сайту лише тому, що це є у стандартному пакеті. Кожне завдання має пояснювати, яку проблему воно вирішує та як це перевірити.</p>
    <a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('seo-audit')); ?>">Коли потрібен окремий SEO-аудит <span aria-hidden="true">↗</span></a>
   </div>
   <div class="ukseo-spec" aria-label="Приклад формату пріоритетного завдання">
    <div class="ukseo-spec-top"><span>ПРИКЛАД ФОРМАТУ ЗАВДАННЯ</span><span aria-hidden="true">✳</span></div>
    <div class="ukseo-spec-row"><small>ПРОБЛЕМА</small><strong>Комерційна категорія не охоплює важливий пошуковий намір</strong></div>
    <div class="ukseo-spec-row"><small>РІШЕННЯ</small><strong>Перевірити попит і структуру, визначити потрібну посадкову сторінку</strong></div>
    <div class="ukseo-spec-row"><small>КРИТЕРІЙ ПЕРЕВІРКИ</small><strong>Доступність URL для індексації, відповідність запиту, динаміка показів і звернень</strong></div>
    <div class="ukseo-spec-foot">Це ілюстрація нашого підходу, не результат конкретного клієнта.</div>
   </div>
  </div>
 </section>

 <section class="ukseo-work" id="ukseo-process" aria-labelledby="ukseo-work-title">
  <div class="container">
   <div class="ukseo-section-head">
    <div><span class="ukseo-kicker">РОБОТА, ЯКУ МОЖНА ПЕРЕВІРИТИ</span><h2 id="ukseo-work-title">Від діагностики — до контрольованих змін.</h2></div>
    <p>Кожен етап завершується матеріалом або рішенням, а не просто переліком виконаних дій.</p>
   </div>
   <ol class="ukseo-steps">
    <li><div class="ukseo-step-index">01</div><div><h3>Розуміємо ціль бізнесу</h3><p>Уточнюємо пріоритетні послуги чи товари, ринки, цінність звернення і поточні обмеження.</p></div><strong>Результат: узгоджені цілі й важливі сторінки</strong></li>
    <li><div class="ukseo-step-index">02</div><div><h3>Підтверджуємо причину</h3><p>Аналізуємо Search Console, структуру, технічний стан, попит і сторінки конкурентів.</p></div><strong>Результат: список проблем із доказами</strong></li>
    <li><div class="ukseo-step-index">03</div><div><h3>Впроваджуємо пріоритетне</h3><p>Покращуємо технічні налаштування, потрібні посадкові сторінки, перелінкування та зміст.</p></div><strong>Результат: конкретні зміни або завдання на впровадження</strong></li>
    <li><div class="ukseo-step-index">04</div><div><h3>Перевіряємо вплив</h3><p>Контролюємо індексацію, покази, кліки потрібних сторінок і підтверджені звернення.</p></div><strong>Результат: висновки й наступні рішення</strong></li>
   </ol>
  </div>
 </section>

 <?php mrseo_render_ua_seo_visual('priorities'); ?>

 <section class="ukseo-delivery" aria-labelledby="ukseo-delivery-title">
  <div class="container ukseo-delivery-grid">
   <div>
    <span class="ukseo-kicker">ЩО ОТРИМУЄ БІЗНЕС</span>
    <h2 id="ukseo-delivery-title">Не «SEO-роботи». <em>Зрозумілий план розвитку сайту.</em></h2>
    <p>Обсяг залежить від задачі: іноді достатньо вузького аудиту, іноді потрібне тривале впровадження. Не продаємо однаковий пакет усім.</p>
   </div>
   <div class="ukseo-delivery-list">
    <div><span aria-hidden="true">01</span><div><h3>Карта можливостей</h3><p>Які сторінки варто покращити, які створити й під який пошуковий попит.</p></div></div>
    <div><span aria-hidden="true">02</span><div><h3>Черга конкретних змін</h3><p>Що робити зараз, що відкласти, які ризики й критерії приймання.</p></div></div>
    <div><span aria-hidden="true">03</span><div><h3>Зрозумілий контроль</h3><p>Які показники перевіряти після релізу та які наступні рішення вони підкажуть.</p></div></div>
   </div>
  </div>
 </section>

 <section class="ukseo-proof" aria-labelledby="ukseo-proof-title">
  <div class="container ukseo-proof-layout">
   <div><span class="ukseo-kicker">ПРОЗОРІСТЬ ЗАМІСТЬ ОБІЦЯНОК</span><h2 id="ukseo-proof-title">Важливе не місце в ТОПі саме по собі. <em>Важливі люди, які знаходять вашу пропозицію.</em></h2></div>
   <div><p>Показуємо, що саме перевіряли, які зміни погодили, що було впроваджено та за якими ознаками оцінюємо ефект. Результат залежить від конкуренції, попиту й стану сайту — фіксованих позицій не обіцяємо.</p><a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('portfolio')); ?>">Переглянути проєкти, з якими працювали <span aria-hidden="true">↗</span></a></div>
  </div>
 </section>

 <section class="ukseo-faq" aria-labelledby="ukseo-faq-title">
  <div class="container ukseo-faq-grid">
   <div><span class="ukseo-kicker">ПЕРЕД ПОЧАТКОМ</span><h2 id="ukseo-faq-title">Коротко про співпрацю.</h2><p>Без складної термінології й прихованих обіцянок.</p></div>
   <div class="ukseo-faq-items">
    <details><summary>Чи потрібно одразу замовляти щомісячне SEO?<span aria-hidden="true">+</span></summary><p>Ні. Якщо проблема вузька, можна почати з технічного аудиту, аналізу структури або окремого переліку змін. Регулярну роботу пропонуємо лише тоді, коли для неї є обґрунтований обсяг задач.</p></details>
    <details><summary>Коли можна очікувати перші зміни?<span aria-hidden="true">+</span></summary><p>Спочатку перевіряємо, що виправлення працюють і потрібні сторінки доступні для Google. Зміни показів, кліків і звернень оцінюємо в динаміці; строки залежать від конкуренції та швидкості впровадження.</p></details>
    <details><summary>Що потрібно для початку?<span aria-hidden="true">+</span></summary><p>Адреса сайту, короткий опис товарів або послуг, цільовий ринок і головна проблема. Доступи до аналітики чи Search Console обговоримо окремо — не надсилайте паролі через форму.</p></details>
   </div>
  </div>
 </section>

 <section class="ukseo-final" aria-labelledby="ukseo-final-title">
  <div class="container ukseo-final-grid">
   <div><span class="ukseo-kicker">ПЕРШИЙ КРОК</span><h2 id="ukseo-final-title">Не знаєте, що саме заважає SEO? <em>Почнімо з вашого сайту.</em></h2><p>Опишіть проблему й залиште адресу сайту. Визначимо, що варто перевірити насамперед.</p></div>
   <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити проблему <span aria-hidden="true">↗</span></a>
  </div>
 </section>
</div>
<?php get_footer(); ?>
