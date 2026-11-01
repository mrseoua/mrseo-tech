<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/development-content.php';
/* Country-specific Polish and German editorial copy. Only completed routes are exposed. */
function mrseo_international_data(){
 static $cached=null;
 if($cached!==null)return $cached;
 $json=<<<'MRSEO_INT_DATA'
{
  "ui": {
    "pl": {
      "lang": "pl-PL",
      "name": "Polska",
      "nav": {
        "services": "Usługi",
        "about": "O nas",
        "portfolio": "Projekty",
        "contact": "Kontakt",
        "cta": "Omówmy Twój projekt",
        "home": "Strona główna",
        "seo": "Pozycjonowanie stron",
        "ecommerce": "SEO dla sklepów",
        "audit": "Audyt SEO",
        "ads": "Google Ads",
        "analytics": "Analityka",
        "development": "Tworzenie aplikacji i systemów"
      },
      "common": {
        "badge": "MAŁY ZESPÓŁ · 10 LAT DOŚWIADCZENIA",
        "strategy": "ZACZYNAMY OD PROBLEMU",
        "solutions": "Co zmieniamy",
        "problems": "Co blokuje wyniki?",
        "results": "Co otrzymujesz",
        "faq": "Pytania i odpowiedzi",
        "next": "Sprawdźmy, co zatrzymuje Twój rozwój.",
        "nextText": "Podaj adres strony i krótko opisz problem. Zaczniemy od diagnozy, nie od sprzedaży pakietu usług.",
        "nextButton": "Porozmawiajmy o Twoim sklepie",
        "label": "WSPÓŁPRACA",
        "proof": "Przykłady projektów z naszego portfolio. Nie publikujemy danych klientów bez ich zgody.",
        "portfolioLink": "Zobacz projekty",
        "formName": "Imię",
        "formEmail": "Adres e-mail",
        "formSite": "Adres strony (opcjonalnie)",
        "formMessage": "Jak możemy pomóc?",
        "formSubmit": "Wyślij zapytanie ↗",
        "formPrivacy": "Nie przesyłaj haseł ani poufnych danych dostępowych.",
        "sent": "Dziękujemy. Formularz został przekazany do wysłania; odpowiemy na podany e-mail.",
        "error": "Nie udało się wysłać wiadomości. Spróbuj ponownie.",
        "invalid": "Sprawdź wymagane pola i spróbuj ponownie.",
        "close": "Praca zdalna z klientami w Europie. Zakres i komunikację ustalamy przed rozpoczęciem.",
        "diagnosticIntro": "Wybierz sytuację, która pasuje do Twojego sklepu. Zobacz, jak przekładamy problem na konkretne działania.",
        "verificationLabel": "KONTROLA TECHNICZNA",
        "verificationTitle": "Co dokładnie sprawdzamy?"
      }
    },
    "de": {
      "lang": "de-DE",
      "name": "Deutschland",
      "nav": {
        "services": "Leistungen",
        "about": "Über uns",
        "portfolio": "Projekte",
        "contact": "Kontakt",
        "cta": "Projekt besprechen",
        "home": "Startseite",
        "seo": "SEO-Betreuung",
        "ecommerce": "Onlineshop SEO",
        "audit": "Technisches SEO-Audit",
        "ads": "Google Ads",
        "analytics": "Webanalyse",
        "development": "Webentwicklung & Software"
      },
      "common": {
        "badge": "KLEINES EXPERTENTEAM · 10 JAHRE ERFAHRUNG",
        "strategy": "ZUERST DIE URSACHE",
        "solutions": "Was wir verbessern",
        "problems": "Was bremst Ihr Wachstum?",
        "results": "Was Sie erhalten",
        "faq": "Häufige Fragen",
        "next": "Finden wir heraus, was Ihren Shop ausbremst.",
        "nextText": "Schicken Sie uns Ihre Website und beschreiben Sie das Problem. Wir beginnen mit einer Diagnose statt mit einem Standardpaket.",
        "nextButton": "Projekt besprechen",
        "label": "ZUSAMMENARBEIT",
        "proof": "Beispiele aus unserem Portfolio. Kundendaten veröffentlichen wir nur mit entsprechender Zustimmung.",
        "portfolioLink": "Projekte ansehen",
        "formName": "Ihr Name",
        "formEmail": "E-Mail-Adresse",
        "formSite": "Website (optional)",
        "formMessage": "Wobei benötigen Sie Unterstützung?",
        "formSubmit": "Anfrage senden ↗",
        "formPrivacy": "Bitte keine Passwörter oder vertraulichen Zugangsdaten senden.",
        "sent": "Vielen Dank. Ihre Nachricht wurde zur Zustellung übergeben; wir antworten per E-Mail.",
        "error": "Die Nachricht konnte nicht gesendet werden. Bitte versuchen Sie es erneut.",
        "invalid": "Bitte prüfen Sie die Pflichtfelder und versuchen Sie es erneut.",
        "close": "Remote-Zusammenarbeit mit Unternehmen in Europa. Umfang und Kommunikation klären wir vor Projektbeginn.",
        "diagnosticIntro": "Wählen Sie das Problem, das auf Ihren Shop zutrifft. Sehen Sie, welche konkreten Schritte wir daraus ableiten.",
        "verificationLabel": "TECHNISCHE PRÜFUNG",
        "verificationTitle": "Was prüfen wir konkret?"
      }
    }
  },
  "pages": {
    "pl": {
      "": {
        "title": "SEO i Google Ads dla sklepów internetowych | MrSeo.tech",
        "description": "Techniczne SEO, optymalizacja e-commerce, Google Ads i analityka. Znajdujemy przyczyny problemów i wdrażamy działania dopasowane do biznesu.",
        "eyebrow": "SEO · E-COMMERCE · GOOGLE ADS",
        "headline": "Masz sklep. <em>Czy klienci mogą go znaleźć?</em>",
        "lead": "Łączymy techniczne SEO, reklamę i analitykę, żeby rozwiązywać konkretne problemy: niewidoczne kategorie, błędy indeksowania, kosztowne kampanie i niejasne dane o sprzedaży.",
        "problems": [
          [
            "Produkty nie są widoczne",
            "Google nie dociera do ważnych kategorii i podstron produktu."
          ],
          [
            "Reklama kosztuje za dużo",
            "Wydatki rosną, ale nie wiadomo, które kampanie przynoszą wartość."
          ],
          [
            "Dane nie dają odpowiedzi",
            "GA4, Google Ads i rzeczywiste zamówienia pokazują różne wyniki."
          ]
        ],
        "solutions": [
          [
            "SEO dla e-commerce",
            "Analizujemy katalog, filtry, indeksację i zapytania zakupowe.",
            "ecommerce-seo"
          ],
          [
            "Audyt techniczny",
            "Wskazujemy konkretne adresy URL, przyczyny błędów i priorytety wdrożenia.",
            "seo-audit"
          ],
          [
            "Google Ads i pomiar",
            "Sprawdzamy konwersje, strukturę reklam i opłacalność sprzedaży.",
            "google-ads"
          ]
        ],
        "outcomes": [
          "Plan działań oparty na rzeczywistych ograniczeniach",
          "Jasne priorytety i kryteria weryfikacji",
          "Przejrzysty kontakt z małym zespołem"
        ],
        "faq": [
          [
            "Czy pracujecie z firmami w Polsce?",
            "Tak, współpracujemy zdalnie z firmami w Europie. Przed startem uzgadniamy język komunikacji, zakres i sposób wdrażania zmian."
          ],
          [
            "Czy gwarantujecie pozycję numer jeden?",
            "Nie. Zamiast obietnic pozycji przedstawiamy konkretne zadania, ryzyka i sposób oceny efektów."
          ]
        ]
      },
      "ecommerce-seo": {
        "title": "Pozycjonowanie sklepów internetowych – SEO e-commerce | MrSeo.tech",
        "description": "SEO sklepu internetowego: architektura kategorii, indeksacja filtrów, strony produktów i zapytania zakupowe. Audyt, priorytety i wdrożenia.",
        "eyebrow": "POZYCJONOWANIE SKLEPÓW INTERNETOWYCH",
        "headline": "Duży katalog. <em>Mało ruchu z Google?</em>",
        "lead": "Produkty są w sklepie, ale klienci nie trafiają na właściwe podstrony. Sprawdzamy architekturę, filtry i indeksację, a następnie rozwijamy strony odpowiadające na zapytania zakupowe.",
        "problems": [
          [
            "Kategorie nie pozyskują ruchu",
            "Struktura sklepu nie odpowiada temu, czego szukają kupujący."
          ],
          [
            "Filtry mnożą adresy URL",
            "Parametry i sortowanie tworzą zduplikowane strony zamiast użytecznych wyników."
          ],
          [
            "Produkty giną w katalogu",
            "Niejasne linkowanie, warianty lub dane produktów utrudniają odkrywanie oferty."
          ]
        ],
        "solutions": [
          [
            "Mapowanie intencji zakupowych",
            "Dobieramy priorytetowe kategorie i podkategorie do popytu, marży i oferty."
          ],
          [
            "Kontrola indeksacji",
            "Sprawdzamy canonical, sitemap, paginację, filtry i dostępność stron."
          ],
          [
            "Wdrożenia i weryfikacja",
            "Przekazujemy konkretne zadania i mierzymy, czy zmiany pomagają ważnym podstronom."
          ]
        ],
        "outcomes": [
          "Mapa priorytetów dla kategorii i produktów",
          "Zadania techniczne z przykładami URL",
          "Plan rozwoju ruchu organicznego oparty na danych"
        ],
        "faq": [
          [
            "Czy obsługujecie Shopify, WooCommerce i inne platformy?",
            "Zakres oceniamy na podstawie platformy i możliwości jej konfiguracji. Nie obiecujemy zmian, których dany system nie pozwala wdrożyć."
          ],
          [
            "Kiedy można oczekiwać efektów SEO sklepu?",
            "To zależy od stanu technicznego, konkurencji i wdrożenia zmian. Nie podajemy gwarantowanych terminów ani pozycji."
          ]
        ],
        "verification": [
          [
            "Indeksowanie filtrów",
            "Sprawdzamy kombinacje cech: które mają potencjał w wyszukiwarce, a które generują szum."
          ],
          [
            "Canonical i sitemap",
            "Porównujemy adresy kanoniczne z linkami wewnętrznymi, mapami XML i faktyczną indeksacją."
          ],
          [
            "Warianty produktów",
            "Badamy rozdzielenie modeli, rozmiarów i kolorów oraz linkowanie do dostępnego asortymentu."
          ],
          [
            "Priorytety biznesowe",
            "Zestawiamy popyt z asortymentem i potencjałem sprzedażowym, nie tylko z wolumenem zapytań."
          ]
        ]
      },
      "seo": {
        "title": "Pozycjonowanie stron i SEO techniczne | MrSeo.tech",
        "description": "SEO oparte na diagnozie: struktura strony, intencje wyszukiwania, techniczne błędy i pomiar efektów. Przejrzyste działania bez pustych obietnic.",
        "eyebrow": "POZYCJONOWANIE STRON",
        "headline": "Strona działa. <em>Dlaczego Google jej nie pokazuje?</em>",
        "lead": "Nie zaczynamy od listy przypadkowych słów kluczowych. Sprawdzamy, co blokuje ważne podstrony, jak użytkownicy szukają oferty i które zmiany mają sens biznesowy.",
        "problems": [
          [
            "Niewidoczne usługi",
            "Kluczowe podstrony nie odpowiadają popularnym zapytaniom."
          ],
          [
            "Problemy techniczne",
            "Indeksacja, przekierowania lub duplikaty ograniczają widoczność."
          ],
          [
            "Ruch bez zapytań",
            "Treści przyciągają użytkowników, ale nie pomagają im podjąć decyzji."
          ]
        ],
        "solutions": [
          [
            "Badanie popytu",
            "Dobieramy tematy i podstrony do intencji zakupowych i informacyjnych."
          ],
          [
            "Fundament techniczny",
            "Usuwamy przeszkody dla indeksowania i wewnętrznej nawigacji."
          ],
          [
            "Priorytety dla biznesu",
            "Łączymy zmiany SEO z mierzalnymi zachowaniami użytkowników."
          ]
        ],
        "outcomes": [
          "Mapa stron i zapytań",
          "Lista prac do wdrożenia",
          "Sposób kontroli efektów w GSC i GA4"
        ],
        "faq": [
          [
            "Czy SEO wymaga nowej strony?",
            "Nie zawsze. Najpierw oceniamy obecne możliwości. Często warto naprawić strukturę i szablony zamiast budować serwis od zera."
          ],
          [
            "Czy zajmujecie się też reklamą?",
            "Tak, gdy ma to sens dla celu biznesowego, łączymy SEO z Google Ads i analityką."
          ]
        ],
        "verification": [
          [
            "Intencje SERP",
            "Porównujemy zapytania z rzeczywistymi wynikami Google w Polsce, a nie tylko z listą fraz."
          ],
          [
            "Kanibalizacja",
            "Sprawdzamy, czy kilka podstron nie konkuruje o te same zapytania."
          ],
          [
            "Ścieżki wewnętrzne",
            "Oceniamy głębokość kliknięć, linkowanie do usług i dostępność ważnych URL-i."
          ],
          [
            "Pomiar zgłoszeń",
            "Weryfikujemy, czy wejścia organiczne da się powiązać z wartościowymi kontaktami."
          ]
        ]
      },
      "seo-audit": {
        "title": "Audyt SEO sklepu i strony – techniczna diagnostyka | MrSeo.tech",
        "description": "Audyt techniczny SEO: indeksacja, canonical, filtry, przekierowania, sitemap, struktura serwisu. Raport z priorytetami i przykładami URL.",
        "eyebrow": "AUDYT SEO · DIAGNOSTYKA TECHNICZNA",
        "headline": "Nie potrzebujesz kolejnego PDF-a. <em>Potrzebujesz planu naprawy.</em>",
        "lead": "Zamiast ogólnych checklist sprawdzamy rzeczywiste adresy URL i szablony, oceniamy skalę błędów i opisujemy, jak zweryfikować poprawki.",
        "problems": [
          [
            "Google omija ważne strony",
            "Wyniki skanowania i indeksacji nie zgadzają się z mapą katalogu."
          ],
          [
            "Duplikaty przejmują widoczność",
            "Parametry, canonical i przekierowania wysyłają sprzeczne sygnały."
          ],
          [
            "Zespół nie wie, co naprawiać",
            "Długa lista ostrzeżeń nie daje kolejności działań."
          ]
        ],
        "solutions": [
          [
            "Diagnostyka i przykłady",
            "Weryfikujemy błędy na konkretnych adresach URL."
          ],
          [
            "Priorytety i wpływ",
            "Oddzielamy problemy krytyczne od kosmetycznych."
          ],
          [
            "Zadania dla wdrożenia",
            "Opisujemy oczekiwany stan i kryteria odbioru."
          ]
        ],
        "outcomes": [
          "Lista zweryfikowanych problemów",
          "Priorytetyzacja według ryzyka",
          "Plan kontroli po wdrożeniu"
        ],
        "faq": [
          [
            "Czy poprawki są częścią audytu?",
            "Sam audyt jest odrębnym zakresem. Wdrożenie możemy omówić po poznaniu platformy i złożoności zmian."
          ],
          [
            "Co muszę udostępnić?",
            "Na początek wystarczy adres strony. Dostępy do narzędzi uzgadniamy tylko wtedy, gdy są potrzebne."
          ]
        ],
        "verification": [
          [
            "Próbka rzeczywistych URL-i",
            "Analizujemy odpowiedzi HTTP, łańcuchy przekierowań i szablony najważniejszych sekcji."
          ],
          [
            "Search Console a crawler",
            "Wyjaśniamy różnice między adresami odkrytymi, przeskanowanymi i indeksowanymi."
          ],
          [
            "Sygnały kanoniczne",
            "Testujemy zgodność canonical, sitemap, hreflang i linkowania wewnętrznego."
          ],
          [
            "Renderowanie mobilne",
            "Sprawdzamy widoczność istotnych treści i zasobów dla użytkownika oraz Google."
          ]
        ]
      },
      "google-ads": {
        "title": "Google Ads dla e-commerce – audyt i prowadzenie kampanii | MrSeo.tech",
        "description": "Google Ads dla sklepów: konwersje, Merchant Center, Shopping, Performance Max i optymalizacja wydatków na podstawie ekonomiki sprzedaży.",
        "eyebrow": "GOOGLE ADS · E-COMMERCE",
        "headline": "Reklamy wydają budżet. <em>A co z zyskiem?</em>",
        "lead": "Zaczynamy od wiarygodnego pomiaru zakupów i wartości konwersji. Dopiero potem analizujemy kampanie, asortyment i decyzje dotyczące budżetu.",
        "problems": [
          [
            "Konwersje się nie zgadzają",
            "Dane Google Ads, GA4 i zamówienia pokazują inne wyniki."
          ],
          [
            "Budżet idzie w słabe produkty",
            "Nie wszystkie kategorie mają tę samą marżę ani szanse na sprzedaż."
          ],
          [
            "Performance Max to czarna skrzynka",
            "Brakuje podziału asortymentu i zasad oceny testów."
          ]
        ],
        "solutions": [
          [
            "Porządek w pomiarze",
            "Weryfikujemy zakupy, wartości, atrybucję i duplikaty."
          ],
          [
            "Struktura z sensem",
            "Dostosowujemy segmentację kampanii do asortymentu i celów."
          ],
          [
            "Decyzje na podstawie danych",
            "Analizujemy koszty i realną wartość sprzedaży, uwzględniając opóźnienia konwersji."
          ]
        ],
        "outcomes": [
          "Lista błędów śledzenia",
          "Plan kampanii i hipotez testów",
          "Zasady oceny CPA, ROAS i rentowności"
        ],
        "faq": [
          [
            "Czy pracujecie z Merchant Center i Performance Max?",
            "Tak, analizujemy dane produktowe, dostępność, konwersje i strukturę kampanii."
          ],
          [
            "Czy gwarantujecie określony ROAS?",
            "Nie. Wynik zależy również od cen, marży, sezonowości i konkurencji; ustalamy realistyczne kryteria oceny."
          ]
        ],
        "verification": [
          [
            "Zakup bez duplikacji",
            "Porównujemy zdarzenia purchase, identyfikatory transakcji i wartości w Google Ads oraz GA4."
          ],
          [
            "Diagnostyka Merchant Center",
            "Sprawdzamy spójność ceny, dostępności, identyfikatorów i danych produktów."
          ],
          [
            "Segmentacja asortymentu",
            "Oceniamy kampanie w kontekście kategorii, marży i realnego wolumenu danych."
          ],
          [
            "Decyzje budżetowe",
            "Odnotowujemy czas opóźnienia konwersji i progi opłacalności przed skalowaniem."
          ]
        ]
      },
      "analytics": {
        "title": "GA4 i analityka marketingowa – poprawne dane o sprzedaży | MrSeo.tech",
        "description": "Konfiguracja i audyt GA4, Google Ads, śledzenia konwersji i raportowania dla sklepów. Sprawdź, skąd naprawdę pochodzą zamówienia.",
        "eyebrow": "GA4 · ANALITYKA · POMIAR SPRZEDAŻY",
        "headline": "Masz dane. <em>Czy możesz im ufać?</em>",
        "lead": "Gdy Google Ads, GA4 i system zamówień pokazują inne liczby, decyzje reklamowe stają się ryzykowne. Szukamy źródła rozbieżności i porządkujemy pomiar.",
        "problems": [
          [
            "Zakupy liczą się podwójnie",
            "Nieprawidłowe zdarzenia zawyżają wartość konwersji."
          ],
          [
            "Brakuje ważnych zdarzeń",
            "Część formularzy, koszyków lub zakupów nie jest mierzona."
          ],
          [
            "Raporty nie pomagają",
            "Wiele wykresów, mało informacji potrzebnych do decyzji."
          ]
        ],
        "solutions": [
          [
            "Audyt zdarzeń",
            "Sprawdzamy tagowanie, duplikaty i przekazywane wartości."
          ],
          [
            "Jedna logika pomiaru",
            "Ustalamy definicje kluczowych konwersji i źródeł danych."
          ],
          [
            "Raporty pod decyzje",
            "Projektujemy proste widoki kosztów, zamówień i efektywności."
          ]
        ],
        "outcomes": [
          "Mapa kluczowych zdarzeń",
          "Lista przyczyn rozbieżności",
          "Kryteria testowania i utrzymania pomiaru"
        ],
        "faq": [
          [
            "Czy GA4 i Google Ads muszą pokazywać identyczne wyniki?",
            "Nie zawsze, ponieważ stosują różne modele atrybucji i zakresy raportowania. Wyjaśniamy różnice i wykrywamy rzeczywiste błędy."
          ],
          [
            "Czy potrzebuję BigQuery?",
            "Nie w każdym projekcie. Dobieramy narzędzia do wielkości danych i pytań, na które mają odpowiadać."
          ]
        ],
        "verification": [
          [
            "Ścieżka zdarzeń e-commerce",
            "Kontrolujemy view_item, add_to_cart, begin_checkout i purchase tam, gdzie są używane."
          ],
          [
            "Spójność transakcji",
            "Weryfikujemy identyfikatory, walutę, value, podatki i ewentualne zdublowania."
          ],
          [
            "Zgoda i tagowanie",
            "Badamy działanie tagów względem konfiguracji zgód i środowiska strony."
          ],
          [
            "Raport decyzji",
            "Oddzielamy metryki pomocnicze od wskaźników potrzebnych do oceny kampanii."
          ]
        ]
      },
      "about": {
        "title": "O nas – mały zespół SEO i Google Ads | MrSeo.tech",
        "description": "Niewielki zespół specjalistów z 10-letnim doświadczeniem w SEO, Google Ads, analityce i tworzeniu stron. Diagnoza, wdrożenie, kontrola.",
        "eyebrow": "O MRSEO.TECH",
        "headline": "Mały zespół. <em>Konkretne problemy i rozwiązania.</em>",
        "lead": "Jesteśmy niewielkim zespołem specjalistów z 10-letnim doświadczeniem w SEO, Google Ads, analityce i tworzeniu stron. Nie sprzedajemy skomplikowanego procesu dla samego procesu: szukamy przyczyn i priorytetów dla biznesu.",
        "problems": [
          [
            "Najpierw słuchamy",
            "Chcemy zrozumieć sklep, cele, ograniczenia i możliwości wdrożenia."
          ],
          [
            "Potem weryfikujemy",
            "Pracujemy z danymi, prawdziwymi URL-ami i sprawdzalnymi hipotezami."
          ],
          [
            "Na końcu kontrolujemy",
            "Przekazujemy jasny plan i monitorujemy, czy zmiany zostały wdrożone."
          ]
        ],
        "solutions": [
          [
            "SEO",
            "Struktura kategorii, widoczność i jakość techniczna."
          ],
          [
            "Google Ads",
            "Pomiar i prowadzenie kampanii uwzględniające ekonomię biznesu."
          ],
          [
            "Analityka i rozwój",
            "Spójne dane, automatyzacja i praktyczne usprawnienia."
          ]
        ],
        "outcomes": [
          "10 lat doświadczenia",
          "Mały zespół, jasna odpowiedzialność",
          "Praktyczne podejście zamiast pustych obietnic"
        ],
        "faq": [
          [
            "Czy działacie w Polsce?",
            "Współpracujemy zdalnie z firmami w Europie. Język, sposób komunikacji i zakres współpracy ustalamy indywidualnie."
          ],
          [
            "Czy jesteście dużą agencją?",
            "Nie. Pracujemy jako niewielki zespół specjalistów."
          ]
        ]
      },
      "contact": {
        "title": "Kontakt – porozmawiaj o SEO i Google Ads | MrSeo.tech",
        "description": "Opisz problem sklepu lub strony. Skontaktuj się z MrSeo.tech w sprawie SEO e-commerce, audytu, Google Ads i analityki.",
        "eyebrow": "KONTAKT",
        "headline": "Co dziś <em>blokuje Twój rozwój?</em>",
        "lead": "Nie musisz wiedzieć, czy potrzebujesz SEO, audytu czy Google Ads. Napisz, co nie działa, i podaj adres strony. Zaczniemy od przyczyny.",
        "problems": [
          [
            "Sklep traci ruch",
            "Kategorie, produkty i filtry są niewidoczne lub słabo indeksowane."
          ],
          [
            "Reklamy nie działają",
            "Budżet rośnie bez przewidywalnych zamówień."
          ],
          [
            "Dane się nie zgadzają",
            "Analityka nie pozwala ocenić wartości kampanii."
          ]
        ],
        "solutions": [],
        "outcomes": [],
        "faq": []
      },
      "portfolio": {
        "title": "Projekty i doświadczenie – portfolio MrSeo.tech",
        "description": "Wybrane strony z portfolio zespołu MrSeo.tech. Projekty z e-commerce, usług, motoryzacji i innych branż.",
        "eyebrow": "PORTFOLIO",
        "headline": "Różne branże. <em>Praktyczne doświadczenie.</em>",
        "lead": "Poniżej znajdują się wybrane domeny z naszego publicznego portfolio. Nie publikujemy szczegółowych wyników i danych handlowych bez zgody klientów.",
        "problems": [],
        "solutions": [],
        "outcomes": [],
        "faq": []
      }
    },
    "de": {
      "": {
        "title": "SEO für Onlineshops & Google Ads | MrSeo.tech",
        "description": "Technisches SEO, E-Commerce-Optimierung, Google Ads und Webanalyse. Wir finden Ursachen für Sichtbarkeitsprobleme und priorisieren konkrete Maßnahmen.",
        "eyebrow": "SEO · E-COMMERCE · GOOGLE ADS",
        "headline": "Ihr Onlineshop ist online. <em>Finden Kunden ihn auch?</em>",
        "lead": "Wir verbinden technisches SEO, Google Ads und Webanalyse. Gemeinsam beseitigen wir Hürden wie schlecht auffindbare Kategorien, fehlerhafte Indexierung, ineffiziente Kampagnen und unzuverlässige Verkaufsdaten.",
        "problems": [
          [
            "Kategorien bleiben unsichtbar",
            "Wichtige Produktseiten erhalten kaum organische Reichweite."
          ],
          [
            "Werbekosten steigen",
            "Das Budget wird ausgegeben, ohne dass der tatsächliche Beitrag der Kampagnen klar ist."
          ],
          [
            "Zahlen widersprechen sich",
            "GA4, Google Ads und Bestellungen ergeben unterschiedliche Bilder."
          ]
        ],
        "solutions": [
          [
            "Onlineshop SEO",
            "Wir analysieren Kategorien, Filter, Indexierung und kaufbezogene Suchanfragen.",
            "ecommerce-seo"
          ],
          [
            "Technisches SEO-Audit",
            "Wir dokumentieren konkrete URLs, Fehlerursachen und die Reihenfolge der Korrekturen.",
            "seo-audit"
          ],
          [
            "Google Ads & Tracking",
            "Wir prüfen Conversions, Kampagnenaufbau und wirtschaftliche Kennzahlen.",
            "google-ads"
          ]
        ],
        "outcomes": [
          "Ein konkreter Plan statt eines Standardpakets",
          "Prioritäten mit überprüfbaren Kriterien",
          "Direkte Zusammenarbeit mit einem kleinen Team"
        ],
        "faq": [
          [
            "Arbeiten Sie mit Unternehmen in Deutschland?",
            "Ja, wir arbeiten remote mit Unternehmen in Europa. Sprache, Kommunikationsweg und Projektumfang stimmen wir vor Beginn ab."
          ],
          [
            "Garantieren Sie Platz eins bei Google?",
            "Nein. Wir nennen überprüfbare Maßnahmen und realistische Risiken statt garantierter Rankings."
          ]
        ]
      },
      "ecommerce-seo": {
        "title": "SEO für Onlineshops – E-Commerce SEO Agentur | MrSeo.tech",
        "description": "SEO für Onlineshops: Kategoriearchitektur, Filter-Indexierung, Produktseiten, Canonicals und technische Umsetzung. Analyse und konkrete Prioritäten.",
        "eyebrow": "SEO FÜR ONLINESHOPS",
        "headline": "Tausende Produkte. <em>Zu wenig Sichtbarkeit?</em>",
        "lead": "Viele Shops besitzen ein großes Sortiment, doch Google findet die falschen URLs. Wir prüfen die Struktur, die Indexierung und die Suchintention hinter Kategorie- und Produktseiten.",
        "problems": [
          [
            "Kategorieseiten ranken nicht",
            "Der Aufbau des Sortiments passt nicht zu den Suchanfragen potenzieller Käufer."
          ],
          [
            "Filter erzeugen URL-Fluten",
            "Varianten und Parameter schaffen mehr Duplikate als nützliche Einstiegsseiten."
          ],
          [
            "Produkte werden übersehen",
            "Fehlerhafte Verlinkung, Variantenlogik oder Produktdaten erschweren das Crawling."
          ]
        ],
        "solutions": [
          [
            "Nachfrage und Kategorien verbinden",
            "Wir priorisieren Kategorien anhand von Suchintention, Sortiment und wirtschaftlicher Relevanz."
          ],
          [
            "Technische Indexierung prüfen",
            "Canonical, XML-Sitemap, Paginierung und Filtersteuerung werden systematisch bewertet."
          ],
          [
            "Umsetzung kontrollieren",
            "Wir erstellen konkrete Aufgaben und prüfen die Wirkung von Änderungen."
          ]
        ],
        "outcomes": [
          "Priorisierte Kategorie- und Produktstruktur",
          "Technische Tickets mit Beispiel-URLs",
          "Messbares Vorgehen für organisches Wachstum"
        ],
        "faq": [
          [
            "Unterstützen Sie Shopify, Shopware und WooCommerce?",
            "Wir prüfen die Möglichkeiten des eingesetzten Systems und versprechen keine Änderungen, die technisch nicht umsetzbar sind."
          ],
          [
            "Wann zeigt Shop-SEO Ergebnisse?",
            "Das hängt von Wettbewerb, technischem Zustand und der Umsetzung ab. Feste Rankings oder Zeiträume garantieren wir nicht."
          ]
        ],
        "verification": [
          [
            "Facettierte Navigation",
            "Wir trennen nachgefragte Filterkombinationen von technisch unnötigen URL-Varianten."
          ],
          [
            "Canonical und Sitemap",
            "Wir prüfen, ob interne Links, XML-Sitemaps und Canonical-Tags dieselben Ziel-URLs unterstützen."
          ],
          [
            "Shopware- und Shopify-Varianten",
            "Wir bewerten die URL- und Variantenlogik passend zu den Funktionen des eingesetzten Systems."
          ],
          [
            "Sortiment und Nachfrage",
            "Wir verbinden Suchpotenzial mit Kategorien, Verfügbarkeit und wirtschaftlicher Relevanz."
          ]
        ]
      },
      "seo": {
        "title": "SEO-Betreuung & Suchmaschinenoptimierung | MrSeo.tech",
        "description": "Technische Suchmaschinenoptimierung, Keyword-Strategie, Indexierung und kaufrelevante Landingpages. Klare Prioritäten statt leerer Versprechen.",
        "eyebrow": "SUCHMASCHINENOPTIMIERUNG",
        "headline": "Ihre Website läuft. <em>Warum findet Google sie nicht?</em>",
        "lead": "Wir starten nicht mit einer beliebigen Keyword-Liste. Zuerst prüfen wir, welche Seiten den größten Wert haben, was ihre Sichtbarkeit behindert und welche Maßnahmen wirklich sinnvoll sind.",
        "problems": [
          [
            "Leistungsseiten werden kaum gefunden",
            "Das Angebot deckt die tatsächlichen Suchintentionen nicht ausreichend ab."
          ],
          [
            "Technische Signale sind widersprüchlich",
            "Indexierung, Weiterleitungen oder Duplikate begrenzen das Potenzial."
          ],
          [
            "Traffic ohne Anfragen",
            "Besucher finden Inhalte, aber keinen klaren nächsten Schritt."
          ]
        ],
        "solutions": [
          [
            "Suchintention verstehen",
            "Wir ordnen relevante Suchanfragen passenden Seiten zu."
          ],
          [
            "Technische Grundlagen schaffen",
            "Wir beheben Indexierungs- und Strukturprobleme nach Priorität."
          ],
          [
            "Ergebnisse prüfen",
            "Wir betrachten Sichtbarkeit, qualifizierte Anfragen und die verfügbaren Conversion-Daten."
          ]
        ],
        "outcomes": [
          "Suchintentionen- und Seitenplan",
          "Priorisierte technische Maßnahmen",
          "Klarer Mess- und Kontrollplan"
        ],
        "faq": [
          [
            "Muss die gesamte Website neu erstellt werden?",
            "Nicht unbedingt. Oft sind gezielte Anpassungen an Struktur und Templates sinnvoller als ein kompletter Relaunch."
          ],
          [
            "Bieten Sie auch Google Ads an?",
            "Ja. Wenn es zum Ziel passt, können SEO, Ads und Tracking abgestimmt werden."
          ]
        ],
        "verification": [
          [
            "Suchintention im deutschen SERP",
            "Wir vergleichen Zielbegriffe mit realen organischen Treffern und den Erwartungen der Nutzer."
          ],
          [
            "Keyword-Kannibalisierung",
            "Wir identifizieren konkurrierende URLs und fehlende eindeutige Einstiegsseiten."
          ],
          [
            "Interne Pfade",
            "Wir prüfen Linktiefe, Navigation und die Verteilung relevanter interner Links."
          ],
          [
            "Lead-Messung",
            "Wir klären, wie sich organische Besuche mit qualifizierten Anfragen verbinden lassen."
          ]
        ]
      },
      "seo-audit": {
        "title": "Technisches SEO-Audit für Websites & Shops | MrSeo.tech",
        "description": "Technisches SEO-Audit mit überprüften URLs: Crawling, Indexierung, Canonical Tags, Filter, Weiterleitungen, Sitemaps und priorisierte Entwickleraufgaben.",
        "eyebrow": "TECHNISCHES SEO-AUDIT",
        "headline": "Kein weiterer Fehlerbericht. <em>Ein Plan, der sich umsetzen lässt.</em>",
        "lead": "Wir überprüfen echte URLs, Templates und Indexierungssignale. Sie erfahren, welche Fehler relevant sind, wie weit sie reichen und wie sich eine Korrektur kontrollieren lässt.",
        "problems": [
          [
            "Wichtige Seiten werden nicht indexiert",
            "Crawling und tatsächliche Google-Sichtbarkeit passen nicht zusammen."
          ],
          [
            "Duplikate blockieren Strukturen",
            "Filter, Parameter, Canonicals oder Redirects senden widersprüchliche Signale."
          ],
          [
            "Zu viele Empfehlungen ohne Prioritäten",
            "Ein langes Audit hilft nicht, wenn Entwickler keine klaren Aufgaben erhalten."
          ]
        ],
        "solutions": [
          [
            "Befunde belegen",
            "Wir prüfen relevante Fehler anhand konkreter Beispiel-URLs."
          ],
          [
            "Auswirkungen priorisieren",
            "Kritische Indexierungsprobleme stehen vor kosmetischen Hinweisen."
          ],
          [
            "Umsetzung vorbereiten",
            "Jede wesentliche Aufgabe erhält einen Soll-Zustand und Prüfkriterien."
          ]
        ],
        "outcomes": [
          "Belegte technische Befunde",
          "Prioritäten nach Risiko und Aufwand",
          "Prüfbare Aufgaben für Entwicklung und QA"
        ],
        "faq": [
          [
            "Sind Korrekturen im Audit enthalten?",
            "Das Audit ist ein eigenständiger Leistungsumfang. Eine Umsetzung kann anschließend passend zum Shopsystem vereinbart werden."
          ],
          [
            "Welche Zugänge sind nötig?",
            "Für die erste Einschätzung genügt meist die URL. Weitere Zugänge stimmen wir nur bei Bedarf ab."
          ]
        ],
        "verification": [
          [
            "HTTP- und Redirect-Ketten",
            "Wir prüfen repräsentative URLs, Weiterleitungswege und Statuscodes einzelner Templates."
          ],
          [
            "Crawler gegen Search Console",
            "Wir vergleichen auffindbare, gecrawlte und tatsächlich indexierte Seiten."
          ],
          [
            "Canonical, hreflang, Sitemap",
            "Wir prüfen widersprüchliche Signale und interne Links auf zentrale URLs."
          ],
          [
            "Rendering auf Mobilgeräten",
            "Wir kontrollieren die Darstellung und Erreichbarkeit entscheidender Inhalte."
          ]
        ]
      },
      "google-ads": {
        "title": "Google Ads Betreuung für E-Commerce & Shops | MrSeo.tech",
        "description": "Google Ads für Onlineshops: Conversion-Tracking, Merchant Center, Shopping, Performance Max und Kampagnenstruktur nach Wirtschaftlichkeit.",
        "eyebrow": "GOOGLE ADS · SHOPPING · PERFORMANCE MAX",
        "headline": "Ihr Werbebudget läuft. <em>Was bleibt davon übrig?</em>",
        "lead": "Ohne verlässliche Kaufdaten sind Automatisierung und Gebotsstrategien riskant. Wir prüfen zuerst das Tracking und danach Kampagnen, Sortiment und Wirtschaftlichkeit.",
        "problems": [
          [
            "Conversions sind unzuverlässig",
            "Google Ads, GA4 und Shopsystem melden unterschiedliche Verkäufe."
          ],
          [
            "Schwache Produkte verbrauchen Budget",
            "Marge und Nachfrage unterscheiden sich von Kategorie zu Kategorie."
          ],
          [
            "Performance Max ist schwer zu bewerten",
            "Es fehlen sinnvolle Segmentierung und Kriterien für Tests."
          ]
        ],
        "solutions": [
          [
            "Tracking prüfen",
            "Wir klären Kaufereignisse, Werte, Dubletten und Attribution."
          ],
          [
            "Kampagnen strukturieren",
            "Wir ordnen Produktsortimente und Budgets nachvollziehbaren Zielen zu."
          ],
          [
            "Tests auswerten",
            "Wir berücksichtigen Datenvolumen, Conversion-Verzögerungen und die wirtschaftlichen Ergebnisse."
          ]
        ],
        "outcomes": [
          "Priorisierte Tracking-Probleme",
          "Test- und Kampagnenstruktur",
          "Kriterien für CPA, ROAS und Profitabilität"
        ],
        "faq": [
          [
            "Arbeiten Sie mit Merchant Center und Performance Max?",
            "Ja. Produktdaten, Verfügbarkeit, Kaufwerte und Kampagnenstruktur gehören zur Analyse."
          ],
          [
            "Garantieren Sie einen bestimmten ROAS?",
            "Nein. Preise, Marge, Nachfrage und Wettbewerb beeinflussen den Wert. Wir definieren realistische Ziele und prüfen sie anhand der Daten."
          ]
        ],
        "verification": [
          [
            "Kaufereignisse und Transaktions-IDs",
            "Wir prüfen Dubletten, Umsatzwerte und Abweichungen zwischen Ads, GA4 und Shop."
          ],
          [
            "Merchant-Center-Diagnose",
            "Wir vergleichen Preise, Verfügbarkeit und Produktattribute mit den Landingpages."
          ],
          [
            "Produktsortiment nach Wirtschaftlichkeit",
            "Wir unterscheiden Kategorien nach Marge, Nachfrage und belastbarer Datenbasis."
          ],
          [
            "Auswertung vor der Skalierung",
            "Wir berücksichtigen Conversion-Verzug, Lernphasen und die tatsächlich erreichbare Profitabilität."
          ]
        ]
      },
      "analytics": {
        "title": "GA4 Tracking & Webanalyse für E-Commerce | MrSeo.tech",
        "description": "GA4 Audit und Conversion-Tracking für Shops: Google Ads Abgleich, Kaufereignisse, Fehleranalyse und verständliche Berichte für Entscheidungen.",
        "eyebrow": "GA4 · CONVERSION TRACKING · WEBANALYSE",
        "headline": "Sie haben Zahlen. <em>Können Sie ihnen vertrauen?</em>",
        "lead": "Wenn GA4, Google Ads und Ihr Shop unterschiedliche Bestellungen melden, entstehen falsche Entscheidungen. Wir finden die Ursache und schaffen eine verlässliche Messgrundlage.",
        "problems": [
          [
            "Käufe werden doppelt gezählt",
            "Fehlerhafte Events überhöhen Conversion-Zahlen und Umsatzwerte."
          ],
          [
            "Wichtige Ereignisse fehlen",
            "Formulare, Warenkörbe oder Käufe werden nicht vollständig erfasst."
          ],
          [
            "Dashboards überfordern",
            "Viele Kennzahlen, aber wenig Orientierung für die nächste Entscheidung."
          ]
        ],
        "solutions": [
          [
            "Events prüfen",
            "Wir kontrollieren Tagging, Dubletten und den übertragenen Kaufwert."
          ],
          [
            "Definitionen vereinheitlichen",
            "Wir legen fest, welche Conversion für welches Ziel zählt."
          ],
          [
            "Berichte vereinfachen",
            "Wir zeigen Kosten, Kaufwerte und notwendige nächste Schritte verständlich auf."
          ]
        ],
        "outcomes": [
          "Klare Event- und Zieldefinitionen",
          "Dokumentierte Datenabweichungen",
          "Testplan für verlässliche Messung"
        ],
        "faq": [
          [
            "Müssen GA4 und Google Ads identische Zahlen zeigen?",
            "Nein. Unterschiedliche Attribution und Berichtslogik können Abweichungen erklären. Wir unterscheiden diese von echten Tracking-Fehlern."
          ],
          [
            "Brauchen wir dafür BigQuery?",
            "Nicht zwingend. Die Architektur richtet sich nach Datenmenge, Aufwand und geschäftlichen Fragen."
          ]
        ],
        "verification": [
          [
            "E-Commerce-Ereigniskette",
            "Wir überprüfen view_item, add_to_cart, begin_checkout und purchase bei entsprechendem Setup."
          ],
          [
            "Transaktionsdaten",
            "Wir vergleichen IDs, Währung, Umsatzwerte und fehlerhafte doppelte Ereignisse."
          ],
          [
            "Tag- und Consent-Konfiguration",
            "Wir prüfen, ob Tracking gemäß der vorhandenen Consent-Einrichtung ausgelöst wird."
          ],
          [
            "Berichte für Entscheidungen",
            "Wir reduzieren unnötige Dashboards auf nachvollziehbare betriebliche Kennzahlen."
          ]
        ]
      },
      "about": {
        "title": "Über uns – kleines SEO & Google Ads Team | MrSeo.tech",
        "description": "Ein kleines Expertenteam mit 10 Jahren Erfahrung in SEO, Google Ads, Webanalyse und Website-Entwicklung. Klare Entscheidungen statt Agentur-Buzzwords.",
        "eyebrow": "ÜBER MRSEO.TECH",
        "headline": "Ein kleines Team. <em>Klare Lösungen für komplexe Aufgaben.</em>",
        "lead": "Wir sind ein kleines Team von Fachleuten mit 10 Jahren Erfahrung in SEO, Google Ads, Webanalyse und Website-Entwicklung. Wir beginnen mit der Ursache eines Problems und machen aus technischen Erkenntnissen verständliche nächste Schritte.",
        "problems": [
          [
            "Erst verstehen",
            "Wir betrachten Ziele, Prozesse und das eigentliche Problem."
          ],
          [
            "Dann überprüfen",
            "Entscheidungen basieren auf Daten und nachprüfbaren Beispielen."
          ],
          [
            "Anschließend verbessern",
            "Wir priorisieren Maßnahmen und kontrollieren ihre Umsetzung."
          ]
        ],
        "solutions": [
          [
            "Technisches SEO",
            "Indexierung, Struktur und organische Sichtbarkeit."
          ],
          [
            "Google Ads",
            "Kampagnensteuerung auf Basis verlässlicher Kaufdaten."
          ],
          [
            "Analyse & Entwicklung",
            "Nachvollziehbare Berichte und technische Lösungen."
          ]
        ],
        "outcomes": [
          "10 Jahre praktische Erfahrung",
          "Ein kleines spezialisiertes Team",
          "Transparente Zusammenarbeit ohne Ranking-Garantien"
        ],
        "faq": [
          [
            "Haben Sie ein Büro in Deutschland?",
            "Wir bieten Zusammenarbeit aus der Ferne an. Wir geben keinen lokalen Standort vor und klären Kommunikation und Verfügbarkeit vor Projektbeginn."
          ],
          [
            "Sind Sie eine große Agentur?",
            "Nein, wir arbeiten als kleines Expertenteam mit klar abgestimmten Verantwortlichkeiten."
          ]
        ]
      },
      "contact": {
        "title": "Kontakt – SEO-Audit & Google Ads anfragen | MrSeo.tech",
        "description": "Schildern Sie Ihr Problem im E-Commerce, technischen SEO, Google Ads oder Tracking. Wir beginnen mit der Diagnose Ihrer Website.",
        "eyebrow": "KONTAKT",
        "headline": "Was hält Ihr Geschäft <em>gerade auf?</em>",
        "lead": "Sie müssen nicht wissen, ob SEO, ein Audit oder Google Ads die richtige Antwort ist. Schicken Sie uns Ihre URL und beschreiben Sie, was nicht funktioniert.",
        "problems": [
          [
            "Sichtbarkeit verloren",
            "Kategorien oder Produkte werden kaum noch gefunden."
          ],
          [
            "Kampagnen ohne Ertrag",
            "Werbebudget steigt, ohne dass Verkäufe nachvollziehbar zunehmen."
          ],
          [
            "Tracking unzuverlässig",
            "Berichte bilden die Bestellungen nicht plausibel ab."
          ]
        ],
        "solutions": [],
        "outcomes": [],
        "faq": []
      },
      "portfolio": {
        "title": "Projekte & Erfahrung – Portfolio | MrSeo.tech",
        "description": "Ausgewählte Websites aus dem öffentlichen Portfolio von MrSeo.tech. Erfahrung in E-Commerce, Dienstleistungen und verschiedenen Branchen.",
        "eyebrow": "PROJEKTE",
        "headline": "Unterschiedliche Branchen. <em>Praxis statt Behauptungen.</em>",
        "lead": "Hier zeigen wir ausgewählte Websites aus unserem öffentlichen Portfolio. Vertrauliche Kundendaten oder Ergebnisse veröffentlichen wir nicht ohne Zustimmung.",
        "problems": [],
        "solutions": [],
        "outcomes": [],
        "faq": []
      }
    }
  }
}
MRSEO_INT_DATA;
 return $cached=json_decode($json,true);
}
function mrseo_int_locales(){return array('pl'=>'pl-PL','de'=>'de-DE');}
function mrseo_int_pages(){return array('','seo','ecommerce-seo','seo-audit','google-ads','analytics','web-development','about','contact','portfolio');}
function mrseo_int_page($lang=null,$slug=null){
 $data=mrseo_international_data();
 $lang=$lang?:mrseo_locale();$slug=$slug===null?mrseo_slug():$slug;
 if($slug==='web-development')return mrseo_dev_page($lang);
 return $data['pages'][$lang][$slug]??null;
}
function mrseo_int_ui($lang=null){
 $data=mrseo_international_data();$lang=$lang?:mrseo_locale();return $data['ui'][$lang]??null;
}
