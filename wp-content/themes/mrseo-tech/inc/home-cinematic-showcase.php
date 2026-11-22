<?php
/**
 * Homepage Cinematic Services 02 — five approved main categories.
 * All subcategory links lead to real existing WordPress landings.
 * Initial SEO-friendly HTML is rendered server-side; JS enhances selection.
 * The real 3D Earth above this section is not touched.
 */
if(!defined('ABSPATH'))exit;
$cs_services=array(
 'seo'=>array(
  'name'=>'SEO','parent'=>'seo','tag'=>'ОРГАНІЧНА ВИДИМІСТЬ',
  'problem'=>'Клієнти шукають вас, але знаходять конкурентів?',
  'answer'=>'Виявляємо, що заважає сайту залучати органічний попит, і вибудовуємо план робіт від аудиту до результатів у пошуку.',
  'links'=>array(
   array('seo-audit','SEO-аудит'),
   array('local-seo','Локальне SEO'),
   array('ecommerce-seo','SEO інтернет-магазинів'),
   array('semantic-core','Семантика та структура'),
   array('indexing-fixes','Виправлення індексації'),
   array('international-seo','Міжнародне SEO')
  )
 ),
 'ads'=>array(
  'name'=>'Google Ads','parent'=>'google-ads','tag'=>'ПЛАТНИЙ ТРАФІК',
  'problem'=>'Реклама витрачає бюджет, але замовлень замало?',
  'answer'=>'Перевіряємо попит, товарні дані та конверсії. Налаштовуємо кампанії так, щоб керувати витратами за реальними даними.',
  'links'=>array(
   array('google-search-ads','Пошукова реклама'),
   array('google-shopping','Google Shopping'),
   array('performance-max','Performance Max'),
   array('merchant-center','Merchant Center'),
   array('google-ads-audit','Аудит Google Ads'),
   array('google-remarketing','Ремаркетинг')
  )
 ),
 'horoshop'=>array(
  'name'=>'Хорошоп','parent'=>'horoshop','tag'=>'ПАРТНЕР ХОРОШОП',
  'problem'=>'Магазин працює, але не використовує весь свій потенціал?',
  'answer'=>'Допомагаємо з SEO, рекламою, фідами та аналітикою саме на Хорошоп. Працюємо з можливостями платформи, а не загальними обіцянками.',
  'links'=>array(
   array('seo','SEO-просування Хорошоп'),
   array('audit','SEO-аудит Хорошоп'),
   array('search-ads','Пошукова реклама'),
   array('shopping','Google Shopping'),
   array('pmax','Performance Max'),
   array('feeds','Товарні фіди'),
   array('ga4','GA4 та конверсії')
  )
 ),
 'sites'=>array(
  'name'=>'Сайти','parent'=>'service-websites','tag'=>'СТВОРЕННЯ САЙТІВ',
  'problem'=>'Потрібен сайт, що допомагає клієнту зробити наступний крок?',
  'answer'=>'Проєктуємо зрозумілі сайти під послугу, продукт і реальні бізнес-процеси: від першого екрану до заявки.',
  'links'=>array(
   array('wordpress-development','Сайти на WordPress'),
   array('landing-pages','Лендінги'),
   array('local-business-websites','Сайти малого бізнесу'),
   array('corporate-websites','Корпоративні сайти'),
   array('website-redesign','Редизайн сайтів'),
   array('website-maintenance','Технічна підтримка')
  )
 ),
 'dev'=>array(
  'name'=>'Веброзробка','parent'=>'web-development','tag'=>'СИСТЕМИ ТА ІНТЕГРАЦІЇ',
  'problem'=>'Команда витрачає час на ручні операції?',
  'answer'=>'Будуємо CRM, кабінети та інтеграції, які об’єднують процеси й усувають зайві кроки в роботі бізнесу.',
  'links'=>array(
   array('crm-development','CRM для бізнесу'),
   array('web-applications','Вебзастосунки'),
   array('api-integrations','API-інтеграції'),
   array('business-automation','Автоматизація бізнесу'),
   array('ai-agents','AI-агенти'),
   array('custom-functionality','Індивідуальний функціонал')
  )
 )
);
?>
<section class="cs-showcase" id="pt-development" aria-labelledby="cs-showcase-title" data-cs-showcase>
 <div class="cs-shell">
  <div class="cs-intro">
   <span class="cs-overline"><i aria-hidden="true"></i> НАПРЯМИ РОБОТИ</span>
   <h2 id="cs-showcase-title">Ваш бізнес. Наші рішення<span class="cs-title-dot">.</span></h2>
   <p>Комплексні рішення, що залучають клієнтів, збільшують продажі та допомагають розвивати ваш бізнес онлайн.</p>
  </div>
  <div class="cs-layout">
   <nav class="cs-navigation" aria-label="П’ять напрямів послуг">
    <?php foreach($cs_services as $key=>$entry):?>
    <button type="button" class="cs-tab<?php echo $key==='ads'?' is-active':'';?>" data-cs-select="<?php echo esc_attr($key);?>" aria-controls="cs-panel-<?php echo esc_attr($key);?>" aria-expanded="<?php echo $key==='ads'?'true':'false';?>" aria-pressed="<?php echo $key==='ads'?'true':'false';?>">
     <span class="cs-tab-number"><?php echo esc_html(str_pad((string)(array_search($key,array_keys($cs_services),true)+1),2,'0',STR_PAD_LEFT));?></span>
     <span class="cs-tab-name"><?php echo esc_html($entry['name']);?></span>
     <span class="cs-tab-icon" aria-hidden="true">›</span>
    </button>
    <?php endforeach;?>
   </nav>
   <div class="cs-panels">
   <?php foreach($cs_services as $key=>$entry):?>
    <div class="cs-panel<?php echo $key==='ads'?' is-active':'';?>" id="cs-panel-<?php echo esc_attr($key);?>" data-cs-panel="<?php echo esc_attr($key);?>">
     <div class="cs-content">
      <span class="cs-tag"><?php echo esc_html($entry['tag']);?></span><span class="cs-brand" aria-hidden="true"><?php if($key==='ads'):?><span class="cs-google-ads-mark"><i></i><i></i><i></i></span><?php elseif($key==='seo'):?>⌕<?php elseif($key==='horoshop'):?>H<?php elseif($key==='sites'):?>▣<?php else:?>⌘<?php endif;?></span>
      <h3><?php echo esc_html($entry['name']);?></h3>
      <p class="cs-problem"><?php echo esc_html($entry['problem']);?></p>
      <p class="cs-answer"><?php echo esc_html($entry['answer']);?></p>
      <div class="cs-links" aria-label="<?php echo esc_attr('Послуги: '.$entry['name']);?>">
       <?php foreach(array_slice($entry['links'],0,5) as $link):
        $url=$key==='horoshop' && function_exists('mrseo_hs_url')?mrseo_hs_url($link[0]):mrseo_url($link[0],'uk');
       ?>
       <a href="<?php echo esc_url($url);?>"><span aria-hidden="true" class="cs-link-tick">✓</span><?php echo esc_html($link[1]);?></a>
       <?php endforeach;?>
      </div>
      <div class="cs-actions">
       <a class="cs-primary" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити проєкт <span aria-hidden="true">↗</span></a>
       <a class="cs-secondary" href="<?php echo esc_url(mrseo_url($entry['parent'],'uk'));?>">Усі послуги <span aria-hidden="true">↗</span></a>
      </div>
     </div>
     <div class="cs-art cs-art--<?php echo esc_attr($key);?>" role="img" aria-label="<?php echo esc_attr('Ілюстрація процесу: '.$entry['name']);?>">
      <div class="cs-art-field" aria-hidden="true"><span class="cs-stage-base"></span><span class="cs-stage-base-ring"></span><svg class="cs-stage-trail" viewBox="0 0 850 580" preserveAspectRatio="none"><defs><linearGradient id="cs-trail-red" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#b34437"/><stop offset="45%" stop-color="#e2a990"/><stop offset="100%" stop-color="#bd5b48"/></linearGradient></defs><ellipse cx="425" cy="308" rx="351" ry="155" fill="none" stroke="url(#cs-trail-red)" stroke-width="2.8" transform="rotate(-12 425 308)"/><circle cx="89" cy="308" r="6" fill="#fff9e8" stroke="#dfb391" stroke-width="3"/><circle cx="750" cy="252" r="5" fill="#fff9e8" stroke="#dfb391" stroke-width="3"/></svg>
       <span class="cs-art-halo"></span><span class="cs-art-orbit cs-art-orbit--one"></span><span class="cs-art-orbit cs-art-orbit--two"></span>
       <span class="cs-art-spark cs-art-spark--a"></span><span class="cs-art-spark cs-art-spark--b"></span>
       <?php if($key==='seo'):?>
        <div class="cs-visual-heading"><span class="cs-visual-symbol">⌕</span><span>ПОШУКОВА ВИДИМІСТЬ</span></div>
        <div class="cs-visual-main cs-visual-seo">
         <div class="cs-search-query"><i></i><span>послуга для мого бізнесу</span></div>
         <div class="cs-serp-result cs-serp-result--first"><small>Категорія · Структура</small><strong>Зрозуміла відповідь на запит</strong><span>Послуги • Деталі • Звернення</span><b></b></div>
         <div class="cs-serp-result cs-serp-result--second"><small>Сторінка · Оптимізація</small><strong>Релевантний зміст</strong><span>Зручність • Швидкість • Інформація</span></div>
        </div>
        <div class="cs-visual-float cs-visual-float--left"><small>SEO</small><span>ЗАПИТ</span><strong>→ СТОРІНКА</strong></div>
       <?php elseif($key==='ads'):?>
        <div class="cs-visual-heading"><span class="cs-visual-symbol">A</span><span>GOOGLE ADS · СХЕМА</span></div>
        <div class="cs-visual-main cs-visual-ads">
         <div class="cs-search-query cs-ad-google-search"><b class="cs-google-g">G</b><span>Купити онлайн</span><i></i></div>
         <div class="cs-ad-label">Реклама · Google Ads</div>
         <div class="cs-ad-result"><strong>Товар у вашому магазині</strong><span>Категорія • Наявність • Замовлення</span><i></i><i></i></div>
        </div>
        <div class="cs-visual-float cs-visual-float--right"><small>MERCHANT CENTER</small><span>Товарні дані</span><div class="cs-product-mini"><i></i><i></i><i></i></div></div>
        <div class="cs-visual-float cs-visual-float--left cs-campaigns-card"><div class="cs-float-title"><span class="cs-float-icon">⌁</span> Кампанії</div><div class="cs-campaign-row"><b>✓</b><i></i></div><div class="cs-campaign-row"><b>✓</b><i></i></div><div class="cs-campaign-row"><b>✓</b><i></i></div></div>
        <div class="cs-visual-float cs-shopping-card"><div class="cs-float-title"><span class="cs-float-icon">◇</span> Google Shopping</div><div class="cs-shopping-tiles"><div><i class="cs-product-shape cs-product-shape--headphone"></i><b></b><b></b></div><div><i class="cs-product-shape cs-product-shape--shoe"></i><b></b><b></b></div><div><i class="cs-product-shape cs-product-shape--chair"></i><b></b><b></b></div></div></div>
        <div class="cs-visual-float cs-optimization-card"><div class="cs-float-title">Оптимізація кампаній</div><div class="cs-bars"><i></i><i></i><i></i><i></i><i></i><i></i></div></div>
        <div class="cs-visual-float cs-conversions-card"><div class="cs-float-title"><span>↗</span> Конверсії</div><strong>Перевірені дані</strong><small>Вимірювання покупок</small></div>
       <?php elseif($key==='horoshop'):?>
        <div class="cs-visual-heading"><span class="cs-visual-symbol">H</span><span>ХОРОШОП · МАГАЗИН</span></div>
        <div class="cs-visual-main cs-visual-store">
         <div class="cs-store-head"><span>МАГАЗИН</span><i>Каталог</i><i>Кошик</i></div>
         <div class="cs-store-products"><div><b class="cs-product-img"></b><span>Категорія 01</span></div><div><b class="cs-product-img"></b><span>Категорія 02</span></div><div><b class="cs-product-img"></b><span>Категорія 03</span></div></div>
         <div class="cs-store-bottom"><span>Каталог → Фід → Реклама</span><strong>↗</strong></div>
        </div>
        <div class="cs-visual-float cs-visual-float--right"><small>SEO · GOOGLE ADS</small><span>Товари та покупці</span><strong>Дані для рішень</strong></div>
       <?php elseif($key==='sites'):?>
        <div class="cs-visual-heading"><span class="cs-visual-symbol">▣</span><span>ВІД ІДЕЇ ДО САЙТУ</span></div>
        <div class="cs-visual-main cs-visual-site">
         <div class="cs-site-bar"><i></i><i></i><i></i><span>mrseo.tech / проєкт</span></div>
         <div class="cs-site-hero"><span>ВАША ПОСЛУГА</span><strong>Сайт, який допомагає обрати.</strong><b>Залишити заявку ↗</b></div>
         <div class="cs-site-tiles"><i></i><i></i><i></i></div>
        </div>
        <div class="cs-visual-float cs-visual-float--right cs-site-phone"><span></span><i></i><b></b><small>МОБІЛЬНА ВЕРСІЯ</small></div>
       <?php else:?>
        <div class="cs-visual-heading"><span class="cs-visual-symbol">⌘</span><span>СИСТЕМИ ТА АВТОМАТИЗАЦІЯ</span></div>
        <div class="cs-visual-main cs-visual-dev">
         <div class="cs-dev-node cs-dev-node--top">САЙТ</div><div class="cs-dev-edge cs-dev-edge--one"></div>
         <div class="cs-dev-node cs-dev-node--left">CRM</div><div class="cs-dev-core">API <small>ІНТЕГРАЦІЇ</small></div><div class="cs-dev-node cs-dev-node--right">AI</div>
         <div class="cs-dev-edge cs-dev-edge--two"></div><div class="cs-dev-edge cs-dev-edge--three"></div>
         <div class="cs-dev-node cs-dev-node--bottom">АВТОМАТИЗАЦІЯ</div>
        </div>
       <?php endif;?>
       <span class="cs-visual-caption">Схематична візуалізація — не фактична статистика</span>
      </div>
     </div>
    </div>
   <?php endforeach;?>
   </div>
  </div>
  <div class="cs-bottom">
   <span class="cs-index"><strong data-cs-current>02</strong><span> / 05</span></span>
   <div class="cs-track" aria-hidden="true"><span data-cs-progress></span></div>
   <div class="cs-bottom-note">П’ять напрямів — конкретні рішення</div>
   <div class="cs-controls">
    <button type="button" data-cs-previous aria-label="Попередній напрям">←</button>
    <button type="button" data-cs-next aria-label="Наступний напрям">→</button>
   </div>
  </div>
 </div>
</section>
