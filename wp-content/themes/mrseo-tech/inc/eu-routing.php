<?php
/** New European locales: exact whitelist, no invented pages, staging noindex remains global. */
if (!defined('ABSPATH')) exit;
require_once __DIR__ . '/eu-content.php';

function mrseo_eu_route() {
    $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
    $parts=explode('/',$path);
    if(count($parts)>2 || !isset(mrseo_eu_markets()[$parts[0]])) return false;
    $slug=$parts[1]??'';
    return in_array($slug,mrseo_eu_slugs(),true);
}

add_action('init',function(){
    add_rewrite_rule('^(fr|it|es|nl|ro|cs|pt|sv|da|fi|hu|sk|el|bg|hr)/?$','index.php?mrseo_lang=$matches[1]','top');
    add_rewrite_rule('^(fr|it|es|nl|ro|cs|pt|sv|da|fi|hu|sk|el|bg|hr)/(seo|seo-audit|ecommerce-seo|google-ads|analytics|web-development|website-design|online-shop-development|about|portfolio|contact|privacy)/?$',
        'index.php?mrseo_lang=$matches[1]&mrseo_service=$matches[2]','top');
},12);

add_filter('pre_handle_404',function($pre){
    return mrseo_eu_route()?true:$pre;
},130);
add_filter('redirect_canonical',function($canonical){
    return mrseo_eu_route()?false:$canonical;
},130);
add_filter('template_include',function($template){
    if(!mrseo_eu_route())return $template;
    // Every market homepage uses the EXACT current orbit-lab master template.
    return get_template_directory().(mrseo_slug()===''?'/orbit-lab.php':'/eu-localized.php');
},180);
add_filter('pre_get_document_title',function($title){
    $page=mrseo_eu_route()?mrseo_eu_page():null;
    if(!$page)return $title;
    return stripos($page['title'],'MrSeo.tech')!==false?$page['title']:$page['title'].' | MrSeo.tech';
},140);
add_action('wp_head',function(){
    if(!mrseo_eu_route() || mrseo_slug()==='privacy')return;
    $page=mrseo_eu_page();
    if($page)echo '<meta name="description" content="'.esc_attr($page['description']).'">'."\n";
},5);
add_action('wp_enqueue_scripts',function(){
    if(!mrseo_eu_route())return;
    wp_enqueue_style('mrseo-eu-expansion',get_template_directory_uri().'/assets/eu-expansion.css',
        array('mrseo-language-dropdown'),'1.0.4');
    // Only real service pages load their subject-specific, mobile-ready hero scene.
    if(in_array(mrseo_slug(),array('seo','seo-audit','ecommerce-seo','google-ads','analytics','web-development','website-design','online-shop-development'),true)){
        wp_enqueue_style('mrseo-eu-service-scenes',get_template_directory_uri().'/assets/eu-service-scenes.css',
            array('mrseo-eu-expansion'),'1.0.0');
    }
    // orbit-lab.php owns the single module instance of the original Earth.
},110);
add_action('init',function(){
    if(get_option('mrseo_eu_rules_v3')!=='ready'){
        flush_rewrite_rules(false);
        update_option('mrseo_eu_rules_v3','ready',false);
    }
},42);
