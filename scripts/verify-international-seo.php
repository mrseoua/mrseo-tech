<?php
/**
 * International SEO prelaunch regression test, executed in CI WITHOUT WordPress.
 * Load actual routing/data files and execute their registered wp_head callbacks.
 *
 * Assertions:
 * - all completed pages are represented exactly once (660 URLs)
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
require_once $root . '/inc/nl-service-routing.php';
require_once $root . '/inc/ro-service-routing.php';
require_once $root . '/inc/cs-service-routing.php';
require_once $root . '/inc/pt-service-routing.php';
require_once $root . '/inc/sv-service-routing.php';
require_once $root . '/inc/da-service-routing.php';
require_once $root . '/inc/final-market-services.php';
require_once $root . '/inc/uk-market-routing.php';
require_once $root . '/inc/eu-routing.php';
require_once $root . '/inc/ua-dev-new-routes.php';
require_once $root . '/inc/horoshop-premium-routes.php';
require_once $root . '/inc/international-seo.php';
require_once $root . '/inc/privacy-page.php';

function assert_seo($condition, $message) {
    if (!$condition) throw new RuntimeException($message);
}
$inventory = mrseo_i18n_inventory();
$groups = mrseo_i18n_page_groups();
$codes = mrseo_i18n_locale_codes();
assert_seo(count($groups) === 60, 'Expected 60 active editorial equivalence groups');
assert_seo(count($inventory) === 660, 'Expected 660 completed country-language URLs, got ' . count($inventory));

$expected = [
    'uk' => array_merge(mrseo_int_pages(), ['service-websites','performance-max','horoshop','privacy','pricing'],mrseo_new_service_slugs(),mrseo_ua_website_slugs(),mrseo_ua_expansion_slugs(),array_keys(mrseo_ua_dev_new_pages()),array_map(static fn($key)=>'horoshop/'.$key,array_keys(mrseo_hs_pages()))),
    'ru' => array_merge(mrseo_int_pages(), ['service-websites','performance-max','horoshop','privacy'],mrseo_new_service_slugs(),mrseo_ru_website_slugs()),
    'en' => array_merge(mrseo_int_pages(), ['service-websites','performance-max','privacy'], mrseo_uk_market_new_slugs(),mrseo_en_gb_slugs()),
    'pl' => array_merge(mrseo_int_pages(), ['privacy'],mrseo_pl_service_slugs()),
    'de' => array_merge(mrseo_int_pages(),['privacy'],mrseo_de_service_slugs()),
    'fr' => array_merge(mrseo_eu_slugs(),mrseo_fr_service_slugs()),
    'it' => array_merge(mrseo_eu_slugs(),mrseo_it_service_slugs()),
    'es' => array_merge(mrseo_eu_slugs(),mrseo_es_service_slugs()),
    'nl' => array_merge(mrseo_eu_slugs(),mrseo_nl_service_slugs()),
    'ro' => array_merge(mrseo_eu_slugs(),mrseo_ro_service_slugs()),
    'cs' => array_merge(mrseo_eu_slugs(),mrseo_cs_service_slugs()),
    'pt' => array_merge(mrseo_eu_slugs(),mrseo_pt_service_slugs()),
    'sv' => array_merge(mrseo_eu_slugs(),mrseo_sv_service_slugs()),
    'da' => array_merge(mrseo_eu_slugs(),mrseo_da_service_slugs()),
    'fi' => array_merge(mrseo_eu_slugs(),mrseo_final_market_slugs('fi')),
    'hu' => array_merge(mrseo_eu_slugs(),mrseo_final_market_slugs('hu')),
    'sk' => array_merge(mrseo_eu_slugs(),mrseo_final_market_slugs('sk')),
    'el' => array_merge(mrseo_eu_slugs(),mrseo_final_market_slugs('el')),
    'bg' => array_merge(mrseo_eu_slugs(),mrseo_final_market_slugs('bg')),
    'hr' => array_merge(mrseo_eu_slugs(),mrseo_final_market_slugs('hr')),
];
foreach ($expected as $lang => $slugs) {
    $expected[$lang] = array_values(array_unique($slugs));
    if($lang==='uk')$expected[$lang]=array_values(array_diff($expected[$lang],array_keys(mrseo_ua_retired_services())));
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
    if(count($entry['alternates'])===1)
        assert_seo($entry['alternates']===array($codes[$lang]=>$url), "Single-locale self alternate: $url");
    else
        assert_seo(count($entry['alternates']) >= 2, "Invalid hreflang on $url");
    if ($entry['default'] !== null) {
        assert_seo($entry['group'] === 'shared:home' &&
            $entry['default'] === 'https://mrseo.tech/', "Incorrect x-default on $url");
        $home_count++;
    }
}
assert_seo(count($seen) === 660 && $home_count === 20, 'Unexpected sitemap coverage or fallback');
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
  if($language==='uk'&&isset(mrseo_ua_retired_services()[$slug]))continue;
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
   if(in_array($slug,mrseo_nl_service_slugs(),true))
    $expectedAlternates['nl-NL']='https://mrseo.tech/nl/'.$slug.'/';
   if(in_array($slug,mrseo_ro_service_slugs(),true))
    $expectedAlternates['ro-RO']='https://mrseo.tech/ro/'.$slug.'/';
   if(in_array($slug,mrseo_cs_service_slugs(),true))
    $expectedAlternates['cs-CZ']='https://mrseo.tech/cs/'.$slug.'/';
   if(in_array($slug,mrseo_pt_service_slugs(),true))
    $expectedAlternates['pt-PT']='https://mrseo.tech/pt/'.$slug.'/';
   if(in_array($slug,mrseo_sv_service_slugs(),true))
    $expectedAlternates['sv-SE']='https://mrseo.tech/sv/'.$slug.'/';
   if(in_array($slug,mrseo_da_service_slugs(),true))
    $expectedAlternates['da-DK']='https://mrseo.tech/da/'.$slug.'/';
   foreach(mrseo_final_market_codes() as $final_locale=>$final_code)
    if(in_array($slug,mrseo_final_market_slugs($final_locale),true))
     $expectedAlternates[$final_code]='https://mrseo.tech/'.$final_locale.'/'.$slug.'/';
  if(isset(mrseo_ua_retired_services()[$slug]))unset($expectedAlternates['uk-UA']);
  assert_seo($entry['alternates']===$expectedAlternates,
    'Wrong genuine international hreflang set '.$slug);
  $other=$language==='uk'?'ru':'uk';
  assert_seo(mrseo_url($slug,$other)===mrseo_i18n_exact_url($other,$other==='uk'?mrseo_ua_active_service_slug($slug):$slug),
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
   elseif($language==='nl' && in_array($slug,mrseo_nl_service_slugs(),true))
    assert_seo($dest==='https://mrseo.tech/nl/'.$slug.'/',
     'Completed Dutch equivalent is not accessible '.$slug);
   elseif($language==='ro' && in_array($slug,mrseo_ro_service_slugs(),true))
    assert_seo($dest==='https://mrseo.tech/ro/'.$slug.'/',
     'Completed Romanian equivalent is not accessible '.$slug);
   elseif($language==='cs' && in_array($slug,mrseo_cs_service_slugs(),true))
    assert_seo($dest==='https://mrseo.tech/cs/'.$slug.'/',
     'Completed Czech equivalent is not accessible '.$slug);
   elseif($language==='pt' && in_array($slug,mrseo_pt_service_slugs(),true))
    assert_seo($dest==='https://mrseo.tech/pt/'.$slug.'/',
     'Completed Portuguese equivalent is not accessible '.$slug);
   elseif($language==='sv' && in_array($slug,mrseo_sv_service_slugs(),true))
    assert_seo($dest==='https://mrseo.tech/sv/'.$slug.'/',
     'Completed Swedish equivalent is not accessible '.$slug);
   elseif($language==='da' && in_array($slug,mrseo_da_service_slugs(),true))
    assert_seo($dest==='https://mrseo.tech/da/'.$slug.'/',
     'Completed Danish equivalent is not accessible '.$slug);
   elseif(in_array($slug,mrseo_final_market_slugs($language),true))
    assert_seo($dest==='https://mrseo.tech/'.$language.'/'.$slug.'/', 'Completed final-market equivalent not accessible '.$language.'/'.$slug);
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
    'es-ES'=>'https://mrseo.tech/es/woocommerce-shopify-stores/',
     'nl-NL'=>'https://mrseo.tech/nl/woocommerce-shopify-stores/',
     'ro-RO'=>'https://mrseo.tech/ro/woocommerce-shopify-stores/',
     'cs-CZ'=>'https://mrseo.tech/cs/woocommerce-shopify-stores/',
     'pt-PT'=>'https://mrseo.tech/pt/woocommerce-shopify-stores/',
     'sv-SE'=>'https://mrseo.tech/sv/woocommerce-shopify-stores/',
     'da-DK'=>'https://mrseo.tech/da/woocommerce-shopify-stores/',
     'fi-FI'=>'https://mrseo.tech/fi/woocommerce-shopify-stores/',
     'hu-HU'=>'https://mrseo.tech/hu/woocommerce-shopify-stores/',
     'sk-SK'=>'https://mrseo.tech/sk/woocommerce-shopify-stores/',
     'el-GR'=>'https://mrseo.tech/el/woocommerce-shopify-stores/',
     'bg-BG'=>'https://mrseo.tech/bg/woocommerce-shopify-stores/',
     'hr-HR'=>'https://mrseo.tech/hr/woocommerce-shopify-stores/'),
   'Missing genuine UK/Poland platform-store equivalents '.$slug);
}
// Existing UA/RU microservices now genuinely match UK: do not treat as UK-only.
foreach(array('catalog-automation','api-integrations','web-applications','ga4-conversions') as $slug){
 $_SERVER['REQUEST_URI']='/en/'.$slug.'/';
 $entry=mrseo_i18n_current_entry();
 assert_seo($entry && $entry['group']==='ua-ru:'.$slug &&
   $entry['alternates']===array_merge(isset(mrseo_ua_retired_services()[$slug])?array():array('uk-UA'=>'https://mrseo.tech/'.$slug.'/'),array(
   'ru'=>'https://mrseo.tech/ru/'.$slug.'/',
   'en-GB'=>'https://mrseo.tech/en/'.$slug.'/'),
   in_array($slug,mrseo_pl_service_slugs(),true)?array('pl-PL'=>'https://mrseo.tech/pl/'.$slug.'/'):array(),
   in_array($slug,mrseo_de_service_slugs(),true)?array('de-DE'=>'https://mrseo.tech/de/'.$slug.'/'):array(),
   in_array($slug,mrseo_fr_service_slugs(),true)?array('fr-FR'=>'https://mrseo.tech/fr/'.$slug.'/'):array(),
   in_array($slug,mrseo_it_service_slugs(),true)?array('it-IT'=>'https://mrseo.tech/it/'.$slug.'/'):array(),
   in_array($slug,mrseo_es_service_slugs(),true)?array('es-ES'=>'https://mrseo.tech/es/'.$slug.'/'):array(),
   in_array($slug,mrseo_nl_service_slugs(),true)?array('nl-NL'=>'https://mrseo.tech/nl/'.$slug.'/'):array(),
   in_array($slug,mrseo_ro_service_slugs(),true)?array('ro-RO'=>'https://mrseo.tech/ro/'.$slug.'/'):array(),
   in_array($slug,mrseo_cs_service_slugs(),true)?array('cs-CZ'=>'https://mrseo.tech/cs/'.$slug.'/'):array(),
   in_array($slug,mrseo_pt_service_slugs(),true)?array('pt-PT'=>'https://mrseo.tech/pt/'.$slug.'/'):array(),
   in_array($slug,mrseo_sv_service_slugs(),true)?array('sv-SE'=>'https://mrseo.tech/sv/'.$slug.'/'):array(),
   in_array($slug,mrseo_da_service_slugs(),true)?array('da-DK'=>'https://mrseo.tech/da/'.$slug.'/'):array(),
   in_array($slug,mrseo_final_market_slugs('fi'),true)?array('fi-FI'=>'https://mrseo.tech/fi/'.$slug.'/'):array(),
   in_array($slug,mrseo_final_market_slugs('hu'),true)?array('hu-HU'=>'https://mrseo.tech/hu/'.$slug.'/'):array(),
   in_array($slug,mrseo_final_market_slugs('sk'),true)?array('sk-SK'=>'https://mrseo.tech/sk/'.$slug.'/'):array(),
   in_array($slug,mrseo_final_market_slugs('el'),true)?array('el-GR'=>'https://mrseo.tech/el/'.$slug.'/'):array(),
   in_array($slug,mrseo_final_market_slugs('bg'),true)?array('bg-BG'=>'https://mrseo.tech/bg/'.$slug.'/'):array(),
   in_array($slug,mrseo_final_market_slugs('hr'),true)?array('hr-HR'=>'https://mrseo.tech/hr/'.$slug.'/'):array()),
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


// Every new commercial offer has a single UA canonical, actual route and unique copy.
$exp=mrseo_ua_expansion_data();
assert_seo(count($exp)===20,'Expected 20 new UA commercial offers');
foreach($exp as $slug=>$d){
 $_SERVER['REQUEST_URI']='/'.$slug.'/';
 assert_seo(mrseo_ua_expansion_route(),'New UA route missing '.$slug);
 $entry=mrseo_i18n_current_entry();
 if(isset(mrseo_ua_retired_services()[$slug]))assert_seo($entry===null,'Archived service still in SEO registry '.$slug);
 else assert_seo($entry&&count($entry['alternates'])===1&&$entry['canonical']==='https://mrseo.tech/'.$slug.'/','False alternate or canonical '.$slug);
 assert_seo(count($d['headline'])===2&&count($d['pains'])===3&&count($d['benefits'])===3&&count($d['faq'])===3&&count($d['tabs'])===3,'Incomplete new commercial copy '.$slug);
 foreach(mrseo_i18n_locale_codes() as $language=>$code){
  if($language==='uk')continue;
  $url=mrseo_url($slug,$language);
  assert_seo(isset($seen[$url]),'New UA service locale fallback not real '.$slug.' '.$language);
  $_SERVER['REQUEST_URI']='/'.$language.'/'.$slug.'/';
  assert_seo(!mrseo_ua_expansion_route()&&mrseo_i18n_current_entry()===null,'Invented foreign expansion route '.$language.'/'.$slug);
 }
}
foreach(array('title','lead','foot','problemHeading','problemLead','result','description') as $field)assert_seo(count(array_unique(array_column($exp,$field)))===20,'Repeated expansion copy '.$field);
// UA semantic coverage and exact emitted metadata for each real canonical page.
$ua_map=mrseo_ua_semantic_map();
$ua_inventory=array_values(array_filter($inventory,static function($e){return $e['language']==='uk';}));
assert_seo(count($ua_map)===60&&count($ua_inventory)===42,'UA semantic coverage');
foreach(array('primary','title','description') as $field)assert_seo(count(array_unique(array_column($ua_map,$field)))===60,'Duplicate UA semantic '.$field);
foreach($ua_inventory as $entry){
 $slug=$entry['slug'];$_SERVER['REQUEST_URI']=parse_url($entry['loc'],PHP_URL_PATH);
 if(!isset($ua_map[$slug])){
  $extra=mrseo_ua_dev_new_pages()[$slug]??null;$hs=mrseo_hs_key();
  assert_seo($extra||$hs,'Missing extra UA metadata '.$slug);
  $description=$extra?$extra['meta']:mrseo_hs_search_meta($hs)[1];
  $title=$extra?$extra['title'].' | MrSeo.tech':mrseo_hs_search_meta($hs)[0];
  ob_start();$actions=$GLOBALS['test_actions']['wp_head']??array();ksort($actions);foreach($actions as $callbacks)foreach($callbacks as $callback)call_user_func($callback);$head=ob_get_clean();
  assert_seo(substr_count($head,'name="description"')===1&&strpos($head,'content="'.esc_attr($description).'"')!==false,'Wrong extra UA description '.$slug);
  $filters=$GLOBALS['test_filters']['pre_get_document_title'];ksort($filters);$actualTitle='fallback';foreach($filters as $callbacks)foreach($callbacks as $callback)$actualTitle=$callback($actualTitle);
  assert_seo($actualTitle===$title,'Wrong extra UA title '.$slug);
  continue;
 }
 $m=mrseo_ua_semantic_current();assert_seo($m&&$m===$ua_map[$slug],'Missing UA semantic entry '.$slug);
 ob_start();$actions=$GLOBALS['test_actions']['wp_head']??array();ksort($actions);foreach($actions as $callbacks)foreach($callbacks as $callback)call_user_func($callback);$head=ob_get_clean();
 assert_seo(substr_count($head,'name="description"')===1,'Duplicate/missing UA description '.$slug);
 assert_seo(strpos($head,'content="'.esc_attr($m['description']).'"')!==false,'Wrong UA description '.$slug);
 assert_seo(strpos($head,'name="keywords"')===false,'Hidden meta keywords '.$slug);
 $titles=$GLOBALS['test_filters']['pre_get_document_title'][999]??array();
 assert_seo(count($titles)===1&&call_user_func($titles[0],'fallback')===$m['title'],'Wrong UA title '.$slug);
 foreach($m['related']??array() as $link)assert_seo($link[0]!==$slug&&isset($seen[mrseo_i18n_exact_url('uk',mrseo_ua_active_service_slug($link[0]))]),'Bad UA semantic related link '.$slug);
}
$_SERVER['REQUEST_URI']='/ru/seo/';
assert_seo(mrseo_ua_semantic_current()===null,'UA semantics leaked to RU');
$_SERVER['REQUEST_URI']='/seo/unknown/';
assert_seo(mrseo_ua_semantic_current()===null,'UA metadata on nonexistent nested route');
// New UA menu includes all 54 published offers exactly once, no invented routes.
require_once $root.'/inc/mega-menu-trial.php';
$menu_slugs=array();
foreach(mrseo_ua_menu_groups() as $group){
 $menu_slugs[]=$group['parent'];
 foreach($group['items'] as $item)$menu_slugs[]=$item[0];
}
$commercial_slugs=array_keys(array_filter(mrseo_ua_semantic_map(),static function($m){return $m['intent']==='commercial';}));
sort($menu_slugs);sort($commercial_slugs);
assert_seo(count(mrseo_ua_menu_groups())===7&&count($menu_slugs)===54&&$menu_slugs===$commercial_slugs,'UA architecture menu coverage');
foreach($menu_slugs as $slug)assert_seo(isset($seen[mrseo_i18n_exact_url('uk',mrseo_ua_active_service_slug($slug))]),'Invalid UA menu URL '.$slug);
$seo_group=array_values(array_filter(mrseo_ua_menu_groups(),static function($g){return $g['key']==='seo';}))[0];
$seo_hub_slugs=array();foreach($seo_group['sections'] as $section){foreach($section['items'] as $item)$seo_hub_slugs[]=$item[0];}
assert_seo(count($seo_group['sections'])===5&&count($seo_hub_slugs)===18&&count(array_unique($seo_hub_slugs))===18&&$seo_group['planned']===array(),'Complete SEO hub inventory');
assert_seo($seo_hub_slugs===array_column($seo_group['items'],0),'SEO hub and menu differ');
$planned_menu=array('one-time-services');
foreach(mrseo_ua_menu_groups() as $group){foreach($group['planned'] as $item)$planned_menu[]=$item[0];}
foreach(mrseo_ua_menu_industries() as $group){foreach($group['items'] as $item)$planned_menu[]=$item[0];}
assert_seo(count($planned_menu)===39&&count(array_unique($planned_menu))===39,'UA planned menu coverage');
foreach($planned_menu as $slug)assert_seo(!in_array($slug,$menu_slugs,true)&&!in_array($slug,array('horoshop-integrations','horoshop-automation','horoshop-migration'),true),'Invalid planned menu scope '.$slug);
foreach(mrseo_ua_retired_services() as $slug=>$target){
 $_SERVER['REQUEST_URI']='/'.$slug.'/?utm_source=qa';
 assert_seo(mrseo_i18n_current_entry()===null&&mrseo_ua_retired_request()===$target,'Retired UA URL still active '.$slug);
 assert_seo(isset($seen[mrseo_i18n_exact_url('uk',$target)])&&!isset($seen[mrseo_i18n_exact_url('uk',$slug)]),'Retirement target/source incorrect '.$slug);
}
// Verify the actual current compact menu, not the archived service taxonomy.
// Its 36 service URLs plus six editorial/legal pages must match the active UA inventory.
require_once $root.'/inc/ua-header-six.php';
$_SERVER['REQUEST_URI']='/';
$protected=array('','about','portfolio','contact','privacy','pricing');
foreach(mrseo_ua_menu_groups() as $group){
 if(!in_array($group['key'],array('seo','ads','horoshop','sites','dev'),true))continue;
 $protected[]=$group['parent'];
 foreach(mrseo_ua_visible_menu_sections($group['key']) as $section)foreach($section['items'] as $item){
  $protected[]=trim(parse_url($item['url'],PHP_URL_PATH),'/');
 }
}
$actual=array_column($ua_inventory,'slug');
sort($protected);sort($actual);
assert_seo(count($protected)===42&&$protected===$actual,'Active UA URLs differ from actual menu and protected editorial pages');
assert_seo(!array_intersect($protected,array_keys(mrseo_ua_retired_services())),'A menu or protected page was retired');
foreach(array('orbit-lab','orbit-light','premium-tech-preview') as $preview){
 $_SERVER['REQUEST_URI']='/'.$preview.'/';
 assert_seo(mrseo_ua_retired_preview()&&mrseo_i18n_current_entry()===null,'Public prototype '.$preview);
}
foreach(array('','ru','en','pl','de','fr','it','es','nl','ro','cs','pt','sv','da','fi','hu','sk','el','bg','hr') as $locale){
 $_SERVER['REQUEST_URI']=$locale?'/'.$locale.'/':'/';
 assert_seo(!mrseo_ua_retired_preview()&&mrseo_i18n_current_entry()!==null,'Homepage blocked '.$locale);
}
echo "UA menu protection PASS: 36 service URLs, 6 editorial/legal pages, 34 retired services, 3 retired prototypes, all 20 homepages.\n";
echo "International SEO PASS: " . count($inventory) . " real canonical URLs, " .
    count($groups) . " equivalence groups, full reciprocal hreflang, matched menus and identical XML inventory.\n";
