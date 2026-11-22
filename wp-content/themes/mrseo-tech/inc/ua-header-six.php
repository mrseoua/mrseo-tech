<?php
if(!defined('ABSPATH'))exit;
/* Existing Ukrainian service taxonomy. No invented URLs for planned Horoshop items. */
function mrseo_ua_header_six($mobile=false){
 $groups=mrseo_ua_menu_groups();$current=mrseo_slug();
 $names=array('seo'=>'SEO','ads'=>'Google Ads','commerce'=>'Інтернет-магазини','horoshop'=>'Хорошоп','sites'=>'Сайти','dev'=>'Веброзробка');
 echo '<nav class="mrseo-ua-six'.($mobile?' mrseo-ua-six--mobile':' mrseo-ua-six--desktop').'" aria-label="Напрями послуг"><div class="mrseo-ua-six-inner">';
 foreach($groups as $group){
  // Hide the redundant e-commerce navigation category; keep its service URLs accessible elsewhere.
  if(in_array($group['key'],array('data','commerce'),true))continue;
  $key=$group['key'];$is_horoshop=$key==='horoshop';
  echo '<details class="mrseo-ua-six-item mrseo-ua-six-item--'.esc_attr($key).'" name="'.($mobile?'ua-six-mobile':'ua-six-desktop').'">';
  echo '<summary>'.esc_html($names[$key]).'<span aria-hidden="true">⌄</span></summary>';
  echo '<div class="mrseo-ua-six-panel'.($key==='seo'?' mrseo-ua-six-panel--wide':'').'">';
  echo '<div class="mrseo-ua-six-catalog">';
  if($is_horoshop){
   echo '<section class="mrseo-ua-six-catalog-group"><h3>Напрями роботи</h3>';
   // Keep the Horoshop overview accessible elsewhere, but not in this dropdown.
   // Nine real Ukrainian Horoshop routes; overview/setup stay out of the menu.
   $horoshop_services=array(
    'seo'=>'SEO-просування сайтів на Хорошоп',
    'audit'=>'SEO-аудит сайтів на Хорошоп',
    'ads'=>'Google Ads для Хорошоп',
    'search-ads'=>'Пошукова реклама для Хорошоп',
    'shopping'=>'Google Shopping для Хорошоп',
    'pmax'=>'Performance Max для Хорошоп',
    'feeds'=>'Товарні фіди',
    'ga4'=>'GA4 та конверсії'
   );
   foreach($horoshop_services as $anchor=>$label){
    echo '<a href="'.esc_url(mrseo_hs_url($anchor)).'">'.esc_html($label).' <span aria-hidden="true">↗</span></a>';
   }
   echo '</section>';
  }else{
   foreach($group['sections'] as $section){
    if(empty($section['items']))continue;
    echo '<section class="mrseo-ua-six-catalog-group"><h3>'.esc_html($section['title']).'</h3>';
    foreach($section['items'] as $service){
     $slug=$service[0];$active=$current===$slug;
     if($key==='sites' && $slug==='local-business-websites'){
      // Use a real inline disclosure on desktop and mobile, not a hover-only submenu.
      $industries=array(
       'clinic-websites'=>'Клініки та медичні центри',
       'beauty-salon-websites'=>'Салони краси та барбершопи',
       'restaurant-websites'=>'Кафе та ресторани',
       'auto-service-websites'=>'СТО та автосервіси',
       'lawyer-websites'=>'Адвокати та юристи',
       'photographer-websites'=>'Фотографи',
       'psychologist-websites'=>'Психологи'
      );
      echo '<details class="mrseo-ua-six-submenu"'.(isset($industries[$current])?' open':'').'>';
      echo '<summary aria-label="Розгорнути сайти для малого бізнесу">Сайти малого бізнесу <span aria-hidden="true">⌄</span></summary>';
      echo '<div class="mrseo-ua-six-submenu-links">';
      echo '<a class="mrseo-ua-six-submenu-overview" href="'.esc_url(mrseo_url($slug,'uk')).'">Усі сайти малого бізнесу <span aria-hidden="true">↗</span></a>';
      foreach($industries as $nicheSlug=>$nicheLabel){
       if(!function_exists('mrseo_ua_business_niche_data')||!mrseo_ua_business_niche_data($nicheSlug))continue;
       echo '<a href="'.esc_url(mrseo_url($nicheSlug,'uk')).'"'.($current===$nicheSlug?' aria-current="page"':'').'>'.esc_html($nicheLabel).' <span aria-hidden="true">↗</span></a>';
      }
      echo '</div></details>';
     }else{
      echo '<a href="'.esc_url(mrseo_url($slug,'uk')).'"'.($active?' aria-current="page"':'').'>'.esc_html($service[1]).' <span aria-hidden="true">↗</span></a>';
     }
    }
    echo '</section>';
   }
  }
  echo '</div></div></details>';
 }
 echo '</div></nav>';
}
