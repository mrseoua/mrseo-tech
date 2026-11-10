<?php
if(!defined('ABSPATH'))exit;
/** One distinct visual narrative per original German service. */
function mrseo_de_scene_presets(){return json_decode(<<<'MRSEO_DE_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "SUCHANFRAGE",
      "STANDORT",
      "ANFRAGE"
    ],
    "symbol": "◎"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "LEISTUNG",
      "SUCHERGEBNIS",
      "ANFRAGE"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "MARKT",
      "SPRACHE",
      "ZIELSEITE"
    ],
    "symbol": "◌"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "nodes": [
      "FEED",
      "PRODUKT",
      "SHOPPING"
    ],
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "nodes": [
      "GEBIET",
      "ANZEIGE",
      "KONTAKT"
    ],
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "nodes": [
      "KONTO",
      "PRÜFUNG",
      "MASSNAHME"
    ],
    "symbol": "◫"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "nodes": [
      "ARTIKEL",
      "FEHLER",
      "PRÜFUNG"
    ],
    "symbol": "◈"
  },
  "online-shop-development": {
    "variant": "online-shop-development",
    "nodes": [
      "KATALOG",
      "WARENKORB",
      "BESTELLUNG"
    ],
    "symbol": "▤"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "nodes": [
      "PLATTFORM",
      "KASSE",
      "TESTKAUF"
    ],
    "symbol": "◍"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "PRODUKT",
      "WARENKORB",
      "KAUF"
    ],
    "symbol": "▥"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "DATENQUELLE",
      "SYNC",
      "KATALOG"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "ALTER SHOP",
      "MIGRATION",
      "NEUER SHOP"
    ],
    "symbol": "⇢"
  },
  "website-design": {
    "variant": "website-design",
    "nodes": [
      "STRUKTUR",
      "DESIGN",
      "KONTAKT"
    ],
    "symbol": "▣"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "LEISTUNG",
      "SEITE",
      "KONTAKT"
    ],
    "symbol": "▧"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "ANZEIGE",
      "ANGEBOT",
      "LEAD"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "UNTERNEHMEN",
      "INHALTE",
      "KONTAKT"
    ],
    "symbol": "▨"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "ALT",
      "REDESIGN",
      "TEST"
    ],
    "symbol": "◇"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "nodes": [
      "BACKUP",
      "UPDATE",
      "TEST"
    ],
    "symbol": "▤"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "nodes": [
      "FORMULAR",
      "API / CRM",
      "BESTÄTIGUNG"
    ],
    "symbol": "⛨"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "nodes": [
      "MESSUNG",
      "SCHUTZ",
      "KONTROLLE"
    ],
    "symbol": "{ }"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "PROZESS",
      "WEBAPP",
      "ERGEBNIS"
    ],
    "symbol": "▣"
  }
}
MRSEO_DE_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_de_render_unique_scene($slug){
 $scenes=mrseo_de_scene_presets();
 if(!isset($scenes[$slug]))return false;
 $scene=$scenes[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> PROZESS / PRÜFSCHRITTE</span></div>';
 return true;
}
