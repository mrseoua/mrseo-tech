<?php
/**
 * Distinct, lightweight first-screen illustrations for the eight EU service
 * categories. Pure HTML/CSS (no extra JS, images, fonts, tracking or fake KPIs).
 * All text with business meaning comes from the market's own editorial copy.
 * Included from eu-localized.php inside the aria-hidden hero illustration.
 */
if (!defined('ABSPATH')) exit;
$scene_problem = static function ($index) use ($page) {
    return esc_html($page['problems'][$index][0] ?? '');
};
?>
<?php if ($slug === 'seo'): ?>
<div class="eu-viz eu-viz--seo">
  <div class="eu-viz-browser">
    <div class="eu-viz-window"><i></i><i></i><i></i><span>SEO / SEARCH</span></div>
    <div class="eu-viz-search"><b aria-hidden="true">⌕</b><i></i><em>↗</em></div>
    <div class="eu-viz-results">
      <div class="eu-viz-result is-primary"><span>01</span><div><i></i><strong><?php echo $scene_problem(0); ?></strong><small></small></div><b>↗</b></div>
      <div class="eu-viz-result"><span>02</span><div><i></i><strong><?php echo $scene_problem(1); ?></strong><small></small></div></div>
      <div class="eu-viz-result"><span>03</span><div><i></i><strong><?php echo $scene_problem(2); ?></strong><small></small></div></div>
    </div>
  </div>
  <div class="eu-viz-side-label"><span class="eu-viz-status-dot"></span> SEARCH CONSOLE · SEO</div>
</div>
<?php elseif ($slug === 'seo-audit'): ?>
<div class="eu-viz eu-viz--audit">
  <div class="eu-viz-frame-head"><span>CRAWL / URL</span><span>TECHNICAL SEO</span></div>
  <div class="eu-viz-crawl">
    <svg viewBox="0 0 600 235" preserveAspectRatio="none" aria-hidden="true">
      <path d="M300 34L110 115L300 200L500 115L300 34M110 115L500 115M300 34L300 200" class="eu-viz-line"/>
      <path d="M300 34L500 115L300 200" class="eu-viz-line eu-viz-line--active"/>
    </svg>
    <div class="eu-viz-url-node node-one"><b>URL</b><small>200</small></div>
    <div class="eu-viz-url-node node-two"><b>SEO</b><small>301</small></div>
    <div class="eu-viz-url-node node-three"><b>404</b><small>!</small></div>
    <div class="eu-viz-url-node node-four"><b>URL</b><small>200</small></div>
    <div class="eu-viz-url-node node-five"><b>INDEX</b><small>✓</small></div>
  </div>
  <div class="eu-viz-diagnostic"><span class="eu-viz-status-dot"></span><strong><?php echo $scene_problem(0); ?></strong><span>→</span><strong><?php echo $scene_problem(1); ?></strong></div>
</div>
<?php elseif ($slug === 'ecommerce-seo'): ?>
<div class="eu-viz eu-viz--commerce">
  <div class="eu-viz-frame-head"><span>CATALOG / SEO</span><span>INDEX</span></div>
  <div class="eu-viz-catalog">
    <div class="eu-viz-filters"><b></b><i></i><i></i><i></i><i></i><i></i><span>SEO</span></div>
    <div class="eu-viz-products"><div class="eu-viz-products-top"><b></b><span>↗</span></div>
      <div class="eu-viz-product"><i></i><b></b><small></small></div>
      <div class="eu-viz-product"><i></i><b></b><small></small></div>
      <div class="eu-viz-product"><i></i><b></b><small></small></div>
    </div>
  </div>
  <div class="eu-viz-caption"><span class="eu-viz-status-dot"></span><?php echo $scene_problem(0); ?></div>
</div>
<?php elseif ($slug === 'google-ads'): ?>
<div class="eu-viz eu-viz--ads">
  <div class="eu-viz-frame-head"><span>GOOGLE ADS</span><span>CONVERSION FLOW</span></div>
  <div class="eu-viz-ads-flow">
    <div class="eu-viz-ads-stage"><span class="eu-viz-ads-symbol">◎</span><strong>ADS</strong><i></i><i></i><i></i></div>
    <div class="eu-viz-ads-arrow">→</div>
    <div class="eu-viz-ads-stage is-accent"><span class="eu-viz-ads-symbol">↗</span><strong>CLICK</strong><i></i><i></i><i></i></div>
    <div class="eu-viz-ads-arrow">→</div>
    <div class="eu-viz-ads-stage"><span class="eu-viz-ads-symbol">✓</span><strong>GA4</strong><i></i><i></i><i></i></div>
  </div>
  <div class="eu-viz-ads-foot"><span><?php echo $scene_problem(0); ?></span><b>↗</b><span><?php echo $scene_problem(1); ?></span></div>
