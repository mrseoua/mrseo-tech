<?php
/**
 * Reversible five-column service navigation pilot.
 * Do not invent routes: missing subservice landing pages are text, not anchors.
 * Default Ukrainian and four primary markets have the approved service taxonomy;
 * other EU markets reuse existing native-language service labels and page copy.
 */
if (!defined('ABSPATH')) exit;

function mrseo_trial_menu_translations() {
 static $all=null;
 if($all!==null)return $all;
 $json=<<<'MRSEO_TRIAL_NAV_JSON'
{
 "uk":{
  "seo":["SEO-просування","Допомагаємо клієнтам знаходити ваш бізнес у Google.","Локальне SEO","SEO інтернет-магазинів","SEO сайтів послуг","Міжнародне SEO","SEO-аудит"],
  "ads":["Google Ads","Реклама, яка приводить потрібних клієнтів.","Пошукова реклама Google","Google Shopping та Performance Max","Google Ads для локального бізнесу","Аудит Google Ads","Google Merchant Center"],
  "commerce":["Інтернет-магазини","Створення, розвиток і автоматизація продажів.","Створення інтернет-магазинів","Інтернет-магазини на Хорошоп","Збільшення конверсії магазину","Автоматизація інтернет-магазину","Модернізація та перенесення магазину"],
  "sites":["Створення сайтів","Сайти, які представляють бізнес і збирають заявки.","Сайти для локального бізнесу","Сайти послуг","Лендінги для реклами","Корпоративні сайти","Редизайн та оновлення сайтів"],
  "dev":["Веброзробка","Вирішуємо технічні проблеми та автоматизуємо процеси.","Підтримка та доопрацювання сайтів","Інтеграції та автоматизація","Оптимізація, безпека та доступність","CRM та особисті кабінети","Вебзастосунки та MVP"],
  "bottom":["Не знайшли свою задачу?","Опишіть проблему або ідею — підкажемо, з чого почати.","Обговорити проєкт"]
 },
 "ru":{
  "seo":["SEO-продвижение","Помогаем клиентам находить ваш бизнес в Google.","Локальное SEO","SEO интернет-магазинов","SEO сайтов услуг","Международное SEO","SEO-аудит"],
  "ads":["Google Ads","Реклама для привлечения нужных клиентов.","Поисковая реклама Google","Google Shopping и Performance Max","Google Ads для локального бизнеса","Аудит Google Ads","Google Merchant Center"],
  "commerce":["Интернет-магазины","Создание, развитие и автоматизация продаж.","Создание интернет-магазинов","Интернет-магазины на Хорошоп","Повышение конверсии магазина","Автоматизация интернет-магазина","Модернизация и перенос магазина"],
  "sites":["Создание сайтов","Сайты для доверия к бизнесу и новых заявок.","Сайты для локального бизнеса","Сайты услуг","Лендинги для рекламы","Корпоративные сайты","Редизайн и обновление сайтов"],
  "dev":["Веб-разработка","Решаем технические проблемы и автоматизируем процессы.","Поддержка и доработка сайтов","Интеграции и автоматизация","Оптимизация, безопасность и доступность","CRM и личные кабинеты","Веб-приложения и MVP"],
  "bottom":["Не нашли нужную услугу?","Расскажите о задаче — подскажем, как её решить.","Обсудить проект"]
 },
 "en":{
  "seo":["SEO services","Help customers find your business in Google.","Local SEO","E-commerce SEO","SEO for service businesses","International SEO","SEO audit"],
  "ads":["Google Ads","Campaigns built around real customer demand.","Google Search Ads","Google Shopping & Performance Max","Local business advertising","Google Ads audit","Google Merchant Center"],
  "commerce":["E-commerce","Build, improve and automate online stores.","E-commerce website development","WooCommerce & Shopify stores","Conversion optimisation","E-commerce automation","Store redesign & migration"],
  "sites":["Website creation","Websites that build trust and generate enquiries.","Local business websites","Service business websites","Landing pages for ads","Corporate websites","Website redesign"],
  "dev":["Web development","Fix technical issues and build useful integrations.","Website maintenance & fixes","Integrations & automation","Speed, security & accessibility","CRM & customer portals","Web apps & MVP development"],
  "bottom":["Have a project or a problem?","Tell us what is not working or what you want to build.","Discuss your project"]
 },
 "pl":{
  "seo":["Pozycjonowanie SEO","Pomagamy klientom znaleźć Twoją firmę w Google.","SEO lokalne","SEO sklepów internetowych","SEO stron usługowych","SEO międzynarodowe","Audyt SEO"],
  "ads":["Google Ads","Reklamy nastawione na realne zapytania klientów.","Reklamy w wyszukiwarce Google","Google Shopping i Performance Max","Google Ads dla lokalnych firm","Audyt Google Ads","Google Merchant Center"],
  "commerce":["Sklepy internetowe","Tworzenie, rozwój i automatyzacja sprzedaży.","Tworzenie sklepów internetowych","Sklepy WooCommerce i Shopify","Optymalizacja konwersji sklepu","Automatyzacja sklepu","Modernizacja i migracja sklepu"],
  "sites":["Tworzenie stron","Strony budujące zaufanie i pozyskujące zapytania.","Strony dla lokalnych firm","Strony firm usługowych","Landing page do reklam","Strony firmowe","Redesign i modernizacja stron"],
  "dev":["Web development","Rozwiązujemy problemy techniczne i automatyzujemy pracę.","Opieka i rozbudowa stron","Integracje i automatyzacja","Szybkość, bezpieczeństwo i dostępność","CRM i panele klientów","Aplikacje webowe i MVP"],
  "bottom":["Nie widzisz odpowiedniej usługi?","Opisz potrzebę lub problem — zaproponujemy rozwiązanie.","Porozmawiajmy o projekcie"]
 },
 "es":{
  "seo":["Posicionamiento SEO","Ayudamos a que te encuentren quienes necesitan tus servicios.","SEO local","SEO para tiendas online","SEO para empresas de servicios","SEO internacional","Auditoría SEO"],
  "ads":["Google Ads","Campañas para conseguir consultas útiles, no solo clics.","Anuncios en la Búsqueda de Google","Google Shopping y productos","Google Ads para negocios locales","Auditoría Google Ads","Google Merchant Center"],
  "commerce":["Tiendas online","Creamos, mejoramos y automatizamos procesos de venta.","Creación de tiendas online","WooCommerce y Shopify","Optimización de conversión","Automatización del catálogo","Migración de tiendas online"],
  "sites":["Diseño y creación web","Webs claras que generan confianza y facilitan el contacto.","Creación de páginas web","Webs para profesionales","Landing pages para anuncios","Páginas web corporativas","Rediseño y renovación web"],
  "dev":["Desarrollo web","Soluciones técnicas que simplifican el trabajo diario.","Mantenimiento WordPress","Integraciones y automatización","Velocidad y seguridad","CRM y áreas de clientes","Aplicaciones web y MVP"],
  "bottom":["¿No encuentras lo que necesitas?","Cuéntanos el problema y estudiaremos una solución concreta.","Hablemos de tu proyecto"]
 },
 "it":{
  "seo":["Posizionamento SEO","Aiutiamo le persone a trovare la tua attività su Google.","SEO locale","SEO per e-commerce","SEO per aziende di servizi","SEO internazionale","Audit SEO"],
  "ads":["Google Ads","Campagne orientate a contatti pertinenti, non solo a clic.","Annunci nella Ricerca Google","Google Shopping","Google Ads per attività locali","Audit Google Ads","Google Merchant Center"],
  "commerce":["Negozi online","Creiamo, miglioriamo e automatizziamo il percorso di acquisto.","Creazione e-commerce","WooCommerce e Shopify","Ottimizzazione delle conversioni","Automazione del catalogo","Migrazione del negozio"],
  "sites":["Creazione siti web","Siti chiari che presentano i servizi e facilitano i contatti.","Creazione di siti professionali","Siti per professionisti","Landing page per campagne","Siti aziendali","Restyling del sito"],
  "dev":["Sviluppo web","Risolviamo problemi tecnici e semplifichiamo i processi.","Manutenzione WordPress","Integrazioni e automazione","Velocità e sicurezza","CRM e aree clienti","Applicazioni web e MVP"],
  "bottom":["Non trovi il servizio adatto?","Descrivi il problema: valuteremo una soluzione concreta.","Parliamo del progetto"]
 },
 "fr":{
  "seo":["Référencement SEO","Des pages utiles pour répondre aux recherches de vos clients.","SEO local","SEO pour les boutiques en ligne","SEO des entreprises de services","SEO international","Audit SEO"],
  "ads":["Google Ads","Des campagnes pour obtenir des contacts réellement pertinents.","Annonces sur le Réseau de Recherche","Google Shopping","Google Ads local","Audit Google Ads","Google Merchant Center"],
  "commerce":["E-commerce","Création, optimisation et automatisation des boutiques.","Création de boutique en ligne","WooCommerce et Shopify","Optimisation des conversions","Automatisation du catalogue","Migration de boutique"],
  "sites":["Création de sites","Des sites clairs qui inspirent confiance et facilitent les demandes.","Création de site professionnel","Sites pour prestataires","Landing pages publicitaires","Sites institutionnels","Refonte de site"],
  "dev":["Développement web","Résoudre les problèmes techniques et simplifier les processus.","Maintenance WordPress","Intégrations et automatisation","Performance et sécurité","CRM et espaces clients","Applications web et MVP"],
  "bottom":["Votre besoin ne figure pas ici ?","Expliquez votre problème : nous proposerons des pistes concrètes.","Parlons de votre projet"]
 },
 "da":{
  "seo": [
    "SEO og synlighed i søgninger",
    "Gør det nemt for de rigtige kunder at finde din virksomhed.",
    "Lokal SEO",
    "SEO til webshops",
    "SEO til servicevirksomheder",
    "International SEO",
    "SEO-analyse"
  ],
  "ads": [
    "Google Ads",
    "Kampagner med klare mål og verificerbare resultater.",
    "Administration af Google Ads",
    "Google Shopping",
    "Google Ads til lokale virksomheder",
    "Google Ads-gennemgang",
    "Google Merchant Center"
  ],
  "commerce": [
    "E-handel",
    "Byg, forbedr og automatisér din webshop.",
    "Udvikling af webshops",
    "WooCommerce og Shopify",
    "Konverteringsoptimering",
    "Automatisering af kataloger",
    "Migrering af webshops"
  ],
  "sites": [
    "Webdesign",
    "Hjemmesider, der forklarer tilbuddet og gør kontakt enkel.",
    "Professionelle hjemmesider",
    "Hjemmesider til servicevirksomheder",
    "Landingssider",
    "Virksomhedshjemmesider",
    "Redesign af hjemmesider"
  ],
  "dev": [
    "Webudvikling",
    "Løs tekniske problemer og automatisér arbejdsgange.",
    "WordPress-vedligeholdelse",
    "API-integrationer",
    "Hastighed og sikkerhed",
    "Skræddersyet webudvikling",
    "Webapplikationer og portaler"
  ],
  "bottom": [
    "Finder du ikke den rette ydelse?",
    "Beskriv problemet eller projektet, så taler vi om næste skridt.",
    "Fortæl om projektet"
  ]
},
 "sv":{
  "seo": [
    "SEO och synlighet i sök",
    "Hjälp rätt kunder att hitta ert företag.",
    "Lokal SEO",
    "SEO för webbutiker",
    "SEO för tjänsteföretag",
    "Internationell SEO",
    "SEO-granskning"
  ],
  "ads": [
    "Google Ads",
    "Kampanjer med tydliga mål och verifierbara resultat.",
    "Google Ads-förvaltning",
    "Google Shopping",
    "Google Ads för lokala företag",
    "Google Ads-granskning",
    "Google Merchant Center"
  ],
  "commerce": [
    "E-handel",
    "Bygg, förbättra och automatisera webbutiken.",
    "Utveckling av webbutiker",
    "WooCommerce och Shopify",
    "Konverteringsoptimering",
    "Automatisering av kataloger",
    "Migrering av webbutiker"
  ],
  "sites": [
    "Webbdesign",
    "Webbplatser som förklarar erbjudandet och förenklar kontakt.",
    "Skapa webbplats",
    "Webbplatser för tjänsteföretag",
    "Landningssidor",
    "Företagswebbplatser",
    "Redesign av webbplatser"
  ],
  "dev": [
    "Webbutveckling",
    "Lös tekniska problem och automatisera arbetsflöden.",
    "WordPress-underhåll",
    "API-integrationer",
    "Hastighet och säkerhet",
    "Skräddarsydd webbutveckling",
    "Webbapplikationer och portaler"
  ],
  "bottom": [
    "Hittar ni inte rätt tjänst?",
    "Beskriv problemet eller projektet, så diskuterar vi nästa steg.",
    "Berätta om projektet"
  ]
},
 "pt":{
  "seo": [
    "SEO e visibilidade na pesquisa",
    "Ajudamos os clientes certos a encontrar a sua empresa.",
    "SEO local",
    "SEO para lojas online",
    "SEO para empresas de serviços",
    "SEO internacional",
    "Auditoria SEO"
  ],
  "ads": [
    "Google Ads",
    "Campanhas alinhadas com a oferta e resultados verificáveis.",
    "Gestão de Google Ads",
    "Google Shopping",
    "Google Ads para negócios locais",
    "Auditoria Google Ads",
    "Google Merchant Center"
  ],
  "commerce": [
    "Lojas online",
    "Criamos, otimizamos e ligamos lojas aos seus processos.",
    "Criação de lojas online",
    "WooCommerce e Shopify",
    "Otimização de conversões",
    "Automatização de catálogos",
    "Migração de lojas online"
  ],
  "sites": [
    "Criação de sites",
    "Sites que explicam a oferta e facilitam o contacto.",
    "Criação de sites",
    "Sites para empresas de serviços",
    "Páginas de destino",
    "Sites institucionais",
    "Redesign de sites"
  ],
  "dev": [
    "Desenvolvimento web",
    "Resolvemos problemas técnicos e automatizamos processos.",
    "Manutenção WordPress",
    "Integrações API",
    "Velocidade e segurança",
    "Desenvolvimento web à medida",
    "Aplicações web e portais"
  ],
  "bottom": [
    "Não encontrou o serviço certo?",
    "Descreva o problema ou projeto. Definimos consigo o próximo passo.",
    "Falar sobre o projeto"
  ]
},
 "cs":{
  "seo": [
    "SEO a viditelnost ve vyhledávání",
    "Pomáháme relevantním zákazníkům najít vaši firmu.",
    "Lokální SEO",
    "SEO pro e-shopy",
    "SEO pro firmy poskytující služby",
    "Mezinárodní SEO",
    "SEO audit"
  ],
  "ads": [
    "Google Ads",
    "Kampaně s jasnou nabídkou a měřitelnými výsledky.",
    "Správa Google Ads",
    "Google Shopping",
    "Google Ads pro místní firmy",
    "Audit Google Ads",
    "Google Merchant Center"
  ],
  "commerce": [
    "E-shopy",
    "Tvoříme, optimalizujeme a propojujeme e-shopy.",
    "Tvorba e-shopů",
    "WooCommerce a Shopify",
    "Optimalizace konverzí",
    "Automatizace katalogu",
    "Migrace e-shopu"
  ],
  "sites": [
    "Tvorba webových stránek",
    "Weby, které vysvětlují nabídku a usnadňují kontakt.",
    "Tvorba webu",
    "Weby pro poskytovatele služeb",
    "Vstupní stránky pro reklamu",
    "Firemní weby",
    "Redesign webu"
  ],
  "dev": [
    "Vývoj webu",
    "Řešíme technické problémy a automatizujeme procesy.",
    "Správa WordPressu",
    "API integrace",
    "Rychlost a bezpečnost webu",
    "Vývoj webu na míru",
    "Webové aplikace a portály"
  ],
  "bottom": [
    "Nenašli jste vhodnou službu?",
    "Popište problém nebo projekt. Společně určíme další krok.",
    "Probrat projekt"
  ]
},
 "ro":{
  "seo": [
    "Optimizare SEO",
    "Ajutăm clienții potriviți să găsească afacerea ta în Google.",
    "SEO local",
    "SEO pentru magazine online",
    "SEO pentru firme de servicii",
    "SEO internațional",
    "Audit SEO"
  ],
  "ads": [
    "Google Ads",
    "Campanii pentru cereri relevante și rezultate măsurabile.",
    "Administrare Google Ads",
    "Google Shopping",
    "Google Ads pentru afaceri locale",
    "Audit Google Ads",
    "Google Merchant Center"
  ],
  "commerce": [
    "Magazine online",
    "Construim, optimizăm și conectăm magazine online.",
    "Creare magazin online",
    "WooCommerce și Shopify",
    "Optimizarea conversiilor",
    "Automatizarea catalogului",
    "Migrarea magazinului"
  ],
  "sites": [
    "Creare site-uri web",
    "Site-uri care explică oferta și susțin cererile de contact.",
    "Creare site-uri web",
    "Site-uri pentru firme de servicii",
    "Pagini de destinație pentru reclame",
    "Site-uri corporate",
    "Redesign site"
  ],
  "dev": [
    "Dezvoltare web",
    "Rezolvăm probleme tehnice și automatizăm procese.",
    "Mentenanță WordPress",
    "Integrări API",
    "Viteză, securitate și accesibilitate",
    "Dezvoltare web personalizată",
    "Aplicații web și portaluri"
  ],
  "bottom": [
    "Nu ai găsit serviciul potrivit?",
    "Descrie problema sau proiectul. Stabilim împreună următorul pas.",
    "Discută proiectul"
  ]
},
 "nl":{
   "seo":["SEO & online vindbaarheid","Zorg dat de juiste klanten je in Google vinden.","Lokale SEO","SEO voor webshops","SEO voor dienstverleners","Internationale SEO","SEO-audit"],
   "ads":["Google Ads","Advertenties richten op relevante vragen en meetbare aanvragen.","Google Ads beheer","Google Shopping","Google Ads voor lokale bedrijven","Google Ads-audit","Google Merchant Center"],
   "commerce":["Webshops","Betrouwbare webshops bouwen, verbeteren en verbinden.","Webshop laten maken","WooCommerce & Shopify","Conversieoptimalisatie","Catalogusautomatisering","Webshopmigratie"],
   "sites":["Websites laten maken","Een duidelijke website die vertrouwen en aanvragen ondersteunt.","Websites laten maken","Websites voor dienstverleners","Landingspagina’s voor advertenties","Zakelijke websites","Website moderniseren"],
   "dev":["Webontwikkeling","Systemen slimmer verbinden en concrete werkprocessen verbeteren.","WordPress onderhoud","API-koppelingen","Snelheid & beveiliging","Maatwerk webontwikkeling","Webapplicaties & klantportalen"],
   "bottom":["Staat jouw vraag er niet bij?","Beschrijf wat er vastloopt. We bespreken een gerichte aanpak.","Bespreek je project"]
  },
  "de":{
  "seo":["SEO & Suchmaschinenoptimierung","Damit Kunden Ihr Unternehmen bei Google finden.","Lokales SEO","SEO für Onlineshops","SEO für Dienstleister","Internationales SEO","SEO-Audit"],
  "ads":["Google Ads","Anzeigen für relevante Anfragen potenzieller Kunden.","Google Suchanzeigen","Google Shopping","Google Ads für lokale Unternehmen","Google Ads Audit","Google Merchant Center"],
  "commerce":["Onlineshops","Shops erstellen, verbessern und automatisieren.","Onlineshop-Erstellung","WooCommerce & Shopify","Conversion-Optimierung im Shop","Shop-Automatisierung","Shop-Relaunch & Migration"],
  "sites":["Website-Erstellung","Websites, die Vertrauen schaffen und Anfragen gewinnen.","Websites für lokale Unternehmen","Websites für Dienstleister","Landingpages für Anzeigen","Unternehmenswebsites","Website-Relaunch"],
  "dev":["Webentwicklung","Technische Probleme lösen und Abläufe automatisieren.","Website-Wartung und Anpassungen","Integrationen & Automatisierung","Performance und Sicherheit","CRM & Kundenportale","Webanwendungen & MVP"],
  "bottom":["Sie finden Ihre Leistung nicht?","Beschreiben Sie Ihr Projekt oder Problem — wir klären die nächsten Schritte.","Projekt besprechen"]
 }
}
MRSEO_TRIAL_NAV_JSON;
 $all=json_decode($json,true,512,JSON_THROW_ON_ERROR);
 if(function_exists('mrseo_final_market_codes'))foreach(mrseo_final_market_codes() as $locale=>$code){
  $market=mrseo_final_market_data($locale);
  if(!empty($market['nav']))$all[$locale]=$market['nav'];
 }
 return $all;
}

