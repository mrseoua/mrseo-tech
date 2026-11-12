<?php
if(!defined('ABSPATH'))exit;
/** Individual Danish-market service illustrations with semantically correct stage labels. */
function mrseo_da_scene_presets(){return json_decode(<<<'MRSEO_DA_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "SØGNING",
      "OMRÅDE",
      "KONTAKT"
    ],
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "YDELSE",
      "SØGNING",
      "TILBUD"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "MARKED",
      "SPROG",
      "URL"
    ],
    "symbol": "◎"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "nodes": [
      "FEED",
      "ANNONCE",
      "KØB"
    ],
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "nodes": [
      "OMRÅDE",
      "ANNONCE",
      "OPKALD"
    ],
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "nodes": [
      "KONTO",
      "AUDIT",
      "PLAN"
    ],
    "symbol": "▤"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "nodes": [
      "PRODUKT",
      "FEJL",
      "KONTROL"
    ],
    "symbol": "◈"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "nodes": [
      "KATALOG",
      "KASSE",
      "ORDRE"
    ],
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "PRODUKT",
      "KURV",
      "BETALING"
    ],
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "KILDE",
      "REGLER",
      "KATALOG"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "GAMMEL",
      "FLYTNING",
      "NY"
    ],
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "YDELSE",
      "SIDE",
      "TILBUD"
    ],
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "ANNONCE",
      "TILBUD",
      "KONTAKT"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "VIRKSOM.",
      "SIDER",
      "KONTAKT"
    ],
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "NUVÆR.",
      "DESIGN",
      "TEST"
    ],
    "symbol": "⛨"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "nodes": [
      "BACKUP",
      "ÆNDRING",
      "TEST"
    ],
    "symbol": "{ }"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "nodes": [
      "KILDE",
      "API",
      "CRM"
    ],
    "symbol": "◈"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "nodes": [
      "MÅLING",
      "RETTELSE",
      "TEST"
    ],
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "PROCES",
      "PORTAL",
      "RESULTAT"
    ],
    "symbol": "▣"
  }
}
MRSEO_DA_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_da_render_unique_scene($slug){
 $presets=mrseo_da_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> ANALYSE / KONTROL</span></div>';
 return true;
}
