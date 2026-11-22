<?php
/** Ukrainian-only Horoshop page with original partner hero kept verbatim. */
if(!defined('ABSPATH'))exit;
if(mrseo_locale()==='uk'){require_once get_template_directory().'/inc/premium-ua-editorial.php';mrseo_pue_setup('horoshop');}
get_header();if(mrseo_locale()==='uk')mrseo_pue_marker('horoshop');
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
  <p>SEO-просування магазину на Хорошоп починаємо з перевірки категорій, фільтрів та товарного фіда — з урахуванням можливостей платформи.</p>
 </div>
 <div class="ukseo-problem-grid">
  <article class="ukseo-problem-card"><div class="ukseo-card-number">01 <span aria-hidden="true">↗</span></div><?php if(mrseo_locale()==='uk')mrseo_pue_art('hs-categories','');?><h3>Категорій не видно в Google</h3><p>Категорії, бренди й властивості товарів не завжди збігаються з тим, як покупці шукають товари.</p></article>
  <article class="ukseo-problem-card"><div class="ukseo-card-number">02 <span aria-hidden="true">↗</span></div><?php if(mrseo_locale()==='uk')mrseo_pue_art('hs-filters','');?><h3>Фільтри заважають індексації</h3><p>Параметри фільтрів, недоступні товари або неузгоджені адреси створюють зайві технічні сценарії.</p></article>
  <article class="ukseo-problem-card"><div class="ukseo-card-number">03 <span aria-hidden="true">↗</span></div><?php if(mrseo_locale()==='uk')mrseo_pue_art('hs-feed','');?><h3>Merchant Center відхиляє товари</h3><p>Ціна, наявність або атрибути у фіді не збігаються з тим, що бачить покупець у магазині.</p></article>
 </div>
</div></section>
<section class="ukseo-delivery" aria-labelledby="ukhoroshop-delivery-title"><div class="container ukseo-delivery-grid">
 <div><span class="ukseo-kicker">ЩО МОЖНА ДОРУЧИТИ НАМ</span><h2 id="ukhoroshop-delivery-title">Від запуску магазину <em>до пошуку причин слабких продажів.</em></h2><p>Склад послуг залежить від етапу розвитку: новий магазин, існуючий каталог або реклама, яка не дає очікуваного результату.</p><?php if(mrseo_locale()==='uk')mrseo_pue_art('hs-store-process','pue-hs-story');?><?php if(mrseo_locale()==='uk')mrseo_pue_pause();?></div>
 <div class="ukseo-delivery-list">
  <div><span aria-hidden="true">01</span><div><h3>Створення магазину на Хорошоп</h3><p>Структура каталогу, навігація, основні сторінки й готовність до запуску.</p></div></div>
  <div><span aria-hidden="true">02</span><div><h3>SEO та робота з індексацією</h3><p>Посадкові сторінки під попит, перелінкування, метадані й контроль технічних URL.</p></div></div>
  <div><span aria-hidden="true">03</span><div><h3>Merchant Center і Google Ads</h3><p>Діагностика товарного фіда, налаштування реклами та перевірка покупок.</p></div></div>
 </div>