function mrseo_trial_menu_native($locale) {
 $copy=mrseo_trial_menu_translations();
 if(isset($copy[$locale]))return $copy[$locale];
 // Fifteen additional EU markets: load the existing native-language adapter.
 // The legacy renderer loaded this lazily; the trial renderer must do so itself.
 require_once __DIR__.'/eu-orbit-copy.php';
 if(!function_exists('mrseo_eu_service_labels') || !function_exists('mrseo_eu_premium_mega_copy'))return $copy['uk'];
 $labels=mrseo_eu_service_labels($locale);
 $native=mrseo_eu_premium_mega_copy($locale);
 if(!$native || !$labels)return $copy['uk'];
 $groups=$native['sections'];
 return array(
  'seo'=>array($labels['seo'],$groups['seo']['lead'],$labels['seo'],$labels['ecommerce-seo'],$labels['seo-audit']),
  'ads'=>array($labels['google-ads'],$groups['ads']['lead'],$labels['google-ads'],$groups['ads']['topics'][0]??'',$groups['ads']['topics'][1]??''),
  'commerce'=>array($labels['online-shop-development'],$groups['commerce']['lead'],$labels['online-shop-development'],$groups['commerce']['topics'][0]??'',$groups['commerce']['topics'][1]??''),
  'sites'=>array($labels['website-design'],$native['summary'],$labels['website-design']),
  'dev'=>array($labels['web-development'],$groups['dev']['lead'],$labels['web-development'],$groups['dev']['topics'][0]??'',$groups['dev']['topics'][1]??''),
  'bottom'=>array($native['ctaHeading'],$native['ctaText'],$native['cta'])
 );
}

