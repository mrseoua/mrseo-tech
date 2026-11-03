<?php
if(!defined('ABSPATH')) exit;
$lang=mrseo_locale();$slug=mrseo_slug();$eu=mrseo_eu_market($lang);$page=mrseo_eu_page($lang,$slug);
if(!$eu||!$page){status_header(404);include get_404_template();return;}
$ui=$eu['ui'];$nav=$eu['nav'];$is_home=$slug==='';
get_header('eu');
?>
<?php if($slug==='privacy'):?>
<section class="eu-legal eu-section"><div class="eu-container eu-legal-narrow">
<span class="eu-kicker">MRSEO.TECH / <?php echo esc_html($nav[6]);?></span>
<h1><?php echo esc_html($page['headline']);?></h1><p class="eu-large-lead"><?php echo esc_html($page['lead']);?></p>
<?php $privacy=mrseo_eu_privacy_copy($lang);foreach($privacy['sections'] as $section):?>
<section class="eu-legal-item"><h2><?php echo esc_html($section[0]);?></h2><p><?php echo esc_html($section[1]);?></p></section>
<?php endforeach;?>
<a class="eu-button" href="mailto:hello@mrseo.tech">hello@mrseo.tech ↗</a>
</div></section>
<?php else:?>
<section class="eu-hero"><div class="eu-container eu-hero-grid">
<div class="eu-hero-copy">
<span class="eu-kicker"><?php echo esc_html($page['eyebrow']);?> · MRSEO.TECH</span>
<h1><?php echo wp_kses($page['headline'],array('em'=>array()));?></h1>
<p><?php echo esc_html($page['lead']);?></p>
<div class="eu-actions"><a class="eu-button" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($nav[5]);?> <span aria-hidden="true">↗</span></a>
<?php if($slug!=='seo'):?><a class="eu-text-link" href="<?php echo esc_url(mrseo_url('seo'));?>"><?php echo esc_html($nav[1]);?> ↗</a><?php endif;?></div>
<div class="eu-proof"><span class="eu-proof-dot"></span><?php echo esc_html($ui[1]);?></div>
</div>
<?php if($is_home):?>
<div class="intl-scene eu-orbit-scene" aria-label="<?php echo esc_attr($ui[0]);?>">
<div class="eu-orbit-ring eu-orbit-ring-one"></div><div class="eu-orbit-ring eu-orbit-ring-two"></div>
<svg class="eu-orbit-lines" viewBox="0 0 600 490" preserveAspectRatio="none" aria-hidden="true">
<g stroke="#be6a54" stroke-width="1.4" fill="none" stroke-dasharray="5 7" opacity=".65">
<path d="M300 244L100 92 M300 244L85 245 M300 244L115 407 M300 244L500 92 M300 244L515 245 M300 244L485 407"/></g></svg>
<div class="intl-earth-core eu-earth-core" aria-hidden="true"><span>MrSeo<span>↗</span></span></div>
<div class="eu-satellites">
<?php
$sats=array(
array($nav[1],mrseo_url('seo')),array('SEO audit',mrseo_url('seo').'#eu-checks'),
array($nav[2],mrseo_url('google-ads')),array('GA4 / Analytics',mrseo_url('google-ads').'#eu-checks'),
array($nav[3],mrseo_url('web-development')),array('CRM / API',mrseo_url('web-development').'#eu-checks')
);
foreach($sats as $i=>$sat):?><a class="eu-satellite eu-satellite-<?php echo esc_attr($i+1);?>" href="<?php echo esc_url($sat[1]);?>"><span class="eu-sat-dot"></span><?php echo esc_html($sat[0]);?></a><?php endforeach;?>
</div>
</div>
<?php else:?>
<div class="eu-service-scene" aria-hidden="true"><span class="eu-scene-top"><?php echo esc_html($ui[2]);?></span>
<div class="eu-scene-core"><?php echo esc_html($slug==='seo'?'SEO':($slug==='google-ads'?'ADS':($slug==='web-development'?'API':'↗')));?></div>
<?php foreach(array_slice($page['problems'],0,3) as $i=>$item):?><div class="eu-scene-row"><span>0<?php echo esc_html($i+1);?></span><strong><?php echo esc_html($item[0]);?></strong><span class="eu-tick">↗</span></div><?php endforeach;?>
</div>
<?php endif;?>
</div></section>
<?php if($slug==='contact'):?>
<section class="eu-section" id="eu-contact-form"><div class="eu-container eu-contact-layout">
<div><span class="eu-kicker"><?php echo esc_html($nav[4]);?></span><h2><?php echo esc_html($ui[6]);?></h2><p><?php echo esc_html($ui[15]);?></p><p><a href="mailto:hello@mrseo.tech">hello@mrseo.tech</a></p></div>
<div class="eu-form-panel">
<?php $status=isset($_GET['message_status'])?sanitize_key(wp_unslash($_GET['message_status'])):'';if(in_array($status,array('sent','invalid','error'),true)){$msg=array('sent'=>$ui[12],'invalid'=>$ui[13],'error'=>$ui[14]);echo '<p class="eu-message-status" role="status">'.esc_html($msg[$status]).'</p>';}?>
<form action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post">
<input type="hidden" name="action" value="mrseo_contact"><?php wp_nonce_field('mrseo_contact_submit','mrseo_nonce');?>
<input type="hidden" name="mrseo_lang" value="<?php echo esc_attr($lang);?>">
<label for="eu-name"><?php echo esc_html($ui[7]);?> *</label><input id="eu-name" name="contact_name" autocomplete="name" maxlength="90" required>
<label for="eu-email"><?php echo esc_html($ui[8]);?> *</label><input id="eu-email" name="contact_email" type="email" maxlength="180" autocomplete="email" required>
<label for="eu-site"><?php echo esc_html($ui[9]);?></label><input id="eu-site" name="contact_site" type="url" maxlength="300">
<label for="eu-text"><?php echo esc_html($ui[10]);?> *</label><textarea id="eu-text" name="contact_message" minlength="10" maxlength="3000" rows="6" required></textarea>
<div class="eu-trap" aria-hidden="true"><input name="contact_company_extra" autocomplete="off" tabindex="-1"></div>
<?php mrseo_privacy_form_notice();?>
<button class="eu-button" type="submit"><?php echo esc_html($ui[11]);?></button>
</form></div></div></section>
<?php else:?>
<?php if(!empty($page['problems'])):?>
<section class="eu-section eu-problems" id="eu-checks"><div class="eu-container">
<div class="eu-section-head"><span class="eu-kicker"><?php echo esc_html($ui[2]);?></span><h2><?php echo esc_html($ui[3]);?></h2></div>
<div class="eu-check-grid">
<?php foreach($page['problems'] as $i=>$problem):?>
<article class="eu-check-card"><span class="eu-index"><?php echo esc_html(sprintf('%02d',$i+1));?></span>
<h3><?php echo esc_html($problem[0]);?></h3><p><?php echo esc_html($problem[1]);?></p><div class="eu-card-action"><span>↗</span><p><?php echo esc_html($problem[2]);?></p></div></article>
<?php endforeach;?>
</div></div></section>
<?php endif;?>
<?php if(!empty($page['outcomes'])):?>
<section class="eu-section eu-outcomes"><div class="eu-container eu-outcomes-grid"><div><span class="eu-kicker">MRSEO.TECH / <?php echo esc_html($ui[4]);?></span><h2><?php echo esc_html($ui[4]);?></h2></div>
<div><?php foreach($page['outcomes'] as $i=>$item):?><div class="eu-outcome"><span>0<?php echo esc_html($i+1);?></span><strong><?php echo esc_html($item);?></strong></div><?php endforeach;?></div></div></section>
<?php endif;?>
<?php if(!empty($page['faq'])):?>
<section class="eu-section eu-faq"><div class="eu-container eu-faq-grid"><div><span class="eu-kicker">FAQ</span><h2><?php echo esc_html($ui[5]);?></h2></div><div>
<?php foreach($page['faq'] as $faq):?><details><summary><?php echo esc_html($faq[0]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($faq[1]);?></p></details><?php endforeach;?>
</div></div></section>
<?php endif;?>
<section class="eu-cta"><div class="eu-container"><span class="eu-kicker"><?php echo esc_html($ui[1]);?></span><h2><?php echo esc_html($ui[6]);?></h2><p><?php echo esc_html($ui[16]);?></p><a class="eu-button" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($nav[5]);?> ↗</a></div></section>
<?php endif;?>
<?php endif;?>
<?php get_footer('eu');?>
