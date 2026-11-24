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
  // Five primary SEO destinations; the parent /seo/ is a full overview. All legacy routes remain valid.
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

/* Flat full-width Ukrainian service catalogue, preserving the existing native URLs. */
function mrseo_ua_header_catalog(){
 $groups=mrseo_ua_menu_groups();$current=mrseo_slug();
 $names=array('seo'=>'SEO','ads'=>'Google Ads','horoshop'=>'Хорошоп','sites'=>'Сайти','dev'=>'Веброзробка');
 $compact_exclude=array('google-ads-audit','merchant-center','website-maintenance','website-speed-security','custom-functionality','ecommerce-mobile-apps','corporate-mobile-apps','pwa-development','google-remarketing','website-redesign');
 $icons=array('seo'=>'<circle cx="10" cy="10" r="6.5"/><path d="m15 15 6 6"/>','ads'=>'<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/>','horoshop'=>'<path d="M4 8h16l1 13H3zM8 8V6a4 4 0 0 1 8 0v2"/>','sites'=>'<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M7 6.5h.1M10 6.5h.1"/>','dev'=>'<path d="m8 6-6 6 6 6m8-12 6 6-6 6m-3-15-5 18"/>');
 echo '<div class="mrseo-mega mrseo-mega--catalog" data-ua-mega="v4"><div class="mrseo-mega-grid mrseo-catalog-grid">';
 foreach($groups as $group){
  // Five primary SEO destinations; the parent /seo/ is a full overview. All legacy routes remain valid.
  $key=$group['key'];
  if(!isset($names[$key]))continue;
  $is_horoshop=$key==='horoshop';
  echo '<section class="mrseo-catalog-group mrseo-catalog-group--'.esc_attr($key).'" data-catalog-group="'.esc_attr($key).'">';
  echo '<h3><a class="mrseo-catalog-parent" href="'.esc_url(mrseo_url($group['parent'],'uk')).'"><svg class="mrseo-catalog-icon" viewBox="0 0 24 24" width="27" height="27" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'.$icons[$key].'</svg><span class="mrseo-catalog-title">'.esc_html($names[$key]).'</span><span class="mrseo-catalog-arrow" aria-hidden="true">↗</span></a></h3>';
  echo '<div class="mrseo-catalog-links">';
  if($key==='seo'){
   echo '<section class="mrseo-catalog-subgroup"><h3>SEO-послуги</h3>';
   $seo_services=array(
    'local-seo'=>'Локальне SEO',
    'ecommerce-seo'=>'SEO інтернет-магазинів',
    'service-business-seo'=>'SEO сайтів послуг',
    'international-seo'=>'Міжнародне SEO',
    'seo-audit'=>'SEO-аудит'
   );
   foreach($seo_services as $slug=>$label){
    echo '<a class="mrseo-mega-item mrseo-catalog-link" href="'.esc_url(mrseo_url($slug,'uk')).'"'.($current===$slug?' aria-current="page"':'').'>'.esc_html($label).'</a>';
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
    echo '<section class="mrseo-catalog-subgroup"><h3>'.esc_html($heading).'</h3>';
    foreach($services as $anchor=>$label){
     if(in_array($anchor,array('search-ads','shopping','pmax','ga4'),true))continue;
     echo '<a class="mrseo-mega-item mrseo-catalog-link" href="'.esc_url(mrseo_hs_url($anchor)).'">'.esc_html($label).'</a>';
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
    echo '<section class="mrseo-catalog-subgroup"><h3>'.esc_html($heading).'</h3>';
    foreach($services['live'] as $slug=>$label){
     if(in_array($slug,$compact_exclude,true))continue;
     echo '<a class="mrseo-mega-item mrseo-catalog-link" href="'.esc_url(mrseo_url($slug,'uk')).'"'.($current===$slug?' aria-current="page"':'').'>'.esc_html($label).'</a>';
    }
    foreach($services['live_extra'] as $slug=>$label){
     if(in_array($slug,$compact_exclude,true))continue;
     echo '<a class="mrseo-mega-item mrseo-catalog-link" href="'.esc_url(home_url('/'.$slug.'/')).'"'.($current===$slug?' aria-current="page"':'').'>'.esc_html($label).'</a>';
    }
    echo '</section>';
   }
  }else{
   foreach($group['sections'] as $section){
    $visible=array_values(array_filter($section['items'],static function($service)use($compact_exclude){return !in_array($service[0],$compact_exclude,true);}));
    if(empty($visible))continue;
    echo '<section class="mrseo-catalog-subgroup"><h3>'.esc_html($section['title']).'</h3>';
    foreach($visible as $service){
     $slug=$service[0];$active=$current===$slug;
     echo '<a class="mrseo-mega-item mrseo-catalog-link" href="'.esc_url(mrseo_url($slug,'uk')).'"'.($active?' aria-current="page"':'').'>'.esc_html($service[1]).'</a>';
    }
    echo '</section>';
   }
  }
  echo '</div></section>';
 }
 echo '</div><div class="mrseo-catalog-footer"><div><strong>Маєте нестандартну задачу?</strong><p>Розкажіть про неї — запропонуємо можливе рішення.</p></div><a href="'.esc_url(mrseo_url('contact','uk')).'">Обговорити проєкт ↗</a></div></div>';
}
