<?php
if(!defined('ABSPATH'))exit;
/** Individual Portuguese-market service illustrations with semantically correct stage labels. */
function mrseo_pt_scene_presets(){return json_decode(<<<'MRSEO_PT_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "PESQUISA",
      "ZONA",
      "CONTACTO"
    ],
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "SERVIÇO",
      "PROCURA",
      "PEDIDO"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "MERCADO",
      "IDIOMA",
      "URL"
    ],
    "symbol": "◎"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "nodes": [
      "FEED",
      "ANÚNCIO",
      "COMPRA"
    ],
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "nodes": [
      "ZONA",
      "ANÚNCIO",
      "CHAMADA"
    ],
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "nodes": [
      "CONTA",
      "AUDITAR",
      "PLANO"
    ],
    "symbol": "▤"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "nodes": [
      "PRODUTO",
      "ERRO",
      "REVISÃO"
    ],
    "symbol": "◈"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "nodes": [
      "CATÁLOGO",
      "CARRINHO",
      "COMPRA"
    ],
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "PRODUTO",
      "CARRINHO",
      "PAGAR"
    ],
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "ORIGEM",
      "REGRAS",
      "CATÁLOGO"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "ANTIGA",
      "MIGRAR",
      "NOVA"
    ],
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "OFERTA",
      "PÁGINA",
      "CONTACTO"
    ],
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "ANÚNCIO",
      "OFERTA",
      "PEDIDO"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "EMPRESA",
      "PÁGINAS",
      "CONTACTO"
    ],
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "ATUAL",
      "DESENHO",
      "TESTE"
    ],
    "symbol": "⛨"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "nodes": [
      "CÓPIA",
      "ATUALIZ.",
      "TESTE"
    ],
    "symbol": "{ }"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "nodes": [
      "ORIGEM",
      "API",
      "CRM"
    ],
    "symbol": "◈"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "nodes": [
      "MEDIR",
      "CORRIGIR",
      "TESTAR"
    ],
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "PROCESSO",
      "PORTAL",
      "SAÍDA"
    ],
    "symbol": "▣"
  }
}
MRSEO_PT_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_pt_render_unique_scene($slug){
 $presets=mrseo_pt_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> ANÁLISE / CONTROLO</span></div>';
 return true;
}
