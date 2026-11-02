<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/motion-scenes-copy.php';
/** Domain-specific editorial previews, not real customer metrics. */
function mrseo_render_motion_scene($slug,$locale=null){
 $copy=mrseo_scene_copy($slug,$locale);if(!$copy)return;
 $steps=$copy['steps'];$tabs=$copy['tabs'];
 ?>
 <div class="ms-scene ms-scene-<?php echo esc_attr($slug);?>" data-ms-scene="<?php echo esc_attr($slug);?>" data-ms-active="0" aria-label="<?php echo esc_attr($copy['name']);?>">
  <div class="ms-top"><span class="ms-top-mark"><i></i> MRSEO / <?php echo esc_html($copy['name']);?></span><span class="ms-signal" aria-hidden="true"><i></i><i></i><i></i></span></div>
  <div class="ms-stage" aria-hidden="true">
  <?php switch($slug):
  case 'seo':?>
   <div class="ms-search-box"><span class="ms-search-glass">⌕</span><span><?php echo esc_html($steps[0]);?></span><i></i></div>
   <div class="ms-serp"><?php foreach($steps as $i=>$step):?><div class="ms-serp-row ms-select-<?php echo esc_attr($i);?>"><span class="ms-serp-check"><?php echo esc_html(sprintf('%02d',$i+1));?></span><div class="ms-serp-copy"><strong><?php echo esc_html($step);?></strong><i></i><i></i></div><span class="ms-serp-arrow">↗</span></div><?php endforeach;?></div>
   <span class="ms-float-tag ms-float-left"><?php echo esc_html($tabs[1]);?> ✓</span><span class="ms-float-tag ms-float-right"><?php echo esc_html($tabs[2]);?> ↗</span>
  <?php break;
  case 'seo-audit':?>
   <div class="ms-window ms-audit-window"><div class="ms-window-top"><span>example.com / <?php echo esc_html($copy['name']);?></span><span class="ms-window-status">● <?php echo esc_html($tabs[0]);?></span></div>
    <?php foreach(array('200 OK','CANONICAL','301 REDIRECT','INDEXABILITY') as $i=>$val):?>
    <div class="ms-audit-row ms-select-<?php echo esc_attr($i%3);?>"><span><?php echo esc_html(sprintf('%02d',$i+1));?></span><strong><?php echo esc_html($val);?></strong><i></i></div>
    <?php endforeach;?><div class="ms-audit-beam"></div></div><div class="ms-audit-stamp">✓ <span>QA</span></div>
  <?php break;
  case 'ecommerce-seo':?>
   <div class="ms-store-layout"><div class="ms-store-nav"><div class="ms-store-nav-head"><?php echo esc_html($copy['name']);?></div><?php foreach($tabs as $i=>$tab):?><span class="ms-select-<?php echo esc_attr($i);?>"><?php echo esc_html($tab);?> <b>↗</b></span><?php endforeach;?></div>
   <div class="ms-store-grid"><?php for($i=0;$i<4;$i++):?><div class="ms-product"><i class="ms-product-figure ms-product-figure-<?php echo esc_attr($i);?>"></i><span></span><b></b></div><?php endfor;?></div></div>
   <div class="ms-store-filter"><i></i><i></i><i></i><span><?php echo esc_html($steps[2]);?> ✓</span></div>
  <?php break;
  case 'google-ads':?>
   <div class="ms-ads-hub"><div class="ms-ads-target"><div class="ms-ads-rings"></div><strong>ADS</strong><span>↗</span></div>
   <?php foreach($tabs as $i=>$tab):?><div class="ms-ads-card ms-ads-card-<?php echo esc_attr($i);?>"><small>0<?php echo esc_html($i+1);?> /</small><?php echo esc_html($tab);?><i></i></div><?php endforeach;?>
   <div class="ms-ads-connector ms-ads-connector-a"></div><div class="ms-ads-connector ms-ads-connector-b"></div></div>
   <div class="ms-ads-measure"><span><?php echo esc_html($steps[1]);?></span><i></i><span><?php echo esc_html($steps[2]);?></span><b>✓</b></div>
  <?php break;
  case 'analytics':?>
   <div class="ms-data-head"><span>GA4 / <?php echo esc_html($copy['name']);?></span><span class="ms-data-live">● <?php echo esc_html($tabs[0]);?></span></div>
   <svg class="ms-data-path" viewBox="0 0 500 145" preserveAspectRatio="none"><path d="M5 118 C105 118 92 52 175 70 S300 118 352 43 S420 27 495 14" fill="none" stroke="#c97769" stroke-width="4" stroke-linecap="round" class="ms-data-draw"/><path d="M5 118 C105 118 92 52 175 70 S300 118 352 43 S420 27 495 14" fill="none" stroke="#c97769" stroke-width="2" stroke-dasharray="3 12" class="ms-data-dash"/></svg>
   <div class="ms-data-events"><?php foreach($steps as $i=>$step):?><div class="ms-data-event ms-select-<?php echo esc_attr($i);?>"><i></i><span><?php echo esc_html($step);?></span><b>✓</b></div><?php endforeach;?></div>
   <div class="ms-data-check"><span>event_name</span><strong>purchase</strong><i>✓</i></div>
  <?php break;
  case 'web-development':?>
   <div class="ms-dev-schema"><div class="ms-dev-node ms-dev-node-a"><small>01 /</small><strong><?php echo esc_html($steps[0]);?></strong><span>UI / ACCESS</span></div>
   <div class="ms-dev-node ms-dev-node-b"><small>02 /</small><strong>API</strong><span>DATA FLOW</span></div>
   <div class="ms-dev-node ms-dev-node-c"><small>03 /</small><strong>CRM</strong><span>WORKFLOW</span></div>
   <div class="ms-dev-wire ms-dev-wire-a"></div><div class="ms-dev-wire ms-dev-wire-b"></div><div class="ms-dev-pulse ms-dev-pulse-a"></div><div class="ms-dev-pulse ms-dev-pulse-b"></div></div>
   <div class="ms-dev-code"><span><em>const</em> process = <b>{</b></span><span>&nbsp;&nbsp;sync: <strong>'verified'</strong>,</span><span>&nbsp;&nbsp;errors: <strong>'monitored'</strong></span><span><b>};</b><i></i></span></div>
  <?php break;
  case 'service-websites':?>
   <div class="ms-web-screen"><div class="ms-web-toolbar"><i></i><i></i><i></i><span><?php echo esc_html($copy['name']);?></span></div>
    <div class="ms-web-header"><span></span><i></i><i></i><i></i></div>
    <div class="ms-web-intro"><div><strong></strong><strong></strong><span></span><span></span><b></b></div><div class="ms-web-graphic"><i></i><i></i><i></i></div></div>
    <div class="ms-web-tiles"><span></span><span></span><span></span></div><div class="ms-web-overlay"></div></div>
   <div class="ms-web-mobile"><i></i><span></span><span></span><b></b><span></span></div>
  <?php break;
  case 'performance-max':?>
   <div class="ms-pmax-hub"><div class="ms-pmax-core">PMax<span>↗</span></div>
    <span class="ms-pmax-node ms-pmax-node-a">FEED</span><span class="ms-pmax-node ms-pmax-node-b">SEARCH</span><span class="ms-pmax-node ms-pmax-node-c">SHOPPING</span><div class="ms-pmax-ring"></div><div class="ms-pmax-ring ms-pmax-ring-two"></div>
   </div><div class="ms-pmax-bottom"><span><?php echo esc_html($steps[0]);?></span><i></i><span><?php echo esc_html($steps[2]);?></span></div>
  <?php break;
  case 'horoshop':?>
   <div class="ms-horoshop-window">
    <div class="ms-horoshop-toolbar"><span class="ms-horoshop-dots" aria-hidden="true"><i></i><i></i><i></i></span><strong>ХОРОШОП / КАТАЛОГ</strong><b>↗</b></div>
    <div class="ms-horoshop-layout">
     <div class="ms-horoshop-side"><?php foreach($tabs as $i=>$tab):?><div class="ms-select-<?php echo esc_attr($i);?>"><span><?php echo esc_html(sprintf('%02d',$i+1));?></span><strong><?php echo esc_html($tab);?></strong><b>↗</b></div><?php endforeach;?></div>
     <div class="ms-horoshop-products"><div><span class="ms-horoshop-product-icon">▤</span><i></i><i></i></div><div><span class="ms-horoshop-product-icon">◈</span><i></i><i></i></div><div><span class="ms-horoshop-product-icon">▣</span><i></i><i></i></div></div>
    </div>
    <div class="ms-horoshop-pipeline"><span>SEO</span><i></i><span>MERCHANT</span><i></i><span>ПОКУПКА ✓</span></div>
   </div>
  <?php break;
  case 'about':?>
   <div class="ms-about-center"><span><?php echo esc_html($copy['name']);?></span><strong>10</strong><small><?php echo esc_html(array('uk'=>'РОКІВ','ru'=>'ЛЕТ','en'=>'YEARS','pl'=>'LAT','de'=>'JAHRE')[$locale?:mrseo_locale()]??'YEARS');?></small></div>
   <div class="ms-about-card ms-about-card-a">SEO <b>↗</b></div><div class="ms-about-card ms-about-card-b">GOOGLE ADS <b>↗</b></div><div class="ms-about-card ms-about-card-c">ENGINEERING <b>↗</b></div>
  <?php break;
  case 'portfolio':?>
   <div class="ms-portfolio-rows"><?php foreach(array('avtomoda.com.ua','armonelli.com.ua','powerlux.com.ua','urolog.kr.ua','turboparts.ua','welltex.ua') as $i=>$domain):?><div class="ms-portfolio-item"><small><?php echo esc_html(sprintf('%02d',$i+1));?></small><strong><?php echo esc_html($domain);?></strong><span>↗</span></div><?php endforeach;?></div><span class="ms-portfolio-badge">MRSEO / PORTFOLIO</span>
  <?php break;
  case 'contact':?>
   <div class="ms-contact-flow"><?php foreach($steps as $i=>$step):?><div class="ms-contact-tile ms-contact-tile-<?php echo esc_attr($i);?>"><span>0<?php echo esc_html($i+1);?> /</span><strong><?php echo esc_html($step);?></strong><i><?php echo $i===2?'✓':'';?></i></div><?php endforeach;?></div><div class="ms-contact-arrow"></div>
  <?php break;
  endswitch;?>
  </div>
  <div class="ms-description"><span class="ms-description-index" data-ms-index>01 / 03</span><div><strong><?php echo esc_html($copy['name']);?></strong><p data-ms-description><?php echo esc_html($copy['intro']);?></p></div></div>
  <div class="ms-tabs" role="group" aria-label="<?php echo esc_attr($copy['name']);?>">
   <?php foreach($tabs as $i=>$tab):?><button type="button" class="ms-tab<?php if($i===0):?> is-active<?php endif;?>" data-ms-tab="<?php echo esc_attr($i);?>" aria-pressed="<?php echo $i===0?'true':'false';?>" data-ms-caption="<?php echo esc_attr($steps[$i]);?>"><?php echo esc_html($tab);?></button><?php endforeach;?>
  </div>
 </div>
 <?php
}
