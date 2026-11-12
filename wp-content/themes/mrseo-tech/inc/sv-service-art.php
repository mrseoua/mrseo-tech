<?php
if(!defined('ABSPATH'))exit;
/** Individual Swedish-market service illustrations with semantically correct stage labels. */
function mrseo_sv_scene_presets(){return json_decode(<<<'MRSEO_SV_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "SÖKNING",
      "OMRÅDE",
      "KONTAKT"
    ],
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "TJÄNST",
      "SÖKNING",
      "OFFERT"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "MARKNAD",
      "SPRÅK",
      "URL"
    ],
    "symbol": "◎"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "nodes": [
      "FEED",
      "ANNONS",
      "KÖP"
    ],
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "nodes": [
      "OMRÅDE",
      "ANNONS",
      "SAMTAL"
    ],
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "nodes": [
      "KONTO",
      "ANALYS",
      "PLAN"
    ],
    "symbol": "▤"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "nodes": [
      "PRODUKT",
      "FEL",
      "KONTROLL"
    ],
    "symbol": "◈"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "nodes": [
      "KATALOG",
      "KASSA",
      "ORDER"
    ],
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "PRODUKT",
      "KASSA",
      "BETALA"
    ],
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "KÄLLA",
      "REGLER",
      "KATALOG"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "GAMMAL",
      "FLYTT",
      "NY"
    ],
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "TJÄNST",
      "SIDA",
      "OFFERT"
    ],
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "ANNONS",
      "ERBJUD.",
      "OFFERT"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "FÖRETAG",
      "SIDOR",
      "KONTAKT"
    ],
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "NUVAR.",
      "DESIGN",
      "TEST"
    ],
    "symbol": "⛨"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "nodes": [
      "BACKUP",
      "ÄNDRA",
      "TEST"
    ],
    "symbol": "{ }"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "nodes": [
      "KÄLLA",
      "API",
      "CRM"
    ],
    "symbol": "◈"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "nodes": [
      "MÄTNING",
      "ÅTGÄRD",
      "OMTEST"
    ],
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "FLÖDE",
      "PORTAL",
      "RESULTAT"
    ],
    "symbol": "▣"
  }
}
MRSEO_SV_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_sv_render_unique_scene($slug){
 $presets=mrseo_sv_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> ANALYS / KONTROLL</span></div>';
 return true;
}
