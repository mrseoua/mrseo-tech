<?php
if(!defined('ABSPATH'))exit;
// Ukrainian service redesign only. Preserve other locales and approved Horoshop hero.
if(mrseo_locale()==='uk'){
 if(mrseo_slug()==='horoshop'){require get_template_directory().'/horoshop-uk.php';return;}
 if(mrseo_slug()==='service-websites'){require get_template_directory().'/uk-solution-page.php';return;}
}
$is_horoshop=mrseo_slug()==='horoshop';
if($is_horoshop){
$title=mrseo_t('Магазин на Хорошоп є. А його потенціал у Google реалізований?','Магазин на Хорошоп есть. А его потенциал в Google раскрыт?','Your Horoshop store is live. Is it discoverable?');
$intro=mrseo_t('Створюємо, налаштовуємо й просуваємо інтернет-магазини на Хорошоп. Працюємо з каталогом, індексацією, товарними даними, рекламою та аналітикою.','Создаём, настраиваем и продвигаем интернет-магазины на Хорошоп. Работаем с каталогом, индексацией, товарными данными, рекламой и аналитикой.','We build, configure and optimize Horoshop stores, covering catalog architecture, indexing, product data, ads and analytics.');
$steps=array(
array(mrseo_t('Створення та налаштування','Создание и настройка','Build and configure'),mrseo_t('Структура каталогу, категорії, навігація, базові сторінки та готовність до запуску.','Структура каталога, категории, навигация, основные страницы и готовность к запуску.','Catalog structure, category navigation, essential pages and launch readiness.')),
array(mrseo_t('SEO для Хорошоп','SEO для Хорошоп','Horoshop SEO'),mrseo_t('Семантика, метатеги, фільтри, перелінкування та контроль індексації з урахуванням можливостей платформи.','Семантика, метатеги, фильтры, перелинковка и контроль индексации с учётом возможностей платформы.','Keyword mapping, metadata, facets, internal links and indexing within platform capabilities.')),
array(mrseo_t('Реклама й аналітика','Реклама и аналитика','Ads and analytics'),mrseo_t('Google Merchant Center, кампанії Google Ads та перевірка вимірювання покупок.','Google Merchant Center, кампании Google Ads и проверка измерения покупок.','Merchant Center, Google Ads campaigns and purchase tracking verification.')));
}else{
$title=mrseo_t('Сайт послуг є, а звернень недостатньо?','Сайт услуг есть, а обращений недостаточно?','Your service website is live. Where are the enquiries?');
$intro=mrseo_t('Створюємо та просуваємо сайти для компаній і фахівців, яким потрібні заявки. Допомагаємо людям знайти вашу послугу, зрозуміти переваги й легко зв’язатися.','Создаём и продвигаем сайты компаний и специалистов, которым нужны заявки. Помогаем людям найти услугу, понять преимущества и легко связаться.','We build and optimize websites for service businesses, helping people discover the right offer and make contact.');
$steps=array(
array(mrseo_t('Розробка сайту послуг','Разработка сайта услуг','Service website development'),mrseo_t('Зрозуміла структура, адаптивний дизайн, посадкові сторінки та зручні форми звернення.','Понятная структура, адаптивный дизайн, посадочные страницы и удобные формы обращения.','Clear architecture, mobile-friendly design, landing pages and simple enquiry forms.')),
array(mrseo_t('SEO-просування послуг','SEO-продвижение услуг','Service SEO'),mrseo_t('Семантика, окремі сторінки послуг, локальна релевантність, технічна оптимізація й внутрішні посилання.','Семантика, отдельные страницы услуг, локальная релевантность, техническая оптимизация и внутренние ссылки.','Keyword research, service-specific landing pages, local relevance, technical SEO and internal links.')),
array(mrseo_t('Заявки та вимірювання','Заявки и измерение','Leads and measurement'),mrseo_t('Контактні сценарії, перевірка цільових подій та аналіз джерел звернень.','Контактные сценарии, проверка целевых событий и анализ источников обращений.','Enquiry flows, conversion tracking validation and lead source analysis.')));
}
$storyCopy=mrseo_customer_journey_copy(mrseo_slug());if($storyCopy){$title=$storyCopy['headline'];$intro=$storyCopy['lead'];}
get_header();?>
<?php if($is_horoshop):?>
<section class="special-hero special-hero-horoshop" aria-labelledby="horoshop-title">
 <div class="container hs-hero-layout">
  <div class="hs-hero-copy">
   <div class="eyebrow"><?php echo esc_html(mrseo_t('SEO ТА РОЗВИТОК МАГАЗИНІВ НА ХОРОШОП','SEO И РАЗВИТИЕ МАГАЗИНОВ НА ХОРОШОП','HOROSHOP SEO'));?></div>
   <h1 id="horoshop-title"><?php echo wp_kses_post(mrseo_t('SEO для Хорошоп.<br><em>Ваш магазин може більше.</em>','SEO для Хорошоп.<br><em>Ваш магазин может больше.</em>','Horoshop SEO. Your store can do more.'));?></h1>
   <p><?php echo esc_html(mrseo_t(
    'Категорії не знаходять у Google? Фільтри заважають індексації? Merchant Center відхиляє товари? Знаходимо причину, підбираємо рішення в межах можливостей Хорошоп і перевіряємо результат.',
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
<?php else:?>
<section class="special-hero special-hero-websites">
 <div class="container special-hero-layout">
  <div class="special-websites-copy">
   <div class="eyebrow"><?php echo esc_html(mrseo_t('СТВОРЕННЯ САЙТІВ ПІД ЗАЯВКИ','СОЗДАНИЕ САЙТОВ ПОД ЗАЯВКИ','WEBSITES BUILT FOR ENQUIRIES'));?></div>
   <h1><?php echo esc_html($title);?></h1>
   <p><?php echo esc_html($intro);?></p>
   <a class="btn" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити ваш сайт','Обсудить ваш сайт','Discuss your website'));?> ↗</a>
  </div>
  <?php mrseo_render_motion_scene('service-websites');?>
 </div>
</section>
<?php endif;?>
<?php mrseo_render_customer_journey(mrseo_slug());?>
<span id="common-problems" aria-hidden="true"></span>
<section class="special-work" id="special-solutions"><div class="container"><div class="eyebrow">01 / <?php echo esc_html(mrseo_t('ЩО МИ РОБИМО','ЧТО МЫ ДЕЛАЕМ','HOW WE HELP'));?></div><h2><?php echo esc_html(mrseo_t('Від проблеми до зрозумілого плану дій','От проблемы к понятному плану действий','From problems to an actionable plan'));?></h2><div class="special-work-grid"><?php foreach($steps as $i=>$item):?><article><span>0<?php echo esc_html($i+1);?> /</span><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></article><?php endforeach;?></div></div></section>
<section class="special-value"><div class="container"><div class="eyebrow"><?php echo esc_html(mrseo_t('ЯК ВИГЛЯДАЄ РЕЗУЛЬТАТ РОБОТИ','ЧТО ВЫ ПОЛУЧАЕТЕ','WHAT YOU RECEIVE'));?></div><h2><?php echo esc_html(mrseo_t('Не абстрактні обіцянки — зрозумілі результати роботи.','Не абстрактные обещания — понятный результат работы.','Clear deliverables, not vague promises.'));?></h2><div class="special-value-list"><?php $items=$is_horoshop?array(mrseo_t('Структура категорій і фільтрів під пошуковий попит','Структура категорий и фильтров под поисковый спрос','Demand-led category and facet architecture'),mrseo_t('Правила індексації й перевірка технічних обмежень платформи','Правила индексации и проверка ограничений платформы','Indexing rules and platform constraints review'),mrseo_t('Товарні дані та вимірювання ефективності рекламних кампаній','Товарные данные и измерение эффективности рекламы','Product data and campaign measurement')):array(mrseo_t('Окремі сторінки під важливі послуги та локації','Отдельные страницы под ключевые услуги и локации','Dedicated pages for important services and locations'),mrseo_t('Зрозуміла форма звернення та шлях користувача до заявки','Понятная форма обращения и путь к заявке','A clear enquiry flow'),mrseo_t('Контроль заявок і джерел звернень','Контроль заявок и источников обращений','Lead and acquisition measurement'));foreach($items as $i=>$item):?><div><span>0<?php echo esc_html($i+1);?></span><strong><?php echo esc_html($item);?></strong><span>✓</span></div><?php endforeach;?></div></div></section><section class="special-final"><div class="container"><h2><?php echo esc_html(mrseo_t('Розберімо вашу ситуацію.','Разберём вашу ситуацию.','Let us look at your situation.'));?></h2><p><?php echo esc_html(mrseo_t('Почнемо з цілей бізнесу й реальних обмежень, а не з універсального пакета послуг.','Начнём с целей бизнеса и реальных ограничений, а не универсального пакета услуг.','We start with your goals and constraints, not a one-size-fits-all package.'));?></p><a class="btn" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Зв’язатися','Связаться','Get in touch'));?> ↗</a></div></section>
<?php get_footer();?>