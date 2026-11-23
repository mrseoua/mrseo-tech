<?php
if(!defined('ABSPATH'))exit;
/* Native Ukrainian mega-navigation from existing routed services; no invented URLs. */
function mrseo_ua_menu_summaries(){
 return array(
  'seo'=>'Пошукова видимість: від аудиту до системного SEO-просування.',
  'ads'=>'Пошукова та товарна реклама, аудит і контроль рекламних кампаній.',
  'horoshop'=>'Налаштування, SEO, реклама та аналітика магазинів на Хорошоп.',
  'sites'=>'Сайти для бізнесу: від лендінгу до повноцінного онлайн-проєкту.',
  'dev'=>'Бізнес-системи, інтеграції, AI та мобільні рішення під потреби компанії.'
 );
}
function mrseo_ua_header_six($mobile=false){
 $groups=mrseo_ua_menu_groups();$current=mrseo_slug();
 $names=array('seo'=>'SEO','ads'=>'Google Ads','horoshop'=>'Хорошоп','sites'=>'Сайти','dev'=>'Веброзробка');
 echo '<nav class="mrseo-ua-six'.($mobile?' mrseo-ua-six--mobile':' mrseo-ua-six--desktop').'" aria-label="Напрями послуг"><div class="mrseo-ua-six-inner">';
 foreach($groups as $group){
  // Approved five main directions. SEO's full 18-page catalogue remains on /seo/.
  if(in_array($group['key'],array('data','commerce'),true))continue;
  $key=$group['key'];$is_horoshop=$key==='horoshop';
  echo '<details class="mrseo-ua-six-item mrseo-ua-six-item--'.esc_attr($key).'" name="'.($mobile?'ua-six-mobile':'ua-six-desktop').'">';
  echo '<summary>'.esc_html($names[$key]).'<span aria-hidden="true">⌄</span></summary>';
  echo '<div class="mrseo-ua-six-panel mrseo-ua-six-panel--mega">';
  echo '<div class="mrseo-ua-six-overview"><span class="mrseo-ua-six-eyebrow">НАПРЯМ / '.esc_html(strtoupper($names[$key])).'</span><h2>'.esc_html($group['title']).'</h2><p>'.esc_html(mrseo_ua_menu_summaries()[$key]??'Послуги для розвитку вашого бізнесу.').'</p><span class="mrseo-ua-six-deco" aria-hidden="true"><i></i><i></i><i></i></span></div>';
  echo '<div class="mrseo-ua-six-catalog">';
  if($key==='seo'){
   echo '<section class="mrseo-ua-six-catalog-group"><h3>SEO-послуги</h3>';
   $seo_services=array(
    'local-seo'=>'Локальне SEO',
    'ecommerce-seo'=>'SEO інтернет-магазинів',
    'service-business-seo'=>'SEO сайтів послуг',
    'international-seo'=>'Міжнародне SEO',
    'seo-audit'=>'SEO-аудит'
   );
   foreach($seo_services as $slug=>$label){
    echo '<a href="'.esc_url(mrseo_url($slug,'uk')).'"'.($current===$slug?' aria-current="page"':'').'>'.esc_html($label).' <span aria-hidden="true">↗</span></a>';
   }
   echo '</section>';
  }elseif($is_horoshop){
   // Two balanced groups of existing internally routed services.
   $horoshop_groups=array(
    'SEO та просування'=>array(
     'seo'=>'SEO-просування сайтів на Хорошоп',
     'audit'=>'SEO-аудит сайтів на Хорошоп',
     'ads'=>'Google Ads для Хорошоп',
     'search-ads'=>'Пошукова реклама для Хорошоп'
    ),
    'Товари та аналітика'=>array(
     'shopping'=>'Google Shopping для Хорошоп',
     'pmax'=>'Performance Max для Хорошоп',
     'feeds'=>'Товарні фіди',
     'ga4'=>'GA4 та конверсії'
    )
   );
   foreach($horoshop_groups as $heading=>$services){
    echo '<section class="mrseo-ua-six-catalog-group"><h3>'.esc_html($heading).'</h3>';
    foreach($services as $anchor=>$label){
     echo '<a href="'.esc_url(mrseo_hs_url($anchor)).'">'.esc_html($label).' <span aria-hidden="true">↗</span></a>';
    }
    echo '</section>';
   }
  }elseif($key==='dev'){
   // Presentation-only groups. Never mutate the 54-URL SEO registry in mega-menu-trial.php.
   $dev_groups=array(
    'Бізнес-системи'=>array(
     'live'=>array(
      'business-automation'=>'Автоматизація бізнесу',
      'crm-development'=>'CRM для бізнесу',
      'web-applications'=>'Вебзастосунки',
      'business-dashboards'=>'Дашборди та звітність'
     ),
     'live_extra'=>array('client-portals'=>'Особисті кабінети клієнтів')
    ),
    'Інтеграції й функціонал'=>array(
     'live'=>array(
      'api-integrations'=>'Інтеграція сервісів через API',
      'custom-functionality'=>'Індивідуальний функціонал'
     ),
     'live_extra'=>array('data-parsing'=>'Парсинг і синхронізація даних','payment-integration'=>'Інтеграція платіжних систем')
    ),
    'Штучний інтелект'=>array(
     'live'=>array(
      'ai-agents'=>'AI-агенти для бізнесу',
      'chatbot-development'=>'Розробка чат-ботів'
     ),
     'live_extra'=>array()
    ),
    'Мобільні застосунки'=>array(
     'live'=>array(),
     'live_extra'=>array('mobile-app-development'=>'Мобільні застосунки для iOS та Android','ecommerce-mobile-apps'=>'Застосунки для інтернет-магазинів','corporate-mobile-apps'=>'Корпоративні мобільні застосунки','pwa-development'=>'PWA-застосунки')
    )
   );
   foreach($dev_groups as $heading=>$services){
    echo '<section class="mrseo-ua-six-catalog-group"><h3>'.esc_html($heading).'</h3>';
    foreach($services['live'] as $slug=>$label){
     echo '<a href="'.esc_url(mrseo_url($slug,'uk')).'"'.($current===$slug?' aria-current="page"':'').'>'.esc_html($label).' <span aria-hidden="true">↗</span></a>';
    }
    foreach($services['live_extra'] as $slug=>$label){
     echo '<a href="'.esc_url(home_url('/'.$slug.'/')).'"'.($current===$slug?' aria-current="page"':'').'>'.esc_html($label).' <span aria-hidden="true">↗</span></a>';
    }
    echo '</section>';
   }
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
