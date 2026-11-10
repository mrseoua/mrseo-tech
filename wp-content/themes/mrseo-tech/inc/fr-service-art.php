<?php
if(!defined('ABSPATH'))exit;
/** Service-specific French semantic illustrations: no client performance data. */
function mrseo_fr_scene_presets(){return json_decode(<<<'MRSEO_FR_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "symbol": "⌖",
    "nodes": [
      "RECHERCHE",
      "LOCALITÉ",
      "CONTACT"
    ]
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "symbol": "⌕",
    "nodes": [
      "PRESTATION",
      "PAGE SEO",
      "DEVIS"
    ]
  },
  "international-seo": {
    "variant": "international-seo",
    "symbol": "◎",
    "nodes": [
      "PAYS",
      "LANGUE",
      "PAGE"
    ]
  },
  "google-shopping": {
    "variant": "google-shopping",
    "symbol": "▦",
    "nodes": [
      "FLUX",
      "ARTICLE",
      "ANNONCE"
    ]
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "symbol": "◉",
    "nodes": [
      "ZONE",
      "ANNONCE",
      "APPEL"
    ]
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "symbol": "▤",
    "nodes": [
      "COMPTE",
      "AUDIT",
      "ACTIONS"
    ]
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "symbol": "◈",
    "nodes": [
      "PRODUIT",
      "ERREUR",
      "CONTRÔLE"
    ]
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "symbol": "▣",
    "nodes": [
      "PLATEFORME",
      "PANIER",
      "COMMANDE"
    ]
  },
  "store-conversion": {
    "variant": "store-conversion",
    "symbol": "◍",
    "nodes": [
      "PRODUIT",
      "PANIER",
      "ACHAT"
    ]
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "symbol": "⇄",
    "nodes": [
      "SOURCE",
      "SYNCHRO",
      "CATALOGUE"
    ]
  },
  "store-migration": {
    "variant": "store-migration",
    "symbol": "⇢",
    "nodes": [
      "ANCIEN SITE",
      "TRANSFERT",
      "NOUVEAU SITE"
    ]
  },
  "service-websites": {
    "variant": "service-websites",
    "symbol": "▥",
    "nodes": [
      "SERVICE",
      "PAGE",
      "CONTACT"
    ]
  },
  "landing-pages": {
    "variant": "landing-pages",
    "symbol": "↗",
    "nodes": [
      "ANNONCE",
      "OFFRE",
      "DEMANDE"
    ]
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "symbol": "▧",
    "nodes": [
      "ENTREPRISE",
      "RUBRIQUES",
      "ÉCHANGES"
    ]
  },
  "website-redesign": {
    "variant": "website-redesign",
    "symbol": "⛨",
    "nodes": [
      "AUDIT",
      "REFONTE",
      "RECETTE"
    ]
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "symbol": "{ }",
    "nodes": [
      "SAUVEGARDE",
      "MISE À JOUR",
      "TEST"
    ]
  },
  "api-integrations": {
    "variant": "api-integrations",
    "symbol": "◈",
    "nodes": [
      "FORMULAIRE",
      "API / CRM",
      "RÉCEPTION"
    ]
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "symbol": "◇",
    "nodes": [
      "MESURE",
      "CORRECTION",
      "CONTRÔLE"
    ]
  },
  "web-applications": {
    "variant": "web-applications",
    "symbol": "▣",
    "nodes": [
      "PROCESSUS",
      "APPLICATION",
      "RÉSULTAT"
    ]
  }
}
MRSEO_FR_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_fr_render_unique_scene($slug){
 $presets=mrseo_fr_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> ÉTAPES / CONTRÔLE</span></div>';
 return true;
}
