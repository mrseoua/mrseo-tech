<?php
if(!defined('ABSPATH'))exit;
/** Individual Romanian-market service illustrations with semantically correct stage labels. */
function mrseo_ro_scene_presets(){return json_decode(<<<'MRSEO_RO_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "CAUTĂ",
      "ZONĂ",
      "CONTACT"
    ],
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "SERVICIU",
      "CERERE",
      "OFERTĂ"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "ȚARĂ",
      "LIMBĂ",
      "URL"
    ],
    "symbol": "◎"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "nodes": [
      "FEED",
      "ANUNȚ",
      "COMANDĂ"
    ],
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "nodes": [
      "ZONĂ",
      "ANUNȚ",
      "APEL"
    ],
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "nodes": [
      "CONT",
      "AUDIT",
      "PLAN"
    ],
    "symbol": "▤"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "nodes": [
      "PRODUS",
      "EROARE",
      "CONTROL"
    ],
    "symbol": "◈"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "nodes": [
      "CATALOG",
      "COȘ",
      "COMANDĂ"
    ],
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "PRODUS",
      "COȘ",
      "PLATĂ"
    ],
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "DATE",
      "REGULI",
      "CATALOG"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "VECHI",
      "MIGRARE",
      "NOU"
    ],
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "OFERTĂ",
      "PAGINĂ",
      "CONTACT"
    ],
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "ANUNȚ",
      "OFERTĂ",
      "CERERE"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "COMPANIE",
      "PAGINI",
      "CONTACT"
    ],
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "ACTUAL",
      "DESIGN",
      "TEST"
    ],
    "symbol": "⛨"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "nodes": [
      "BACKUP",
      "UPDATE",
      "TEST"
    ],
    "symbol": "{ }"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "nodes": [
      "SURSĂ",
      "API",
      "CRM"
    ],
    "symbol": "◈"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "nodes": [
      "MĂSOARĂ",
      "REPARĂ",
      "RETEST"
    ],
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "PROCES",
      "PORTAL",
      "REZULTAT"
    ],
    "symbol": "▣"
  }
}
MRSEO_RO_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_ro_render_unique_scene($slug){
 $presets=mrseo_ro_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> ANALIZĂ / CONTROL</span></div>';
 return true;
}
