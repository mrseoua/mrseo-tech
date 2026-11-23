# Serpstat / Google Ukraine — 7 Ukrainian WebDev landing pages

Research date: 2026-11-23. Database: `g_ua`, both Ukrainian and Russian query forms. Volumes are Serpstat estimates for **individual exact phrases** per month, not summed market size or expected leads. Missing result means no measurable data for that exact phrase, **not zero demand**.

## Confirmed phrases

| Query | Serpstat volume/month | Landing relevance |
|---|---:|---|
| розробка мобільних додатків | 140 | Main mobile app page, good mixed commercial intent |
| разработка мобильных приложений | 70 | Russian-language demand in Google Ukraine; contextual variants only on UA page |
| розробка мобільних застосунків | 20 | Mobile apps, variant |
| створення мобільного додатку | 20 | Mobile apps, variant |
| заказать мобильное приложение | 10 | Mobile apps, transactional Russian variant |
| створення особистого кабінету | 170 | **Exclude as lead KPI**: top results are entrant/university portal tutorials |
| разработка личного кабинета | 10 | Client portals, plausible but ambiguous |
| синхронізація даних | 110 | Data syncing; generic, mostly informational |
| парсинг сайтів | 40 | Data parsing; SERP predominantly explanation/tutorial, small freelance presence |
| парсинг даних | 30 | Parsing related |
| парсинг сайтов на заказ | 10 | Parsing transactional long tail |
| разработка парсера | 10 | Parsing transactional long tail |
| синхронизация данных | 40 | Russian-language variant |
| платіжна система для сайту | 40 | Payment provider selection, not custom integration per se |
| прийом платежів на сайті | 30 | Payment integration context |
| оплата на сайті | 20 | Payment concept, ambiguous |
| интеграция платежных систем | 10 | Payment integration transactional |
| подключение оплаты на сайт | 10 | Payment integration transactional |
| створення дашбордів | 10 | Dashboards belongs to **existing** `business-dashboards` landing |

These requested phrases had no measurable entry in this Serpstat snapshot: `розробка особистого кабінету`, `інтеграція платіжних систем`, `розробка pwa`, `pwa розробка`, `корпоративний мобільний додаток`, `розробка додатку для інтернет магазину` (but `мобильное приложение для интернет магазина`=10).

## Search intent spot check

- `створення особистого кабінету` top 10: edbo.gov.ua, mon.gov.ua and other educational resources related to electronic applicant cabinets. **Do not** use the 170 volume as B2B client-portal demand.
- `розробка мобільних додатків` top 10: Artjoker, Brander, Develux, Wecode, Wezom and freelance listings. Strongest validated commercial service cluster in the seven pages.
- `парсинг сайтів` top 10: robotdreams, Promodo, Webpromo and tutorial resources, with freelance/commercial entries. Must target `парсинг сайтів на замовлення` and concrete catalog synchronization use cases, not falsely assume 40 leads.

## Semantic intent and approved mapping

1. `/client-portals/` — **Розробка особистого кабінету клієнта**: roles, order/document status, CRM data; informational applicant portals excluded.
2. `/data-parsing/` — **Парсинг сайтів і синхронізація даних**: supplier price files, catalog sync, update logs, allowed data sources.
3. `/payment-integration/` — **Інтеграція платіжних систем на сайт**: checkout, provider callbacks, status confirmation. Not a payment provider itself.
4. `/mobile-app-development/` — **Розробка мобільних застосунків для iOS та Android**: main commercial application development target. No fabricated cost or approval guarantee.
5. `/ecommerce-mobile-apps/` — **Мобільний застосунок для інтернет-магазину**: repeated purchases, catalog, basket and inventory sync. Do not duplicate full generic mobile apps copy.
6. `/corporate-mobile-apps/` — **Корпоративні мобільні застосунки для команди**: roles, tasks, offline work and secure sync, distinct B2B use case.
7. `/pwa-development/` — **Розробка PWA-застосунків для бізнесу**: installability, caching and limitations; avoid promising native parity.

All seven carry a unique H1, Title, Description, 3 contextual pain points, 3 actions, 3 FAQs, one scoped deliverable, original page-specific schematic art and real internal links. There are no fabricated results, testimonials, prices or performance claims.

## Release and SEO constraints

- Only Ukrainian pages; do not add fabricated `/ru/`, `/en/` and other hreflang equivalents. Other-language menu switches fall back to existing `/LANG/web-development/`.
- UA exact self-canonical on these seven routes; global robots `noindex,nofollow` remains enabled.
- Existing 54-route commercial SEO inventory and 20-locale hreflang registry **must remain unchanged**. The seven new pages are intentionally not yet inserted into the existing international XML sitemap inventory; **before permitting indexing**, explicitly extend and validate sitemap inventory as a separate owner-approved launch task. Do not silently change its fixed-count regression.
- No assumption that a GitHub PR merge deploys live WordPress. Test at 1440/390/360 in isolated WP and verify public hosting separately.
