<?php
/** Dedicated original German commercial landing template. */
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/inc/de-service-art.php';
$pl_slug=mrseo_slug();
$pl_page=mrseo_de_service_page($pl_slug);
if(mrseo_locale()!=='de'||!$pl_page){status_header(404);include get_404_template();return;}
get_header();
$pl_group=in_array($pl_slug,array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),true)?'commerce':(in_array($pl_slug,array('google-shopping','local-google-ads','google-ads-audit','merchant-center-help','landing-pages'),true)?'ads':(in_array($pl_slug,array('wordpress-care','api-integrations','website-speed-security'),true)?'support':(in_array($pl_slug,array('local-seo','service-business-seo','international-seo'),true)?'seo':'web')));
?>
<div class="pl-svc pl-svc--<?php echo esc_attr($pl_group);?> pl-svc-<?php echo esc_attr($pl_slug);?>">
 <section class="pl-svc-hero" aria-labelledby="pl-title">
  <div class="intl-wrap pl-svc-hero-grid">
   <div class="pl-svc-hero-copy">
    <nav class="pl-svc-crumb" aria-label="Ścieżka nawigacji"><a href="<?php echo esc_url(mrseo_url('','de'));?>">Startseite</a><span aria-hidden="true">/</span><span><?php echo esc_html($pl_page['kicker']);?></span></nav>
    <div class="intl-kicker"><?php echo esc_html($pl_page['kicker']);?></div>
    <h1 id="pl-title"><?php echo esc_html($pl_page['hero'][0]);?> <em><?php echo esc_html($pl_page['hero'][1]);?></em></h1>
    <p><?php echo esc_html($pl_page['lead']);?></p>
    <div class="pl-svc-hero-actions"><a class="intl-button" href="<?php echo esc_url(mrseo_url('contact','de'));?>"><?php echo esc_html($pl_page['cta']);?> <span aria-hidden="true">↗</span></a><a class="pl-svc-text-link" href="#pl-needs">So helfen wir <span aria-hidden="true">↓</span></a></div>
    <div class="pl-svc-hero-note">Wir klären zuerst Bedarf und Umfang. Ohne unbelegte Leistungsversprechen.</div>
   </div>
   <div class="pl-svc-art">
    <div class="pl-svc-scene" role="img" aria-label="<?php echo esc_attr(implode(' – ',$pl_page['visual']));?>">
     <div class="pl-svc-scene-head"><span class="pl-svc-light"></span><span>MRSEO.TECH / <?php echo esc_html($pl_page['kicker']);?></span><span aria-hidden="true">✳</span></div>
     <div class="pl-svc-scene-mark" aria-hidden="true">
      <?php if(!mrseo_de_render_unique_scene($pl_slug)):?>
      <?php if($pl_group==='web'):?><div class="pl-svc-browser"><div><i></i><i></i><i></i></div><b></b><p></p><p></p><a></a></div>
      <?php elseif($pl_group==='seo'):?><div class="pl-svc-bars"><i></i><i></i><i></i><i></i><i></i><i></i></div>
      <?php elseif($pl_group==='commerce'):?><div class="pl-svc-shop"><i></i><i></i><i></i></div>
      <?php elseif($pl_group==='merchant'):?><div class="pl-svc-merchant"><span>!</span><span>✓</span><span>✓</span></div>
      <?php elseif($pl_group==='support'):?><div class="pl-svc-support"><i></i><i></i><i></i><i></i><i></i></div>
      <?php else:?><div class="pl-svc-bars"><i></i><i></i><i></i><i></i><i></i><i></i></div><?php endif;?>
      <?php endif;?>
     </div>
     <div class="pl-svc-scene-steps">
      <?php foreach($pl_page['visual'] as $i=>$name):?>
       <div class="pl-svc-scene-step"><small><?php echo esc_html(sprintf('%02d',$i+1));?></small><strong><?php echo esc_html($name);?></strong></div>
       <?php if($i<2):?><span class="pl-svc-step-arrow" aria-hidden="true">→</span><?php endif;?>
      <?php endforeach;?>
     </div>
     <div class="pl-svc-scene-end"><span>BEISPIEL / ABLAUF</span><span class="pl-svc-scene-beat" aria-hidden="true"><i></i><i></i><i></i></span></div>
    </div>
   </div>
  </div>
 </section>
 <section class="pl-svc-needs" id="pl-needs" aria-labelledby="pl-needs-h">
  <div class="intl-wrap">
   <div class="pl-svc-section-head"><div><div class="intl-kicker">IHRE HERAUSFORDERUNGEN</div><h2 id="pl-needs-h"><?php echo esc_html($pl_page['intro']);?></h2></div><p><?php echo esc_html($pl_page['introText']);?></p></div>
   <div class="pl-svc-need-grid">
    <?php foreach($pl_page['problems'] as $i=>$item):?>
     <article class="pl-svc-need"><div class="pl-svc-need-index">0<?php echo esc_html($i+1);?> <span aria-hidden="true">↗</span></div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p><div class="pl-svc-need-action"><small>NASZE PODEJŚCIE</small><strong><?php echo esc_html($item[2]);?></strong></div></article>
    <?php endforeach;?>
   </div>
  </div>
 </section>
 <section class="pl-svc-example" aria-labelledby="pl-example-title"><div class="intl-wrap pl-svc-example-grid">
  <div><div class="intl-kicker"><?php echo esc_html($pl_page['example'][0]);?></div><h2 id="pl-example-title">So wird aus einem Problem <em>ein konkreter Arbeitsschritt.</em></h2><p>Ein beispielhafter Ablauf – kein behaupteter Kundenfall und keine Erfolgsgarantie.</p><a class="pl-svc-text-link" href="<?php echo esc_url(mrseo_url('contact','de'));?>">Anliegen beschreiben ↗</a></div>
  <div class="pl-svc-case">
   <?php for($i=1;$i<=3;$i++):?>
    <div><small><?php echo esc_html(array('','AUSGANGSLAGE','MASSNAHME','PRÜFUNG')[$i]);?></small><p><?php echo esc_html($pl_page['example'][$i]);?></p></div>
   <?php endfor;?>
  </div>
 </div></section>
 <section class="pl-svc-process" aria-labelledby="pl-process-title"><div class="intl-wrap">
  <div class="pl-svc-section-head"><div><div class="intl-kicker">ABLAUF DER ZUSAMMENARBEIT</div><h2 id="pl-process-title">Von der Anfrage bis zur überprüfbaren Umsetzung.</h2></div><p>Klare Etappen machen Umfang und Ergebnisse nachvollziehbar.</p></div>
  <ol class="pl-svc-process-list"><?php foreach($pl_page['process'] as $i=>$step):?><li><span>0<?php echo esc_html($i+1);?></span><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div></li><?php endforeach;?></ol>
 </div></section>
 <section class="pl-svc-outcomes" aria-labelledby="pl-outcomes-title"><div class="intl-wrap pl-svc-outcomes-grid">
  <div><div class="intl-kicker">IHR ERGEBNIS</div><h2 id="pl-outcomes-title">Konkrete Leistungen, die sich überprüfen lassen.</h2><p>Die genauen Ergebnisse vereinbaren wir im Angebot. Hier sehen Sie die überprüfbaren Leistungen.</p></div>
  <div class="pl-svc-outcome-list"><?php foreach($pl_page['outcomes'] as $i=>$item):?><div><span>0<?php echo esc_html($i+1);?></span><div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></div></div><?php endforeach;?></div>
 </div></section>
 <section class="pl-svc-limits" aria-labelledby="pl-limits-title"><div class="intl-wrap pl-svc-limits-grid">
  <div><div class="intl-kicker">OHNE LEERE VERSPRECHEN</div><h2 id="pl-limits-title">Was sollten Sie vor dem Start wissen?</h2></div>
  <p><?php echo esc_html($pl_page['risk']);?></p>
 </div></section>
 <section class="pl-svc-faq" aria-labelledby="pl-faq-title"><div class="intl-wrap pl-svc-faq-grid">
  <div><div class="intl-kicker">FRAGEN UND ANTWORTEN</div><h2 id="pl-faq-title">Vor der Zusammenarbeit.</h2></div>
  <div class="pl-svc-faq-items"><?php foreach($pl_page['faq'] as $row):?><details><summary><?php echo esc_html($row[0]);?> <span aria-hidden="true">+</span></summary><p><?php echo esc_html($row[1]);?></p></details><?php endforeach;?></div>
 </div></section>
 <section class="pl-svc-related" aria-labelledby="pl-related-title"><div class="intl-wrap">
  <div class="intl-kicker">PASSENDE LEISTUNGEN</div><h2 id="pl-related-title">Was passt außerdem zu Ihrem Projekt?</h2>
  <div class="pl-svc-related-grid"><?php foreach($pl_page['related'] as $item):?><a href="<?php echo esc_url(mrseo_url($item[0],'de'));?>"><strong><?php echo esc_html($item[1]);?></strong><span><?php echo esc_html($item[2]);?></span><b aria-hidden="true">↗</b></a><?php endforeach;?></div>
 </div></section>
 <section class="intl-final pl-svc-final"><div class="intl-wrap intl-final-grid">
  <div><div class="intl-kicker">MRSEO.TECH / DER ERSTE SCHRITT</div><h2>Was möchten Sie verbessern oder aufbauen?</h2><p>Ein kurzer Überblick und Ihre bestehende Website reichen für den ersten Austausch. Wir besprechen sinnvolle nächste Schritte ohne Paketzwang.</p></div>
  <a class="intl-final-link" href="<?php echo esc_url(mrseo_url('contact','de'));?>"><?php echo esc_html($pl_page['cta']);?> ↗</a>
 </div></section>
</div>
<?php get_footer();?>