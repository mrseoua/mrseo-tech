<?php
if (!defined('ABSPATH')) exit;
$eu=mrseo_eu_market();$eu_lang=mrseo_locale();$eu_nav=$eu['nav'];
?><!doctype html>
<html lang="<?php echo esc_attr($eu['code']);?>">
<head><meta charset="<?php bloginfo('charset');?>"><meta name="viewport" content="width=device-width,initial-scale=1"><?php wp_head();?></head>
<body <?php body_class(array('mrseo-eu','mrseo-eu-'.$eu_lang));?>><?php wp_body_open();?>
<header class="eu-header"><div class="eu-header-inner">
<a class="eu-brand" href="<?php echo esc_url(mrseo_url('',$eu_lang));?>" aria-label="MrSeo.tech">MrSeo<span>.</span>tech</a>
<?php $eu_services=mrseo_eu_service_labels($eu_lang);?>
<nav class="eu-nav" aria-label="<?php echo esc_attr($eu_nav[0]);?>">
<a href="<?php echo esc_url(mrseo_url('seo'));?>"><?php echo esc_html($eu_services['seo']);?></a>
<a href="<?php echo esc_url(mrseo_url('google-ads'));?>"><?php echo esc_html($eu_services['google-ads']);?></a>
<a href="<?php echo esc_url(mrseo_url('website-design'));?>"><?php echo esc_html($eu_services['website-design']);?></a>
<details class="eu-nav-services"><summary><?php echo esc_html($eu_nav[0]);?><span aria-hidden="true">⌄</span></summary>
<div class="eu-nav-services-panel">
<?php foreach($eu_services as $service_slug=>$service_title):?>
<a href="<?php echo esc_url(mrseo_url($service_slug));?>"<?php echo mrseo_slug()===$service_slug?' aria-current="page"':'';?>><?php echo esc_html($service_title);?><span aria-hidden="true">↗</span></a>
<?php endforeach;?>
</div></details>
</nav>
<?php mrseo_render_language_dropdown(mrseo_slug(),$eu_lang);?>
<a class="eu-header-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($eu_nav[5]);?> <span aria-hidden="true">↗</span></a>
<details class="eu-mobile-menu"><summary aria-label="<?php echo esc_attr($eu_nav[0]);?>">☰</summary><nav>
<?php foreach($eu_services as $service_slug=>$service_title):?>
<a href="<?php echo esc_url(mrseo_url($service_slug));?>"<?php echo mrseo_slug()===$service_slug?' aria-current="page"':'';?>><?php echo esc_html($service_title);?></a>
<?php endforeach;?>
</nav></details>
</div></header><main id="main">
