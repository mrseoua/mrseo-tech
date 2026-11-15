# MrSeo.tech — Ukrainian service architecture, next expansion

Status: **architecture proposal, not implemented**. Owner requested separate landing pages for remaining offers and a rebuilt structure (15 Nov 2026). Base deployed main: 10a92bdbbffad0bf48c27bbbba01515faae0ac5b. Existing 50 canonical UA routes (45 commercial, home/about/portfolio/contact/privacy) and all 20 locales retained. Current postdeploy SEO and responsive checks passed. No production changes or merge approved by this structure request.

## Navigation and URL principles
- 7 service/industry groups + one-time tasks hub. Preserve existing five-pillar/home Earth composition; adapt shared UA navigation only in a future implementation PR. Do not list all 86 commercial/hub routes in a single mega menu. Use compact group navigation, contextual service cards, related links and breadcrumb hierarchy. Existing URLs remain flat canonical paths; taxonomy is navigation, not URL relocation. Existing group parent landing pages remain useful commercial offers, not empty link directories.
- New Ukrainian routes only until genuine market-specific translations exist. No invented locale equivalents, hreflang or office addresses. Horoshop remains UA/RU only. Preserve noindex/nofollow and existing prices/forms; no indexing or sitemap submission.
- Every distinct service must have different search intent, problem, deliverable, copy, CTA context and thematic animation, not a template with substituted words. Title/Description unique, two thematic emoji in Description, H1 problem-first. All technical tasks include explicit scoped output, test/verification and limitations. No fabricated cases, results, prices or guarantees.
- A = highest-priority distinct offer; B = standalone small task with implementation scope; C = conditional candidate, confirm competence and actual SERP separation before creation. No tiny keyword variants alone warrant a URL. Sitemap and robots share one crawl configuration offer; GA4 purchases, events, duplication share existing GA4 page; PMax audit, remarketing, price monitor, consent, catalog sync already have separate pages. Additional microtask pages connect to existing parent and do not cannibalize it.

## Complete proposed inventory
### SEO (19)
Existing (10): /seo/, /local-seo/, /ecommerce-seo/, /service-business-seo/, /international-seo/, /seo-audit/, /website-audit/, /traffic-recovery/, /semantic-core/, /seo-content/.

| Stage | New route | UA service | Primary query candidate | Scope / separation |
|---|---|---|---|---|
| A | /indexing-fixes/ | Виправлення проблем індексації | індексація сайту | Implementation of indexing fixes vs audit report; 140/mo mixed intent. |
| A | /competitor-seo-analysis/ | SEO-аналіз конкурентів | seo аналіз конкурентів | Competitive research and actionable gap report, not semantic core. Broad аналіз конкурентів 170/mo; exact service not measured. |
| B | /search-console-setup/ | Налаштування Google Search Console | налаштування google search console | Verification, property, reports, access and test. Brand navigation not target. |
| B | /crawl-configuration/ | Налаштування Sitemap.xml та robots.txt | налаштування sitemap robots txt | One crawl/index configuration offer; sitemap and robots separate tasks in same page. Preserve noindex. |
| B | /seo-redirects/ | Налаштування 301-редиректів | налаштування 301 редіректів | Mapping, loops, chains, HTTP verification; not full migration. |
| B | /structured-data/ | Впровадження мікророзмітки Schema.org | мікророзмітка сайту | Accurate supported schema and validation; 20/mo. No rich result guarantee. |
| B | /metadata-optimization/ | Оптимізація Title та Description | оптимізація метатегів | Existing metadata-only/bulk workflow distinct from copywriting; maintain natural copy. |
| B | /internal-linking/ | Внутрішня перелінковка сайту | внутрішня перелінковка | Navigation, orphan pages and anchor map; 10/mo. |
| C | /ai-search-optimization/ | GEO та видимість в AI-пошуку | geo seo | 90/mo; AI SEO 140, generative engine optimization 90; pilot only, no guaranteed citations or special Google ranking technique. |

### Google Ads (13)
Existing (8): /google-ads/, /performance-max/, /google-shopping/, /merchant-center/, /local-google-ads/, /google-ads-audit/, /google-search-ads/, /google-remarketing/.

