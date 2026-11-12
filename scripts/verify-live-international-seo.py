#!/usr/bin/env python3
"""Read-only production HTTP audit for the pre-indexing international site.

Runs AFTER WordPress theme deployment on GitHub Actions. Does not modify pages,
send forms, submit sitemaps, change robots or remove noindex.
"""
import concurrent.futures
import html
from html.parser import HTMLParser
from urllib.request import Request, urlopen
from urllib.error import HTTPError, URLError
import xml.etree.ElementTree as ET

HOST = "https://mrseo.tech"
SITEMAP = HOST + "/mrseo-locales-sitemap.xml"
EXPECTED_PAGES = 524
NS = {"s": "http://www.sitemaps.org/schemas/sitemap/0.9",
      "x": "http://www.w3.org/1999/xhtml"}
USER_AGENT = "MrSeoInternationalPrelaunchAudit/1.0"
SAMPLE = [
    "/", "/ru/", "/en/", "/pl/", "/de/",
    "/seo/", "/ru/seo/", "/en/seo/", "/pl/seo/", "/de/seo/",
    "/en/website-design/", "/pl/tworzenie-stron-internetowych/",
    "/pl/local-seo/", "/pl/landing-pages/", "/pl/international-seo/",
    "/pl/sklepy-woocommerce-shopify/", "/pl/web-applications/",
    "/de/local-seo/", "/de/website-design/", "/de/google-shopping/",
    "/de/online-shop-development/", "/de/web-applications/",
    "/de/woocommerce-shopify-stores/", "/de/merchant-center-help/",
    "/fr/local-seo/", "/fr/woocommerce-shopify-stores/", "/fr/web-applications/",
    "/it/local-seo/", "/it/google-shopping/", "/it/woocommerce-shopify-stores/",
    "/it/api-integrations/", "/it/web-applications/",
    "/es/local-seo/", "/es/google-shopping/", "/es/woocommerce-shopify-stores/",
    "/es/api-integrations/", "/es/web-applications/",
    "/nl/local-seo/", "/nl/google-shopping/", "/nl/woocommerce-shopify-stores/",
    "/nl/api-integrations/", "/nl/web-applications/",
    "/ro/local-seo/", "/ro/google-shopping/", "/ro/woocommerce-shopify-stores/",
    "/ro/api-integrations/", "/ro/web-applications/",
    "/cs/local-seo/", "/cs/google-shopping/", "/cs/woocommerce-shopify-stores/",
    "/cs/api-integrations/", "/cs/web-applications/",
    "/pt/local-seo/", "/pt/google-shopping/", "/pt/woocommerce-shopify-stores/",
    "/pt/api-integrations/", "/pt/web-applications/",
    "/sv/local-seo/", "/sv/google-shopping/", "/sv/woocommerce-shopify-stores/",
    "/sv/api-integrations/", "/sv/web-applications/",
    "/en/google-shopping/", "/pl/google-shopping/", "/google-shopping/",
    "/ru/google-shopping/", "/pl/problemy-merchant-center/",
    "/en/merchant-center-help/", "/ru/merchant-center/",
    "/en/wordpress-care/", "/pl/opieka-wordpress/",
    "/online-store-development/", "/pl/tworzenie-sklepow-internetowych/",
    "/en/online-shop-development/",
    "/fr/", "/it/", "/es/", "/nl/", "/ro/", "/cs/",
    "/fr/seo/", "/it/google-ads/", "/es/web-development/",
    "/nl/contact/", "/ro/privacy/", "/cs/seo/",
    "/fr/seo-audit/", "/it/ecommerce-seo/", "/es/analytics/", "/nl/website-design/",
    "/ro/online-shop-development/", "/cs/about/", "/fr/portfolio/",
    "/pt/", "/pt/seo-audit/", "/pt/contact/",
    "/sv/", "/sv/seo-audit/", "/sv/contact/",
    "/da/", "/da/seo-audit/", "/da/contact/",
    "/fi/", "/fi/seo-audit/", "/fi/contact/",
    "/hu/", "/hu/seo-audit/", "/hu/contact/",
    "/sk/", "/sk/seo-audit/", "/sk/contact/",
    "/el/", "/el/seo-audit/", "/el/contact/",
    "/bg/", "/bg/seo-audit/", "/bg/contact/",
    "/hr/", "/hr/seo-audit/", "/hr/contact/"
]
# Every approved Ukrainian service now has an actual Russian counterpart.
PAIRED_RU_SLUGS = (
    "local-business-websites", "landing-pages", "corporate-websites", "website-redesign",
    "local-seo", "service-business-seo", "international-seo", "local-google-ads",
    "google-ads-audit", "store-conversion", "store-migration",
    "website-maintenance", "website-speed-security",
)
UK_NEW_SLUGS = (
    "local-business-websites", "landing-pages", "corporate-websites", "website-redesign",
    "local-seo", "service-business-seo", "international-seo", "local-google-ads",
    "store-conversion", "store-migration", "website-speed-security",
    "woocommerce-shopify-stores", "catalog-automation", "api-integrations",
    "web-applications", "ga4-conversions",
)
# Only genuine original Polish landing pages join their UA/RU/UK equivalents.
PL_MATCHED = {
    "landing-pages", "corporate-websites", "website-redesign",
    "local-seo", "service-business-seo", "international-seo", "local-google-ads",
    "store-conversion", "store-migration", "website-speed-security",
    "catalog-automation", "api-integrations", "web-applications",
}
UK_PLATFORM = {"woocommerce-shopify-stores": "sklepy-woocommerce-shopify"}
DE_MATCHED = {
    "landing-pages", "corporate-websites", "website-redesign",
    "local-seo", "service-business-seo", "international-seo",
    "local-google-ads", "google-ads-audit", "store-conversion",
    "store-migration", "website-speed-security",
    "catalog-automation", "api-integrations", "web-applications",
}
FR_MATCHED = {
    'local-seo',
    'service-business-seo',
    'international-seo',
    'local-google-ads',
    'google-ads-audit',
    'store-conversion',
    'store-migration',
    'landing-pages',
    'corporate-websites',
    'website-redesign',
    'website-speed-security',
    'catalog-automation',
    'api-integrations',
    'web-applications',
}
FR_ALL_NEW = {
    'local-seo',
    'service-business-seo',
    'international-seo',
    'google-shopping',
    'local-google-ads',
    'google-ads-audit',
    'merchant-center-help',
    'woocommerce-shopify-stores',
    'store-conversion',
    'catalog-automation',
    'store-migration',
    'service-websites',
    'landing-pages',
    'corporate-websites',
    'website-redesign',
    'wordpress-care',
    'api-integrations',
    'website-speed-security',
    'web-applications',
}
IT_MATCHED = {
    'local-seo',
    'service-business-seo',
    'international-seo',
    'local-google-ads',
    'google-ads-audit',
    'store-conversion',
    'store-migration',
    'landing-pages',
    'corporate-websites',
    'website-redesign',
    'website-speed-security',
    'catalog-automation',
    'api-integrations',
    'web-applications',
}
IT_ALL_NEW = {
    'local-seo',
    'service-business-seo',
    'international-seo',
    'google-shopping',
    'local-google-ads',
    'google-ads-audit',
    'merchant-center-help',
    'woocommerce-shopify-stores',
    'store-conversion',
    'catalog-automation',
    'store-migration',
    'service-websites',
    'landing-pages',
    'corporate-websites',
    'website-redesign',
    'wordpress-care',
    'api-integrations',
    'website-speed-security',
    'web-applications',
}
ES_MATCHED = {
    'local-seo',
    'service-business-seo',
    'international-seo',
    'local-google-ads',
    'google-ads-audit',
    'store-conversion',
    'store-migration',
    'landing-pages',
    'corporate-websites',
    'website-redesign',
    'website-speed-security',
    'catalog-automation',
    'api-integrations',
    'web-applications',
}
ES_ALL_NEW = {
    'local-seo',
    'service-business-seo',
    'international-seo',
    'google-shopping',
    'local-google-ads',
    'google-ads-audit',
    'merchant-center-help',
    'woocommerce-shopify-stores',
    'store-conversion',
    'catalog-automation',
    'store-migration',
    'service-websites',
    'landing-pages',
    'corporate-websites',
    'website-redesign',
    'wordpress-care',
    'api-integrations',
    'website-speed-security',
    'web-applications',
}
NL_MATCHED = set(ES_MATCHED)
NL_ALL_NEW = set(ES_ALL_NEW)
RO_MATCHED = set(NL_MATCHED)
RO_ALL_NEW = set(NL_ALL_NEW)
CS_MATCHED = set(RO_MATCHED)
CS_ALL_NEW = set(RO_ALL_NEW)
PT_MATCHED = set(CS_MATCHED)
PT_ALL_NEW = set(CS_ALL_NEW)
SV_MATCHED = set(PT_MATCHED)
SV_ALL_NEW = set(PT_ALL_NEW)
DE_ALL_NEW = {
    "local-seo", "service-business-seo", "international-seo",
    "google-shopping", "local-google-ads", "google-ads-audit",
    "merchant-center-help", "online-shop-development", "woocommerce-shopify-stores",
    "store-conversion", "catalog-automation", "store-migration",
    "website-design", "service-websites", "landing-pages",
    "corporate-websites", "website-redesign", "wordpress-care",
    "api-integrations", "website-speed-security", "web-applications",
}
UK_MICRO = {"ga4-conversions", "catalog-automation",
            "api-integrations", "web-applications"}
