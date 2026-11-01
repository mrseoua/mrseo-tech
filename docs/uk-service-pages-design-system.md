# MrSeo.tech — Ukrainian service-page design system (pilot)

Status: **proposed design standard**, not a site-wide redesign. First implemented only on **UA SEO** at `/seo/` in this branch. Keep homepage and other languages untouched until explicit approval after browser QA.

## Design principle and source references
Users must identify their own problem, learn what will be inspected, see the form of a real deliverable and take a meaningful action — without reading five versions of the same promise. Research used:
- Nielsen Norman Group, User-centric language and UX writing (plain value proposition, user benefit, literal headings, descriptive CTAs): https://www.nngroup.com/articles/user-centric-language/ and https://www.nngroup.com/articles/ux-writing-faqs/
- W3C WCAG 2.2: text contrast at least 4.5:1 for ordinary text, target size at least 24x24 CSS pixels subject to documented exceptions; larger click targets preferred: https://www.w3.org/TR/WCAG22/ .
- Google Core Web Vitals: LCP <=2.5 s, INP <=200 ms, CLS <=0.1 at the 75th percentile: https://developers.google.com/search/docs/appearance/core-web-vitals .
All are **design targets**, not measured performance of MrSeo.tech.

## One premium visual system, different meaning for every service
- Warm light background, graphite editorial typography, restrained brick-red accent, one deliberate dark/graphite evidence panel. Do not use a site-wide black/neon look.
- H1 describes a specific customer struggle or outcome, with *the service name in the eyebrow or H1*. Single primary CTA to /contact/ and a secondary meaningful section link. Avoid "Детальніше" and generic "Наші переваги".
- Short clear lead; supporting text >=16 px on mobile; don't put essential messages into 8–10 px decorative displays.
- Distinct service-specific first-screen graphic using the existing motion scene; never duplicate the homepage planet. Progressive enhancement with fallback and reduced-motion support.
- Exactly one **symptom** section, one **how/what changes** process, one **deliverable/evidence** section, one compact FAQ, and a focused final CTA. Avoid duplicate "problems" / "our services" / "what you get" matrices with the same words.
- Never fabricate performance numbers, case results, budgets, customer testimonials, EU location/office claims or clients.

## Ukrainian service differentiation map

| Route | Problem-first headline direction | Scene | Concrete output |
|---|---|---|---|
| `/seo/` | Сайт є, але цільові клієнти знаходять конкурентів | SERP and relevant pages | Demand / URL map, prioritized fixes, validated search behavior |
| `/seo-audit/` | Сайт відкривається, але Google не бачить потрібних сторінок | Crawl scanner | Reproducible issue list with affected URLs, developer acceptance criteria |
| `/ecommerce-seo/` | Асортимент великий, а пошуковий попит губиться у фільтрах | Category/filter/product flow | Indexation rules, category and facet landing-page plan |
| `/google-ads/` | Реклама витрачає бюджет, а прибутковість замовлень неясна | Campaign + verified conversion | Conversion audit, budget/test plan by economics |
| `/performance-max/` | Автоматизація не розрізняє прибуткові й збиткові товари | Product-group PMax diagram | Merchant/segment and test plan with contribution constraints |
| `/analytics/` | Дані GA4, Ads та замовлень суперечать одне одному | Event/funnel flow | Reconciliation and testable measurement specification |
| `/horoshop/` | Хорошоп-категорії, індексація й товарний фід заважають росту | Existing native Horoshop interactive illustration | Platform-constrained changes and Merchant validation |
| `/service-websites/` | Є сайт послуг, але немає достатньо цільових звернень | Responsive site/conversion illustration | Service landing architecture, lead path and event validation |
| `/web-development/` | Ручні операції й неузгоджені сервіси гальмують бізнес | SaaS / API / CRM flow | Architecture, integration milestones and acceptance criteria |

Use the same *visual grammar* across services, but do **not** copy identical six sections and substitute keywords. FAQ only covers objections unique to that service. For future page adaptations, preserve existing deep links, portfolio references, contact flow, correct language and Horoshop scope.

## Pilot /seo/ structure
1. Hero: explicit Google-search issue, short diagnostic lead, themed SERP scene.
2. Three recognizable situations, each with specific evidence checked. Avoid repeating those situations later.
3. Example of an implementation-ready issue (clearly labeled illustrative), not a fake client case.
4. Four project milestones, each with a distinct real-world deliverable.
5. Three business artifacts, not another list of technical service features.
6. Evidence and measurement expectations; link to existing portfolio with no invented figures.
7. Three practical FAQ items, one focused final CTA.

## Approval criteria before adapting other UA services
- Mobile screenshots at 360, 390, 768 and desktop at 1440 px, ideally actual live/test deployment.
- No horizontal scrolling, clipped motion-scene labels, hidden CTA, repeated semantics or unreadable text.
- Keyboard navigation and touch targets checked. Contrast verified for actual computed CSS.
- WordPress PHP lint, JS syntax, international/robots/route QA green.
- Core Web Vitals field data assessed separately where enough traffic exists.
- Approve copy + design once; adapt service-by-service in distinct PRs and translate only **after** Ukrainian design is approved.
