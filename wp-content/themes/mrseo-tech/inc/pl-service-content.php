<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/pl-next-services.php';
require_once __DIR__.'/pl-final-services.php';
/** Polish-first original commercial landing content; country-specific without fake case claims. */
function mrseo_pl_service_data(){
 static $pages=null;
 if($pages===null){
  $json=<<<'MRSEO_PL_SERVICES'
{
  "tworzenie-stron-internetowych": {
    "title": "Tworzenie stron internetowych dla firm | MrSeo.tech",
    "description": "Projektujemy strony firmowe i usługowe: przejrzysta oferta, szybka wersja mobilna, formularze, SEO i przygotowanie do Google Ads. Dopasowujemy technologię do potrzeb.",
    "kicker": "TWORZENIE STRON INTERNETOWYCH",
    "hero": [
      "Nowa strona dla firmy?",
      "Zacznijmy od tego, co ma osiągnąć."
    ],
    "lead": "Budujemy strony firmowe i serwisy usługowe, które jasno przedstawiają ofertę, ułatwiają kontakt i pozwalają rozwijać marketing. Zamiast zaczynać od szablonu, ustalamy cele, strukturę i sposób obsługi zapytań.",
    "intro": "Od pomysłu do strony, z której klient potrafi skorzystać",
    "introText": "Projekt może obejmować nową stronę, odświeżenie przestarzałego serwisu lub uporządkowanie oferty. Zakres i technologię ustalamy przed wyceną.",
    "problems": [
      [
        "Firma dopiero zaczyna",
        "Potrzebujesz wiarygodnej strony z usługami, kontaktem, ofertą i możliwością dalszej rozbudowy.",
        "Projektujemy strukturę pod rzeczywiste usługi i pytania klientów."
      ],
      [
        "Strona wygląda dobrze, ale nie zbiera zapytań",
        "Użytkownik nie widzi korzyści, numeru telefonu albo nie potrafi wygodnie wysłać formularza.",
        "Sprawdzamy komunikat, ścieżkę kontaktu i doświadczenie mobilne."
      ],
      [
        "Aktualizacje wymagają programisty",
        "Nawet zmiana opisu usługi jest skomplikowana i kosztowna.",
        "Wybieramy odpowiedni system zarządzania treścią i zakres edycji."
      ]
    ],
    "process": [
      [
        "Rozmowa o firmie i odbiorcach",
        "Poznajemy usługi, klientów, cel strony i istniejące materiały."
      ],
      [
        "Projekt struktury i widoków",
        "Układamy podstrony, ofertę, sposób kontaktu i wersję mobilną."
      ],
      [
        "Wdrożenie i integracje",
        "Budujemy ustalone funkcje, formularze i podstawy pomiaru."
      ],
      [
        "Testy przed uruchomieniem",
        "Sprawdzamy formularze, wydajność, nawigację, ważne adresy i przekazanie dostępu."
      ]
    ],
    "outcomes": [
      [
        "Strona dopasowana do firmy",
        "Usługi i argumenty są zrozumiałe bez znajomości branżowego żargonu."
      ],
      [
        "Wygodny kontakt na telefonie",
        "Czytelne przyciski, formularz i sposób nawiązania rozmowy."
      ],
      [
        "Gotowość do dalszego marketingu",
        "Przemyślana struktura treści oraz miejsce na pomiar zapytań i kampanie."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Klient szuka lokalnej usługi i trafia na stronę firmy.",
      "Proponujemy uporządkowane podstrony usług oraz widoczną ścieżkę kontaktu.",
      "Sprawdzamy formularz i możliwość dotarcia do oferty na smartfonie."
    ],
    "faq": [
      [
        "Ile kosztuje strona internetowa?",
        "Cena zależy od liczby widoków, zakresu projektu, treści, integracji i systemu edycji. Po poznaniu wymagań przygotowujemy zakres i wycenę."
      ],
      [
        "Czy tworzycie strony WordPress?",
        "Możemy zaproponować WordPress tam, gdzie pasuje do wymagań. Nie jest to jedyna możliwa technologia."
      ],
      [
        "Czy strona będzie przygotowana pod SEO?",
        "Uwzględniamy czytelną strukturę, podstawowe wymagania techniczne oraz możliwość rozwoju treści i analityki. Stałe pozycjonowanie to oddzielny zakres."
      ],
      [
        "Czy mogę samodzielnie zmieniać treści?",
        "Zakres edycji określamy na etapie projektu i pokazujemy sposób obsługi po wdrożeniu."
      ]
    ],
    "risk": "Nie obiecujemy określonej liczby klientów po samym uruchomieniu strony. Na zapytania wpływają również oferta, konkurencja i pozyskiwanie ruchu.",
    "related": [
      [
        "seo",
        "Pozycjonowanie stron",
        "Dalszy rozwój widoczności usług w Google"
      ],
      [
        "google-ads",
        "Kampanie Google Ads",
        "Dotarcie do klientów po uruchomieniu strony"
      ]
    ],
    "visual": [
      "OFERTA",
      "STRONA",
      "ZAPYTANIE"
    ],
    "cta": "Wyceńmy stronę"
  },
  "tworzenie-sklepow-internetowych": {
    "title": "Tworzenie sklepów internetowych | MrSeo.tech",
    "description": "Tworzenie sklepów internetowych z katalogiem, koszykiem, płatnościami, dostawą, SEO i integracjami. Dobieramy platformę i sprawdzamy proces zakupowy.",
    "kicker": "TWORZENIE SKLEPÓW INTERNETOWYCH",
    "hero": [
      "Chcesz sprzedawać online?",
      "Zaprojektujmy sklep pod Twoje produkty."
    ],
    "lead": "Tworzymy sklepy, w których klient łatwo znajduje produkt, poznaje warunki dostawy i przechodzi przez koszyk. Dobieramy platformę do katalogu i procesów firmy — bez niepotrzebnej rozbudowy technicznej.",
    "intro": "Sklep to katalog, płatność, dostawa i obsługa zamówień",
    "introText": "Wybór platformy ma sens dopiero po zrozumieniu asortymentu, metod płatności, logistyki oraz potrzebnych integracji.",
    "problems": [
      [
        "Pierwszy sklep dla marki",
        "Masz produkty i pomysł na sprzedaż, ale potrzebujesz wygodnego procesu zakupowego.",
        "Układamy kategorie, karty produktów, koszyk i wymagania obsługi."
      ],
      [
        "Obecny sklep utrudnia zakup",
        "Kupujący nie znajdują produktów albo rezygnują na etapie koszyka.",
        "Sprawdzamy nawigację, filtry, szybkość i proces zamówienia."
      ],
      [
        "Asortyment rośnie, obsługa pozostaje ręczna",
        "Ceny, stany i zamówienia wymagają coraz więcej pracy zespołu.",
        "Oceniamy potrzebne połączenia ze źródłami produktów i systemami firmy."
      ]
    ],
    "process": [
      [
        "Analiza sprzedaży i katalogu",
        "Ustalamy asortyment, rynki, metody płatności, dostawę i obowiązki zespołu."
      ],
      [
        "Dobór platformy i architektury",
        "Porównujemy dostępne rozwiązania, możliwości integracji i koszt utrzymania."
      ],
      [
        "Budowa i konfiguracja",
        "Wdrażamy katalog, koszyk, uzgodnione integracje i pomiar zakupów."
      ],
      [
        "Zamówienia testowe i uruchomienie",
        "Sprawdzamy płatności, dostawę, stany, wersję mobilną i ważne adresy URL."
      ]
    ],
    "outcomes": [
      [
        "Sklep gotowy do obsługi zamówień",
        "Przetestowana ścieżka od produktu do potwierdzenia zakupu."
      ],
      [
        "Katalog, który można rozwijać",
        "Czytelna struktura produktów i kategorie przygotowane do dalszej optymalizacji."
      ],
      [
        "Świadomy wybór technologii",
        "Platforma i integracje dopasowane do potrzeb, bez zbędnych funkcji."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Marka odzieżowa chce uruchomić własny kanał sprzedaży.",
      "Projektujemy warianty produktów, metody dostawy i płatności właściwe dla odbiorców.",
      "Weryfikujemy zakup próbny i aktualizację stanów magazynowych."
    ],
    "faq": [
      [
        "WooCommerce, Shopify czy inne rozwiązanie?",
        "Nie wybieramy platformy bez wymagań. Sprawdzamy liczbę produktów, sposób sprzedaży, integracje i koszty utrzymania."
      ],
      [
        "Czy można uwzględnić BLIK i dostawę do paczkomatów?",
        "Można zaplanować takie metody, ale konkretne wdrożenie zależy od wybranej platformy, operatorów i dostępnych integracji."
      ],
      [
        "Czy przeniesiecie istniejący sklep?",
        "Zakres migracji zależy od możliwości eksportu, danych produktów, kont klientów, historii oraz mapy adresów."
      ],
      [
        "Czy zajmujecie się pozycjonowaniem sklepu?",
        "Tak, plan SEO i kampanii produktowych można przygotować jako osobny etap po omówieniu katalogu."
      ]
    ],
    "risk": "Wdrożenie sklepu nie gwarantuje sprzedaży. O wyniku decydują również produkt, cena, obsługa klienta i pozyskiwanie ruchu.",
    "related": [
      [
        "ecommerce-seo",
        "SEO sklepów internetowych",
        "Widoczność kategorii i produktów w wyszukiwarce"
      ],
      [
        "google-shopping",
        "Google Shopping",
        "Reklama gotowego katalogu produktów"
      ]
    ],
    "visual": [
      "KATALOG",
      "KOSZYK",
      "ZAMÓWIENIE"
    ],
    "cta": "Porozmawiajmy o sklepie"
  },
  "audyt-google-ads": {
    "title": "Audyt Google Ads – sprawdź budżet i konwersje | MrSeo.tech",
    "description": "Audyt Google Ads dla firm i sklepów: pomiar konwersji, struktura kampanii, zapytania, Merchant Center i analiza kosztów. Priorytetowy plan poprawek.",
    "kicker": "AUDYT KAMPANII GOOGLE ADS",
    "hero": [
      "Reklama wydaje budżet.",
      "Wiesz, co naprawdę daje firmie?"
    ],
    "lead": "Sprawdzamy, czy kampanie docierają do właściwych odbiorców i czy ich wyniki można powiązać z realnymi zapytaniami lub zakupami. Nie zaczynamy od wymiany całej strategii bez analizy danych.",
    "intro": "Najpierw poprawność pomiaru, potem optymalizacja kampanii",
    "introText": "W raportach mogą dobrze wyglądać kliknięcia lub konwersje, które nie odpowiadają rzeczywistym celom firmy.",
    "problems": [
      [
        "Konwersje nie pasują do zamówień",
        "Zdarzenia mogą dublować się lub uruchamiać przed udaną transakcją.",
        "Sprawdzamy konfigurację celów, wartości i dostępne przykłady zdarzeń."
      ],
      [
        "Budżet trafia w nieodpowiednie zapytania",
        "Ruch może pochodzić od osób szukających innych produktów i usług.",
        "Analizujemy zapytania, strukturę kampanii i trafność stron."
      ],
      [
        "Nie wiadomo, co zmieniać",
        "Brakuje powiązania między wydatkami, jakością leadów a priorytetami firmy.",
        "Porządkujemy wyniki i proponujemy kolejność testów."
      ]
    ],
    "process": [
      [
        "Ustalenie celów reklamowych",
        "Definiujemy, jakie zapytania i zakupy mają realną wartość."
      ],
      [
        "Weryfikacja konwersji",
        "Sprawdzamy pomiar, importy, powtórzenia i jakość danych."
      ],
      [
        "Analiza kampanii i odbiorców",
        "Przeglądamy zapytania, segmenty, zasoby i przeznaczenie budżetu."
      ],
      [
        "Plan zmian i kryteria oceny",
        "Przekazujemy konkretne działania do testowania w uzgodnionej kolejności."
      ]
    ],
    "outcomes": [
      [
        "Mapa źródeł nieefektywnych wydatków",
        "Wskazanie niepotrzebnego ruchu lub błędnych założeń tam, gdzie potwierdzają to dane."
      ],
      [
        "Lista problemów z pomiarem",
        "Konkretne zdarzenia i parametry wymagające weryfikacji."
      ],
      [
        "Plan kontrolowanych testów",
        "Priorytety zmian oraz sposób oceny efektu bez pochopnych wniosków."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Google Ads pokazuje więcej zamówień niż sklep.",
      "Sprawdzamy identyfikatory transakcji, ustawienia celów i sposób importowania konwersji.",
      "Przeprowadzamy kontrolny zakup i porównujemy zapis zdarzenia."
    ],
    "faq": [
      [
        "Czy trzeba zmienić agencję prowadzącą kampanie?",
        "Nie. Audyt może być niezależną oceną obecnego konta i planem działań dla dotychczasowej osoby prowadzącej."
      ],
      [
        "Czy sprawdzacie kampanie sklepów i firm usługowych?",
        "Tak, ale ich cele i kryteria oceny są inne: zamówienie w sklepie to nie to samo co kwalifikowana rozmowa handlowa."
      ],
      [
        "Czy po audycie możecie prowadzić kampanie?",
        "Możemy uzgodnić dalsze wdrożenia lub obsługę jako odrębny etap."
      ],
      [
        "Czy gwarantujecie niższy koszt klienta?",
        "Nie. Audyt wskazuje problemy i możliwe testy, ale wynik zależy od rynku, oferty i danych."
      ]
    ],
    "risk": "Dostępność danych i ich jakość ograniczają pewność wniosków. Bez poprawnego pomiaru nie udajemy, że znamy rzeczywistą rentowność reklam.",
    "related": [
      [
        "google-ads",
        "Prowadzenie Google Ads",
        "Dalsze zarządzanie kampaniami"
      ],
      [
        "analytics",
        "Analityka i GA4",
        "Sprawdzenie zdarzeń oraz jakości pomiaru"
      ]
    ],
    "visual": [
      "WYDATKI",
      "KONWERSJE",
      "DECYZJA"
    ],
    "cta": "Sprawdźmy kampanie"
  },
  "problemy-merchant-center": {
    "title": "Zawieszone konto Merchant Center – diagnoza | MrSeo.tech",
    "description": "Zawieszone konto Merchant Center lub odrzucone produkty? Diagnoza komunikatów Google, błędów w sklepie, feedzie, cenach i dostępności. Bez gwarancji odblokowania.",
    "kicker": "GOOGLE MERCHANT CENTER",
    "hero": [
      "Merchant Center zawieszony?",
      "Sprawdźmy powód blokady."
    ],
    "lead": "Odrzucone produkty i ograniczenia konta potrafią zatrzymać kampanie produktowe. Analizujemy konkretne komunikaty, dane produktów oraz proces zakupowy. Naprawiamy potwierdzone problemy, zamiast szukać obejścia zasad Google.",
    "intro": "Nie każde odrzucenie oznacza ten sam problem",
    "introText": "Błąd w dostępności produktu wymaga innych działań niż naruszenie zasad dotyczących wiarygodności sprzedawcy.",
    "problems": [
      [
        "Konto zostało zawieszone",
        "Komunikat może wskazywać problem z wiarygodnością sklepu, informacjami handlowymi lub zgodnością z zasadami.",
        "Sprawdzamy treść powiadomienia, kontakt, dostawę, zwroty i realny proces zakupu."
      ],
      [
        "Setki produktów odrzucono",
        "Ceny, stany lub atrybuty mogą być niespójne między feedem i kartami.",
        "Porównujemy identyfikatory towarów, źródła danych, strony i checkout."
      ],
      [
        "Błędy wracają po aktualizacji",
        "Automatyczny import może nadpisywać ręcznie poprawione informacje.",
        "Sprawdzamy synchronizację katalogu, cykl aktualizacji i logi."
      ]
    ],
    "process": [
      [
        "Rozpoznanie naruszenia",
        "Spisujemy komunikaty Google, zakres ograniczeń i status zgłoszeń."
      ],
      [
        "Audyt sklepu i danych",
        "Porównujemy feed, produkty, koszyk, płatności i informacje dla kupującego."
      ],
      [
        "Plan korekt i wdrożenie",
        "Priorytetyzujemy wymagane poprawki z konkretnymi przykładami."
      ],
      [
        "Weryfikacja i ponowne zgłoszenie",
        "Testujemy scenariusze i przygotowujemy ponowną weryfikację, gdy jest dostępna."
      ]
    ],
    "outcomes": [
      [
        "Ustalone źródła rozbieżności",
        "Raport wskazujący problemy faktycznie widoczne w koncie lub sklepie."
      ],
      [
        "Plan zmian bez obchodzenia reguł",
        "Lista prac dla feedu, sklepu i konfiguracji."
      ],
      [
        "Kontrola przed kolejną oceną",
        "Możliwość sprawdzenia zakupów i danych po korektach."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Produkt jest dostępny w feedzie, ale nie da się go kupić w koszyku.",
      "Ustalamy źródło rozbieżności stanów i sprawdzamy ustawienia platformy.",
      "Testujemy zamówienie i zgodność informacji na każdym etapie."
    ],
    "faq": [
      [
        "Czy gwarantujecie odblokowanie konta?",
        "Nie. O wyniku decyduje Google. Możemy zdiagnozować przyczyny, poprawić problemy i przygotować ponowne zgłoszenie."
      ],
      [
        "Czy otwarcie nowego konta rozwiąże blokadę?",
        "Obchodzenie ograniczeń w taki sposób może naruszać zasady Google. Pracujemy nad przyczyną ograniczenia."
      ],
      [
        "Czy wspieracie WooCommerce i integracje produktowe?",
        "Analizujemy konkretne źródło danych i dostępne mechanizmy platformy. Przed pracami sprawdzamy zakres dostępu."
      ],
      [
        "Ile trwa rozpatrzenie weryfikacji?",
        "Termin zależy od typu naruszenia i procedur Google. Nie deklarujemy gwarantowanego czasu."
      ]
    ],
    "risk": "Nie mamy wpływu na decyzje Google, nie obiecujemy pozytywnego rozpatrzenia i nie proponujemy metod obchodzenia ograniczeń.",
    "related": [
      [
        "google-shopping",
        "Google Shopping",
        "Wznowienie i optymalizacja kampanii produktowych"
      ],
      [
        "tworzenie-sklepow-internetowych",
        "Tworzenie sklepów",
        "Poprawa procesu zakupu i danych katalogowych"
      ]
    ],
    "visual": [
      "KOMUNIKAT",
      "SKLEP + FEED",
      "WERYFIKACJA"
    ],
    "cta": "Przeanalizujmy blokadę"
  },
  "google-shopping": {
    "title": "Google Shopping – reklama produktowa sklepów | MrSeo.tech",
    "description": "Google Shopping: Merchant Center, feed produktowy, segmentacja produktów, poprawny pomiar zakupów i optymalizacja wydatków dla sklepu internetowego.",
    "kicker": "KAMPANIE PRODUKTOWE",
    "hero": [
      "Produkty są w Google.",
      "Czy reklama pozyskuje właściwe zamówienia?"
    ],
    "lead": "Kampanie produktowe zależą od jakości danych, oferty i pomiaru zakupów. Sprawdzamy feed, dostępność produktów oraz strukturę reklamy. Nie oceniamy wyników wyłącznie po liczbie kliknięć.",
    "intro": "Produkt, zapytanie, cena i rzeczywisty zakup muszą do siebie pasować",
    "introText": "Dobra reklama zaczyna się od spójnych informacji o towarze i zrozumiałej ekonomiki asortymentu.",
    "problems": [
      [
        "Część produktów nie wyświetla się",
        "Niekompletne informacje lub odrzucenia mogą ograniczać zasięg.",
        "Sprawdzamy diagnostykę Merchant Center i konkretne ID."
      ],
      [
        "Kliknięcia nie przekładają się na zakupy",
        "Ruch może trafiać na niedopasowany asortyment albo nieczytelną kartę produktu.",
        "Porównujemy zapytania, strony, ceny i przebieg zakupu."
      ],
      [
        "ROAS nie mówi całej prawdy",
        "Wysoka wartość przychodu reklamowego nie zawsze oznacza zysk przy niskiej marży.",
        "Uwzględniamy dostępne dane o kosztach i kategoriach produktów."
      ]
    ],
    "process": [
      [
        "Przegląd Merchant Center",
        "Status towarów, feed, ceny i spójność z kartami produktów."
      ],
      [
        "Kontrola zakupów i wartości",
        "Sprawdzamy zdarzenia purchase, wartości, walutę i powtórzenia."
      ],
      [
        "Struktura kampanii produktowych",
        "Dobieramy grupy produktów i cele do budżetu i ilości danych."
      ],
      [
        "Analiza i testy",
        "Oceniamy zamówienia, koszt reklamy i potrzebne korekty."
      ]
    ],
    "outcomes": [
      [
        "Priorytety dla danych produktowych",
        "Które błędy ograniczają reklamy i co poprawić najpierw."
      ],
      [
        "Zrozumiała segmentacja asortymentu",
        "Grupy produktów tworzone według potrzeb biznesu."
      ],
      [
        "Lepsza kontrola pomiaru sprzedaży",
        "Ocena wyników na podstawie możliwych do zweryfikowania zakupów."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Tanie akcesoria zbierają ruch, a ważne kategorie są niewidoczne.",
      "Analizujemy dane feedu, dostępność i podział produktów.",
      "Sprawdzamy raporty i zamówienia w uzgodnionym okresie."
    ],
    "faq": [
      [
        "Google Shopping czy Performance Max?",
        "Wybór zależy od konta, celów i dostępnych danych. Analizujemy, które rozwiązanie pasuje do sklepu."
      ],
      [
        "Czy można reklamować cały katalog?",
        "Produkty muszą spełniać zasady Google. Weryfikujemy też sens biznesowy promowania poszczególnych grup."
      ],
      [
        "Czy naprawiacie błędy w Merchant Center?",
        "Tak, po sprawdzeniu komunikatów i źródeł danych. Ostateczna akceptacja należy do Google."
      ],
      [
        "Czy potrzebne są integracje z platformą?",
        "W niektórych sklepach tak. Sprawdzamy możliwości eksportu i aktualizacji danych produktów."
      ]
    ],
    "risk": "Nie gwarantujemy konkretnego ROAS ani zatwierdzenia wszystkich towarów. Wynik zależy od oferty, konkurencji i jakości danych.",
    "related": [
      [
        "problemy-merchant-center",
        "Problemy Merchant Center",
        "Odrzucone produkty i ograniczenia konta"
      ],
      [
        "ecommerce-seo",
        "SEO sklepów",
        "Organiczna widoczność kategorii i produktów"
      ]
    ],
    "visual": [
      "PRODUKTY",
      "REKLAMA",
      "ZAKUP"
    ],
    "cta": "Sprawdźmy reklamę produktów"
  },
  "opieka-wordpress": {
    "title": "Opieka nad stroną WordPress – aktualizacje i wsparcie | MrSeo.tech",
    "description": "Opieka nad WordPress: aktualizacje, kopie zapasowe, diagnostyka błędów, bezpieczeństwo, szybkość i drobne zmiany. Zakres wsparcia ustalamy po przeglądzie strony.",
    "kicker": "OPIEKA NAD WORDPRESS",
    "hero": [
      "Strona WordPress wymaga opieki?",
      "Zadbajmy o jej stabilne działanie."
    ],
    "lead": "Aktualizacje, błędy formularzy, spadki wydajności i problemy po zmianie wtyczek nie powinny zaskakiwać firmy. Proponujemy wsparcie oparte na przeglądzie technicznym, kopiach i kontrolowanych zmianach.",
    "intro": "Strona firmowa potrzebuje kontroli, nie tylko jednorazowego uruchomienia",
    "introText": "Nie obiecujemy, że ryzyko awarii zniknie. Ustalamy, jak aktualizować i weryfikować zmiany, aby ograniczać przestoje.",
    "problems": [
      [
        "Po aktualizacji coś przestało działać",
        "Konflikt motywu lub wtyczki może zepsuć formularz albo widok strony.",
        "Sprawdzamy środowisko, logi, zgodność i możliwość odtworzenia."
      ],
      [
        "Strona jest wolna na telefonie",
        "Przyczyną może być wiele elementów: zasoby, obrazy, wtyczki lub hosting.",
        "Mierzymy wydajność i wskazujemy konkretne wąskie gardła."
      ],
      [
        "Nikt nie pilnuje kopii i dostępu",
        "Brak procedur utrudnia reakcję na błędy lub nieautoryzowane zmiany.",
        "Weryfikujemy kopie zapasowe, konta, uprawnienia i aktualizacje."
      ]
    ],
    "process": [
      [
        "Wstępny przegląd stanu",
        "Ocena WordPress, PHP, motywu, wtyczek, kopii i hostingu."
      ],
      [
        "Plan wsparcia",
        "Ustalenie aktualizacji, testowania zmian i reakcji na zgłoszenia."
      ],
      [
        "Kontrolowane aktualizacje",
        "Kopie, zmiany w uzgodnionych etapach i weryfikacja kluczowych funkcji."
      ],
      [
        "Raportowanie problemów",
        "Dokumentacja wykonanych prac i rekomendacje kolejnych działań."
      ]
    ],
    "outcomes": [
      [
        "Przejrzysty zakres opieki",
        "Wiadomo, co obejmuje wsparcie i jak zgłaszać błędy."
      ],
      [
        "Bezpieczniejszy proces zmian",
        "Kopie i testy ograniczają skutki nieudanych aktualizacji."
      ],
      [
        "Lista problemów wymagających osobnego projektu",
        "Rozdzielamy bieżące utrzymanie od rozbudowy i przebudowy serwisu."
      ]
    ],
    "example": [
      "PRZYKŁADOWA SYTUACJA",
      "Formularz kontaktowy przestał wysyłać wiadomości po aktualizacji.",
      "Sprawdzamy błąd, konfigurację wysyłki, zgodność wtyczek i kopię.",
      "Testujemy zgłoszenie oraz dostarczenie wiadomości na docelową skrzynkę."
    ],
    "faq": [
      [
        "Czy możecie przejąć opiekę nad istniejącą stroną?",
        "Najpierw oceniamy dostęp, stan instalacji i ryzyka. Zakres wsparcia ustalamy po przeglądzie."
      ],
      [
        "Czy zapewniacie całodobowe SLA?",
        "Nie deklarujemy dyżuru 24/7 bez osobnej umowy i ustalonych zasobów."
      ],
      [
        "Czy robicie kopie i aktualizacje?",
        "Takie działania można objąć uzgodnionym planem, po weryfikacji hostingu i dostępnych mechanizmów."
      ],
      [
        "Czy naprawiacie stronę po włamaniu?",
        "Możemy ocenić zakres problemu, dostępne kopie i możliwość przywrócenia. Nie obiecujemy odtworzenia danych, których nie ma w kopiach."
      ]
    ],
    "risk": "Żaden system utrzymania nie eliminuje całego ryzyka awarii i ataków. Odpowiedzialność, częstotliwość oraz czas reakcji określa umowa.",
    "related": [
      [
        "tworzenie-stron-internetowych",
        "Tworzenie stron",
        "Gdy serwis wymaga przebudowy lub nowej struktury"
      ],
      [
        "seo-audit",
        "Audyt techniczny SEO",
        "Gdy problemy techniczne wpływają na indeksowanie"
      ]
    ],
    "visual": [
      "DIAGNOZA",
      "AKTUALIZACJA",
      "TEST"
    ],
    "cta": "Omówmy opiekę WordPress"
  }
}
MRSEO_PL_SERVICES;
  $pages=array_merge(json_decode($json,true,512,JSON_THROW_ON_ERROR),mrseo_pl_next_service_data(),mrseo_pl_final_service_data());
 }
 return $pages;
}
function mrseo_pl_service_page($slug=null){
 $slug=$slug??mrseo_slug();
 return mrseo_pl_service_data()[$slug]??null;
}
function mrseo_pl_service_slugs(){return array_keys(mrseo_pl_service_data());}
function mrseo_pl_service_parent($slug,$lang='en'){
 if($slug==='tworzenie-stron-internetowych')return 'service-websites';
 if($slug==='tworzenie-sklepow-internetowych')return in_array($lang,array('uk','ru'),true)?'online-store-development':'ecommerce-seo';
 if($slug==='problemy-merchant-center')return in_array($lang,array('uk','ru'),true)?'merchant-center':'google-ads';
 if($slug==='google-shopping')return in_array($lang,array('uk','ru'),true)?'google-shopping':'google-ads';
 if($slug==='audyt-google-ads')return 'google-ads';
 return 'web-development';
}
