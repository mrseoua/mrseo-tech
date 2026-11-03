<?php
/**
 * Single source of truth for international SEO (HTML canonical/hreflang and XML sitemap).
 *
 * A fallback service link in mrseo_url() is navigation, NOT a translated equivalent.
 * Therefore these URLs are built directly from locale + existing route slug.
 * Never list an untranslated service as an alternate.
 *
 * Staging noindex and X-Robots-Tag controls live in functions.php and are untouched.
 */
if (!defined('ABSPATH')) exit;

function mrseo_i18n_locale_codes() {
    return array('uk' => 'uk-UA', 'ru' => 'ru', 'en' => 'en-GB', 'pl' => 'pl-PL', 'de' => 'de-DE');
}

function mrseo_i18n_exact_url($language, $slug) {
    if (!array_key_exists($language, mrseo_i18n_locale_codes())) {
        throw new InvalidArgumentException('Unknown locale in SEO registry');
    }
    $prefix = $language === 'uk' ? '' : $language . '/';
    return home_url('/' . $prefix . ($slug === '' ? '' : $slug . '/'));
}

/**
 * Explicit correspondence of genuinely comparable services. Each URL belongs to
 * one group only, so a UK lead-generation page cannot also masquerade as a
 * translation of the separate UK website-design page.
 *
 * Return: array of arrays: ['group'=>string, 'pages'=>['uk'=>'slug', ...]].
 */
function mrseo_i18n_page_groups() {
    static $groups = null;
    if ($groups !== null) return $groups;

    $groups = array();
    foreach (mrseo_int_pages() as $slug) {
        $pages = array();
        foreach (array('uk','ru','en','pl','de') as $lang) $pages[$lang] = $slug;
        $groups[] = array('group' => 'shared:' . ($slug === '' ? 'home' : $slug), 'pages' => $pages);
    }

    $groups[] = array('group'=>'privacy','pages'=>array(
        'uk'=>'privacy','ru'=>'privacy','en'=>'privacy','pl'=>'privacy','de'=>'privacy'));
    foreach (array('service-websites', 'performance-max') as $slug) {
        $groups[] = array('group' => 'three:' . $slug,
            'pages' => array('uk'=>$slug, 'ru'=>$slug, 'en'=>$slug));
    }

    $groups[] = array('group'=>'horoshop',
        'pages'=>array('uk'=>'horoshop','ru'=>'horoshop'));

    // These three Ukrainian/Russian services have real English/Polish equivalents
    // with different slug names. Keep them out of the UA/RU-only set below.
    $cross_market = array('google-shopping', 'merchant-center', 'online-store-development');
    foreach (mrseo_new_service_slugs() as $slug) {
        if (in_array($slug, $cross_market, true)) continue;
        $groups[] = array('group'=>'ua-ru:' . $slug,
            'pages'=>array('uk'=>$slug,'ru'=>$slug));
    }

    $groups[] = array('group'=>'website-creation',
        'pages'=>array('en'=>'website-design','pl'=>'tworzenie-stron-internetowych'));
    $groups[] = array('group'=>'online-shop-creation',
        'pages'=>array('uk'=>'online-store-development','ru'=>'online-store-development',
            'en'=>'online-shop-development','pl'=>'tworzenie-sklepow-internetowych'));
    $groups[] = array('group'=>'google-ads-audit',
        'pages'=>array('en'=>'google-ads-audit','pl'=>'audyt-google-ads'));
    $groups[] = array('group'=>'merchant-center-help',
        'pages'=>array('uk'=>'merchant-center','ru'=>'merchant-center',
            'en'=>'merchant-center-help','pl'=>'problemy-merchant-center'));
    $groups[] = array('group'=>'google-shopping',
        'pages'=>array('uk'=>'google-shopping','ru'=>'google-shopping',
            'en'=>'google-shopping','pl'=>'google-shopping'));
    $groups[] = array('group'=>'wordpress-maintenance',
        'pages'=>array('en'=>'wordpress-care','pl'=>'opieka-wordpress'));

    return $groups;
}

/**
 * Exact translation matching for the language selector. A service in another
 * market is a true alternate only when it belongs to the same SEO group.
 */
function mrseo_i18n_matching_slug($from_language, $from_slug, $to_language) {
    if ($from_language === $to_language) return $from_slug;
    foreach (mrseo_i18n_page_groups() as $group) {
        if (isset($group['pages'][$from_language])
            && $group['pages'][$from_language] === $from_slug
            && array_key_exists($to_language, $group['pages'])) {
            return $group['pages'][$to_language];
        }
    }
    return null;
}

/**
 * One canonical and one reciprocal alternate set for each completed route.
 * The language-selector homepage is the only x-default: the other service
 * pages do not have a neutral-language counterpart.
 */
function mrseo_i18n_inventory() {
    static $inventory = null;
    if ($inventory !== null) return $inventory;

    $inventory = array();
    foreach (mrseo_i18n_page_groups() as $group) {
        $alternates = array();
        foreach ($group['pages'] as $language => $slug) {
            $code = mrseo_i18n_locale_codes()[$language];
            $alternates[$code] = mrseo_i18n_exact_url($language, $slug);
        }
        $x_default = $group['group'] === 'shared:home'
            ? mrseo_i18n_exact_url('uk', '') : null;

        foreach ($group['pages'] as $language => $slug) {
            $url = mrseo_i18n_exact_url($language, $slug);
            $inventory[] = array(
                'group' => $group['group'],
                'language' => $language,
                'slug' => $slug,
                'loc' => $url,
                'canonical' => $url,
                'alternates' => $alternates,
                'default' => $x_default,
            );
        }
    }
    return $inventory;
}

function mrseo_i18n_current_entry() {
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/', '/');
    $language = mrseo_locale();
    $slug = mrseo_slug();
    $expected = ($language === 'uk' ? '' : $language . '/') . $slug;
    if ($path !== trim($expected, '/')) return null;
    foreach (mrseo_i18n_inventory() as $entry) {
        if ($entry['language'] === $language && $entry['slug'] === $slug) return $entry;
    }
    return null;
}

/** Avoid WordPress core generating a second canonical on virtual routes. */
add_action('wp', function () {
    if (mrseo_i18n_current_entry()) remove_action('wp_head', 'rel_canonical');
}, 1);

add_action('wp_head', function () {
    $entry = mrseo_i18n_current_entry();
    if (!$entry) return;
    echo '<link rel="canonical" href="' . esc_url($entry['canonical']) . '">' . "\n";
    foreach ($entry['alternates'] as $language => $url) {
        echo '<link rel="alternate" hreflang="' . esc_attr($language) .
            '" href="' . esc_url($url) . '">' . "\n";
    }
    if ($entry['default']) {
        echo '<link rel="alternate" hreflang="x-default" href="' .
            esc_url($entry['default']) . '">' . "\n";
    }
}, 2);