| Stage | New route | UA service | Primary query candidate | Scope / separation |
|---|---|---|---|---|
| A | /google-ads-automation/ | Автоматизація Google Ads | автоматизація google ads | API/BigQuery, SKU economics, alerts, approval controls. API query 140/mo largely technical. |
| A | /product-feed-optimization/ | Створення та оптимізація товарних фідів | оптимізація товарного фіда | Feed format, item ids, titles, price/stock diagnostics; distinct from account suspension and catalog sync. |
| B | /merchant-center-recovery/ | Виправлення блокувань Merchant Center | розблокування merchant center | Existing account restriction review, evidence and permitted appeal; no bypass or guaranteed reinstatement. Parent Merchant Center retains setup. |
| C | /youtube-ads/ | Реклама на YouTube | реклама youtube | 40/mo, alternative реклама на ютубі 30/mo; only supported campaign/creative scope. |
| C | /display-ads/ | Медійна реклама Google | медійна реклама | 50/mo. Display targeting, creative requirements, conversion checks; separate from remarketing. |

### Аналітика (11)
Existing (5): /analytics/, /ga4-conversions/, /business-dashboards/, /reporting-automation/, /consent-mode/.

| Stage | New route | UA service | Primary query candidate | Scope / separation |
|---|---|---|---|---|
| B | /google-tag-manager-setup/ | Налаштування Google Tag Manager | налаштування google tag manager | Container installation, tags/triggers and tests, distinct from GA4 purchase measurement. |
| B | /enhanced-conversions/ | Налаштування розширених конверсій Google Ads | enhanced conversions | 20/mo, consent-aware first-party data, validated configuration. |
| A | /offline-conversions/ | Імпорт офлайн-конверсій у Google Ads | імпорт офлайн конверсій | CRM qualification/purchases, click identifiers or supported data matching, validation. |
| C | /call-tracking/ | Налаштування колтрекінгу | колтрекінг | 50/mo, provider integration and call measurement, only after provider/support readiness. |
| C | /server-side-tracking/ | Серверне відстеження конверсій | server side tracking | 20/mo, scoped server-side deployment, test and hosting cost; no privacy bypass. |
| B | /google-sheets-automation/ | Автоматизація Google Таблиць | автоматизація google sheets | Apps Script and operational sheets, separate from scheduled reporting. Confirm data-source permissions. |

### Інтернет-магазини та Хорошоп (13)
Existing (6): /online-store-development/, /catalog-automation/, /store-conversion/, /store-migration/, /competitor-price-monitoring/, /horoshop/.

| Stage | New route | UA service | Primary query candidate | Scope / separation |
|---|---|---|---|---|
| A | /horoshop-seo/ | SEO-просування магазину на Хорошоп | seo хорошоп | Platform-specific SEO categories, filters, metadata and technical limitations; parent retains store creation. |
| A | /horoshop-integrations/ | Інтеграції Хорошоп | інтеграції хорошоп | Platform capabilities and API access; Хорошоп API 50/mo technical intent. No claim all plans support API. |
| B | /horoshop-setup/ | Налаштування магазину на Хорошоп | налаштування хорошоп | Configuration of existing store (domain, payment, delivery, basic settings), not new-store creation. |
| C | /horoshop-product-feeds/ | Товарні фіди Хорошоп | товарний фід хорошоп | Platform-specific feed configuration; only separate from general product-feed page if actual distinct platform workflow/intent. |
| B | /category-seo/ | SEO-оптимізація категорій інтернет-магазину | оптимізація категорій сайту | Category intent, filters, headings, copy and links; existing ecommerce SEO retains ongoing strategy. |
| B | /product-page-seo/ | SEO-оптимізація карток товарів | оптимізація карток товарів | Bulk product titles/content, attributes, indexability and useful schema; not full-store SEO. |
| B | /product-import/ | Імпорт та завантаження товарів | імпорт товарів на сайт | One-time import, mapping and validation; catalog automation remains recurring supplier synchronization. |

### Створення сайтів (12)
Existing (8): /service-websites/, /local-business-websites/, /landing-pages/, /corporate-websites/, /website-redesign/, /website-maintenance/, /website-speed-security/, /wordpress-development/.

| Stage | New route | UA service | Primary query candidate | Scope / separation |
|---|---|---|---|---|
| A | /website-migration/ | Перенесення сайту на інший хостинг або домен | перенесення сайту на інший хостинг | Standard websites, backup/DNS/SSL/redirects and verification; distinct from store data migration. |
| B | /wordpress-plugin-development/ | Розробка та доопрацювання плагінів WordPress | розробка плагінів wordpress | Scoped plugin development and tests; not full WordPress website development. |
| B | /website-form-repair/ | Виправлення форм та надсилання заявок | виправлення форми сайту | Test form, mail delivery, validation; narrower than ongoing maintenance. |
| C | /wordpress-speed-optimization/ | Прискорення сайту на WordPress | прискорення wordpress | Platform-specific caching, images, plugins and measured speed; split only with distinct intent from general speed/security. |

