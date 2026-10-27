<?php
if (!defined('ABSPATH')) exit;
function mrseo_setup() {
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
 add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
 register_nav_menus(array('primary'=>__('Primary Navigation','mrseo-tech')));
}
add_action('after_setup_theme','mrseo_setup');
function mrseo_assets(){
 wp_enqueue_style('mrseo-style',get_stylesheet_uri(),array(),'0.4.0');
 wp_enqueue_script('mrseo-ui',get_template_directory_uri().'/assets/site.js',array(),'0.4.0',true);
}
add_action('wp_enqueue_scripts','mrseo_assets');
function mrseo_meta_description(){
 if(is_front_page()) echo '<meta name="description" content="MrSeo.tech — SEO и Google Ads: технический аудит, стратегия роста органического трафика и результативная реклама для бизнеса.">' . "\n";
}
add_action('wp_head','mrseo_meta_description',1);
