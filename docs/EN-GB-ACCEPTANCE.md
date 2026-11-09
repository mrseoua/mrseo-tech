# MrSeo.tech — en-GB UK adaptation, owner-review checklist

Status: draft branch, not merged or published. UA design/content is the editorial reference; RU released to production on 9 November 2026.

## Confirmed scope
- Locale **en-GB** at **/en/**, not US English; retain all 20 locales, correct real equivalents, and site-wide noindex.
- Existing 13 original British commercial pages were preserved by URL and edited for client clarity. All use one concise hero → three challenges → three deliverables → FAQ → final enquiry sequence, removing repeated generic process, case study and related-strip panels. Shared full-stack, About, portfolio and contact remain on their existing routes.
- Sixteen additional original British pages exist in `inc/en-gb-services-part*.php`: local-business-websites, landing-pages, corporate-websites, website-redesign, local-seo, service-business-seo, international-seo, local-google-ads, store-conversion, store-migration, website-speed-security, woocommerce-shopify-stores, catalog-automation, api-integrations, web-applications, ga4-conversions.
- 25 UK menu items map to real existing or new individual destinations. UK commerce uses WooCommerce/Shopify instead of the UA/RU-only Horoshop offer.
- Distinct client intents: marketing reporting on `/en/analytics/` versus technical events on `/en/ga4-conversions/`; building service websites `/en/service-websites/` versus promoting an existing site `/en/service-business-seo/`; ongoing Ads `/en/google-ads/` versus a scoped audit `/en/google-ads-audit/`.
- The 16 new pages reuse the approved five-part UA visual template but with native UK copy throughout, 13 distinctive graphic presets and four UK platform/development variants. Existing pages get page-scoped premium motion and readable mobile text. Homepage Earth, UA/RU content and the other 17 locales' page content are unchanged.

## SEO rules and acceptance
- Expected inventory: **336 complete canonical URLs** / **46 equivalence groups**: 320 old + 16 original UK; 4 UK-only groups. A UK-only page has self-hreflang only, never invented equivalents. 11 newly completed UK service pages join existing UA/RU pairs, plus technical GA4 joins its existing microservice group. Existing UK Google Ads audit keeps its established UK/PL SEO group until a separately reviewed reconciliation.
- Do not create /en/horoshop/ or en-US URLs. No fake office address, client proof, guaranteed ROI or rankings, or made-up GBP prices. No indexing changes.
- Checks: `scripts/verify-en-gb-parity.py`, existing RU/UA tests, `scripts/verify-international-seo.php`, PHP lint, Node syntax check; isolated WordPress preview on 360, 390, 1440 and representative 1920 widths; live checks only after explicit merge/deploy approval.
- Manual acceptance: inspect UK text and mobile scenes (start/middle/end, not broken full-page screenshot); keyboard focus, reduced-motion; contacts and enquiry form delivery need test recipient before real launch.
- Risks: UK copy can still require native editorial sign-off, real-user conversion review, and testing form delivery. A green CI is not an expert design review.

## Rollout and rollback
- PR based on current main with UK-specific changes only. UK pilot PR #73 is superseded; do not merge it separately. Older #71 assumed 307 URLs, while the live site already has 320, so it must never be merged unchanged.
- No merge/deploy until owner explicitly authorises this UK adaptation. Revert one PR to roll back; staging noindex remains intact.
