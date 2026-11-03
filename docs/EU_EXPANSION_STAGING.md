# MrSeo.tech — European multilingual expansion (staging)

Status: **draft PR only, not deployed, noindex still enabled**. This is not clearance to submit URLs to Google.

## Market coverage

Existing live-stage language prefixes:
- `/` — Ukrainian, Ukraine (uk-UA)
- `/ru/` — Russian (ru)
- `/en/` — English, UK-targeted (en-GB)
- `/pl/` — Polish, Poland (pl-PL)
- `/de/` — German, Germany (de-DE)

New language-market pilot (six languages, 36 real routes):
| Locale | Main page | Pages with completed draft copy |
| --- | --- | --- |
| fr-FR | `/fr/` | home, SEO, Google Ads, web development, contact, privacy |
| it-IT | `/it/` | same six |
| es-ES | `/es/` | same six |
| nl-NL | `/nl/` | same six |
| ro-RO | `/ro/` | same six |
| cs-CZ | `/cs/` | same six |

Total SEO inventory **135** unique URLs across 29 equivalence groups. New languages participate only where the corresponding page actually exists: 5 shared groups (home, SEO, Google Ads, Web Development, contact) and privacy. **Do not** add new locales to other shared groups, UK/PL-only offers or Horoshop until the pages and matching intent really exist. Do not invent translation hrefs.

## What is implemented

- Separate copy for 36 new pages, with titles/descriptions and actual problem-led service narratives.
- Minimal distinct templates; 3D rotating Earth only on each new language homepage; non-home service visuals are purpose-specific.
- Contact forms reuse the existing authenticated WordPress handler and must deliver to `hello@mrseo.tech`, with the established relay to UKR.NET. Form redirect preserves locale.
- Language selector includes 11 options and scrolls on smaller screens.
- SEO registry, canonical, reciprocal hreflang and XML sitemap derive from the same source.
- Global WordPress meta noindex/nofollow and HTTP X-Robots-Tag remain in place. No country-specific fake offices or unverifiable achievements.

## Business risks and launch blockers

1. **Legal identity**: The future Ukrainian sole proprietor has not registered. Finish the privacy notice and operator identity before opening indexing. Confirm data retention, analytics/cookie consent, providers, and international transfers with a legal advisor where needed.
2. **Language coverage ≠ language support**: Verify the team can respond competently to leads in each language or explicitly offer English email communication. Do not imply native-speaking account management.
3. **Native editorial QA**: All translated copy is a working draft. Native editors should check terminology, regional search intent, spelling, punctuation, claims and mobile text wrapping.
4. **Commercial SEO content depth**: Pilot pages explain real problems, but new sites usually need stronger proof of work, differentiated case details, internal links and local keyword research. Avoid multiplying shallow pages just to inflate URL counts.
5. **Responsive QA**: Before deployment, inspect home, SEO, Ads, Dev, Contact and Privacy for each new locale at 1440/390/360px. Verify no overlapping Earth satellites, menu flyouts, horizontal scrolling, cut text, and missing fallback when WebGL is unavailable.
6. **Form QA**: Send a test enquiry from each of six contact pages and verify the correct redirect and UKR.NET delivery (plus phone push alerts).
7. **Indexing rollout**: Deploy new pages only after explicit approval; retain noindex until separate later approval. Re-run SEO live audit (135 URLs), check additional 404 routes (e.g. `/fr/horoshop/`), verify Search Console and the sitemap before asking Google to crawl.

## Commercial priorities

First campaign themes for all six markets: (a) technical/e-commerce SEO audit with an exact diagnosis; (b) Google Ads/Shopping conversion tracking and budget loss; (c) WordPress or CRM/API integrations. These are *hypotheses*, not validated keyword-demand rankings. Validate local search volumes, CPC, keyword difficulty, competitor positioning and sales communication capacity before increasing country investment.

Later candidates: Portuguese (`pt-PT`), Swedish (`sv-SE`), Danish (`da-DK`), Finnish (`fi-FI`), Hungarian (`hu-HU`), Slovak (`sk-SK`), Greek (`el-GR`), Bulgarian (`bg-BG`), Croatian (`hr-HR`). Do not enable automatically. English can already reach other English-speaking prospects but should not claim `en-IE`, `en-US`, etc., until proper market-specific offers and content exist.

**Note:** A globally noindexed site cannot attract normal Google organic enquiries from these pages. Multilingual expansion is preparation, not immediate SEO lead generation. Paid acquisition / outbound can be considered separately, subject to legal and measurement readiness.