SAMPLE.extend("/en/" + slug + "/" for slug in UK_NEW_SLUGS)
SAMPLE.extend("/" + slug + "/" for slug in PAIRED_RU_SLUGS)
SAMPLE.extend("/ru/" + slug + "/" for slug in PAIRED_RU_SLUGS)

def assert_paired_ru_pages(sitemap):
    for slug in PAIRED_RU_SLUGS:
        ua = HOST + "/" + slug + "/"
        ru = HOST + "/ru/" + slug + "/"
        expected = {"uk-UA": ua, "ru": ru}
        if slug in UK_NEW_SLUGS or slug == "google-ads-audit":
            expected["en-GB"] = HOST + "/en/" + slug + "/"
        if slug in PL_MATCHED:
            expected["pl-PL"] = HOST + "/pl/" + slug + "/"
        if slug == "google-ads-audit":
            expected["pl-PL"] = HOST + "/pl/audyt-google-ads/"
        if slug in DE_MATCHED:
            expected["de-DE"] = HOST + "/de/" + slug + "/"
        if slug in FR_MATCHED:
            expected["fr-FR"] = HOST + "/fr/" + slug + "/"
        if slug in IT_MATCHED:
            expected["it-IT"] = HOST + "/it/" + slug + "/"
        if slug in ES_MATCHED:
            expected["es-ES"] = HOST + "/es/" + slug + "/"
        if slug in NL_MATCHED:
            expected["nl-NL"] = HOST + "/nl/" + slug + "/"
        if slug in RO_MATCHED:
            expected["ro-RO"] = HOST + "/ro/" + slug + "/"
        if slug in CS_MATCHED:
            expected["cs-CZ"] = HOST + "/cs/" + slug + "/"
        if slug in PT_MATCHED:
            expected["pt-PT"] = HOST + "/pt/" + slug + "/"
        if slug in SV_MATCHED:
            expected["sv-SE"] = HOST + "/sv/" + slug + "/"
        if slug == "google-ads-audit":
            if sitemap.get(HOST + "/en/google-ads-audit/") != expected:
                fail("UK Ads audit not reciprocal with UA/RU/PL/DE")
            if sitemap.get(HOST + "/pl/audyt-google-ads/") != expected:
                fail("PL Ads audit not reciprocal with UA/RU/UK/DE")
        if sitemap.get(ua) != expected or sitemap.get(ru) != expected:
            fail(f"RU/UA real hreflang counterpart missing or invented: {slug}")

