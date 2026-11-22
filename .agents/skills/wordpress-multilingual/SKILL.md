---
name: wordpress-multilingual
description: Implement and review WordPress theme PHP, self-hosted hosting, multisite-like language routing, hreflang, technical SEO, accessibility, speed and security for MrSeo.tech. Use for WordPress changes, bugs, templates, locale URLs, redirects, forms and launch audits. Do not change global noindex without explicit owner approval.
---

# WordPress Engineering and International SEO

## Site architecture
- WordPress custom theme in `wp-content/themes/mrseo-tech/`; production hosting is self-hosted, not WordPress.com.
- PHP compatibility target: 8.4. Validate both syntax and WordPress hook behavior.
- Main locale is Ukrainian `/`, plus `/ru/`, `/en/`, `/pl/` and `/de/`.
- Routing and SEO: `inc/i18n-routing.php`; language-specific data: `inc/international-content.php`, `inc/international-home-copy.php`; international XML sitemap: `inc/international-sitemap.php`.
- Home template `orbit-lab.php`; service templates vary by route. Do not assume all pages have standard wp_posts records.

## Protocol
1. Trace the actual path: request -> rewrite/query vars -> validation -> `template_include` -> locale data -> header/footer -> asset enqueue.
2. Confirm supported route for every locale before adding a link. In particular, Horoshop exists only in UK/RU; Web Development and Website Creation are separate services with separate URLs.
3. Preserve or fix each page's H1, unique localized title and description, self-referencing canonical, reciprocal hreflang for **actually existing** alternates and correct x-default. Hreflang does not itself boost country rankings.
4. Handle 404s, 301s, URL normalization and rewrite rule flushing carefully; do not create redirect loops or change existing slugs casually.
5. Escape output with `esc_html`, `esc_attr`, `esc_url`; sanitize input, protect forms with nonce and anti-spam mechanisms when appropriate; avoid unnecessary external plugins.
6. Preserve WordPress robots staging restrictions: `wp_robots` noindex/nofollow + HTTP `X-Robots-Tag: noindex, nofollow` + WordPress discourage-indexing setting. Changes require explicit go-live approval.
7. Secure front-end: no credentials in theme, no unsafe file writes, no uncontrolled HTML injection, no dependency or WP core upgrades without consent.
8. Optimize: minimal assets, proper `wp_enqueue_*`, cache version bump, image sizing, LCP/CLS, responsive typography, accessibility and graceful no-JS behavior.

## Verification
- Run `php -l` on changed PHP (all PHP if time permits); `node --check` for changed JS.
- Validate routes and forms for UK/RU/EN/PL/DE as applicable; compare exact paths. Check hreflang link count and exclusions.
- Confirm no inadvertent opening of indexing or changes to production credentials.
- Check mobile/desktop visually when actual browser access exists; otherwise mark **not visually verified**.
- Small, reviewable PR with exact file list and rollback instructions. No direct merge.
