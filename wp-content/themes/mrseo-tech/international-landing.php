<?php
if(!defined('ABSPATH'))exit;
$mrseo_lang=mrseo_locale();$mrseo_slug=mrseo_slug();
$mrseo_page=mrseo_int_page($mrseo_lang,$mrseo_slug);
$mrseo_ui=mrseo_int_ui($mrseo_lang);
if(!$mrseo_page||!$mrseo_ui){status_header(404);include get_404_template();return;}
$mrseo_common=$mrseo_ui['common'];$mrseo_nav=$mrseo_ui['nav'];
$mrseo_is_home=$mrseo_slug==='';$mrseo_is_contact=$mrseo_slug==='contact';$mrseo_is_portfolio=$mrseo_slug==='portfolio';
get_header();
?>
<section class="intl-hero<?php if($mrseo_is_home):?> intl-hero-home<?php endif;?>">
 <div class="intl-wrap intl-hero-grid">
  <div class="intl-hero-text">
   <div class="intl-kicker"><?php echo esc_html($mrseo_page['eyebrow']);?></div>
   <h1><?php echo wp_kses_post($mrseo_page['headline']);?></h1>
   <p><?php echo esc_html($mrseo_page['lead']);?></p>
   <div class="intl-actions">
    <?php if(!$mrseo_is_contact):?><a class="intl-button" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['cta']);?> <span aria-hidden="true">↗</span></a><?php else:?><a class="intl-button" href="#intl-contact-form"><?php echo esc_html($mrseo_common['formSubmit']);?> <span aria-hidden="true">↗</span></a><?php endif;?>
    <?php if(!$mrseo_is_portfolio && !$mrseo_is_contact):?><a class="intl-text-link" href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html($mrseo_common['portfolioLink']);?> ↗</a><?php endif;?>
   </div>
   <div class="intl-proofline"><span class="intl-proof-dot" aria-hidden="true"></span><?php echo esc_html($mrseo_common['badge']);?></div>
  </div>
  <?php mrseo_render_motion_scene($mrseo_slug,$mrseo_lang);?>
 </div>
</section>
<?php if($mrseo_is_contact):?>
<section class="intl-section" id="intl-contact-form">
 <div class="intl-wrap intl-contact-grid">
  <div><div class="intl-kicker"><?php echo esc_html($mrseo_common['strategy']);?></div>
    <h2><?php echo esc_html($mrseo_common['problems']);?></h2>
    <?php mrseo_render_contact_page_links();?>
    <div class="intl-contact-examples">
    <?php foreach($mrseo_page['problems'] as $i=>$problem):?><div class="intl-contact-example"><b><?php echo esc_html(sprintf('%02d',$i+1));?></b><div><strong><?php echo esc_html($problem[0]);?></strong><p><?php echo esc_html($problem[1]);?></p></div></div><?php endforeach;?>
    </div>
  </div>
  <div class="intl-form-panel">
   <?php
   $mrseo_status=isset($_GET['message_status'])?sanitize_key(wp_unslash($_GET['message_status'])):'';
   if(in_array($mrseo_status,array('sent','invalid','error'),true)) echo '<p class="intl-form-status" role="status">'.esc_html($mrseo_common[$mrseo_status]).'</p>';
   ?>
   <form method="post" action="<?php echo esc_url(admin_url('admin-post.php'));?>">
    <input type="hidden" name="action" value="mrseo_contact">
    <?php wp_nonce_field('mrseo_contact_submit','mrseo_nonce');?>
    <input type="hidden" name="mrseo_lang" value="<?php echo esc_attr($mrseo_lang);?>">
    <div class="intl-field"><label for="intl-name"><?php echo esc_html($mrseo_common['formName']);?> *</label><input id="intl-name" name="contact_name" required maxlength="90" autocomplete="name"></div>
    <div class="intl-field"><label for="intl-email"><?php echo esc_html($mrseo_common['formEmail']);?> *</label><input id="intl-email" type="email" name="contact_email" required autocomplete="email"></div>
    <div class="intl-field"><label for="intl-site"><?php echo esc_html($mrseo_common['formSite']);?></label><input id="intl-site" type="url" name="contact_site" maxlength="300" inputmode="url" placeholder="https://"></div>
    <div class="intl-field"><label for="intl-message"><?php echo esc_html($mrseo_common['formMessage']);?> *</label><textarea id="intl-message" name="contact_message" required minlength="10" maxlength="3000" rows="5"></textarea></div>
    <div class="contact-trap"><label for="intl-extra" class="screen-reader-text">Extra</label><input id="intl-extra" name="contact_company_extra" tabindex="-1" autocomplete="off"></div>
    <p class="intl-form-hint"><?php echo esc_html($mrseo_common['formPrivacy']);?></p><?php mrseo_privacy_form_notice();?>
    <button type="submit" class="intl-button"><?php echo esc_html($mrseo_common['formSubmit']);?></button>
   </form>
  </div>
 </div>