function mrseo_trial_menu_route_map($locale) {
 // 25 Ukrainian menu options now have a real, independent landing page.
 if($locale==='uk'){
  return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','performance-max','local-google-ads','google-ads-audit','merchant-center'),
   'commerce'=>array('online-store-development','horoshop','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('local-business-websites','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('website-maintenance','api-integrations','website-speed-security','web-development','web-applications')
  );
 }
 if($locale==='ru'){
  // Each service below has a complete genuine RU landing page — no placeholder links.
  return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','performance-max','local-google-ads','google-ads-audit','merchant-center'),
   'commerce'=>array('online-store-development','horoshop','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('local-business-websites','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('website-maintenance','api-integrations','website-speed-security','web-development','web-applications')
  );
 }
 if($locale==='en')return array(
  'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
  'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
  'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
  'sites'=>array('local-business-websites','service-websites','landing-pages','corporate-websites','website-redesign'),
  'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
 );
 if($locale==='pl')return array(
  'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
  'ads'=>array('google-ads','google-shopping','local-google-ads','audyt-google-ads','problemy-merchant-center'),
  'commerce'=>array('tworzenie-sklepow-internetowych','sklepy-woocommerce-shopify','store-conversion','catalog-automation','store-migration'),
  'sites'=>array('tworzenie-stron-internetowych','service-websites','landing-pages','corporate-websites','website-redesign'),
  'dev'=>array('opieka-wordpress','api-integrations','website-speed-security','web-development','web-applications')
 );
 if($locale==='nl')return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
   'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
  );
 if($locale==='ro')return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
   'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
  );
 if($locale==='cs')return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
   'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
  );
 if($locale==='pt')return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
   'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
  );
 if($locale==='sv')return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
   'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
  );
 if($locale==='da')return array(
   'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
   'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
   'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
   'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
   'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
  );
 if(function_exists('mrseo_final_market_codes') && isset(mrseo_final_market_codes()[$locale]))return mrseo_final_market_routes();
  if($locale==='es')return array(
  'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
  'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
  'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
  'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
  'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
 );
 if($locale==='it')return array(
  'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
  'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
  'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
  'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
  'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
 );
 if($locale==='fr')return array(
  'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
  'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
  'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
  'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
  'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
 );
 if($locale==='de')return array(
  'seo'=>array('local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'),
  'ads'=>array('google-ads','google-shopping','local-google-ads','google-ads-audit','merchant-center-help'),
  'commerce'=>array('online-shop-development','woocommerce-shopify-stores','store-conversion','catalog-automation','store-migration'),
  'sites'=>array('website-design','service-websites','landing-pages','corporate-websites','website-redesign'),
  'dev'=>array('wordpress-care','api-integrations','website-speed-security','web-development','web-applications')
 );
 return array(
  'seo'=>array('seo','ecommerce-seo','seo-audit'),
  'ads'=>array('google-ads',null,null),
  'commerce'=>array('online-shop-development',null,null),
  'sites'=>array('website-design'),
  'dev'=>array('web-development',null,null)
 );
}

