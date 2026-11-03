<?php
if (!defined('ABSPATH')) exit;
$eu=mrseo_eu_market();$eu_lang=mrseo_locale();$eu_nav=$eu['nav'];
?><!doctype html>
<html lang="<?php echo esc_attr($eu['code']);?>">
<head><meta charset="<?php bloginfo('charset');?>"><meta name="viewport" content="width=device-width,initial-scale=1"><?php wp_head();?></head>
<body <?php body_class(array('mrseo-eu','mrseo-eu-'.$eu_lang));?>><?php wp_body_open();?>
<header class="eu-header"><div class="eu-header-inner">
<a class="eu-brand" href="<?php echo esc_url(mrseo_url('',$eu_lang));?>" aria-label="MrSeo.tech">MrSeo<span>.</span>tech</a>
<nav class="eu-nav" aria-label="<?php echo esc_attr($eu_nav[0]);?>">
<a href="<?php echo esc_url(mrseo_url('seo'));?>"><?php echo esc_html($eu_nav[1]);?></a>
<a href="<?php echo esc_url(mrseo_url('google-ads'));?>"><?php echo esc_html($eu_nav[2]);?></a>
<a href="<?php echo esc_url(mrseo_url('web-development'));?>"><?php echo esc_html($eu_nav[3]);?></a>
</nav>
<?php mrseo_render_language_dropdown(mrseo_slug(),$eu_lang);?>
<a class="eu-header-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($eu_nav[5]);?> <span aria-hidden="true">↗</span></a>
<details class="eu-mobile-menu"><summary aria-label="<?php echo esc_attr($eu_nav[0]);?>">☰</summary><nav>
<a href="<?php echo esc_url(mrseo_url('seo'));?>"><?php echo esc_html($eu_nav[1]);?></a>
<a href="<?php echo esc_url(mrseo_url('google-ads'));?>"><?php echo esc_html($eu_nav[2]);?></a>
<a href="<?php echo esc_url(mrseo_url('web-development'));?>"><?php echo esc_html($eu_nav[3]);?></a>
<a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($eu_nav[4]);?></a>
</nav></details>
</div></header><main id="main">
