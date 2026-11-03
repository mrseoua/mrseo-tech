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
    add_rewrite_rule('^(fr|it|es|nl|ro|cs)/?$','index.php?mrseo_lang=$matches[1]','top');
    add_rewrite_rule('^(fr|it|es|nl|ro|cs)/(seo|google-ads|web-development|contact|privacy)/?$',
        'index.php?mrseo_lang=$matches[1]&mrseo_service=$matches[2]','top');
},12);

add_filter('pre_handle_404',function($pre){
    return mrseo_eu_route()?true:$pre;
},130);
add_filter('redirect_canonical',function($canonical){
    return mrseo_eu_route()?false:$canonical;
},130);
add_filter('template_include',function($template){
    return mrseo_eu_route()?get_template_directory().'/eu-localized.php':$template;
},180);
add_filter('pre_get_document_title',function($title){
    $page=mrseo_eu_route()?mrseo_eu_page():null;
    return $page?$page['title'].' | MrSeo.tech':$title;
},140);
add_action('wp_head',function(){
    if(!mrseo_eu_route() || mrseo_slug()==='privacy')return;
    $page=mrseo_eu_page();
    if($page)echo '<meta name="description" content="'.esc_attr($page['description']).'">'."\n";
},5);
add_action('wp_enqueue_scripts',function(){
    if(!mrseo_eu_route())return;
    wp_enqueue_style('mrseo-eu-expansion',get_template_directory_uri().'/assets/eu-expansion.css',
        array('mrseo-language-dropdown'),'1.0.0');
    if(mrseo_slug()==='')wp_enqueue_script('mrseo-eu-earth',get_template_directory_uri().'/assets/orbit-earth-three.js',array(),'5.0.0',true);
},110);
// The Earth renderer uses import.meta and must execute as an ES module.
add_filter('script_loader_tag',function($tag,$handle){
    if($handle!=='mrseo-eu-earth')return $tag;
    return str_replace('<script ','<script type="module" ',$tag);
},10,2);
add_action('init',function(){
    if(get_option('mrseo_eu_rules_v1')!=='ready'){
        flush_rewrite_rules(false);
        update_option('mrseo_eu_rules_v1','ready',false);
    }
},42);
