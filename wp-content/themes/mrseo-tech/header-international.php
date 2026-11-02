<?php
if(!defined('ABSPATH'))exit;
$mrseo_ui=mrseo_int_ui();$mrseo_nav=$mrseo_ui['nav'];
$mrseo_lang=mrseo_locale();$mrseo_slug=mrseo_slug();
?><!doctype html>
<html lang="<?php echo esc_attr($mrseo_ui['lang']);?>">
<head><meta charset="<?php bloginfo('charset');?>"><meta name="viewport" content="width=device-width,initial-scale=1"><?php wp_head();?></head>
<body <?php body_class(array('mrseo-international','mrseo-locale-'.$mrseo_lang));?>><?php wp_body_open();?>
<header class="intl-header">
 <div class="intl-nav-wrap">
  <a class="intl-logo" href="<?php echo esc_url(mrseo_url('',$mrseo_lang));?>" aria-label="MrSeo.tech">MrSeo<span>.</span>tech</a>
  <nav class="intl-nav" aria-label="<?php echo esc_attr($mrseo_nav['services']);?>">
   <div class="intl-dropdown">
    <button class="services-menu-toggle" type="button" aria-expanded="false" aria-controls="mrseo-intl-services-menu"><?php echo esc_html($mrseo_nav['services']);?> <span class="services-menu-chevron" aria-hidden="true">⌄</span></button>
    <div class="intl-dropdown-menu" id="mrseo-intl-services-menu">
     <?php mrseo_render_mega_menu();?>
    </div>
   </div>
   <a href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html($mrseo_nav['portfolio']);?></a>
   <a href="<?php echo esc_url(mrseo_url('about'));?>"><?php echo esc_html($mrseo_nav['about']);?></a>
   <a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['contact']);?></a>
  </nav>
  <?php mrseo_render_header_contact();?>
  <?php mrseo_render_language_dropdown(in_array($mrseo_slug,mrseo_int_pages(),true)?$mrseo_slug:'',$mrseo_lang);?>
  <a class="intl-nav-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['cta']);?> ↗</a>
  <details class="intl-mobile-menu"><summary aria-label="Menu">☰</summary><div class="intl-mobile-panel">
   <?php mrseo_render_mega_menu(true);?>
   <a href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html($mrseo_nav['portfolio']);?></a>
   <a href="<?php echo esc_url(mrseo_url('about'));?>"><?php echo esc_html($mrseo_nav['about']);?></a>
   <a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['contact']);?></a>
  </div></details>
 </div>
</header>
<main id="main">
