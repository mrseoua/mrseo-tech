<?php
/** Poland-only, semantic, service-specific illustration presets. Not measured client data. */
if(!defined('ABSPATH'))exit;
function mrseo_pl_scene_presets(){
 return array(
  'local-seo'=>array('variant'=>'map','nodes'=>array('Zapytanie w okolicy','Profil firmy','Kontakt z telefonu'),'symbol'=>'⌖'),
  'service-business-seo'=>array('variant'=>'serp','nodes'=>array('Usługa klienta','Właściwa podstrona','Formularz zapytania'),'symbol'=>'⌕'),
  'landing-pages'=>array('variant'=>'landing','nodes'=>array('Treść reklamy','Jedna oferta','Formularz kontaktu'),'symbol'=>'↗'),
  'catalog-automation'=>array('variant'=>'flow','nodes'=>array('Plik dostawcy','Walidacja SKU','Katalog sklepu'),'symbol'=>'⇄'),
  'api-integrations'=>array('variant'=>'nodes','nodes'=>array('Formularz','API / CRM','Potwierdzenie'),'symbol'=>'{ }'),
  'international-seo'=>array('variant'=>'globe','nodes'=>array('Polska · Niemcy','Wersje lokalne','Hreflang i URL'),'symbol'=>'◎'),
  'local-google-ads'=>array('variant'=>'target','nodes'=>array('Zasięg kampanii','Reklama lokalna','Telefon lub lead'),'symbol'=>'◎'),
  'sklepy-woocommerce-shopify'=>array('variant'=>'store','nodes'=>array('Wybór platformy','Produkt i koszyk','Zamówienie testowe'),'symbol'=>'▦'),
  'store-conversion'=>array('variant'=>'checkout','nodes'=>array('Karta produktu','Koszyk','Płatność'),'symbol'=>'◈'),
  'store-migration'=>array('variant'=>'migration','nodes'=>array('Stary adres URL','Przekierowanie 301','Nowy sklep'),'symbol'=>'⇢'),
  'service-websites'=>array('variant'=>'browser','nodes'=>array('Lista usług','Strona usługi','Kontakt'),'symbol'=>'▤'),
  'corporate-websites'=>array('variant'=>'tree','nodes'=>array('Oferta firmy','Działy i odbiorcy','Zapytanie'),'symbol'=>'▥'),
  'website-redesign'=>array('variant'=>'layers','nodes'=>array('Stary układ','Nowy widok','Test mobile'),'symbol'=>'▧'),
  'website-speed-security'=>array('variant'=>'shield','nodes'=>array('Pomiar','Zabezpieczenia','Kontrola zmian'),'symbol'=>'◇'),
  'web-applications'=>array('variant'=>'app','nodes'=>array('Proces biznesowy','Panel aplikacji','Zapis w CRM'),'symbol'=>'▣'),
 );
}
function mrseo_pl_render_unique_scene($slug){
 $presets=mrseo_pl_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div>';
 echo '<div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div>';
 echo '<span class="pl-art-status"><i></i> SCHEMAT / ETAPY REALIZACJI</span>';
 echo '</div>';
 return true;
}
