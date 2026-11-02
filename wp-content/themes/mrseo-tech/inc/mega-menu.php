<?php
/**
 * Localized premium services menu.
 * Every offered capability is visible; links are used only for existing pages.
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
          "Комплексна діагностика сайту",
          "Відновлення трафіку"
        ]
      },
      "ads": {
        "title": "Google Ads і Merchant",
        "lead": "Реклама витрачає бюджет без результату",
        "topics": [
          "Google Shopping",
          "Проблеми Merchant Center"
        ]
      },
      "commerce": {
        "title": "Інтернет-магазини",
        "lead": "Каталог не працює на продажі",
        "topics": [
          "Розробка магазинів",
          "Автоматизація каталогу"
        ]
      },
      "dev": {
        "title": "Веброзробка",
        "lead": "Ваша задача — індивідуальне рішення",
        "topics": [
          "Вебзастосунки та кабінети",
          "API та інтеграції",
          "Нестандартні рішення"
        ]
      },
      "data": {
        "title": "Аналітика та дані",
        "lead": "Є цифри, але бракує ясності",
        "topics": [
          "GA4 та конверсії",
          "Дашборди й BigQuery",
          "Автоматизація звітів"
        ]
      }
    },
    "links": {
      "seo": "SEO-просування",
      "seo-audit": "Технічний SEO-аудит",
      "google-ads": "Google Ads",
      "performance-max": "Performance Max",
      "ecommerce-seo": "SEO інтернет-магазинів",
      "horoshop": "Хорошоп",
      "web-development": "Індивідуальна розробка",
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
          "Комплексная диагностика сайта",
          "Восстановление трафика"
        ]
      },
      "ads": {
        "title": "Google Ads и Merchant",
        "lead": "Реклама тратит бюджет без результата",
        "topics": [
          "Google Shopping",
          "Проблемы Merchant Center"
        ]
      },
      "commerce": {
        "title": "Интернет-магазины",
        "lead": "Каталог не приводит покупателей",
        "topics": [
          "Разработка магазинов",
          "Автоматизация каталога"
        ]
      },
      "dev": {
        "title": "Веб-разработка",
        "lead": "Ваша задача — индивидуальное решение",
        "topics": [
          "Веб-приложения и кабинеты",
          "API и интеграции",
          "Нестандартные решения"
        ]
      },
      "data": {
        "title": "Аналитика и данные",
        "lead": "Цифры есть, а ясности нет",
        "topics": [
          "GA4 и конверсии",
          "Дашборды и BigQuery",
          "Автоматизация отчетов"
        ]
      }
    },
    "links": {
      "seo": "SEO-продвижение",
      "seo-audit": "Технический SEO-аудит",
      "google-ads": "Google Ads",
      "performance-max": "Performance Max",
      "ecommerce-seo": "SEO интернет-магазинов",
      "horoshop": "Хорошоп",
      "web-development": "Индивидуальная разработка",
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
          "Google Shopping",
          "Merchant Center troubleshooting"
        ]
      },
      "commerce": {
        "title": "E-commerce",
        "lead": "Your catalog isn't converting demand",
        "topics": [
          "Online store development",
          "Catalog automation"
        ]
      },
      "dev": {
        "title": "Web development",
        "lead": "Custom solutions for specific problems",
        "topics": [
          "Web apps and client portals",
          "API and integrations",
          "Custom functionality"
        ]
      },
      "data": {
        "title": "Analytics & data",
        "lead": "Reports without actionable answers",
        "topics": [
          "GA4 and conversions",
          "Dashboards & BigQuery",
          "Automated reports"
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
          "Google Shopping",
          "Problemy z Merchant Center"
        ]
      },
      "commerce": {
        "title": "E-commerce",
        "lead": "Katalog nie wykorzystuje popytu",
        "topics": [
          "Tworzenie sklepów",
          "Automatyzacja katalogów"
        ]
      },
      "dev": {
        "title": "Tworzenie aplikacji",
        "lead": "Rozwiązania na miarę potrzeb firmy",
        "topics": [
          "Aplikacje i panele klientów",
          "API i integracje",
          "Rozwiązania na zamówienie"
        ]
      },
      "data": {
        "title": "Analityka i dane",
        "lead": "Raporty bez jasnych wniosków",
        "topics": [
          "GA4 i konwersje",
          "Pulpity i BigQuery",
          "Automatyzacja raportów"
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
          "Google Shopping",
          "Merchant Center Probleme"
        ]
      },
      "commerce": {
        "title": "Online-Shops",
        "lead": "Ihr Katalog schöpft die Nachfrage nicht aus",
        "topics": [
          "Online-Shop Entwicklung",
          "Katalogautomatisierung"
        ]
      },
      "dev": {
        "title": "Webentwicklung",
        "lead": "Individuelle Lösungen für Geschäftsprozesse",
        "topics": [
          "Web-Apps und Kundenportale",
          "API und Integrationen",
          "Individuelle Lösungen"
        ]
      },
      "data": {
        "title": "Analyse & Daten",
        "lead": "Kennzahlen ohne klare Entscheidungen",
        "topics": [
          "GA4 und Conversions",
          "Dashboards und BigQuery",
          "Automatisierte Berichte"
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
    return $copy[mrseo_locale()] ?? $copy['uk'];
}
function mrseo_mega_menu_icon($key) {
    $paths = array(
       'seo' => '<circle cx="10.6" cy="10.6" r="6.6"/><path d="m15.5 15.5 5.2 5.2"/>',
       'ads' => '<path d="m3 11 13-6v14L3 13z"/><path d="m7 14 2 5h4l-3-6"/><path d="M19 9c1.5 1.2 1.5 4.8 0 6"/>',
       'commerce' => '<path d="M2.5 4h2l2.3 10.5h11.7l2.2-7.7H5.1"/><circle cx="8.2" cy="19" r="1.4"/><circle cx="17.5" cy="19" r="1.4"/>',
       'dev' => '<path d="m8 6-6 6 6 6m8-12 6 6-6 6m-3-15-5 18"/>',
       'data' => '<path d="M3 20V12h4v8M10 20V8h4v12M17 20V4h4v16M2 21h20"/>'
    );
    return '<svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.($paths[$key] ?? $paths['seo']).'</svg>';
}
function mrseo_render_mega_menu($in_mobile_panel = false) {
    $copy = mrseo_mega_menu_copy();
    $locale = mrseo_locale();
    $slug = mrseo_slug();
    $section_links = array(
       'seo' => array('seo','seo-audit'),
       'ads' => array('google-ads','performance-max'),
       'commerce' => array('ecommerce-seo','horoshop'),
       'dev' => array('web-development','service-websites'),
       'data' => array('analytics')
    );
    $valid = in_array($locale, array('pl','de'), true)
       ? mrseo_int_pages()
       : array('seo','seo-audit','google-ads','performance-max','ecommerce-seo','horoshop','web-development','service-websites','analytics');
    echo '<div class="mrseo-mega'.($in_mobile_panel ? ' mrseo-mega--mobile-panel' : '').'">';
    echo '<div class="mrseo-mega-grid">';
    foreach ($section_links as $key => $slugs) {
        $group = $copy['sections'][$key] ?? null;
        if (!$group) continue;
        echo '<section class="mrseo-mega-group mrseo-mega-group--'.esc_attr($key).'">';
        echo '<h3>'.mrseo_mega_menu_icon($key).'<span>'.esc_html($group['title']).'</span></h3>';
        echo '<div class="mrseo-mega-items">';
        // Some locale-specific pages do not exist yet: show the capability without a broken link.
        foreach ($slugs as $item_slug) {
            if ($item_slug === 'horoshop' && !in_array($locale, array('uk','ru'), true)) continue;
            $name = $copy['links'][$item_slug] ?? $item_slug;
            if (in_array($item_slug, $valid, true)) {
                $active = $item_slug === $slug;
                echo '<a class="mrseo-mega-item'.($active ? ' is-current' : '').'" href="'.esc_url(mrseo_url($item_slug)).'"'.($active ? ' aria-current="page"' : '').'>'.esc_html($name).'</a>';
            } else {
                echo '<span class="mrseo-mega-item">'.esc_html($name).'</span>';
            }
        }
        foreach (($group['topics'] ?? array()) as $topic) {
            echo '<span class="mrseo-mega-item">'.esc_html($topic).'</span>';
        }
        echo '</div></section>';
    }
    echo '</div>';
    echo '<div class="mrseo-mega-bottom">';
    echo '<div class="mrseo-mega-bottom-copy"><strong>'.esc_html($copy['ctaHeading']).'</strong><p>'.esc_html($copy['ctaText']).'</p></div>';
    echo '<a class="mrseo-mega-contact" href="'.esc_url(mrseo_url('contact')).'">'.esc_html($copy['cta']).'<span aria-hidden="true">↗</span></a>';
    echo '</div></div>';
}
