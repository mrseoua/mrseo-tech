<?php
if(!defined('ABSPATH'))exit;
/** Service-specific French semantic illustrations: no client performance data. */
function mrseo_fr_scene_presets(){return json_decode(<<<'MRSEO_FR_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "symbol": "◎"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "symbol": "▤"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "symbol": "◈"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "symbol": "⛨"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "symbol": "{ }"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "symbol": "◈"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "symbol": "▣"
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
