<?php
if(!defined('ABSPATH'))exit;
/* Independent, market-specific Web Development content. Shared visual system; no copied SEO landing paragraphs. */
function mrseo_dev_content(){
 static $data=null;
 if($data!==null)return $data;
 $json=<<<'MRSEO_DEV_DATA'
{
  "uk": {
    "title": "Веброзробка, SaaS, CRM та інтеграції для бізнесу | MrSeo.tech",
    "description": "Веброзробка під бізнес-завдання: SaaS, CRM, кабінети клієнтів, API-інтеграції, автоматизація, модернізація сайтів і магазинів. Діагностика та план реалізації.",
    "eyebrow": "РОЗРОБКА · ІНТЕГРАЦІЇ · АВТОМАТИЗАЦІЯ",
    "headline": "Ваша задача складніша<br><em>за звичайний сайт?</em>",
    "lead": "Коли готових сервісів недостатньо, розробляємо вебзастосунки, кабінети, CRM та інтеграції. Спочатку розбираємо бізнес-процес і перевіряємо, чи справді потрібна індивідуальна розробка.",
    "problems": [
      [
        "Дані живуть у різних системах",
        "Менеджери вручну переносять заявки, замовлення й статуси між кабінетами."
      ],
      [
        "Готова CRM не враховує ваш процес",
        "Команді доводиться працювати в таблицях і робити обхідні операції."
      ],
      [
        "Сайт не витримує нових завдань",
        "Потрібні особисті кабінети, ролі, інтеграції або поступова модернізація."
      ]
    ],
    "solutions": [
      [
        "Єдина логіка обміну даними",
        "Проєктуємо API-зв'язки, синхронізацію та контроль помилок між системами."
      ],
      [
        "Зручний робочий інструмент",
        "Створюємо CRM, внутрішній портал або вебзастосунок навколо реального процесу."
      ],
      [
        "Поетапне розширення",
        "Оцінюємо наявний код і розробляємо модулі без невиправданої перебудови всього продукту."
      ]
    ],
    "outcomes": [
      "Зрозуміла схема архітектури та етапи реалізації",
      "Пріоритети, критерії приймання й контрольні точки",
      "Документовані інтеграції та план підтримки"
    ],
    "verification": [
      [
        "Технічні обмеження",
        "Перевіряємо API, документацію, доступи й можливості існуючих систем."
      ],
      [
        "Безпека й ролі",
        "Описуємо доступ, обробку даних, аудит дій і резервне відновлення."
      ],
      [
        "Надійність інтеграцій",
        "Передбачаємо повторні запити, валідацію, журнали та сповіщення про помилки."
      ],
      [
        "Подальший розвиток",
        "Оцінюємо тестування, розгортання, моніторинг і передавання документації."
      ]
    ],
    "capabilities": [
      [
        "Сайти та магазини",
        "Корпоративні сайти, каталоги, магазини й складні користувацькі сценарії."
      ],
      [
        "SaaS та вебзастосунки",
        "Продукти з особистими кабінетами, ролями, підписками та бізнес-логікою."
      ],
      [
        "CRM і внутрішні кабінети",
        "Керування заявками, замовленнями, завданнями й робочими процесами."
      ],
      [
        "API та інтеграції",
        "Зв'язок із CRM, ERP, платежами, складом, аналітикою й зовнішніми сервісами."
      ],
      [
        "Автоматизація",
        "Заміна повторюваних ручних операцій на перевірювані сценарії."
      ],
      [
        "Модернізація й підтримка",
        "Розвиток чинних сайтів і систем, виправлення проблем і оптимізація швидкодії."
      ]
    ],
    "workflow": [
      [
        "Діагностика",
        "Розбираємо процес, обмеження та визначаємо, де готове рішення краще за код."
      ],
      [
        "Проєктування",
        "Узгоджуємо користувачів, дані, інтеграції, ризики та мінімальний обсяг першої версії."
      ],
      [
        "Розробка й тестування",
        "Рухаємося етапами, перевіряємо ключові сценарії та зворотну сумісність."
      ],
      [
        "Запуск і підтримка",
        "Налаштовуємо розгортання, документацію, спостереження за помилками та план розвитку."
      ]
    ],
    "faq": [
      [
        "Чи потрібно створювати систему з нуля?",
        "Не обов'язково. Спочатку дивимося, чи можна налаштувати наявну платформу або побудувати невелику інтеграцію."
      ],
      [
        "Чи можете підключитися до існуючого проєкту?",
        "Так, після технічного огляду репозиторію, архітектури, доступів і ризиків."
      ],
      [
        "Як визначається вартість?",
        "Після короткої діагностики погоджуємо вимоги, етапи, залежності та формат оцінки. Без деталей називати фіксовану ціну некоректно."
      ]
    ],
    "labels": {
      "scope": "ЩО МОЖЕМО СТВОРИТИ",
      "scopeTitle": "Розробка для бізнес-процесу, а не заради коду.",
      "process": "ЯК ПРАЦЮЄМО",
      "processTitle": "Від проблеми до працюючого рішення",
      "results": "Що отримає бізнес",
      "check": "ЩО ПЕРЕВІРЯЄМО",
      "checkTitle": "Ризики до початку реалізації",
      "faq": "Питання перед стартом",
      "cta": "Обговорити розробку",
      "contactNote": "Опишіть процес, який потрібно покращити, або покажіть чинний продукт.",
      "problem": "ЯКУ ПРОБЛЕМУ ВИРІШУЄМО",
      "problemTitle": "Де бізнес втрачає час і контроль?",
      "solution": "НАШЕ РІШЕННЯ",
      "planet": "РОЗРОБКА ТА ІНТЕГРАЦІЇ",
      "foot": [
        "АНАЛІЗ",
        "РОЗРОБКА",
        "РОЗВИТОК"
      ]
    }
  },
  "ru": {
    "title": "Веб-разработка, SaaS, CRM и интеграции для бизнеса | MrSeo.tech",
    "description": "Разработка веб-приложений, SaaS, CRM, клиентских кабинетов, API-интеграций и автоматизации. Модернизация сайтов и магазинов под задачи бизнеса.",
    "eyebrow": "РАЗРАБОТКА · ИНТЕГРАЦИИ · АВТОМАТИЗАЦИЯ",
    "headline": "Ваша задача сложнее<br><em>обычного сайта?</em>",
    "lead": "Когда готовых сервисов недостаточно, разрабатываем веб-приложения, личные кабинеты, CRM и интеграции. Сначала изучаем процесс и проверяем, нужна ли вообще индивидуальная разработка.",
    "problems": [
      [
        "Данные разбросаны по сервисам",
        "Сотрудники вручную переносят заявки, заказы и статусы между системами."
      ],
      [
        "Готовая CRM не подходит",
        "Команда вынуждена вести таблицы и придумывать обходные процессы."
      ],
      [
        "Сайту нужна новая функциональность",
        "Требуются кабинеты, роли, интеграции и безопасная модернизация существующей системы."
      ]
    ],
    "solutions": [
      [
        "Объединяем данные",
        "Проектируем API-интеграции, синхронизацию и обработку ошибок."
      ],
      [
        "Строим рабочий инструмент",
        "Создаём CRM, внутренние порталы или веб-приложения под реальные роли и задачи."
      ],
      [
        "Развиваем поэтапно",
        "Изучаем текущий код и внедряем изменения без необоснованной полной переделки."
      ]
    ],
    "outcomes": [
      "Архитектура и понятная последовательность работ",
      "Приоритеты и критерии приёмки этапов",
      "Документация интеграций и план поддержки"
    ],
    "verification": [
      [
        "Ограничения систем",
        "Проверяем API, документацию, доступы и реальные технические возможности."
      ],
      [
        "Доступы и безопасность",
        "Определяем роли, права, хранение данных и восстановление."
      ],
      [
        "Устойчивость интеграций",
        "Предусматриваем повторные попытки, валидацию, журналы и уведомления об ошибках."
      ],
      [
        "Сопровождение",
        "Согласуем тесты, релизы, мониторинг и передачу документации."
      ]
    ],
    "capabilities": [
      [
        "Сайты и магазины",
        "Корпоративные сайты, каталоги, интернет-магазины и сложные пользовательские сценарии."
      ],
      [
        "SaaS и веб-приложения",
        "Кабинеты пользователей, роли, подписки и собственная бизнес-логика."
      ],
      [
        "CRM и внутренние кабинеты",
        "Управление лидами, заказами, задачами и рабочими процессами."
      ],
      [
        "API и интеграции",
        "Связь с CRM, ERP, оплатами, складом, аналитикой и внешними сервисами."
      ],
      [
        "Автоматизация",
        "Замена повторяющихся ручных действий контролируемыми процессами."
      ],
      [
        "Модернизация и поддержка",
        "Развитие существующих сайтов и систем, исправление ошибок и оптимизация скорости."
      ]
    ],
    "workflow": [
      [
        "Диагностика",
        "Изучаем текущий процесс и выясняем, где достаточно готового решения."
      ],
      [
        "Архитектура",
        "Согласуем сценарии, данные, интеграции, риски и первую полезную версию."
      ],
      [
        "Разработка и проверки",
        "Внедряем по этапам, тестируем сценарии и совместимость."
      ],
      [
        "Запуск и развитие",
        "Готовим развёртывание, документацию и дальнейшую поддержку."
      ]
    ],
    "faq": [
      [
        "Всегда ли нужна разработка с нуля?",
        "Нет. Иногда достаточно правильно настроить готовую платформу и добавить интеграцию."
      ],
      [
        "Можно доработать существующий сервис?",
        "Да, после оценки архитектуры, репозитория, доступов и рисков."
      ],
      [
        "Как рассчитывается стоимость?",
        "По задачам, интеграциям и этапам. Сначала определяем объём и ограничения, затем согласуем подход к оценке."
      ]
    ],
    "labels": {
      "scope": "ЧТО МОЖЕМ РАЗРАБОТАТЬ",
      "scopeTitle": "Разработка под процесс, а не ради кода.",
      "process": "НАШ ПОДХОД",
      "processTitle": "От задачи до работающего решения",
      "results": "Что получает бизнес",
      "check": "ТЕХНИЧЕСКАЯ ПРОВЕРКА",
      "checkTitle": "Риски, которые учитываем заранее",
      "faq": "Перед началом работы",
      "cta": "Обсудить разработку",
      "contactNote": "Расскажите, какой процесс нужно улучшить, или покажите существующий продукт.",
      "problem": "КАКУЮ ПРОБЛЕМУ РЕШАЕМ",
      "problemTitle": "Где бизнес теряет время и контроль?",
      "solution": "НАШЕ РЕШЕНИЕ",
      "planet": "РАЗРАБОТКА И ИНТЕГРАЦИИ",
      "foot": [
        "АНАЛИЗ",
        "РАЗРАБОТКА",
        "РАЗВИТИЕ"
      ]
    }
  },
  "en": {
    "title": "Bespoke Web Applications, CRM & API Integrations UK | MrSeo.tech",
    "description": "Bespoke web application development for UK businesses: client portals, CRM workflows, API integrations, SaaS platforms and dependable automation.",
    "eyebrow": "BESPOKE SOFTWARE · BUSINESS AUTOMATION",
    "headline": "Off-the-shelf tools don't fit?<br><em>Build a solution around your team.</em>",
    "lead": "When spreadsheets and disconnected systems slow down your team, we help assess whether an integration, a client portal or a bespoke web application is the sensible next step. We don't recommend building software from scratch unless there is a business case.",
    "problems": [
      [
        "Manual data entry wastes time",
        "Orders, enquiries and status updates are copied between disconnected systems."
      ],
      [
        "Your CRM doesn't reflect how people work",
        "Teams rely on spreadsheets, duplicate records and awkward workarounds."
      ],
      [
        "A platform needs to grow safely",
        "New roles, permissions and integrations are needed without disrupting existing users."
      ]
    ],
    "solutions": [
      [
        "Connect existing systems",
        "Plan APIs, data checks, retry handling and auditability."
      ],
      [
        "Build for real workflows",
        "Design a client portal or internal application around actual users."
      ],
      [
        "Modernise in measured stages",
        "Keep critical services running while adding verified improvements."
      ]
    ],
    "outcomes": [
      "Documented architecture and implementation roadmap",
      "Prioritized milestones with acceptance criteria",
      "Integration documentation and maintenance plan"
    ],
    "verification": [
      [
        "Existing platform constraints",
        "Review APIs, documentation, data access and technical limitations."
      ],
      [
        "Security and permissions",
        "Define access roles, data handling, audit trails and recovery."
      ],
      [
        "Integration reliability",
        "Plan retries, validation, logs and failure alerts."
      ],
      [
        "Long-term maintainability",
        "Consider tests, deployments, monitoring and documentation."
      ]
    ],
    "capabilities": [
      [
        "Websites and e-commerce",
        "Company websites, catalogs, online stores and advanced customer journeys."
      ],
      [
        "SaaS and web applications",
        "User accounts, permissions, subscriptions and bespoke business logic."
      ],
      [
        "CRM and client portals",
        "Lead, order, task and workflow management for teams and customers."
      ],
      [
        "API integrations",
        "Connect CRM, ERP, payment, fulfillment, analytics and third-party tools."
      ],
      [
        "Workflow automation",
        "Replace repetitive manual steps with observable processes."
      ],
      [
        "Modernization and support",
        "Extend existing platforms, resolve bottlenecks and improve performance."
      ]
    ],
    "workflow": [
      [
        "Discovery",
        "Understand goals and decide where standard tools can solve the problem faster."
      ],
      [
        "Architecture",
        "Define users, data flows, APIs, risks and the smallest useful release."
      ],
      [
        "Delivery and QA",
        "Build in stages, test critical workflows and safeguard existing functionality."
      ],
      [
        "Launch and improvement",
        "Plan deployment, documentation, monitoring and ongoing improvements."
      ]
    ],
    "faq": [
      [
        "Do we need to build from scratch?",
        "Not necessarily. We assess whether configuring an existing platform or adding an integration would be better."
      ],
      [
        "Can you work with an existing codebase?",
        "Yes, after reviewing the architecture, repository, access and associated risks."
      ],
      [
        "How much does bespoke development cost?",
        "We price the agreed scope and delivery stages after reviewing requirements, technical constraints and access. We don't advertise an invented fixed fee."
      ]
    ],
    "labels": {
      "scope": "WHAT WE BUILD",
      "scopeTitle": "Engineering for business problems.",
      "process": "HOW WE WORK",
      "processTitle": "From the bottleneck to a working solution",
      "results": "What you receive",
      "check": "TECHNICAL DUE DILIGENCE",
      "checkTitle": "Risks we examine before building",
      "faq": "Questions before starting",
      "cta": "Discuss development",
      "contactNote": "Describe a process that needs fixing or share your current product.",
      "problem": "BUSINESS BOTTLENECKS",
      "problemTitle": "Where do teams lose time and control?",
      "solution": "OUR APPROACH",
      "planet": "DEVELOPMENT AND INTEGRATIONS",
      "foot": [
        "DISCOVER",
        "BUILD",
        "IMPROVE"
      ]
    }
  },
  "pl": {
    "title": "Tworzenie aplikacji webowych, SaaS, CRM i integracji | MrSeo.tech",
    "description": "Dedykowane aplikacje webowe, SaaS, CRM, portale klienta, integracje API i automatyzacja procesów. Projektowanie, wdrożenie i rozwój istniejących systemów.",
    "eyebrow": "APLIKACJE WEBOWE · CRM · INTEGRACJE API",
    "headline": "Gotowe narzędzia nie wystarczają?<br><em>Zbudujmy rozwiązanie.</em>",
    "lead": "Gdy zespół ręcznie przepisuje zamówienia, dane rozjeżdżają się między systemami albo gotowe CRM nie pasuje do procesu, szukamy przyczyny. Tworzymy aplikacje, integracje i automatyzacje tylko tam, gdzie to uzasadnione.",
    "problems": [
      [
        "Zamówienia trafiają do kilku systemów",
        "Sprzedaż, magazyn i obsługa klienta wymagają ręcznego przepisywania tych samych danych."
      ],
      [
        "CRM wymusza obejścia",
        "Zespół prowadzi dodatkowe arkusze, ponieważ system nie odwzorowuje etapów pracy."
      ],
      [
        "Obecna platforma ogranicza rozwój",
        "Potrzebny portal B2B, nowe role użytkowników albo funkcje bez ryzykownego przepisywania całości."
      ]
    ],
    "solutions": [
      [
        "Integrujemy dane i zdarzenia",
        "Projektujemy API, mapowanie danych, synchronizację i obsługę awarii."
      ],
      [
        "Projektujemy narzędzie pod zespół",
        "Budujemy aplikację, CRM lub panel z rolami, statusami i historią zmian."
      ],
      [
        "Rozwijamy stopniowo",
        "Ocenimy istniejącą architekturę i wdrożymy najważniejsze moduły etapami."
      ]
    ],
    "outcomes": [
      "Mapa procesów, integracji i wymagań",
      "Przejrzyste etapy i kryteria odbioru",
      "Dokumentacja, testy oraz plan dalszego rozwoju"
    ],
    "verification": [
      [
        "Możliwości istniejących systemów",
        "Sprawdzamy API, dokumentację, uprawnienia i ograniczenia integracji."
      ],
      [
        "Bezpieczeństwo dostępu",
        "Analizujemy role, uprawnienia, dane użytkowników i kopie zapasowe."
      ],
      [
        "Niezawodność synchronizacji",
        "Projektujemy walidację danych, ponowienia prób i rejestrowanie błędów."
      ],
      [
        "Utrzymanie po wdrożeniu",
        "Ustalamy sposób testowania, publikacji zmian i monitorowania aplikacji."
      ]
    ],
    "capabilities": [
      [
        "Strony i sklepy internetowe",
        "Witryny firmowe, katalogi, sklepy i scenariusze zakupowe z integracjami."
      ],
      [
        "Aplikacje webowe i SaaS",
        "Konta klientów, uprawnienia, subskrypcje i własne procesy biznesowe."
      ],
      [
        "CRM i portale klienta",
        "Zarządzanie kontaktami, zamówieniami, zadaniami i przepływem pracy."
      ],
      [
        "Integracje API",
        "Połączenia CRM, ERP, płatności, magazynów, analityki i usług zewnętrznych."
      ],
      [
        "Automatyzacja procesów",
        "Mniej ręcznego przepisywania i bardziej przewidywalny obieg danych."
      ],
      [
        "Modernizacja i wsparcie",
        "Rozbudowa istniejących systemów, poprawki wydajności i utrzymanie."
      ]
    ],
    "workflow": [
      [
        "Analiza procesu",
        "Ustalamy problem, użytkowników i sprawdzamy, czy gotowe narzędzia wystarczą."
      ],
      [
        "Zakres i architektura",
        "Opisujemy dane, role, integracje, ryzyka i minimalną wersję rozwiązania."
      ],
      [
        "Wdrożenie etapami",
        "Budujemy i testujemy najważniejsze scenariusze, pokazując postęp."
      ],
      [
        "Uruchomienie i rozwój",
        "Ustalamy odbiór, dokumentację, monitoring i następne usprawnienia."
      ]
    ],
    "faq": [
      [
        "Czy tworzycie aplikacje od zera?",
        "Tak, ale najpierw oceniamy, czy obecny system można usprawnić mniejszym kosztem i ryzykiem."
      ],
      [
        "Czy integrujecie istniejący ERP i CRM?",
        "Możliwość zależy od dostępnego API, uprawnień i jakości danych. Sprawdzamy to przed określeniem zakresu."
      ],
      [
        "Jak wygląda wycena?",
        "Po omówieniu wymagań przygotowujemy zakres, podział na etapy i założenia do wyceny. Nie obiecujemy stałej kwoty bez analizy."
      ]
    ],
    "labels": {
      "scope": "OBSZARY ROZWOJU",
      "scopeTitle": "Od strony internetowej do systemu, który usprawnia pracę.",
      "process": "JAK PRACUJEMY",
      "processTitle": "Najpierw proces. Potem technologia.",
      "results": "Co otrzymujesz",
      "check": "SPRAWDZAMY PRZED STARTEM",
      "checkTitle": "Realne ograniczenia i bezpieczeństwo",
      "faq": "Najczęstsze pytania",
      "cta": "Omów projekt programistyczny",
      "contactNote": "Opisz proces, który chcesz usprawnić, lub udostępnij adres obecnego systemu.",
      "problem": "PROBLEMY W PROCESACH",
      "problemTitle": "Gdzie firma traci czas i kontrolę?",
      "solution": "NASZE ROZWIĄZANIE",
      "planet": "APLIKACJE I INTEGRACJE",
      "foot": [
        "ANALIZA",
        "WDROŻENIE",
        "ROZWÓJ"
      ]
    }
  },
  "de": {
    "title": "Webentwicklung, SaaS, CRM & API-Schnittstellen | MrSeo.tech",
    "description": "Individuelle Webentwicklung für Unternehmen: SaaS, Kundenportale, CRM, API-Schnittstellen, Prozessautomatisierung, Onlineshops und Modernisierung.",
    "eyebrow": "WEBENTWICKLUNG · SAAS · SCHNITTSTELLEN",
    "headline": "Standardsoftware passt nicht?<br><em>Wir entwickeln die Lösung.</em>",
    "lead": "Wenn Shop, ERP und CRM nicht zusammenarbeiten oder Ihr Team Prozesse in Tabellen abbildet, liegt das Problem oft im Datenfluss. Wir entwickeln Webanwendungen, Schnittstellen und Automatisierungen — aber erst nach einer Prüfung der vorhandenen Möglichkeiten.",
    "problems": [
      [
        "Daten müssen mehrfach erfasst werden",
        "Bestellungen, Lagerbestände und Kundendaten werden manuell zwischen Systemen übertragen."
      ],
      [
        "Das vorhandene CRM bildet Abläufe nicht ab",
        "Teams arbeiten mit zusätzlichen Tabellen, fehlenden Rollen und unnötigen Zwischenschritten."
      ],
      [
        "Der Onlineshop stößt an Grenzen",
        "B2B-Portale, individuelle Preislogik oder neue Funktionen sollen ohne riskanten Komplettumbau entstehen."
      ]
    ],
    "solutions": [
      [
        "Systeme über Schnittstellen verbinden",
        "Wir konzipieren API-Anbindungen, Datenmodelle, Synchronisierung und Fehlerbehandlung."
      ],
      [
        "Passende Webanwendungen bauen",
        "Wir entwickeln Kundenportale, CRM-Funktionen und interne Tools anhand echter Nutzerabläufe."
      ],
      [
        "Bestehende Software gezielt erweitern",
        "Wir prüfen Architektur und Wartbarkeit und planen die Umsetzung in kontrollierten Schritten."
      ]
    ],
    "outcomes": [
      "Technischer Lösungsentwurf und priorisierte Roadmap",
      "Klare Abnahmekriterien und nachvollziehbare Entwicklungsphasen",
      "Dokumentierte Schnittstellen, Tests und Wartungskonzept"
    ],
    "verification": [
      [
        "Schnittstellen und Systemgrenzen",
        "Wir prüfen verfügbare APIs, Dokumentation, Datenmodelle und Zugriffsrechte."
      ],
      [
        "Rollen und Datenschutz",
        "Wir berücksichtigen Berechtigungen, sensible Daten, Protokollierung und Wiederherstellung."
      ],
      [
        "Fehlertoleranz der Integrationen",
        "Wir planen Validierung, Wiederholungsversuche, Monitoring und Fehlerprotokolle."
      ],
      [
        "Betrieb und Wartbarkeit",
        "Wir prüfen Deployment, Tests, Dokumentation und den Umgang mit späteren Änderungen."
      ]
    ],
    "capabilities": [
      [
        "Websites und Onlineshops",
        "Unternehmensseiten, Shops, Produktkataloge und komplexe Nutzerabläufe."
      ],
      [
        "SaaS und Webanwendungen",
        "Mandanten, Benutzerkonten, Rollen, Abonnements und individuelle Geschäftslogik."
      ],
      [
        "CRM und Kundenportale",
        "Aufträge, Leads, Aufgaben, Zugriffsrechte und transparente Prozessschritte."
      ],
      [
        "API-Schnittstellen",
        "Verbindungen zwischen Shop, ERP, CRM, PIM, Zahlungsdiensten und Analysewerkzeugen."
      ],
      [
        "Prozessautomatisierung",
        "Wiederkehrende Abläufe reduzieren und Datenflüsse kontrollierbar machen."
      ],
      [
        "Modernisierung und Betreuung",
        "Vorhandene Anwendungen erweitern, Performance-Probleme beheben und Betrieb unterstützen."
      ]
    ],
    "workflow": [
      [
        "Anforderungen verstehen",
        "Wir analysieren Geschäftsabläufe und prüfen vorhandene Standardlösungen."
      ],
      [
        "Architektur planen",
        "Wir definieren Daten, Nutzerrollen, Schnittstellen, Risiken und einen sinnvollen MVP."
      ],
      [
        "Iterativ entwickeln",
        "Wir setzen priorisierte Funktionen um und testen zentrale Abläufe."
      ],
      [
        "Einführen und betreuen",
        "Wir dokumentieren die Lösung, begleiten den Start und planen die Weiterentwicklung."
      ]
    ],
    "faq": [
      [
        "Müssen Sie eine neue Software entwickeln?",
        "Nicht immer. Oft sind eine Konfiguration oder gezielte Integration die wirtschaftlichere Lösung."
      ],
      [
        "Arbeiten Sie mit bestehendem Shopware- oder CRM-Code?",
        "Nach technischer Prüfung der Architektur, Schnittstellen und Wartbarkeit können wir den Umfang vereinbaren."
      ],
      [
        "Wie kalkulieren Sie die Kosten?",
        "Auf Basis von Umfang, Abhängigkeiten und Entwicklungsphasen. Ein verbindliches Angebot setzt eine Anforderungsanalyse voraus."
      ]
    ],
    "labels": {
      "scope": "ENTWICKLUNGSLEISTUNGEN",
      "scopeTitle": "Software für Ihre Abläufe. Nicht umgekehrt.",
      "process": "UNSER ABLAUF",
      "processTitle": "Von der Ursache zur funktionierenden Anwendung",
      "results": "Was Sie erhalten",
      "check": "TECHNISCHE PRÜFUNG",
      "checkTitle": "Risiken und Schnittstellen vor Projektbeginn",
      "faq": "Fragen zur Zusammenarbeit",
      "cta": "Entwicklung besprechen",
      "contactNote": "Beschreiben Sie den Prozess, der nicht funktioniert, oder zeigen Sie Ihre bestehende Anwendung.",
      "problem": "GESCHÄFTSPROZESSE",
      "problemTitle": "Wo gehen Zeit und Übersicht verloren?",
      "solution": "UNSERE LÖSUNG",
      "planet": "WEBENTWICKLUNG UND SCHNITTSTELLEN",
      "foot": [
        "ANALYSE",
        "UMSETZUNG",
        "WEITERENTWICKLUNG"
      ]
    }
  }
}
MRSEO_DEV_DATA;
 return $data=json_decode($json,true);
}
function mrseo_dev_page($locale=null){$data=mrseo_dev_content();return $data[$locale?:mrseo_locale()]??null;}
