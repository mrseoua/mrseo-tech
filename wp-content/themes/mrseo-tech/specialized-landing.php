<?php
if(!defined('ABSPATH'))exit;
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
   <div class="eyebrow"><?php echo esc_html(mrseo_t('SEO ДЛЯ ХОРОШОП · ОФІЦІЙНИЙ ПАРТНЕР','SEO ДЛЯ ХОРОШОП · ОФИЦИАЛЬНЫЙ ПАРТНЁР','HOROSHOP SEO'));?></div>
   <h1 id="horoshop-title"><?php echo wp_kses_post(mrseo_t('SEO для Хорошоп.<br><em>Знаходимо, що заважає продажам.</em>','SEO для Хорошоп.<br><em>Находим, что мешает продажам.</em>','Horoshop SEO. Find the growth barriers.'));?></h1>
   <p><?php echo esc_html(mrseo_t(
    'Категорії не видно в Google, фільтри створюють дублі або товари не проходять Merchant Center? Перевіримо причину та запропонуємо рішення з урахуванням можливостей Хорошоп.',
    'Категории не видны в Google, фильтры создают дубли или Merchant Center отклоняет товары? Найдём причину и предложим решение с учётом возможностей Хорошоп.',
    'We diagnose catalog and shopping feed issues and prioritize practical fixes.'
   ));?></p>
   <a class="btn hs-hero-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити свій магазин','Обсудить свой магазин','Discuss your store'));?> <span aria-hidden="true">↗</span></a>
   <div class="hs-hero-note"><?php echo esc_html(mrseo_t('Спочатку діагностика — потім конкретний план дій.','Сначала диагностика — затем конкретный план действий.','Diagnose first, then act.'));?></div>
  </div>
  <div class="hs-showcase" aria-label="<?php echo esc_attr(mrseo_t('Інтерактивний приклад SEO для Хорошоп','Интерактивный пример SEO для Хорошоп','Horoshop SEO interactive demonstration'));?>">
   <div class="hs-showcase-header">
    <div class="hs-authentic-logo"><span class="hs-logo-mask"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-partner-active.svg');?>" alt="<?php echo esc_attr(mrseo_t('Логотип Хорошоп','Логотип Хорошоп','Horoshop logo'));?>" width="240" height="178" loading="eager" decoding="async"></span><span class="hs-logo-caption">SEO STUDIO</span></div>
    <img class="hs-official-badge" src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-partner-active.svg');?>" alt="<?php echo esc_attr(mrseo_t('Хорошоп Partner ACTIVE — офіційний партнер','Хорошоп Partner ACTIVE — официальный партнёр','Horoshop Partner ACTIVE'));?>" width="95" height="70" loading="eager" decoding="async">
   </div>
   <div class="hs-demo" data-hs-scene="0">
    <div class="hs-demo-meta"><span><?php echo esc_html(mrseo_t('ЗАВДАННЯ МАГАЗИНУ','ЗАДАЧА МАГАЗИНА','STORE CHALLENGE'));?></span><span class="hs-demo-count" data-hs-count>01 / 03</span></div>
    <h2 class="hs-demo-problem" data-hs-problem><?php echo esc_html(mrseo_t('Категорії не знаходять у Google','Категории не находят в Google','Categories are not discoverable'));?></h2>
    <div class="hs-demo-flow" aria-hidden="true">
     <div class="hs-flow-input">
      <div class="hs-flow-illustration"><i></i><i></i><i></i></div>
      <strong data-hs-source><?php echo esc_html(mrseo_t('Структура каталогу','Структура каталога','Catalog structure'));?></strong>
     </div>
     <div class="hs-flow-scan"><div class="hs-scan-core">SEO</div></div>
     <div class="hs-flow-output"><span class="hs-flow-mark">↗</span><strong data-hs-target><?php echo esc_html(mrseo_t('Сторінки під попит','Страницы под спрос','Demand-led pages'));?></strong></div>
    </div>
    <div class="hs-demo-solution"><span><?php echo esc_html(mrseo_t('НАШЕ РІШЕННЯ','НАШЕ РЕШЕНИЕ','OUR APPROACH'));?></span><p data-hs-solution><?php echo esc_html(mrseo_t('Формуємо посадкові сторінки під реальні пошукові запити.','Создаём посадочные страницы под реальные поисковые запросы.','Create pages for actual search demand.'));?></p></div>
   </div>
   <div class="hs-switcher" role="group" aria-label="<?php echo esc_attr(mrseo_t('Оберіть проблему магазину','Выберите проблему магазина','Choose a store issue'));?>">
    <button type="button" class="hs-switch is-active" data-hs-step="0" aria-pressed="true"
      data-hs-problem="<?php echo esc_attr(mrseo_t('Категорії не знаходять у Google','Категории не находят в Google',''));?>"
      data-hs-source="<?php echo esc_attr(mrseo_t('Структура каталогу','Структура каталога',''));?>"
      data-hs-target="<?php echo esc_attr(mrseo_t('Сторінки під попит','Страницы под спрос',''));?>"
      data-hs-solution="<?php echo esc_attr(mrseo_t('Формуємо посадкові сторінки під реальні пошукові запити.','Создаём посадочные страницы под реальные поисковые запросы.',''));?>"><span>01</span><?php echo esc_html(mrseo_t('Категорії','Категории','Categories'));?></button>
    <button type="button" class="hs-switch" data-hs-step="1" aria-pressed="false"
      data-hs-problem="<?php echo esc_attr(mrseo_t('Фільтри створюють зайві URL','Фильтры создают лишние URL',''));?>"
      data-hs-source="<?php echo esc_attr(mrseo_t('URL фільтрів','URL фильтров',''));?>"
      data-hs-target="<?php echo esc_attr(mrseo_t('Правила індексації','Правила индексации',''));?>"
      data-hs-solution="<?php echo esc_attr(mrseo_t('Відділяємо корисні сторінки від технічних дублів.','Отделяем полезные страницы от технических дублей.',''));?>"><span>02</span><?php echo esc_html(mrseo_t('Фільтри','Фильтры','Filters'));?></button>
    <button type="button" class="hs-switch" data-hs-step="2" aria-pressed="false"
      data-hs-problem="<?php echo esc_attr(mrseo_t('Merchant Center відхиляє товари','Merchant Center отклоняет товары',''));?>"
      data-hs-source="<?php echo esc_attr(mrseo_t('Дані товарів','Данные товаров',''));?>"
      data-hs-target="<?php echo esc_attr(mrseo_t('Коректний фід','Корректный фид',''));?>"
      data-hs-solution="<?php echo esc_attr(mrseo_t('Перевіряємо ціни, наявність і атрибути товарів.','Проверяем цены, наличие и атрибуты товаров.',''));?>"><span>03</span><?php echo esc_html(mrseo_t('Товарний фід','Товарный фид','Product feed'));?></button>
   </div>
   <div class="hs-demo-disclaimer"><?php echo esc_html(mrseo_t('Інтерактивна схема — без вигаданих результатів','Интерактивная схема — без выдуманных результатов','Interactive illustration — no fabricated results'));?></div>
  </div>
 </div>
