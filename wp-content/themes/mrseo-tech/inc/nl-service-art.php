<?php
if(!defined('ABSPATH'))exit;
/** Individual Dutch-market service illustrations with semantically correct stage labels. */
function mrseo_nl_scene_presets(){return json_decode(<<<'MRSEO_NL_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "ZOEKOPDRACHT",
      "WERKGEBIED",
      "CONTACT"
    ],
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "DIENST",
      "ZOEKINTENTIE",
      "AANVRAAG"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "LAND",
      "TAAL",
      "JUISTE URL"
    ],
    "symbol": "◎"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "nodes": [
      "PRODUCTFEED",
      "SHOPPING",
      "AANKOOP"
    ],
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "nodes": [
      "LOCATIE",
      "ADVERTENTIE",
      "OPROEP"
    ],
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "nodes": [
      "ACCOUNT",
      "CONTROLE",
      "ACTIEPLAN"
    ],
    "symbol": "▤"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "nodes": [
      "PRODUCT",
      "MELDING",
      "HERCONTROLE"
    ],
    "symbol": "◈"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "nodes": [
      "PLATFORM",
      "WINKELWAGEN",
      "BESTELLING"
    ],
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "PRODUCT",
      "WINKELWAGEN",
      "BETALING"
    ],
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "DATABRON",
      "REGELS",
      "CATALOGUS"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "OUDE SHOP",
      "OVERZET",
      "NIEUWE SHOP"
    ],
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "DIENST",
      "PAGINA",
      "CONTACT"
    ],
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "ADVERTENTIE",
      "AANBOD",
      "FORMULIER"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "BEDRIJF",
      "STRUCTUUR",
      "AANVRAAG"
    ],
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "HUIDIGE SITE",
      "ONTWERP",
      "TEST"
    ],
    "symbol": "⛨"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "nodes": [
      "BACK-UP",
      "UPDATE",
      "CONTROLE"
    ],
    "symbol": "{ }"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "nodes": [
      "BRONSYSTEEM",
      "API / CRM",
      "REGISTRATIE"
    ],
    "symbol": "◈"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "nodes": [
      "METING",
      "VERBETERING",
      "HERTEST"
    ],
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "WERKPROCES",
      "WEBAPP",
      "RESULTAAT"
    ],
    "symbol": "▣"
  }
}
MRSEO_NL_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_nl_render_unique_scene($slug){
 $presets=mrseo_nl_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> ONDERZOEK / CONTROLE</span></div>';
 return true;
}
