<?php
/** Ukrainian-only commercial interiors; original route content, original WordPress chrome. */
if(!defined('ABSPATH'))exit;
require_once get_template_directory().'/inc/premium-ua-commercial-routes.php';
require_once get_template_directory().'/inc/premium-ua-commercial-copy.php';
require_once get_template_directory().'/inc/premium-ua-commercial-art.php';
require_once get_template_directory().'/inc/premium-ads-campaign-art.php';
$psc_slug=mrseo_slug();
$psc_art=mrseo_puc_route($psc_slug);
$psc_ads_campaign=in_array($psc_slug,mrseo_puc_ads_campaign_slugs(),true);
$psc=mrseo_puc_copy($psc_slug);
if(mrseo_locale()!=='uk'||!$psc_art||!$psc){status_header(404);include get_404_template();return;}
$psc_problem_id=$psc['problemId']??'uws-pains';
$psc_delivery_id=$psc['deliveryId']??'uws-solution-title';
$psc_title_id=$psc['titleId']??'uws-title';
$psc_final_id=$psc['finalId']??'uws-final-title';
$psc_faq_id=$psc['faqId']??'uws-faq-title';
$psc_head=static function($value){echo wp_kses($value,array('em'=>array()));};
require_once get_template_directory().'/inc/ua-ads-position.php';
add_action('wp_enqueue_scripts',static function(){
 wp_enqueue_style('mrseo-puc-base',get_template_directory_uri().'/assets/premium-ua-interiors.css',array('mrseo-style'),'1.1.1');
 wp_enqueue_style('mrseo-puc',get_template_directory_uri().'/assets/premium-ua-commercial.css',array('mrseo-puc-base'),'1.0.0');
 wp_enqueue_script('mrseo-puc',get_template_directory_uri().'/assets/premium-ua-commercial.js',array(),'1.1.0',true);
 if(in_array(mrseo_slug(),mrseo_puc_ads_campaign_slugs(),true))wp_enqueue_style('mrseo-puc-ads-campaign',get_template_directory_uri().'/assets/premium-ads-campaign.css',array('mrseo-puc'),'2.0.0');
 if(mrseo_ads_position_copy(mrseo_slug()))wp_enqueue_style('mrseo-ua-ads-position',get_template_directory_uri().'/assets/ua-ads-position.css',array(in_array(mrseo_slug(),mrseo_puc_ads_campaign_slugs(),true)?'mrseo-puc-ads-campaign':'mrseo-puc'),'1.0.0');
},100);
get_header();
if($psc_ads_campaign){require get_template_directory().'/inc/premium-ads-campaign-page.php';get_footer();return;}
?>
<div class="pti-page puc-page<?php echo $psc_ads_campaign?' puc-ads-campaign':'';?>" data-puc-route="<?php echo esc_attr($psc_slug);?>" id="main-content">
 <section class="pti-hero psc-hero" aria-labelledby="<?php echo esc_attr($psc_title_id);?>">
  <div class="pti-wrap pti-hero-grid">
   <div class="pti-hero-copy">
    <nav class="pti-crumb" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url());?>">Головна</a> / <?php if(!empty($psc['parent'])):?><a href="<?php echo esc_url(mrseo_url($psc['parent']));?>"><?php echo esc_html($psc['group']);?></a><?php else:?><span><?php echo esc_html($psc['group']);?></span><?php endif;?> / <span><?php echo esc_html($psc['title']);?></span></nav>
    <span class="pti-kicker"><?php echo esc_html($psc['kicker']);?></span>
    <h1 id="<?php echo esc_attr($psc_title_id);?>"><?php echo esc_html($psc['headline'][0]);?> <em><?php echo esc_html($psc['headline'][1]);?></em></h1>
    <p class="pti-lead"><?php echo esc_html($psc['lead']);?></p>
    <?php mrseo_ads_position_hero($psc_slug);?>
    <div class="pti-actions"><a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($psc['button']);?> ↗</a><a class="pti-pill pti-secondary" href="#<?php echo esc_attr($psc_problem_id);?>">З чого почнемо ↓</a></div>
    <p class="pti-footnote"><?php echo esc_html($psc['foot']);?></p>
   </div>
   <div class="psc-hero-scene" data-puc-phase="0">
    <div class="psc-hero-stage">
     <div class="psc-stage-meta"><span><?php echo esc_html($psc['label']);?></span><span>MRSEO / 01</span></div>
     <?php mrseo_puc_art($psc_art['hero']);?>
    </div>
    <div class="pti-scene-controls">
     <div class="pti-tabs" role="group" aria-label="Етапи процесу"><?php foreach($psc['tabs'] as $i=>$tab):?>
      <button type="button" data-puc-tab="<?php echo esc_attr($i);?>" data-puc-caption="<?php echo esc_attr($tab[1]);?>" aria-pressed="<?php echo $i===0?'true':'false';?>"><?php echo esc_html($tab[0]);?></button>
     <?php endforeach;?></div>
     <button class="pti-pause psc-pause" type="button" aria-pressed="false">Призупинити рух</button>
    </div>
    <p class="pti-scene-caption" aria-live="polite"><b data-puc-index>01 / 03</b><span data-puc-caption-text><?php echo esc_html($psc['tabs'][0][1]);?></span></p>
    <p class="pti-footnote psc-demo-note">Ілюстрація принципу, не дані клієнтського проєкту.</p>
   </div>
  </div>
 </section>
 <?php mrseo_ads_position_render($psc_slug);?>
 <section class="pti-section psc-problems" id="<?php echo esc_attr($psc_problem_id);?>" aria-labelledby="psc-problem-title">
  <div class="pti-wrap">
   <div class="pti-section-head"><div><span class="pti-kicker">ЯКУ ПРОБЛЕМУ ВИРІШУЄМО</span><h2 id="psc-problem-title"><?php echo esc_html($psc['problemHeading']);?></h2></div><p><?php echo esc_html($psc['problemLead']);?></p></div>
   <div class="pti-grid psc-problem-grid">
   <?php foreach($psc['pains'] as $i=>$problem):?>
    <article class="pti-card psc-problem-card"><span class="pti-num"><?php echo esc_html(sprintf('%02d',$i+1));?> / 03</span><div class="psc-mini-art"><?php mrseo_puc_art($psc_art['problem'][$i]);?></div><h3><?php echo esc_html($problem[0]);?></h3><p><?php echo esc_html($problem[1]);?></p></article>
   <?php endforeach;?>
   </div>
  </div>
 </section>
 <?php if(!empty($psc['plan'])):$plan=$psc['plan'];?>
 <section class="pti-section pti-alt puc-plan" aria-labelledby="puc-plan-title"><div class="pti-wrap psc-story-grid">
  <div class="psc-story-visual"><?php mrseo_puc_art($psc_art['plan']);?></div>
  <div><span class="pti-kicker"><?php echo esc_html($plan['eyebrow']);?></span><h2 id="puc-plan-title"><?php echo esc_html($plan['heading'][0]);?> <em><?php echo esc_html($plan['heading'][1]);?></em></h2><p class="pti-lead"><?php echo esc_html($plan['lead']);?></p><div class="pti-steps"><?php foreach($plan['steps'] as $i=>$step):?><div class="pti-step"><b><?php echo esc_html(sprintf('%02d',$i+1));?></b><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div></div><?php endforeach;?></div><a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($plan['cta']);?> ↗</a><p class="pti-footnote">Ілюстрація підходу, не клієнтський кейс.</p></div>
 </div></section>
 <?php endif;?>
 <section class="pti-section psc-delivery<?php echo empty($psc['plan'])?' pti-alt':'';?>" id="uws-solution" aria-labelledby="<?php echo esc_attr($psc_delivery_id);?>">
  <div class="pti-wrap psc-story-grid">
   <div class="psc-story-visual"><?php mrseo_puc_art($psc_art['storyId']);?></div>
   <div class="psc-delivery-copy">
    <span class="pti-kicker"><?php echo esc_html($psc['resultTitle']);?></span>
    <h2 id="<?php echo esc_attr($psc_delivery_id);?>"><?php $psc_head($psc['sectionTitle']);?></h2>
    <div class="pti-steps"><?php foreach($psc['benefits'] as $i=>$item):?><div class="pti-step"><b><?php echo esc_html(sprintf('%02d',$i+1));?></b><div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></div></div><?php endforeach;?></div>
    <div class="psc-result"><span class="pti-kicker"><?php echo esc_html($psc['resultTitle']);?></span><p><?php echo esc_html($psc['result']);?></p></div>
    <p class="pti-footnote">Ілюстрація підходу, не дані конкретного проєкту.</p>
    <button class="psc-pause psc-lower-pause" type="button" aria-pressed="false">Призупинити рух</button>
   </div>
  </div>
 </section>
 <section class="pti-section psc-faq-section"><div class="pti-wrap pti-faq">
  <div><span class="pti-kicker">ПЕРЕД ПОЧАТКОМ</span><h2 id="<?php echo esc_attr($psc_faq_id);?>"><?php echo esc_html($psc['faqHeading']??'Коротко про важливе.');?></h2><?php if(!empty($psc['faqLead'])):?><p><?php echo esc_html($psc['faqLead']);?></p><?php endif;?></div>
  <div><?php foreach($psc['faq'] as $i=>$item):?><details><summary><?php echo esc_html($item[0]);?></summary><p><?php echo esc_html($item[1]);?></p></details><?php endforeach;?></div>
 </div></section>
 <section class="pti-final psc-final"><div class="pti-wrap">
  <div class="psc-final-art"><?php mrseo_puc_art($psc_art['endId']);?></div>
  <div><span class="pti-kicker">ПЕРШИЙ КРОК</span><h2 id="<?php echo esc_attr($psc_final_id);?>"><?php $psc_head($psc['ctaTitle']);?></h2><p><?php echo esc_html($psc['ctaLead']);?></p><?php if(!empty($psc['related'])):?><div class="puc-related-inline"><?php foreach($psc['related'] as $link):?><a href="<?php echo esc_url(mrseo_url($link[0]));?>"><?php echo esc_html($link[1]);?> ↗</a><?php endforeach;?></div><?php endif;?></div>
  <a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($psc['finalButton']??$psc['button']);?> ↗</a>
 </div></section>
</div>
<?php get_footer();?>
