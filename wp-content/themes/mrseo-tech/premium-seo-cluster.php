<?php
/** Native Ukrainian SEO cluster; five unique visual stories, shared accessible controls. */
if(!defined('ABSPATH'))exit;
$psc_slug=mrseo_slug();
if(mrseo_locale()!=='uk'||!in_array($psc_slug,array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),true)){status_header(404);include get_404_template();return;}
require_once get_template_directory().'/inc/premium-seo-cluster-copy.php';
require_once get_template_directory().'/inc/premium-seo-cluster-art.php';
$psc=mrseo_psc_copy($psc_slug);
$psc_art=mrseo_psc_scene_ids($psc_slug);
if(!$psc||!$psc_art){status_header(404);include get_404_template();return;}
$psc_audit=$psc_slug==='seo-audit';
$psc_shop=$psc_slug==='ecommerce-seo';
$psc_problem_id=$psc['problemId']??'uws-pains';
$psc_delivery_id=$psc['deliveryId']??'uws-solution-title';
$psc_title_id=$psc['titleId']??'uws-title';
$psc_final_id=$psc['finalId']??'uws-final-title';
$psc_faq_id=$psc['faqId']??'uws-faq-title';
$psc_head=static function($value){echo wp_kses($value,array('em'=>array()));};
if($psc_audit){require_once get_template_directory().'/inc/ua-final-interior-visuals.php';$psc_plan=mrseo_ua_final_service_copy('seo-audit')['plan'];}
add_action('wp_enqueue_scripts',static function(){
 wp_enqueue_style('mrseo-psc-base',get_template_directory_uri().'/assets/premium-ua-interiors.css',array('mrseo-style'),'1.1.1');
 wp_enqueue_style('mrseo-psc',get_template_directory_uri().'/assets/premium-seo-cluster.css',array('mrseo-psc-base'),'1.0.0');
 wp_enqueue_script('mrseo-psc',get_template_directory_uri().'/assets/premium-seo-cluster.js',array(),'1.0.0',true);
},100);
get_header();
?>
<div class="pti-page psc-page" data-psc-route="<?php echo esc_attr($psc_slug);?>" id="main-content">
 <section class="pti-hero psc-hero" aria-labelledby="<?php echo esc_attr($psc_title_id);?>">
  <div class="pti-wrap pti-hero-grid">
   <div class="pti-hero-copy">
    <nav class="pti-crumb" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url());?>">Головна</a> / <a href="<?php echo esc_url(mrseo_url('seo'));?>">SEO</a> / <span><?php echo esc_html($psc['title']);?></span></nav>
    <span class="pti-kicker"><?php echo esc_html($psc['kicker']);?></span>
    <h1 id="<?php echo esc_attr($psc_title_id);?>"><?php echo esc_html($psc['headline'][0]);?> <em><?php echo esc_html($psc['headline'][1]);?></em></h1>
    <p class="pti-lead"><?php echo esc_html($psc['lead']);?></p>
    <div class="pti-actions"><a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($psc['button']);?> ↗</a><a class="pti-pill pti-secondary" href="#<?php echo esc_attr($psc_problem_id);?>">З чого почнемо ↓</a></div>
    <p class="pti-footnote"><?php echo esc_html($psc['foot']??'Спочатку перевіряємо причину, потім погоджуємо зміни.');?></p>
   </div>
   <div class="psc-hero-scene" data-psc-phase="0">
    <div class="psc-hero-stage">
     <div class="psc-stage-meta"><span><?php echo esc_html($psc['label']);?></span><span>MRSEO / 01</span></div>
     <?php mrseo_psc_art($psc_art['hero']);?>
    </div>
    <div class="pti-scene-controls">
     <div class="pti-tabs" role="group" aria-label="Етапи процесу"><?php foreach($psc['tabs'] as $i=>$tab):?>
      <button type="button" data-psc-tab="<?php echo esc_attr($i);?>" data-psc-caption="<?php echo esc_attr($tab[1]);?>" aria-pressed="<?php echo $i===0?'true':'false';?>"><?php echo esc_html($tab[0]);?></button>
     <?php endforeach;?></div>
     <button class="pti-pause psc-pause" type="button" aria-pressed="false">Призупинити рух</button>
    </div>
    <p class="pti-scene-caption" aria-live="polite"><b data-psc-index>01 / 03</b><span data-psc-caption-text><?php echo esc_html($psc['tabs'][0][1]);?></span></p>
    <p class="pti-footnote psc-demo-note">Ілюстрація принципу, не дані клієнтського проєкту.</p>
   </div>
  </div>
 </section>
 <section class="pti-section psc-problems" id="<?php echo esc_attr($psc_problem_id);?>" aria-labelledby="psc-problem-title">
  <div class="pti-wrap">
   <div class="pti-section-head"><div><span class="pti-kicker">ЯКУ ПРОБЛЕМУ ВИРІШУЄМО</span><h2 id="psc-problem-title"><?php echo esc_html($psc['problemHeading']??'Що заважає отримувати результат?');?></h2></div><p><?php echo esc_html($psc['problemLead']??'Перевіряємо конкретні ситуації вашого бізнесу.');?></p></div>
   <div class="pti-grid psc-problem-grid">
   <?php foreach($psc['pains'] as $i=>$problem):?>
    <article class="pti-card psc-problem-card"><span class="pti-num"><?php echo esc_html(sprintf('%02d',$i+1));?> / 03</span><div class="psc-mini-art"><?php mrseo_psc_art($psc_art['problem'][$i]);?></div><h3><?php echo esc_html($problem[0]);?></h3><p><?php echo esc_html($problem[1]);?></p></article>
   <?php endforeach;?>
   </div>
  </div>
 </section>
 <?php if($psc_shop):?>
 <section class="pti-section pti-alt psc-lab" id="ukcommerce-lab" aria-labelledby="ukcommerce-lab-title">
  <div class="pti-wrap psc-story-grid">
   <div class="psc-story-visual"><?php mrseo_psc_art($psc_art['extra']);?></div>
   <div><span class="pti-kicker">ІНТЕРАКТИВНА СХЕМА</span><h2 id="ukcommerce-lab-title">Не всі фільтри потрібні Google. <em>Але потрібні — варто знайти.</em></h2><p class="pti-lead">Перемикайте приклади: як категорія, фільтр і товарна картка доповнюють одне одного. Це модель принципу, а не дані клієнтів.</p>
    <?php $psc_lab=array(
     array('Категорії','Інтернет-магазин → Категорія → Бренд / модель','Зіставляємо попит і категорії, щоб потрібна сторінка відповідала запиту покупця.'),
     array('Фільтри','Окрема сторінка під підтверджений попит · Технічний URL без самостійної цінності','Не відкриваємо всі комбінації фільтрів для індексації — перевіряємо попит і цінність кожної.'),
     array('Товари','Зрозуміла назва товару · Точні характеристики · Зв’язок із категоріями','Товарна картка має допомагати покупцю обрати товар і пов’язувати його з каталогом.')
    );?>
    <div class="pti-tabs psc-lab-tabs ec-tabs" role="group" aria-label="Складові пошукової структури каталогу"><?php foreach($psc_lab as $i=>$lab):?><button type="button" data-psc-lab-tab="<?php echo esc_attr($i);?>" data-psc-lab-title="<?php echo esc_attr($lab[1]);?>" data-psc-lab-caption="<?php echo esc_attr($lab[2]);?>" aria-pressed="<?php echo $i===0?'true':'false';?>"><?php echo esc_html($lab[0]);?></button><?php endforeach;?></div>
    <div class="psc-lab-result" role="status"><strong data-psc-lab-title><?php echo esc_html($psc_lab[0][1]);?></strong><p data-psc-lab-caption><?php echo esc_html($psc_lab[0][2]);?></p></div>
   </div>
  </div>
 </section>
 <?php endif;?>
 <?php if($psc_audit):?>
 <section class="pti-section pti-alt psc-audit-plan" aria-labelledby="uaf-seoaudit-plan"><div class="pti-wrap psc-story-grid">
  <div class="psc-story-visual"><?php mrseo_psc_art($psc_art['story']);?></div>
  <div><span class="pti-kicker"><?php echo esc_html($psc_plan['eyebrow']);?></span><h2 id="uaf-seoaudit-plan"><?php echo esc_html($psc_plan['heading'][0]);?> <em><?php echo esc_html($psc_plan['heading'][1]);?></em></h2><p class="pti-lead"><?php echo esc_html($psc_plan['lead']);?></p><div class="pti-steps"><?php foreach($psc_plan['steps'] as $i=>$step):?><div class="pti-step"><b><?php echo esc_html(sprintf('%02d',$i+1));?></b><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div></div><?php endforeach;?></div><a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($psc_plan['cta']);?> ↗</a><p class="pti-footnote">Схема показує підхід. Не містить даних клієнтів або гарантованих результатів.</p></div>
 </div></section>
 <?php endif;?>
 <section class="pti-section psc-delivery<?php echo $psc_audit||$psc_shop?'':' pti-alt';?>" id="uws-solution" aria-labelledby="<?php echo esc_attr($psc_delivery_id);?>">
  <div class="pti-wrap psc-story-grid">
   <div class="psc-story-visual"><?php mrseo_psc_art($psc_audit?$psc_art['extra']:$psc_art['story']);?></div>
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
 <?php if(!empty($psc['proof'])):?>
 <section class="pti-section pti-alt psc-proof"><div class="pti-wrap psc-proof-grid"><div><span class="pti-kicker"><?php echo esc_html($psc['proof']['kicker']);?></span><h2 id="<?php echo esc_attr($psc_shop?'ukcommerce-experience-title':'ukaudit-boundary-title');?>"><?php echo esc_html($psc['proof']['heading'][0]);?> <em><?php echo esc_html($psc['proof']['heading'][1]);?></em></h2></div><div><div class="psc-proof-art"><?php mrseo_psc_art($psc_art['proof']);?></div><p class="pti-lead"><?php echo esc_html($psc['proof']['text']);?></p><a class="pti-pill pti-secondary" href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html($psc['proof']['link']);?> ↗</a></div></div></section>
 <?php endif;?>
 <section class="pti-section psc-faq-section"><div class="pti-wrap pti-faq">
  <div><span class="pti-kicker">ПЕРЕД ПОЧАТКОМ</span><h2 id="<?php echo esc_attr($psc_faq_id);?>"><?php echo esc_html($psc['faqHeading']??'Коротко про важливе.');?></h2><?php if(!empty($psc['faqLead'])):?><p><?php echo esc_html($psc['faqLead']);?></p><?php endif;?></div>
  <div><?php foreach($psc['faq'] as $i=>$item):?><details><summary><?php echo esc_html($item[0]);?></summary><p><?php echo esc_html($item[1]);?><?php if($psc_shop&&$i===2):?> <a href="<?php echo esc_url(mrseo_url('horoshop'));?>">Детальніше про Хорошоп ↗</a><?php endif;?></p></details><?php endforeach;?></div>
 </div></section>
 <section class="pti-final psc-final"><div class="pti-wrap">
  <div class="psc-final-art"><?php mrseo_psc_art($psc_art['end']);?></div>
  <div><span class="pti-kicker">ПЕРШИЙ КРОК</span><h2 id="<?php echo esc_attr($psc_final_id);?>"><?php $psc_head($psc['ctaTitle']);?></h2><p><?php echo esc_html($psc['ctaLead']);?></p></div>
  <a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($psc['finalButton']??$psc['button']);?> ↗</a>
 </div></section>
</div>
<?php get_footer();?>
