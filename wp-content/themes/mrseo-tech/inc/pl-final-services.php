<?php
if(!defined('ABSPATH'))exit;
/** Ten complete Polish market landings. No invented case studies or outcomes. */
function mrseo_pl_final_service_data(){
return json_decode(<<<'MRSEO_PL_FINAL'
{
  "international-seo": {
    "title": "SEO międzynarodowe dla firm i sklepów | MrSeo.tech",
    "description": "Planujemy widoczność na wybranych rynkach: od badania lokalnych zapytań, przez strukturę języków i adresów URL, po techniczne wskazówki dla hreflang i.",
    "kicker": "SEO MIĘDZYNARODOWE",
    "hero": [
      "Firma sprzedaje za granicę,",
      "ale klienci nie znajdują właściwej wersji strony?"
    ],
    "lead": "Planujemy widoczność na wybranych rynkach: od badania lokalnych zapytań, przez strukturę języków i adresów URL, po techniczne wskazówki dla hreflang i indeksowania.",
    "intro": "Wiele języków nie oznacza automatycznie widoczności na wielu rynkach.",
    "introText": "Użytkownik z Polski trafia na wersję angielską lub inną niż oczekiwana. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Wyniki pokazują zły język",
        "Użytkownik z Polski trafia na wersję angielską lub inną niż oczekiwana.",
        "Sprawdzamy indeksowanie, adresy i deklaracje hreflang."
      ],
      [
        "Przetłumaczone strony nie przyciągają ruchu",
        "Dosłowna kopia nie odpowiada na lokalne słownictwo i sposób wyszukiwania.",
        "Badamy intencje oraz konkurencję na konkretnym rynku."
      ],
      [
        "Wersje konkurują między sobą",
        "Niejasna struktura katalogów i kanonicznych adresów myli wyszukiwarkę.",
        "Weryfikujemy canonical, alternatywy i powiązania URL."
      ]
    ],
    "process": [
      [
        "Wybór rynków",
        "Ustalamy język, kraj i biznesowy priorytet każdej wersji."
      ],
      [
        "Analiza lokalnych potrzeb",
        "Mapujemy różnice w zapytaniach, kategoriach i usługach."
      ],
      [
        "Projekt struktury",
        "Sprawdzamy adresy, alternatywy językowe, canonical i mapy witryny."
      ],
      [
        "Kontrola po wdrożeniu",
        "Porównujemy deklaracje z rzeczywistymi adresami i wynikami indeksowania."
      ]
    ],
    "outcomes": [
      [
        "Mapa rynków i słów kluczowych",
        "Priorytety według lokalnego popytu i celów firmy."
      ],
      [
        "Specyfikacja SEO międzynarodowego",
        "Zasady adresów, metadanych i hreflang bez fikcyjnych odpowiedników."
      ],
      [
        "Lista testów przed publikacją",
        "Spójność języków, kanonicznych adresów i linków."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Użytkownicy z Niemiec widzą w Google polską wersję kategorii.",
      "Sprawdzamy pary URL, hreflang, canonical oraz dostępność tłumaczeń.",
      "Przekazujemy listę błędnych par i testy kontroli po korekcie."
    ],
    "faq": [
      [
        "Czy potrzebujemy osobnych domen na każdy kraj?",
        "Nie zawsze. Katalogi, subdomeny i domeny krajowe oceniamy pod kątem zasobów, marki i wymagań SEO."
      ],
      [
        "Czy wystarczy tłumaczenie maszynowe?",
        "Nie, jeśli treść nie odpowiada lokalnej ofercie i intencji użytkownika."
      ],
      [
        "Czy można uruchamiać kraje etapami?",
        "Tak. Wdrażamy wyłącznie ukończone, rzeczywiście dostępne wersje."
      ]
    ],
    "risk": "Tak. Wdrażamy wyłącznie ukończone, rzeczywiście dostępne wersje. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "seo",
        "Pozycjonowanie SEO",
        "Podstawowa widoczność i analiza rynku"
      ],
      [
        "service-business-seo",
        "SEO firm usługowych",
        "Rozwój treści dla konkretnych usług"
      ]
    ],
    "visual": [
      "RYNEK",
      "WERSJA",
      "ODPOWIEDNIK"
    ],
    "cta": "Sprawdźmy rynki i wersje językowe"
  },
  "local-google-ads": {
    "title": "Google Ads dla firm lokalnych | MrSeo.tech",
    "description": "Pomagamy ograniczyć niepotrzebne kliknięcia, dopasować kampanię do rzeczywistego zasięgu usług i mierzyć wartościowe połączenia oraz zapytania. W reklamie.",
    "kicker": "GOOGLE ADS DLA FIRM LOKALNYCH",
    "hero": [
      "Reklama działa w całym regionie,",
      "a obsługujesz tylko wybrane miasta?"
    ],
    "lead": "Pomagamy ograniczyć niepotrzebne kliknięcia, dopasować kampanię do rzeczywistego zasięgu usług i mierzyć wartościowe połączenia oraz zapytania.",
    "intro": "W reklamie lokalnej liczą się zasięg, pilność potrzeby i dostępny kontakt.",
    "introText": "Budżet może trafiać do osób, którym firma nie może wykonać usługi. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Kliknięcia spoza obszaru obsługi",
        "Budżet może trafiać do osób, którym firma nie może wykonać usługi.",
        "Sprawdzamy ustawienia lokalizacji i raporty geograficzne."
      ],
      [
        "Telefon nie dzwoni mimo reklam",
        "Komunikat lub strona nie pokazuje jasno godzin i zakresu usługi.",
        "Testujemy rozszerzenia, treść i mobilną ścieżkę kontaktu."
      ],
      [
        "Każdy telefon jest liczony jako sprzedaż",
        "Raport nie odróżnia przypadkowych kontaktów od wartościowych zapytań.",
        "Ustalamy rozsądne cele i kryteria jakości leadów."
      ]
    ],
    "process": [
      [
        "Mapa usług i lokalizacji",
        "Określamy obsługiwane obszary i wyszukiwane potrzeby."
      ],
      [
        "Struktura kampanii",
        "Porządkujemy grupy reklam, wykluczenia i dopasowanie treści."
      ],
      [
        "Kontakty i pomiar",
        "Weryfikujemy formularze, telefony i import zdarzeń."
      ],
      [
        "Kontrola budżetu",
        "Oceniamy wyniki z uwzględnieniem jakości zapytań."
      ]
    ],
    "outcomes": [
      [
        "Plan geograficzny kampanii",
        "Ustawienia i wykluczenia zgodne z realnym obszarem."
      ],
      [
        "Lista reklam i stron docelowych",
        "Oferta przypisana do konkretnych usług."
      ],
      [
        "Zasady pomiaru jakości kontaktu",
        "Oddzielenie zapytań od samych kliknięć."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Serwis mobilny otrzymuje kliknięcia z odległych miejscowości.",
      "Analizujemy rzeczywiste lokalizacje użytkowników i ograniczamy niepotrzebne obszary.",
      "Kontrolujemy jakość kolejnych zgłoszeń zamiast samego CTR."
    ],
    "faq": [
      [
        "Czy kierować reklamy tylko na jedno miasto?",
        "Zależy od zasięgu usług. Ustawienia dobieramy do faktycznych możliwości firmy."
      ],
      [
        "Czy rejestrujecie połączenia?",
        "Możliwości pomiaru zależą od zgód, narzędzi i infrastruktury telefonicznej."
      ],
      [
        "Czy Google Ads gwarantuje klientów?",
        "Nie. Wynik zależy również od konkurencji, oferty i obsługi kontaktów."
      ]
    ],
    "risk": "Nie. Wynik zależy również od konkurencji, oferty i obsługi kontaktów. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "google-ads",
        "Kampanie Google Ads",
        "Pełny zakres prowadzenia reklam"
      ],
      [
        "landing-pages",
        "Landing page do reklam",
        "Skuteczna strona docelowa"
      ]
    ],
    "visual": [
      "LOKALIZACJA",
      "REKLAMA",
      "KONTAKT"
    ],
    "cta": "Omówmy lokalną reklamę"
  },
  "sklepy-woocommerce-shopify": {
    "title": "Sklepy WooCommerce i Shopify w Polsce | MrSeo.tech",
    "description": "Projektujemy sklepy na WooCommerce i Shopify tam, gdzie platforma odpowiada katalogowi, płatnościom, logistyce i kosztom utrzymania. Porównujemy.",
    "kicker": "SKLEPY WOOCOMMERCE I SHOPIFY",
    "hero": [
      "WooCommerce czy Shopify?",
      "Najpierw ustalmy potrzeby sklepu."
    ],
    "lead": "Projektujemy sklepy na WooCommerce i Shopify tam, gdzie platforma odpowiada katalogowi, płatnościom, logistyce i kosztom utrzymania. Porównujemy ograniczenia przed wyborem.",
    "intro": "Platforma to narzędzie, a nie gwarancja sprzedaży.",
    "introText": "Aktualizacje i konflikty utrudniają stabilne zakupy. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Sklep ma zbyt wiele przypadkowych wtyczek",
        "Aktualizacje i konflikty utrudniają stabilne zakupy.",
        "Porządkujemy wymagania i oceniamy liczbę zależności."
      ],
      [
        "Brakuje lokalnych metod płatności i dostawy",
        "Kupujący nie widzi wygodnego sposobu zapłaty lub odbioru.",
        "Dobieramy integracje dostępne dla wybranej platformy."
      ],
      [
        "Koszt utrzymania jest niejasny",
        "Abonament, aplikacje, hosting i rozwój mogą przewyższać budżet.",
        "Porównujemy realne koszty eksploatacji i ograniczenia."
      ]
    ],
    "process": [
      [
        "Katalog i proces zamówienia",
        "Opisujemy warianty produktów, stany i scenariusz zakupowy."
      ],
      [
        "Porównanie platform",
        "Oceniamy WooCommerce i Shopify w kontekście wymagań."
      ],
      [
        "Wdrożenie sklepu",
        "Konfigurujemy uzgodnione funkcje, płatności i dostawy."
      ],
      [
        "Odbiór zamówień",
        "Testujemy koszyk, potwierdzenia, dane i sytuacje błędne."
      ]
    ],
    "outcomes": [
      [
        "Uzasadniony wybór platformy",
        "Decyzja oparta o wymagania, a nie modę."
      ],
      [
        "Gotowy proces zakupowy",
        "Sprawdzone ścieżki na telefonie i komputerze."
      ],
      [
        "Plan dalszego rozwoju",
        "Zakres integracji, SEO oraz utrzymania sklepu."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Marka ma 600 wariantów produktów i zamówienia z różnych kanałów.",
      "Porównujemy importy, warianty, integracje, koszty i obsługę zamówień.",
      "Wskazujemy platformę oraz testowy scenariusz zakupu."
    ],
    "faq": [
      [
        "Która platforma jest tańsza?",
        "To zależy od abonamentu, hostingu, aplikacji, prowizji i potrzebnych modyfikacji."
      ],
      [
        "Czy wdrażacie płatności BLIK?",
        "Dobieramy operatora i kompatybilną integrację do wybranej platformy."
      ],
      [
        "Czy mogę przenieść istniejący sklep?",
        "Takie wdrożenie wymaga osobnego planu danych, adresów i testów."
      ]
    ],
    "risk": "Takie wdrożenie wymaga osobnego planu danych, adresów i testów. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "store-migration",
        "Migracja sklepu",
        "Przenoszenie danych i adresów"
      ],
      [
        "store-conversion",
        "Konwersja sklepu",
        "Usprawnienie zakupów"
      ]
    ],
    "visual": [
      "PLATFORMA",
      "KOSZYK",
      "ZAMÓWIENIE"
    ],
    "cta": "Wybierzmy technologię sklepu"
  },
  "store-conversion": {
    "title": "Optymalizacja konwersji e-commerce | MrSeo.tech",
    "description": "Analizujemy drogę od wejścia na kategorię do opłacenia zamówienia. Sprawdzamy przeszkody w filtrach, kartach produktów, koszyku i pomiarze — bez udawanych.",
    "kicker": "OPTYMALIZACJA KONWERSJI SKLEPU",
    "hero": [
      "Klienci oglądają produkty,",
      "ale nie kończą zakupów?"
    ],
    "lead": "Analizujemy drogę od wejścia na kategorię do opłacenia zamówienia. Sprawdzamy przeszkody w filtrach, kartach produktów, koszyku i pomiarze — bez udawanych wyników A/B.",
    "intro": "Sam wzrost ruchu nie usuwa problemów w procesie zakupowym.",
    "introText": "Kategorie i filtry nie odpowiadają sposobowi wyboru produktu. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Produkty trudno znaleźć",
        "Kategorie i filtry nie odpowiadają sposobowi wyboru produktu.",
        "Testujemy nawigację i dostępne warianty."
      ],
      [
        "Koszyk traci klientów",
        "Dostawa, koszty i płatności są niejasne lub ukryte.",
        "Przechodzimy zakup od produktu do potwierdzenia."
      ],
      [
        "Analityka podaje różne liczby",
        "Zdarzenia i zamówienia nie zgadzają się między systemami.",
        "Weryfikujemy purchase i identyfikatory transakcji."
      ]
    ],
    "process": [
      [
        "Analiza ścieżki",
        "Wybieramy ważne kategorie, urządzenia i etapy."
      ],
      [
        "Diagnoza przeszkód",
        "Sprawdzamy użyteczność i podstawowe dane o porzuceniach."
      ],
      [
        "Plan zmian",
        "Priorytetyzujemy poprawki względem wysiłku i ryzyka."
      ],
      [
        "Walidacja",
        "Testujemy proces i mierzymy wynik bez pochopnych wniosków."
      ]
    ],
    "outcomes": [
      [
        "Lista blokad zakupowych",
        "Konkretny ekran, problem i rekomendowana poprawka."
      ],
      [
        "Plan testów konwersji",
        "Hipoteza, metryka i minimalne wymagania danych."
      ],
      [
        "Kontrola pomiaru zamówień",
        "Porównanie zakupów i poprawności zdarzeń."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Użytkownik dodaje produkt, ale rezygnuje po zobaczeniu dostawy.",
      "Sprawdzamy kolejność informacji, koszty i błędy formularza.",
      "Opisujemy poprawkę i testujemy zamówienie na telefonie."
    ],
    "faq": [
      [
        "Czy gwarantujecie wzrost konwersji?",
        "Nie. Możemy wskazać i usunąć przeszkody, lecz wynik testu zależy od ruchu i oferty."
      ],
      [
        "Czy musimy zmieniać platformę?",
        "Najpierw oceniamy możliwe poprawki w obecnym sklepie."
      ],
      [
        "Czy analiza wymaga dużego ruchu?",
        "Użyteczność można badać przy małej próbie, ale ilościowy test A/B wymaga odpowiednich danych."
      ]
    ],
    "risk": "Użyteczność można badać przy małej próbie, ale ilościowy test A/B wymaga odpowiednich danych. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "ecommerce-seo",
        "SEO sklepów",
        "Widoczność kategorii i produktów"
      ],
      [
        "sklepy-woocommerce-shopify",
        "WooCommerce i Shopify",
        "Rozwój platformy"
      ]
    ],
    "visual": [
      "PRODUKT",
      "KOSZYK",
      "ZAKUP"
    ],
    "cta": "Sprawdźmy koszyk i konwersje"
  },
  "store-migration": {
    "title": "Migracja sklepu internetowego bez utraty ważnych adresów | MrSeo.tech",
    "description": "Planujemy przeniesienie katalogu, wariantów, zamówień i ważnych adresów URL z uwzględnieniem ograniczeń obu platform. Zmianę dzielimy na testowane etapy..",
    "kicker": "MIGRACJA I PRZEBUDOWA SKLEPU",
    "hero": [
      "Sklep wymaga przeprowadzki,",
      "ale nie chcesz zgubić produktów i klientów?"
    ],
    "lead": "Planujemy przeniesienie katalogu, wariantów, zamówień i ważnych adresów URL z uwzględnieniem ograniczeń obu platform. Zmianę dzielimy na testowane etapy.",
    "intro": "Najdroższe błędy migracji ujawniają się często po uruchomieniu.",
    "introText": "Linki z Google i reklam mogą kierować do błędów 404. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Po zmianie platformy znikają adresy produktów",
        "Linki z Google i reklam mogą kierować do błędów 404.",
        "Przygotowujemy mapę 301 i kontrolę kanonicznych URL."
      ],
      [
        "Warianty i stany nie zgadzają się",
        "Import może nadpisać identyfikatory lub pominąć dane.",
        "Wykonujemy próbne przeniesienie i porównanie danych."
      ],
      [
        "Zamówienia trafiają w nieznane miejsce",
        "Po migracji integracje mogą przekazywać niekompletne rekordy.",
        "Sprawdzamy płatności, dostawy i połączenia operacyjne."
      ]
    ],
    "process": [
      [
        "Inwentaryzacja starego sklepu",
        "Spisujemy istotne URL, produkty, dane i integracje."
      ],
      [
        "Mapa przeniesienia",
        "Ustalamy odpowiedniki, przekierowania i wyjątki."
      ],
      [
        "Import próbny",
        "Porównujemy produkty, warianty i wybrane zamówienia."
      ],
      [
        "Kontrola uruchomienia",
        "Testujemy 301, koszyk, checkout, analitykę i monitoring błędów."
      ]
    ],
    "outcomes": [
      [
        "Mapa starych i nowych adresów",
        "Priorytetowe przekierowania i kontrola 404."
      ],
      [
        "Protokół migracji danych",
        "Weryfikacja katalogu i wyjątków."
      ],
      [
        "Plan uruchomienia i wycofania",
        "Kroki, punkty kontroli oraz odpowiedzialności."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Sklep przenosi kategorie i produkty na nową platformę.",
      "Przygotowujemy listę dawnych URL oraz mapowanie wariantów.",
      "Testujemy przekierowania i próbny zakup po przełączeniu."
    ],
    "faq": [
      [
        "Czy da się zachować wszystkie adresy?",
        "Zależy od architektury i możliwości platform. Najważniejsze adresy mapujemy przed zmianą."
      ],
      [
        "Czy sklep musi przestać działać?",
        "Czas przełączenia i ograniczenia ustalamy po analizie infrastruktury."
      ],
      [
        "Czy przeniesiecie historię zamówień?",
        "Zakres zależy od eksportu źródła, zgód i możliwości importu nowego systemu."
      ]
    ],
    "risk": "Zakres zależy od eksportu źródła, zgód i możliwości importu nowego systemu. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "tworzenie-sklepow-internetowych",
        "Tworzenie sklepów",
        "Budowa i architektura e-commerce"
      ],
      [
        "website-speed-security",
        "Wydajność i bezpieczeństwo",
        "Kontrola techniczna sklepu"
      ]
    ],
    "visual": [
      "STARY SKLEP",
      "MIGRACJA",
      "TESTY"
    ],
    "cta": "Zaplanujmy bezpieczną migrację"
  },
  "service-websites": {
    "title": "Strony internetowe dla firm usługowych | MrSeo.tech",
    "description": "Projektujemy strony dla firm usługowych z osobnymi ofertami, konkretnymi odpowiedziami na pytania i łatwą drogą do rozmowy. Budowa nowej strony to osobny.",
    "kicker": "STRONY INTERNETOWE DLA FIRM USŁUGOWYCH",
    "hero": [
      "Twoje usługi są wartościowe,",
      "ale strona nie pomaga klientom wybrać?"
    ],
    "lead": "Projektujemy strony dla firm usługowych z osobnymi ofertami, konkretnymi odpowiedziami na pytania i łatwą drogą do rozmowy. Budowa nowej strony to osobny zakres od SEO istniejącego serwisu.",
    "intro": "Klient chce wiedzieć, co obejmuje usługa, dla kogo jest i jak się skontaktować.",
    "introText": "Trudno porównać warianty i zrozumieć zakres. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Usługi są wrzucone do jednego akapitu",
        "Trudno porównać warianty i zrozumieć zakres.",
        "Projektujemy strukturę usług i ich podstron."
      ],
      [
        "Witryna nie budzi zaufania",
        "Brakuje informacji o procesie, kontakcie i ograniczeniach.",
        "Układamy czytelne sekcje i sprawdzalne informacje."
      ],
      [
        "Klient nie może szybko wysłać zapytania",
        "Na telefonie kontakt ukrywa się za kilkoma kliknięciami.",
        "Upraszczamy formularz i testujemy jego działanie."
      ]
    ],
    "process": [
      [
        "Analiza oferty",
        "Ustalamy grupy usług i pytania klientów."
      ],
      [
        "Makieta stron",
        "Tworzymy hierarchię oferty, treści i kontaktu."
      ],
      [
        "Budowa i konfiguracja",
        "Wdrażamy responsywne widoki i wymagane funkcje."
      ],
      [
        "Kontrola startu",
        "Sprawdzamy formularze, linki i podstawy SEO."
      ]
    ],
    "outcomes": [
      [
        "Strony dla konkretnych usług",
        "Oferta czytelna bez branżowego żargonu."
      ],
      [
        "Mobilny kontakt",
        "Widoczny formularz i przyciski na telefonie."
      ],
      [
        "Struktura do dalszej promocji",
        "Możliwość osobnego SEO i kampanii Google Ads."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Firma ma dziesięć usług, ale tylko jedną ogólną stronę.",
      "Projektujemy strony dla odmiennych potrzeb klientów i nawigację między nimi.",
      "Sprawdzamy, czy każdą usługę można znaleźć i wysłać zapytanie."
    ],
    "faq": [
      [
        "Czy napiszecie opisy usług?",
        "Możemy przygotować treści na podstawie potwierdzonych informacji o firmie i jej ofercie."
      ],
      [
        "Czy uwzględniacie rezerwacje?",
        "Takie funkcje wymagają osobnego ustalenia procesu i integracji."
      ],
      [
        "Czy SEO wchodzi w stworzenie strony?",
        "Podstawy techniczne tak, stałe pozycjonowanie ustalamy oddzielnie."
      ]
    ],
    "risk": "Podstawy techniczne tak, stałe pozycjonowanie ustalamy oddzielnie. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "service-business-seo",
        "SEO stron usługowych",
        "Promocja istniejących usług"
      ],
      [
        "landing-pages",
        "Landing page",
        "Kampanie dla jednej usługi"
      ]
    ],
    "visual": [
      "USŁUGA",
      "STRONA",
      "KONTAKT"
    ],
    "cta": "Zaplanujmy stronę usługową"
  },
  "corporate-websites": {
    "title": "Strony firmowe i korporacyjne | MrSeo.tech",
    "description": "Tworzymy uporządkowane strony firmowe: od prezentacji zespołu i usług po obszary działalności, materiały dla partnerów i wielojęzyczną strukturę, jeśli.",
    "kicker": "STRONY FIRMOWE I KORPORACYJNE",
    "hero": [
      "Firma się rozwija,",
      "a strona nie nadąża za jej ofertą?"
    ],
    "lead": "Tworzymy uporządkowane strony firmowe: od prezentacji zespołu i usług po obszary działalności, materiały dla partnerów i wielojęzyczną strukturę, jeśli jest potrzebna.",
    "intro": "Serwis firmowy powinien jasno prezentować biznes i ułatwiać właściwy kontakt.",
    "introText": "Klienci, kandydaci i partnerzy nie znajdują właściwych informacji. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Różni odbiorcy widzą tę samą chaotyczną ofertę",
        "Klienci, kandydaci i partnerzy nie znajdują właściwych informacji.",
        "Projektujemy nawigację dla realnych grup użytkowników."
      ],
      [
        "Treści nie da się aktualizować",
        "Każda zmiana wymaga pomocy technicznej.",
        "Dobieramy przejrzyste moduły edycji i uprawnienia."
      ],
      [
        "Wersje językowe są niespójne",
        "Odbiorcy trafiają na inne oferty lub błędne tłumaczenia.",
        "Ustalamy strukturę języków i odpowiedniki treści."
      ]
    ],
    "process": [
      [
        "Warsztat struktury",
        "Ustalamy grupy odbiorców, ofertę i cele strony."
      ],
      [
        "Architektura informacji",
        "Projektujemy menu i układ kluczowych sekcji."
      ],
      [
        "Wdrożenie CMS",
        "Tworzymy widoki i sposób aktualizowania treści."
      ],
      [
        "Testy publikacji",
        "Sprawdzamy role, linki, formularze i wersje mobilne."
      ]
    ],
    "outcomes": [
      [
        "Spójna prezentacja firmy",
        "Oddzielne ścieżki dla właściwych odbiorców."
      ],
      [
        "Zarządzanie treścią",
        "Ustalony system edycji i uprawnienia."
      ],
      [
        "Plan rozwoju serwisu",
        "Podstawa rozbudowy języków i integracji."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Firma rozszerza ofertę na partnerów B2B i klientów detalicznych.",
      "Rozdzielamy ścieżki użytkowników, przygotowujemy strukturę i CMS.",
      "Testujemy dostęp do informacji i kontakt z każdej sekcji."
    ],
    "faq": [
      [
        "Czy obsługujecie wiele języków?",
        "Tak, ale dodajemy tylko kompletne wersje z właściwymi odpowiednikami treści."
      ],
      [
        "Czy można przenieść istniejącą treść?",
        "Tak, po audycie jakości i mapie adresów."
      ],
      [
        "Czy potrzebny jest dedykowany CMS?",
        "Nie zawsze. Technologię dobieramy do złożoności i zespołu."
      ]
    ],
    "risk": "Nie zawsze. Technologię dobieramy do złożoności i zespołu. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "website-redesign",
        "Redesign stron",
        "Modernizacja obecnej witryny"
      ],
      [
        "international-seo",
        "SEO międzynarodowe",
        "Wersje językowe i rynki"
      ]
    ],
    "visual": [
      "FIRMA",
      "STRUKTURA",
      "KONTAKT"
    ],
    "cta": "Omówmy stronę firmową"
  },
  "website-redesign": {
    "title": "Redesign i przebudowa strony internetowej | MrSeo.tech",
    "description": "Odświeżamy wygląd i sposób korzystania z serwisu, uwzględniając działające adresy, widoczność w Google, analitykę, formularze i potrzeby mobilnych.",
    "kicker": "REDESIGN I MODERNIZACJA STRON",
    "hero": [
      "Strona wygląda przestarzale,",
      "ale nie chcesz stracić tego, co działa?"
    ],
    "lead": "Odświeżamy wygląd i sposób korzystania z serwisu, uwzględniając działające adresy, widoczność w Google, analitykę, formularze i potrzeby mobilnych użytkowników.",
    "intro": "Redesign to zmiana doświadczenia klienta, nie tylko kolorów.",
    "introText": "Małe napisy i nachodzące elementy utrudniają kontakt. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Na telefonie trudno czytać ofertę",
        "Małe napisy i nachodzące elementy utrudniają kontakt.",
        "Sprawdzamy układy i krytyczne szerokości ekranu."
      ],
      [
        "Projekt wizualny pomija ważne strony",
        "Nowe menu może usunąć potrzebne treści lub linki.",
        "Mapujemy kluczowe adresy przed przebudową."
      ],
      [
        "Po zmianie znikają konwersje",
        "Formularze i śledzenie zdarzeń mogą działać inaczej.",
        "Testujemy wysyłkę i instrumentację pomiaru."
      ]
    ],
    "process": [
      [
        "Audyt obecnej strony",
        "Wybieramy działające elementy i realne problemy."
      ],
      [
        "Projekt zmian",
        "Przygotowujemy makiety i plan zachowania adresów."
      ],
      [
        "Wdrożenie etapami",
        "Budujemy responsywne widoki i potrzebne funkcje."
      ],
      [
        "Test przed przełączeniem",
        "Sprawdzamy URL, formularze, SEO i analitykę."
      ]
    ],
    "outcomes": [
      [
        "Nowy czytelny interfejs",
        "Hierarchia treści i kontakt na telefonie."
      ],
      [
        "Mapa zachowania URL",
        "Plan przekierowań tam, gdzie adres musi się zmienić."
      ],
      [
        "Kontrola działania",
        "Scenariusze testowania formularzy i śledzenia."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Na desktopie strona wygląda poprawnie, lecz na telefonie przycisk zasłania formularz.",
      "Odtwarzamy błąd, zmieniamy layout i kontrolujemy kluczowe sekcje.",
      "Sprawdzamy 360/390 px, dostępność kontaktu i zachowanie URL."
    ],
    "faq": [
      [
        "Czy można zachować adresy starych stron?",
        "W miarę możliwości tak. Zmiany URL wymagają świadomej mapy przekierowań."
      ],
      [
        "Czy wystarczy sam nowy design?",
        "Zależy od problemu. Najpierw oceniamy treści, funkcjonalność i użyteczność."
      ],
      [
        "Czy serwis będzie dostępny podczas prac?",
        "Prace można prowadzić na kopii testowej, a przełączenie osobno zaplanować."
      ]
    ],
    "risk": "Prace można prowadzić na kopii testowej, a przełączenie osobno zaplanować. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "website-speed-security",
        "Wydajność strony",
        "Stabilność i szybkość po zmianach"
      ],
      [
        "service-websites",
        "Strony usługowe",
        "Czytelna oferta i kontakt"
      ]
    ],
    "visual": [
      "AUDYT",
      "REDESIGN",
      "TEST"
    ],
    "cta": "Zaplanujmy redesign"
  },
  "website-speed-security": {
    "title": "Szybkość i bezpieczeństwo strony WWW | MrSeo.tech",
    "description": "Diagnozujemy przyczyny spowolnień i ryzyka techniczne: zasoby strony, błędy skryptów, aktualizacje, uprawnienia i kopie zapasowe. Zmiany poprzedzamy planem.",
    "kicker": "SZYBKOŚĆ I BEZPIECZEŃSTWO STRON",
    "hero": [
      "Strona ładuje się długo,",
      "a aktualizacje budzą niepokój?"
    ],
    "lead": "Diagnozujemy przyczyny spowolnień i ryzyka techniczne: zasoby strony, błędy skryptów, aktualizacje, uprawnienia i kopie zapasowe. Zmiany poprzedzamy planem testów.",
    "intro": "Szybkość i bezpieczeństwo wymagają pomiaru oraz kontroli zmian.",
    "introText": "Duże obrazy, czcionki lub skrypty mogą blokować renderowanie. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Pierwszy ekran pojawia się z opóźnieniem",
        "Duże obrazy, czcionki lub skrypty mogą blokować renderowanie.",
        "Analizujemy zasoby i wąskie gardła ładowania."
      ],
      [
        "Elementy przesuwają się podczas otwierania",
        "Niezarezerwowane miejsce na grafiki lub widżety utrudnia korzystanie.",
        "Badamy przesunięcia i krytyczne interakcje."
      ],
      [
        "Wtyczki i konta nie są kontrolowane",
        "Brak aktualizacji i kopii utrudnia reagowanie na awarie.",
        "Sprawdzamy uprawnienia, backup i plan aktualizacji."
      ]
    ],
    "process": [
      [
        "Pomiary i przegląd",
        "Sprawdzamy konkretne adresy, zasoby oraz konfigurację."
      ],
      [
        "Plan priorytetów",
        "Oddzielamy problemy użytkownika od kosmetycznych wskaźników."
      ],
      [
        "Kontrolowane poprawki",
        "Wdrażamy bezpieczne zmiany z planem cofnięcia."
      ],
      [
        "Pomiar po zmianach",
        "Porównujemy scenariusze i sprawdzamy działanie serwisu."
      ]
    ],
    "outcomes": [
      [
        "Lista wąskich gardeł",
        "Konkretny zasób i proponowana poprawka."
      ],
      [
        "Plan zabezpieczeń",
        "Role, kopie, aktualizacje i priorytety."
      ],
      [
        "Protokół testów",
        "Kontrola wydajności i ważnych funkcji."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Duży baner i skrypt reklamy opóźniają pierwszy ekran sklepu.",
      "Sprawdzamy rozmiary zasobów, zależności i kolejność ładowania.",
      "Wprowadzamy zmianę na testowej wersji i porównujemy pomiar."
    ],
    "faq": [
      [
        "Czy gwarantujecie wynik 100 w PageSpeed?",
        "Nie. Priorytetem jest doświadczenie użytkowników i realne ograniczenia platformy."
      ],
      [
        "Czy usuwacie skutki włamania?",
        "Możemy ocenić problem i dostępne kopie; zakres prac ustala się po analizie."
      ],
      [
        "Czy zmiany mogą uszkodzić witrynę?",
        "Ryzyko ograniczamy kopią, testowaniem i możliwością wycofania."
      ]
    ],
    "risk": "Ryzyko ograniczamy kopią, testowaniem i możliwością wycofania. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "opieka-wordpress",
        "Opieka WordPress",
        "Utrzymanie i aktualizacje"
      ],
      [
        "website-redesign",
        "Modernizacja strony",
        "Przebudowa i testy UX"
      ]
    ],
    "visual": [
      "POMIAR",
      "POPRAWKI",
      "WERYFIKACJA"
    ],
    "cta": "Sprawdźmy szybkość i ryzyka"
  },
  "web-applications": {
    "title": "Tworzenie aplikacji webowych i MVP | MrSeo.tech",
    "description": "Projektujemy aplikacje webowe, portale i prototypy MVP dopasowane do realnego procesu firmy. Zaczynamy od najważniejszego scenariusza, uprawnień i.",
    "kicker": "APLIKACJE WEBOWE I MVP",
    "hero": [
      "Excel i ręczne procesy",
      "nie wystarczają już Twojemu zespołowi?"
    ],
    "lead": "Projektujemy aplikacje webowe, portale i prototypy MVP dopasowane do realnego procesu firmy. Zaczynamy od najważniejszego scenariusza, uprawnień i integracji zamiast budować zbędne funkcje.",
    "intro": "Dobre MVP rozwiązuje jeden ważny problem i pozwala sprawdzić użyteczność.",
    "introText": "Dane się rozjeżdżają, a status pracy jest niejasny. Następnie ustalamy zakres niezbędnych zmian i sposób sprawdzenia rezultatów.",
    "problems": [
      [
        "Zespół pracuje na kilku arkuszach",
        "Dane się rozjeżdżają, a status pracy jest niejasny.",
        "Modelujemy jeden wspólny przepływ."
      ],
      [
        "Klient pyta o status przez telefon",
        "Brakuje prostego portalu z aktualnymi informacjami.",
        "Projektujemy właściwe role i widok historii."
      ],
      [
        "Pomysł rośnie bez kontroli kosztów",
        "Niejasne wymagania prowadzą do ciągłych zmian zakresu.",
        "Dzielimy funkcje na MVP i późniejszy rozwój."
      ]
    ],
    "process": [
      [
        "Opis procesu",
        "Ustalamy użytkowników, problemy i krytyczne dane."
      ],
      [
        "Prototyp i zakres MVP",
        "Projektujemy najprostszy użyteczny scenariusz."
      ],
      [
        "Budowa i integracje",
        "Wdrażamy funkcje, role i wymagane połączenia."
      ],
      [
        "Test odbiorczy",
        "Sprawdzamy dostęp, błędy i pracę użytkownika."
      ]
    ],
    "outcomes": [
      [
        "Zakres funkcjonalny MVP",
        "Wiadomo, co wchodzi w pierwszy etap."
      ],
      [
        "Działający scenariusz użytkownika",
        "Sprawdzony od logowania po rezultat."
      ],
      [
        "Plan iteracji i utrzymania",
        "Priorytety kolejnych funkcji oraz obsługa błędów."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Pracownicy przepisują statusy zgłoszeń między arkuszami i pocztą.",
      "Projektujemy prosty panel zgłoszeń z rolami i historią zmian.",
      "Testujemy pełny cykl sprawy i dostęp poszczególnych użytkowników."
    ],
    "faq": [
      [
        "Czy można zacząć od małego MVP?",
        "Tak. Ograniczenie pierwszego etapu zmniejsza koszt sprawdzenia koncepcji."
      ],
      [
        "Czy aplikacja może łączyć się z CRM?",
        "Po analizie dokumentacji API, uprawnień i odpowiedzialności za dane."
      ],
      [
        "Czy mogę później rozwijać produkt?",
        "Projektujemy architekturę adekwatną do znanych planów, bez obietnicy nieograniczonej skalowalności."
      ]
    ],
    "risk": "Projektujemy architekturę adekwatną do znanych planów, bez obietnicy nieograniczonej skalowalności. Zakres i warunki odbioru ustalamy przed rozpoczęciem prac.",
    "related": [
      [
        "api-integrations",
        "Integracje API",
        "Łączenie danych i procesów"
      ],
      [
        "web-development",
        "Web development",
        "Architektura i niestandardowe rozwiązania"
      ]
    ],
    "visual": [
      "PROCES",
      "APLIKACJA",
      "REZULTAT"
    ],
    "cta": "Omówmy aplikację webową"
  }
}
MRSEO_PL_FINAL
,true,512,JSON_THROW_ON_ERROR);
}
