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
EXPECTED_PAGES = 336
NS = {"s": "http://www.sitemaps.org/schemas/sitemap/0.9",
      "x": "http://www.w3.org/1999/xhtml"}
USER_AGENT = "MrSeoInternationalPrelaunchAudit/1.0"
SAMPLE = [
    "/", "/ru/", "/en/", "/pl/", "/de/",
    "/seo/", "/ru/seo/", "/en/seo/", "/pl/seo/", "/de/seo/",
    "/en/website-design/", "/pl/tworzenie-stron-internetowych/",
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
UK_ONLY = {"woocommerce-shopify-stores"}
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
        if slug == "google-ads-audit":
            expected["pl-PL"] = HOST + "/pl/audyt-google-ads/"
            if sitemap.get(HOST + "/en/google-ads-audit/") != expected:
                fail("UK Ads audit not reciprocal with UA/RU/PL")
            if sitemap.get(HOST + "/pl/audyt-google-ads/") != expected:
                fail("PL Ads audit not reciprocal with UA/RU/UK")
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
        if slug in UK_ONLY:
            if sitemap.get(uk_url) != {"en-GB": uk_url}:
                fail(f"Invented alternate for UK-only page: {slug}")
        elif slug in UK_MICRO:
            pairs = {"uk-UA": HOST + "/" + slug + "/",
                     "ru": HOST + "/ru/" + slug + "/",
                     "en-GB": uk_url}
            if any(sitemap.get(href) != pairs for href in pairs.values()):
                fail(f"{slug}: genuine UK/UA/RU service alternates are not reciprocal")
        else:
            expected = {"uk-UA": HOST + "/" + slug + "/",
                        "ru": HOST + "/ru/" + slug + "/",
                        "en-GB": uk_url}
            if sitemap.get(uk_url) != expected:
                fail(f"Unpaired real UK service: {slug}")


    # Cross-check published XML for self, reciprocal tags and no invented URLs.
    for loc, alts in sitemap.items():
        if loc not in alts.values():
            fail(f"Missing self-referencing hreflang for {loc}")
        for code, href in alts.items():
            if href not in sitemap:
                fail(f"Alternate URL absent from sitemap: {loc} {code} {href}")
            if sitemap[href] != alts:
                fail(f"Non-reciprocal hreflang: {loc} -> {href}")

    # HEAD checks provide full routing coverage without downloading 336 full HTML pages.
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