</div></section>
<?php if(mrseo_locale()==='uk'): ?>
<section class="hs-service-section" id="hs-services" aria-labelledby="hs-services-title">
 <div class="container">
  <div class="hs-services-heading">
   <span class="ukseo-kicker">ПОСЛУГИ ДЛЯ ХОРОШОП</span>
   <h2 id="hs-services-title">Від запуску до продажів. <em>Вирішуємо конкретну задачу магазину.</em></h2>
   <p>Не потрібно замовляти всі послуги одночасно. Оберіть проблему — перевіримо її причину, погодимо обсяг робіт і критерій готовності. Частина змін залежить від функцій та тарифу Хорошоп.</p>
  </div>
  <div class="hs-services-grid">
   <article class="hs-service-card" id="hs-setup">
    <span class="hs-service-number">01 / ЗАПУСК</span>
    <h3>Створення та налаштування магазину</h3>
    <p class="hs-service-pain">Потрібен новий магазин, але незрозуміло, як організувати товари, категорії, оплату та доставку.</p>
    <p>Підготуємо структуру каталогу, налаштуємо доступні способи замовлення, перевіримо мобільний кошик і тестове оформлення покупки.</p>
    <p class="hs-service-result"><strong>Результат:</strong> магазин із перевіреним шляхом від товару до замовлення.</p>
    <a href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити запуск <span aria-hidden="true">↗</span></a>
   </article>
   <article class="hs-service-card" id="hs-seo">
    <span class="hs-service-number">02 / ПОШУК GOOGLE</span>
    <h3>SEO-просування Хорошоп</h3>
    <p class="hs-service-pain">У каталозі багато товарів, але цільові категорії не отримують органічних переходів.</p>
    <p>Зіставимо пошуковий попит зі структурою магазину, визначимо корисні сторінки категорій і фільтрів, підготуємо метатеги та внутрішні посилання.</p>
    <p class="hs-service-result"><strong>Результат:</strong> погоджена карта SEO-посадкових і пріоритети впровадження.</p>
    <a href="<?php echo esc_url(mrseo_url('ecommerce-seo','uk'));?>">Докладніше про SEO магазинів <span aria-hidden="true">↗</span></a>
   </article>
   <article class="hs-service-card" id="hs-audit">
    <span class="hs-service-number">03 / ДІАГНОСТИКА</span>
    <h3>SEO-аудит магазину</h3>
    <p class="hs-service-pain">Google індексує зайві URL або не знаходить важливі сторінки каталогу.</p>
    <p>Перевіримо індексацію, canonical, сторінки фільтрів, sitemap і внутрішню навігацію. Відділимо налаштування Хорошоп від проблем контенту й структури.</p>
    <p class="hs-service-result"><strong>Результат:</strong> звіт з URL, доказами та пріоритетами; виправлення погоджуються окремо.</p>
    <a href="<?php echo esc_url(mrseo_url('seo-audit','uk'));?>">Як проходить SEO-аудит <span aria-hidden="true">↗</span></a>
   </article>
   <article class="hs-service-card" id="hs-ads">
    <span class="hs-service-number">04 / РЕКЛАМА</span>
    <h3>Google Ads для Хорошоп</h3>
    <p class="hs-service-pain">Реклама витрачає бюджет, а незрозуміло, які товари та кампанії приносять замовлення.</p>
    <p>Перевіримо відстеження покупок, групування товарів і структуру Shopping або Performance Max. Визначимо, які витрати та результати потрібно контролювати.</p>
    <p class="hs-service-result"><strong>Результат:</strong> план кампаній і перевірені конверсії перед масштабуванням.</p>
    <a href="<?php echo esc_url(mrseo_url('google-ads','uk'));?>">Послуги Google Ads <span aria-hidden="true">↗</span></a>
   </article>
   <article class="hs-service-card" id="hs-feeds">
    <span class="hs-service-number">05 / ТОВАРНІ ДАНІ</span>
    <h3>Товарні фіди та Merchant Center</h3>
    <p class="hs-service-pain">Google відхиляє товари через ціни, залишки, характеристики або невідповідності на сайті.</p>
    <p>Зіставимо дані фіда зі сторінками товарів та оформленням замовлень, знайдемо причини відхилень і підготуємо доступні виправлення.</p>
    <p class="hs-service-result"><strong>Результат:</strong> перелік виправлених або переданих на перевірку помилок; розблокування не гарантуємо.</p>
    <a href="<?php echo esc_url(mrseo_url('merchant-center','uk'));?>">Робота з Merchant Center <span aria-hidden="true">↗</span></a>
   </article>
   <article class="hs-service-card" id="hs-ga4">
    <span class="hs-service-number">06 / АНАЛІТИКА</span>
    <h3>GA4 та конверсії магазину</h3>
    <p class="hs-service-pain">У Google Ads показано покупки, але цифри не збігаються з реальними замовленнями.</p>
    <p>Перевіримо подію purchase, суму замовлення, дублікати транзакцій та передачу конверсій у рекламу з урахуванням доступних інтеграцій.</p>
    <p class="hs-service-result"><strong>Результат:</strong> протокол тестових замовлень і знайдених розбіжностей, виправлення в узгодженому обсязі.</p>
    <a href="<?php echo esc_url(mrseo_url('ga4-conversions','uk'));?>">Налаштування GA4 <span aria-hidden="true">↗</span></a>
   </article>
  </div>
  <p class="hs-services-footnote">Якщо потрібні функції, яких немає в поточному тарифі або налаштуваннях Хорошоп, окремо погодимо альтернативу. Не обіцяємо змін, які платформа не підтримує.</p>
 </div>
</section>
<?php endif; ?>
<section class="ukseo-faq" aria-labelledby="ukhoroshop-faq-title"><div class="container ukseo-faq-grid">
 <div><span class="ukseo-kicker">ВАЖЛИВО ЗНАТИ</span><h2 id="ukhoroshop-faq-title">Питання про Хорошоп.</h2><p>Дотримуємося можливостей і правил платформи.</p></div>
 <div class="ukseo-faq-items">
  <details><summary>Чи можна налаштувати SEO-фільтри для Google?<span aria-hidden="true">+</span></summary><p>У Хорошоп передбачені інструменти для SEO-сторінок фільтрів. Які комбінації корисні, визначаємо за попитом і технічними можливостями конкретного каталогу.</p></details>
  <details><summary>Чи потрібно створювати новий магазин?<span aria-hidden="true">+</span></summary><p>Ні, якщо поточний магазин можна покращити. Спочатку перевіряємо структуру, налаштування та наявні обмеження.</p></details>
  <details><summary>Чи можете допомогти з відхиленнями товарів у Merchant Center?<span aria-hidden="true">+</span></summary><p>Так, аналізуємо діагностику, товарні дані та відповідність магазину фіду. Рішення залежить від причини відхилення та правил Google.</p></details>
 </div>
</div></section>
<section class="ukseo-final" aria-labelledby="ukhoroshop-final-title"><div class="container ukseo-final-grid">
 <div><?php if(mrseo_locale()==='uk')mrseo_pue_art('hs-next','pue-hs-next');?><span class="ukseo-kicker">ПЕРШИЙ КРОК</span><h2 id="ukhoroshop-final-title">Магазин працює. <em>Знайдімо, що стримує його зростання.</em></h2><p>Надішліть адресу вашого магазину й коротко опишіть проблему. Почнемо з перевірки того, що справді впливає на результат.</p></div>
 <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact'));?>">Обговорити Хорошоп <span aria-hidden="true">↗</span></a>
</div></section>
</div>
<?php get_footer();?>
