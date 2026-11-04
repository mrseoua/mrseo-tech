<?php
/**
 * Native-language copy adapter for the EXACT shared orbit-lab homepage, header
 * and footer. The visual markup/planet remains the existing UA/RU master.
 * Never claim local offices or invent case-study performance.
 */
if (!defined('ABSPATH')) exit;

function mrseo_eu_orbit_copy($locale, $english) {
    static $control_copy=null,$localized_maps=array();
    if(isset($localized_maps[$locale]))return $localized_maps[$locale][$english]??$english;
    if (!function_exists('mrseo_eu_market')) return $english;
    $market=mrseo_eu_market($locale);
    if (!$market) return $english;
    if ($control_copy===null) {
        $control_copy=json_decode(<<<'MRSEO_EU_ORBIT_CONTROLS'
{"fr":["Visite automatique","Mettre l’animation en pause","Survolez un satellite ou choisissez un service","Carte interactive des services","Tous droits réservés","Retour en haut ↑"],"it":["Tour automatico","Metti in pausa l’animazione","Passa sui satelliti o scegli un servizio","Mappa interattiva dei servizi","Tutti i diritti riservati","Torna su ↑"],"es":["Recorrido automático","Pausar animación","Pasa el cursor o elige un servicio","Mapa interactivo de servicios","Todos los derechos reservados","Volver arriba ↑"],"nl":["Automatische rondleiding","Animatie pauzeren","Beweeg over een satelliet of kies een dienst","Interactieve dienstenkaart","Alle rechten voorbehouden","Naar boven ↑"],"ro":["Tur automat","Pauză animație","Alegeți un serviciu sau indicați un satelit","Hartă interactivă a serviciilor","Toate drepturile rezervate","Înapoi sus ↑"],"cs":["Automatická prohlídka","Pozastavit animaci","Vyberte službu nebo najeďte na satelit","Interaktivní mapa služeb","Všechna práva vyhrazena","Zpět nahoru ↑"],"pt":["Visita automática","Pausar animação","Passe o cursor ou escolha um serviço","Mapa interativo de serviços","Todos os direitos reservados","Voltar ao topo ↑"],"sv":["Automatisk rundtur","Pausa animationen","Peka på en satellit eller välj en tjänst","Interaktiv tjänstekarta","Alla rättigheter förbehållna","Till toppen ↑"],"da":["Automatisk rundvisning","Sæt animation på pause","Peg på en satellit eller vælg en ydelse","Interaktivt tjenestekort","Alle rettigheder forbeholdes","Til toppen ↑"],"fi":["Automaattinen esittely","Pysäytä animaatio","Osoita satelliittia tai valitse palvelu","Interaktiivinen palvelukartta","Kaikki oikeudet pidätetään","Takaisin ylös ↑"],"hu":["Automatikus bemutató","Animáció szüneteltetése","Válasszon szolgáltatást vagy mutasson egy műholdra","Interaktív szolgáltatástérkép","Minden jog fenntartva","Vissza az elejére ↑"],"sk":["Automatická prehliadka","Pozastaviť animáciu","Vyberte službu alebo ukážte na satelit","Interaktívna mapa služieb","Všetky práva vyhradené","Späť nahor ↑"],"el":["Αυτόματη περιήγηση","Παύση κίνησης","Επιλέξτε υπηρεσία ή δείξτε έναν δορυφόρο","Διαδραστικός χάρτης υπηρεσιών","Με επιφύλαξη παντός δικαιώματος","Επιστροφή στην κορυφή ↑"],"bg":["Автоматичен преглед","Пауза на анимацията","Изберете услуга или посочете спътник","Интерактивна карта на услугите","Всички права запазени","Нагоре ↑"],"hr":["Automatski pregled","Pauziraj animaciju","Odaberite uslugu ili označite satelit","Interaktivna karta usluga","Sva prava pridržana","Na vrh ↑"]}
MRSEO_EU_ORBIT_CONTROLS
, true, 512, JSON_THROW_ON_ERROR);
    }
    $controls=$control_copy[$locale]??$control_copy['fr'];
    $pages=array_merge(function_exists('mrseo_eu_additional_pages')?mrseo_eu_additional_pages($locale):array(),$market['pages']);
    $labels=mrseo_eu_service_labels($locale);
    $ui=$market['ui'];
    $nav=$market['nav'];
    $p=function($slug)use($pages){return $pages[$slug]??array();};
    $lead=function($slug)use($p){return $p($slug)['lead']??'';};
    $title=function($slug)use($p){return $p($slug)['title']??'';};
    $outcome=function($slug)use($p){return $p($slug)['outcomes'][0]??$p($slug)['lead']??'';};
    $link=function($slug)use($labels,$nav){return $labels[$slug]??($slug==='contact'?$nav[4]:$nav[0]);};
    $map=array(
        'STRATEGY · TECHNOLOGY · GROWTH'=>'MRSEO.TECH · SEO · GOOGLE ADS · WEB',
        'You have a website.<br><em>Where are the customers?</em>'=>$p('')['headline']??'',
        'SEO, paid media and analytics work best as one connected system. We align technology and marketing around business problems.'=>$lead(''),
        'Discuss a project'=>$nav[5],
        'Back to homepage'=>$nav[0],
        'Auto tour'=>$controls[0],
        'Pause motion'=>$controls[1],
        'Move your pointer or select a service'=>$controls[2],
        'Interactive marketing service map'=>$controls[3],
        'Demand trends'=>$labels['seo']??'SEO',
        'Growth signals'=>$ui[4],
        'Organic demand & visibility'=>$outcome('seo'),
        'Intent-driven paid acquisition'=>$outcome('google-ads'),
        'Data-driven decisions'=>$outcome('analytics'),
        'Catalog architecture & growth'=>$outcome('ecommerce-seo'),
        'Technical foundations'=>$outcome('seo-audit'),
        'SaaS, CRM, API integrations and automation'=>$outcome('web-development'),
        'Website Creation'=>$link('website-design'),
        'Business websites and online stores'=>$outcome('website-design'),
        'Horoshop stores'=>'Horoshop',
        'Projects in our portfolio'=>$link('portfolio'),
        'EXPERIENCE ACROSS INDUSTRIES'=>function_exists('mb_strtoupper')?mb_strtoupper($link('portfolio'),'UTF-8'):strtoupper($link('portfolio')),
        'Projects we have worked with'=>$title('portfolio'),
        'Explore the portfolio'=>$link('portfolio'),
        'Website names from our portfolio'=>$lead('portfolio'),
        'Our business growth approach'=>$ui[3],
        'FROM CHALLENGE TO SOLUTION'=>function_exists('mb_strtoupper')?mb_strtoupper($ui[3],'UTF-8'):strtoupper($ui[3]),
        'Your website should drive business, not just exist.'=>$ui[0],
        'When a website struggles to generate enquiries, the bottleneck may be site architecture, organic visibility, paid acquisition or measurement. We diagnose constraints and prioritize improvements that support business goals.'=>$lead(''),
        'SEO & technical foundations'=>$link('seo'),
        'We review search demand, landing-page structure, indexing and technical obstacles so relevant pages can be discovered.'=>$lead('seo'),
        'Explore SEO'=>$link('seo'),
        'Google Ads'=>'Google Ads',
        'We connect campaign structure, product data and conversion tracking to make advertising decisions more informed.'=>$lead('google-ads'),
        'Explore Google Ads'=>'Google Ads',
        'We set up GA4, events and conversion tracking to make customer journeys measurable and decisions clearer.'=>$lead('analytics'),
        'Explore Analytics'=>$link('analytics'),
        'We improve organic discovery for online stores across platforms: categories, filters, product pages, indexation and purchase intent.'=>$lead('ecommerce-seo'),
        'Explore E-commerce SEO'=>$link('ecommerce-seo'),
        'We identify crawling, indexing, canonical, performance and structural issues and prioritize fixes.'=>$lead('seo-audit'),
        'Explore Technical SEO'=>$link('seo-audit'),
        'Web Development'=>$link('web-development'),
        'We build SaaS products, CRM workflows, client portals, API integrations and automations. First we diagnose the process, then design and deliver in stages.'=>$lead('web-development'),
        'Explore Web Development'=>$link('web-development'),
        'We create service websites, company sites and online stores with thoughtful structure, usability and foundations for SEO and ads.'=>$lead('website-design'),
        'Explore Website Creation'=>$link('website-design'),
        'Horoshop Stores'=>'Horoshop',
        'Horoshop-specific store setup, SEO, feeds and ads.'=>'Horoshop',
        'Horoshop services'=>'Horoshop',
        'Solving business challenges'=>$ui[3],
        'NOT A LIST OF SERVICES. A SOLUTION TO YOUR CHALLENGE.'=>mb_strtoupper($ui[1],'UTF-8'),
        'Have a challenge?<br><em>Let’s solve it.</em>'=>$p('contact')['headline']??'',
        'Too few leads, underperforming ads, low search visibility or a new website to build? We start with the cause, not a sales pitch.'=>$lead('contact'),
        'Tell us your challenge'=>$nav[5],
        'Start with your challenge: let’s discuss your website, goals and priorities before proposing a service.'=>$lead('contact'),
        // The SAME header and footer strings are localized for all 20 languages.
        'Open menu'=>$nav[0],
        'Main navigation'=>$nav[0],
        'Services'=>$nav[0],
        'Portfolio'=>$link('portfolio'),
        'About'=>$link('about'),
        'Contact'=>$nav[4],
        'Discuss project ↗'=>$nav[5].' ↗',
        'Have a website. Where are the customers? We connect marketing and technology to solve business challenges.'=>$lead(''),
        'Working with businesses in Ukraine and internationally'=>$ui[16],
        'Discuss your challenge'=>$nav[5],
        'Expertise'=>$nav[0],
        'E-commerce SEO'=>$link('ecommerce-seo'),
        'Company'=>$link('about'),
        'Get in touch'=>$nav[4],
        'Contact form ↗'=>$nav[4].' ↗',
        'All rights reserved'=>$controls[4],
        'Strategy · Execution · Outcomes'=>$ui[3],
        'Back to top ↑'=>$controls[5]
    );
    // Fail closed to the original English value for an unforeseen new source
    // phrase; never fabricate locale output or rewrite existing UA/RU copy.
    $localized_maps[$locale]=$map;
    return $map[$english]??$english;
}

