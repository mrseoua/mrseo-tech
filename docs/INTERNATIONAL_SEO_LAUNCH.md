# MrSeo.tech — International SEO pre-indexing release checklist

**Status:** Staging only. The site must remain `noindex, nofollow` until an explicit public-launch approval.

## Countries and real URL routes

| Site | URL prefix | Google hreflang | Target |
| --- | --- | --- | --- |
| Ukrainian | `/` | `uk-UA` | Ukraine |
| Russian | `/ru/` | `ru` | Russian-language clients internationally |
| British English | `/en/` | `en-GB` | United Kingdom |
| Polish | `/pl/` | `pl-PL` | Poland |
| German | `/de/` | `de-DE` | Germany |

No USA or Canada regional pages currently exist. Do not advertise `en-US` or `en-CA` alternatives until real country-specific content and URLs are published.

## Implementation guarantees and tests

- `wp-content/themes/mrseo-tech/inc/international-seo.php` defines 28 explicit equivalence groups covering 94 real routes.
- Canonical and `hreflang` in HTML and the existing `/mrseo-locales-sitemap.xml` use the same registry. No translated URL is invented from a generic menu fallback.
- Every live registered page has one self-referencing canonical and reciprocal localized links. All alternates are fully-qualified `https://` URLs.
- `x-default` is limited to the language-selector homepage (`/`); it is not assigned to unrelated service pages.
- Ukrainian and Russian Horoshop pages are not represented as English, Polish or German translations.
- British/Polish website design, ecommerce creation, Google Ads audits, Merchant Center, Google Shopping and WordPress support have explicit correspondence only where the intent matches.
- Language switching uses a true equivalent if present; otherwise the site's separate navigation fallback may lead to a related parent service, **but must never enter an `hreflang` group**.
- Private `orbit-lab` and `orbit-light` concept URLs are excluded from the sitemap and keep permanent `noindex` after public launch.
- Run `php scripts/verify-international-seo.php` locally or through the Theme international QA action to test URL coverage, canonical, reciprocal markup, metadata duplication and menu paths without WordPress.
- The separate read-only **International SEO live pre-index audit** runs after a successful WordPress theme deployment. It checks the public sitemap, robots.txt, all 94 HTTP URL responses, 24 representative HTML headers, and unavailable translations.

## Manual readiness gates — do not launch until all pass

1. **DNS and HTTP**: Verify `https://mrseo.tech/` and all language prefixes resolve externally, return HTTP 200 and do not redirect to the wrong locale. Test on desktop, mobile and from outside the hosting network. Verify SSL, www/non-www and HTTP→HTTPS rules.
2. **HTML source**: Inspect at least the five homepages and important cross-market services. Confirm exactly one canonical pointing to itself; check `hreflang` reciprocity and no 404 alternate URLs. If an SEO plugin injects another canonical, remove the duplicate before launch.
3. **Googlebot access**: Inspect physical and virtual robots.txt, web-server security, WAF/CDN rules, login walls and IP restrictions. Do not block Googlebot from reading `noindex` while staging, and do not retain blanket `Disallow: /` on launch.
4. **Content and intent**: Validate native-language titles, H1, internal links, page content, contact details, company claims, portfolio permissions, and actual UK/PL/DE service capabilities. Never manufacture local offices or case results.
5. **Indexing switch**: Only after approval, remove the **global staging** WordPress `wp_robots` `noindex,nofollow` filter and the **global staging** `X-Robots-Tag` header from `functions.php`. Leave the separate private-concept guard intact. Also turn off **Settings → Reading → Discourage search engines from indexing this site** in WordPress if it is enabled. Check for additional meta/header restrictions from caching, plugins, CDN and hosting.
6. **Search Console**: Verify the domain property in Google Search Console with DNS and inspect all important language homepages. Submit `https://mrseo.tech/mrseo-locales-sitemap.xml` after `noindex` is removed. Check Google-selected canonical, page indexing, sitemap processing, and Performance segmented by country and page. Request indexing only for representative high-value URLs; Google decides crawl and index timing.
7. **Forms and conversions**: Manually send a safe test enquiry from every locale and verify email receipt and consent-respecting GA4/Google Ads events. Do not submit sensitive credentials through test forms.
8. **After launch**: Monitor Google Search Console for unexpected non-indexed pages, canonical selection, wrong regional results, soft 404s and redirects. Maintain unique editorial country offerings; `hreflang` helps localization but does not guarantee rankings.

## Rollback and evidence

- Feature changes are in GitHub and deployed using the repository's WordPress theme workflow.
- Do not remove staging `noindex` until an explicit separate launch request.
- If the live audit fails, inspect its GitHub Actions log; recheck the deployed commit, response headers, WordPress rewrites, and CDN cache. Roll back the deployment to the last known-good commit if a breaking production response is detected.
- A CI pass is not proof of a live Googlebot fetch or Google index inclusion. Google Search Console is authoritative for what Google actually crawled and indexed.

Official guidance:
- https://developers.google.com/search/docs/specialty/international/localized-versions
- https://developers.google.com/search/docs/specialty/international/managing-multi-regional-sites
- https://developers.google.com/search/docs/crawling-indexing/canonicalization
- https://developers.google.com/search/docs/crawling-indexing/block-indexing
