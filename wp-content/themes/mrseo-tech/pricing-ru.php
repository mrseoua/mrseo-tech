<?php
if(!defined('ABSPATH'))exit;
$groups=array(
 array('01','SEO-продвижение','seo','search',array(
  array('Локальное SEO','6 000','/ месяц','local-seo'),
  array('SEO сайтов услуг','8 000','/ месяц','service-business-seo'),
  array('SEO интернет-магазинов','10 000','/ месяц','ecommerce-seo'),
  array('SEO-аудит','3 000','разово','seo-audit')
 ),'Объём оптимизации, страницы и приоритетные задачи согласуем на старте.'),
 array('02','Google Ads','google-ads','ads',array(
  array('Настройка и ведение Google Ads','5 000','/ месяц','google-ads'),
  array('Performance Max','6 000','/ месяц','performance-max')
 ),'Работа с рекламными кампаниями и их эффективностью. Рекламный бюджет оплачивается отдельно.'),
 array('03','Хорошоп','horoshop','shop',array(
  array('SEO и Google Ads для магазина',null,'','horoshop')
 ),'Стоимость зависит от каталога, рекламных кампаний и выбранных услуг. Расчёт по тарифам SEO и Google Ads после оценки магазина.'),
 array('04','Создание сайтов','service-websites','web',array(
  array('Лендинг','8 000','за проект','landing-pages'),
  array('Сайт на WordPress','12 000','за проект','wordpress-development'),
  array('Корпоративный сайт','20 000','за проект','corporate-websites')
 ),'Согласуем структуру, дизайн, функциональность и наполнение до начала работ.'),
 array('05','Веб-разработка','web-development','dev',array(
  array('AI-агенты и автоматизация','10 000','за проект','business-automation'),
  array('CRM и сложная разработка',null,'','crm-development')
 ),'Оцениваем бизнес-процесс, интеграции и функциональные требования. Стоимость сложных систем определяем индивидуально.')
);
$icons=array('search'=>'<circle cx="10" cy="10" r="6"/><path d="m15 15 6 6"/>','ads'=>'<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/>','shop'=>'<path d="M4 8h16l1 13H3zM8 8V6a4 4 0 0 1 8 0v2"/>','web'=>'<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M7 6.5h.1M10 6.5h.1"/>','dev'=>'<path d="m8 6-6 6 6 6m8-12 6 6-6 6m-3-15-5 18"/>');
get_header();?>
<div class="mp-price">
 <section class="mp-price-hero mp-price-wrap">
  <div><span class="mp-kicker">СТОИМОСТЬ УСЛУГ / MRSEO.TECH</span>
   <h1>Стоимость услуг.<br><em>Профессиональный уровень без лишних наценок.</em></h1>
   <p>Понятные стартовые цены на SEO, Google Ads, создание сайтов и разработку. Согласуем объём работ и стоимость до начала сотрудничества.</p>
   <a class="mp-button" href="#mp-tariffs">Посмотреть цены <span aria-hidden="true">↓</span></a>
  </div>
  <div class="mp-price-feature"><span class="mp-kicker">КОМПЛЕКСНОЕ ПРОДВИЖЕНИЕ</span><h2>SEO + Google Ads</h2><p class="mp-big">от <strong>13 000</strong><small>грн / месяц</small></p><p>Поисковая видимость и рекламные кампании в рамках согласованного плана. Рекламный бюджет отдельно.</p><a href="<?php echo esc_url(mrseo_url('contact','ru'));?>">Обсудить сотрудничество ↗</a></div>
 </section>
 <section id="mp-tariffs" class="mp-price-wrap mp-tariffs" aria-labelledby="mp-tariffs-title">
  <div class="mp-section-head"><span class="mp-kicker">05 / НАПРАВЛЕНИЯ РАБОТЫ</span><h2 id="mp-tariffs-title">Выберите нужную услугу</h2><p>Все цены указаны в гривнах. Это стартовая стоимость, а не фиксированная смета для любого проекта.</p></div>
  <div class="mp-grid">
  <?php foreach($groups as $group):?>
   <article class="mp-card" data-pricing-group="<?php echo esc_attr($group[2]);?>">
    <div class="mp-card-head"><span class="mp-symbol"><svg viewBox="0 0 24 24" width="29" height="29" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $icons[$group[3]];?></svg></span><span class="mp-number"><?php echo esc_html($group[0]);?></span></div>
    <h3><a href="<?php echo esc_url(mrseo_url($group[2],'ru'));?>"><?php echo esc_html($group[1]);?> ↗</a></h3>
    <div class="mp-rates"><?php foreach($group[4] as $rate):?>
     <div class="mp-rate"><a href="<?php echo esc_url(mrseo_url($rate[3],'ru'));?>"><?php echo esc_html($rate[0]);?></a><span class="mp-rate-amount"><?php if($rate[1]!==null):?><small>от</small> <strong><?php echo esc_html($rate[1]);?></strong> <small>грн <?php echo esc_html($rate[2]);?></small><?php else:?><strong class="mp-custom">Индивидуально</strong><?php endif;?></span></div>
    <?php endforeach;?></div>
    <p class="mp-note"><?php echo esc_html($group[5]);?></p>
   </article>
  <?php endforeach;?>
  </div>
 </section>
 <section class="mp-price-wrap mp-conditions" aria-labelledby="mp-conditions-title"><div><span class="mp-kicker">ПРОЗРАЧНЫЕ УСЛОВИЯ</span><h2 id="mp-conditions-title">За что вы платите</h2></div><div class="mp-conditions-list"><div><h3>01 / Объём работ</h3><p>Фиксируем задачи, сроки и ожидаемый результат перед стартом. Дополнительные работы согласуем отдельно.</p></div><div><h3>02 / Отдельные расходы</h3><p>Рекламный бюджет, платные сервисы, покупка ссылок, хостинг и лицензии не входят в стартовые тарифы.</p></div><div><h3>03 / Окончательная стоимость</h3><p>Зависит от состояния сайта, размера проекта, конкуренции и нужных функций. Согласуем её до начала работ.</p></div></div></section>
 <section class="mp-price-wrap mp-price-faq"><h2>Частые вопросы</h2><details><summary>Почему указаны цены «от»?</summary><p>Небольшой локальный сайт и крупный интернет-магазин требуют разного объёма работ. Стартовые цены помогают оценить бюджет, а точное предложение готовим после знакомства с вашим проектом.</p></details><details><summary>Входит ли рекламный бюджет в стоимость Google Ads?</summary><p>Нет. Оплата работы команды и расходы на показы и клики в Google Ads — отдельные статьи бюджета.</p></details><details><summary>Можно заказать только одну услугу?</summary><p>Да. Можно начать с отдельного аудита, SEO, рекламы или разработки, а затем расширять сотрудничество при необходимости.</p></details></section>
 <section class="mp-price-wrap mp-final"><div><h2>Нужна точная стоимость?</h2><p>Расскажите о бизнесе и задаче. Подготовим предложение под ваш проект.</p></div><a class="mp-button" href="<?php echo esc_url(mrseo_url('contact','ru'));?>">Получить предложение ↗</a></section>
</div>
<?php get_footer();?>
