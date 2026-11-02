<?php
/**
 * Shared, locale-specific mega navigation. Keep detailed unlaunched offers as text,
 * not dead links or redirects to unrelated pages.
 */
if (!defined('ABSPATH')) exit;

function mrseo_mega_menu_copy() {
    static $copy = null;
    if ($copy === null) {
        $json = <<<'MRSEO_MEGA_DATA'
{
  "uk": {
    "intro": "РІШЕННЯ ДЛЯ БІЗНЕСУ",
    "headline": "Знайдіть завдання. Ми запропонуємо рішення.",
    "summary": "Від видимості в Google до індивідуальної розробки — починаємо з проблеми бізнесу.",
    "more": "Також допомагаємо",
    "ctaHeading": "Не знайшли потрібну послугу?",
    "ctaText": "Опишіть, що не працює або який функціонал потрібен. Оцінимо задачу й запропонуємо варіанти реалізації.",
    "cta": "Розповісти про задачу",
    "sections": {
      "seo": {
        "title": "SEO та аудит",
        "lead": "Сайт не знаходять або впав трафік",
        "topics": [
          "Комплексний аудит сайту",
          "Відновлення трафіку та переїзд"
        ]
      },
      "ads": {
        "title": "Google Ads і Merchant",
        "lead": "Реклама витрачає бюджет без результату",
        "topics": [
          "Google Shopping і товарні фіди",
          "Діагностика блокування Merchant Center"
        ]
      },
      "commerce": {
        "title": "Інтернет-магазини",
        "lead": "Каталог не працює на продажі",
        "topics": [
          "Створення інтернет-магазинів",
          "Автоматизація цін, залишків і замовлень"
        ]
      },
      "dev": {
        "title": "Веброзробка",
        "lead": "Ваша задача — індивідуальне рішення",
        "topics": [
          "Вебзастосунки та особисті кабінети",
          "API, інтеграції та автоматизація",
          "Калькулятори та нестандартні функції"
        ]
      },
      "data": {
        "title": "Аналітика та дані",
        "lead": "Є цифри, але бракує ясності",
        "topics": [
          "GA4 і перевірка конверсій",
          "Дашборди, BigQuery та звіти"
        ]
      }
    },
    "links": {
      "seo": "SEO-просування",
      "seo-audit": "Технічний SEO-аудит",
      "google-ads": "Налаштування Google Ads",
      "performance-max": "Performance Max",
      "ecommerce-seo": "SEO інтернет-магазинів",
      "horoshop": "Магазини на Хорошоп",
      "web-development": "Індивідуальна веброзробка",
      "service-websites": "Створення сайтів",
      "analytics": "Аналітика та автоматизація"
    }
  },
  "ru": {
    "intro": "РЕШЕНИЯ ДЛЯ БИЗНЕСА",
    "headline": "Найдите свою задачу. Мы предложим решение.",
    "summary": "От видимости в Google до индивидуальной разработки — начинаем с проблемы бизнеса.",
    "more": "Также помогаем",
    "ctaHeading": "Не нашли нужную услугу?",
    "ctaText": "Расскажите, что не работает или какой функционал нужен. Оценим задачу и предложим варианты реализации.",
    "cta": "Рассказать о задаче",
    "sections": {
      "seo": {
        "title": "SEO и аудит",
        "lead": "Сайт не находят или упал трафик",
        "topics": [
          "Комплексный аудит сайта",
          "Восстановление трафика и переезд"
        ]
      },
      "ads": {
        "title": "Google Ads и Merchant",
        "lead": "Реклама тратит бюджет без результата",
        "topics": [
          "Google Shopping и товарные фиды",
          "Диагностика блокировки Merchant Center"
        ]
      },
      "commerce": {
        "title": "Интернет-магазины",
        "lead": "Каталог не приводит покупателей",
        "topics": [
          "Разработка интернет-магазинов",
          "Автоматизация цен, остатков и заказов"
        ]
      },
      "dev": {
        "title": "Веб-разработка",
        "lead": "Ваша задача — индивидуальное решение",
        "topics": [
          "Веб-приложения и личные кабинеты",
          "API, интеграции и автоматизация",
          "Калькуляторы и нестандартные функции"
        ]
      },
      "data": {
        "title": "Аналитика и данные",
        "lead": "Цифры есть, а ясности нет",
        "topics": [
          "GA4 и проверка конверсий",
          "Дашборды, BigQuery и отчётность"
        ]
      }
    },
    "links": {
      "seo": "SEO-продвижение",
      "seo-audit": "Технический SEO-аудит",
      "google-ads": "Настройка Google Ads",
      "performance-max": "Performance Max",
      "ecommerce-seo": "SEO интернет-магазинов",
      "horoshop": "Магазины на Хорошоп",
      "web-development": "Индивидуальная веб-разработка",
      "service-websites": "Создание сайтов",
      "analytics": "Аналитика и автоматизация"
    }
  },
  "en": {
    "intro": "SOLUTIONS FOR BUSINESS",
    "headline": "Tell us the challenge. We'll explore the solution.",
    "summary": "From search visibility to custom web engineering — start with the business problem.",
    "more": "We can also help with",
    "ctaHeading": "Can't find the service you need?",
    "ctaText": "Describe what's not working or what you'd like to build. We'll assess the scope and suggest options.",
    "cta": "Describe your project",
    "sections": {
      "seo": {
        "title": "SEO & audits",
        "lead": "Visibility is down or leads are missing",
        "topics": [
          "Full website diagnosis",
          "Traffic recovery and migrations"
        ]
      },
      "ads": {
        "title": "Google Ads & Merchant",
        "lead": "Ad spend isn't producing useful outcomes",
        "topics": [
          "Google Shopping and product feeds",
          "Merchant Center suspension diagnostics"
        ]
      },
      "commerce": {
        "title": "E-commerce",
        "lead": "Your catalog isn't converting demand",
        "topics": [
          "Online store development",
          "Price, inventory and order automation"
        ]
      },
      "dev": {
        "title": "Web development",
        "lead": "Custom solutions for specific problems",
        "topics": [
          "Web applications and client portals",
          "APIs, integrations and automation",
          "Calculators and custom functionality"
        ]
      },
      "data": {
        "title": "Analytics & data",
        "lead": "Reports without actionable answers",
        "topics": [
          "GA4 and conversion validation",
          "Dashboards, BigQuery and reporting"
        ]
      }
    },
    "links": {
      "seo": "SEO services",
      "seo-audit": "Technical SEO audit",
      "google-ads": "Google Ads management",
      "performance-max": "Performance Max",
      "ecommerce-seo": "E-commerce SEO",
      "horoshop": "Horoshop stores",
      "web-development": "Custom web development",
      "service-websites": "Website development",
      "analytics": "Analytics & automation"
    }
  },
  "pl": {
    "intro": "ROZWIĄZANIA DLA BIZNESU",
    "headline": "Opisz wyzwanie. Znajdziemy możliwe rozwiązanie.",
    "summary": "Od widoczności w Google po indywidualne aplikacje — zaczynamy od problemu biznesowego.",
    "more": "Pomagamy również w",
    "ctaHeading": "Nie widzisz odpowiedniej usługi?",
    "ctaText": "Opisz problem lub funkcję, której potrzebujesz. Ocenimy zakres i zaproponujemy możliwe podejście.",
    "cta": "Opisz swój projekt",
    "sections": {
      "seo": {
        "title": "SEO i audyty",
        "lead": "Strona nie zdobywa klientów z Google",
        "topics": [
          "Kompleksowa analiza strony",
          "Odzyskiwanie ruchu i migracje"
        ]
      },
      "ads": {
        "title": "Google Ads i Merchant",
        "lead": "Budżet reklamowy nie przynosi efektów",
        "topics": [
          "Google Shopping i pliki produktowe",
          "Diagnostyka zawieszenia Merchant Center"
        ]
      },
      "commerce": {
        "title": "E-commerce",
        "lead": "Katalog nie wykorzystuje popytu",
        "topics": [
          "Tworzenie sklepów internetowych",
          "Automatyzacja cen, stanów i zamówień"
        ]
      },
      "dev": {
        "title": "Tworzenie aplikacji",
        "lead": "Rozwiązania na miarę potrzeb firmy",
        "topics": [
          "Aplikacje internetowe i panele klientów",
          "API, integracje i automatyzacja",
          "Kalkulatory i indywidualne funkcje"
        ]
      },
      "data": {
        "title": "Analityka i dane",
        "lead": "Raporty bez jasnych wniosków",
        "topics": [
          "GA4 i weryfikacja konwersji",
          "Pulpity, BigQuery i raportowanie"
        ]
      }
    },
    "links": {
      "seo": "Pozycjonowanie SEO",
      "seo-audit": "Audyt techniczny SEO",
      "google-ads": "Kampanie Google Ads",
      "performance-max": "Performance Max",
      "ecommerce-seo": "SEO sklepów internetowych",
      "horoshop": "Sklepy Horoshop",
      "web-development": "Indywidualne aplikacje webowe",
      "service-websites": "Tworzenie stron",
      "analytics": "Analityka i automatyzacja"
    }
  },
  "de": {
    "intro": "LÖSUNGEN FÜR UNTERNEHMEN",
    "headline": "Beschreiben Sie Ihr Problem. Wir prüfen die Lösung.",
    "summary": "Von Google-Sichtbarkeit bis individueller Webentwicklung — die geschäftliche Herausforderung steht zuerst.",
    "more": "Außerdem unterstützen wir bei",
    "ctaHeading": "Die passende Leistung fehlt?",
    "ctaText": "Beschreiben Sie Ihr Problem oder die gewünschte Funktion. Wir prüfen die Umsetzbarkeit und schlagen Optionen vor.",
    "cta": "Projekt beschreiben",
    "sections": {
      "seo": {
        "title": "SEO & Audits",
        "lead": "Ihre Website gewinnt zu wenig Kunden",
        "topics": [
          "Umfassende Website-Analyse",
          "Traffic-Rückgang und Migrationen"
        ]
      },
      "ads": {
        "title": "Google Ads & Merchant",
        "lead": "Werbebudget erzielt zu wenig Wirkung",
        "topics": [
          "Google Shopping und Produktfeeds",
          "Merchant-Center-Sperrungen analysieren"
        ]
      },
      "commerce": {
        "title": "Online-Shops",
        "lead": "Ihr Katalog schöpft die Nachfrage nicht aus",
        "topics": [
          "Entwicklung von Online-Shops",
          "Preis-, Bestands- und Auftragsautomatisierung"
        ]
      },
      "dev": {
        "title": "Webentwicklung",
        "lead": "Individuelle Lösungen für Geschäftsprozesse",
        "topics": [
          "Webanwendungen und Kundenportale",
          "APIs, Integrationen und Automatisierung",
          "Rechner und individuelle Funktionen"
        ]
      },
      "data": {
        "title": "Analyse & Daten",
        "lead": "Kennzahlen ohne klare Entscheidungen",
        "topics": [
          "GA4 und Conversion-Prüfung",
          "Dashboards, BigQuery und Berichte"
        ]
      }
    },
    "links": {
      "seo": "SEO-Optimierung",
      "seo-audit": "Technisches SEO-Audit",
      "google-ads": "Google Ads Betreuung",
      "performance-max": "Performance Max",
      "ecommerce-seo": "E-Commerce SEO",
      "horoshop": "Horoshop Shops",
      "web-development": "Individuelle Webentwicklung",
      "service-websites": "Website-Erstellung",
      "analytics": "Analytik & Automatisierung"
    }
  }
}
MRSEO_MEGA_DATA;
        $copy = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }
    $lang = mrseo_locale();
    return $copy[$lang] ?? $copy['uk'];
}