</section>
<?php else:?>
<section class="special-hero"><div class="container"><div class="eyebrow"><?php echo esc_html(mrseo_t('САЙТИ ПОСЛУГ / SEO','САЙТЫ УСЛУГ / SEO','SERVICE WEBSITES / SEO'));?></div><h1><?php echo esc_html($title);?></h1><p><?php echo esc_html($intro);?></p><a class="btn" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити ваш сайт','Обсудить ваш сайт','Discuss your website'));?> ↗</a></div></section>
<?php endif;?>
<?php mrseo_render_customer_journey(mrseo_slug());?>
<span id="common-problems" aria-hidden="true"></span>
<section class="special-work" id="special-solutions"><div class="container"><div class="eyebrow">01 / <?php echo esc_html(mrseo_t('ЩО МИ РОБИМО','ЧТО МЫ ДЕЛАЕМ','HOW WE HELP'));?></div><h2><?php echo esc_html(mrseo_t('Від проблеми до зрозумілого плану дій','От проблемы к понятному плану действий','From problems to an actionable plan'));?></h2><div class="special-work-grid"><?php foreach($steps as $i=>$item):?><article><span>0<?php echo esc_html($i+1);?> /</span><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></article><?php endforeach;?></div></div></section>
<section class="special-value"><div class="container"><div class="eyebrow"><?php echo esc_html(mrseo_t('ЯК ВИГЛЯДАЄ РЕЗУЛЬТАТ РОБОТИ','ЧТО ВЫ ПОЛУЧАЕТЕ','WHAT YOU RECEIVE'));?></div><h2><?php echo esc_html(mrseo_t('Не абстрактні обіцянки — зрозумілі результати роботи.','Не абстрактные обещания — понятный результат работы.','Clear deliverables, not vague promises.'));?></h2><div class="special-value-list"><?php $items=$is_horoshop?array(mrseo_t('Структура категорій і фільтрів під пошуковий попит','Структура категорий и фильтров под поисковый спрос','Demand-led category and facet architecture'),mrseo_t('Правила індексації й перевірка технічних обмежень платформи','Правила индексации и проверка ограничений платформы','Indexing rules and platform constraints review'),mrseo_t('Товарні дані та вимірювання ефективності рекламних кампаній','Товарные данные и измерение эффективности рекламы','Product data and campaign measurement')):array(mrseo_t('Окремі сторінки під важливі послуги та локації','Отдельные страницы под ключевые услуги и локации','Dedicated pages for important services and locations'),mrseo_t('Зрозуміла форма звернення та шлях користувача до заявки','Понятная форма обращения и путь к заявке','A clear enquiry flow'),mrseo_t('Контроль заявок і джерел звернень','Контроль заявок и источников обращений','Lead and acquisition measurement'));foreach($items as $i=>$item):?><div><span>0<?php echo esc_html($i+1);?></span><strong><?php echo esc_html($item);?></strong><span>✓</span></div><?php endforeach;?></div></div></section><section class="special-final"><div class="container"><h2><?php echo esc_html(mrseo_t('Розберімо вашу ситуацію.','Разберём вашу ситуацию.','Let us look at your situation.'));?></h2><p><?php echo esc_html(mrseo_t('Почнемо з цілей бізнесу й реальних обмежень, а не з універсального пакета послуг.','Начнём с целей бизнеса и реальных ограничений, а не универсального пакета услуг.','We start with your goals and constraints, not a one-size-fits-all package.'));?></p><a class="btn" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Зв’язатися','Связаться','Get in touch'));?> ↗</a></div></section>
<?php get_footer();?>