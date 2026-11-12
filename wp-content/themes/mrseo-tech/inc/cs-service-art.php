<?php
if(!defined('ABSPATH'))exit;
/** Individual Czech-market service illustrations with semantically correct stage labels. */
function mrseo_cs_scene_presets(){return json_decode(<<<'MRSEO_CS_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "DOTAZ",
      "OBLAST",
      "KONTAKT"
    ],
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "SLUŽBA",
      "DOTAZ",
      "POPTÁVKA"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "ZEMĚ",
      "JAZYK",
      "URL"
    ],
    "symbol": "◎"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "nodes": [
      "FEED",
      "REKLAMA",
      "NÁKUP"
    ],
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "nodes": [
      "OBLAST",
      "REKLAMA",
      "HOVOR"
    ],
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "nodes": [
      "ÚČET",
      "AUDIT",
      "PLÁN"
    ],
    "symbol": "▤"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "nodes": [
      "PRODUKT",
      "CHYBA",
      "KONTROLA"
    ],
    "symbol": "◈"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "nodes": [
      "KATALOG",
      "KOŠÍK",
      "NÁKUP"
    ],
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "PRODUKT",
      "KOŠÍK",
      "PLATBA"
    ],
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "ZDROJ",
      "PRAVIDLA",
      "KATALOG"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "STARÝ",
      "PŘEVOD",
      "NOVÝ"
    ],
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "NABÍDKA",
      "STRÁNKA",
      "KONTAKT"
    ],
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "REKLAMA",
      "NABÍDKA",
      "POPTÁVKA"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "FIRMA",
      "STRÁNKY",
      "KONTAKT"
    ],
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "PŮVODNÍ",
      "NÁVRH",
      "TEST"
    ],
    "symbol": "⛨"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "nodes": [
      "ZÁLOHA",
      "ÚPRAVA",
      "TEST"
    ],
    "symbol": "{ }"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "nodes": [
      "ZDROJ",
      "API",
      "CRM"
    ],
    "symbol": "◈"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "nodes": [
      "MĚŘENÍ",
      "OPRAVA",
      "RETEST"
    ],
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "PROCES",
      "PORTÁL",
      "VÝSTUP"
    ],
    "symbol": "▣"
  }
}
MRSEO_CS_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_cs_render_unique_scene($slug){
 $presets=mrseo_cs_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> ANALÝZA / KONTROLA</span></div>';
 return true;
}
