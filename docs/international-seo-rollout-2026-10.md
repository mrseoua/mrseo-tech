# MrSeo.tech — International SEO launch plan (2026-10-31)

## Decision
Launch preparation for **Poland (PL)** first; develop **Germany (DE)** in parallel. Treat this as a commercial experiment for a small remote technical SEO / Google Ads team, not a mass translation initiative. Keep UA/RU/EN live structure unchanged and staging `noindex` enabled until explicitly approved.

## Evidence and caveats
- Poland: public SEO/e-commerce agency offers range from ~PLN 2,000/month for small shops toward ~PLN 5,000–7,000/month for more involved services. These are vendor offers, not verified market averages. Sources: https://budujecommerce.pl/seo-i-geo/ile-kosztuje-pozycjonowanie-sklepu ; https://sempai.pl/oferta/pozycjonowanie-sklepu/ .
- Germany: public estimates for agency SEO on shops often start around EUR 2,000/month, with a wide range up to several thousand. Sources: https://pixelocean.de/blog/seo-kosten/ ; https://www.drweb.de/e-commerce-seo-agentur-vergleich/ .
- Competition is established: Shoper/Sempire and Sempai in Poland, specialized Shopware/Shopify SEO firms in Germany. Proving technical expertise and communicating in the client's language matters more than a generic "SEO agency" landing page.
- **Ahrefs API query attempt failed with `Insufficient plan`. Exact monthly volumes, keyword difficulty, CPC and lead costs are NOT known and must not be presented as facts.**
- Google documentation: https://developers.google.com/search/docs/specialty/international/managing-multi-regional-sites and https://developers.google.com/search/docs/specialty/international/localized-versions .

## Architecture completed in GitHub
- Country pages under `/pl/` (pl-PL) and `/de/` (de-DE).
- Completed routes for both: root, `seo`, `ecommerce-seo`, `seo-audit`, `google-ads`, `analytics`, `about`, `contact`, `portfolio` (9 per market).
- Separate country-level headlines, metadata, problem/solution copy, FAQ, navigation and lead form.
- Page-specific canonicals and bidirectional `hreflang` references to existing UK/RU/EN equivalents.
- Horoshop restricted to Ukrainian/Russian; no `/pl/horoshop/` or `/de/horoshop/`.
- Global `noindex, nofollow` still in effect. **Do not enable indexation until a separately approved launch.**

## Keyword-to-page mapping: hypotheses to verify with real demand data
| Target | Poland keyword hypotheses | Germany keyword hypotheses |
|---|---|---|
| /ecommerce-seo/ | pozycjonowanie sklepów internetowych; SEO dla sklepu internetowego; SEO e-commerce | SEO für Onlineshops; Onlineshop SEO; E-Commerce SEO Agentur |
| /seo-audit/ | audyt techniczny SEO; audyt SEO sklepu internetowego | technisches SEO Audit; SEO Audit Onlineshop |
| /seo/ | pozycjonowanie stron; SEO techniczne | technische Suchmaschinenoptimierung; SEO Betreuung |
| /google-ads/ | Google Ads dla sklepów; obsługa kampanii Google Ads; Performance Max sklep | Google Ads Betreuung Onlineshop; Google Shopping Agentur; Performance Max Betreuung |
| /analytics/ | audyt GA4; analityka e-commerce; śledzenie konwersji | GA4 Tracking Audit; Conversion Tracking Onlineshop |
| / (home) | agencja SEO e-commerce (broader, difficult) | SEO Agentur E-Commerce (broader, difficult) |

Not all keyword variants belong on one landing page; validate intent using national SERPs before final titles and internal anchor choices.

## Market sequence
1. **Poland pilot**: technical ecommerce and SEO audit first, then Google Ads and analytics. Review at least 15–20 country-specific SERPs, validate relevant competing domains and real search demand.
2. **Germany**: initial landing-page and translation QA, then outreach to specialized shops; expect higher credibility and German-language support requirements.
3. **Netherlands**: candidate only, not launched, pending evidence that lead economics beat or complement the first two.

## Requirements before removing noindex
- Check native-language fluency, service terminology and honest scope (especially Shopify/Shopware/Shoper mentions).
- Test every desktop/mobile breakpoint, navigational element, form validation, submission, email delivery and post-submit locale redirect.
- Verify that `/pl/horoshop/`, `/de/horoshop/`, `/en/horoshop/` return 404 and are absent from selectors and `hreflang`.
- Validate each new route's HTTP 200 status; review `title`, description, H1, self canonical and *reciprocal* `hreflang`.
- Ensure all new virtual pages are discoverable via an XML sitemap or another crawlable URL list. WordPress's default sitemaps may omit virtual-template routes.
- Add appropriate privacy disclosures, consent/legal information and contract/invoice process for EU leads; do not fake a Polish or German office.
- Establish an actual Polish/German communication process before accepting inquiries in those languages.
- Configure GA4 lead conversions with country/language parameters, verify GA4 and GSC once site indexation is approved.
- Compare real paid test spend against *qualified* enquiries and conversion to retained clients, not just CPC or visits.
- Request explicit approval to remove global `noindex` only after QA is complete.

## Outstanding limitations
- Live visual QA and deployment verification cannot be confirmed with current available website access; source-level checks alone are insufficient.
- Exact market volumes, KD and CPC need external data. Don't invent estimates.
- Original WordPress 3-language templates still use a 3-argument translation helper. New international branches store translation content separately; additional locales require editorial data and a router/locale whitelist update.
