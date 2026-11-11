<?php
/** Dedicated original Romanian commercial landing template. */
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/inc/ro-service-art.php';
$pl_slug=mrseo_slug();
$pl_page=mrseo_ro_service_page($pl_slug);
if(mrseo_locale()!=='ro'||!$pl_page){status_header(404);include get_404_template();return;}
get_header();
$pl_group=in_array($pl_slug,array('woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),true)?'commerce':(in_array($pl_slug,array('google-shopping','local-google-ads','google-ads-audit','merchant-center-help','landing-pages'),true)?'ads':(in_array($pl_slug,array('wordpress-care','api-integrations','website-speed-security'),true)?'support':(in_array($pl_slug,array('local-seo','service-business-seo','international-seo'),true)?'seo':'web')));
?>
<div class="pl-svc ro-svc pl-svc--<?php echo esc_attr($pl_group);?> pl-svc-<?php echo esc_attr($pl_slug);?>">
 <section class="pl-svc-hero" aria-labelledby="pl-title">
  <div class="intl-wrap pl-svc-hero-grid">
   <div class="pl-svc-hero-copy">
    <nav class="pl-svc-crumb" aria-label="Navigare pe pagină"><a href="<?php echo esc_url(mrseo_url('','ro'));?>">Acasă</a><span aria-hidden="true">/</span><span><?php echo esc_html($pl_page['kicker']);?></span></nav>
    <div class="intl-kicker"><?php echo esc_html($pl_page['kicker']);?></div>
    <h1 id="pl-title"><?php echo esc_html($pl_page['hero'][0]);?> <em><?php echo esc_html($pl_page['hero'][1]);?></em></h1>
    <p><?php echo esc_html($pl_page['lead']);?></p>
    <div class="pl-svc-hero-actions"><a class="intl-button" href="<?php echo esc_url(mrseo_url('contact','ro'));?>"><?php echo esc_html($pl_page['cta']);?> <span aria-hidden="true">↗</span></a><a class="pl-svc-text-link" href="#pl-needs">Vezi abordarea <span aria-hidden="true">↓</span></a></div>
    <div class="pl-svc-hero-note">Identificăm întâi cauza. Fără promisiuni imposibil de verificat.</div>
   </div>
   <div class="pl-svc-art">
    <div class="pl-svc-scene" role="img" aria-label="<?php echo esc_attr(implode(' – ',$pl_page['visual']));?>">
     <div class="pl-svc-scene-head"><span class="pl-svc-light"></span><span>MRSEO.TECH / <?php echo esc_html($pl_page['kicker']);?></span><span aria-hidden="true">✳</span></div>
     <div class="pl-svc-scene-mark" aria-hidden="true">
      <?php if(!mrseo_ro_render_unique_scene($pl_slug)):?>
      <?php if($pl_group==='web'):?><div class="pl-svc-browser"><div><i></i><i></i><i></i></div><b></b><p></p><p></p><a></a></div>
      <?php elseif($pl_group==='seo'):?><div class="pl-svc-bars"><i></i><i></i><i></i><i></i><i></i><i></i></div>
      <?php elseif($pl_group==='commerce'):?><div class="pl-svc-shop"><i></i><i></i><i></i></div>
      <?php elseif($pl_group==='merchant'):?><div class="pl-svc-merchant"><span>!</span><span>✓</span><span>✓</span></div>
      <?php elseif($pl_group==='support'):?><div class="pl-svc-support"><i></i><i></i><i></i><i></i><i></i></div>
      <?php else:?><div class="pl-svc-bars"><i></i><i></i><i></i><i></i><i></i><i></i></div><?php endif;?>
      <?php endif;?>
     </div>
     <div class="pl-svc-scene-end"><span>EXEMPLU / PROCES</span><span class="pl-svc-scene-beat" aria-hidden="true"><i></i><i></i><i></i></span></div>
    </div>
   </div>
  </div>
 </section>
 <section class="pl-svc-needs" id="pl-needs" aria-labelledby="pl-needs-h">
  <div class="intl-wrap">
   <div class="pl-svc-section-head"><div><div class="intl-kicker">CE VERIFICĂM</div><h2 id="pl-needs-h"><?php echo esc_html($pl_page['intro']);?></h2></div><p><?php echo esc_html($pl_page['introText']);?></p></div>
   <div class="pl-svc-need-grid">
    <?php foreach($pl_page['problems'] as $i=>$item):?>
     <article class="pl-svc-need"><div class="pl-svc-need-index">0<?php echo esc_html($i+1);?> <span aria-hidden="true">↗</span></div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p><div class="pl-svc-need-action"><small>CE CONTROLĂM</small><strong><?php echo esc_html($item[2]);?></strong></div></article>
    <?php endforeach;?>
   </div>
  </div>
 </section>
 <section class="pl-svc-example" aria-labelledby="pl-example-title"><div class="intl-wrap pl-svc-example-grid">
  <div><div class="intl-kicker"><?php echo esc_html($pl_page['example'][0]);?></div><h2 id="pl-example-title">De la o problemă concretă <em>la pași verificabili.</em></h2><p>Un scenariu ilustrativ, nu un rezultat inventat al unui client.</p><a class="pl-svc-text-link" href="<?php echo esc_url(mrseo_url('contact','ro'));?>">Descrie problema ta ↗</a></div>
  <div class="pl-svc-case">
   <?php for($i=1;$i<=3;$i++):?>
    <div><small><?php echo esc_html(array('','SITUAȚIE','ABORDARE','VERIFICARE')[$i]);?></small><p><?php echo esc_html($pl_page['example'][$i]);?></p></div>
   <?php endfor;?>
  </div>
 </div></section>
 <section class="pl-svc-process" aria-labelledby="pl-process-title"><div class="intl-wrap">
  <div class="pl-svc-section-head"><div><div class="intl-kicker">CUM LUCRĂM</div><h2 id="pl-process-title">De la diagnostic la o livrare verificabilă.</h2></div><p>Fiecare etapă are un scop clar și un criteriu de verificare.</p></div>
  <ol class="pl-svc-process-list"><?php foreach($pl_page['process'] as $i=>$step):?><li><span>0<?php echo esc_html($i+1);?></span><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div></li><?php endforeach;?></ol>
 </div></section>
 <section class="pl-svc-outcomes" aria-labelledby="pl-outcomes-title"><div class="intl-wrap pl-svc-outcomes-grid">
  <div><div class="intl-kicker">CE PRIMEȘTI</div><h2 id="pl-outcomes-title">Livrabile concrete pe care le poți verifica.</h2><p>Stabilim lucrările înainte de începere. Livrabilele se confirmă în funcție de proiect.</p></div>
  <div class="pl-svc-outcome-list"><?php foreach($pl_page['outcomes'] as $i=>$item):?><div><span>0<?php echo esc_html($i+1);?></span><div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></div></div><?php endforeach;?></div>
 </div></section>
 <section class="pl-svc-limits" aria-labelledby="pl-limits-title"><div class="intl-wrap pl-svc-limits-grid">
  <div><div class="intl-kicker">AȘTEPTĂRI REALISTE</div><h2 id="pl-limits-title">Ce trebuie să știi înainte?</h2></div>
  <p><?php echo esc_html($pl_page['risk']);?></p>
 </div></section>
 <section class="pl-svc-faq" aria-labelledby="pl-faq-title"><div class="intl-wrap pl-svc-faq-grid">
  <div><div class="intl-kicker">ÎNTREBĂRI FRECVENTE</div><h2 id="pl-faq-title">Răspunsuri clare înainte de începere.</h2></div>
  <div class="pl-svc-faq-items"><?php foreach($pl_page['faq'] as $row):?><details><summary><?php echo esc_html($row[0]);?> <span aria-hidden="true">+</span></summary><p><?php echo esc_html($row[1]);?></p></details><?php endforeach;?></div>
 </div></section>
 <section class="pl-svc-related" aria-labelledby="pl-related-title"><div class="intl-wrap">
  <div class="intl-kicker">SERVICII COMPLEMENTARE</div><h2 id="pl-related-title">Alte servicii care pot completa soluția.</h2>
  <div class="pl-svc-related-grid"><?php foreach($pl_page['related'] as $item):?><a href="<?php echo esc_url(mrseo_url($item[0],'ro'));?>"><strong><?php echo esc_html($item[1]);?></strong><span><?php echo esc_html($item[2]);?></span><b aria-hidden="true">↗</b></a><?php endforeach;?></div>
 </div></section>
 <section class="intl-final pl-svc-final"><div class="intl-wrap intl-final-grid">
  <div><div class="intl-kicker">MRSEO.TECH / PRIMUL CONTACT</div><h2>Ce problemă vrei să rezolvi?</h2><p>Spune-ne ce nu funcționează și trimite adresa site-ului, dacă există. Discutăm pașii și scopul înainte de orice ofertă.</p></div>
  <a class="intl-final-link" href="<?php echo esc_url(mrseo_url('contact','ro'));?>"><?php echo esc_html($pl_page['cta']);?> ↗</a>
 </div></section>
</div>
<?php get_footer();?>