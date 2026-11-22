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
   // Six real premium WordPress routes, Ukrainian-only.
   $horoshop_anchors=array(
    'horoshop-seo'=>'seo',
    'horoshop-audit'=>'audit','horoshop-google-ads'=>'ads',
    'horoshop-product-feeds'=>'feeds','horoshop-ga4'=>'ga4'
   );
   foreach($group['planned'] as $service){
    $anchor=$horoshop_anchors[$service[0]]??null;
    if(!$anchor)continue;
    echo '<a href="'.esc_url(mrseo_hs_url($anchor)).'">'.esc_html($service[1]).' <span aria-hidden="true">↗</span></a>';
   }
   echo '</section>';
  }else{
   foreach($group['sections'] as $section){
    if(empty($section['items']))continue;
    echo '<section class="mrseo-ua-six-catalog-group"><h3>'.esc_html($section['title']).'</h3>';
    foreach($section['items'] as $service){
     $slug=$service[0];$active=$current===$slug;
     echo '<a href="'.esc_url(mrseo_url($slug,'uk')).'"'.($active?' aria-current="page"':'').'>'.esc_html($service[1]).' <span aria-hidden="true">↗</span></a>';
    }
    echo '</section>';
   }
  }
  echo '</div></div></details>';
 }
 echo '</div></nav>';
}
