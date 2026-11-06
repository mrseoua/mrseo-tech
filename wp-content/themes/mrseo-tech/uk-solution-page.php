<?php
/** Reusable UI, original content per service. Ukrainian routes only. */
if(!defined('ABSPATH'))exit;
require_once get_template_directory().'/inc/uk-solution-content.php';
$slug=mrseo_slug();
$page=mrseo_uk_solution_content($slug);
if(!$page || mrseo_locale()!=='uk'){status_header(404);include get_404_template();return;}
if(in_array($slug,array('analytics','service-websites'),true))require_once get_template_directory().'/inc/ua-four-service-visuals.php';
if($slug==='performance-max')require_once get_template_directory().'/inc/ua-final-interior-visuals.php';
get_header();
?>
<div class="ukseo ukseo--solution ukseo--<?php echo esc_attr($slug);?>" id="main-content">
 <section class="ukseo-hero" aria-labelledby="uksolution-title">
  <div class="container ukseo-hero-grid">
   <div class="ukseo-hero-copy">
    <nav class="ukseo-crumbs" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url());?>">Головна</a><span aria-hidden="true">/</span><span><?php echo esc_html($page['eyebrow']);?></span></nav>
    <div class="ukseo-kicker"><?php echo esc_html($page['eyebrow']);?></div>
    <h1 id="uksolution-title"><?php echo esc_html($page['headline'][0]);?> <em><?php echo esc_html($page['headline'][1]);?></em></h1>
    <p class="ukseo-hero-lead"><?php echo esc_html($page['lead']);?></p>
    <div class="ukseo-actions">
     <a class="ukseo-button ukseo-button-dark" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($page['button']);?> <span aria-hidden="true">↗</span></a>
     <a class="ukseo-text-link" href="#uksolution-symptoms">Знайти свою проблему <span aria-hidden="true">↓</span></a>
    </div>
    <p class="ukseo-hero-foot">Спочатку підтверджуємо причину. Потім пропонуємо рішення.</p>
   </div>
   <div class="ukseo-hero-art">
    <?php mrseo_render_motion_scene($slug);?>
    <div class="ukseo-visual-caption"><span class="ukseo-visual-caption-mark">01 / <?php echo esc_html($page['eyebrow']);?></span><span><?php echo esc_html($page['caption']);?></span></div>
   </div>
  </div>
 </section>
 <section class="ukseo-cases" id="uksolution-symptoms" aria-labelledby="uksolution-symptoms-title"><div class="container">
  <div class="ukseo-section-head">
   <div><span class="ukseo-kicker">ДЕ ВТРАЧАЄТЬСЯ РЕЗУЛЬТАТ</span><h2 id="uksolution-symptoms-title"><?php echo esc_html($page['symptomHeading']);?></h2></div>
   <p><?php echo esc_html($page['symptomLead']);?></p>
  </div>
  <div class="ukseo-problem-grid"><?php foreach($page['problems'] as $i=>$problem):?>
   <article class="ukseo-problem-card">
    <div class="ukseo-card-number"><?php echo esc_html(sprintf('%02d',$i+1));?><span aria-hidden="true">↗</span></div>
    <h3><?php echo esc_html($problem[0]);?></h3><p><?php echo esc_html($problem[1]);?></p>
    
   </article>
  <?php endforeach;?></div>
 </div></section>
 <?php if(in_array($slug,array('analytics','service-websites'),true))mrseo_render_ua4_visual($slug,'plan'); ?>
 <?php if($slug==='performance-max')mrseo_render_ua_final_service($slug,'plan'); ?>
 <section class="ukseo-delivery" aria-labelledby="uksolution-deliver-title"><div class="container ukseo-delivery-grid">
  <div><span class="ukseo-kicker">ЩО ОТРИМУЄТЕ</span>
   <h2 id="uksolution-deliver-title"><?php echo esc_html($page['deliveryHeading'][0]);?> <em><?php echo esc_html($page['deliveryHeading'][1]);?></em></h2>
   <p><?php echo esc_html($page['deliveryLead']);?></p>
  </div>
  <div class="ukseo-delivery-list"><?php foreach($page['deliveries'] as $i=>$item):?>
   <div><span aria-hidden="true"><?php echo esc_html(sprintf('%02d',$i+1));?></span>
    <div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></div>
   </div>
  <?php endforeach;?></div>
 </div></section>
 <section class="ukseo-faq" aria-labelledby="uksolution-faq-title"><div class="container ukseo-faq-grid">
  <div><span class="ukseo-kicker">ПЕРЕД ПОЧАТКОМ</span><h2 id="uksolution-faq-title"><?php echo esc_html($page['faqHeading']);?></h2>
   <p>Відповіді, які допоможуть прийняти рішення.</p></div>
  <div class="ukseo-faq-items"><?php foreach($page['faq'] as $item):?>
   <details><summary><?php echo esc_html($item[0]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($item[1]);?></p></details>
  <?php endforeach;?></div>
 </div></section>
 <section class="ukseo-final" aria-labelledby="uksolution-final-title"><div class="container ukseo-final-grid">
  <div><span class="ukseo-kicker">ПЕРШИЙ КРОК</span>
   <h2 id="uksolution-final-title"><?php echo esc_html($page['finalHeading'][0]);?> <em><?php echo esc_html($page['finalHeading'][1]);?></em></h2>
   <p><?php echo esc_html($page['finalText']);?></p><a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url($page['relatedSlug']));?>"><?php echo esc_html($page['related']);?> <span aria-hidden="true">↗</span></a></div>
  <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($page['button']);?> <span aria-hidden="true">↗</span></a>
 </div></section>
</div>
<?php get_footer();?>
