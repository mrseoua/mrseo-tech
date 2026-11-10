<?php
if(!defined('ABSPATH'))exit;
/** 19 semantic service illustrations with meaningful Italian captions (no fabricated metrics). */
function mrseo_it_scene_presets(){return json_decode(<<<'MRSEO_IT_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "RICERCA LOCALE",
      "SCHEDA AZIENDA",
      "CONTATTO"
    ],
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "SERVIZIO",
      "PAGINA DEDICATA",
      "RICHIESTA"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "MERCATO",
      "LINGUA",
      "URL CORRETTO"
    ],
    "symbol": "◎"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "nodes": [
      "FEED",
      "PRODOTTO",
      "SHOPPING"
    ],
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "nodes": [
      "ZONA",
      "ANNUNCIO",
      "CHIAMATA"
    ],
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "nodes": [
      "ACCOUNT",
      "DIAGNOSI",
      "PIANO"
    ],
    "symbol": "▤"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "nodes": [
      "ARTICOLO",
      "ERRORE",
      "VERIFICA"
    ],
    "symbol": "◈"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "nodes": [
      "PIATTAFORMA",
      "CARRELLO",
      "ORDINE"
    ],
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "SCHEDA",
      "CARRELLO",
      "ACQUISTO"
    ],
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "FORNITORE",
      "CONTROLLO",
      "CATALOGO"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "VECCHIO SHOP",
      "MIGRAZIONE",
      "NUOVO SHOP"
    ],
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "SERVIZIO",
      "PAGINA",
      "CONTATTO"
    ],
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "ANNUNCIO",
      "OFFERTA",
      "RICHIESTA"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "AZIENDA",
      "CONTENUTI",
      "CONTATTO"
    ],
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "SITO ATTUALE",
      "RESTYLING",
      "COLLAUDO"
    ],
    "symbol": "⛨"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "nodes": [
      "BACKUP",
      "AGGIORNA",
      "VERIFICA"
    ],
    "symbol": "{ }"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "nodes": [
      "MODULO",
      "API / CRM",
      "CONFERMA"
    ],
    "symbol": "◈"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "nodes": [
      "MISURA",
      "PROTEZIONE",
      "CONTROLLO"
    ],
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "PROCESSO",
      "WEB APP",
      "RISULTATO"
    ],
    "symbol": "▣"
  }
}
MRSEO_IT_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_it_render_unique_scene($slug){
 $presets=mrseo_it_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> PERCORSO / VERIFICA</span></div>';
 return true;
}
