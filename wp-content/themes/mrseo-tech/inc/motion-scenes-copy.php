<?php
if(!defined('ABSPATH'))exit;
/* Animated editorial scene copy: these are visual examples, never actual client analytics. */
function mrseo_scene_copy($slug,$locale=null){
 static $translations=null;
 if($translations===null){
  $json=<<<'MRSEO_SCENES_DATA'
{
  "seo": {
    "uk": {
      "name": "Пошукова видимість",
      "intro": "Знаходимо сторінки, які мають приводити клієнтів.",
      "tabs": [
        "Попит",
        "Сторінки",
        "Індексація"
      ],
      "steps": [
        "Пошуковий запит",
        "Сторінка послуги",
        "Показ у Google"
      ]
    },
    "ru": {
      "name": "Поисковая видимость",
      "intro": "Находим страницы, которые должны приводить клиентов.",
      "tabs": [
        "Спрос",
        "Страницы",
        "Индексация"
      ],
      "steps": [
        "Поисковый запрос",
        "Страница услуги",
        "Показ в Google"
      ]
    },
    "en": {
      "name": "Search visibility",
      "intro": "Find the pages customers need to discover.",
      "tabs": [
        "Demand",
        "Landing pages",
        "Indexing"
      ],
      "steps": [
        "Search intent",
        "Service page",
        "Google visibility"
      ]
    },
    "pl": {
      "name": "Widoczność w wyszukiwarce",
      "intro": "Sprawdzamy, które strony powinny docierać do klientów.",
      "tabs": [
        "Popyt",
        "Podstrony",
        "Indeksacja"
      ],
      "steps": [
        "Zapytanie",
        "Strona usługi",
        "Widoczność Google"
      ]
    },
    "de": {
      "name": "Sichtbarkeit in Google",
      "intro": "Wir identifizieren die Seiten, die Kunden finden sollen.",
      "tabs": [
        "Suchintention",
        "Landingpages",
        "Indexierung"
      ],
      "steps": [
        "Suchanfrage",
        "Leistungsseite",
        "Google-Sichtbarkeit"
      ]
    }
  },
  "seo-audit": {
    "uk": {
      "name": "Технічний сканер",
      "intro": "Перевіряємо сигнали сайту на конкретних URL.",
      "tabs": [
        "Статуси",
        "Canonical",
        "Дублікати"
      ],
      "steps": [
        "URL для перевірки",
        "Потрібне виправлення",
        "Контроль змін"
      ]
    },
    "ru": {
      "name": "Технический сканер",
      "intro": "Проверяем сигналы сайта на конкретных URL.",
      "tabs": [
        "Статусы",
        "Canonical",
        "Дубли"
      ],
      "steps": [
        "URL для проверки",
        "Нужно исправить",
        "Проверка изменений"
      ]
    },
    "en": {
      "name": "Technical scanner",
      "intro": "Investigate actual URLs and the signals they send.",
      "tabs": [
        "Status codes",
        "Canonical",
        "Duplicates"
      ],
      "steps": [
        "URL inspected",
        "Needs attention",
        "Verify change"
      ]
    },
    "pl": {
      "name": "Skaner techniczny",
      "intro": "Weryfikujemy rzeczywiste adresy URL i sygnały indeksacji.",
      "tabs": [
        "Statusy",
        "Canonical",
        "Duplikaty"
      ],
      "steps": [
        "Badany adres URL",
        "Do poprawy",
        "Kontrola zmian"
      ]
    },
    "de": {
      "name": "Technischer Scanner",
      "intro": "Wir prüfen echte URLs und ihre Indexierungssignale.",
      "tabs": [
        "Statuscodes",
        "Canonical",
        "Duplikate"
      ],
      "steps": [
        "Geprüfte URL",
        "Handlungsbedarf",
        "Änderung prüfen"
      ]
    }
  },
  "ecommerce-seo": {
    "uk": {
      "name": "Архітектура магазину",
      "intro": "Категорії, фільтри й товари — кожен на своєму місці.",
      "tabs": [
        "Категорії",
        "Фільтри",
        "Товари"
      ],
      "steps": [
        "Каталог",
        "Корисна сторінка",
        "Без дублів"
      ]
    },
    "ru": {
      "name": "Архитектура магазина",
      "intro": "Категории, фильтры и товары — каждый на своём месте.",
      "tabs": [
        "Категории",
        "Фильтры",
        "Товары"
      ],
      "steps": [
        "Каталог",
        "Полезная страница",
        "Без дублей"
      ]
    },
    "en": {
      "name": "Shop architecture",
      "intro": "Categories, facets and products working together.",
      "tabs": [
        "Categories",
        "Filters",
        "Products"
      ],
      "steps": [
        "Catalog",
        "Useful landing page",
        "No duplicate"
      ]
    },
    "pl": {
      "name": "Struktura sklepu",
      "intro": "Kategorie, filtry i produkty we właściwej strukturze.",
      "tabs": [
        "Kategorie",
        "Filtry",
        "Produkty"
      ],
      "steps": [
        "Katalog",
        "Wartościowa strona",
        "Bez duplikatów"
      ]
    },
    "de": {
      "name": "Shoparchitektur",
      "intro": "Kategorien, Filter und Produkte sinnvoll verbinden.",
      "tabs": [
        "Kategorien",
        "Filter",
        "Produkte"
      ],
      "steps": [
        "Katalog",
        "Relevante Landingpage",
        "Ohne Duplikate"
      ]
    }
  },
  "google-ads": {
    "uk": {
      "name": "Керування рекламою",
      "intro": "Витрати, дані товарів і конверсії в одній логіці.",
      "tabs": [
        "Пошук",
        "Товари",
        "Конверсії"
      ],
      "steps": [
        "Попит",
        "Рекламна кампанія",
        "Виміряна заявка"
      ]
    },
    "ru": {
      "name": "Управление рекламой",
      "intro": "Расходы, товары и конверсии в одной системе.",
      "tabs": [
        "Поиск",
        "Товары",
        "Конверсии"
      ],
      "steps": [
        "Спрос",
        "Рекламная кампания",
        "Измеренная заявка"
      ]
    },
    "en": {
      "name": "Advertising control",
      "intro": "Connect campaigns, product data and conversion events.",
      "tabs": [
        "Search",
        "Shopping",
        "Conversions"
      ],
      "steps": [
        "Demand",
        "Campaign",
        "Measured lead"
      ]
    },
    "pl": {
      "name": "Kontrola reklam",
      "intro": "Łączymy kampanie, produkty i dane o konwersjach.",
      "tabs": [
        "Wyszukiwarka",
        "Produkty",
        "Konwersje"
      ],
      "steps": [
        "Popyt",
        "Kampania",
        "Zmierzona konwersja"
      ]
    },
    "de": {
      "name": "Werbung mit Überblick",
      "intro": "Kampagnen, Produktdaten und Conversions zusammendenken.",
      "tabs": [
        "Suche",
        "Shopping",
        "Conversions"
      ],
      "steps": [
        "Nachfrage",
        "Kampagne",
        "Messbare Anfrage"
      ]
    }
  },
  "analytics": {
    "uk": {
      "name": "Потік даних",
      "intro": "Від дії користувача — до перевіреного рішення.",
      "tabs": [
        "Події",
        "Перевірка",
        "Звіт"
      ],
      "steps": [
        "Клік",
        "Покупка",
        "Перевірені дані"
      ]
    },
    "ru": {
      "name": "Поток данных",
      "intro": "От действия пользователя — к проверенному решению.",
      "tabs": [
        "События",
        "Проверка",
        "Отчёт"
      ],
      "steps": [
        "Клик",
        "Покупка",
        "Проверенные данные"
      ]
    },
    "en": {
      "name": "Data in motion",
      "intro": "From a customer action to a reliable decision.",
      "tabs": [
        "Events",
        "Validation",
        "Reporting"
      ],
      "steps": [
        "Click",
        "Purchase",
        "Verified data"
      ]
    },
    "pl": {
      "name": "Przepływ danych",
      "intro": "Od działania użytkownika do sprawdzonej decyzji.",
      "tabs": [
        "Zdarzenia",
        "Weryfikacja",
        "Raport"
      ],
      "steps": [
        "Kliknięcie",
        "Zakup",
        "Zweryfikowane dane"
      ]
    },
    "de": {
      "name": "Datenfluss",
      "intro": "Von Nutzeraktionen zu verlässlichen Entscheidungen.",
      "tabs": [
        "Ereignisse",
        "Prüfung",
        "Reporting"
      ],
      "steps": [
        "Klick",
        "Kauf",
        "Geprüfte Daten"
      ]
    }
  },
  "web-development": {
    "uk": {
      "name": "Системи працюють разом",
      "intro": "SaaS, CRM та API у зв'язаній архітектурі.",
      "tabs": [
        "SaaS",
        "CRM",
        "API"
      ],
      "steps": [
        "Кабінет",
        "Інтеграція",
        "Автоматизація"
      ]
    },
    "ru": {
      "name": "Системы работают вместе",
      "intro": "SaaS, CRM и API в связанной архитектуре.",
      "tabs": [
        "SaaS",
        "CRM",
        "API"
      ],
      "steps": [
        "Кабинет",
        "Интеграция",
        "Автоматизация"
      ]
    },
    "en": {
      "name": "Systems connected",
      "intro": "SaaS, CRM and APIs in a reliable workflow.",
      "tabs": [
        "SaaS",
        "CRM",
        "API"
      ],
      "steps": [
        "Portal",
        "Integration",
        "Automation"
      ]
    },
    "pl": {
      "name": "Systemy połączone",
      "intro": "SaaS, CRM i integracje API w jednym procesie.",
      "tabs": [
        "SaaS",
        "CRM",
        "API"
      ],
      "steps": [
        "Panel klienta",
        "Integracja",
        "Automatyzacja"
      ]
    },
    "de": {
      "name": "Systeme verbinden",
      "intro": "SaaS, CRM und APIs für echte Geschäftsabläufe.",
      "tabs": [
        "SaaS",
        "CRM",
        "API"
      ],
      "steps": [
        "Kundenportal",
        "Schnittstelle",
        "Automatisierung"
      ]
    }
  },
  "service-websites": {
    "uk": {
      "name": "Від макета до сайту",
      "intro": "Структура, дизайн, адаптивність і зручна заявка.",
      "tabs": [
        "Структура",
        "Дизайн",
        "Запуск"
      ],
      "steps": [
        "Блок сторінки",
        "Адаптивний екран",
        "Форма заявки"
      ]
    },
    "ru": {
      "name": "От макета к сайту",
      "intro": "Структура, дизайн, адаптивность и понятная заявка.",
      "tabs": [
        "Структура",
        "Дизайн",
        "Запуск"
      ],
      "steps": [
        "Блок страницы",
        "Адаптивный экран",
        "Форма заявки"
      ]
    },
    "en": {
      "name": "From layout to website",
      "intro": "Structure, interface, mobile design and enquiries.",
      "tabs": [
        "Wireframe",
        "Design",
        "Launch"
      ],
      "steps": [
        "Page section",
        "Responsive view",
        "Enquiry form"
      ]
    },
    "pl": {
      "name": "Od makiety do strony",
      "intro": "Struktura, projekt i wygodne formularze kontaktu.",
      "tabs": [
        "Makieta",
        "Projekt",
        "Start"
      ],
      "steps": [
        "Sekcja strony",
        "Widok mobilny",
        "Formularz"
      ]
    },
    "de": {
      "name": "Von der Skizze zur Website",
      "intro": "Struktur, Design und eine klare Kontaktstrecke.",
      "tabs": [
        "Konzept",
        "Design",
        "Launch"
      ],
      "steps": [
        "Seitenbereich",
        "Mobile Ansicht",
        "Anfrageformular"
      ]
    }
  },
  "performance-max": {
    "uk": {
      "name": "Товарна реклама",
      "intro": "Фід, сигнали й кампанії без випадкових рішень.",
      "tabs": [
        "Фід",
        "Групи",
        "Результат"
      ],
      "steps": [
        "Каталог товарів",
        "Сегмент",
        "Вимірювання"
      ]
    },
    "ru": {
      "name": "Товарная реклама",
      "intro": "Фид, сигналы и кампании без случайных решений.",
      "tabs": [
        "Фид",
        "Группы",
        "Результат"
      ],
      "steps": [
        "Каталог товаров",
        "Сегмент",
        "Измерение"
      ]
    },
    "en": {
      "name": "Product campaign logic",
      "intro": "Feeds, segments and reliable purchase signals.",
      "tabs": [
        "Feed",
        "Segments",
        "Outcomes"
      ],
      "steps": [
        "Product catalog",
        "Asset group",
        "Measurement"
      ]
    },
    "pl": {
      "name": "Reklamy produktów",
      "intro": "Feed produktowy, segmenty i wiarygodny pomiar.",
      "tabs": [
        "Feed",
        "Segmenty",
        "Wyniki"
      ],
      "steps": [
        "Katalog",
        "Grupa produktów",
        "Pomiar"
      ]
    },
    "de": {
      "name": "Produktkampagnen",
      "intro": "Datenfeeds, Segmente und verlässliche Kaufsignale.",
      "tabs": [
        "Feed",
        "Segmente",
        "Messung"
      ],
      "steps": [
        "Produktkatalog",
        "Anzeigengruppe",
        "Tracking"
      ]
    }
  },
  "about": {
    "uk": {
      "name": "Команда й підхід",
      "intro": "Невелика команда, десять років досвіду, чіткі пріоритети.",
      "tabs": [
        "Діагностика",
        "Експертиза",
        "Рішення"
      ],
      "steps": [
        "Знайти причину",
        "Впровадити",
        "Перевірити"
      ]
    },
    "ru": {
      "name": "Команда и подход",
      "intro": "Небольшая команда, десять лет опыта, чёткие приоритеты.",
      "tabs": [
        "Диагностика",
        "Экспертиза",
        "Решения"
      ],
      "steps": [
        "Найти причину",
        "Внедрить",
        "Проверить"
      ]
    },
    "en": {
      "name": "Team & approach",
      "intro": "A small experienced team with clear priorities.",
      "tabs": [
        "Diagnosis",
        "Expertise",
        "Delivery"
      ],
      "steps": [
        "Find the cause",
        "Implement",
        "Verify"
      ]
    },
    "pl": {
      "name": "Zespół i podejście",
      "intro": "Niewielki zespół z 10-letnim doświadczeniem.",
      "tabs": [
        "Diagnoza",
        "Ekspertyza",
        "Wdrożenie"
      ],
      "steps": [
        "Znajdź przyczynę",
        "Wprowadź zmiany",
        "Sprawdź efekt"
      ]
    },
    "de": {
      "name": "Team & Arbeitsweise",
      "intro": "Ein kleines Team mit zehn Jahren Erfahrung.",
      "tabs": [
        "Diagnose",
        "Expertise",
        "Umsetzung"
      ],
      "steps": [
        "Ursache finden",
        "Umsetzen",
        "Prüfen"
      ]
    }
  },
  "portfolio": {
    "uk": {
      "name": "Проєкти в роботі",
      "intro": "Реальні сайти, різні завдання й практичний досвід.",
      "tabs": [
        "Магазини",
        "Послуги",
        "Рішення"
      ],
      "steps": [
        "Різні ніші",
        "Реальні сайти",
        "Робота команди"
      ]
    },
    "ru": {
      "name": "Проекты в работе",
      "intro": "Реальные сайты, разные задачи и практический опыт.",
      "tabs": [
        "Магазины",
        "Услуги",
        "Решения"
      ],
      "steps": [
        "Разные ниши",
        "Реальные сайты",
        "Работа команды"
      ]
    },
    "en": {
      "name": "Work in practice",
      "intro": "Real websites across different business challenges.",
      "tabs": [
        "Commerce",
        "Services",
        "Projects"
      ],
      "steps": [
        "Different sectors",
        "Real websites",
        "Team experience"
      ]
    },
    "pl": {
      "name": "Projekty w praktyce",
      "intro": "Prawdziwe serwisy i różne wyzwania biznesowe.",
      "tabs": [
        "E-commerce",
        "Usługi",
        "Realizacje"
      ],
      "steps": [
        "Różne branże",
        "Prawdziwe strony",
        "Doświadczenie"
      ]
    },
    "de": {
      "name": "Projekte aus der Praxis",
      "intro": "Reale Websites und unterschiedliche Aufgaben.",
      "tabs": [
        "E-Commerce",
        "Services",
        "Projekte"
      ],
      "steps": [
        "Verschiedene Branchen",
        "Reale Websites",
        "Erfahrung"
      ]
    }
  },
  "contact": {
    "uk": {
      "name": "Почнемо з проблеми",
      "intro": "Розкажіть про сайт — знайдемо наступний крок.",
      "tabs": [
        "Запит",
        "Діагностика",
        "План"
      ],
      "steps": [
        "Сайт і мета",
        "Причина",
        "Наступний крок"
      ]
    },
    "ru": {
      "name": "Начнём с проблемы",
      "intro": "Расскажите о сайте — найдём следующий шаг.",
      "tabs": [
        "Запрос",
        "Диагностика",
        "План"
      ],
      "steps": [
        "Сайт и цель",
        "Причина",
        "Следующий шаг"
      ]
    },
    "en": {
      "name": "Start with your challenge",
      "intro": "Share your site; define the next practical step.",
      "tabs": [
        "Brief",
        "Diagnosis",
        "Plan"
      ],
      "steps": [
        "Site and goal",
        "Root cause",
        "Next step"
      ]
    },
    "pl": {
      "name": "Zacznijmy od problemu",
      "intro": "Opisz stronę — wspólnie ustalimy kolejny krok.",
      "tabs": [
        "Zgłoszenie",
        "Diagnoza",
        "Plan"
      ],
      "steps": [
        "Strona i cel",
        "Przyczyna",
        "Dalszy krok"
      ]
    },
    "de": {
      "name": "Beginnen wir mit Ihrem Problem",
      "intro": "Zeigen Sie Ihre Website — wir klären den nächsten Schritt.",
      "tabs": [
        "Anfrage",
        "Diagnose",
        "Plan"
      ],
      "steps": [
        "Website und Ziel",
        "Ursache",
        "Nächster Schritt"
      ]
    }
  }
}
MRSEO_SCENES_DATA;
  $translations=json_decode($json,true);
 }
 $locale=$locale?:mrseo_locale();
 return $translations[$slug][$locale]??$translations[$slug]['en']??null;
}
