# MrSeo.tech — controlled rollout of the approved Ukrainian standard to 19 locales

Status: working plan, not permission to merge or deploy. Ukrainian copy/design is the approved editorial reference. UA visual finish PR #72 and live SEO probe PR #71 are still separate draft changes at the start of this plan.

## Inventory and hard constraints

- WordPress routes remain in folders. 20 existing locales: uk (default), ru, en-GB, pl-PL, de-DE, fr-FR, it-IT, es-ES, nl-NL, ro-RO, cs-CZ, pt-PT, sv-SE, da-DK, fi-FI, hu-HU, sk-SK, el-GR, bg-BG, hr-HR.
- At 2026-11-08 main has 307 registered canonical URLs in 42 genuine-equivalence groups. 13 newest Ukrainian services are currently UA-only. **Never invent a foreign equivalent for hreflang or a menu link before a completed page exists.** A navigation fallback is not a translation.
- Horoshop is available **only** in UKRAINIAN/RUSSIAN. All existing URLs, 20 homepages, approved Earth, noindex/nofollow, self-canonicals and local form handling are protected.
- `en` is currently targeted to the **United Kingdom** (`en-GB`), not a US-localized `en-US` page. Do not add en-US hreflang or US-specific claims.
- Do not make literal 25-page copies of the Ukrainian menu across markets. Audit existing routes and local demand first, then create only genuinely differentiated, completed offers.
- Don't claim local offices, native speakers, false testimonials, results, guaranteed rankings, geographic availability or currency prices that have not been verified.

## Rollout in manageable batches

1. **Pilot en-GB (UK):** first review existing `seo`, `seo-audit`, `google-ads`, `analytics`; replace repeated generic internal copy with identifiable problem, testable action and bounded output. Leave UK homepage, other 9 existing UK service pages, URLs, graphics and technical metadata unchanged in the first PR. Confirm content readability and visual QA before broader UK work.
2. **Tier A remaining:** ru, pl-PL, de-DE — separate PR per locale, market-appropriate services and design. Russian can mention Horoshop; Polish and German must not.
3. **Tier B:** fr-FR, it-IT, es-ES, nl-NL, ro-RO, cs-CZ — one locale at a time, based on existing native copy and actual route inventory.
4. **Tier C:** pt-PT, sv-SE, da-DK, fi-FI, hu-HU, sk-SK, el-GR, bg-BG, hr-HR — one locale at a time. Review local script/typography/word length.
5. Only after all locales pass and the owner agrees: plan a **separate** launch/indexation decision. No blanket switching on of indexing as part of translation work.

## Non-negotiable acceptance gate for EACH locale

1. **Inventory:** enumerate old and proposed URLs; identify each service intent and its nearest genuine equivalent. Check that menu anchors point only to real, correct-language pages. Report additions separately.
2. **Human-readable copy:** non-specialist must recognise a problem from the first screen. Page explains what is checked, what changes and one verifiable deliverable. Distinguish e.g. SEO vs SEO audit, manage Ads vs audit, marketing analytics vs tracking implementation, website creation vs improving an existing site. Avoid filler and duplicated intros or FAQs.
3. **Localized UI:** inspect header, mega menu, site footer, CTA, contact form and privacy text, scene captions, accessible names, email text, Titles/Descriptions/H1. Keep local spelling and business conventions. Market assumptions must be reviewed, not hallucinated.
4. **Visual/performance:** keep shared premium warm colour system; thematic non-Earth scenes on services; responsive at 360/390/1440/1920; keyboard and reduced-motion; no clipped labels, inaccessible controls, horizontal overflow or duplicate panels. Inspect viewport screenshots at page start/middle/bottom. Automated `PASS` cannot replace a human layout review.
5. **Technical SEO:** single H1, distinct Title/Description, exact self-canonical, reciprocal hreflang only for real equivalents, XML sitemap consistency, noindex/nofollow preserved, no new 404, no invented language route or duplicate slugs.
6. **Forms/security:** client-side validation, privacy text and a test that a sample enquiry reaches the expected destination (only with explicit safe test credentials/recipient; never send passwords or personal information); contact channels still point to actual services. Avoid any publication until owner review.
7. **CI/approval:** PHP lint, JS syntax, existing international QA, WordPress browser preview, page-specific content tests; inspect any failures and screenshots. Produce one draft PR per locale with changed-files summary, risks and rollback. Owner approves the PR and deployment separately.

## Pilot implementation scope

The first en-GB PR edits only the **internal client-facing content** of four existing UK service pages in `inc/uk-market-core-content.php`. It preserves titles, descriptions, headings, slugs, existing CTAs and template architecture. `scripts/verify-en-gb-pilot.py` explicitly rejects repeated placeholder copy. CI is wired in `.github/workflows/php-lint.yml`. This is a **copy/content pilot**, not a claim that the entire English site has been redesigned or is ready to index.

Before carrying the pattern to remaining markets, inspect the pilot in a browser and verify whether its service imagery, contact flow and mobile readability meet the approved Ukrainian standard. Any next EN design work should be a separate tightly scoped PR; do not merge unrelated UA #72 or live SEO #71 changes implicitly.