def fetch(url, method="GET", timeout=16):
    req = Request(url, method=method,
                  headers={"User-Agent": USER_AGENT, "Accept": "text/html,application/xml;q=0.9,*/*;q=0.8"})
    with urlopen(req, timeout=timeout) as resp:
        body = resp.read() if method == "GET" else b""
        return resp.status, resp.geturl(), dict(resp.headers.items()), body

class HeadParser(HTMLParser):
    def __init__(self):
        super().__init__()
        self.in_head = False
        self.links = []
        self.robots = []
    def handle_starttag(self, tag, attrs):
        a = dict(attrs)
        if tag == "head":
            self.in_head = True
        if not self.in_head:
            return
        if tag == "link":
            self.links.append(a)
        if tag == "meta" and a.get("name", "").lower() == "robots":
            self.robots.append(a.get("content", ""))
    def handle_endtag(self, tag):
        if tag == "head":
            self.in_head = False

def fail(message):
    raise AssertionError(message)

def check_head(url):
    status, target, headers, body = fetch(url)
    if status != 200 or target != url:
        fail(f"GET response not canonical: {url} returned {status}, {target}")
    parser = HeadParser()
    parser.feed(body.decode("utf-8", errors="replace"))
    canonicals = [a.get("href") for a in parser.links if a.get("rel", "").lower() == "canonical"]
    if canonicals != [url]:
        fail(f"Canonical mismatch/duplication on {url}: {canonicals}")
    alternates = {}
    for a in parser.links:
        if a.get("rel", "").lower() == "alternate" and a.get("hreflang"):
            code = a["hreflang"]
            if code in alternates:
                fail(f"Duplicated hreflang {code} on {url}")
            alternates[code] = a.get("href")
    if alternates != sitemap[url]:
        fail(f"HTML vs sitemap hreflang mismatch on {url}: {alternates}, expected {sitemap[url]}")
    headers_lower = {k.lower():v.lower() for k,v in headers.items()}
    # Staging must remain noindex until explicitly approved.
    robots_header = headers_lower.get("x-robots-tag", "")
    if "noindex" not in robots_header and not any("noindex" in x.lower() for x in parser.robots):
        fail(f"Staging noindex missing on {url}")
    return url