function mrseo_trial_menu_valid($slug,$locale) {
 if(!$slug)return false;
 if($locale==='uk' && function_exists('mrseo_ua_website_slugs')
    && in_array($slug,mrseo_ua_website_slugs(),true))return true;
 if($locale==='ru' && function_exists('mrseo_ru_website_slugs')
    && in_array($slug,mrseo_ru_website_slugs(),true))return true;
 if(in_array($locale,array('uk','ru'),true)){
  if(in_array($slug,array('seo','seo-audit','ecommerce-seo','google-ads','performance-max','horoshop','web-development','service-websites','analytics'),true))return true;
  return function_exists('mrseo_new_service_copy') && (bool)mrseo_new_service_copy($slug,$locale);
 }
 if($locale==='en'){
  return (function_exists('mrseo_en_gb_slugs') && in_array($slug,mrseo_en_gb_slugs(),true))
    || (function_exists('mrseo_uk_market_slugs') && in_array($slug,mrseo_uk_market_slugs(),true))
    || in_array($slug,array('seo','seo-audit','ecommerce-seo','google-ads','performance-max','service-websites','web-development','analytics'),true);
 }
 if($locale==='pl'){
  return (function_exists('mrseo_pl_service_slugs') && in_array($slug,mrseo_pl_service_slugs(),true))
    || (function_exists('mrseo_int_pages') && in_array($slug,mrseo_int_pages(),true));
 }
 if($locale==='de')return (function_exists('mrseo_de_service_slugs') && in_array($slug,mrseo_de_service_slugs(),true))
    || (function_exists('mrseo_int_pages') && in_array($slug,mrseo_int_pages(),true));
 if($locale==='fr')return (function_exists('mrseo_fr_service_slugs') && in_array($slug,mrseo_fr_service_slugs(),true))
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 if($locale==='it')return (function_exists('mrseo_it_service_slugs') && in_array($slug,mrseo_it_service_slugs(),true))
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 if($locale==='nl')return (function_exists('mrseo_nl_service_slugs') && in_array($slug,mrseo_nl_service_slugs(),true))
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 if($locale==='ro')return (function_exists('mrseo_ro_service_slugs') && in_array($slug,mrseo_ro_service_slugs(),true))
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 if($locale==='cs')return (function_exists('mrseo_cs_service_slugs') && in_array($slug,mrseo_cs_service_slugs(),true))
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 if($locale==='pt')return (function_exists('mrseo_pt_service_slugs') && in_array($slug,mrseo_pt_service_slugs(),true))
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 if($locale==='sv')return (function_exists('mrseo_sv_service_slugs') && in_array($slug,mrseo_sv_service_slugs(),true))
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 if($locale==='da')return (function_exists('mrseo_da_service_slugs') && in_array($slug,mrseo_da_service_slugs(),true))
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 if(function_exists('mrseo_final_market_codes') && isset(mrseo_final_market_codes()[$locale]))return in_array($slug,mrseo_final_market_slugs($locale),true)
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 if($locale==='es')return (function_exists('mrseo_es_service_slugs') && in_array($slug,mrseo_es_service_slugs(),true))
    || (function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true));
 return function_exists('mrseo_eu_slugs') && in_array($slug,mrseo_eu_slugs(),true);
}

