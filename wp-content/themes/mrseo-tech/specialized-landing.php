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
      <div class="eyebrow"><?php echo esc_html(mrseo_t('SEO ТА РОЗВИТОК МАГАЗИНІВ НА ХОРОШОП','SEO И РАЗВИТИЕ МАГАЗИНОВ НА ХОРОШОП','HOROSHOP SEO'));?></div>
      <h1 id="horoshop-title"><?php echo esc_html(mrseo_t(
        'SEO для Хорошоп: магазин є, а покупців із Google замало?',
        'SEO для Хорошоп: магазин есть, а покупателей из Google мало?',
        'Horoshop SEO: where are your Google customers?'
      ));?></h1>
      <p><?php echo esc_html(mrseo_t(
        'Категорії не знаходять у пошуку? Фільтри створюють дублі? Товари не проходять перевірку Merchant Center? Знаходимо реальні причини, виправляємо те, що дозволяє Хорошоп, і перевіряємо вплив на заявки та продажі.',
        'Категории не находят в поиске? Фильтры создают дубли? Merchant Center отклоняет товары? Находим причины, исправляем то, что позволяет Хорошоп, и проверяем влияние на заявки и продажи.',
        'We diagnose catalog, indexation and product feed issues to improve discoverability.'
      ));?></p>
      <a class="btn" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Розібрати проблеми магазину','Разобрать проблемы магазина','Discuss your store'));?> <span aria-hidden="true">↗</span></a>
      <div class="hs-hero-points" aria-label="<?php echo esc_attr(mrseo_t('Основні напрями роботи','Основные направления работы','Scope'));?>">
        <span><?php echo esc_html(mrseo_t('SEO категорій','SEO категорий','Category SEO'));?></span>
        <span><?php echo esc_html(mrseo_t('Індексація фільтрів','Индексация фильтров','Filter indexing'));?></span>
        <span>Merchant Center</span>
      </div>
    </div>
    <div class="hs-visual" aria-hidden="true">
      <div class="hs-visual-top">
        <b>HOROSHOP <span aria-hidden="true">/</span> SEO SYSTEM</b>
        <span class="hs-live"><i></i><?php echo esc_html(mrseo_t('ІНТЕРАКТИВНИЙ ПРИКЛАД','ИНТЕРАКТИВНЫЙ ПРИМЕР','INTERACTIVE DEMO'));?></span>
      </div>
      
      <div class="hs-browser-zone">
        <div class="hs-browser">
          <div class="hs-browser-bar"><i></i><i></i><i></i><span class="hs-browser-address" data-hs-address>shop.example /catalog/</span></div>
          <div class="hs-store-head"><div class="hs-store-logo"><span class="hs-brand-crop"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-partner-active.svg');?>" width="190" height="141" alt="<?php echo esc_attr(mrseo_t('Логотип Хорошоп','Логотип Хорошоп','Horoshop'));?>" loading="eager" decoding="async"></span></div><div class="hs-store-nav"><i></i><i></i><i></i></div></div>
          <div class="hs-store-banner"><strong data-hs-browser-title><?php echo esc_html(mrseo_t('Каталог товарів','Каталог товаров','Product catalog'));?></strong><span><?php echo esc_html(mrseo_t('Категорії · Бренди · Моделі','Категории · Бренды · Модели','Categories · Brands · Models'));?></span></div>
          <div class="hs-product-grid">
            <div class="hs-product"><div class="hs-product-thumb"></div><i></i><small></small></div>
            <div class="hs-product"><div class="hs-product-thumb"></div><i></i><small></small></div>
            <div class="hs-product"><div class="hs-product-thumb"></div><i></i><small></small></div>
          </div>
        </div>
        <div class="hs-seo-orbit"><div><b>SEO</b><small data-hs-stage-label><?php echo esc_html(mrseo_t('КАТАЛОГ','КАТАЛОГ','CATALOG'));?></small></div></div>
        <img class="hs-partner-badge" src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-partner-active.svg');?>" alt="<?php echo esc_attr(mrseo_t('Хорошоп Partner ACTIVE — офіційний партнер','Хорошоп Partner ACTIVE — официальный партнёр','Horoshop Partner ACTIVE'));?>" width="120" height="89" loading="eager" decoding="async">
      </div>
      <div class="hs-visual-title">
        <span><?php echo esc_html(mrseo_t('ЗНАХОДИМО ПРОБЛЕМУ','НАХОДИМ ПРОБЛЕМУ','IDENTIFY ISSUE'));?></span>
        <span><?php echo esc_html(mrseo_t('ПРОПОНУЄМО РІШЕННЯ','ПРЕДЛАГАЕМ РЕШЕНИЕ','PROPOSE FIX'));?></span>
      </div>
      <div class="hs-fix-list">
        <button type="button" class="hs-fix is-active" data-hs-step="0" aria-pressed="true" data-hs-title="<?php echo esc_attr(mrseo_t('Категорії не отримують трафік','Категории не получают трафик',''));?>" data-hs-description="<?php echo esc_attr(mrseo_t('Порівнюємо пошукові запити з деревом каталогу. Пропонуємо сторінки під реальний попит та перевіряємо їх індексацію — у межах можливостей Хорошоп.','Сверяем спрос со структурой каталога. Предлагаем посадочные страницы под реальные запросы и проверяем индексацию с учётом возможностей Хорошоп.',''));?>" data-hs-browser="<?php echo esc_attr(mrseo_t('Каталог і SEO-сторінки','Каталог и SEO-страницы',''));?>" data-hs-orbit="<?php echo esc_attr(mrseo_t('КАТАЛОГ','КАТАЛОГ',''));?>" data-hs-address="shop.example /catalog/"><span class="hs-fix-issue"><?php echo esc_html(mrseo_t('Категорії не видно','Категории не видны',''));?></span><span class="hs-fix-arrow" aria-hidden="true">→</span><span class="hs-fix-solution"><?php echo esc_html(mrseo_t('Посадкові під попит','Посадочные под спрос',''));?></span></button>
        <button type="button" class="hs-fix" data-hs-step="1" aria-pressed="false" data-hs-title="<?php echo esc_attr(mrseo_t('Фільтри створюють дублікати URL','Фильтры создают дубли URL',''));?>" data-hs-description="<?php echo esc_attr(mrseo_t('Розділяємо корисні комбінації та технічні адреси. Перевіряємо canonical, sitemap, внутрішні посилання й доступні налаштування індексації.','Разделяем полезные комбинации фильтров и технические адреса. Проверяем canonical, sitemap, ссылки и доступные настройки индексации.',''));?>" data-hs-browser="<?php echo esc_attr(mrseo_t('Керування фільтрами','Управление фильтрами',''));?>" data-hs-orbit="<?php echo esc_attr(mrseo_t('ФІЛЬТРИ','ФИЛЬТРЫ',''));?>" data-hs-address="shop.example /filter/"><span class="hs-fix-issue"><?php echo esc_html(mrseo_t('Дублі фільтрів','Дубли фильтров',''));?></span><span class="hs-fix-arrow" aria-hidden="true">→</span><span class="hs-fix-solution"><?php echo esc_html(mrseo_t('Правила індексації','Правила индексации',''));?></span></button>
        <button type="button" class="hs-fix" data-hs-step="2" aria-pressed="false" data-hs-title="<?php echo esc_attr(mrseo_t('Merchant Center не приймає товари','Merchant Center отклоняет товары',''));?>" data-hs-description="<?php echo esc_attr(mrseo_t('Звіряємо ціни, наявність, назви й атрибути на сайті та у фіді; перевіряємо діагностику Merchant Center і коректність подій покупки.','Сверяем цены, наличие, названия и атрибуты на сайте и в фиде; проверяем диагностику Merchant Center и события покупки.',''));?>" data-hs-browser="<?php echo esc_attr(mrseo_t('Товари й товарний фід','Товары и товарный фид',''));?>" data-hs-orbit="<?php echo esc_attr(mrseo_t('ТОВАРИ','ТОВАРЫ',''));?>" data-hs-address="shop.example /products/"><span class="hs-fix-issue"><?php echo esc_html(mrseo_t('Помилки фіда','Ошибки фида',''));?></span><span class="hs-fix-arrow" aria-hidden="true">→</span><span class="hs-fix-solution"><?php echo esc_html(mrseo_t('Перевірка товарів','Проверка товаров',''));?></span></button>
      </div>
      <div class="hs-diagnostic" aria-live="polite" aria-atomic="true">
        <div class="hs-diagnostic-icon" aria-hidden="true">✓</div>
        <div><span class="hs-diagnostic-label"><?php echo esc_html(mrseo_t('ЩО РОБИМО НА ПРАКТИЦІ','ЧТО ДЕЛАЕМ НА ПРАКТИКЕ','WHAT WE DO'));?></span><strong data-hs-detail-title><?php echo esc_html(mrseo_t('Категорії не отримують трафік','Категории не получают трафик',''));?></strong><p data-hs-detail><?php echo esc_html(mrseo_t('Порівнюємо пошукові запити з деревом каталогу. Пропонуємо сторінки під реальний попит та перевіряємо їх індексацію — у межах можливостей Хорошоп.','Сверяем спрос со структурой каталога. Предлагаем посадочные страницы под реальные запросы и проверяем индексацию с учётом возможностей Хорошоп.',''));?></p></div>
      </div>
      <div class="hs-visual-foot"><span><?php echo esc_html(mrseo_t('СХЕМА, НЕ ДАНІ КЛІЄНТА','СХЕМА, НЕ ДАННЫЕ КЛИЕНТА','ILLUSTRATION ONLY'));?></span><span><?php echo esc_html(mrseo_t('ПЕРЕВІРЮВАНІ ЗМІНИ','ПРОВЕРЯЕМЫЕ ИЗМЕНЕНИЯ','VERIFIABLE CHANGES'));?> <span aria-hidden="true">↗</span></span></div>
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