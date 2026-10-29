# MrSeo.tech — SEO architecture v1
Date: 2026-10-29. Status: research-backed intent map, **not** verified keyword-volume analysis. Staging remains noindex.

## Positioning
Problem → root cause → recommended solution → measurable deliverable.
Focus: ecommerce SEO, Horoshop platform, service-business websites, Google Ads/PMax and analytics.
Primary market: Ukraine. Ukrainian root, Russian /ru/, English /en/. English keyword strategy requires independent target-country research.

## Existing URL ownership (all language versions)
| URL slug | Core Ukrainian intent | Secondary intent | Boundary / avoid cannibalization | Priority |
|---|---|---|---|---|
| /seo/ | seo просування сайту, пошукове просування сайтів | замовити SEO просування | umbrella only; link category-specific users to /ecommerce-seo/ and /service-websites/ | P0 |
| /seo-audit/ | технічний SEO аудит сайту, замовити SEO аудит | аудит індексації сайту | diagnostics, not monthly SEO service | P0 |
| /ecommerce-seo/ | SEO просування інтернет-магазину | оптимізація категорій, фільтрів, товарів | cross-platform shops; don't target Horoshop-specific primary phrases | P0 |
| /horoshop/ | SEO просування сайту на Хорошоп, налаштування Хорошоп | створення магазину на Хорошоп | platform hub; choose priority based on volumes; link to separate child offerings when justified | P0 |
| /service-websites/ | створення сайтів послуг, SEO сайтів послуг | сайт послуг під ключ | potentially mixed intent: split development vs promotion after SERP validation | P0 |
| /google-ads/ | налаштування Google Ads, ведення Google реклами | контекстна реклама, PPC | general Search + Shopping management; PMax-specific goes to /performance-max/ | P0 |
| /performance-max/ | налаштування Performance Max, ведення PMax | PMax для інтернет-магазину | exclude generic Google Ads page primary targeting | P0 |
| /analytics/ | налаштування аналітики сайту, GA4 для бізнесу | відстеження конверсій, аналітика реклами | dedicated implementation service; don't promise full BI without scope | P1 |
| /about/ | про SEO спеціаліста, SEO агентство | досвід, підхід | trust page, not core commercial keyword target | P1 |
| /portfolio/ | портфоліо SEO, клієнти агентства | досвід з магазинами й послугами | confidentiality: no fabricated KPIs, client outbound links or sensitive project details | P1 |
| /contact/ | зв'язатися з SEO фахівцем | консультація | conversion only | P1 |

## Candidate new commercial pages: create only after intent and SERP differentiation
| Candidate slug | Hypothesis cluster UA | Why separate | Priority |
|---|---|---|---|
| /google-shopping/ | налаштування Google Shopping, товарна реклама Google | Shopping & Merchant Center differs from PMax-only management | P0 proposal |
| /seo-services/ | SEO просування сайту послуг, просування сайту послуг | distinct intent from building a new website | P0 proposal |
| /website-development/ | розробка сайту послуг, створення сайту для бізнесу | development-oriented intent, separate scope | P1 proposal |
| /horoshop-seo/ | SEO просування Хорошоп, SEO оптимізація Хорошоп | platform SEO intent vs build/configure intent | P1 conditional |
| /horoshop-development/ | створення магазину на Хорошоп, налаштування магазину Хорошоп | platform build/setup intent vs SEO | P1 conditional |
| /conversion-tracking/ | налаштування конверсій Google Ads, GA4 ecommerce | clear implementation goal vs analytics strategy | P1 conditional |
| /seo-migration/ | SEO міграція сайту, переїзд інтернет-магазину без втрати трафіку | specialized high-risk work, validate actual delivery capability | P2 |

## On-page structure guidelines
- H1 answers the client's recognized problem but includes the primary service phrase naturally.
- Opening 120–180 words: specific situation, likely causes, scope, CTA.
- Distinct problem scenarios → diagnostic method → what is delivered → proof/clients (with confidentiality) → pricing factors (no invented fees) → FAQ → CTA.
- Semantically distinct H2s about actual subservices, not repeating the H1.
- Unique visuals only when they clarify technical concepts; avoid decorative KPI charts that imply actual outcomes.
- Clear one service per page; natural crosslinks in problem/solution copy.
- Build localized semantic clusters independently, not just translate keywords.

## Internal linking rules
Home problem "ads waste budget" → /google-ads/, catalog problems → /ecommerce-seo/, local leads → /service-websites/.
SEO umbrella → /ecommerce-seo/, /service-websites/, /seo-audit/.
Ecommerce SEO → /horoshop/ when platform-specific, /performance-max/ for paid commerce, /analytics/ for measurement.
Horoshop → /ecommerce-seo/ as general approach; /google-ads/ and future /google-shopping/ for acquisition.
Google Ads → /performance-max/ for campaign type, /analytics/ for conversion quality.
Service sites → /seo/ and /analytics/ for existing-service SEO and tracking; future split if validated.

## Validation before implementation
1. Keyword Planner + Serpstat: exact/phrase Ukrainian and Russian clusters, market Ukraine; collect volumes, CPC, trend and URL SERP.
2. Manually classify top 10 results: transactional service, informational, platform marketplace, freelancer, agency.
3. Decide merge/split based on SERP overlap. Reserve standalone URLs only for meaningfully distinct user goals.
4. Write UA titles/H1/meta and structural content; adapt RU and EN based on distinct market searches.
5. Check canonical, hreflang, links, robots and response codes after deployment.
6. Keep noindex until explicit user approval.

## Public evidence / competitors (2026-10-29)
- https://horoshop.ua/ua/offers/ — active categories for SEO, Google Shopping, Google Ads, shop setup, analytics.
- https://horoshop.ua/ua/offers/seo-prodvizhenie-sayta-na-platforme-horoshop/ — independent commercial Horoshop SEO intent.
- https://horoshop.ua/ua/seo/ — built-in SEO capabilities, avoid suggesting all low-level work requires custom development.
- https://ideadigital.agency/seo-audit-sajtiv/ — separate technical vs comprehensive audits.
- https://help.horoshop.ua/uk/articles/1703611-індексація-фільтрів — filter preset indexing capabilities.

Note: exploratory query variants are hypotheses, NOT a full validated semantic core; no search-volume, competitor traffic, or keyword difficulty numbers claimed.