function mrseo_trial_menu_parent($key,$locale){
 if($key==='seo')return 'seo';
 if($key==='ads')return 'google-ads';
 if($key==='commerce'){
  if(in_array($locale,array('uk','ru'),true))return 'online-store-development';
  if($locale==='en')return 'online-shop-development';
  if($locale==='pl')return 'tworzenie-sklepow-internetowych';
  if($locale==='de')return 'online-shop-development';
  return 'online-shop-development';
 }
 if($key==='sites'){
  if(in_array($locale,array('uk','ru'),true))return 'service-websites';
  if($locale==='en')return 'website-design';
  if($locale==='pl')return 'tworzenie-stron-internetowych';
  if($locale==='de')return 'website-design';
  return 'website-design';
 }
 return 'web-development';
}

function mrseo_render_mega_menu_trial($mobile=false){
 $locale=mrseo_locale();
 $copy=mrseo_trial_menu_native($locale);
 $routes=mrseo_trial_menu_route_map($locale);
 $current=mrseo_slug();
 $keys=array('seo','ads','commerce','sites','dev');
 echo '<div class="mrseo-mega mrseo-mega--trial'.($mobile?' mrseo-mega--mobile-panel':'').'">';
 echo '<div class="mrseo-mega-grid">';
 foreach($keys as $key){
  $group=$copy[$key]??null;
  if(!$group)continue;
  $parent=mrseo_trial_menu_parent($key,$locale);
  $parent_live=mrseo_trial_menu_valid($parent,$locale);
  echo '<section class="mrseo-mega-group mrseo-mega-group--'.esc_attr($key).'">';
  echo '<h3>'.mrseo_mega_menu_icon($key);
  if($parent_live){
   echo '<a class="mrseo-mega-heading-link" href="'.esc_url(mrseo_url($parent,$locale)).'">'.esc_html($group[0]).'</a>';
  }else echo '<span>'.esc_html($group[0]).'</span>';
  echo '</h3>';
  echo '<p class="mrseo-mega-lead">'.esc_html($group[1]).'</p>';
  echo '<div class="mrseo-mega-items">';
  foreach(array_slice($group,2) as $i=>$name){
   if(!$name)continue;
   $slug=$routes[$key][$i]??null;
   $live=mrseo_trial_menu_valid($slug,$locale);
   if($live){
    $active=$current===$slug;
    echo '<a class="mrseo-mega-item'.($active?' is-current':'').'" href="'.esc_url(mrseo_url($slug,$locale)).'"'.($active?' aria-current="page"':'').'>'.esc_html($name).'</a>';
   }else{
    // The offer is visible in the pilot but has no dedicated indexed route yet.
    echo '<span class="mrseo-mega-item mrseo-mega-item--planned">'.esc_html($name).'</span>';
   }
  }
  echo '</div></section>';
 }
 echo '</div><div class="mrseo-mega-bottom"><div class="mrseo-mega-bottom-copy">';
 echo '<strong>'.esc_html($copy['bottom'][0]).'</strong><p>'.esc_html($copy['bottom'][1]).'</p></div>';
 echo '<a class="mrseo-mega-contact" href="'.esc_url(mrseo_url('contact',$locale)).'">'.esc_html($copy['bottom'][2]).'<span aria-hidden="true">↗</span></a>';
 echo '</div></div>';
}
