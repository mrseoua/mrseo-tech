<?php
/** Ukrainian-only Horoshop page with original partner hero kept verbatim. */
if(!defined('ABSPATH'))exit;
get_header();
?>
<div class="ukseo ukseo--horoshop" id="main-content">
<section class="ukhoroshop-wrap">
<section class="special-hero special-hero-horoshop" aria-labelledby="horoshop-title">
 <div class="container hs-hero-layout">
  <div class="hs-hero-copy">
   <div class="eyebrow"><?php echo esc_html(mrseo_t('СТВОРЕННЯ, SEO ТА РЕКЛАМА МАГАЗИНІВ НА ХОРОШОП','SEO И РАЗВИТИЕ МАГАЗИНОВ НА ХОРОШОП','HOROSHOP SEO'));?></div>
   <h1 id="horoshop-title"><?php echo wp_kses_post(mrseo_t('Магазин на Хорошоп.<br><em>Що заважає отримувати замовлення?</em>','SEO для Хорошоп.<br><em>Ваш магазин может больше.</em>','Horoshop SEO. Your store can do more.'));?></h1>
   <p><?php echo esc_html(mrseo_t(
    'Допомагаємо створити магазин на Хорошоп або поліпшити наявний. Якщо товари не видно в Google, фільтри створюють зайві сторінки чи Merchant Center відхиляє товари — перевіримо причину й покажемо доступні рішення.',
    'Категории не находят в Google? Фильтры мешают индексации? Merchant Center отклоняет товары? Находим причину, предлагаем решение с учётом возможностей Хорошоп и проверяем результат.',
    'We find and fix catalog, indexing and shopping feed issues.'
   ));?></p>
   <a class="btn hs-hero-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити свій магазин','Обсудить свой магазин','Discuss your store'));?> <span aria-hidden="true">↗</span></a>
  </div>
  <div class="hs-showcase" aria-label="<?php echo esc_attr(mrseo_t('Інтерактивна модель розвитку магазину Хорошоп','Интерактивная модель развития магазина Хорошоп','Horoshop store SEO interactive model'));?>">
   <div class="hs-showcase-header">
     <span class="hs-authentic-logo"><span class="hs-logo-mask"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-wordmark.svg');?>" alt="<?php echo esc_attr(mrseo_t('Логотип Хорошоп','Логотип Хорошоп','Horoshop'));?>" width="200" height="37" loading="eager" decoding="async"></span></span>
     <img class="hs-official-badge" src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-partner-active.svg');?>" alt="<?php echo esc_attr(mrseo_t('Офіційний партнер Хорошоп — Partner ACTIVE','Официальный партнёр Хорошоп — Partner ACTIVE','Horoshop Partner ACTIVE'));?>" width="96" height="71" loading="eager" decoding="async">
   </div>
   <div class="hs-demo" data-hs-scene="0">
    <div class="hs-storefront">
     <div class="hs-storefront-bar"><span class="hs-storefront-lights" aria-hidden="true"><i></i><i></i><i></i></span><span class="hs-storefront-label"><?php echo esc_html(mrseo_t('Ваш інтернет-магазин','Ваш интернет-магазин','Your online store'));?></span><span class="hs-storefront-icon" aria-hidden="true">↗</span></div>
     <div class="hs-storefront-items" aria-hidden="true">
       <div class="hs-product hs-product-1"><svg viewBox="0 0 100 100"><path d="M28 38H72L78 86H22Z" fill="#a8aaa6"/><path d="M39 40V27a11 11 0 0 1 22 0v13" stroke="#5e665f" stroke-width="7" fill="none" stroke-linecap="round"/><path d="M22 86h56" stroke="#797d77" stroke-width="3"/></svg><i></i></div>
       <div class="hs-product hs-product-2"><svg viewBox="0 0 100 100"><path d="M22 61V47a28 28 0 0 1 56 0v14" fill="none" stroke="#77878d" stroke-width="12" stroke-linecap="round"/><rect x="15" y="53" width="22" height="29" rx="10" fill="#3c525d"/><rect x="63" y="53" width="22" height="29" rx="10" fill="#3c525d"/><rect x="21" y="60" width="10" height="17" rx="5" fill="#a7bac2"/><rect x="69" y="60" width="10" height="17" rx="5" fill="#a7bac2"/></svg><i></i></div>
       <div class="hs-product hs-product-3"><svg viewBox="0 0 100 100"><rect x="28" y="20" width="44" height="66" rx="10" fill="#b8726b"/><rect x="34" y="27" width="32" height="46" rx="5" fill="#f2e8e2"/><rect x="45" y="78" width="10" height="3" rx="2" fill="#f2e8e2"/><path d="M40 44h20M40 51h15" stroke="#d4aaa4" stroke-width="3" stroke-linecap="round"/></svg><i></i></div>
     </div>
     <div class="hs-search-track" aria-hidden="true"><span class="hs-search-beam"></span><span class="hs-search-dot"></span></div>
    </div>
    <div class="hs-demo-message" aria-live="polite" aria-atomic="true">
      <span class="hs-demo-kicker"><?php echo esc_html(mrseo_t('ЗНАХОДИМО ПРОБЛЕМУ → ДАЄМО РІШЕННЯ','НАХОДИМ ПРОБЛЕМУ → ДАЁМ РЕШЕНИЕ','FIND ISSUE → SOLVE'));?></span>
      <h2 data-hs-problem><?php echo esc_html(mrseo_t('Категорії не видно в Google','Категории не видны в Google','Categories are missing in Google'));?></h2>
      <p data-hs-solution><?php echo esc_html(mrseo_t('Створюємо SEO-сторінки під реальний попит.','Создаём SEO-страницы под реальный спрос.','Build demand-led SEO landing pages.'));?></p>
    </div>
   </div>
   <div class="hs-switcher" role="group" aria-label="<?php echo esc_attr(mrseo_t('Обрати проблему магазину','Выбрать проблему магазина','Select issue'));?>">
    <button type="button" class="hs-switch is-active" data-hs-step="0" aria-pressed="true" data-hs-problem="<?php echo esc_attr(mrseo_t('Категорії не видно в Google','Категории не видны в Google',''));?>" data-hs-solution="<?php echo esc_attr(mrseo_t('Створюємо SEO-сторінки під реальний попит.','Создаём SEO-страницы под реальный спрос.',''));?>"><?php echo esc_html(mrseo_t('Категорії','Категории','Categories'));?></button>
    <button type="button" class="hs-switch" data-hs-step="1" aria-pressed="false" data-hs-problem="<?php echo esc_attr(mrseo_t('Фільтри створюють дублі','Фильтры создают дубли',''));?>" data-hs-solution="<?php echo esc_attr(mrseo_t('Налаштовуємо правила індексації.','Настраиваем правила индексации.',''));?>"><?php echo esc_html(mrseo_t('Фільтри','Фильтры','Filters'));?></button>
    <button type="button" class="hs-switch" data-hs-step="2" aria-pressed="false" data-hs-problem="<?php echo esc_attr(mrseo_t('Merchant Center відхиляє товари','Merchant Center отклоняет товары',''));?>" data-hs-solution="<?php echo esc_attr(mrseo_t('Перевіряємо та виправляємо товарні дані.','Проверяем и исправляем товарные данные.',''));?>"><?php echo esc_html(mrseo_t('Товарний фід','Товарный фид','Product feed'));?></button>
   </div>
  </div>
 </div>
