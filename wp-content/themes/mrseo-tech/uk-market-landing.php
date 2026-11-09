<?php
/** Original UK commercial service template. */
if(!defined('ABSPATH'))exit;
$pl_slug=mrseo_slug();
$pl_page=mrseo_uk_market_page($pl_slug);
if(mrseo_locale()!=='en'||!$pl_page){status_header(404);include get_404_template();return;}
get_header();
$pl_group=in_array($pl_slug,array('ecommerce-seo','online-shop-development','google-shopping'),true)?'commerce':(
 in_array($pl_slug,array('google-ads','google-ads-audit','performance-max'),true)?'ads':(
 in_array($pl_slug,array('seo','seo-audit'),true)?'seo':(
 $pl_slug==='analytics'?'data':(
 $pl_slug==='merchant-center-help'?'merchant':(
 $pl_slug==='wordpress-care'?'support':'web')))));
?>
<div class="pl-svc pl-svc--en-gb-compact pl-svc--<?php echo esc_attr($pl_group);?> pl-svc-<?php echo esc_attr($pl_slug);?>" id="main-content">
 <section class="pl-svc-hero" aria-labelledby="pl-title">
  <div class="intl-wrap pl-svc-hero-grid">
   <div class="pl-svc-hero-copy">
    <nav class="pl-svc-crumb" aria-label="Breadcrumb"><a href="<?php echo esc_url(mrseo_url('','en'));?>">Home</a><span aria-hidden="true">/</span><span><?php echo esc_html($pl_page['kicker']);?></span></nav>
    <div class="intl-kicker"><?php echo esc_html($pl_page['kicker']);?></div>
    <h1 id="pl-title"><?php echo esc_html($pl_page['hero'][0]);?> <em><?php echo esc_html($pl_page['hero'][1]);?></em></h1>
    <p><?php echo esc_html($pl_page['lead']);?></p>
    <div class="pl-svc-hero-actions"><a class="intl-button" href="<?php echo esc_url(mrseo_url('contact','en'));?>"><?php echo esc_html($pl_page['cta']);?> <span aria-hidden="true">↗</span></a><a class="pl-svc-text-link" href="#pl-needs">See how we help <span aria-hidden="true">↓</span></a></div>
    <div class="pl-svc-hero-note">A defined scope, useful deliverables and no promises we cannot substantiate.</div>
   </div>
   <div class="pl-svc-art">
    <div class="pl-svc-scene pl-svc-scene--<?php echo esc_attr($pl_slug); ?>" role="img" aria-label="<?php echo esc_attr(implode(' – ',$pl_page['visual']));?>">
     <div class="pl-svc-scene-head"><span class="pl-svc-light"></span><span>MRSEO.TECH / <?php echo esc_html($pl_page['kicker']);?></span><span aria-hidden="true">✳</span></div>
     <div class="pl-svc-scene-mark" aria-hidden="true">
      <?php if($pl_group==='web'):?><div class="pl-svc-browser"><div><i></i><i></i><i></i></div><b></b><p></p><p></p><a></a></div>
      <?php elseif($pl_group==='commerce'):?><div class="pl-svc-shop"><i></i><i></i><i></i></div>
      <?php elseif($pl_group==='merchant'):?><div class="pl-svc-merchant"><span>!</span><span>✓</span><span>✓</span></div>
      <?php elseif($pl_group==='support'):?><div class="pl-svc-support"><i></i><i></i><i></i><i></i><i></i></div>
      <?php else:?><div class="pl-svc-bars"><i></i><i></i><i></i><i></i><i></i><i></i></div><?php endif;?>
     </div>
     <div class="pl-svc-scene-steps">
      <?php foreach($pl_page['visual'] as $i=>$name):?>
       <div class="pl-svc-scene-step"><small><?php echo esc_html(sprintf('%02d',$i+1));?></small><strong><?php echo esc_html($name);?></strong></div>
       <?php if($i<2):?><span class="pl-svc-step-arrow" aria-hidden="true">→</span><?php endif;?>
      <?php endforeach;?>
     </div>
     <div class="pl-svc-scene-end"><span>ILLUSTRATIVE WORKFLOW · NOT CLIENT DATA</span><span class="pl-svc-scene-beat" aria-hidden="true"><i></i><i></i><i></i></span></div>
    </div>
   </div>
  </div>
 </section>
 <section class="pl-svc-needs" id="pl-needs" aria-labelledby="pl-needs-h">
  <div class="intl-wrap">
   <div class="pl-svc-section-head"><div><div class="intl-kicker">BUSINESS CHALLENGES</div><h2 id="pl-needs-h"><?php echo esc_html($pl_page['intro']);?></h2></div><p><?php echo esc_html($pl_page['introText']);?></p></div>
   <div class="pl-svc-need-grid">
    <?php foreach($pl_page['problems'] as $i=>$item):?>
     <article class="pl-svc-need"><div class="pl-svc-need-index">0<?php echo esc_html($i+1);?> <span aria-hidden="true">↗</span></div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p><div class="pl-svc-need-action"><small>OUR APPROACH</small><strong><?php echo esc_html($item[2]);?></strong></div></article>
    <?php endforeach;?>
   </div>
  </div>
 </section>
 <section class="pl-svc-outcomes" aria-labelledby="pl-outcomes-title"><div class="intl-wrap pl-svc-outcomes-grid">
  <div><div class="intl-kicker">WHAT YOU RECEIVE</div><h2 id="pl-outcomes-title">What you can <em>actually check.</em></h2><p><?php echo esc_html($pl_page['risk']); ?></p></div>
  <div class="pl-svc-outcome-list"><?php foreach($pl_page['outcomes'] as $i=>$item):?><div><span>0<?php echo esc_html($i+1);?></span><div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></div></div><?php endforeach;?></div>
 </div>
 <?php if($pl_slug==='analytics'):?>
 <p class="intl-wrap pl-svc-technical-link">Need to fix conversion events rather than interpret reports?
  <a href="<?php echo esc_url(mrseo_url('ga4-conversions','en'));?>">Explore GA4 conversion tracking <span aria-hidden="true">↗</span></a>
 </p>
 <?php endif;?>
 </section>
 <section class="pl-svc-faq" aria-labelledby="pl-faq-title"><div class="intl-wrap pl-svc-faq-grid">
  <div><div class="intl-kicker">COMMON QUESTIONS</div><h2 id="pl-faq-title">Before we work together.</h2></div>
  <div class="pl-svc-faq-items"><?php foreach($pl_page['faq'] as $row):?><details><summary><?php echo esc_html($row[0]);?> <span aria-hidden="true">+</span></summary><p><?php echo esc_html($row[1]);?></p></details><?php endforeach;?></div>
 </div></section>
 <section class="intl-final pl-svc-final"><div class="intl-wrap intl-final-grid">
  <div><div class="intl-kicker">MRSEO.TECH / NEXT STEP</div><h2>Tell us what you'd like to build or improve.</h2><p>A brief description and your current website (if any) are enough. We'll discuss scope, constraints and useful next steps before making a proposal.</p></div>
  <a class="intl-final-link" href="<?php echo esc_url(mrseo_url('contact','en'));?>"><?php echo esc_html($pl_page['cta']);?> ↗</a>
 </div></section>
</div>
<?php get_footer();?>