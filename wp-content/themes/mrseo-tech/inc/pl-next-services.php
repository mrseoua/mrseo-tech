<?php
if(!defined('ABSPATH'))exit;
/** Five original Polish commercial service landings; reused by the approved Polish template. */
function mrseo_pl_next_service_data(){
return json_decode(<<<'MRSEO_PL_NEXT'
{
  "local-seo": {
    "title": "SEO lokalne dla firm | MrSeo.tech",
    "description": "Weryfikujemy widoczność usług w lokalnych wynikach, profil firmy, zgodność danych kontaktowych i strony dla obsługiwanych miejscowości. Nie obiecujemy pozycji w mapach. Widoczność ",
    "kicker": "SEO LOKALNE I WIDOCZNOŚĆ W MAPACH GOOGLE",
    "hero": [
      "Gdy firma jest blisko, ale klienci jej nie znajdują",
      "SEO lokalne i widoczność w Mapach Google"
    ],
    "lead": "Weryfikujemy widoczność usług w lokalnych wynikach, profil firmy, zgodność danych kontaktowych i strony dla obsługiwanych miejscowości. Nie obiecujemy pozycji w mapach.",
    "intro": "Wyszukiwania lokalne powinny prowadzić do właściwej usługi",
    "introText": "Widoczność zależy od lokalizacji, konkurencji, wiarygodności profilu oraz jakości strony.",
    "problems": [
      [
        "Firma nie pojawia się przy usłudze i mieście",
        "Sprawdzamy zapytania lokalne, strony usług oraz faktyczne obszary działania.",
        "Tworzymy listę brakujących lub nieczytelnych podstron."
      ],
      [
        "Profil firmy pokazuje nieaktualne informacje",
        "Niespójne godziny, kategorie i dane utrudniają klientowi kontakt.",
        "Porównujemy profil Google z oficjalnymi danymi firmy."
      ],
      [
        "Ruch z Map nie zamienia się w zapytania",
        "Kontakt i opis usługi mogą być niewidoczne na telefonie.",
        "Testujemy połączenie, nawigację i formularz na telefonie."
      ]
    ],
    "process": [
      [
        "Audyt lokalnych wyników",
        "Zbieramy zapytania, lokalizacje i adresy konkurencyjnych stron."
      ],
      [
        "Uporządkowanie informacji",
        "Wskazujemy rozbieżności w profilach, danych i kategoriach."
      ],
      [
        "Strony usług i lokalizacji",
        "Plan treści przygotowujemy wyłącznie dla rzeczywiście obsługiwanych miejsc."
      ],
      [
        "Weryfikacja kontaktu",
        "Sprawdzamy nawigację, przyciski telefonu i śledzenie zapytań."
      ]
    ],
    "outcomes": [
      [
        "Mapa lokalnych zapytań i brakujących stron",
        "Materiał do wdrożenia i niezależnej kontroli."
      ],
      [
        "Lista korekt profilu oraz danych firmy",
        "Zakres działań opisany bez obietnic niepopartych danymi."
      ],
      [
        "Kontrolna ścieżka od wyszukania do kontaktu",
        "Sprawdzamy wynik na uzgodnionym scenariuszu."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Klient wpisuje nazwę usługi i miasto, lecz trafia do konkurencji.",
      "Porównujemy lokalne zapytania z istniejącymi podstronami i profilem firmy.",
      "Przekazujemy priorytety korekt i sposób sprawdzenia, czy klient trafi do kontaktu."
    ],
    "faq": [
      [
        "Czy potrzebny jest adres w każdym mieście?",
        "Nie tworzymy fikcyjnych lokalizacji. Strony miejscowości opisują prawdziwy obszar obsługi."
      ],
      [
        "Czy gwarantujecie pierwsze miejsce w Mapach?",
        "Nie. Lokalna widoczność zależy między innymi od położenia użytkownika i konkurencji."
      ],
      [
        "Co sprawdzicie najpierw?",
        "Profil firmy, strony usług, aktualność danych i dostępność kontaktu."
      ]
    ],
    "risk": "Zakres, harmonogram i weryfikację ustalamy po analizie. Nie gwarantujemy pozycji w Google, liczby zapytań ani wzrostu sprzedaży.",
    "related": [
      [
        "seo",
        "SEO",
        "Widoczność w Google"
      ],
      [
        "web-development",
        "Web development",
        "Zmiany techniczne i integracje"
      ]
    ],
    "visual": [
      "FRAZY LOKALNE",
      "STRONA USŁUGI",
      "KONTAKT"
    ],
    "cta": "Porozmawiajmy o SEO lokalnym"
  },
  "service-business-seo": {
    "title": "SEO stron usługowych | MrSeo.tech",
    "description": "Sprawdzamy, czy najważniejsze usługi mają właściwe strony, odpowiadają na pytania klientów i prowadzą do kontaktu. Najpierw ustalamy, czego szukają potencjalni klienci. Klient posz",
    "kicker": "SEO DLA FIRM USŁUGOWYCH",
    "hero": [
      "Masz ofertę usług, ale Google pokazuje inne firmy",
      "SEO dla firm usługowych"
    ],
    "lead": "Sprawdzamy, czy najważniejsze usługi mają właściwe strony, odpowiadają na pytania klientów i prowadzą do kontaktu. Najpierw ustalamy, czego szukają potencjalni klienci.",
    "intro": "Jedna strona o wszystkich usługach to często za mało",
    "introText": "Klient poszukuje konkretnego rozwiązania, nie ogólnej listy możliwości.",
    "problems": [
      [
        "Usługi są ukryte na jednej podstronie",
        "Wyszukiwarka nie otrzymuje jasnych sygnałów o każdym zakresie pracy.",
        "Tworzymy mapę usług i potrzebnych stron."
      ],
      [
        "Strony mają ruch, ale brak zapytań",
        "Opis nie odpowiada na obawy klienta albo kontakt jest zbyt trudny.",
        "Analizujemy treści, ścieżkę i widoczność przycisków."
      ],
      [
        "Kilka podstron walczy o te same frazy",
        "Podobne tytuły i teksty utrudniają wybór właściwego adresu.",
        "Wykrywamy nakładanie się tematów i proponujemy uporządkowanie."
      ]
    ],
    "process": [
      [
        "Rozpoznanie zapytań",
        "Łączymy konkretne problemy użytkowników z ofertą usług."
      ],
      [
        "Mapa usług i adresów",
        "Określamy strony główne, specjalizacje i wymagane uzupełnienia."
      ],
      [
        "Usprawnienie treści",
        "Wyjaśniamy usługę, ograniczenia i drogę do kontaktu."
      ],
      [
        "Pomiar zapytań",
        "Sprawdzamy, czy kontakt jest prawidłowo rejestrowany."
      ]
    ],
    "outcomes": [
      [
        "Priorytetowa mapa usług i słów kluczowych",
        "Materiał do wdrożenia i niezależnej kontroli."
      ],
      [
        "Lista zmian treści oraz linkowania",
        "Zakres działań opisany bez obietnic niepopartych danymi."
      ],
      [
        "Kontrola formularzy i ważnych zapytań",
        "Sprawdzamy wynik na uzgodnionym scenariuszu."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Firma oferuje kilka usług, ale klienci znajdują tylko stronę główną.",
      "Rozdzielamy odmienne potrzeby użytkowników na sensowne podstrony.",
      "Sprawdzamy wewnętrzne linki i czy każda strona umożliwia kontakt."
    ],
    "faq": [
      [
        "Czy potrzebuję osobnej strony dla każdej usługi?",
        "Tylko gdy odpowiada ona realnej, odrębnej potrzebie klienta."
      ],
      [
        "Czy poprawiacie istniejące treści?",
        "Tak, plan obejmuje korektę ważnych stron i wskazanie brakujących informacji."
      ],
      [
        "Czy SEO zapewni zapytania od razu?",
        "Nie. Czas zależy od konkurencji, technicznego stanu strony i popytu."
      ]
    ],
    "risk": "Zakres, harmonogram i weryfikację ustalamy po analizie. Nie gwarantujemy pozycji w Google, liczby zapytań ani wzrostu sprzedaży.",
    "related": [
      [
        "seo",
        "SEO",
        "Widoczność w Google"
      ],
      [
        "web-development",
        "Web development",
        "Zmiany techniczne i integracje"
      ]
    ],
    "visual": [
      "USŁUGI",
      "WYSZUKIWANIE",
      "ZAPYTANIA"
    ],
    "cta": "Sprawdźmy SEO Twoich usług"
  },
  "landing-pages": {
    "title": "Landing page pod kampanie Google Ads | MrSeo.tech",
    "description": "Projektujemy konkretną stronę dopasowaną do intencji reklamy: z jasną ofertą, czytelnym kontaktem i pomiarem zgłoszeń. Nie dokładamy sekcji tylko po to, by strona wyglądała na dłuż",
    "kicker": "LANDING PAGE POD REKLAMĘ",
    "hero": [
      "Kliknięcia są, a formularz pozostaje pusty?",
      "Landing page pod reklamę"
    ],
    "lead": "Projektujemy konkretną stronę dopasowaną do intencji reklamy: z jasną ofertą, czytelnym kontaktem i pomiarem zgłoszeń. Nie dokładamy sekcji tylko po to, by strona wyglądała na dłuższą.",
    "intro": "Ruch reklamowy potrzebuje odpowiedniej strony docelowej",
    "introText": "Skuteczność zależy od zgodności obietnicy reklamy, potrzeb klienta i formularza.",
    "problems": [
      [
        "Reklama prowadzi na ogólną stronę",
        "Klient nie widzi produktu lub usługi, którą przed chwilą wyszukał.",
        "Dopasowujemy nagłówek i ofertę do tematu kampanii."
      ],
      [
        "Formularz jest zbyt skomplikowany",
        "Zbyt wiele pól lub błędy blokują wysłanie zgłoszenia.",
        "Ograniczamy liczbę pól i testujemy scenariusze formularza."
      ],
      [
        "Nie wiadomo, skąd pochodzą zapytania",
        "Brak poprawnych zdarzeń utrudnia ocenę kampanii.",
        "Ustalamy zdarzenie zgłoszenia i jego weryfikację."
      ]
    ],
    "process": [
      [
        "Dopasowanie do kampanii",
        "Ustalamy jedną grupę odbiorców i jedną główną ofertę."
      ],
      [
        "Makieta i treść",
        "Projektujemy kolejność argumentów, zaufanie i kontakt."
      ],
      [
        "Budowa landing page",
        "Wdrażamy wersję mobilną i uzgodnione integracje."
      ],
      [
        "Test formularza",
        "Sprawdzamy poprawność wysyłki, zdarzenia i przekierowania."
      ]
    ],
    "outcomes": [
      [
        "Strona odpowiadająca na konkretną reklamę",
        "Materiał do wdrożenia i niezależnej kontroli."
      ],
      [
        "Prosty kontakt i wersja mobilna",
        "Zakres działań opisany bez obietnic niepopartych danymi."
      ],
      [
        "Specyfikacja oraz weryfikacja pomiaru zgłoszeń",
        "Sprawdzamy wynik na uzgodnionym scenariuszu."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Reklama usługi prowadzi na stronę główną z dziesiątkami odnośników.",
      "Tworzymy czytelny ekran z jednym komunikatem i formularzem.",
      "Wysyłamy zgłoszenie testowe i porównujemy zdarzenie z faktyczną wiadomością."
    ],
    "faq": [
      [
        "Czy landing page musi być na osobnej domenie?",
        "Nie. Najpierw oceniamy istniejącą strukturę serwisu i analitykę."
      ],
      [
        "Czy przygotowujecie również reklamy?",
        "Możemy ustalić oddzielny zakres Google Ads, bez łączenia kosztów w ciemno."
      ],
      [
        "Czy gwarantujecie współczynnik konwersji?",
        "Nie. Wynik zależy także od oferty, źródła ruchu i cen."
      ]
    ],
    "risk": "Zakres, harmonogram i weryfikację ustalamy po analizie. Nie gwarantujemy pozycji w Google, liczby zapytań ani wzrostu sprzedaży.",
    "related": [
      [
        "seo",
        "SEO",
        "Widoczność w Google"
      ],
      [
        "web-development",
        "Web development",
        "Zmiany techniczne i integracje"
      ]
    ],
    "visual": [
      "REKLAMA",
      "OFERTA",
      "LEAD"
    ],
    "cta": "Omówmy landing page"
  },
  "catalog-automation": {
    "title": "Automatyzacja katalogu i stanów sklepu | MrSeo.tech",
    "description": "Łączymy źródła danych o produktach z katalogiem sklepu, żeby ograniczyć ręczne poprawki i ryzyko sprzedaży niedostępnego towaru. Zakres integracji zależy od możliwości używanego sy",
    "kicker": "AUTOMATYZACJA E-COMMERCE",
    "hero": [
      "Ceny i stany w sklepie wciąż aktualizujesz ręcznie?",
      "Automatyzacja e-commerce"
    ],
    "lead": "Łączymy źródła danych o produktach z katalogiem sklepu, żeby ograniczyć ręczne poprawki i ryzyko sprzedaży niedostępnego towaru. Zakres integracji zależy od możliwości używanego systemu.",
    "intro": "Produkt nie powinien znikać między arkuszem a zamówieniem",
    "introText": "Zaczynamy od źródła danych, wyjątków i reguł konfliktu, nie od obietnicy pełnej automatyzacji.",
    "problems": [
      [
        "Stan magazynowy różni się w dwóch systemach",
        "Synchronizacja może działać z opóźnieniem lub pomijać warianty.",
        "Opisujemy źródło prawdy i częstotliwość aktualizacji."
      ],
      [
        "Ceny trzeba poprawiać w wielu miejscach",
        "Ręczne zmiany powodują rozbieżności w sklepie i reklamach.",
        "Projektujemy reguły importu oraz walidację cen."
      ],
      [
        "Import wyłącza lub nadpisuje produkty",
        "Niepełne identyfikatory i błędy mapowania niszczą dane.",
        "Testujemy partię i dokumentujemy obsługę błędów."
      ]
    ],
    "process": [
      [
        "Mapa danych",
        "Ustalamy identyfikatory, źródła i odpowiedzialność za pola."
      ],
      [
        "Reguły synchronizacji",
        "Projektujemy mapowanie, wyjątki i tryb odzyskania danych."
      ],
      [
        "Integracja pilotażowa",
        "Testujemy ograniczony zestaw produktów i wariantów."
      ],
      [
        "Kontrola błędów",
        "Sprawdzamy logi, alerty i zgodność stanów po imporcie."
      ]
    ],
    "outcomes": [
      [
        "Mapa przepływu danych produktowych",
        "Materiał do wdrożenia i niezależnej kontroli."
      ],
      [
        "Reguły synchronizacji i sytuacji wyjątkowych",
        "Zakres działań opisany bez obietnic niepopartych danymi."
      ],
      [
        "Testowy import z kontrolą zmian",
        "Sprawdzamy wynik na uzgodnionym scenariuszu."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Arkusz dostawcy pokazuje nową cenę, ale sklep sprzedaje po starej.",
      "Porównujemy identyfikatory produktów, datę aktualizacji i reguły importu.",
      "Testujemy wybrane SKU oraz raport rozbieżności przed pełnym wdrożeniem."
    ],
    "faq": [
      [
        "Czy każda platforma pozwala na integrację?",
        "Nie. Zależy to od API, eksportów i uprawnień danego planu."
      ],
      [
        "Czy dane będą aktualizowane natychmiast?",
        "Nie zawsze. Opóźnienia i ograniczenia opisujemy przed wdrożeniem."
      ],
      [
        "Czy można cofnąć błędny import?",
        "Plan odzyskania zależy od kopii, logów i możliwości systemu."
      ]
    ],
    "risk": "Zakres, harmonogram i weryfikację ustalamy po analizie. Nie gwarantujemy pozycji w Google, liczby zapytań ani wzrostu sprzedaży.",
    "related": [
      [
        "seo",
        "SEO",
        "Widoczność w Google"
      ],
      [
        "web-development",
        "Web development",
        "Zmiany techniczne i integracje"
      ]
    ],
    "visual": [
      "ŹRÓDŁO",
      "SYNCHRONIZACJA",
      "KATALOG"
    ],
    "cta": "Omówmy katalog produktów"
  },
  "api-integrations": {
    "title": "Integracje API, CRM i e-commerce | MrSeo.tech",
    "description": "Projektujemy połączenia sklepu, formularzy, CRM i systemów operacyjnych, aby dane trafiały do właściwego miejsca. Najpierw sprawdzamy dostęp i ograniczenia obu stron. Najważniejsze",
    "kicker": "INTEGRACJE API I AUTOMATYZACJA",
    "hero": [
      "Systemy nie rozmawiają ze sobą, a zespół kopiuje dane?",
      "Integracje API i automatyzacja"
    ],
    "lead": "Projektujemy połączenia sklepu, formularzy, CRM i systemów operacyjnych, aby dane trafiały do właściwego miejsca. Najpierw sprawdzamy dostęp i ograniczenia obu stron.",
    "intro": "Integracja ma ograniczać ręczną pracę, nie tworzyć nowe błędy",
    "introText": "Najważniejsze są poprawne identyfikatory, uprawnienia, kolejki i sytuacje awaryjne.",
    "problems": [
      [
        "Zapytania z formularza giną w skrzynce",
        "Brak automatycznego przypisania i potwierdzenia spowalnia reakcję.",
        "Opisujemy przesyłanie zgłoszeń do CRM i kontrolę błędów."
      ],
      [
        "Zamówienia trzeba przepisywać ręcznie",
        "Dane z e-commerce i systemu obsługi nie są spójne.",
        "Ustalamy pola, identyfikatory i kierunki synchronizacji."
      ],
      [
        "Integracja działa tylko do pierwszej awarii",
        "Brak logów i ponownych prób utrudnia wykrycie utraconych zdarzeń.",
        "Projektujemy monitoring i bezpieczne ponawianie operacji."
      ]
    ],
    "process": [
      [
        "Analiza systemów",
        "Weryfikujemy dokumentację API, dostęp i ograniczenia."
      ],
      [
        "Projekt przepływu",
        "Ustalamy zdarzenia, mapowanie i źródła danych."
      ],
      [
        "Wdrożenie kontrolowane",
        "Testujemy przypadki prawidłowe oraz błędne."
      ],
      [
        "Odbiór i obserwacja",
        "Dokumentujemy logi, błędy i sposób utrzymania."
      ]
    ],
    "outcomes": [
      [
        "Mapa przepływu danych i zdarzeń",
        "Materiał do wdrożenia i niezależnej kontroli."
      ],
      [
        "Specyfikacja integracji i obsługi błędów",
        "Zakres działań opisany bez obietnic niepopartych danymi."
      ],
      [
        "Testy przekazania i deduplikacji",
        "Sprawdzamy wynik na uzgodnionym scenariuszu."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Klient wysyła formularz, ale handlowiec nie widzi zgłoszenia w CRM.",
      "Badamy identyfikator zgłoszenia, odpowiedź API i obsługę błędów.",
      "Weryfikujemy testowy lead oraz potwierdzenie odbioru w systemie."
    ],
    "faq": [
      [
        "Czy integrujecie system bez otwartego API?",
        "Najpierw sprawdzamy bezpieczne dostępne metody. Nie obiecujemy dostępu, którego dostawca nie udostępnia."
      ],
      [
        "Czy potrzebny jest stały serwer?",
        "Zależy od częstotliwości, liczby zdarzeń i architektury integracji."
      ],
      [
        "Czy dane klientów są bezpieczne?",
        "Projekt obejmuje minimalne uprawnienia oraz ochronę danych; szczegóły ustalamy dla konkretnych systemów."
      ]
    ],
    "risk": "Zakres, harmonogram i weryfikację ustalamy po analizie. Nie gwarantujemy pozycji w Google, liczby zapytań ani wzrostu sprzedaży.",
    "related": [
      [
        "seo",
        "SEO",
        "Widoczność w Google"
      ],
      [
        "web-development",
        "Web development",
        "Zmiany techniczne i integracje"
      ]
    ],
    "visual": [
      "FORMULARZ",
      "API / CRM",
      "POTWIERDZENIE"
    ],
    "cta": "Omówmy integrację"
  }
}
MRSEO_PL_NEXT
,true,512,JSON_THROW_ON_ERROR);
}
