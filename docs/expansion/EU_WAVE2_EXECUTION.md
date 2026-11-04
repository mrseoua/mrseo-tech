# MrSeo.tech — European language wave 2 (editorial staging)

Date: **2026-11-04**. Status: **EDITORIAL BRIEFS ONLY, NOT WEBSITE PAGES**.
Do not merge unreviewed content into live routing, do not include these URLs in the sitemap, do not turn indexing on.

## Why this work exists

The site currently serves 11 languages: Ukrainian, Russian, English, Polish, German, French, Italian, Spanish, Dutch, Romanian and Czech. Among the 24 EU official languages, nine already exist. Source for the EU's official list: [European Union: Languages](https://european-union.europa.eu/principles-countries-history/languages_en).

This staged wave proposes nine additional EU official languages:

| Code | Market | Target hreflang | Market-specific research focus |
| --- | --- | --- | --- |
| `pt` | Portugal | `pt-PT` | e-commerce category SEO; purchase tracking and Shopping |
| `sv` | Sweden | `sv-SE` | webshop SEO; attribution; Shopify/WooCommerce compatibility |
| `da` | Denmark | `da-DK` | technical SEO, digital commerce, order/API integration |
| `fi` | Finland | `fi-FI` | e-commerce SEO, GA4 purchase tracking, API/data flow |
| `hu` | Hungary | `hu-HU` | webáruház SEO; measurement; investigate Shoprenter/UNAS only if applicable |
| `sk` | Slovakia | `sk-SK` | e-shop SEO/PPC; check Shoptet/Upgates only if relevant |
| `el` | Greece | `el-GR` | e-shop SEO; Shopping measurement; check Skroutz only if relevant |
| `bg` | Bulgaria | `bg-BG` | SEO for stores; feed consistency; check CloudCart/OpenCart if relevant |
| `hr` | Croatia | `hr-HR` | technical site audit, Google Ads conversion data, web development |

This would bring the total to **20 website languages** (18 of 24 EU official languages plus Ukrainian and Russian) once fully authored and published. It does not imply 20 native-speaking team members or local offices.

Six more EU official languages would remain for a subsequent editorial gate: Estonian (`et-EE`), Latvian (`lv-LV`), Lithuanian (`lt-LT`), Slovenian (`sl-SI`), Irish (`ga-IE`) and Maltese (`mt-MT`). Do not add duplicate English pages as `en-IE` or `en-MT` without genuine local adaptations. EU != Europe; Norway, Switzerland, Iceland, Serbia etc require a separate business/locale decision.

## What is already completed in this branch

`EU_WAVE2_LOCALIZATION_SEEDS.json` contains **117 separately titled commercial page briefs**: nine languages × thirteen established page types, native-language CTA drafts, market pain examples, terminology and possible technologies to investigate.

These are **not** full, approved translated pages. Meta descriptions are intentionally `null`, and `full_copy_reviewed` is `false`. Do not fabricate claims that 117 pages are authored, deployed or indexable.

## Exact page parity required for each locale

13 real routes per language, in the same pattern as existing six EU markets:

`/`, `/seo/`, `/seo-audit/`, `/ecommerce-seo/`, `/google-ads/`, `/analytics/`, `/web-development/`, `/website-design/`, `/online-shop-development/`, `/about/`, `/portfolio/`, `/contact/`, `/privacy/`

Do **not** create `/pt/horoshop/`, `/sv/horoshop/`, or any other Horoshop equivalent. Horoshop is available exclusively in UA/RU. Preserve existing real UK/PL marketing offers without inventing translations.

## Definition of completed localization — no shortcuts

Before changing PHP routing, homepage language switcher or XML sitemap for a locale:

1. Write and native-review **13 complete, market-relevant pages**: unique H1, opening proposition, business problem / diagnostic / scope / outcome, sensible FAQ, CTA and metadata. Prevent English fallback text posing as a native-language page.
2. Verify terms with country-specific SERPs and reliable keyword sources (volumes/KD/CPC currently unverified), distinguishing SEO/audit/ads/web development intents.
3. Reuse the verified genuine portfolio only; do not fabricate performance metrics, local client references, partner certifications or countries of residence.
4. Translate contact labels, validation errors, privacy notice, 11+ language navigation, and accessibility labels. State the team works remotely from Ukraine and arrange actual communication language case by case.
5. Expand PHP whitelist, rewrite rules, `mrseo_locale()`, `mrseo_slug()`, `mrseo_url()`, selector, form language allowlist, exact-match canonical/hreflang, sitemap and 404 coverage **atomically from a single committed locale**. When nine languages become real, the inventory target is `177 + 9*13 = 294` URLs. Don't set this target before complete pages exist.
6. QA PHP 8.4 lint, stage HTTP 200/404, 1440/390/360 responsive screenshots, fonts for Greek/Cyrillic, 3D Earth fallback, menu accessibility, form validation and verified email delivery.
7. Keep both global noindex layers, don't merge/publish before owner approval. Final indexation follows FOP registration, truthful identity and GDPR/privacy check.

## Technical improvement before another large language rollout

The current theme uses repeated hard-coded six-language lists in `inc/eu-content.php`, `inc/eu-routing.php`, `inc/i18n-routing.php`, `inc/international-seo.php`, `inc/language-dropdown.php` and the contact handler. Before adding nine more, consolidate the locale registry into one source to avoid missing `hreflang` on one page, a dead dropdown URL or an unlabelled submission. This refactor needs standalone regression tests and approval.

**Acquisition caution:** Thirty-page thin multilingual launches will not produce organic leads while `noindex` is on. Even after indexing, language presence alone doesn't prove intent alignment, native quality or a viable sales funnel. Prefer a complete, credible service page to mass placeholder URLs.
