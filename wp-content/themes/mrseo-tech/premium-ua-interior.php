<?php
if(!defined('ABSPATH'))exit;
$pti_slug=mrseo_slug();
if(mrseo_locale()!=='uk'||!in_array($pti_slug,array('seo','google-ads','web-development'),true)){status_header(404);include get_404_template();return;}
if($pti_slug==='google-ads')require_once get_template_directory().'/inc/ua-ads-position.php';
add_action('wp_enqueue_scripts',static function(){
 wp_enqueue_style('mrseo-premium-ua-interiors',get_template_directory_uri().'/assets/premium-ua-interiors.css',array('mrseo-style'),'1.1.1');
 wp_enqueue_script('mrseo-premium-ua-interiors',get_template_directory_uri().'/assets/premium-ua-interiors.js',array(),'1.1.2',true);
 if(mrseo_slug()==='google-ads')wp_enqueue_style('mrseo-service-standard',get_template_directory_uri().'/assets/service-standard.css',array('mrseo-premium-ua-interiors'),'1.0.0');
 if(mrseo_slug()==='google-ads')wp_enqueue_style('mrseo-ua-ads-position',get_template_directory_uri().'/assets/ua-ads-position.css',array('mrseo-service-standard'),'1.0.0');
 if(mrseo_slug()==='seo'){
  wp_enqueue_style('mrseo-seo-hub',get_template_directory_uri().'/assets/seo-hub.css',array('mrseo-premium-ua-interiors'),'1.3.0');
  wp_enqueue_script('mrseo-seo-cinematic',get_template_directory_uri().'/assets/seo-cinematic.js',array(),'2.3.0',true);
 }
},100);
get_header();
?>
<div class="pti-page" data-pti-service="<?php echo esc_attr($pti_slug);?>"<?php if($pti_slug==='google-ads')echo ' data-service-standard="v1"';?>>
<?php require get_template_directory().'/inc/premium-ua-interiors/'.$pti_slug.'.php';?>
<?php if($pti_slug==='web-development')require get_template_directory().'/inc/ua-dev-hub-links.php';?>
</div>
<?php get_footer();?>
