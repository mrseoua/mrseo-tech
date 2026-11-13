<?php
/**
 * Ukrainian-only problem-first SEO service design pilot.
 * Other locales keep their existing template until this editorial system is approved.
 * The homepage, international routing and robots policy remain unchanged.
 */
if (!defined('ABSPATH')) exit;
if(mrseo_locale()==='uk'){require get_template_directory().'/premium-ua-interior.php';return;}
require_once get_template_directory().'/inc/ua-seo-visuals.php';
get_header();
?>
<div class="ukseo ukseo--seo" id="main-content">
 <section class="ukseo-hero" aria-labelledby="ukseo-title">
  <div class="container ukseo-hero-grid">
   <div class="ukseo-hero-copy">
    <nav class="ukseo-crumbs" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url()); ?>">Головна</a><span aria-hidden="true">/</span><span>SEO-просування</span></nav>
    <p class="ukseo-kicker"><span aria-hidden="true"></span> SEO-ПРОСУВАННЯ САЙТІВ</p>
    <h1 id="ukseo-title">Клієнти шукають у Google. <em>А знаходять конкурентів?</em></h1>
    <p class="ukseo-hero-lead">Перевіримо, які сторінки Google не показує, які послуги шукають клієнти та чому люди не переходять на ваш сайт. Складемо план виправлень і погодимо, що змінювати першочергово.</p>
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
    <div><span class="ukseo-kicker">ДЕ ГУБЛЯТЬСЯ КЛІЄНТИ</span><h2 id="ukseo-cases-title">Де ви втрачаєте <em>клієнтів із Google?</em></h2></div>
    <p>Три ситуації, які варто перевірити першими.</p>
   </div>
   <div class="ukseo-problem-grid">
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">01 <span aria-hidden="true">↗</span></div>
     <h3>Важливі сторінки не знаходять у Google</h3>
     <p>Послуга є на сайті, але люди майже не бачать її сторінку серед результатів Google.</p>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">02 <span aria-hidden="true">↗</span></div>
     <h3>Клієнти шукають те, чого немає на сайті</h3>
     <p>Покупці шукають конкретні послуги, бренди чи характеристики, а конкуренти мають під них окремі сторінки.</p>
    </article>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number">03 <span aria-hidden="true">↗</span></div>
     <h3>Переходи є, а заявок немає</h3>
     <p>Сторінка отримує переходи, проте не пояснює пропозицію, не знімає сумніви або не веде до заявки.</p>
    </article>
   </div>
  </div>
 </section>

 <?php mrseo_render_ua_seo_visual('priorities'); ?>
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