/**
 * 5-column premium mega-menu is the SAME component as UA/RU.
 * Only its texts and exact internal URLs differ by market.
 */
function mrseo_eu_premium_mega_copy($locale){
 $market=mrseo_eu_market($locale);
 if(!$market)return null;
 $labels=mrseo_eu_service_labels($locale);
 $pages=array_merge(function_exists('mrseo_eu_additional_pages')?mrseo_eu_additional_pages($locale):array(),$market['pages']);
 $problem=function($slug,$i=0)use($pages){
  return $pages[$slug]['problems'][$i][0]??'';
 };
 $groups=array(
  'seo'=>array('title'=>$labels['seo'],'lead'=>$pages['seo']['lead'],'topics'=>array($problem('seo-audit'),$problem('seo'))),
  'ads'=>array('title'=>$labels['google-ads'],'lead'=>$pages['google-ads']['lead'],'topics'=>array($problem('google-ads'),$problem('google-ads',1))),
  'commerce'=>array('title'=>$labels['ecommerce-seo'],'lead'=>$pages['ecommerce-seo']['lead'],'topics'=>array($problem('ecommerce-seo'),$problem('online-shop-development'))),
  'dev'=>array('title'=>$labels['web-development'],'lead'=>$pages['web-development']['lead'],'topics'=>array($problem('web-development'),$problem('web-development',1),$problem('website-design'))),
  'data'=>array('title'=>$labels['analytics'],'lead'=>$pages['analytics']['lead'],'topics'=>array($problem('analytics'),$problem('analytics',1),$problem('analytics',2)))
 );
 return array(
  'intro'=>$market['nav'][0],
  'headline'=>$market['ui'][1],
  'summary'=>$pages['']['lead'],
  'more'=>$market['ui'][2],
  'ctaHeading'=>$market['nav'][5],
  'ctaText'=>$pages['contact']['lead'],
  'cta'=>$market['nav'][5],
  'sections'=>$groups,
  'links'=>$labels
 );
}
