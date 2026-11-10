<?php
if(!defined('ABSPATH'))exit;
/** Five original Polish commercial service landings; reused by the approved Polish template. */
function mrseo_pl_next_service_data(){
return json_decode(<<<'MRSEO_PL_NEXT'
{
  "local-seo": {
    "title": "SEO lokalne dla firm | MrSeo.tech",
    "description": "Weryfikujemy widoczność usług w lokalnych wynikach, profil firmy, zgodność danych kontaktowych i strony dla obsługiwanych miejscowości. Nie obiecujemy.",
    "kicker": "SEO LOKALNE I WIDOCZNOŚĆ W MAPACH GOOGLE",
    "hero": [
      "Klienci są blisko.",
      "Dlaczego nie widzą Twojej firmy?"
    ],
    "lead": "Weryfikujemy widoczność usług w lokalnych wynikach, profil firmy, zgodność danych kontaktowych i strony dla obsługiwanych miejscowości. Nie obiecujemy pozycji w mapach.",
    "intro": "Wyszukiwania lokalne powinny prowadzić do właściwej usługi",
    "introText": "Firmę trzeba znaleźć na obszarze, na którym naprawdę działa. Sprawdzamy lokalne wyniki i możliwość kontaktu z telefonu.",
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
        "Mapa lokalnych zapytań",
        "Lista miast, usług i stron wymagających pracy."
      ],
      [
        "Kontrola profilu firmy",
        "Rozbieżności w kategoriach, godzinach i danych kontaktowych."
      ],
      [
        "Sprawdzona droga do kontaktu",
        "Test linków, telefonu i formularza na smartfonie."
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
    "risk": "Profil firmy, strony usług, aktualność danych i dostępność kontaktu. Zakres wdrożenia i sposób weryfikacji ustalamy w ofercie.",
    "related": [
      [
        "seo",
        "Pozycjonowanie stron",
        "Szersza widoczność usług"
      ],
      [
        "service-business-seo",
        "SEO stron usługowych",
        "Właściwa oferta na stronie"
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
    "description": "Sprawdzamy, czy najważniejsze usługi mają właściwe strony, odpowiadają na pytania klientów i prowadzą do kontaktu. Najpierw ustalamy, czego szukają.",
    "kicker": "SEO DLA FIRM USŁUGOWYCH",
    "hero": [
      "Klienci szukają Twoich usług.",
      "Dlaczego trafiają do konkurencji?"
    ],
    "lead": "Sprawdzamy, czy najważniejsze usługi mają właściwe strony, odpowiadają na pytania klientów i prowadzą do kontaktu. Najpierw ustalamy, czego szukają potencjalni klienci.",
    "intro": "Jedna strona o wszystkich usługach to często za mało",
    "introText": "Struktura usług powinna odpowiadać na osobne pytania klientów, a nie powielać jedną ofertę na wielu podstronach.",
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
        "Mapa usług i intencji",
        "Ważne frazy przypisane do właściwych adresów."
      ],
      [
        "Backlog zmian SEO",
        "Konkretne tytuły, opisy, linki i braki treści."
      ],
      [
        "Sprawdzona ścieżka zapytania",
        "Kontrola formularza oraz ważnych wejść."
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
    "risk": "Nie. Czas zależy od konkurencji, technicznego stanu strony i popytu. Zakres wdrożenia i sposób weryfikacji ustalamy w ofercie.",
    "related": [
      [
        "service-websites",
        "Tworzenie stron usługowych",
        "Nowa strona dla firmy"
      ],
      [
        "local-seo",
        "SEO lokalne",
        "Widoczność w regionie"
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
    "description": "Projektujemy konkretną stronę dopasowaną do intencji reklamy: z jasną ofertą, czytelnym kontaktem i pomiarem zgłoszeń. Nie dokładamy sekcji tylko po to, by.",
    "kicker": "LANDING PAGE POD REKLAMĘ",
    "hero": [
      "Kliknięcia z reklamy są.",
      "Dlaczego formularz milczy?"
    ],
    "lead": "Projektujemy konkretną stronę dopasowaną do intencji reklamy: z jasną ofertą, czytelnym kontaktem i pomiarem zgłoszeń. Nie dokładamy sekcji tylko po to, by strona wyglądała na dłuższą.",
    "intro": "Ruch reklamowy potrzebuje odpowiedniej strony docelowej",
    "introText": "Reklama i strona docelowa muszą odpowiadać na to samo pytanie klienta; inaczej nawet dobre kliknięcia nie prowadzą do rozmowy.",
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
        "Jeden czytelny komunikat",
        "Strona zgodna z intencją konkretnej reklamy."
      ],
      [
        "Prosta ścieżka zgłoszenia",
        "Widoczny formularz z testem wysyłki."
      ],
      [
        "Weryfikacja konwersji",
        "Sprawdzony przepływ zdarzenia i rzeczywistej wiadomości."
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
    "risk": "Nie. Wynik zależy także od oferty, źródła ruchu i cen. Zakres wdrożenia i sposób weryfikacji ustalamy w ofercie.",
    "related": [
      [
        "google-ads",
        "Google Ads",
        "Prowadzenie kampanii"
      ],
      [
        "local-google-ads",
        "Reklamy lokalne",
        "Kampanie dla regionu"
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
    "description": "Łączymy źródła danych o produktach z katalogiem sklepu, żeby ograniczyć ręczne poprawki i ryzyko sprzedaży niedostępnego towaru. Zakres integracji zależy od.",
    "kicker": "AUTOMATYZACJA E-COMMERCE",
    "hero": [
      "Ceny i stany się rozjeżdżają.",
      "Nie przepisuj danych ręcznie."
    ],
    "lead": "Łączymy źródła danych o produktach z katalogiem sklepu, żeby ograniczyć ręczne poprawki i ryzyko sprzedaży niedostępnego towaru. Zakres integracji zależy od możliwości używanego systemu.",
    "intro": "Produkt nie powinien znikać między arkuszem a zamówieniem",
    "introText": "Stan magazynowy i cena muszą być spójne niezależnie od liczby plików i systemów. Kluczowe są błędy importu oraz scenariusze odzyskania danych.",
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
        "Mapa źródeł danych",
        "Źródła prawdy i identyfikatory produktów."
      ],
      [
        "Reguły importu",
        "Mapowanie pól i obsługa nieprawidłowych rekordów."
      ],
      [
        "Próba na wybranych SKU",
        "Kontrola cen i stanów przed pełnym wdrożeniem."
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
    "risk": "Plan odzyskania zależy od kopii, logów i możliwości systemu. Zakres wdrożenia i sposób weryfikacji ustalamy w ofercie.",
    "related": [
      [
        "tworzenie-sklepow-internetowych",
        "Tworzenie sklepów",
        "Katalog i proces zakupowy"
      ],
      [
        "api-integrations",
        "Integracje API",
        "Synchronizacja systemów"
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
    "description": "Projektujemy połączenia sklepu, formularzy, CRM i systemów operacyjnych, aby dane trafiały do właściwego miejsca. Najpierw sprawdzamy dostęp i ograniczenia.",
    "kicker": "INTEGRACJE API I AUTOMATYZACJA",
    "hero": [
      "Systemy nie rozmawiają ze sobą.",
      "Dane giną między formularzem a CRM."
    ],
    "lead": "Projektujemy połączenia sklepu, formularzy, CRM i systemów operacyjnych, aby dane trafiały do właściwego miejsca. Najpierw sprawdzamy dostęp i ograniczenia obu stron.",
    "intro": "Integracja ma ograniczać ręczną pracę, nie tworzyć nowe błędy",
    "introText": "Integracja jest użyteczna tylko wtedy, gdy poprawnie radzi sobie z opóźnieniami, błędami i ponawianiem operacji.",
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
        "Schemat zdarzeń i danych",
        "Kierunek przepływu, pola i odpowiedzialność."
      ],
      [
        "Obsługa błędów",
        "Logi, ponawianie operacji i ochrona przed duplikacją."
      ],
      [
        "Test integracji",
        "Potwierdzenie prawidłowego i błędnego scenariusza."
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
    "risk": "Projekt obejmuje minimalne uprawnienia oraz ochronę danych; szczegóły ustalamy dla konkretnych systemów. Zakres wdrożenia i sposób weryfikacji ustalamy w ofercie.",
    "related": [
      [
        "web-applications",
        "Aplikacje webowe",
        "Panele i procesy firmowe"
      ],
      [
        "catalog-automation",
        "Automatyzacja katalogu",
        "Przepływ danych produktowych"
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
