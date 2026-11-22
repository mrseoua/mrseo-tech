# Google Ads — аудит восьми українських посадкових сторінок

Date: 2026-11-22. Repository mrseoua/mrseo-tech, main 60b3ece4990992ad73dd842820400d6f780abd81. Source-only verification until browser QA reports; rankings not measurable while noindex is on.

| Slug | Primary semantic intent | Outcome |
|---|---|---|
| google-ads | контекстна реклама google | Overview of setup/management, search/shopping/PMax/remarketing, visible real pricing, links to all 7 children |
| google-search-ads | пошукова реклама google | Search terms, negative keywords, conversion tracking |
| performance-max | налаштування performance max | Products/feed/attribution, margins and sales; distinct from Shopping |
| google-shopping | реклама в google shopping | Product campaign, merchant data and orders; distinct from PMax |
| local-google-ads | google ads для локального бізнесу | Geotargeting, local intent, phone leads |
| google-remarketing | ремаркетинг google ads | Audiences with consent, exclusions, dynamic product identifiers |
| google-ads-audit | аудит google ads | One-time diagnosis and report; campaign changes and management billed separately |
| merchant-center | налаштування google merchant center | Feed, disapproved products, store checks, policy remediation, no guarantee of unlocking |

## Confirmed actionable issues

1. Google Ads hub FAQ related links incorrectly pointed «Пошукова реклама Google» to the hub. It combined Shopping and Performance Max and omitted standalone search/remarketing pages. Fixed with all seven genuine links.
2. Eight descriptions used decorative emoji and some indistinct scope. Replaced with eight unique intent-aligned Ukrainian Description snippets; titles/primary keywords untouched.
3. Merchant Center metadata lacked clear no-guarantee language; added and provided related links to Shopping and Google Ads Audit.

## Serpstat g_ua exact query samples

- контекстна реклама — 1,000; контекстна реклама google — 110; пошукова реклама — 50; google shopping — 720; performance max — 260; ремаркетинг — 210; аудит google ads — 20.
- These are **per-keyword rough monthly frequencies, not cluster totals or traffic estimates**. Missing terms are unknown; high-volume branded/informational terms such as Merchant Center may not indicate purchasing intent.

## Release and remaining verification

- CI: static PHP/international SEO/noindex checks, new eight-page assertions. Browser checks must confirm rendered title/meta, canonical/hreflang, H1, real service anchors, 200 responses, 360/390/1440 widths and contact CTA.
- Preserve original price claims rather than changing without owner evidence. Not a verified Google Ads account performance assessment.
