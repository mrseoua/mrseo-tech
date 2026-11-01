<?php
/** Reusable UI, original content per service. Ukrainian routes only. */
if(!defined('ABSPATH'))exit;
require_once get_template_directory().'/inc/uk-solution-content.php';
$slug=mrseo_slug();
$page=mrseo_uk_solution_content($slug);
if(!$page || mrseo_locale()!=='uk'){status_header(404);include get_404_template();return;}
get_header();
?>
<main class="ukseo ukseo--solution ukseo--<?php echo esc_attr($slug);?>" id="main-content">
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
    <div class="ukseo-card-diagnosis"><span>Що перевіряємо</span><strong><?php echo esc_html($problem[2]);?></strong></div>
   </article>
  <?php endforeach;?></div>
 </div></section>
 <section class="ukseo-decision" aria-labelledby="uksolution-decision-title"><div class="container ukseo-decision-layout">
  <div class="ukseo-decision-copy">
   <span class="ukseo-kicker"><?php echo esc_html($page['panelEyebrow']);?></span>
   <h2 id="uksolution-decision-title"><?php echo esc_html($page['panelHeading'][0]);?> <em><?php echo esc_html($page['panelHeading'][1]);?></em></h2>
   <p><?php echo esc_html($page['panelLead']);?></p>
   <a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url($page['relatedSlug']));?>"><?php echo esc_html($page['related']);?> <span aria-hidden="true">↗</span></a>
  </div>
  <div class="ukseo-spec" aria-label="<?php echo esc_attr($page['exampleTag']);?>">
   <div class="ukseo-spec-top"><span><?php echo esc_html($page['exampleTag']);?></span><span aria-hidden="true">✳</span></div>
   <?php foreach($page['example'] as $item):?>
    <div class="ukseo-spec-row"><small><?php echo esc_html($item[0]);?></small><strong><?php echo esc_html($item[1]);?></strong></div>
   <?php endforeach;?>
   <div class="ukseo-spec-foot"><?php echo esc_html($page['exampleFoot']);?></div>
  </div>
 </div></section>
 <section class="ukseo-work" aria-labelledby="uksolution-process-title"><div class="container">
  <div class="ukseo-section-head">
   <div><span class="ukseo-kicker">ЯК ПЕРЕХОДИМО ДО РІШЕННЯ</span><h2 id="uksolution-process-title"><?php echo esc_html($page['processHeading']);?></h2></div>
   <p><?php echo esc_html($page['processLead']);?></p>
  </div>
  <ol class="ukseo-steps"><?php foreach($page['process'] as $i=>$step):?>
   <li><div class="ukseo-step-index"><?php echo esc_html(sprintf('%02d',$i+1));?></div>
    <div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div>
    <strong><?php echo esc_html($step[2]);?></strong>
   </li>
  <?php endforeach;?></ol>
 </div></section>
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
 <section class="ukseo-proof" aria-labelledby="uksolution-boundary-title"><div class="container ukseo-proof-layout">
  <div><span class="ukseo-kicker">ПРОЗОРИЙ ПІДХІД</span>
   <h2 id="uksolution-boundary-title"><?php echo esc_html($page['boundaryHeading'][0]);?> <em><?php echo esc_html($page['boundaryHeading'][1]);?></em></h2></div>
  <div><p><?php echo esc_html($page['boundaryText']);?></p>
   <a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('portfolio'));?>">Переглянути проєкти з портфоліо <span aria-hidden="true">↗</span></a></div>
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
   <p><?php echo esc_html($page['finalText']);?></p></div>
  <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($page['button']);?> <span aria-hidden="true">↗</span></a>
 </div></section>
</main>
<?php get_footer();?>
