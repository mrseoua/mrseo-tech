<?php
if(!defined('ABSPATH'))exit;
/** Individual Spanish-market service illustrations with semantically correct stage labels. */
function mrseo_es_scene_presets(){return json_decode(<<<'MRSEO_ES_ART'
{
  "local-seo": {
    "variant": "local-seo",
    "nodes": [
      "BÚSQUEDA",
      "ZONA REAL",
      "CONTACTO"
    ],
    "symbol": "⌖"
  },
  "service-business-seo": {
    "variant": "service-business-seo",
    "nodes": [
      "SERVICIO",
      "PÁGINA ÚTIL",
      "PRESUPUESTO"
    ],
    "symbol": "⌕"
  },
  "international-seo": {
    "variant": "international-seo",
    "nodes": [
      "PAÍS",
      "IDIOMA",
      "URL CORRECTA"
    ],
    "symbol": "◎"
  },
  "google-shopping": {
    "variant": "google-shopping",
    "nodes": [
      "FEED",
      "PRODUCTO",
      "SHOPPING"
    ],
    "symbol": "▦"
  },
  "local-google-ads": {
    "variant": "local-google-ads",
    "nodes": [
      "UBICACIÓN",
      "ANUNCIO",
      "LLAMADA"
    ],
    "symbol": "◉"
  },
  "google-ads-audit": {
    "variant": "google-ads-audit",
    "nodes": [
      "CUENTA",
      "AUDITORÍA",
      "PLAN"
    ],
    "symbol": "▤"
  },
  "merchant-center-help": {
    "variant": "merchant-center-help",
    "nodes": [
      "ARTÍCULO",
      "INCIDENCIA",
      "ESTADO"
    ],
    "symbol": "◈"
  },
  "woocommerce-shopify-stores": {
    "variant": "woocommerce-shopify-stores",
    "nodes": [
      "PLATAFORMA",
      "CARRITO",
      "PEDIDO"
    ],
    "symbol": "▣"
  },
  "store-conversion": {
    "variant": "store-conversion",
    "nodes": [
      "PRODUCTO",
      "CARRITO",
      "COMPRA"
    ],
    "symbol": "◍"
  },
  "catalog-automation": {
    "variant": "catalog-automation",
    "nodes": [
      "ORIGEN",
      "REGLAS",
      "CATÁLOGO"
    ],
    "symbol": "⇄"
  },
  "store-migration": {
    "variant": "store-migration",
    "nodes": [
      "TIENDA ACTUAL",
      "TRASLADO",
      "NUEVA TIENDA"
    ],
    "symbol": "⇢"
  },
  "service-websites": {
    "variant": "service-websites",
    "nodes": [
      "SERVICIO",
      "PÁGINA",
      "SOLICITUD"
    ],
    "symbol": "▥"
  },
  "landing-pages": {
    "variant": "landing-pages",
    "nodes": [
      "ANUNCIO",
      "OFERTA",
      "FORMULARIO"
    ],
    "symbol": "↗"
  },
  "corporate-websites": {
    "variant": "corporate-websites",
    "nodes": [
      "EMPRESA",
      "CONTENIDOS",
      "CONTACTO"
    ],
    "symbol": "▧"
  },
  "website-redesign": {
    "variant": "website-redesign",
    "nodes": [
      "WEB ACTUAL",
      "REDISEÑO",
      "PRUEBAS"
    ],
    "symbol": "⛨"
  },
  "wordpress-care": {
    "variant": "wordpress-care",
    "nodes": [
      "COPIA",
      "ACTUALIZACIÓN",
      "PRUEBA"
    ],
    "symbol": "{ }"
  },
  "api-integrations": {
    "variant": "api-integrations",
    "nodes": [
      "FORMULARIO",
      "API / CRM",
      "REGISTRO"
    ],
    "symbol": "◈"
  },
  "website-speed-security": {
    "variant": "website-speed-security",
    "nodes": [
      "MEDICIÓN",
      "MEJORA",
      "CONTROL"
    ],
    "symbol": "◇"
  },
  "web-applications": {
    "variant": "web-applications",
    "nodes": [
      "PROCESO",
      "APLICACIÓN",
      "RESULTADO"
    ],
    "symbol": "▣"
  }
}
MRSEO_ES_ART
,true,512,JSON_THROW_ON_ERROR);}
function mrseo_es_render_unique_scene($slug){
 $presets=mrseo_es_scene_presets();
 if(!isset($presets[$slug]))return false;
 $scene=$presets[$slug];
 echo '<div class="pl-art pl-art--'.esc_attr($scene['variant']).'" aria-hidden="true">';
 echo '<div class="pl-art-orbit pl-art-orbit--one"></div><div class="pl-art-orbit pl-art-orbit--two"></div>';
 echo '<div class="pl-art-symbol">'.esc_html($scene['symbol']).'</div><div class="pl-art-chain">';
 foreach($scene['nodes'] as $i=>$label){
  echo '<div class="pl-art-node pl-art-node--'.($i+1).'"><span class="pl-art-index">'.esc_html(sprintf('%02d',$i+1)).'</span><strong>'.esc_html($label).'</strong><i aria-hidden="true"></i></div>';
  if($i<2)echo '<span class="pl-art-connector" aria-hidden="true"><b></b></span>';
 }
 echo '</div><span class="pl-art-status"><i></i> DIAGNÓSTICO / COMPROBACIÓN</span></div>';
 return true;
}
