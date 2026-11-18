<?php if(!defined('ABSPATH'))exit;$current=mrseo_locale();$slug=mrseo_slug();$is_eu_market=function_exists('mrseo_eu_markets')&&isset(mrseo_eu_markets()[$current]);if($current==='uk')require_once get_template_directory().'/inc/ua-header-six.php';?><!doctype html><html lang="<?php echo esc_attr($is_eu_market?mrseo_eu_markets()[$current]:($current==='en'?'en-GB':($current==='uk'?'uk-UA':$current)));?>"><head><meta charset="<?php bloginfo('charset');?>"><meta name="viewport" content="width=device-width,initial-scale=1"><?php wp_head();?></head><body <?php if($is_eu_market){body_class(array('mrseo-eu','mrseo-eu-'.$current));}elseif(function_exists("mrseo_virtual_page") && mrseo_virtual_page()){echo 'class="mrseo-page mrseo-page-'.esc_attr(mrseo_slug()).(in_array($current,array('pl','de'),true)?' mrseo-international mrseo-locale-'.esc_attr($current):'').'"';}else{body_class();} ?> ><?php wp_body_open();?><?php if($current==='uk'):?>
<header class="site-header mrseo-ua-header-v2">
 <div class="container nav mrseo-ua-nav-primary">
  <a class="logo" href="<?php echo esc_url(mrseo_url());?>">MrSeo<b>.</b>tech</a>
  <?php mrseo_ua_header_six(false);?>
  <button class="menu-toggle" aria-label="Відкрити меню" aria-expanded="false" aria-controls="main-navigation">☰</button>
  <nav class="nav-links" id="main-navigation" aria-label="Основна навігація">
   <?php mrseo_ua_header_six(true);?>
   <a href="<?php echo esc_url(mrseo_url('about','uk'));?>">Про нас</a>
   <a href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Контакти</a>
  </nav>
  <?php mrseo_render_language_dropdown($slug,$current);?>
  <a class="btn nav-cta" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити проєкт ↗</a>
 </div>
 <div class="mrseo-ua-nav-utility">
  <div class="mrseo-ua-nav-utility-inner">
   <nav aria-label="Про компанію" class="mrseo-ua-nav-utility-links">
    <a href="<?php echo esc_url(mrseo_url('about','uk'));?>">Про нас</a>
    <a href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Контакти</a>
   </nav>
   <?php mrseo_render_header_contact();?>
  </div>
 </div>
</header>
<?php else:?><header class="site-header"><div class="container nav"><a class="logo" href="<?php echo esc_url(mrseo_url());?>">MrSeo<b>.</b>tech</a><button class="menu-toggle" aria-label="<?php echo esc_attr(mrseo_t('Відкрити меню','Открыть меню','Open menu'));?>" aria-expanded="false" aria-controls="main-navigation">☰</button><nav class="nav-links" id="main-navigation" aria-label="<?php echo esc_attr(mrseo_t('Основна навігація','Основная навигация','Main navigation'));?>"><?php if($current==='uk')mrseo_ua_header_six(true);?><div class="nav-dropdown"><button class="services-menu-toggle" type="button" aria-expanded="false" aria-controls="mrseo-services-menu"><?php echo esc_html(mrseo_t('Послуги','Услуги','Services'));?> <span class="services-menu-chevron" aria-hidden="true">⌄</span></button><div class="nav-submenu" id="mrseo-services-menu"><?php mrseo_render_mega_menu();?></div></div><?php if($current!=='uk'):?><a href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html(mrseo_t('Портфоліо','Портфолио','Portfolio'));?></a><?php endif;?><a href="<?php echo esc_url(mrseo_url('about'));?>"><?php echo esc_html(mrseo_t('Про нас','О нас','About'));?></a><a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Контакти','Контакты','Contact'));?></a></nav><?php mrseo_render_header_contact();?><?php mrseo_render_language_dropdown($slug,$current);?><a class="btn nav-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити проєкт ↗','Обсудить проект ↗','Discuss project ↗'));?></a></div><?php if($current==='uk')mrseo_ua_header_six(false);?></header><?php endif;?><main id="main">