<?php
/**
 * Ensure Ukrainian service websites and Horoshop pages resolve as WordPress
 * virtual pages, even when no WordPress post exists for those slugs.
 * Both routes have verified templates and are present in the SEO inventory.
 */
if (!defined('ABSPATH')) exit;
add_action('init', function () {
    $end = chr(36);
    $optional = chr(63);
    $query = chr(63);
    add_rewrite_rule('^service-websites/' . $optional . $end,
        'index.php' . $query . 'mrseo_service=service-websites', 'top');
    add_rewrite_rule('^horoshop/' . $optional . $end,
        'index.php' . $query . 'mrseo_service=horoshop', 'top');
}, 11);
add_filter('pre_handle_404', function ($pre) {
    if (mrseo_locale() !== 'uk') return $pre;
    $slug = mrseo_slug();
    if ($slug === 'service-websites' || $slug === 'horoshop') return true;
    return $pre;
}, 95);
add_action('init', function () {
    if (get_option('mrseo_ua_virtual_routes_v1') !== 'ready') {
        flush_rewrite_rules(false);
        update_option('mrseo_ua_virtual_routes_v1', 'ready', false);
    }
}, 40);
