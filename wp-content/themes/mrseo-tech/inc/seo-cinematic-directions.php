<?php if(!defined('ABSPATH'))exit; ?>
<?php
require_once get_template_directory().'/inc/seo-hub-premium-art.php';
$seo_home_cards=array(
 array('seo-audit','SEO-аудит','ДІАГНОСТИКА / ПРІОРИТЕТИ','Виявляємо технічні та структурні перешкоди. Ви отримуєте пріоритетний план виправлень.',array('Індексація','Дублікати URL','План дій')),
 array('ecommerce-seo','SEO інтернет-магазинів','КАТАЛОГ / ПОПИТ','Зіставляємо категорії, фільтри й товари з пошуковим попитом покупців.',array('Категорії','Фільтри','Товари')),
 array('local-seo','Локальне SEO','МІСТО / ПОШУК','Допомагаємо клієнтам знаходити ваш бізнес у потрібному місті та звертатися до вас.',array('Місто','Профіль компанії','Контакти')),
 array('service-business-seo','SEO сайтів послуг','ПОСЛУГИ / ЗВЕРНЕННЯ','Створюємо зрозумілу пошукову структуру під конкретні послуги й запити.',array('Запит','Сторінка послуги','Заявка')),
 array('international-seo','Міжнародне SEO','МОВИ / РИНКИ','Узгоджуємо мовні версії, пошуковий попит і технічні налаштування для кожного ринку.',array('Мова','Ринок','Відповідна URL'))
);
?>
<section data-ua-stage="catalog" class="seo-section seo-directions" id="ukseo-services" aria-labelledby="seo-directions-title">
 <div class="seo-shell">
  <div class="seo-section-head"><div><span class="seo-kicker">03 / НАПРЯМИ SEO</span><h2 id="seo-directions-title">Одна мета.<br><em>Різні задачі бізнесу.</em></h2></div><p>Вибираємо напрям відповідно до вашого сайту, ринку та проблеми. Не продаємо однаковий пакет усім.</p></div>
  <div class="seo-cards">
  <?php foreach($seo_home_cards as $i=>$dir): $scene=array('sh-audit','sh-commerce','sh-local','sh-service','sh-international')[$i]; ?>
   <article class="seo-card"><div class="seo-card-copy"><span class="seo-kicker"><?php echo esc_html(sprintf('%02d',$i+1).' / '.$dir[2]);?></span><h3><?php echo esc_html($dir[1]);?></h3><p><?php echo esc_html($dir[3]);?></p><a class="seo-card-link" href="<?php echo esc_url(mrseo_url($dir[0],'uk'));?>">Детальніше <span aria-hidden="true">↗</span></a></div>
    <div class="seo-card-art" aria-hidden="true"><?php mrseo_sh_art($scene);?></div>
   </article>
  <?php endforeach;?>
  </div>
 </div>
</section>
