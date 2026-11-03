<?php
if(!defined('ABSPATH'))exit;
$privacy=mrseo_privacy_copy();
$intl=in_array(mrseo_locale(),array('pl','de'),true);
get_header($intl?'international':null);
?>
<style>
.mrseo-privacy-page{padding:clamp(55px,7vw,105px) 0 100px;background:#f7f5f0;color:#242725}
.mrseo-privacy-page .mrseo-privacy-container{width:min(calc(100% - 48px),930px);margin:auto}
.mrseo-privacy-page .mrseo-privacy-kicker{color:#b34f41;font-size:13px;font-weight:800;letter-spacing:.12em;text-transform:uppercase}
.mrseo-privacy-page h1{font-size:clamp(37px,5.3vw,68px);line-height:1.1;letter-spacing:-.045em;margin:18px 0 25px;overflow-wrap:anywhere;hyphens:auto}
.mrseo-privacy-page .mrseo-privacy-lead{font-size:clamp(17px,2vw,21px);line-height:1.65;max-width:730px;color:#4c5550}
.mrseo-privacy-page .mrseo-privacy-sections{margin:48px 0;border-top:1px solid #dcd7cc}
.mrseo-privacy-page section{padding:29px 0;border-bottom:1px solid #dcd7cc}
.mrseo-privacy-page h2{font-size:clamp(21px,2.6vw,28px);margin:0 0 10px}
.mrseo-privacy-page section p{line-height:1.7;font-size:16px;color:#4b544d;max-width:800px;overflow-wrap:anywhere}
.mrseo-privacy-page .mrseo-privacy-contact{display:inline-flex;padding:15px 27px;border-radius:100px;color:#fff;background:#252e28;font-weight:750}
.mrseo-privacy-page a:focus-visible{outline:3px solid #bc513f;outline-offset:4px}
@media(max-width:480px){.mrseo-privacy-page .mrseo-privacy-container{width:calc(100% - 36px)}}
</style>
<article class="mrseo-privacy-page">
 <div class="mrseo-privacy-container">
  <div class="mrseo-privacy-kicker">MrSeo.tech / <?php echo esc_html($privacy['label']);?></div>
  <h1><?php echo esc_html($privacy['title']);?></h1>
  <p class="mrseo-privacy-lead"><?php echo esc_html($privacy['lead']);?></p>
  <div class="mrseo-privacy-sections">
   <?php foreach($privacy['sections'] as $section):?>
   <section><h2><?php echo esc_html($section[0]);?></h2><p><?php echo esc_html($section[1]);?></p></section>
   <?php endforeach;?>
  </div>
  <a class="mrseo-privacy-contact" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($privacy['cta']);?> ↗</a>
 </div>
</article>
<?php get_footer($intl?'international':null);?>