</section>
</section>
<section class="ukseo-cases" id="ukhoroshop-start" aria-labelledby="ukhoroshop-problem-title"><div class="container">
 <div class="ukseo-section-head">
  <div><span class="ukseo-kicker">ПЛАТФОРМА МАЄ СВОЇ ПРАВИЛА</span><h2 id="ukhoroshop-problem-title">Що саме заважає <em>клієнту знайти й купити товар?</em></h2></div>
  <p>Перевіряємо категорії, фільтри та товарний фід — із урахуванням можливостей Хорошоп.</p>
 </div>
 <div class="ukseo-problem-grid">
  <article class="ukseo-problem-card"><div class="ukseo-card-number">01 <span aria-hidden="true">↗</span></div><h3>Категорій не видно в Google</h3><p>Категорії, бренди й властивості товарів не завжди збігаються з тим, як покупці шукають товари.</p></article>
  <article class="ukseo-problem-card"><div class="ukseo-card-number">02 <span aria-hidden="true">↗</span></div><h3>Фільтри заважають індексації</h3><p>Параметри фільтрів, недоступні товари або неузгоджені адреси створюють зайві технічні сценарії.</p></article>
  <article class="ukseo-problem-card"><div class="ukseo-card-number">03 <span aria-hidden="true">↗</span></div><h3>Merchant Center відхиляє товари</h3><p>Ціна, наявність або атрибути у фіді не збігаються з тим, що бачить покупець у магазині.</p></article>
 </div>