</section>
<?php elseif($mrseo_is_portfolio):?>
<?php
require_once get_template_directory().'/inc/portfolio-data.php';
$mrseo_portfolio=mrseo_portfolio_items();
$mrseo_selected=array(
'auto'=>array('avtomoda.com.ua','applus.parts','turboparts.ua'),
'fashion'=>array('armonelli.com.ua','valizy.com.ua','dressetogether.com.ua'),
'home'=>array('luxurylinens.ua','bedstore.com.ua','garden-house.in.ua'),
'electronics'=>array('kiwismart.ua','powerlux.com.ua'),
'medical'=>array('urolog.kr.ua')
);
?>
<section class="intl-section"><div class="intl-wrap">
 <div class="intl-section-head"><div class="intl-kicker"><?php echo esc_html($mrseo_common['portfolioTag']);?></div><h2><?php echo esc_html($mrseo_common['portfolioHeading']);?></h2><p><?php echo esc_html($mrseo_common['proof']);?></p></div>
 <div class="intl-project-grid">
  <?php foreach($mrseo_selected as $group=>$domains):foreach($domains as $domain):if(!in_array($domain,$mrseo_portfolio[$group]??array(),true))continue;?>
  <a class="intl-project" href="<?php echo esc_url('https://'.$domain.'/');?>" target="_blank" rel="noopener noreferrer">
   <span><?php echo esc_html($mrseo_common['portfolioCategories'][$group]??$group);?></span><strong><?php echo esc_html($domain);?></strong><small>↗</small>
  </a>
  <?php endforeach;endforeach;?>
 </div>
</div></section>
<?php else:?>
<?php if(!empty($mrseo_page['problems'])&&!empty($mrseo_page['solutions'])):?>
<section class="intl-section intl-diagnostic" id="how-we-solve">
 <div class="intl-wrap intl-diagnostic-grid">
  <div class="intl-diagnostic-intro">
   <div class="intl-kicker"><?php echo esc_html($mrseo_common['strategy']);?></div>
   <h2><?php echo esc_html($mrseo_common['problems']);?></h2>
   <p><?php echo esc_html($mrseo_common['diagnosticIntro']);?></p>
   <div class="intl-diag-index"><span>01</span><i></i><span>02</span><i></i><span>03</span></div>
  </div>
  <div class="intl-diag-list">
   <?php foreach($mrseo_page['problems'] as $i=>$problem):
    $solution=$mrseo_page['solutions'][$i]??null;
    if(!$solution)continue;
   ?>
   <details class="intl-diag-item" name="intl-problem-solution"<?php if($i===0):?> open<?php endif;?>>
    <summary>
     <span class="intl-diag-num"><?php echo esc_html(sprintf('%02d',$i+1));?></span>
     <span class="intl-diag-summary-text"><strong><?php echo esc_html($problem[0]);?></strong><small><?php echo esc_html($problem[1]);?></small></span>
     <span class="intl-diag-toggle" aria-hidden="true">+</span>
    </summary>
    <div class="intl-diag-answer">
     <span class="intl-diag-answer-label"><?php echo esc_html($mrseo_common['solutions']);?></span>
     <h3><?php echo esc_html($solution[0]);?></h3>
     <p><?php echo esc_html($solution[1]);?></p>
     <?php if(!empty($solution[2])&&mrseo_int_page($mrseo_lang,$solution[2])):?><a class="intl-diag-link" href="<?php echo esc_url(mrseo_url($solution[2]));?>"><?php echo esc_html($mrseo_nav['services']);?> ↗</a><?php endif;?>
    </div>
   </details>
   <?php endforeach;?>
  </div>
 </div>
</section>
<?php endif;?>
<?php if(!empty($mrseo_page['outcomes'])):?>
<section class="intl-section intl-outcomes">
 <div class="intl-wrap intl-outcomes-grid">
  <div><div class="intl-kicker"><?php echo esc_html($mrseo_common['label']);?></div><h2><?php echo esc_html($mrseo_common['results']);?></h2></div>
  <div class="intl-outcome-items"><?php foreach($mrseo_page['outcomes'] as $i=>$outcome):?><div><span>0<?php echo esc_html($i+1);?></span><strong><?php echo esc_html($outcome);?></strong></div><?php endforeach;?></div>
 </div>
</section>
<?php endif;?>
<?php if(!empty($mrseo_page['verification'])):?>
<section class="intl-section intl-verification" id="technical-checks">
 <div class="intl-wrap">
  <div class="intl-section-head"><div class="intl-kicker"><?php echo esc_html($mrseo_common['verificationLabel']);?></div><h2><?php echo esc_html($mrseo_common['verificationTitle']);?></h2></div>
  <div class="intl-check-grid">
   <?php foreach($mrseo_page['verification'] as $check):?>
   <article class="intl-check-item">
    <div class="intl-check-mark" aria-hidden="true">✓</div>
    <div><h3><?php echo esc_html($check[0]);?></h3><p><?php echo esc_html($check[1]);?></p></div>
   </article>
   <?php endforeach;?>
  </div>
 </div>
</section>
<?php endif;?>
<?php if(!empty($mrseo_page['faq'])):?>
<section class="intl-section intl-faq"><div class="intl-wrap intl-faq-grid">
 <div><div class="intl-kicker">FAQ</div><h2><?php echo esc_html($mrseo_common['faq']);?></h2></div>
 <div><?php foreach($mrseo_page['faq'] as $faq):?><details><summary><?php echo esc_html($faq[0]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($faq[1]);?></p></details><?php endforeach;?></div>
</div></section>
<?php endif;?>
<?php endif;?>
<?php if(!$mrseo_is_contact):?>
<section class="intl-final">
 <div class="intl-wrap intl-final-grid">
  <div><div class="intl-kicker"><?php echo esc_html($mrseo_common['nextLabel']);?></div><h2><?php echo esc_html($mrseo_common['next']);?></h2><p><?php echo esc_html($mrseo_common['nextText']);?></p></div>
  <a class="intl-final-link" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['cta']);?> ↗</a>
 </div>
</section>
<?php endif;?>
<?php get_footer();?>
