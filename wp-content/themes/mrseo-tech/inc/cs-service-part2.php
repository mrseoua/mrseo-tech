<?php
if(!defined('ABSPATH'))exit;
/** Original Czech-market copy; examples are illustrative, not client results. */
function mrseo_cs_service_part2(){return json_decode(<<<'MRSEO_CS_P2'
{
  "store-migration": {
    "title": "Migrace e-shopu | MrSeo.tech",
    "description": "Migrace e-shopu: převod katalogu a obsahu, mapování URL a přesměrování 301, testy nákupu a produktových feedů.",
    "kicker": "MIGRACE E-SHOPU",
    "hero": [
      "Migrace e-shopu.",
      "Jak zachovat návštěvnost a objednávky?"
    ],
    "lead": "Přechod mezi platformami znamená změny katalogu, adres, obsahu i objednávkových procesů. Připravíme inventář, mapování a testování, aby spuštění zbytečně nepřerušilo prodej.",
    "intro": "Co se nesmí při migraci ztratit?",
    "introText": "Nejdříve ověříme stávající data, odkazy a závislosti jednotlivých systémů.",
    "problems": [
      [
        "Zmizelé adresy",
        "Staré odkazy vedou po spuštění na chybu 404.",
        "Připravíme mapování relevantních cílových URL."
      ],
      [
        "Neúplný převod",
        "Varianty nebo obrázky se nepřevedou správně.",
        "Ověříme vzorky před přepnutím platformy."
      ],
      [
        "Nefunkční nákup",
        "Platby nebo doprava přestanou fungovat.",
        "Otestujeme kritické procesy mimo produkci."
      ]
    ],
    "process": [
      [
        "Inventura",
        "Sepíšeme data, URL a kritické integrace."
      ],
      [
        "Mapování",
        "Přiřadíme staré položky a adresy k novým cílům."
      ],
      [
        "Testování",
        "Prověříme importy, přesměrování, košík a platby."
      ],
      [
        "Spuštění a dohled",
        "Sledujeme dostupnost důležitých stránek a závady."
      ]
    ],
    "outcomes": [
      [
        "Inventář migrace",
        "URL, produkty, obsah a závislosti."
      ],
      [
        "Plán přesměrování",
        "Mapa 301 na obsahově odpovídající stránky."
      ],
      [
        "Kontrolní seznam",
        "Testy před spuštěním a následný dohled."
      ]
    ],
    "faq": [
      [
        "Zůstanou pozice beze změny?",
        "Nelze zaručit. Omezujeme technické ztráty a vývoj sledujeme."
      ],
      [
        "Lze přenést historické objednávky?",
        "Záleží na exportu a možnostech cílové platformy."
      ],
      [
        "Je možné testovat před spuštěním?",
        "Ano, v samostatném prostředí s vhodnými daty."
      ]
    ],
    "example": [
      "MODELOVÁ SITUACE",
      "E-shop přechází ze staršího řešení na WooCommerce a mění adresy kategorií.",
      "Připravíme mapu URL, převod produktů a kontrolu objednávek.",
      "Po přepnutí ověříme staré odkazy, nákupní proces a feed."
    ],
    "visual": [
      "STARÝ",
      "PŘEVOD",
      "NOVÝ"
    ],
    "risk": "I při pečlivé migraci může organická návštěvnost dočasně kolísat.",
    "related": [
      [
        "woocommerce-shopify-stores",
        "E-shopy na WooCommerce a Shopify",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ],
      [
        "ecommerce-seo",
        "SEO pro e-shopy",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ]
    ],
    "cta": "Probrat migraci e-shopu"
  },
  "service-websites": {
    "title": "Tvorba webů pro poskytovatele služeb | MrSeo.tech",
    "description": "Tvorba webů pro poskytovatele služeb: obchodní struktura, přehledné stránky, responzivní design a funkční poptávkové formuláře.",
    "kicker": "TVORBA WEBŮ PRO POSKYTOVATELE SLUŽEB",
    "hero": [
      "Weby pro poskytovatele služeb.",
      "Rozumí návštěvník vaší nabídce?"
    ],
    "lead": "Tvoříme weby pro firmy, které potřebují vysvětlit jednotlivé služby a získávat kvalifikované poptávky. Obsah, strukturu a formulář navrhujeme podle skutečných rozhodnutí zákazníka.",
    "intro": "Co musí zákazník vědět před kontaktem?",
    "introText": "Nejdříve řešíme nabídku, podmínky a praktický postup, až potom vzhled jednotlivých šablon.",
    "problems": [
      [
        "Smíšené služby",
        "Návštěvník nerozezná, která služba řeší jeho problém.",
        "Rozdělíme nabídku do srozumitelných cest."
      ],
      [
        "Chybějící důvěra",
        "Web neukazuje podmínky ani ověřené zkušenosti.",
        "Uspořádáme potvrzené podklady firmy."
      ],
      [
        "Složitý formulář",
        "Na mobilu je těžké odeslat poptávku.",
        "Zjednodušíme pole a prověříme odesílání."
      ]
    ],
    "process": [
      [
        "Obchodní zadání",
        "Vymezíme služby, zákazníky a ověřené podklady."
      ],
      [
        "Struktura",
        "Navrhneme stránky a relevantní kontaktní cesty."
      ],
      [
        "Tvorba",
        "Realizujeme šablony a přehledné formuláře na mobilu."
      ],
      [
        "Předání",
        "Ověříme navigaci, validaci a doručování poptávek."
      ]
    ],
    "outcomes": [
      [
        "Obchodní struktura",
        "Mapa stránek a zákaznických cest."
      ],
      [
        "Responzivní web",
        "Dohodnuté šablony, obsah a ovládání."
      ],
      [
        "Ověřený kontakt",
        "Kontrola formuláře a notifikací."
      ]
    ],
    "faq": [
      [
        "Píšete také texty?",
        "Rozsah obsahu domluvíme a údaje ověříme s firmou."
      ],
      [
        "Používáte WordPress?",
        "Ano, pokud odpovídá správě a technickým požadavkům."
      ],
      [
        "Je v ceně dlouhodobé SEO?",
        "Ne automaticky. Tvorba webu a propagace jsou samostatné služby."
      ]
    ],
    "example": [
      "MODELOVÁ SITUACE",
      "Firma provádějící rekonstrukce má jedinou stránku a telefon bez vysvětlení služeb.",
      "Navrhneme jednotlivé nabídky a jednoduchou poptávkovou cestu.",
      "Otestujeme navigaci a odeslání formuláře na mobilu."
    ],
    "visual": [
      "NABÍDKA",
      "STRÁNKA",
      "KONTAKT"
    ],
    "risk": "Cena a termín závisejí na rozsahu obsahu, počtu stránek, integracích a schválení podkladů.",
    "related": [
      [
        "service-business-seo",
        "SEO pro firmy poskytující služby",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ],
      [
        "website-design",
        "Tvorba webových stránek",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ]
    ],
    "cta": "Probrat web pro služby"
  },
  "landing-pages": {
    "title": "Vstupní stránky pro reklamu | MrSeo.tech",
    "description": "Tvorba landing page pro PPC reklamy: konkrétní nabídka, responzivní design, formulář a ověření měření konverzí.",
    "kicker": "VSTUPNÍ STRÁNKY PRO REKLAMU",
    "hero": [
      "Vstupní stránky pro reklamu.",
      "Mění se kliknutí v poptávky?"
    ],
    "lead": "Vstupní stránka musí splnit očekávání vyvolané reklamou. Navrhujeme jasnou nabídku, odpovědi na otázky a jedinou hlavní akci s ověřeným měřením.",
    "intro": "Kde se rozchází reklama s obsahem stránky?",
    "introText": "Prověříme shodu sdělení, ovládání na mobilu a cestu od návštěvy ke kontaktu.",
    "problems": [
      [
        "Jiná nabídka",
        "Reklama slibuje konkrétní službu, stránka popisuje celou firmu.",
        "Sladíme nadpis a obsah se záměrem kampaně."
      ],
      [
        "Příliš mnoho akcí",
        "Návštěvník neví, kam kliknout.",
        "Určíme hlavní krok a zjednodušíme rozhraní."
      ],
      [
        "Neověřené měření",
        "Kliknutí se evidují, ale poptávky ne.",
        "Otestujeme formulář a konverzní událost."
      ]
    ],
    "process": [
      [
        "Cíl kampaně",
        "Určíme nabídku, publikum a očekávanou akci."
      ],
      [
        "Obsah",
        "Připravíme argumenty, podmínky a odpovědi na námitky."
      ],
      [
        "Implementace",
        "Vytvoříme stránku a dohodnuté měřicí události."
      ],
      [
        "Test",
        "Prověříme odeslání, potvrzení a správné měření."
      ]
    ],
    "outcomes": [
      [
        "Sdělení nabídky",
        "Obsahové zadání pro danou kampaň."
      ],
      [
        "Vstupní stránka",
        "Čitelné rozhraní a hlavní akce."
      ],
      [
        "Test konverze",
        "Kontrola formuláře, potvrzení a měření."
      ]
    ],
    "faq": [
      [
        "Jedna stránka pro všechny kampaně?",
        "Pouze pokud mají stejný záměr a stejnou nabídku."
      ],
      [
        "Spravujete zároveň reklamu?",
        "Jen pokud si sjednáme i samostatnou správu kampaní."
      ],
      [
        "Může být stránka na současné doméně?",
        "Obvykle ano, po ověření přístupu a platformy."
      ]
    ],
    "example": [
      "MODELOVÁ SITUACE",
      "Reklama na montáž klimatizace vede na obecnou stránku stavební firmy.",
      "Připravíme samostatnou stránku s podmínkami montáže a kontaktem.",
      "Ověříme návaznost na reklamu a měření poptávky."
    ],
    "visual": [
      "REKLAMA",
      "NABÍDKA",
      "POPTÁVKA"
    ],
    "risk": "Výsledek závisí také na kvalitě kampaně, ceně, poptávce a rychlosti reakce firmy.",
    "related": [
      [
        "google-ads",
        "Správa Google Ads",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ],
      [
        "local-google-ads",
        "Google Ads pro místní firmy",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ]
    ],
    "cta": "Probrat vstupní stránku"
  },
  "corporate-websites": {
    "title": "Tvorba firemních a prezentačních webů | MrSeo.tech",
    "description": "Tvorba firemních webů: prezentace firmy, kompetencí, služeb a potvrzených projektů s responzivní navigací a kontakty.",
    "kicker": "TVORBA FIREMNÍCH A PREZENTAČNÍCH WEBŮ",
    "hero": [
      "Tvorba firemních webů.",
      "Dokáže web představit vaši firmu?"
    ],
    "lead": "Firemní web má přehledně vysvětlit kompetence, nabídku, divize a potvrzené reference. Navrhneme strukturu pro partnery, zákazníky i další relevantní skupiny návštěvníků.",
    "intro": "Co potřebuje obchodní partner zjistit?",
    "introText": "Informace organizujeme podle skutečného procesu výběru dodavatele.",
    "problems": [
      [
        "Nepřehledné divize",
        "Partner nerozumí rozdílům v nabídce.",
        "Navrhneme architekturu podle publika."
      ],
      [
        "Zastaralý obsah",
        "Dokumenty a údaje nejsou aktuální.",
        "Připravíme inventář a odpovědnosti za správu."
      ],
      [
        "Nejasný kontakt",
        "Není zřejmé, na které oddělení se obrátit.",
        "Vytvoříme relevantní kontaktní cesty."
      ]
    ],
    "process": [
      [
        "Inventář",
        "Shromáždíme potvrzené informace o firmě, divizích a projektech."
      ],
      [
        "Architektura",
        "Určíme stránky, publikum a správce obsahu."
      ],
      [
        "Realizace",
        "Vytvoříme šablony, navigaci a kontaktní cesty."
      ],
      [
        "Ověření",
        "Zkontrolujeme dohledatelnost údajů, ovládání a správu obsahu."
      ]
    ],
    "outcomes": [
      [
        "Architektura webu",
        "Mapa stránek a typů obsahu."
      ],
      [
        "Design a realizace",
        "Konzistentní šablony a responzivní rozhraní."
      ],
      [
        "Správa obsahu",
        "Pravidla aktualizací a dokumentace."
      ]
    ],
    "faq": [
      [
        "Umíte více jazyků?",
        "Ano, pokud jsou k dispozici ověřené podklady a vhodná struktura."
      ],
      [
        "Přidáte reference a certifikáty?",
        "Pouze potvrzené materiály dodané firmou."
      ],
      [
        "Lze propojit kariéru nebo CRM?",
        "Ano, po dohodě o toku dat a dostupných přístupech."
      ]
    ],
    "example": [
      "MODELOVÁ SITUACE",
      "Výrobní firma potřebuje představit tři divize a dokumentaci pro distributory.",
      "Rozdělíme navigaci, kompetence a potvrzené dokumenty.",
      "Ověříme dohledání informací a kontakt na příslušné oddělení."
    ],
    "visual": [
      "FIRMA",
      "STRÁNKY",
      "KONTAKT"
    ],
    "risk": "Nevymýšlíme reference, kanceláře, certifikace ani výsledky bez podkladů.",
    "related": [
      [
        "website-design",
        "Tvorba webových stránek",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ],
      [
        "web-applications",
        "Webové aplikace, CRM a portály",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ]
    ],
    "cta": "Probrat firemní web"
  },
  "website-redesign": {
    "title": "Redesign a modernizace webu | MrSeo.tech",
    "description": "Redesign webu: analýza použitelnosti a struktury, moderní responzivní design, zachování důležitých URL a kontrola spuštění.",
    "kicker": "REDESIGN A MODERNIZACE WEBU",
    "hero": [
      "Redesign a modernizace webu.",
      "Co změnit bez ztráty užitečného obsahu?"
    ],
    "lead": "Modernizace nemusí znamenat zahodit vše, co funguje. Prověříme současné stránky, mobilní ovládání, technické problémy a vyhledávání a zachováme hodnotné adresy a obsah.",
    "intro": "Co má zůstat a co potřebuje změnu?",
    "introText": "Prioritou jsou překážky zákazníků a provozu, nikoli pouze nový vzhled.",
    "problems": [
      [
        "Zastaralé ovládání",
        "Texty a tlačítka se špatně používají na telefonu.",
        "Prověříme čitelnost a navigaci."
      ],
      [
        "Skrytý obsah",
        "Důležité stránky se ztrácejí v menu.",
        "Zmapujeme hierarchii a interní odkazy."
      ],
      [
        "Riziko ztráty SEO",
        "Nové adresy nemají plán přesměrování.",
        "Připravíme mapování a ověření canonical."
      ]
    ],
    "process": [
      [
        "Současný stav",
        "Sepíšeme hodnotné stránky a překážky použití."
      ],
      [
        "Rozsah změn",
        "Rozlišíme zachované části a potřebnou modernizaci."
      ],
      [
        "Realizace",
        "Upravíme šablony a případná přesměrování."
      ],
      [
        "Před spuštěním",
        "Otestujeme zařízení, kontakty a signály SEO."
      ]
    ],
    "outcomes": [
      [
        "Inventář webu",
        "Přehled stránek, komponent a překážek."
      ],
      [
        "Modernizované rozhraní",
        "Dohodnuté šablony a interakce."
      ],
      [
        "Test spuštění",
        "Kontrola navigace, adres a formulářů."
      ]
    ],
    "faq": [
      [
        "Musíme měnit platformu?",
        "Ne, pokud současná zvládne požadované úpravy."
      ],
      [
        "Lze zachovat staré URL?",
        "Kde je to možné, ano; jinak připravíme odpovídající přesměrování."
      ],
      [
        "Řešíte rychlost?",
        "Prověříme výkon a konkrétní práce zahrneme do zadání."
      ]
    ],
    "example": [
      "MODELOVÁ SITUACE",
      "Web poradenské firmy má organické návštěvy, ale kontaktní formulář na telefonu je složitý.",
      "Zachováme důležité adresy a upravíme šablony a poptávkový proces.",
      "Před spuštěním prověříme stránky, formulář a technické SEO."
    ],
    "visual": [
      "PŮVODNÍ",
      "NÁVRH",
      "TEST"
    ],
    "risk": "Samotný redesign nezaručuje růst návštěvnosti nebo poptávek; změny ověřujeme.",
    "related": [
      [
        "website-speed-security",
        "Rychlost, bezpečnost a přístupnost webu",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ],
      [
        "service-websites",
        "Tvorba webů pro poskytovatele služeb",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ]
    ],
    "cta": "Probrat modernizaci webu"
  },
  "wordpress-care": {
    "title": "Správa a údržba WordPressu | MrSeo.tech",
    "description": "Správa WordPressu: kontrolované aktualizace, zálohy, diagnostika závad a ověření funkcí webu po změnách.",
    "kicker": "SPRÁVA A ÚDRŽBA WORDPRESSU",
    "hero": [
      "Správa a údržba WordPressu.",
      "Co se stane po další aktualizaci?"
    ],
    "lead": "WordPress potřebuje kontrolované aktualizace, zálohy a ověření klíčových funkcí. Řešíme údržbu a konkrétní technické závady s dohodnutým rozsahem a postupem návratu.",
    "intro": "Jak omezit riziko výpadků?",
    "introText": "Oddělujeme pravidelnou údržbu, řešení incidentů a vývoj nových funkcí.",
    "problems": [
      [
        "Nekompatibilní aktualizace",
        "Nová verze pluginu poškodí formulář nebo košík.",
        "Prověříme kompatibilitu a testovací postup."
      ],
      [
        "Neověřená záloha",
        "Záloha existuje, ale nikdo nezkusil obnovení.",
        "Posoudíme zálohování a možnost obnovy."
      ],
      [
        "Opakované závady",
        "Stejná chyba se vrací po dílčích opravách.",
        "Prověříme logy a technickou příčinu."
      ]
    ],
    "process": [
      [
        "Technický inventář",
        "Zjistíme verze, pluginy, zálohy a dostupné přístupy."
      ],
      [
        "Testovací prostředí",
        "Prověříme kompatibilitu a reprodukujeme závady."
      ],
      [
        "Zásah",
        "Provedeme dohodnuté změny s možností návratu."
      ],
      [
        "Kontrola",
        "Ověříme formuláře, stránky a nákupní funkce a vše zaznamenáme."
      ]
    ],
    "outcomes": [
      [
        "Plán údržby",
        "Komponenty, četnost a dohodnuté hranice."
      ],
      [
        "Přehled změn",
        "Záznam aktualizací a provedených kontrol."
      ],
      [
        "Postup obnovy",
        "Dohodnutá pravidla zálohy a návratu."
      ]
    ],
    "faq": [
      [
        "Je součástí hosting?",
        "Ne automaticky. Můžeme pracovat se stávajícím hostingem."
      ],
      [
        "Aktualizujete přímo produkci?",
        "U rizikových změn upřednostňujeme test a možnost návratu."
      ],
      [
        "Zahrnuje údržba nové funkce?",
        "Ne, ty mají vlastní zadání a odhad."
      ]
    ],
    "example": [
      "MODELOVÁ SITUACE",
      "Po aktualizaci pluginu přestane web odesílat kontaktní zprávy.",
      "Reprodukujeme chybu, prověříme log a otestujeme opravu.",
      "Ověříme odeslání formuláře a zdokumentujeme změnu."
    ],
    "visual": [
      "ZÁLOHA",
      "ÚPRAVA",
      "TEST"
    ],
    "risk": "Dostupnost podpory a doba reakce se sjednávají. Zálohy neodstraňují všechna provozní rizika.",
    "related": [
      [
        "website-speed-security",
        "Rychlost, bezpečnost a přístupnost webu",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ],
      [
        "api-integrations",
        "API integrace a automatizace",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ]
    ],
    "cta": "Probrat správu WordPressu"
  },
  "api-integrations": {
    "title": "API integrace a automatizace | MrSeo.tech",
    "description": "API integrace a automatizace: propojení CRM, e-shopů a dalších systémů, mapování dat, validace a sledování chyb.",
    "kicker": "API INTEGRACE A AUTOMATIZACE",
    "hero": [
      "API integrace a automatizace.",
      "Přestaňte ručně přepisovat data."
    ],
    "lead": "Propojujeme weby, e-shopy, CRM a interní systémy přes dostupná rozhraní. Nejdříve definujeme, která data se přenášejí, jak se ověřují a co se stane při chybě.",
    "intro": "Kde se ztrácejí data nebo čas?",
    "introText": "Integraci navrhujeme jako řízený tok s ošetřením výjimek a kontrolou oprávnění.",
    "problems": [
      [
        "Ruční přepis",
        "Objednávky a poptávky se zapisují několikrát.",
        "Zmapujeme pole a spouštěcí události."
      ],
      [
        "Duplicitní záznamy",
        "Opakovaný přenos vytvoří stejného zákazníka znovu.",
        "Definujeme stabilní klíče a pravidla opakování."
      ],
      [
        "Tiché výpadky",
        "Přenos selže bez záznamu nebo upozornění.",
        "Navrhneme logy, bezpečné opakování a hlášení."
      ]
    ],
    "process": [
      [
        "Mapa toku",
        "Určíme zdroje, cíle, pole a události."
      ],
      [
        "Technický kontrakt",
        "Prověříme autentizaci, limity, identifikátory a oprávnění."
      ],
      [
        "Implementace",
        "Realizujeme dohodnutý tok s validací a bezpečným opakováním."
      ],
      [
        "Testy",
        "Ověříme běžné přenosy, duplicity, chyby a záznamy."
      ]
    ],
    "outcomes": [
      [
        "Datový kontrakt",
        "Pole, oprávnění a pravidla přenosu."
      ],
      [
        "Otestovaná integrace",
        "Běžné scénáře i chybové stavy."
      ],
      [
        "Provozní dohled",
        "Protokol a dokumentace pro správce."
      ]
    ],
    "faq": [
      [
        "Je vždy nutné API?",
        "Ne. Lze zvážit webhooky nebo autorizované exporty."
      ],
      [
        "Co když externí systém neodpovídá?",
        "Dohodneme omezené opakování, log a upozornění bez duplicit."
      ],
      [
        "Propojíte jakékoli CRM?",
        "Nejdříve ověříme dokumentaci, přístup, cenu a limity."
      ]
    ],
    "example": [
      "MODELOVÁ SITUACE",
      "Český e-shop přepisuje objednávky do účetnictví a CRM ručně.",
      "Navrhneme mapování objednávek a přenos přes dostupné rozhraní.",
      "Otestujeme běžné přenosy, opakování a chybové stavy."
    ],
    "visual": [
      "ZDROJ",
      "API",
      "CRM"
    ],
    "risk": "Rozsah integrace závisí na oprávněních, dostupnosti rozhraní a nákladech externích služeb.",
    "related": [
      [
        "catalog-automation",
        "Automatizace produktového katalogu",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ],
      [
        "web-applications",
        "Webové aplikace, CRM a portály",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ]
    ],
    "cta": "Probrat propojení systémů"
  },
  "website-speed-security": {
    "title": "Rychlost, bezpečnost a přístupnost webu | MrSeo.tech",
    "description": "Optimalizace rychlosti, bezpečnosti a přístupnosti webu: diagnostika Core Web Vitals, technické kontroly a ověření nápravy.",
    "kicker": "RYCHLOST, BEZPEČNOST A PŘÍSTUPNOST WEBU",
    "hero": [
      "Rychlost, bezpečnost a přístupnost.",
      "Co brzdí uživatele vašeho webu?"
    ],
    "lead": "Prověříme pomalé načítání, viditelná technická rizika a bariéry ovládání. Stanovíme konkrétní úpravy a způsob ověření, místo abychom slibovali dokonalé automatické skóre.",
    "intro": "Které závady mají praktický dopad?",
    "introText": "Nejdříve změříme výchozí stav a oddělíme výkon, bezpečnost a přístupnost.",
    "problems": [
      [
        "Pomalé načítání",
        "Velké obrázky a skripty blokují mobilní stránku.",
        "Změříme zdroje a ukazatele výkonu."
      ],
      [
        "Rizikové nastavení",
        "Zastaralé komponenty nebo zbytečná oprávnění zvyšují riziko.",
        "Prověříme dohodnuté verze a konfiguraci."
      ],
      [
        "Překážky ovládání",
        "Kontrast nebo formulář ztěžují použití klávesnice.",
        "Otestujeme relevantní interakce a bariéry."
      ]
    ],
    "process": [
      [
        "Výchozí měření",
        "Najdeme pomalé zdroje, nastavení a pozorovatelné bariéry."
      ],
      [
        "Priority",
        "Rozlišíme dopad, riziko a náročnost oprav."
      ],
      [
        "Náprava",
        "Provedeme schválené zásahy bez narušení hlavních funkcí."
      ],
      [
        "Retest",
        "Zopakujeme dohodnuté kontroly ve srovnatelných podmínkách."
      ]
    ],
    "outcomes": [
      [
        "Měřená diagnostika",
        "Přehled konkrétních závad a priorit."
      ],
      [
        "Dohodnuté úpravy",
        "Přiměřené technické zásahy k nalezeným příčinám."
      ],
      [
        "Opakované testy",
        "Srovnatelné výsledky a zdokumentované limity."
      ]
    ],
    "faq": [
      [
        "Garantujete skóre 100?",
        "Ne. Závisí na zařízení, síti a externích službách."
      ],
      [
        "Je součástí penetrační test?",
        "Ne automaticky; potřebuje zvláštní autorizované zadání."
      ],
      [
        "Znamená kontrola právní soulad přístupnosti?",
        "Ne. Technická kontrola nenahrazuje úplné odborné a právní posouzení."
      ]
    ],
    "example": [
      "MODELOVÁ SITUACE",
      "E-shop má velké fotografie a formulář obtížně ovladatelný klávesnicí.",
      "Změříme načítání, upravíme obrázky a dohodnuté interakce.",
      "Zopakujeme testy za srovnatelných podmínek."
    ],
    "visual": [
      "MĚŘENÍ",
      "OPRAVA",
      "RETEST"
    ],
    "risk": "Absolutní bezpečnost nelze zaručit; infrastruktura a služby třetích stran mohou výsledky omezit.",
    "related": [
      [
        "wordpress-care",
        "Správa a údržba WordPressu",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ],
      [
        "website-redesign",
        "Redesign a modernizace webu",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ]
    ],
    "cta": "Probrat technickou optimalizaci"
  },
  "web-applications": {
    "title": "Webové aplikace, CRM a portály | MrSeo.tech",
    "description": "Vývoj webových aplikací, CRM a portálů: analýza procesů, uživatelských rolí, dat, integrací a ověřitelné první verze.",
    "kicker": "WEBOVÉ APLIKACE, CRM A PORTÁLY",
    "hero": [
      "Webové aplikace, CRM a portály.",
      "Přerostly vaše procesy tabulky?"
    ],
    "lead": "Vyvíjíme webové aplikace a zákaznické portály pro konkrétní firemní procesy: požadavky, role, stavy, dokumenty a integrace. První verzi stavíme kolem ověřitelné potřeby.",
    "intro": "Který proces stojí za převedení do aplikace?",
    "introText": "Definujeme uživatele, přístupová práva a užitečný výsledek první verze.",
    "problems": [
      [
        "Rozptýlené informace",
        "Tým sleduje zakázky v tabulkách a zprávách.",
        "Navrhneme datový model a pracovní stavy."
      ],
      [
        "Neřízený přístup",
        "Uživatelé vidí údaje, které nepotřebují.",
        "Definujeme role a oprávnění."
      ],
      [
        "Neomezený rozsah",
        "Projekt roste před ověřením užitečnosti.",
        "Vymezíme MVP a akceptační kritéria."
      ]
    ],
    "process": [
      [
        "Analýza procesu",
        "Zmapujeme role, stavy, data a současné překážky."
      ],
      [
        "Zadání MVP",
        "Vymezíme hlavní funkce a kritéria přijetí."
      ],
      [
        "Vývoj",
        "Realizujeme proces, oprávnění a dohodnutá propojení."
      ],
      [
        "Pilot",
        "Ověříme operace s určenými uživateli a naplánujeme další etapu."
      ]
    ],
    "outcomes": [
      [
        "Funkční zadání",
        "Role, data, procesy a dohodnutá pravidla."
      ],
      [
        "Použitelný modul",
        "Hlavní funkce s odpovídajícím rozhraním."
      ],
      [
        "Plán rozvoje",
        "Testy, dokumentace a další etapy."
      ]
    ],
    "faq": [
      [
        "Můžeme začít MVP?",
        "Ano. Vybereme jeden proces a ověříme jeho užitečnost."
      ],
      [
        "Musíme vyměnit současné CRM?",
        "Ne vždy. Posoudíme integraci nebo migraci."
      ],
      [
        "Jak dlouho vývoj trvá?",
        "Odhad připravíme po vyjasnění rolí, dat a integrací."
      ]
    ],
    "example": [
      "MODELOVÁ SITUACE",
      "Servisní firma sleduje nabídky a výjezdy v několika tabulkách.",
      "Navrhneme pilotní portál s rolemi a stavy zakázek.",
      "Určená skupina uživatelů ověří hlavní operace a přístupy."
    ],
    "visual": [
      "PROCES",
      "PORTÁL",
      "VÝSTUP"
    ],
    "risk": "Cena a termín závisí na rozsahu, zabezpečení, integracích a kvalitě stávajících dat.",
    "related": [
      [
        "api-integrations",
        "API integrace a automatizace",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ],
      [
        "web-development",
        "Vývoj webu na míru",
        "Podívejte se, jak tato služba navazuje na váš projekt."
      ]
    ],
    "cta": "Probrat vývoj aplikace"
  }
}
MRSEO_CS_P2
,true,512,JSON_THROW_ON_ERROR);}