</div></section>
<section class="ukseo-delivery" aria-labelledby="ukhoroshop-delivery-title"><div class="container ukseo-delivery-grid">
 <div><span class="ukseo-kicker">ЩО МОЖНА ДОРУЧИТИ НАМ</span><h2 id="ukhoroshop-delivery-title">Від запуску магазину <em>до пошуку причин слабких продажів.</em></h2><p>Склад послуг залежить від етапу розвитку: новий магазин, існуючий каталог або реклама, яка не дає очікуваного результату.</p></div>
 <div class="ukseo-delivery-list">
  <div><span aria-hidden="true">01</span><div><h3>Створення й налаштування</h3><p>Структура каталогу, навігація, основні сторінки й готовність до запуску.</p></div></div>
  <div><span aria-hidden="true">02</span><div><h3>SEO та робота з індексацією</h3><p>Посадкові сторінки під попит, перелінкування, метадані й контроль технічних URL.</p></div></div>
  <div><span aria-hidden="true">03</span><div><h3>Merchant Center і Google Ads</h3><p>Діагностика товарного фіда, налаштування реклами та перевірка покупок.</p></div></div>
 </div>
</div></section>
<section class="ukseo-faq" aria-labelledby="ukhoroshop-faq-title"><div class="container ukseo-faq-grid">
 <div><span class="ukseo-kicker">ВАЖЛИВО ЗНАТИ</span><h2 id="ukhoroshop-faq-title">Питання про Хорошоп.</h2><p>Дотримуємося можливостей і правил платформи.</p></div>
 <div class="ukseo-faq-items">
  <details><summary>Чи можна налаштувати SEO-фільтри для Google?<span aria-hidden="true">+</span></summary><p>У Хорошоп передбачені інструменти для SEO-сторінок фільтрів. Які комбінації корисні, визначаємо за попитом і технічними можливостями конкретного каталогу.</p></details>
  <details><summary>Чи потрібно створювати новий магазин?<span aria-hidden="true">+</span></summary><p>Ні, якщо поточний магазин можна покращити. Спочатку перевіряємо структуру, налаштування та наявні обмеження.</p></details>
  <details><summary>Чи можете допомогти з відхиленнями товарів у Merchant Center?<span aria-hidden="true">+</span></summary><p>Так, аналізуємо діагностику, товарні дані та відповідність магазину фіду. Рішення залежить від причини відхилення та правил Google.</p></details>
 </div>
</div></section>
<section class="ukseo-final" aria-labelledby="ukhoroshop-final-title"><div class="container ukseo-final-grid">
 <div><span class="ukseo-kicker">ПЕРШИЙ КРОК</span><h2 id="ukhoroshop-final-title">Магазин працює. <em>Знайдімо, що стримує його зростання.</em></h2><p>Надішліть адресу вашого магазину й коротко опишіть проблему. Почнемо з перевірки того, що справді впливає на результат.</p></div>
 <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact'));?>">Обговорити Хорошоп <span aria-hidden="true">↗</span></a>
</div></section>
</div>
<?php get_footer();?>
