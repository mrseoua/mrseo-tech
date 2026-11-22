<?php
if(!defined('ABSPATH'))exit;
/* Native Ukrainian mega-navigation from existing routed services; no invented URLs. */
function mrseo_ua_menu_summaries(){
 return array(
  'seo'=>'Пошукова видимість: від аудиту до системного SEO-просування.',
  'ads'=>'Пошукова та товарна реклама, аудит і контроль рекламних кампаній.',
  'commerce'=>'Розвиток інтернет-магазину, конверсія, каталог та інтеграції.',
  'horoshop'=>'Налаштування, SEO, реклама та аналітика магазинів на Хорошоп.',
  'sites'=>'Сайти для бізнесу: від лендінгу до повноцінного онлайн-проєкту.',
  'dev'=>'Вебзастосунки, автоматизація, CRM та індивідуальні інтеграції.'
 );
}
function mrseo_ua_header_six($mobile=false){
 $groups=mrseo_ua_menu_groups();$current=mrseo_slug();
 $names=array('seo'=>'SEO','ads'=>'Google Ads','commerce'=>'Інтернет-магазини','horoshop'=>'Хорошоп','sites'=>'Створення сайтів','dev'=>'Веброзробка');
 echo '<nav class="mrseo-ua-six'.($mobile?' mrseo-ua-six--mobile':' mrseo-ua-six--desktop').'" aria-label="Напрями послуг"><div class="mrseo-ua-six-inner">';
 foreach($groups as $group){
  // Hide the redundant e-commerce navigation category; keep its service URLs accessible elsewhere.
  if($group['key']==='data')continue;
  $key=$group['key'];$is_horoshop=$key==='horoshop';
  echo '<details class="mrseo-ua-six-item mrseo-ua-six-item--'.esc_attr($key).'" name="'.($mobile?'ua-six-mobile':'ua-six-desktop').'">';
  echo '<summary>'.esc_html($names[$key]).'<span aria-hidden="true">⌄</span></summary>';
  echo '<div class="mrseo-ua-six-panel mrseo-ua-six-panel--mega">';
  echo '<div class="mrseo-ua-six-overview"><span class="mrseo-ua-six-eyebrow">НАПРЯМ / '.esc_html(strtoupper($names[$key])).'</span><h2>'.esc_html($group['title']).'</h2><p>'.esc_html(mrseo_ua_menu_summaries()[$key]??'Послуги для розвитку вашого бізнесу.').'</p><a class="mrseo-ua-six-overview-link" href="'.esc_url(mrseo_url($group['parent'],'uk')).'">Огляд напряму <span aria-hidden="true">↗</span></a></div>';
  echo '<div class="mrseo-ua-six-catalog">';
  if($is_horoshop){
   echo '<section class="mrseo-ua-six-catalog-group"><h3>Послуги Хорошоп</h3>';
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
     echo '<a href="'.esc_url(mrseo_url($slug,'uk')).'"'.($active?' aria-current="page"':'').'>'.esc_html($service[1]).' <span aria-hidden="true">↗</span></a>';
    }
    echo '</section>';
   }
  }
  echo '</div></div></details>';
 }
 echo '</div></nav>';
}
