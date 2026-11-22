---
name: premium-ui-motion
description: Design and implement premium, responsive WordPress UI and distinctive lightweight animated hero components for MrSeo.tech. Use for graphics, front-end design, CSS/JS animation, visual QA, mobile layouts, hero scenes and typography. Do not use for ad campaign optimization.
---

# Premium UI/UX and Motion — MrSeo.tech

## Inputs and source of truth
Read `AGENTS.md`, existing related template, `style.css`, and appropriate scene files before editing. Relevant theme assets:
- `inc/motion-scenes.php` and `inc/motion-scenes-copy.php` (scene structure and localized copy)
- `assets/motion-scenes.css` and `assets/motion-scenes.js` (motion and interactions)
- `orbit-lab.php` (homepage Earth reference, preserve unless explicitly asked)
- `development-landing.php`, `international-landing.php`, `seo-landing.php`, `service-localized.php`
If Figma or Canva is connected, use it for editable comps/creative when helpful; do not pretend a comp is implemented in WordPress.

## Visual system
- Editorial premium: warm ivory/cream surfaces, dark graphite text, muted red accents; purposeful dark graphite inset panels are allowed, full-page neon/dark themes are not.
- Prioritize bold useful headings, clear readable supporting copy, spacious rhythm and strong CTAs. Avoid 7–9px labels that convey meaning.
- Each service needs a unique visual metaphor: SEO = searchable pages and visibility; audit = URL diagnosis; e-commerce = category/filter/product relationships; Ads = acquisition and verified conversion signals; analytics = events/funnel; Web Development = SaaS/API/CRM/data flow; websites = responsive wireframe to finished website.
- Never use fabricated ROI, conversion percentages, simulated 'real-time' sales or pretend live dashboards. If the data is illustrative, label it as an example.
- Keep animations lightweight (transform/opacity preferred), no excessive particles, heavy video backgrounds, or unbounded WebGL surfaces. Avoid layout shifts and main-thread blocking.
- Accessible buttons, focus-visible, keyboard operation, semantic controls; support `prefers-reduced-motion: reduce`; make no-JS content useful.

## Implementation flow
1. Identify exact component, CSS selectors, JS and any conflicting media queries. Confirm no unintended homepage/locale coupling.
2. Sketch composition in words: heading/CTA + visual focal point + motion sequence + interaction states.
3. Implement one bounded component at a time; re-use design tokens without duplicating large mobile CSS blocks.
4. Mobile first: test 360/390 px and desktop 1440 px. Check wrapping in Polish/German, collision between motion nodes, 44px target sizes where practical, content clipping, horizontal scrolling and real contrast.
5. Use safe progressive enhancement and static fallbacks. Minimize dependencies and asset weight.
6. Bump relevant CSS/JS asset cache version in `functions.php` whenever modifying a versioned asset.
7. Run code checks. If browser not available, clearly mark that **visual QA remains unverified**.

## Deliverable
Present changed files, clear before/after behavior, estimated performance concerns, screenshots only if actually captured, and any unsupported locale or browser risk. Never approve your own PR for merge.
