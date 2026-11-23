<?php
/** Extra real Ukrainian development routes discoverable from the parent service page. */
if(!defined('ABSPATH'))exit;
if(mrseo_locale()!=='uk'||mrseo_slug()!=='web-development')return;
$pages=mrseo_ua_dev_new_pages();
$groups=array(
 'КАБІНЕТИ ТА ДАНІ'=>array('client-portals','data-parsing','payment-integration'),
 'МОБІЛЬНА РОЗРОБКА'=>array('mobile-app-development','ecommerce-mobile-apps','corporate-mobile-apps','pwa-development')
);
?>
<section class="udv-hub" aria-labelledby="udv-hub-title">
 <div class="pti-wrap">
  <div class="udv-hub-intro"><span class="pti-kicker">СПЕЦІАЛІЗОВАНІ РІШЕННЯ</span><h2 id="udv-hub-title">Від задачі бізнесу <em>до конкретного інструменту.</em></h2><p>Оберіть напрям, у якому потрібно прибрати ручні операції, спростити роботу клієнтів або створити мобільний продукт.</p></div>
  <?php foreach($groups as $heading=>$slugs):?>
   <div class="udv-hub-group"><h3><?php echo esc_html($heading);?></h3><div class="udv-hub-grid">
   <?php foreach($slugs as $slug):$page=$pages[$slug];?>
    <a class="udv-hub-card" href="<?php echo esc_url(home_url('/'.$slug.'/'));?>">
     <span><?php echo esc_html($page['tag']);?></span>
     <strong><?php echo esc_html($page['title']);?></strong>
     <small><?php echo esc_html($page['highlight']);?></small>
     <b aria-hidden="true">↗</b>
    </a>
   <?php endforeach;?>
   </div></div>
  <?php endforeach;?>
 </div>
</section>