def check_head_request(url):
    status, target, headers, _ = fetch(url, method="HEAD")
    if status != 200 or target != url:
        fail(f"HEAD response bad: {url}: {status} -> {target}")
    return url

if __name__ == "__main__":
    # Indexing must not be defeated by a blanket robots.txt disallow.
    robots_status, robots_target, _, robots_bytes = fetch(HOST + "/robots.txt")
    if robots_status != 200:
        fail(f"robots.txt did not return 200: {robots_status}")
    robots_text = robots_bytes.decode("utf-8", "replace")
    if any(line.strip().lower() == "disallow: /"
           for line in robots_text.splitlines()):
        fail("robots.txt contains a full-site Disallow: /")
    status, target, headers, body = fetch(SITEMAP)
    if status != 200 or target != SITEMAP:
        fail(f"Sitemap inaccessible: {status} {target}")
    root = ET.fromstring(body)
    sitemap = {}
    for node in root.findall("s:url", NS):
        loc_node = node.find("s:loc", NS)
        if loc_node is None or not loc_node.text:
            fail("Sitemap URL has no <loc>")
        loc = loc_node.text.strip()
        if loc in sitemap:
            fail(f"Duplicate loc {loc}")
        if not loc.startswith(HOST + "/"):
            fail(f"External/unexpected canonical {loc}")
        alts = {}
        for item in node.findall("x:link", NS):
            code = item.attrib.get("hreflang")
            href = item.attrib.get("href")
            if not code or not href or code in alts:
                fail(f"Invalid/duplicate alternate on {loc}")
            alts[code] = href
        if not alts:
            fail(f"Missing hreflang on {loc}")
        sitemap[loc] = alts
    if len(sitemap) != EXPECTED_PAGES:
        fail(f"Sitemap has {len(sitemap)} URLs; expected {EXPECTED_PAGES}")

    assert_paired_ru_pages(sitemap)
    for slug in UK_NEW_SLUGS:
        uk_url = HOST + "/en/" + slug + "/"
        if slug in UK_PLATFORM:
            expected = {"en-GB": uk_url,
                        "pl-PL": HOST + "/pl/" + UK_PLATFORM[slug] + "/",
                        "de-DE": HOST + "/de/woocommerce-shopify-stores/",
                        "fr-FR": HOST + "/fr/woocommerce-shopify-stores/",
                        "it-IT": HOST + "/it/woocommerce-shopify-stores/",
                        "es-ES": HOST + "/es/woocommerce-shopify-stores/",
                        "nl-NL": HOST + "/nl/woocommerce-shopify-stores/",
                        "ro-RO": HOST + "/ro/woocommerce-shopify-stores/",
                        "cs-CZ": HOST + "/cs/woocommerce-shopify-stores/",
                        "pt-PT": HOST + "/pt/woocommerce-shopify-stores/",
                        "sv-SE": HOST + "/sv/woocommerce-shopify-stores/"}
        elif slug in UK_MICRO:
            expected = {"uk-UA": HOST + "/" + slug + "/",
                        "ru": HOST + "/ru/" + slug + "/",
                        "en-GB": uk_url}
            if slug in PL_MATCHED:
                expected["pl-PL"] = HOST + "/pl/" + slug + "/"
            if slug in DE_MATCHED:
                expected["de-DE"] = HOST + "/de/" + slug + "/"
            if slug in FR_MATCHED:
                expected["fr-FR"] = HOST + "/fr/" + slug + "/"
            if slug in IT_MATCHED:
                expected["it-IT"] = HOST + "/it/" + slug + "/"
            if slug in ES_MATCHED:
                expected["es-ES"] = HOST + "/es/" + slug + "/"
            if slug in NL_MATCHED:
                expected["nl-NL"] = HOST + "/nl/" + slug + "/"
            if slug in RO_MATCHED:
                expected["ro-RO"] = HOST + "/ro/" + slug + "/"
            if slug in CS_MATCHED:
                expected["cs-CZ"] = HOST + "/cs/" + slug + "/"
            if slug in PT_MATCHED:
                expected["pt-PT"] = HOST + "/pt/" + slug + "/"
            if slug in SV_MATCHED:
                expected["sv-SE"] = HOST + "/sv/" + slug + "/"
        else:
            expected = {"uk-UA": HOST + "/" + slug + "/",
                        "ru": HOST + "/ru/" + slug + "/",
                        "en-GB": uk_url}
            if slug in PL_MATCHED:
                expected["pl-PL"] = HOST + "/pl/" + slug + "/"
            if slug in DE_MATCHED:
                expected["de-DE"] = HOST + "/de/" + slug + "/"
            if slug in FR_MATCHED:
                expected["fr-FR"] = HOST + "/fr/" + slug + "/"
            if slug in IT_MATCHED:
                expected["it-IT"] = HOST + "/it/" + slug + "/"
            if slug in ES_MATCHED:
                expected["es-ES"] = HOST + "/es/" + slug + "/"
            if slug in NL_MATCHED:
                expected["nl-NL"] = HOST + "/nl/" + slug + "/"
            if slug in RO_MATCHED:
                expected["ro-RO"] = HOST + "/ro/" + slug + "/"
            if slug in CS_MATCHED:
                expected["cs-CZ"] = HOST + "/cs/" + slug + "/"
            if slug in PT_MATCHED:
                expected["pt-PT"] = HOST + "/pt/" + slug + "/"
            if slug in SV_MATCHED:
                expected["sv-SE"] = HOST + "/sv/" + slug + "/"
        if any(sitemap.get(href) != expected for href in expected.values()):
            fail(f"Unpaired real international service: {slug}")


    # Standalone Poland-specific pages must be in the sitemap and must have
    # truthful self or reciprocally matched hreflang, never a fabricated translation.
    for slug in PL_MATCHED:
        url = HOST + "/pl/" + slug + "/"
        if url not in sitemap or sitemap[url].get("pl-PL") != url:
            fail(f"Missing real Polish canonical: {slug}")
    for slug in FR_ALL_NEW:
        url = HOST + "/fr/" + slug + "/"
        if url not in sitemap or sitemap[url].get("fr-FR") != url:
            fail(f"Missing French canonical: {slug}")
    for slug in IT_ALL_NEW:
        url = HOST + "/it/" + slug + "/"
        if url not in sitemap or sitemap[url].get("it-IT") != url:
            fail(f"Missing Italian canonical: {slug}")
    for slug in ES_ALL_NEW:
        url = HOST + "/es/" + slug + "/"
        if url not in sitemap or sitemap[url].get("es-ES") != url:
            fail(f"Missing Spanish canonical: {slug}")

    for slug in NL_ALL_NEW:
        url = HOST + "/nl/" + slug + "/"
        if url not in sitemap or sitemap[url].get("nl-NL") != url:
            fail(f"Missing Dutch canonical: {slug}")

    for slug in RO_ALL_NEW:
        url = HOST + "/ro/" + slug + "/"
        if url not in sitemap or sitemap[url].get("ro-RO") != url:
            fail(f"Missing Romanian canonical: {slug}")

    for slug in CS_ALL_NEW:
        url = HOST + "/cs/" + slug + "/"
        if url not in sitemap or sitemap[url].get("cs-CZ") != url:
            fail(f"Missing Czech canonical: {slug}")

    for slug in PT_ALL_NEW:
        url = HOST + "/pt/" + slug + "/"
        if url not in sitemap or sitemap[url].get("pt-PT") != url:
            fail(f"Missing Portuguese canonical: {slug}")

    for slug in SV_ALL_NEW:
        url = HOST + "/sv/" + slug + "/"
        if url not in sitemap or sitemap[url].get("sv-SE") != url:
            fail(f"Missing Swedish canonical: {slug}")

    # Completed Germany-specific service URLs must be real canonical pages.
    for slug in DE_ALL_NEW:
        url = HOST + "/de/" + slug + "/"
        if url not in sitemap or sitemap[url].get("de-DE") != url:
            fail(f"Missing real German canonical: {slug}")

    platform = HOST + "/pl/sklepy-woocommerce-shopify/"
    expected_platform = {"en-GB": HOST + "/en/woocommerce-shopify-stores/",
                         "pl-PL": platform,
                         "de-DE": HOST + "/de/woocommerce-shopify-stores/",
                         "fr-FR": HOST + "/fr/woocommerce-shopify-stores/",
                         "it-IT": HOST + "/it/woocommerce-shopify-stores/",
                         "es-ES": HOST + "/es/woocommerce-shopify-stores/",
                         "nl-NL": HOST + "/nl/woocommerce-shopify-stores/",
                        "ro-RO": HOST + "/ro/woocommerce-shopify-stores/",
                        "cs-CZ": HOST + "/cs/woocommerce-shopify-stores/",
                        "pt-PT": HOST + "/pt/woocommerce-shopify-stores/",
                        "sv-SE": HOST + "/sv/woocommerce-shopify-stores/"}
    if sitemap.get(platform) != expected_platform:
        fail("PL WooCommerce and Shopify route not reciprocally matched")

    # Cross-check published XML for self, reciprocal tags and no invented URLs.
    for loc, alts in sitemap.items():
        if loc not in alts.values():
            fail(f"Missing self-referencing hreflang for {loc}")
        for code, href in alts.items():
            if href not in sitemap:
                fail(f"Alternate URL absent from sitemap: {loc} {code} {href}")
            if sitemap[href] != alts:
                fail(f"Non-reciprocal hreflang: {loc} -> {href}")

    # HEAD checks provide full routing coverage without downloading 351 full HTML pages.
    problems = []
    with concurrent.futures.ThreadPoolExecutor(max_workers=4) as pool:
        futures = {pool.submit(check_head_request, url):url for url in sitemap}
        for future in concurrent.futures.as_completed(futures):
            try:
                future.result()
            except Exception as exc:
                problems.append(f"{futures[future]}: {exc}")
    if problems:
        fail(f"{len(problems)} URLs failed live HEAD checks:\n" + "\n".join(problems[:24]))

    # These routes are deliberately not available as translated public services.
    for path in ("/en/horoshop/", "/pl/horoshop/", "/de/horoshop/", "/en/not-a-real-service/",
                 "/fr/horoshop/", "/it/horoshop/", "/es/horoshop/", "/nl/horoshop/",
                 "/ro/horoshop/", "/cs/horoshop/", "/fr/not-a-real-service/",
    "/pt/horoshop/",
    "/sv/horoshop/",
    "/da/horoshop/",
    "/fi/horoshop/",
    "/hu/horoshop/",
    "/sk/horoshop/",
    "/el/horoshop/",
    "/bg/horoshop/",
    "/hr/horoshop/"):
        try:
            code, final, _, _ = fetch(HOST + path, method="HEAD")
            fail(f"Unavailable service unexpectedly returns HTTP {code}: {final}")
        except HTTPError as error:
            if error.code != 404:
                fail(f"Expected 404 for {path}, got {error.code}")

    for path in SAMPLE:
        url = HOST + path
        if url not in sitemap:
            fail(f"Sample URL missing from inventory: {url}")
        check_head(url)

    print(f"Live international SEO PASS: {len(sitemap)} actual HTTP 200 pages, "
          f"{len(SAMPLE)} HTML/canonical/hreflang checks, reciprocal XML sitemap, and staging noindex.")
