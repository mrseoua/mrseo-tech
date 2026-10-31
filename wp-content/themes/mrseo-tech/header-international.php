<?php
if(!defined('ABSPATH'))exit;
$mrseo_ui=mrseo_int_ui();$mrseo_nav=$mrseo_ui['nav'];
$mrseo_lang=mrseo_locale();$mrseo_slug=mrseo_slug();
$mrseo_links=array('ecommerce-seo'=>$mrseo_nav['ecommerce'],'seo'=>$mrseo_nav['seo'],'seo-audit'=>$mrseo_nav['audit'],'google-ads'=>$mrseo_nav['ads'],'analytics'=>$mrseo_nav['analytics']);
?><!doctype html>
<html lang="<?php echo esc_attr($mrseo_ui['lang']);?>">
<head><meta charset="<?php bloginfo('charset');?>"><meta name="viewport" content="width=device-width,initial-scale=1"><?php wp_head();?></head>
<body <?php body_class(array('mrseo-international','mrseo-locale-'.$mrseo_lang));?>><?php wp_body_open();?>
<header class="intl-header">
 <div class="intl-nav-wrap">
  <a class="intl-logo" href="<?php echo esc_url(mrseo_url('',$mrseo_lang));?>" aria-label="MrSeo.tech">MrSeo<span>.</span>tech</a>
  <nav class="intl-nav" aria-label="<?php echo esc_attr($mrseo_nav['services']);?>">
   <div class="intl-dropdown">
    <a href="<?php echo esc_url(mrseo_url('ecommerce-seo'));?>"><?php echo esc_html($mrseo_nav['services']);?> <span aria-hidden="true">⌄</span></a>
    <div class="intl-dropdown-menu">
     <?php foreach($mrseo_links as $slug=>$name):?><a href="<?php echo esc_url(mrseo_url($slug));?>"<?php if($mrseo_slug===$slug):?> aria-current="page"<?php endif;?>><?php echo esc_html($name);?></a><?php endforeach;?>
    </div>
   </div>
   <a href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html($mrseo_nav['portfolio']);?></a>
   <a href="<?php echo esc_url(mrseo_url('about'));?>"><?php echo esc_html($mrseo_nav['about']);?></a>
   <a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['contact']);?></a>
  </nav>
  <div class="intl-lang-switch" aria-label="Language">
   <?php foreach(array('uk'=>'UA','ru'=>'RU','en'=>'EN','pl'=>'PL','de'=>'DE') as $locale=>$label):?>
    <a href="<?php echo esc_url(mrseo_url(in_array($mrseo_slug,mrseo_int_pages(),true)?$mrseo_slug:'',$locale));?>"<?php if($mrseo_lang===$locale):?> aria-current="page"<?php endif;?>><?php echo esc_html($label);?></a>
   <?php endforeach;?>
  </div>
  <a class="intl-nav-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['cta']);?> ↗</a>
  <details class="intl-mobile-menu"><summary aria-label="Menu">☰</summary><div class="intl-mobile-panel">
   <?php foreach($mrseo_links as $slug=>$name):?><a href="<?php echo esc_url(mrseo_url($slug));?>"><?php echo esc_html($name);?></a><?php endforeach;?>
   <a href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html($mrseo_nav['portfolio']);?></a>
   <a href="<?php echo esc_url(mrseo_url('about'));?>"><?php echo esc_html($mrseo_nav['about']);?></a>
   <a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($mrseo_nav['contact']);?></a>
  </div></details>
 </div>
</header>
<main id="main">
