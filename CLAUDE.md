# MrSeo.tech — Development and Design Guidelines for Claude Code

This file is the authoritative **repository-local brief** for Claude Code contributors. The project is a live WordPress theme and uses GitHub as source of truth.

## Project and architecture

- Repository: `mrseoua/mrseo-tech`.
- Primary WordPress theme: `wp-content/themes/mrseo-tech/`.
- `orbit-lab.php`: approved premium **homepage**, with the actual animated 3D Earth and service satellites.
- `international-landing.php`: PL/DE localized internal service pages.
- `development-landing.php` + `inc/development-content.php`: full-stack / SaaS / CRM / integrations service.
- `seo-landing.php`, `ecommerce-landing.php`, `service-localized.php`, `specialized-landing.php`: other service pages.
- `inc/motion-scenes.php`, `inc/motion-scenes-copy.php`, `assets/motion-scenes.css`, `assets/motion-scenes.js`: **distinct animated service visualizations**.
- `inc/i18n-routing.php`, `inc/international-content.php`, `inc/international-home-copy.php`: language routes, international copy, and alternate links.
- `assets/horoshop-hero.css` and `assets/horoshop-interactive.js`: separately approved Horoshop-specific design.
- `.github/workflows/php-lint.yml`: theme PHP, JS and international content regression checks.

## Visual direction — not negotiable without owner approval

Warm ivory / cream backgrounds, graphite / black typography, restrained muted red accents, generous whitespace, highly readable headings and descriptions, premium minimalism, polished but light motion. Match the **existing Ukrainian/Russian homepage** as the design reference.

- Never replace premium styling with generic SaaS dashboards, neon green, dark full-page backgrounds, vibrant orange Horoshop panels, giant blurred glows or toy-like illustrations.
- Never reduce legibility to make a mockup look trendy. Verify readable text contrast, fonts, spacing and responsive layout at desktop (1440px) and mobile (390px and 360px); avoid sideways overflow.
- **Homepage:** maintain the real rotating 3D Earth and usable service satellites on all five versions.
- **Internal service pages:** each should have a distinctive service-relevant animated scene — SEO/SERP, SEO audit scanner, e-commerce catalog, Google Ads campaigns, analytics event flow, Web Development SaaS↔API↔CRM, Website Creation wireframes, Performance Max feeds. Do **not** put the same Earth on every service page.
- **Horoshop:** preserve the approved interactive partner/commerce visual and authentic partner logo, in the neutral premium palette; service is **Ukrainian and Russian only**.
- Motion must respect `prefers-reduced-motion`, be performant, avoid layout shifts, and remain useful without JavaScript. Interactive controls must work with keyboard and show focus.

## Languages and SEO

- Five languages: Ukrainian `/` (default), Russian `/ru/`, English `/en/`, Polish `/pl/`, German `/de/`.
- PL/DE pages have market-specific content and SEO; never make automatic literal duplicate translations.
- Preserve page URLs, anchors, links, hreflang, self-canonicals, metadata, XML sitemap, localized contact forms and working internal navigation.
- `/horoshop/` and `/ru/horoshop/` exist; do not introduce `/en/horoshop/`, `/pl/horoshop/`, or `/de/horoshop/`.
- **CRITICAL: Global WordPress `noindex, nofollow` is intentionally enabled. Never turn indexing on, change robots policy or submit a sitemap without the owner's explicit approval.**
- No fabricated ROI, growth percentages, ranking promises, client testimonials, offices, credentials, results, or case studies.
- Emphasize **client business problem → diagnosis → concrete solution → verified deliverable**, not lists of vague buzzwords.
- Web Development (SaaS, CRM, client portals, API integrations, automation) and Website Creation are intentionally separate services.

## Collaboration protocol: Claude + ChatGPT + owner

GitHub is the handoff surface; neither agent sees the other agent's ongoing conversation.

1. **Before edits:** pull the latest `main`; inspect existing related PHP/CSS/JS and the design. State the exact files you intend to change and why.
2. **Never push directly to `main`.** Use a distinct branch, such as `claude/design-service-hero`, and create a Pull Request. `main` may deploy automatically.
3. Keep changes narrow and reversible; do not simultaneously rewrite the homepage, headers, translations, and all service pages to solve one visual issue.
4. Do not reformat entire large PHP files or replace other contributors' work unrelated to the task.
5. For a design PR: describe original visual problem, the intended design, animations, mobile changes, accessibility and performance.
6. Run checks: `php -l` on changed PHP, `node --check` for changed JS, and repo CI. Verify URLs, H1/metadata, language switches, contact links, and `noindex`.
7. **Visual verification:** capture/inspect desktop and mobile screenshots **when available**. If not available, explicitly label visual QA *not verified*. Never assert a live deploy is confirmed without checking.
8. PR must include a concise diff summary, affected languages/routes, risk assessment, check outcomes, before/after screenshots where possible, and a rollback path.
9. Wait for human review/approval before merging. Do not auto-merge or enable auto-deploy on unreviewed changes.
10. ChatGPT can review the Claude PR via the connected GitHub repository and provide architecture/SEO/content feedback. Claude can also review ChatGPT branches. Neither agent is an automatic reviewer without a deliberately configured trigger.

## Approved navigation taxonomy — owner decision 2026-11-06

**SEO mega-menu (Ukrainian reference): exactly five final top-level SEO destinations**, with this business-problem language:

1. **Локальне SEO** — Клієнти поруч не знаходять вас у Google та на Картах.
2. **SEO інтернет-магазинів** — Товари й категорії не приводять достатньо покупців.
3. **SEO сайтів послуг** — Сайт є, але він не приносить заявок.
4. **Міжнародне SEO** — Виходите на нові ринки, але клієнти там вас не знаходять.
5. **SEO-аудит** — Не знаєте, чому сайт не зростає або втрачає позиції.

Traffic recovery, migrations, indexing problems and other technical subtopics belong **inside their relevant service pages**, not as more primary SEO-menu entries. Audit is a diagnostic product, not a synonym for ongoing SEO. Owner also chose **not to display Analytics as its own top-level menu group**: GA4 and conversion measurement belong with SEO/Ads, while dashboards/integrations must not be deleted from the site. This section documents an approved future information architecture; **do not implement or deploy it without a separate request**. Preserve existing destinations and localized links; never link to nonexistent pages. Next discussion is Google Ads menu categories.

## Priority work

1. Make existing service visuals **beautiful, coherent and unique** while preserving the high-quality homepage Earth.
2. Fix mobile overflow, readability, collision/overlap and lack of visual rhythm.
3. Clarify each service's tangible client problem, actual solution, and relevant conversion path.
4. Keep performance, accessibility, security and SEO routing stable while improving design.

## Security

- Never put passwords, API keys, tokens, cookies or private client data into Git, comments, issue text or screenshots.
- For Claude GitHub Actions, only use GitHub Actions Secrets / supported federated authentication.
- Do not change deployment, credentials, WordPress database, billing or production settings without explicit owner approval.
