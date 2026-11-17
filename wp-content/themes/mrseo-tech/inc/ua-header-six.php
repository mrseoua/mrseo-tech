<?php
if(!defined('ABSPATH'))exit;
/* Only existing Ukrainian routes. No new landing pages or duplicate SEO content. */
function mrseo_ua_header_six($mobile=false){
 $groups=mrseo_ua_menu_groups();$current=mrseo_slug();
 $quick=array('seo'=>array('seo-audit','ecommerce-seo','local-seo','international-seo'),'ads'=>array('google-search-ads','performance-max','google-shopping','google-ads-audit'),'commerce'=>array('store-conversion','store-migration','catalog-automation'),'horoshop'=>array(),'sites'=>array('wordpress-development','landing-pages','corporate-websites','website-redesign'),'dev'=>array('crm-development','web-applications','api-integrations','ai-agents'));
 echo '<nav class="mrseo-ua-six'.($mobile?' mrseo-ua-six--mobile':' mrseo-ua-six--desktop').'" aria-label="Напрями послуг"><div class="mrseo-ua-six-inner">';
 foreach($groups as $g){
  if($g['key']==='data')continue;
  $key=$g['key'];$by_slug=array_column($g['items'],1,0);
  echo '<details class="mrseo-ua-six-item" name="'.($mobile?'ua-six-mobile':'ua-six-desktop').'">';
  echo '<summary>'.esc_html($g['title']).'<span aria-hidden="true">⌄</span></summary>';
  echo '<div class="mrseo-ua-six-panel">';
  echo '<a class="mrseo-ua-six-primary" href="'.esc_url(mrseo_url($g['parent'],'uk')).'"'.($current===$g['parent']?' aria-current="page"':'').'>'.esc_html($key==='seo'?'Усі SEO-послуги':($key==='horoshop'?'Послуги для Хорошоп':'Усі послуги')).' <span aria-hidden="true">↗</span></a>';
  foreach($quick[$key] as $slug){$active=$current===$slug;
   echo '<a href="'.esc_url(mrseo_url($slug,'uk')).'"'.($active?' aria-current="page"':'').'>'.esc_html($by_slug[$slug]).' <span aria-hidden="true">↗</span></a>';
  }
  echo '</div></details>';
 }
 echo '</div></nav>';
}
