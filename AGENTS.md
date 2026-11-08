# MrSeo.tech — repository instructions for OpenAI Codex

Project: self-hosted WordPress agency website in `wp-content/themes/mrseo-tech/`. GitHub is the source of truth. This file applies to every change in this repository.

## Design and business intent
- Premium European digital agency. Warm cream/ivory background, graphite type, restrained red accents, generous spacing and readable mobile text.
- Business-first messaging: client problem -> root cause -> solution -> evidence and next step.
- The 3D Earth with satellites belongs on the HOMEPAGE across five languages. INTERNAL service pages need DISTINCT lightweight animated visual scenes, not repeating planets.
- SEO, Google Ads, E-commerce, Technical Audit, Analytics, Web Development, Website Creation, Performance Max and Horoshop have different user needs. Web Development (SaaS/CRM/API/automation) must remain distinct from Website Creation.
- Horoshop pages are only UA and RU; preserve partner marks and approved neutral styling.
- Never fabricate clients, case studies, rankings, rates, profit uplifts, awards or local addresses.

## Non-negotiable technical constraints
- Locale routes: UK default `/`; RU `/ru/`; EN `/en/`; PL `/pl/`; DE `/de/`. Preserve existing slugs, localization, self-canonicals, hreflang and sitemaps.
- Maintain staging `noindex, nofollow` in WordPress and `X-Robots-Tag`. Never enable indexation without direct user approval.
- Do not rewrite the homepage or unrelated files to fix a subpage. Preserve existing 3D Earth and moving client strip.
- Never publish secrets or edit deployment, analytics ownership, WordPress admin, billing, or permissions without explicit approval.
- Prefer a separate branch and pull request over writing to main. Never merge a PR without user approval.

## Which skill to use
- `.agents/skills/premium-ui-motion/SKILL.md` — UI/UX, theme styling, animated hero visual, responsive components, performance.
- `.agents/skills/wordpress-multilingual/SKILL.md` — PHP/WordPress changes, routing, performance, security, international SEO.
- `.agents/skills/agency-positioning-cro/SKILL.md` — agency marketing pages, value propositions, conversion and country adaptation.
- `.agents/skills/ads-analytics-seo/SKILL.md` — Google Ads, GA4, Merchant Center, Search Console, Ahrefs, campaign analysis.
Read the relevant skill before starting a matching task; combine only when scope truly spans both.

## Working method
1. Inspect target files and actual route/template usage before editing. Read existing `CLAUDE.md` for the approved design context when visual details matter.
2. State changed-file scope; avoid sweeping formatting changes.
3. Produce a minimal diff with a concrete before/after acceptance criterion.
4. Test PHP with `php -l`, JS with `node --check`, run GitHub CI, validate locale paths and stage `noindex`.
5. Check desktop 1440 px and mobile 390/360 px in a browser WHEN browser access exists. If not, explicitly write "visual QA not performed"; passing code checks does not prove the design looks good.
6. In a PR, report changed files, risks, tests, observed limits and a rollback route.
