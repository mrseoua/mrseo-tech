<?php if(!defined('ABSPATH'))exit;$mrseo_ui=mrseo_int_ui();$mrseo_nav=$mrseo_ui['nav'];$mrseo_common=$mrseo_ui['common'];?>
</main>
<footer class="intl-footer">
 <div class="intl-footer-feature">
  <div class="intl-footer-intro">
   <a class="intl-logo" href="<?php echo esc_url(mrseo_url(''));?>">MrSeo<span>.</span>tech</a>
   <p><?php echo esc_html($mrseo_common['nextText']);?></p>
  </div>
   <a class="intl-footer-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['cta']);?> ↗</a>
 </div>
 <div class="intl-footer-grid">
  <nav aria-label="<?php echo esc_attr($mrseo_nav['services']);?>"><strong><?php echo esc_html($mrseo_nav['services']);?></strong>
   <?php foreach(array('ecommerce-seo'=>'ecommerce','seo'=>'seo','seo-audit'=>'audit','google-ads'=>'ads','analytics'=>'analytics','web-development'=>'development') as $slug=>$key):?>
   <a href="<?php echo esc_url(mrseo_url($slug));?>"><?php echo esc_html($mrseo_nav[$key]);?></a><?php endforeach;?>
  </nav>
  <nav aria-label="<?php echo esc_attr($mrseo_nav['about']);?>"><strong>MrSeo.tech</strong>
   <a href="<?php echo esc_url(mrseo_url('about'));?>"><?php echo esc_html($mrseo_nav['about']);?></a>
   <a href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html($mrseo_nav['portfolio']);?></a>
   <a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['contact']);?></a>
   <?php mrseo_privacy_footer_link();?>
  </nav>
  <div class="intl-footer-contact">
   <?php mrseo_render_contact_channels('international');?>
  </div>
 </div>
 <div class="intl-footer-bottom">
  <span>© <?php echo esc_html(date('Y'));?> MrSeo.tech</span>
  <span class="intl-footer-promise"><?php echo esc_html($mrseo_common['close']);?></span>
  <div class="intl-footer-utilities">
   <?php mrseo_render_language_dropdown(mrseo_slug(),mrseo_locale(),'footer');?>
   <a href="#main" aria-label="<?php echo esc_attr($mrseo_lang==='pl'?'Wróć na górę':'Nach oben'); ?>">↑</a>
  </div>
 </div>
</footer>
<?php mrseo_render_floating_contact();?>
<?php wp_footer();?></body></html>
