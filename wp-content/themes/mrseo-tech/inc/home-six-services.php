<?php
/**
 * Premium five-service homepage directory, UA only.
 * Earth hero, global header/footer and non-home locales are intentionally unchanged.
 * Illustrations are HTML/CSS interface studies, not screenshots or real campaign statistics.
 */
if (!defined('ABSPATH')) exit;
$services = [
 ['key'=>'seo','number'=>'01','kicker'=>'SEARCH','name'=>'SEO','slug'=>'seo',
  'copy'=>'Сайт є, але Google показує конкурентів? Перевіримо структуру, індексацію та сторінки послуг, щоб прибрати перешкоди для органічного пошуку.',
  'link'=>'Про SEO'],
 ['key'=>'ads','number'=>'02','kicker'=>'GOOGLE ADS','name'=>'Google Ads','slug'=>'google-ads',
  'copy'=>'Реклама витрачає бюджет, а результат незрозумілий? Зіставимо кампанії, товарні фіди й конверсії, щоб рішення спиралися на дані.',
  'link'=>'Про Google Ads'],
 ['key'=>'horoshop','number'=>'03','kicker'=>'HOROSHOP','name'=>'Хорошоп','slug'=>'horoshop',
  'copy'=>'Магазин на Хорошоп потребує розвитку? Перевіримо фільтри, категорії, індексацію, фіди та налаштування реклами.',
  'link'=>'Про Хорошоп'],
 ['key'=>'sites','number'=>'04','kicker'=>'WEBSITES','name'=>'Сайти','slug'=>'service-websites',
  'copy'=>'Потрібен сайт, на якому легко обрати послугу й залишити заявку? Створюємо лендінги, корпоративні сайти та зрозумілі сторінки бізнесу.',
  'link'=>'Про сайти'],
 ['key'=>'dev','number'=>'05','kicker'=>'DEVELOPMENT','name'=>'Веброзробка','slug'=>'web-development',
  'copy'=>'Роботу гальмують ручні дії й розрізнені системи? Розробляємо особисті кабінети, API-інтеграції, парсинг і бізнес-автоматизацію.',
  'link'=>'Про веброзробку']
];
?>
<section class="hsix" id="pt-development" aria-labelledby="hsix-heading">
 <div class="hsix-shell">
  <div class="hsix-heading">
   <div><span class="hsix-heading-rule" aria-hidden="true"></span><h2 id="hsix-heading">Послуги MrSeo.tech</h2></div>
   <p>П’ять напрямів. Рішення під задачі вашого бізнесу.</p>
  </div>
  <div class="hsix-grid">
   <?php foreach ($services as $service):
    $key=$service['key'];
    $url=mrseo_url($service['slug'],'uk');
   ?>
   <article class="hsix-card hsix-card--<?php echo esc_attr($key);?>">
    <div class="hsix-card-header">
     <span class="hsix-kicker"><?php echo esc_html($service['number'].' / '.$service['kicker']);?></span>
     <h3><?php echo esc_html($service['name']);?></h3>
    </div>
    <div class="hsix-browser" role="img" aria-label="<?php echo esc_attr('Демонстраційний інтерфейс напрямку '.$service['name'].', без даних клієнтів');?>">
     <div class="hsix-browser-top"><span class="hsix-dots" aria-hidden="true"><i></i><i></i><i></i></span><span class="hsix-browser-label"><?php echo esc_html([
      'seo'=>'ПОШУК / ВИДИМІСТЬ','ads'=>'РЕКЛАМНІ КАМПАНІЇ','commerce'=>'МАГАЗИН / КАТАЛОГ',
      'horoshop'=>'HOROSHOP / КАТАЛОГ','dev'=>'РОЗРОБКА / ІНТЕГРАЦІЇ','sites'=>'САЙТ / АДАПТИВНІСТЬ'
     ][$key]);?></span></div>
     <div class="hsix-browser-screen" aria-hidden="true">
      <?php if($key==='seo'):?>
       <div class="hsix-search"><span>⌕</span> ваш бізнес <b>↗</b></div>
       <div class="hsix-serp"><small>example.com / services</small><i class="hsix-line hsix-line--blue"></i><i class="hsix-line hsix-line--mint"></i><i class="hsix-line hsix-line--gray"></i></div>
       <div class="hsix-serp hsix-serp--second"><small>example.com / solutions</small><i class="hsix-line hsix-line--pale"></i><i class="hsix-line hsix-line--gray"></i></div>
      <?php elseif($key==='ads'):?>
       <div class="hsix-ads-label"><span class="hsix-gads-symbol"><i></i><i></i><i></i></span><strong>Кампанії</strong><span class="hsix-live-dot"></span></div>
       <svg class="hsix-chart" viewBox="0 0 300 100" preserveAspectRatio="none" focusable="false" aria-hidden="true"><path d="M0 99V77 C35 70 50 69 65 54 S110 51 133 47 S170 16 192 24 S235 35 256 14 S285 12 300 3 V99Z" fill="#e0efed"/><path d="M0 77 C35 70 50 69 65 54 S110 51 133 47 S170 16 192 24 S235 35 256 14 S285 12 300 3" fill="none" stroke="#158eb2" stroke-width="3" stroke-linecap="round"/><circle cx="192" cy="24" r="5" fill="#fff" stroke="#158eb2" stroke-width="2"/></svg>
       <div class="hsix-metrics"><span>Кліки</span><span>Заявки</span><span>Вартість</span><span>ROAS</span></div>
      <?php elseif($key==='commerce'):?>
       <div class="hsix-commerce-bar"><span></span><span></span></div>
       <div class="hsix-products"><div><span class="hsix-product-shoe">◕</span><i></i><small></small></div><div><span class="hsix-product-headphones">◉</span><i></i><small></small></div><div><span class="hsix-product-bag">▣</span><i></i><small></small></div></div>
       <div class="hsix-sales"><span>Замовлення</span><div class="hsix-bars"><i></i><i></i><i></i><i></i><i></i><i></i></div></div>
      <?php elseif($key==='horoshop'):?>
       <div class="hsix-shop-screen"><div class="hsix-shop-sidebar"><img class="hsix-shop-logo" src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-wordmark.svg');?>" alt="" width="86" height="22" decoding="async"><i></i><i></i><i></i><i></i></div><div class="hsix-shop-list"><strong>Каталог магазину</strong><div><i class="hsix-folder"></i><span>Категорії</span><b>✓</b></div><div><i class="hsix-folder"></i><span>Товари</span><b>✓</b></div><div><i class="hsix-folder"></i><span>Фільтри</span><b>✓</b></div><div><i class="hsix-gear">✦</i><span>SEO-налаштування</span><b>✓</b></div></div></div>
      <?php elseif($key==='dev'):?>
       <div class="hsix-dev-screen"><div class="hsix-code"><span>01&nbsp; <b>const</b> project = {</span><span>02&nbsp; &nbsp; crm: <em>true</em>,</span><span>03&nbsp; &nbsp; api: <em>'connected'</em>,</span><span>04&nbsp; &nbsp; payment: <em>true</em>,</span><span>05&nbsp; &nbsp; workflows: [</span><span>06&nbsp; &nbsp; &nbsp; <em>'automation'</em></span><span>07&nbsp; &nbsp; ]</span><span>08&nbsp; }</span></div><div class="hsix-dev-panel"><i></i><div><span>Кабінет</span><b></b></div><div><span>CRM / API</span><b></b></div><div><span>Платежі</span><b></b></div></div></div>
      <?php else:?>
       <div class="hsix-site-screen"><div class="hsix-site-window"><div class="hsix-site-menu"><i></i><i></i><i></i></div><div class="hsix-site-main"><div><strong></strong><span></span><span></span><b></b></div><i class="hsix-landscape"></i></div></div><div class="hsix-device hsix-device--tablet"><i></i><span></span><b></b></div><div class="hsix-device hsix-device--phone"><i></i><span></span><b></b></div></div>
      <?php endif;?>
     </div>
    </div>
    <div class="hsix-card-footer">
     <p><?php echo esc_html($service['copy']);?></p>
     <a href="<?php echo esc_url($url);?>" aria-label="<?php echo esc_attr($service['link']);?>"><?php echo esc_html($service['link']);?> <span aria-hidden="true">↗</span></a>
    </div>
   </article>
   <?php endforeach;?>
  </div>
 </div>
</section>
