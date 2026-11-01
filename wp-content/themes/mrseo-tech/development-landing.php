<?php
if(!defined('ABSPATH'))exit;
$dev_locale=mrseo_locale();
$dev=mrseo_dev_page($dev_locale);
if(!$dev){status_header(404);include get_404_template();return;}
$is_int_dev=in_array($dev_locale,array('pl','de'),true);
$dev_nav=array(
 'uk'=>array('SEO','SEO інтернет-магазинів','Google Ads','Аналітика','SEO-аудит','Веброзробка'),
 'ru'=>array('SEO','SEO интернет-магазинов','Google Ads','Аналитика','SEO-аудит','Веб-разработка'),
 'en'=>array('SEO','E-commerce SEO','Google Ads','Analytics','SEO Audit','Web Development'),
 'pl'=>array('SEO','SEO sklepów','Google Ads','Analityka','Audyt SEO','Aplikacje i integracje'),
 'de'=>array('SEO','Onlineshop SEO','Google Ads','Webanalyse','SEO-Audit','Webentwicklung')
);
get_header($is_int_dev?'international':null);
?>
<div class="dev-scope">
<section class="dev-hero" aria-labelledby="dev-title">
 <div class="dev-wrap dev-hero-grid">
  <div class="dev-hero-copy">
   <div class="dev-eyebrow"><?php echo esc_html($dev['eyebrow']);?></div>
   <h1 id="dev-title"><?php echo wp_kses_post($dev['headline']);?></h1>
   <p class="dev-lead"><?php echo esc_html($dev['lead']);?></p>
   <div class="dev-hero-actions">
    <a class="dev-button" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($dev['labels']['cta']);?> <span aria-hidden="true">↗</span></a>
    <a class="dev-text-link" href="#dev-capabilities"><?php echo esc_html($dev['labels']['scope']);?> ↓</a>
   </div>
  </div>
  <?php mrseo_render_motion_scene('web-development',$dev_locale);?>
 </div>
</section>
<section class="dev-section dev-diagnosis" aria-labelledby="dev-problems-title">
 <div class="dev-wrap dev-diag-grid">
  <div class="dev-sticky-copy"><div class="dev-eyebrow">01 / <?php echo esc_html($dev['labels']['problem']);?></div>
   <h2 id="dev-problems-title"><?php echo esc_html($dev['labels']['problemTitle']);?></h2>
   <p><?php echo esc_html($dev['labels']['contactNote']);?></p>
  </div>
  <div class="dev-issues">
   <?php foreach($dev['problems'] as $i=>$problem):$solution=$dev['solutions'][$i]??null;if(!$solution)continue;?>
    <details class="dev-issue" name="dev-problem"<?php if($i===0):?> open<?php endif;?>>
     <summary><span class="dev-issue-index"><?php echo esc_html(sprintf('%02d',$i+1));?></span>
      <span class="dev-issue-title"><strong><?php echo esc_html($problem[0]);?></strong><small><?php echo esc_html($problem[1]);?></small></span>
      <span class="dev-issue-toggle" aria-hidden="true">+</span>
     </summary>
     <div class="dev-issue-answer"><span><?php echo esc_html($dev['labels']['solution']);?></span>
      <h3><?php echo esc_html($solution[0]);?></h3><p><?php echo esc_html($solution[1]);?></p>
     </div>
    </details>
   <?php endforeach;?>
  </div>
 </div>
</section>
<section class="dev-section dev-capabilities" id="dev-capabilities" aria-labelledby="dev-scope-title">
 <div class="dev-wrap">
  <div class="dev-section-heading"><div class="dev-eyebrow">02 / <?php echo esc_html($dev['labels']['scope']);?></div>
   <h2 id="dev-scope-title"><?php echo esc_html($dev['labels']['scopeTitle']);?></h2>
  </div>
  <div class="dev-cap-grid">
  <?php foreach($dev['capabilities'] as $i=>$cap):?>
   <article class="dev-cap"><div class="dev-cap-top"><span><?php echo esc_html(sprintf('%02d',$i+1));?> / 06</span><span aria-hidden="true"><?php echo esc_html(array('▣','◈','◇','⌁','↗','◎')[$i]);?></span></div>
     <div class="dev-cap-visual" aria-hidden="true"><i></i><i></i><i></i></div>
     <h3><?php echo esc_html($cap[0]);?></h3><p><?php echo esc_html($cap[1]);?></p>
   </article>
  <?php endforeach;?>
  </div>
 </div>
</section>
<section class="dev-section dev-workflow" aria-labelledby="dev-workflow-title">
 <div class="dev-wrap"><div class="dev-section-heading"><div class="dev-eyebrow">03 / <?php echo esc_html($dev['labels']['process']);?></div><h2 id="dev-workflow-title"><?php echo esc_html($dev['labels']['processTitle']);?></h2></div>
  <div class="dev-workflow-grid">
   <?php foreach($dev['workflow'] as $i=>$step):?>
   <article class="dev-step"><span><?php echo esc_html(sprintf('%02d',$i+1));?></span><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></article>
   <?php endforeach;?>
  </div>
 </div>
</section>
<section class="dev-section dev-technical" aria-labelledby="dev-technical-title">
 <div class="dev-wrap"><div class="dev-section-heading"><div class="dev-eyebrow">04 / <?php echo esc_html($dev['labels']['check']);?></div><h2 id="dev-technical-title"><?php echo esc_html($dev['labels']['checkTitle']);?></h2></div>
  <div class="dev-check-grid">
   <?php foreach($dev['verification'] as $i=>$check):?><article class="dev-check"><span>✓</span><div><h3><?php echo esc_html($check[0]);?></h3><p><?php echo esc_html($check[1]);?></p></div></article><?php endforeach;?>
  </div>
 </div>
</section>
<section class="dev-outcomes" aria-labelledby="dev-outcomes-title"><div class="dev-wrap dev-outcomes-grid">
 <div><div class="dev-eyebrow">05 / DELIVERABLES</div><h2 id="dev-outcomes-title"><?php echo esc_html($dev['labels']['results']);?></h2></div>
 <div><?php foreach($dev['outcomes'] as $i=>$outcome):?><div class="dev-outcome"><span><?php echo esc_html(sprintf('%02d',$i+1));?></span><strong><?php echo esc_html($outcome);?></strong></div><?php endforeach;?></div>
</div></section>
<section class="dev-section dev-faq" aria-labelledby="dev-faq-title"><div class="dev-wrap dev-faq-grid">
 <div><div class="dev-eyebrow">06 / FAQ</div><h2 id="dev-faq-title"><?php echo esc_html($dev['labels']['faq']);?></h2></div>
 <div><?php foreach($dev['faq'] as $entry):?><details><summary><?php echo esc_html($entry[0]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($entry[1]);?></p></details><?php endforeach;?></div>
</div></section>
<section class="dev-cta"><div class="dev-wrap"><div class="dev-eyebrow">MRSEO.TECH / NEXT STEP</div>
 <h2><?php echo esc_html($dev['labels']['cta']);?></h2><p><?php echo esc_html($dev['labels']['contactNote']);?></p>
 <a class="dev-button" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($dev['labels']['cta']);?> ↗</a>
</div></section>
</div>
<?php get_footer($is_int_dev?'international':null);?>
