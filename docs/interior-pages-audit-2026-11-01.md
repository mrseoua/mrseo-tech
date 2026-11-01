# MrSeo.tech — Internal Pages Content and Visual Code Audit
Date: 2026-11-01 | Scope: all current commercial interior page families (UA, RU, EN, PL, DE), excluding homepage and homepage concept routes.

## Evidence and limits
Reviewed **GitHub source on main** (PHP templates, localized JSON, CSS, JS entry points, route selection and pending PRs). The live mrseo.tech pages could not be opened in the available network tools, so **no real browser screenshots, rendered layout measurements, page speed or live HTTP response checks were performed**. Findings about visible layout are code-supported risks, not verified screenshots.

The normal supported internal routes are:
- UK/RU: SEO, SEO audit, E-commerce SEO, Service Websites, Web Development, Horoshop, Google Ads, Performance Max, Analytics, About, Contact, Portfolio (12 each).
- EN: same except Horoshop (11).
- PL/DE: SEO, E-commerce SEO, SEO audit, Google Ads, Analytics, Web Development, About, Contact, Portfolio (9 each).
- The homepage and experimental orbit concept routes were excluded.

## Critical / high-priority findings
1. **Wrong customer type in Polish and German on non-shop pages.** Shared `ui.{pl,de}.common.diagnosticIntro` referred to the user's store on SEO, audit, analytics, ads and About. `common.next` similarly said "shop" on all eligible pages; fixed to business-neutral text in this PR. Source: `inc/international-content.php`, `international-landing.php`.
2. **Web Development terminal CTA was duplicated verbatim** as H2 and button, while contactNote repeated in diagnosis and final CTA. Replaced H2/paragraph with distinct, localized context in all five languages. Source: `development-landing.php`, `inc/development-content.php`.
3. **Mobile animated scene labels below practical reading size.** On main, `assets/motion-scenes.css` contains 7–9 px text for several meaningful labels at <=600px. The proposed Claude fixes are in PR #2, **not merged**, and browser verification is still required. `assets/international.css` additionally sets language switch text to **8px at <=390px** and very small clickable areas; this is not addressed by PR #2.
4. **No actual browser visual verification.** The site was unreachable via available remote content and screenshot tools. Especially check 1440/390/360 px and PL/DE expansion before approving any visual redesign.

## Moderate content repetition
- **E-commerce SEO** (UA/RU/EN): journey scenarios, interactive catalog tabs, scope cards, and deliverables repeatedly discuss categories, filters and product pages. Keep the interactive catalog demonstration, but rewrite the other sections so they explain distinct *diagnosis, implementation and measurement* rather than restating the same list. Files: `ecommerce-landing.php`, `assets/customer-journeys.json`, `inc/service-editorial.php`.
- **Horoshop** (UA/RU): the hero demo, three scenario panels, three service cards and outcomes return repeatedly to categories/filters/Merchant. Remove one explanatory repeat, retain the platform-specific technical evidence and partnership mark pending separate ownership verification. File: `specialized-landing.php`.
- **Service Websites** (UA/RU/EN): customer scenarios, 3 work cards and 3 deliverables echo site structure, SEO pages and forms. Differentiate one section as workflow with actual handoff/acceptance criteria. File: `specialized-landing.php`.
- **Google Ads / Performance Max / Analytics** (UA/RU/EN): overlapping tracking and product segmentation topics are legitimate between services; their hero messages and outcome framing are distinct. Avoid making all three pages claim the same broad scope. Source: `assets/customer-journeys.json`, `inc/service-editorial.php`, `inc/service-process.php`.
- **SEO vs SEO audit**: distinguish continuous organic growth and commercial landing-page architecture from a bounded technical diagnosis and implementation ticket list; currently the hero copy makes this distinction adequately.
- **About** (UA/RU/EN): concise small-team positioning and 3-step process are differentiated from target-audience cards; the experience claim should be independently verifiable. No major semantic duplication needing a rewrite.
- **Contact** (UA/RU/EN): one primary problem-driven message, example presets and form. No major semantic duplication requiring removal.
- **Portfolio** (UA/RU/EN): confidentiality policy is meaningful. However 4 stat-style tiles mix one numeric count with three nonnumeric service labels (SEO, Google Ads, Analytics). Consider separating KPIs from capabilities to avoid misleading visual hierarchy.

## Copy and localization corrections included in this PR
- PL/DE: common diagnosis and CTA text is market-generic, not shop-specific; portfolio heading and industry tags localized.
- Development all five locales: distinct final heading/paragraph, localized decorative tags.
- UA/RU customer journey: decorative `SOLUTION` label localized.
- UA/RU portfolio: three English decorative stat labels localized.
These changes do not affect homepage templates, page slugs, robots, canonicals or hreflang.

## Design / front-end quality queue
1. Fix meaningful labels under 11–12 px on 360/390px and enlarge language-selector tap targets. Candidate files: `assets/motion-scenes.css` (PR #2), `assets/international.css`.
2. Inspect real screenshots and keyboard interaction for collapsed/expanded stages and tabs, especially mobile E-commerce, Horoshop, Web Development and PL/DE translated strings.
3. Portfolio has **two large inline CSS blocks** with many `!important` declarations. Consolidate into an enqueued stylesheet in a separate visual PR, ensuring CSS cache version change and no layout regressions.
4. `style.css` contains extensive legacy rules and many breakpoints; audit actually used selectors before deleting, rather than wholesale style reformatting.
5. Make each internal hero visually differentiated through its *existing service-specific motion scene* and copy, not a duplicated global Earth. Keep the warm cream/graphite/red visual system; preserve preferred dark inset cards where intentional.
6. When changing `motion-scenes.css` or `development.css`, update their `wp_enqueue_style` cache version in `functions.php`; PR #2 currently has not done so.

## Technical and staging status
- Router: `inc/i18n-routing.php` supports real locale routes, excludes Horoshop outside Ukrainian/Russian, and generates alternate language links for supported pages.
- Staging `wp_robots` and `X-Robots-Tag` noindex/nofollow are present in `functions.php`. No live HTTP proof available.
- `seo-landing.php` handles SEO; some alternative SEO branch in `service-localized.php` and WP seed page templates may be legacy/dead routes. Avoid confusing source duplication with duplicate **rendered** page content.
- PR #2 (mobile CSS changes) is open/unmerged; PR #3 (skills and AGENTS.md) is open/unmerged as of the review. Neither is in the current `main` output.

## Recommended next work
- First merge the localized content corrections in this PR only after CI and proofreading; they are low-risk PHP/JSON display changes.
- Bring PR #2 up to date with asset cache bust and screenshot QA; its CSS is not yet approved visually.
- Then do a separate UX redesign pass reducing E-commerce/Horoshop/Service Websites repeated sections, with exact before/after section inventory and five-language checks where supported.
- Keep main homepage and all indexing protections untouched. No merge or publish without owner approval.
