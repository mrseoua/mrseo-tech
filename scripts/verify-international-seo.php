<?php
/**
 * International SEO prelaunch regression test, executed in CI WITHOUT WordPress.
 * Load actual routing/data files and execute their registered wp_head callbacks.
 *
 * Assertions:
 * - all completed pages are represented exactly once (429 URLs)
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
require_once $root . '/inc/ru-website-services.php';
require_once $root . '/inc/en-gb-services.php';
require_once $root . '/inc/new-service-routes.php';
require_once $root . '/inc/pl-service-routing.php';
require_once $root . '/inc/de-service-routing.php';
require_once $root . '/inc/fr-service-routing.php';
require_once $root . '/inc/it-service-routing.php';
require_once $root . '/inc/es-service-routing.php';
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
assert_seo(count($inventory) === 429, 'Expected 429 completed country-language URLs, got ' . count($inventory));

$expected = [
    'uk' => array_merge(mrseo_int_pages(), ['service-websites','performance-max','horoshop','privacy'],mrseo_new_service_slugs(),mrseo_ua_website_slugs()),
    'ru' => array_merge(mrseo_int_pages(), ['service-websites','performance-max','horoshop','privacy'],mrseo_new_service_slugs(),mrseo_ru_website_slugs()),
    'en' => array_merge(mrseo_int_pages(), ['service-websites','performance-max','privacy'], mrseo_uk_market_new_slugs(),mrseo_en_gb_slugs()),
    'pl' => array_merge(mrseo_int_pages(), ['privacy'],mrseo_pl_service_slugs()),
    'de' => array_merge(mrseo_int_pages(),['privacy'],mrseo_de_service_slugs()),
    'fr' => array_merge(mrseo_eu_slugs(),mrseo_fr_service_slugs()),
    'it' => array_merge(mrseo_eu_slugs(),mrseo_it_service_slugs()),
    'es' => array_merge(mrseo_eu_slugs(),mrseo_es_service_slugs()),
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
    if(str_starts_with($entry['group'],'en-gb-only:'))
        assert_seo(count($entry['alternates']) === 1, "UK-specific service has false foreign translations: $url");
    else
        assert_seo(count($entry['alternates']) >= 2, "Invalid hreflang on $url");
    if ($entry['default'] !== null) {
        assert_seo($entry['group'] === 'shared:home' &&
            $entry['default'] === 'https://mrseo.tech/', "Incorrect x-default on $url");
        $home_count++;
    }
}
assert_seo(count($seen) === 429 && $home_count === 20, 'Unexpected sitemap coverage or fallback');
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

// Thirteen genuinely translated RU/UA service pages. No invented third-language routes.
assert_seo(mrseo_ua_website_slugs()===mrseo_ru_website_slugs(),
 'Russian and Ukrainian completed service inventories differ');
foreach(mrseo_ua_website_slugs() as $slug){
 $ua=mrseo_ua_website_data($slug);
 $ru=mrseo_ru_website_data($slug);
 assert_seo($ua&&$ru&&isset($ua['title'],$ru['title'],$ua['headline'],$ru['headline']),
  'Missing full original localized content '.$slug);
 assert_seo($ua['lead']!==$ru['lead'],'Untranslated Russian lead '.$slug);
 foreach(array('uk','ru') as $language){
  $_SERVER['REQUEST_URI']=mrseo_i18n_exact_url($language,$slug);
  $entry=mrseo_i18n_current_entry();
  assert_seo($entry&&$entry['group']==='ua-service:'.$slug,'Missing exact canonical '.$language.'/'.$slug);
  $expectedAlternates=array('uk-UA'=>'https://mrseo.tech/'.$slug.'/',
   'ru'=>'https://mrseo.tech/ru/'.$slug.'/');
  if(in_array($slug,mrseo_en_gb_slugs(),true) || $slug==='google-ads-audit')
   $expectedAlternates['en-GB']='https://mrseo.tech/en/'.$slug.'/';
  if(in_array($slug,mrseo_pl_service_slugs(),true))
   $expectedAlternates['pl-PL']='https://mrseo.tech/pl/'.$slug.'/';
  if($slug==='google-ads-audit')
   $expectedAlternates['pl-PL']='https://mrseo.tech/pl/audyt-google-ads/';
  if(in_array($slug,mrseo_de_service_slugs(),true))
   $expectedAlternates['de-DE']='https://mrseo.tech/de/'.$slug.'/';
  if(in_array($slug,mrseo_fr_service_slugs(),true))
   $expectedAlternates['fr-FR']='https://mrseo.tech/fr/'.$slug.'/';
  if(in_array($slug,mrseo_it_service_slugs(),true))
   $expectedAlternates['it-IT']='https://mrseo.tech/it/'.$slug.'/';
  if(in_array($slug,mrseo_es_service_slugs(),true))
   $expectedAlternates['es-ES']='https://mrseo.tech/es/'.$slug.'/';
  assert_seo($entry['alternates']===$expectedAlternates,
    'Wrong genuine international hreflang set '.$slug);
  $other=$language==='uk'?'ru':'uk';
  assert_seo(mrseo_url($slug,$other)===mrseo_i18n_exact_url($other,$slug),
    'Language selector cannot reach true RU/UA counterpart '.$slug);
 }
 // Third languages have no completed individual copies; use a real parent page.
 $_SERVER['REQUEST_URI']='/ru/'.$slug.'/';
 foreach(array_keys($codes) as $language){
  if($language==='uk'||$language==='ru')continue;
  $dest=mrseo_url($slug,$language);
  if($language==='en'&&(in_array($slug,mrseo_en_gb_slugs(),true)||$slug==='google-ads-audit'))
   assert_seo($dest==='https://mrseo.tech/en/'.$slug.'/',
    'Completed UK equivalent is not accessible '.$slug);
  elseif($language==='pl' && (in_array($slug,mrseo_pl_service_slugs(),true)||$slug==='google-ads-audit'))
   assert_seo($dest==='https://mrseo.tech/pl/'.($slug==='google-ads-audit'?'audyt-google-ads':$slug).'/',
    'Completed Polish equivalent is not accessible '.$slug);
  elseif($language==='de' && in_array($slug,mrseo_de_service_slugs(),true))
   assert_seo($dest==='https://mrseo.tech/de/'.$slug.'/',
    'Completed German equivalent is not accessible '.$slug);
  elseif($language==='fr' && in_array($slug,mrseo_fr_service_slugs(),true))
   assert_seo($dest==='https://mrseo.tech/fr/'.$slug.'/',
    'Completed French equivalent is not accessible '.$slug);
  elseif($language==='it' && in_array($slug,mrseo_it_service_slugs(),true))
   assert_seo($dest==='https://mrseo.tech/it/'.$slug.'/',
    'Completed Italian equivalent is not accessible '.$slug);
  elseif($language==='es' && in_array($slug,mrseo_es_service_slugs(),true))
   assert_seo($dest==='https://mrseo.tech/es/'.$slug.'/',
    'Completed Spanish equivalent is not accessible '.$slug);
  else
   assert_seo($dest!=='https://mrseo.tech/'.$language.'/'.$slug.'/',
    'Invented market alternate '.$language.'/'.$slug);
  assert_seo(str_starts_with($dest,'https://mrseo.tech/'.$language.'/'),
    'Language selector points outside its target locale '.$language.'/'.$slug);
 }
}

// Sixteen actual new UK services: fifteen genuine UA/RU equivalents and one UK-specific offer.
assert_seo(count(mrseo_en_gb_slugs())===16,'Expected 16 genuinely distinct new UK services');
foreach(mrseo_en_gb_slugs() as $slug){
 $_SERVER['REQUEST_URI']='/en/'.$slug.'/';
 assert_seo(mrseo_en_gb_route(),'Missing UK WordPress page '.$slug);
 $p=mrseo_en_gb_data($slug);
 assert_seo($p && !empty($p['title']) && count($p['pains'])===3 &&
  count($p['faq'])===3 && !empty($p['description']),'Incomplete British editorial copy '.$slug);
 $entry=mrseo_i18n_current_entry();
 assert_seo($entry && $entry['canonical']==='https://mrseo.tech/en/'.$slug.'/',
  'No UK canonical '.$slug);
 foreach(array_keys($codes) as $locale){
  if($locale==='en')continue;
  $dest=mrseo_url($slug,$locale);
  assert_seo(str_starts_with($dest,'https://mrseo.tech/'.($locale==='uk'?'':$locale.'/')),
    'Missing valid parent for UK service '.$slug.' -> '.$locale);
 }
}
foreach(array('woocommerce-shopify-stores') as $slug){
 $_SERVER['REQUEST_URI']='/en/'.$slug.'/';
 $entry=mrseo_i18n_current_entry();
 assert_seo($entry['group']==='platform:woocommerce-shopify' &&
   $entry['alternates']===array('en-GB'=>'https://mrseo.tech/en/'.$slug.'/',
    'pl-PL'=>'https://mrseo.tech/pl/sklepy-woocommerce-shopify/',
    'de-DE'=>'https://mrseo.tech/de/woocommerce-shopify-stores/',
    'fr-FR'=>'https://mrseo.tech/fr/woocommerce-shopify-stores/',
    'it-IT'=>'https://mrseo.tech/it/woocommerce-shopify-stores/',
    'es-ES'=>'https://mrseo.tech/es/woocommerce-shopify-stores/'),
   'Missing genuine UK/Poland platform-store equivalents '.$slug);
}
// Existing UA/RU microservices now genuinely match UK: do not treat as UK-only.
foreach(array('catalog-automation','api-integrations','web-applications','ga4-conversions') as $slug){
 $_SERVER['REQUEST_URI']='/en/'.$slug.'/';
 $entry=mrseo_i18n_current_entry();
 assert_seo($entry && $entry['group']==='ua-ru:'.$slug &&
   $entry['alternates']===array_merge(array('uk-UA'=>'https://mrseo.tech/'.$slug.'/',
   'ru'=>'https://mrseo.tech/ru/'.$slug.'/',
   'en-GB'=>'https://mrseo.tech/en/'.$slug.'/'),
   in_array($slug,mrseo_pl_service_slugs(),true)?array('pl-PL'=>'https://mrseo.tech/pl/'.$slug.'/'):array(),
   in_array($slug,mrseo_de_service_slugs(),true)?array('de-DE'=>'https://mrseo.tech/de/'.$slug.'/'):array(),
   in_array($slug,mrseo_fr_service_slugs(),true)?array('fr-FR'=>'https://mrseo.tech/fr/'.$slug.'/'):array(),
   in_array($slug,mrseo_it_service_slugs(),true)?array('it-IT'=>'https://mrseo.tech/it/'.$slug.'/'):array(),
   in_array($slug,mrseo_es_service_slugs(),true)?array('es-ES'=>'https://mrseo.tech/es/'.$slug.'/'):array()),
   'Missing true international microservice match '.$slug);
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
