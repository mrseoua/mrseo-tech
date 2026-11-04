# MrSeo.tech — prelaunch acceptance checklist (2026-11-04)

**Policy: Keep global HTML `noindex,nofollow` and HTTP `X-Robots-Tag: noindex, nofollow` until separate explicit launch approval.** Do not create fictitious FOP identity. Do not modify the original Ukrainian or Russian homepage Earth.

## Already verified
- Existing main deployment and international PHP/static CI passed.
- Live international SEO probe passed **177 actual sitemap routes**, reciprocal hreflang, canonical and staging noindex: [Run](https://github.com/mrseoua/mrseo-tech/actions/runs/41818664005).
- Browser QA passed **174 desktop/mobile/narrow views**, but previously checked only that the Earth *container* existed, not rendered Earth texture, and did not exercise form handler. [Run](https://github.com/mrseoua/mrseo-tech/actions/runs/41818663967).
- At least one earlier live form submission on the primary contact page and mail forwarding to UKR.NET were confirmed in the conversation; this alone does **not** verify six new locales.

## Tightening checks in this PR
1. Fallback for French/Italian/Spanish/Dutch/Romanian/Czech homepage Earth is a real included Earth texture if WebGL, Three.js import or canvas rendering fails. No changes to original UA/RU/EN/PL/DE Earth.
2. Playwright browser QA verifies *actual canvas OR static texture*, six real service satellite destinations, each locale's 13 linked pages, and absence of links to unknown local-language routes.
3. Each EU form must include the exact language, WordPress nonce, handler action, POST method and privacy notice.
4. On pull requests, the lightweight QA uses actual deployed site at 1440/390/360px for home/contact/privacy per locale. It may send **deliberately invalid** form submissions to each new locale to confirm the handler redirects to `/{lang}/contact/?message_status=invalid`. These are rejected before `wp_mail`: **no test leads or customer messages are generated**.
5. After a successful deployment, the existing browser QA inspects the full 174-view matrix. Lint and source assertions run with PR CI. A focused PR audit of current production checks current deployed code, **not the unmerged CSS fallback**.

## Mandatory acceptance still outstanding
- **True successful email delivery in all six new languages.** Invalid-only form validation does not prove `wp_mail` delivery or UKR.NET/phone push. Send one clearly labelled valid smoke test from each locale after code review, with 90+ second spacing if the IP-based throttle is shared, and verify each mail/folder arrival without exposing private client information.
- **Editorial / translation signoff.** Six new markets were authored as localized drafts. Native speaker and SEO expert must review grammar, idioms, paid-search terminology, platform claims and intent before claiming native-quality localization.
- **Manual visual signoff.** Review produced screenshots and inspect Earth/satellite appearance on actual phones. A passing automated viewport check cannot prove premium design or reliable 3D across browsers.
- **Legal readiness:** true FOP/controller identity, lawful basis, retention times, international email/hosting processing, cookie/analytics consent and disclosures. The owner has confirmed FOP registration is pending.
- **Security/ops:** verify current WordPress core/plugins, backup restore, admin 2FA, updates and server logs. These require hosting access; do not falsely claim verified.
- **Lead measurement:** decide qualified-lead definition and consent-aware GA4/Google Ads event collection before launching campaigns; current receipt of email does not itself prove analytics tracking.
- **Search Console release:** after explicit later approval and legal completion only, remove **both** noindex layers, re-run full SEO checks, submit sitemap and monitor indexing. No automatic release in this PR.

## Rollback
- Changes are isolated to EU stylesheet, its cache version and automated QA scripts/workflows. Revert the merge commit to restore the previous visual fallback and tests. Preserve email delivery and existing locale routes.
