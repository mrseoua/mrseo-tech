<?php
/** Additional fully localized European commercial pages, loaded from a strict locale whitelist. */
if(!defined('ABSPATH'))exit;
function mrseo_eu_additional_slugs(){
 return array('seo-audit','ecommerce-seo','analytics','website-design','online-shop-development','about','portfolio');
}
function mrseo_eu_additional_pages($language){
 static $cache=array();
 if(!in_array($language,array('fr','it','es','nl','ro','cs'),true))return array();
 if(isset($cache[$language]))return $cache[$language];
 $path=__DIR__.'/../locales/'.$language.'-services.json';
 if(!is_file($path))return array();
 $decoded=json_decode(file_get_contents($path),true,512,JSON_THROW_ON_ERROR);
 return $cache[$language]=is_array($decoded)?$decoded:array();
}
