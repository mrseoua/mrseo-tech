<?php
if(!defined('ABSPATH'))exit;
/** Four SEO siblings: same approved reference layout, route-specific copy. */
// The lower illustrations are intentionally still: retain the original art, remove SMIL only for this page.
$local_static_art=static function($id){
 ob_start();mrseo_psc_art($id);$svg=ob_get_clean();
 $svg=preg_replace('~<(?:animate|animateMotion|animateTransform|set)\\b[^>]*?/>~i','',$svg);
 $svg=preg_replace('~<(animate|animateMotion|animateTransform|set)\\b[^>]*>.*?</\\1>~is','',$svg);
 echo str_replace('class="psc-motion"','class="local-reference-static"',$svg);
};
$local_problems=$psc_ref_copy['problems'];
$local_work=$psc_ref_copy['work'];
?>
<section class="pti-section psc-problems local-ref-problems" id="<?php echo esc_attr($psc_problem_id);?>" aria-labelledby="psc-problem-title">
 <div class="pti-wrap">
  <div class="pti-section-head"><div><span class="pti-kicker">01 / ВПІЗНАЄТЕ СВОЮ СИТУАЦІЮ?</span><h2 id="psc-problem-title"><?php $psc_head($psc_ref_copy['problemTitle']);?></h2></div><p><?php echo esc_html($psc_ref_copy['problemLead']);?></p></div>
  <div class="local-ref-problem-list">
   <?php foreach($local_problems as $i=>$row):?>
    <article class="psc-problem-card local-ref-row">
     <div class="local-ref-mini"><?php $local_static_art($psc_art['problem'][$i]);?></div>
     <div class="local-ref-pain"><span class="local-ref-label">ПРОБЛЕМА <?php echo esc_html(sprintf('%02d',$i+1));?></span><h3><?php echo esc_html($row[0]);?></h3><p><?php echo esc_html($row[1]);?></p></div>
     <div class="local-ref-answer"><span class="local-ref-label">НАШЕ РІШЕННЯ</span><p><?php echo esc_html($row[2]);?></p></div>
    </article>
   <?php endforeach;?>
  </div>
 </div>
</section>
<section class="pti-section pti-alt psc-delivery local-ref-work" id="uws-solution" aria-labelledby="<?php echo esc_attr($psc_delivery_id);?>">
 <div class="pti-wrap">
  <div class="pti-section-head"><div><span class="pti-kicker">02 / КОНКРЕТНІ РОБОТИ</span><h2 id="<?php echo esc_attr($psc_delivery_id);?>"><?php $psc_head($psc_ref_copy['workTitle']);?></h2></div><p><?php echo esc_html($psc_ref_copy['workLead']);?></p></div>
  <div class="local-ref-work-grid"<?php if($psc_shop)echo ' id="ukcommerce-lab"';?>>
   <?php foreach($local_work as $i=>$item):?>
    <article class="pti-step local-ref-work-card"><span class="local-ref-label"><?php echo esc_html(sprintf('%02d',$i+1));?> / 03</span><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></article>
   <?php endforeach;?>
  </div>
 </div>
</section>
<section class="pti-section local-ref-outcome" aria-labelledby="local-reference-outcome">
 <div class="pti-wrap local-ref-outcome-grid">
  <div class="local-ref-result psc-result"<?php if($psc_audit)echo ' id="uaf-seoaudit-plan"';?>><span class="pti-kicker">03 / РЕЗУЛЬТАТ І КОНТРОЛЬ</span><h2 id="local-reference-outcome"><?php $psc_head($psc_ref_copy['resultTitle']);?></h2><p><?php echo esc_html($psc_ref_copy['result']);?></p><ul><?php foreach($psc_ref_copy['metrics'] as $metric):?><li><?php echo esc_html($metric);?></li><?php endforeach;?></ul><p class="local-ref-small"><?php echo esc_html($psc_ref_copy['note']);?></p></div>
  <div class="local-ref-terms"<?php if($psc_shop)echo ' id="ukcommerce-experience-title"';elseif($psc_audit)echo ' id="ukaudit-boundary-title"';?>><span class="pti-kicker">04 / УМОВИ СПІВПРАЦІ</span><h2>Зрозумілий старт.</h2><ol><?php foreach($psc_ref_copy['terms'] as $term):?><li><strong><?php echo esc_html($term[0]);?></strong> <?php echo esc_html($term[1]);?></li><?php endforeach;?></ol><p><?php echo esc_html($psc_ref_copy['termsNote']);?></p></div>
 </div>
</section>
<section class="pti-section psc-faq-section local-ref-faq">
 <div class="pti-wrap pti-faq"><div><span class="pti-kicker">05 / ПЕРЕД ПОЧАТКОМ</span><h2 id="<?php echo esc_attr($psc_faq_id);?>">Коротко про <em>важливе.</em></h2></div>
 <div><?php foreach($psc['faq'] as $i=>$item):?><details><summary><?php echo esc_html($item[0]);?></summary><p><?php echo esc_html($item[1]);?><?php if($psc_shop&&$i===2):?> <a href="<?php echo esc_url(mrseo_url('horoshop'));?>">Детальніше про Хорошоп ↗</a><?php endif;?></p></details><?php endforeach;?>
 <?php foreach($psc_ref_copy['faq'] as $item):?><details><summary><?php echo esc_html($item[0]);?></summary><p><?php echo esc_html($item[1]);?></p></details><?php endforeach;?></div>
 </div>
</section>
<section class="pti-final psc-final local-ref-final" aria-labelledby="<?php echo esc_attr($psc_final_id);?>">
 <div class="pti-wrap"><div class="local-ref-final-card">
  <div><span class="pti-kicker">ПЕРШИЙ КРОК</span><h2 id="<?php echo esc_attr($psc_final_id);?>"><?php $psc_head($psc['ctaTitle']);?></h2><p><?php echo esc_html($psc['ctaLead']);?></p></div>
  <div class="local-ref-final-action"><a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($psc_ref_copy['button']);?> ↗</a><p>Умови погоджуємо до початку робіт.</p></div>
 </div>
 <nav class="psc-seo-related" aria-label="Суміжні SEO-послуги"><?php foreach($psc_ref_copy['links'] as $related):?><a href="<?php echo esc_url(mrseo_url($related[0],'uk'));?>"><?php echo esc_html($related[1]);?> ↗</a><?php endforeach;?></nav>
 </div>
</section>
