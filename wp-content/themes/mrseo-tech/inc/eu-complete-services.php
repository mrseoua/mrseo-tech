<?php
/** Additional fully localized European commercial pages, loaded from a strict locale whitelist. */
if(!defined('ABSPATH'))exit;
function mrseo_eu_additional_slugs(){
 return array('seo-audit','ecommerce-seo','analytics','website-design','online-shop-development','about','portfolio');
}
function mrseo_eu_additional_pages($language){
 static $cache=array();
 if(!in_array($language,array('fr','it','es','nl','ro','cs','pt','sv','da','fi','hu','sk','el','bg','hr'),true))return array();
 if(isset($cache[$language]))return $cache[$language];
 $path=__DIR__.'/../locales/'.$language.'-services.json';
 if(!is_file($path))return array();
 $decoded=json_decode(file_get_contents($path),true,512,JSON_THROW_ON_ERROR);
 return $cache[$language]=is_array($decoded)?$decoded:array();
}

/** Concise, native language labels for the full eleven-language service navigation. */
function mrseo_eu_service_labels($lang=null){
 $lang=$lang?:mrseo_locale();
 $all=array(
 'fr'=>array('seo'=>'Référencement SEO','seo-audit'=>'Audit SEO','ecommerce-seo'=>'SEO e-commerce','google-ads'=>'Google Ads','analytics'=>'Analyse GA4','web-development'=>'Développement sur mesure','website-design'=>'Création de sites web','online-shop-development'=>'Création de boutiques','about'=>'À propos','portfolio'=>'Réalisations','contact'=>'Contact'),
 'it'=>array('seo'=>'Consulenza SEO','seo-audit'=>'Audit SEO tecnico','ecommerce-seo'=>'SEO ecommerce','google-ads'=>'Google Ads','analytics'=>'Analisi GA4','web-development'=>'Sviluppo su misura','website-design'=>'Realizzazione siti web','online-shop-development'=>'Sviluppo ecommerce','about'=>'Chi siamo','portfolio'=>'Progetti','contact'=>'Contatti'),
 'es'=>array('seo'=>'SEO','seo-audit'=>'Auditoría SEO','ecommerce-seo'=>'SEO ecommerce','google-ads'=>'Google Ads','analytics'=>'Analítica GA4','web-development'=>'Desarrollo a medida','website-design'=>'Diseño de páginas web','online-shop-development'=>'Desarrollo ecommerce','about'=>'Sobre nosotros','portfolio'=>'Proyectos','contact'=>'Contacto'),
 'nl'=>array('seo'=>'SEO','seo-audit'=>'Technische SEO-audit','ecommerce-seo'=>'Webshop SEO','google-ads'=>'Google Ads / SEA','analytics'=>'GA4 analytics','web-development'=>'Webontwikkeling op maat','website-design'=>'Website laten maken','online-shop-development'=>'Webshop laten maken','about'=>'Over ons','portfolio'=>'Projecten','contact'=>'Contact'),
 'ro'=>array('seo'=>'SEO','seo-audit'=>'Audit SEO tehnic','ecommerce-seo'=>'SEO magazin online','google-ads'=>'Google Ads','analytics'=>'Analiză GA4','web-development'=>'Dezvoltare personalizată','website-design'=>'Creare website','online-shop-development'=>'Dezvoltare magazin','about'=>'Despre noi','portfolio'=>'Proiecte','contact'=>'Contact'),
 'cs'=>array('seo'=>'SEO','seo-audit'=>'Technický SEO audit','ecommerce-seo'=>'SEO pro e-shopy','google-ads'=>'Google Ads / PPC','analytics'=>'GA4 analytika','web-development'=>'Vývoj na míru','website-design'=>'Tvorba webových stránek','online-shop-development'=>'Tvorba e-shopu','about'=>'O nás','portfolio'=>'Projekty','contact'=>'Kontakt')
 );
 return $all[$lang]??(function_exists('mrseo_eu_market')?(mrseo_eu_market($lang)['serviceLabels']??array()):array());
}
function mrseo_eu_portfolio_categories($lang=null){
 $lang=$lang?:mrseo_locale();
 $all=array(
 'fr'=>array('auto'=>'AUTOMOBILE','fashion'=>'MODE','home'=>'MAISON','electronics'=>'ÉLECTRONIQUE','medical'=>'SANTÉ'),
 'it'=>array('auto'=>'AUTO','fashion'=>'MODA','home'=>'CASA','electronics'=>'ELETTRONICA','medical'=>'SALUTE'),
 'es'=>array('auto'=>'AUTOMOCIÓN','fashion'=>'MODA','home'=>'HOGAR','electronics'=>'ELECTRÓNICA','medical'=>'SALUD'),
 'nl'=>array('auto'=>'AUTO','fashion'=>'MODE','home'=>'WONEN','electronics'=>'ELEKTRONICA','medical'=>'GEZONDHEID'),
 'ro'=>array('auto'=>'AUTO','fashion'=>'MODĂ','home'=>'CASĂ','electronics'=>'ELECTRONICE','medical'=>'SĂNĂTATE'),
 'cs'=>array('auto'=>'AUTO','fashion'=>'MÓDA','home'=>'BYDLENÍ','electronics'=>'ELEKTRONIKA','medical'=>'ZDRAVÍ')
 );
 return $all[$lang]??(function_exists('mrseo_eu_market')?(mrseo_eu_market($lang)['portfolioCategories']??array()):array());
}
