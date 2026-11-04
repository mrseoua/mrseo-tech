<?php if (!defined('ABSPATH')) exit;$eu=mrseo_eu_market();?>
</main><footer class="eu-footer"><div class="eu-container eu-footer-layout">
<div><a class="eu-brand" href="<?php echo esc_url(mrseo_url(''));?>">MrSeo<span>.</span>tech</a><p><?php echo esc_html($eu['ui'][16]);?></p></div>
<div><a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($eu['nav'][4]);?></a><a href="mailto:hello@mrseo.tech">hello@mrseo.tech</a><a href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html(mrseo_eu_service_labels()['portfolio']);?></a><a href="<?php echo esc_url(mrseo_url('privacy'));?>"><?php echo esc_html($eu['nav'][6]);?></a></div>
</div><div class="eu-container eu-footer-bottom">© <?php echo esc_html(wp_date('Y'));?> MrSeo.tech</div></footer>
<?php wp_footer();?></body></html>
