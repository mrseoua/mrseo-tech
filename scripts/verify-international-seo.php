<?php
/**
 * International SEO prelaunch regression test, executed in CI WITHOUT WordPress.
 * Load actual routing/data files and execute their registered wp_head callbacks.
 *
 * Assertions:
 * - all completed pages are represented exactly once (307 URLs)
 * - locale tags and self canonicals have no invented parent-page alternates
 * - reciprocal hreflang annotations are the same in sitemap and in HTML
 * - localized slugs with different spellings resolve in the language selector
 * - no duplicate canonical/hreflang tags in the theme's hook output
 * - invalid/nonexistent URLs are excluded, query strings cannot change canonical
 */
declare(strict_types=1);
define('ABSPATH', dirname(__DIR__) . '/');
$root = dirname(__DIR__) . '/wp-content/themes/mrseo-tech';
$GLOBALS['test_actions'] = [];
$GLOBALS['test_filters'] = [];

function add_action($hook, $callback, $priority = 10) {
    $GLOBALS['test_actions'][$hook][$priority][] = $callback;
}
function add_filter($hook, $callback, $priority = 10) {
    $GLOBALS['test_filters'][$hook][$priority][] = $callback;
}
function home_url($path = '') {
    return 'https://mrseo.tech' . $path;
}
function sanitize_title($value) {
    return trim((string)$value);
}
function esc_attr($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
function esc_url($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
function wp_trim_words($text, $num_words = 55, $more = '…') {
    $words = preg_split('/\s+/u', trim((string)$text));
    if (count($words) <= $num_words) return (string)$text;
    return implode(' ', array_slice($words, 0, $num_words)) . $more;
}

require_once $root . '/inc/i18n-routing.php';
require_once $root . '/inc/ua-website-services.php';
require_once $root . '/inc/new-service-routes.php';
require_once $root . '/inc/pl-service-routing.php';
require_once $root . '/inc/uk-market-routing.php';
require_once $root . '/inc/eu-routing.php';
require_once $root . '/inc/international-seo.php';
require_once $root . '/inc/privacy-page.php';

function assert_seo($condition, $message) {
    if (!$condition) throw new RuntimeException($message);
}
$inventory = mrseo_i18n_inventory();
$groups = mrseo_i18n_page_groups();
$codes = mrseo_i18n_locale_codes();
assert_seo(count($groups) === 42, 'Expected 42 editorial equivalence groups');
assert_seo(count($inventory) === 307, 'Expected 307 completed country-language URLs, got ' . count($inventory));

$expected = [
    'uk' => array_merge(mrseo_int_pages(), ['service-websites','performance-max','horoshop','privacy'],mrseo_new_service_slugs(),mrseo_ua_website_slugs()),
    'ru' => array_merge(mrseo_int_pages(), ['service-websites','performance-max','horoshop','privacy'],mrseo_new_service_slugs()),
    'en' => array_merge(mrseo_int_pages(), ['service-websites','performance-max','privacy'], mrseo_uk_market_new_slugs()),
    'pl' => array_merge(mrseo_int_pages(), ['privacy'],mrseo_pl_service_slugs()),
    'de' => array_merge(mrseo_int_pages(),['privacy']),
    'fr' => mrseo_eu_slugs(),
    'it' => mrseo_eu_slugs(),
    'es' => mrseo_eu_slugs(),
    'nl' => mrseo_eu_slugs(),
    'ro' => mrseo_eu_slugs(),
    'cs' => mrseo_eu_slugs(),
    'pt' => mrseo_eu_slugs(),
    'sv' => mrseo_eu_slugs(),
    'da' => mrseo_eu_slugs(),
    'fi' => mrseo_eu_slugs(),
    'hu' => mrseo_eu_slugs(),
    'sk' => mrseo_eu_slugs(),
    'el' => mrseo_eu_slugs(),
    'bg' => mrseo_eu_slugs(),
    'hr' => mrseo_eu_slugs(),
];
foreach ($expected as $lang => $slugs) {
    $expected[$lang] = array_values(array_unique($slugs));
}
$seen = [];
$url_groups = [];
$home_count = 0;
foreach ($inventory as $entry) {
    $lang = $entry['language'];
    $slug = $entry['slug'];
    $url = $entry['loc'];
    assert_seo(in_array($slug, $expected[$lang], true), "Unexpected URL: $lang/$slug");
    assert_seo($entry['canonical'] === $url, "Not self-canonical: $url");
    assert_seo($url === mrseo_i18n_exact_url($lang, $slug), "URL does not match real path: $url");
    assert_seo(!isset($seen[$url]), "Duplicate URL in sitemap: $url");
    $seen[$url] = true;
    $url_groups[$url] = $entry['group'];
    assert_seo(isset($entry['alternates'][$codes[$lang]]) &&
        $entry['alternates'][$codes[$lang]] === $url, "Missing self hreflang on $url");
    assert_seo(count($entry['alternates']) >= (str_starts_with($entry['group'],'ua-service:')?1:2), "Invalid hreflang on $url");
    if ($entry['default'] !== null) {
        assert_seo($entry['group'] === 'shared:home' &&
            $entry['default'] === 'https://mrseo.tech/', "Incorrect x-default on $url");
        $home_count++;
    }
}
assert_seo(count($seen) === 307 && $home_count === 20, 'Unexpected sitemap coverage or fallback');
foreach ($expected as $lang => $slugs) {
    foreach ($slugs as $slug) {
        $expected_url = mrseo_i18n_exact_url($lang, $slug);
        assert_seo(isset($seen[$expected_url]), "Completed route missing from sitemap: $expected_url");
    }
}

foreach ($inventory as $entry) {
    // Every alternate must return the exact same set of URLs (bidirectional).
    foreach ($entry['alternates'] as $hreflang => $url) {
        assert_seo(isset($seen[$url]), "Unregistered alternate: $url");
        assert_seo($url_groups[$url] === $entry['group'], "Crossed service intent in $hreflang -> $url");
    }
    $path = parse_url($entry['loc'], PHP_URL_PATH);
    $_SERVER['REQUEST_URI'] = $path . '?utm_source=quality-test';
    $actual = mrseo_i18n_current_entry();
    assert_seo($actual !== null && $actual['loc'] === $entry['loc'],
        "Current-page lookup failed with query parameters: " . $entry['loc']);
    assert_seo(mrseo_url($entry['slug'], $entry['language']) === $entry['loc'],
        "A real route is being replaced by a fallback link: " . $entry['loc']);
    foreach ($entry['alternates'] as $hreflang => $alternate_url) {
        $target_locale = array_search($hreflang, $codes, true);
        assert_seo($target_locale !== false, 'Unsupported hreflang tag ' . $hreflang);
        $switch_url = mrseo_url($entry['slug'], $target_locale);
        assert_seo($switch_url === $alternate_url,
            "Language selector does not use actual equivalent: " . $entry['loc'] . ' -> ' . $hreflang .
            '; got ' . $switch_url . '; expected ' . $alternate_url);
    }

    // Execute the THEME's registered head callbacks, not only the registry helper.
    ob_start();
    $head_actions = $GLOBALS['test_actions']['wp_head'] ?? [];
    ksort($head_actions, SORT_NUMERIC);
    foreach ($head_actions as $callbacks) foreach ($callbacks as $callback) $callback();
    $html = ob_get_clean();
    assert_seo(substr_count($html, 'rel="canonical"') === 1,
        "Wrong canonical count on " . $entry['loc']);
    assert_seo(strpos($html, 'rel="canonical" href="' . $entry['loc'] . '"') !== false,
        "Wrong canonical on " . $entry['loc']);
    preg_match_all('/<link rel="alternate" hreflang="([^"]+)" href="([^"]+)">/', $html, $matches, PREG_SET_ORDER);
    $actual_hreflang = [];
    foreach ($matches as $match) {
        assert_seo(!isset($actual_hreflang[$match[1]]),
            "Duplicate hreflang: " . $entry['loc'] . ' / ' . $match[1]);
        $actual_hreflang[$match[1]] = $match[2];
    }
    $wanted = $entry['alternates'];
    if ($entry['default']) $wanted['x-default'] = $entry['default'];
    assert_seo($actual_hreflang === $wanted,
        "HTML hreflang mismatch on " . $entry['loc'] .
        ": " . json_encode($actual_hreflang) . ' expected ' . json_encode($wanted));
}

// Sitemap and HTML derive from the identical registry.
assert_seo(mrseo_localized_sitemap_paths() === $inventory,
    'Sitemap and page-head registry do not match');

// All 13 UA-only services must be accessible, self canonical and avoid fake alternates.
foreach(mrseo_ua_website_slugs() as $slug){
 $page=mrseo_ua_website_data($slug);
 assert_seo($page!==null&&isset($page['title'],$page['headline'],$page['lead']),'Missing Ukrainian service copy '.$slug);
 $_SERVER['REQUEST_URI']='/'.$slug.'/';
 $entry=mrseo_i18n_current_entry();
 assert_seo($entry!==null&&$entry['group']==='ua-service:'.$slug,'Missing UA-only canonical for '.$slug);
 assert_seo(count($entry['alternates'])===1,'Fabricated foreign-language alternate for '.$slug);
 foreach(array_keys($codes) as $language){
  if($language==='uk')continue;
  $dest=mrseo_url($slug,$language);
  assert_seo($dest!=='https://mrseo.tech/'.$language.'/'.$slug.'/','Missing foreign-language route should use a real parent: '.$language.'/'.$slug);
 }
}

// UK and Polish 'google-shopping' are real pages, not Google Ads fallbacks.
$_SERVER['REQUEST_URI'] = '/en/google-shopping/';
assert_seo(mrseo_url('google-shopping','en') === 'https://mrseo.tech/en/google-shopping/',
    'English Google Shopping wrongly falls back to Google Ads');
$_SERVER['REQUEST_URI'] = '/pl/tworzenie-stron-internetowych/';
assert_seo(mrseo_url('tworzenie-stron-internetowych','en') === 'https://mrseo.tech/en/website-design/',
    'Website creation language switch is not matched');
$_SERVER['REQUEST_URI'] = '/de/unknown-service/';
assert_seo(mrseo_i18n_current_entry() === null, 'Invented URL became indexable');

// New EU markets may list only six real pages each; reject invented services.
foreach (array('fr','it','es','nl','ro','cs','pt','sv','da','fi','hu','sk','el','bg','hr') as $locale) {
    $market=mrseo_eu_market($locale);
    assert_seo($market!==null, "EU market missing: $locale");
    foreach (mrseo_eu_slugs() as $slug) {
        $_SERVER['REQUEST_URI']='/' . $locale . '/' . ($slug===''?'':$slug.'/');
        assert_seo(mrseo_eu_route(), "EU route not registered: $locale/$slug");
        $p=mrseo_eu_page($locale,$slug);
        assert_seo($p && !empty($p['title']) && !empty($p['lead']),
            "EU content incomplete: $locale/$slug");
        $entry=mrseo_i18n_current_entry();
        assert_seo($entry && $entry['language']===$locale && $entry['slug']===$slug,
            "EU SEO entry missing: $locale/$slug");
        if($slug==='privacy'){
            $privacy=mrseo_privacy_copy($locale);
            assert_seo(!empty($privacy['title']) && count($privacy['sections'])>=5,
                "EU privacy text missing: $locale");
        }
        if($slug==='contact'){
            assert_seo(mrseo_url('contact',$locale)===$entry['loc'],
                "EU contact redirect broken: $locale");
        }
    }
    $_SERVER['REQUEST_URI']='/'.$locale.'/horoshop/';
    assert_seo(!mrseo_eu_route() && mrseo_i18n_current_entry()===null,
        "Invented Horoshop EU route: $locale");
}

echo "International SEO PASS: " . count($inventory) . " real canonical URLs, " .
    count($groups) . " equivalence groups, full reciprocal hreflang, matched menus and identical XML inventory.\n";
