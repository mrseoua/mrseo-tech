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
    return array('uk' => 'uk-UA', 'ru' => 'ru', 'en' => 'en-GB', 'pl' => 'pl-PL', 'de' => 'de-DE', 'fr' => 'fr-FR', 'it' => 'it-IT', 'es' => 'es-ES', 'nl' => 'nl-NL', 'ro' => 'ro-RO', 'cs' => 'cs-CZ', 'pt' => 'pt-PT', 'sv' => 'sv-SE', 'da' => 'da-DK', 'fi' => 'fi-FI', 'hu' => 'hu-HU', 'sk' => 'sk-SK', 'el' => 'el-GR', 'bg' => 'bg-BG', 'hr' => 'hr-HR');
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
        if(in_array($slug,array('','seo','seo-audit','ecommerce-seo','google-ads','analytics','web-development','about','portfolio','contact'),true))
            foreach(array('fr','it','es','nl','ro','cs','pt','sv','da','fi','hu','sk','el','bg','hr') as $lang)$pages[$lang]=$slug;
        $groups[] = array('group' => 'shared:' . ($slug === '' ? 'home' : $slug), 'pages' => $pages);
    }

    $groups[] = array('group'=>'privacy','pages'=>array(
        'uk'=>'privacy','ru'=>'privacy','en'=>'privacy','pl'=>'privacy','de'=>'privacy','fr'=>'privacy','it'=>'privacy','es'=>'privacy','nl'=>'privacy','ro'=>'privacy','cs'=>'privacy','pt'=>'privacy','sv'=>'privacy','da'=>'privacy','fi'=>'privacy','hu'=>'privacy','sk'=>'privacy','el'=>'privacy','bg'=>'privacy','hr'=>'privacy'));
    // Thirteen verified UA/RU service pairs, no fabricated other translations.
    // These pages exist as original editorial landings in BOTH locales.
    if(function_exists('mrseo_ua_website_slugs')){
        foreach(mrseo_ua_website_slugs() as $slug){
            $pages=array('uk'=>$slug);
            if(function_exists('mrseo_ru_website_slugs')
                && in_array($slug,mrseo_ru_website_slugs(),true))
                $pages['ru']=$slug;
            // UK is an alternate only if the original UK page is genuinely complete.
            if(function_exists('mrseo_en_gb_slugs')
                && in_array($slug,mrseo_en_gb_slugs(),true))
                $pages['en']=$slug;
            // A Polish URL is an alternate only after its complete original page exists.
            if(function_exists('mrseo_pl_service_slugs')
                && in_array($slug,mrseo_pl_service_slugs(),true))$pages['pl']=$slug;
            // UK + Poland have complete standalone Ads-audit pages, same service intent.
            if($slug==='google-ads-audit'){
                $pages['en']='google-ads-audit';
                $pages['pl']='audyt-google-ads';
            }
            if(function_exists('mrseo_de_service_slugs')
                && in_array($slug,mrseo_de_service_slugs(),true))$pages['de']=$slug;
            if(function_exists('mrseo_fr_service_slugs')
                && in_array($slug,mrseo_fr_service_slugs(),true))$pages['fr']=$slug;
            if(function_exists('mrseo_it_service_slugs')
                && in_array($slug,mrseo_it_service_slugs(),true))$pages['it']=$slug;
            if(function_exists('mrseo_es_service_slugs')
                && in_array($slug,mrseo_es_service_slugs(),true))$pages['es']=$slug;
            if(function_exists('mrseo_nl_service_slugs')
                && in_array($slug,mrseo_nl_service_slugs(),true))$pages['nl']=$slug;
            if(function_exists('mrseo_ro_service_slugs')
                && in_array($slug,mrseo_ro_service_slugs(),true))$pages['ro']=$slug;
            if(function_exists('mrseo_cs_service_slugs')
                && in_array($slug,mrseo_cs_service_slugs(),true))$pages['cs']=$slug;
            $groups[]=array('group'=>'ua-service:'.$slug,'pages'=>$pages);
        }
    }

    foreach (array('service-websites', 'performance-max') as $slug) {
        $pages=array('uk'=>$slug,'ru'=>$slug,'en'=>$slug);
        if($slug==='service-websites' && function_exists('mrseo_pl_service_slugs')
            && in_array($slug,mrseo_pl_service_slugs(),true))$pages['pl']=$slug;
        if($slug==='service-websites' && function_exists('mrseo_de_service_slugs')
            && in_array($slug,mrseo_de_service_slugs(),true))$pages['de']=$slug;
        if($slug==='service-websites' && function_exists('mrseo_fr_service_slugs')
            && in_array($slug,mrseo_fr_service_slugs(),true))$pages['fr']=$slug;
        if($slug==='service-websites' && function_exists('mrseo_it_service_slugs')
            && in_array($slug,mrseo_it_service_slugs(),true))$pages['it']=$slug;
        if($slug==='service-websites' && function_exists('mrseo_es_service_slugs')
            && in_array($slug,mrseo_es_service_slugs(),true))$pages['es']=$slug;
        if($slug==='service-websites' && function_exists('mrseo_nl_service_slugs')
            && in_array($slug,mrseo_nl_service_slugs(),true))$pages['nl']=$slug;
        if($slug==='service-websites' && function_exists('mrseo_ro_service_slugs')
            && in_array($slug,mrseo_ro_service_slugs(),true))$pages['ro']=$slug;
        if($slug==='service-websites' && function_exists('mrseo_cs_service_slugs')
            && in_array($slug,mrseo_cs_service_slugs(),true))$pages['cs']=$slug;
        $groups[] = array('group' => 'three:' . $slug,'pages'=>$pages);
    }

    $groups[] = array('group'=>'horoshop',
        'pages'=>array('uk'=>'horoshop','ru'=>'horoshop'));

    // These three Ukrainian/Russian services have real English/Polish equivalents
    // with different slug names. Keep them out of the UA/RU-only set below.
    $cross_market = array('google-shopping', 'merchant-center', 'online-store-development');
    foreach (mrseo_new_service_slugs() as $slug) {
        if (in_array($slug, $cross_market, true)) continue;
        $pages=array('uk'=>$slug,'ru'=>$slug);
        if(function_exists('mrseo_en_gb_slugs')
            && in_array($slug,mrseo_en_gb_slugs(),true))$pages['en']=$slug;
        if(function_exists('mrseo_pl_service_slugs')
            && in_array($slug,mrseo_pl_service_slugs(),true))$pages['pl']=$slug;
        if(function_exists('mrseo_de_service_slugs')
            && in_array($slug,mrseo_de_service_slugs(),true))$pages['de']=$slug;
        if(function_exists('mrseo_fr_service_slugs')
            && in_array($slug,mrseo_fr_service_slugs(),true))$pages['fr']=$slug;
        if(function_exists('mrseo_it_service_slugs')
            && in_array($slug,mrseo_it_service_slugs(),true))$pages['it']=$slug;
        if(function_exists('mrseo_es_service_slugs')
            && in_array($slug,mrseo_es_service_slugs(),true))$pages['es']=$slug;
        if(function_exists('mrseo_nl_service_slugs')
            && in_array($slug,mrseo_nl_service_slugs(),true))$pages['nl']=$slug;
        if(function_exists('mrseo_ro_service_slugs')
            && in_array($slug,mrseo_ro_service_slugs(),true))$pages['ro']=$slug;
        if(function_exists('mrseo_cs_service_slugs')
            && in_array($slug,mrseo_cs_service_slugs(),true))$pages['cs']=$slug;
        $groups[] = array('group'=>'ua-ru:' . $slug,'pages'=>$pages);
    }

    $groups[] = array('group'=>'website-creation',
        'pages'=>array('en'=>'website-design','pl'=>'tworzenie-stron-internetowych','de'=>'website-design','fr'=>'website-design','it'=>'website-design','es'=>'website-design','nl'=>'website-design','ro'=>'website-design','cs'=>'website-design','pt'=>'website-design','sv'=>'website-design','da'=>'website-design','fi'=>'website-design','hu'=>'website-design','sk'=>'website-design','el'=>'website-design','bg'=>'website-design','hr'=>'website-design'));
    $groups[] = array('group'=>'online-shop-creation',
        'pages'=>array('uk'=>'online-store-development','ru'=>'online-store-development',
            'en'=>'online-shop-development','pl'=>'tworzenie-sklepow-internetowych','de'=>'online-shop-development','fr'=>'online-shop-development','it'=>'online-shop-development','es'=>'online-shop-development','nl'=>'online-shop-development','ro'=>'online-shop-development','cs'=>'online-shop-development','pt'=>'online-shop-development','sv'=>'online-shop-development','da'=>'online-shop-development','fi'=>'online-shop-development','hu'=>'online-shop-development','sk'=>'online-shop-development','el'=>'online-shop-development','bg'=>'online-shop-development','hr'=>'online-shop-development'));
    $groups[] = array('group'=>'merchant-center-help',
        'pages'=>array('uk'=>'merchant-center','ru'=>'merchant-center',
            'en'=>'merchant-center-help','pl'=>'problemy-merchant-center','de'=>'merchant-center-help','fr'=>'merchant-center-help','it'=>'merchant-center-help','es'=>'merchant-center-help','nl'=>'merchant-center-help','ro'=>'merchant-center-help','cs'=>'merchant-center-help'));
    $groups[] = array('group'=>'google-shopping',
        'pages'=>array('uk'=>'google-shopping','ru'=>'google-shopping',
            'en'=>'google-shopping','pl'=>'google-shopping','de'=>'google-shopping','fr'=>'google-shopping','it'=>'google-shopping','es'=>'google-shopping','nl'=>'google-shopping','ro'=>'google-shopping','cs'=>'google-shopping'));
    $groups[] = array('group'=>'wordpress-maintenance',
        'pages'=>array('en'=>'wordpress-care','pl'=>'opieka-wordpress','de'=>'wordpress-care','fr'=>'wordpress-care','it'=>'wordpress-care','es'=>'wordpress-care','nl'=>'wordpress-care','ro'=>'wordpress-care','cs'=>'wordpress-care'));

    // Platform-specific WooCommerce / Shopify service now has a genuine Polish counterpart.
    // Automation, API and web applications share their genuine UA/RU/EN groups.
    if(function_exists('mrseo_en_gb_slugs')
        && in_array('woocommerce-shopify-stores',mrseo_en_gb_slugs(),true)){
        $pages=array('en'=>'woocommerce-shopify-stores');
        if(function_exists('mrseo_pl_service_slugs')
            && in_array('sklepy-woocommerce-shopify',mrseo_pl_service_slugs(),true))
            $pages['pl']='sklepy-woocommerce-shopify';
        if(function_exists('mrseo_de_service_slugs')
            && in_array('woocommerce-shopify-stores',mrseo_de_service_slugs(),true))
            $pages['de']='woocommerce-shopify-stores';
        if(function_exists('mrseo_fr_service_slugs')
            && in_array('woocommerce-shopify-stores',mrseo_fr_service_slugs(),true))
            $pages['fr']='woocommerce-shopify-stores';
        if(function_exists('mrseo_it_service_slugs')
            && in_array('woocommerce-shopify-stores',mrseo_it_service_slugs(),true))
            $pages['it']='woocommerce-shopify-stores';
        if(function_exists('mrseo_es_service_slugs')
            && in_array('woocommerce-shopify-stores',mrseo_es_service_slugs(),true))
            $pages['es']='woocommerce-shopify-stores';
        if(function_exists('mrseo_nl_service_slugs')
            && in_array('woocommerce-shopify-stores',mrseo_nl_service_slugs(),true))$pages['nl']='woocommerce-shopify-stores';
        if(function_exists('mrseo_ro_service_slugs')
            && in_array('woocommerce-shopify-stores',mrseo_ro_service_slugs(),true))$pages['ro']='woocommerce-shopify-stores';
        if(function_exists('mrseo_cs_service_slugs')
            && in_array('woocommerce-shopify-stores',mrseo_cs_service_slugs(),true))$pages['cs']='woocommerce-shopify-stores';
        $groups[]=array('group'=>'platform:woocommerce-shopify','pages'=>$pages);
    }
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