### Веброзробка (13)
Existing (8): /web-development/, /web-applications/, /api-integrations/, /custom-functionality/, /business-automation/, /crm-development/, /ai-agents/, /chatbot-development/.

| Stage | New route | UA service | Primary query candidate | Scope / separation |
|---|---|---|---|---|
| A | /data-parsing/ | Парсинг сайтів та даних | парсинг сайтів | 40/mo, парсинг даних 30; permitted extraction, mapping and validation, distinct from price monitoring. |
| B | /payment-integration/ | Підключення платіжних систем | підключення оплати на сайт | Supported providers and platform integration, sandbox and real checkout validation; no handling of raw card data. |
| B | /shipping-integration/ | Інтеграція служб доставки | інтеграція нової пошти | Supported delivery APIs, address/branch selection, shipping labels/statuses. |
| B | /website-calculator/ | Розробка онлайн-калькулятора для сайту | калькулятор для сайту | Business calculation rules, inputs and tested outputs; custom functionality parent remains broader. |
| B | /crm-integration/ | Інтеграція сайту та CRM | інтеграція crm з сайтом | Existing CRM connections, mapping and deduplication vs CRM development/implementation. |

### Рішення для бізнесу (4)
Existing (0): none.

| Stage | New route | UA service | Primary query candidate | Scope / separation |
|---|---|---|---|---|
| A | /medical-marketing/ | SEO та реклама для клінік | просування медичних сайтів | 50/mo; medical practice websites and local discovery, privacy-sensitive data and ad policies; no fabricated outcomes. |
| C | /dental-marketing/ | Просування та реклама стоматології | просування стоматології | 50/mo, реклама стоматології 50; dental-specific services and booking; require distinct offer from medical hub. |
| A | /automotive-marketing/ | Маркетинг для автобізнесу | просування автосервісу | 40/mo; user experience in auto goods catalog and service marketing; separate store and service scenarios. |
| C | /fashion-ecommerce/ | Просування магазинів одягу, взуття та аксесуарів | seo для fashion магазинів | Relevant experience in bags/fashion; exact demand not confirmed. Unique category, filters and product-ad content. |

### Разові послуги (1)
Existing (0): none.

| Stage | New route | UA service | Primary query candidate | Scope / separation |
|---|---|---|---|---|
| A | /one-time-services/ | Разові послуги та технічні роботи | разові seo та технічні послуги | Browsable task hub with direct links to actual offers; not duplicate copy or arbitrary prices. |

## Totals and rollout
- 45 existing commercial + 41 proposed routes = 86 commercial/industry/task hub URLs; plus 5 brand/legal routes = 91 UA URLs; 709 total canonical URLs if all 41 added UA-only (668 current + 41). Stage A 12, B 20, C 9. Conditional C pages are target architecture, not approved delivery capability or demand. Do not publish unsupported offers.
- Prioritize scope and actual query intent, then new semantic map, metadata, menu, parent links, distinct SVG scenes, existing renderer and lead form, exact UA-only routes, sitemap and all-locale regression tests. Browser test 360/390/1440, menu overflow, interaction, noindex, unique titles and description, canonical, related links and real language-switch fallback. Revalidate Serpstat SERP overlap and Keyword Planner where available; prior API rate limit means not all exact query SERPs checked. Volume estimates are not customers. Keep privacy and ad restrictions; for GEO follow established SEO, no guarantee of AI citations.
- Not separate planned pages: linkbuilding/crowd marketing, Meta/TikTok, logo design/native app development, WooCommerce standalone builds, broad B2B/legal verticals until actual delivery and demand confirmed. No separate city pages without genuine local value. Pricing terms stay in existing service pages/FAQ, no fabricated prices. Generic Google Business Profile setup remains local SEO, existing service content must explicitly surface this one-off offer; if evidence later supports distinct page, evaluate separately.

## Menu approach
Top level existing 'Послуги' opens 6 compact service groups; 'Рішення для бізнесу' and 'Разові послуги' available as separate paths within menu without altering the homepage Earth. Analytics gets an explicit group rather than hidden under Ads. Horoshop is a nested specialty within stores, with cross-links from SEO/Ads/Dev. On mobile use accordion group navigation with real links, no deep hover dependency. Use existing routes as parent hubs; one-time catalog contains searchable/filterable task tiles and actual links. No duplicate text or mass-generated city pages.