function mrseo_render_mega_menu($in_mobile_panel = false) {
    $copy = mrseo_mega_menu_copy();
    $lang = mrseo_locale();
    $current_slug = mrseo_slug();
    $groups = array(
        'seo' => array('seo', 'seo-audit'),
        'ads' => array('google-ads', 'performance-max'),
        'commerce' => array('ecommerce-seo', 'horoshop'),
        'dev' => array('web-development', 'service-websites'),
        'data' => array('analytics')
    );
    $available = $lang === 'pl' || $lang === 'de'
        ? mrseo_int_pages()
        : array('seo','seo-audit','google-ads','performance-max','ecommerce-seo','horoshop','web-development','service-websites','analytics');
    $layout = $in_mobile_panel ? ' mrseo-mega--mobile-panel' : '';
    echo '<div class="mrseo-mega' . esc_attr($layout) . '">';
    echo '<div class="mrseo-mega-intro"><span class="mrseo-mega-eyebrow">' . esc_html($copy['intro']) . '</span>';
    echo '<strong class="mrseo-mega-title">' . esc_html($copy['headline']) . '</strong>';
    echo '<p>' . esc_html($copy['summary']) . '</p></div>';
    echo '<div class="mrseo-mega-grid">';
    foreach ($groups as $group_id => $slugs) {
        $group = $copy['sections'][$group_id] ?? null;
        if (!$group) continue;
        echo '<section class="mrseo-mega-group mrseo-mega-group--' . esc_attr($group_id) . '">';
        echo '<h3>' . esc_html($group['title']) . '</h3>';
        echo '<p class="mrseo-mega-group-lead">' . esc_html($group['lead']) . '</p>';
        echo '<div class="mrseo-mega-links">';
        foreach ($slugs as $slug) {
            if (!in_array($slug, $available, true)) continue;
            $current = $current_slug === $slug;
            echo '<a href="' . esc_url(mrseo_url($slug)) . '" class="mrseo-mega-link' . ($current ? ' is-current' : '') . '"' . ($current ? ' aria-current="page"' : '') . '>' . esc_html($copy['links'][$slug] ?? $slug) . '</a>';
        }
        echo '</div>';
        echo '<div class="mrseo-mega-more"><span>' . esc_html($copy['more']) . '</span>';
        echo '<ul>';
        foreach (($group['topics'] ?? array()) as $topic) echo '<li>' . esc_html($topic) . '</li>';
        echo '</ul></div></section>';
    }
    echo '</div>';
    echo '<div class="mrseo-mega-bottom"><div class="mrseo-mega-bottom-copy"><strong>' . esc_html($copy['ctaHeading']) . '</strong><p>' . esc_html($copy['ctaText']) . '</p></div>';
    echo '<a class="mrseo-mega-contact" href="' . esc_url(mrseo_url('contact')) . '">' . esc_html($copy['cta']) . ' <span aria-hidden="true">↗</span></a></div>';
    echo '</div>';
}
