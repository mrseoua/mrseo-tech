<?php
/**
 * Ukrainian technical SEO audit: problem-first premium service page.
 * Scope: /seo-audit/ only. Other routes retain existing templates.
 */
if (!defined('ABSPATH')) exit;
require_once get_template_directory().'/inc/ua-final-interior-visuals.php';
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
        <h1 id="ukaudit-title">Сайт працює. <em>А Google не бачить важливі сторінки?</em></h1>
        <p class="ukseo-hero-lead">Після оновлення сайту впали переходи з Google або важливі сторінки зникли з пошуку? Перевіримо конкретні адреси, налаштування й зміни та пояснимо, що саме виправляти.</p>
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
        <p>Не здогадуємося — перевіряємо причини на реальних сторінках.</p>
      </div>
      <div class="ukseo-problem-grid">
        <article class="ukseo-problem-card">
          <div class="ukseo-card-number">01 <span aria-hidden="true">↗</span></div>
          <h3>Після змін упав трафік</h3>
          <p>Змінили дизайн, структуру чи платформу — і Google почав показувати важливі сторінки рідше.</p>
        </article>
        <article class="ukseo-problem-card">
          <div class="ukseo-card-number">02 <span aria-hidden="true">↗</span></div>
          <h3>Google не бачить важливі сторінки</h3>
          <p>Категорії або послуги існують, але не індексуються чи не отримують очікуваних показів.</p>
        </article>
        <article class="ukseo-problem-card">
          <div class="ukseo-card-number">03 <span aria-hidden="true">↗</span></div>
          <h3>Фільтри створюють сотні дублів</h3>
          <p>Фільтри, сортування й параметри генерують технічні сторінки, які важко контролювати.</p>
        </article>
      </div>
    </div>
  </section>

  <?php mrseo_render_ua_final_service('seo-audit','plan'); ?>
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
        <div><span aria-hidden="true">03</span><div><h3>Як перевірити виправлення</h3><p>Що саме має змінитися на сторінці та як перевірити результат після оновлення.</p></div></div>
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
