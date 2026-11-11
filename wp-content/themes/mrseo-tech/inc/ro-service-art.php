<?php
if(!defined('ABSPATH'))exit;
/** Individual Romanian-market service illustrations with semantically correct stage labels. */
function mrseo_ro_scene_presets(){return json_decode(<<<'MRSEO_RO_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "HARTĂ",
      "SERVICII",
      "APEL"
    ],
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "CĂUTARE",
      "SERVICIU",
      "CERERE"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "PIAȚĂ",
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
      "RECLAMĂ",
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
      "PLATĂ"
    ],
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "VIZITĂ",
      "COȘ",
      "COMANDĂ"
    ],
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "SURSE",
      "REGULI",
      "STOC"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "VECHI",
      "MIGRARE",
      "TEST"
    ],
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "SERVICIU",
      "PAGINĂ",
      "CERERE"
    ],
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "RECLAMĂ",
      "OFERTĂ",
      "LEAD"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "COMPANIE",
      "SERVICII",
      "CONTACT"
    ],
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "AUDIT",
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
      "MĂSURĂ",
      "REMEDIU",
      "RETEST"
    ],
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "FLUX",
      "PORTAL",
      "STATUS"
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