</div>
<?php elseif ($slug === 'analytics'): ?>
<div class="eu-viz eu-viz--analytics">
  <div class="eu-viz-frame-head"><span>GA4 / EVENTS</span><span>DATA FLOW</span></div>
  <div class="eu-viz-analytics-chart">
    <div class="eu-viz-chart-grid"><i></i><i></i><i></i><i></i></div>
    <svg viewBox="0 0 540 185" preserveAspectRatio="none" aria-hidden="true">
      <path d="M5 156L88 133L160 140L248 76L328 104L420 45L532 26" class="eu-viz-chart-line"/>
      <path d="M5 156L88 133L160 140L248 76L328 104L420 45L532 26L532 185L5 185Z" class="eu-viz-chart-area"/>
      <circle cx="248" cy="76" r="6"/><circle cx="420" cy="45" r="6"/>
    </svg>
  </div>
  <div class="eu-viz-event-flow"><span>EVENT</span><i>→</i><span>GA4</span><i>→</i><span>REPORT</span></div>
  <div class="eu-viz-caption"><span class="eu-viz-status-dot"></span><?php echo $scene_problem(0); ?></div>
</div>
<?php elseif ($slug === 'web-development'): ?>
<div class="eu-viz eu-viz--development">
  <div class="eu-viz-frame-head"><span>SAAS / CRM / API</span><span>INTEGRATIONS</span></div>
  <div class="eu-viz-dev-network">
    <svg viewBox="0 0 560 235" preserveAspectRatio="none" aria-hidden="true">
      <path d="M280 117L91 43M280 117L471 43M280 117L91 204M280 117L471 204" class="eu-viz-line"/>
    </svg>
    <span class="eu-viz-dev-node dev-n1">SaaS</span>
    <span class="eu-viz-dev-node dev-n2">CRM</span>
    <span class="eu-viz-dev-node dev-n3">DATA</span>
    <span class="eu-viz-dev-node dev-n4">WEB</span>
    <span class="eu-viz-dev-core"><b>API</b><i>↗</i></span>
  </div>
  <div class="eu-viz-caption"><span class="eu-viz-status-dot"></span><?php echo $scene_problem(0); ?></div>
</div>
<?php elseif ($slug === 'website-design'): ?>
<div class="eu-viz eu-viz--website">
  <div class="eu-viz-frame-head"><span>WIREFRAME</span><span>DESIGN / BUILD</span></div>
  <div class="eu-viz-webflow">
    <div class="eu-viz-wireframe"><div class="eu-viz-tab-dots"><i></i><i></i><i></i></div><div class="eu-viz-wire-hero"><b></b><i></i><i></i></div><div class="eu-viz-wire-grid"><i></i><i></i><i></i></div></div>
    <span class="eu-viz-webflow-arrow">→</span>
    <div class="eu-viz-finished"><div class="eu-viz-tab-dots"><i></i><i></i><i></i></div><div class="eu-viz-finished-hero"><b></b><i></i></div><div class="eu-viz-finished-grid"><i></i><i></i><i></i></div></div>
  </div>
  <div class="eu-viz-caption"><span class="eu-viz-status-dot"></span><?php echo $scene_problem(0); ?></div>
</div>
<?php elseif ($slug === 'online-shop-development'): ?>
<div class="eu-viz eu-viz--shop">
  <div class="eu-viz-frame-head"><span>ECOMMERCE / BUILD</span><span>SKU → ORDER</span></div>
  <div class="eu-viz-shop-shell">
    <div class="eu-viz-shop-top"><i></i><i></i><b>▣</b></div>
    <div class="eu-viz-shop-grid">
      <div class="eu-viz-shop-card"><i></i><b></b><span></span></div>
      <div class="eu-viz-shop-card"><i></i><b></b><span></span></div>
      <div class="eu-viz-shop-card"><i></i><b></b><span></span></div>
      <div class="eu-viz-shop-card"><i></i><b></b><span></span></div>
    </div>
    <div class="eu-viz-order"><span>↗</span><b>SKU</b><i></i><b>✓</b></div>
  </div>
  <div class="eu-viz-caption"><span class="eu-viz-status-dot"></span><?php echo $scene_problem(0); ?></div>
</div>
<?php endif; ?>
