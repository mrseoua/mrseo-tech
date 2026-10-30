<?php
if(!defined('ABSPATH'))exit;
/** Distinct, localized delivery stages for inner service pages; no homepage dependency. */
function mrseo_service_process($slug){
  $raw=<<<'MRSEO_PROCESS_DATA'
{
  "uk": {
    "steps": [
      "Розбираємося в цілях",
      "Знаходимо обмеження",
      "Узгоджуємо рішення",
      "Контролюємо результат"
    ],
    "services": {
      "seo-audit": [
        [
          "З'ясовуємо, які сторінки приносять бізнесу користь і що саме викликає підозри: падіння трафіку, пропущена індексація чи наслідки оновлення.",
          "Перелік важливих розділів і сценаріїв, які потрібно перевірити."
        ],
        [
          "Зіставляємо сканування, XML-карти, індексацію, редиректи й шаблони. Кожну суттєву помилку підтверджуємо на прикладах URL.",
          "Докази проблем із конкретними адресами та масштабом впливу."
        ],
        [
          "Сортуємо проблеми за ризиком і цінністю для бізнесу; описуємо очікуване виправлення без абстрактних рекомендацій.",
          "Технічні завдання для розробника з пріоритетами й критеріями приймання."
        ],
        [
          "Передаємо план виправлень і пояснюємо, як перевірити його виконання. Аудит сам собою не означає автоматичного внесення змін.",
          "Зрозумілий порядок впровадження та чекліст повторної перевірки."
        ]
      ],
      "google-ads": [
        [
          "З'ясовуємо, який продаж або лід вигідний бізнесу, який цикл покупки та які обмеження бюджету.",
          "Орієнтири для CPA, ROAS і реальної цінності конверсії."
        ],
        [
          "Звіряємо покупки й заявки в Google Ads, GA4 та доступних даних замовлень. Шукаємо дублікати і хибні сигнали.",
          "Список помилок вимірювання та дій для їх усунення."
        ],
        [
          "Оцінюємо пошукові запити, товарні групи й посадкові сторінки; пропонуємо зміни з урахуванням попиту та маржі.",
          "План структури кампаній і пріоритетів витрат, а не набір випадкових налаштувань."
        ],
        [
          "Після погоджених змін порівнюємо періоди з урахуванням навчання, сезонності й затримки конверсій.",
          "Звіт про витрати та цінність результату з наступними рішеннями."
        ]
      ],
      "performance-max": [
        [
          "Визначаємо, які товари можна просувати прибутково, а які мають іншу маржу або недостатню статистику.",
          "Критерії оцінювання груп товарів, а не один ROAS для всього каталогу."
        ],
        [
          "Перевіряємо Merchant Center, дані товарів, покупки та цінність конверсій. Не робимо висновків зі спотворених сигналів.",
          "Перелік обмежень фіда і вимірювання, які потрібно усунути першими."
        ],
        [
          "Проєктуємо зрозумілі групи асортименту й гіпотези тестів. Не дробимо кампанії без потреби та достатніх даних.",
          "Обґрунтована схема сегментів і план перевірюваних змін."
        ],
        [
          "Порівнюємо витрати, замовлення та маржинальність після стабілізації тестів; не змінюємо стратегію щодня.",
          "Критерії продовження, коригування або зупинки експерименту."
        ]
      ],
      "analytics": [
        [
          "Визначаємо, які рішення потрібно приймати за даними: де губляться заявки, які канали окупаються, що рахувати продажем.",
          "Карта ключових подій, цілей і потрібних бізнес-показників."
        ],
        [
          "Звіряємо GA4, Google Ads і доступну інформацію про замовлення. Перевіряємо теги, події, дублікати та атрибуцію.",
          "Список знайдених розбіжностей і джерел недостовірних цифр."
        ],
        [
          "Налаштовуємо узгоджену логіку вимірювання та зрозумілі звіти під конкретні запитання бізнесу.",
          "Специфікація подій і структура звітності без зайвих метрик."
        ],
        [
          "Перевіряємо тестові події та правильність ключових показників, фіксуємо правила подальшого контролю.",
          "Перевірена схема вимірювання та зрозумілий спосіб відстежувати зміни."
        ]
      ]
    }
  },
  "ru": {
    "steps": [
      "Разбираемся в целях",
      "Находим ограничения",
      "Согласуем решение",
      "Контролируем результат"
    ],
    "services": {
      "seo-audit": [
        [
          "Выясняем, какие страницы важны для бизнеса и что вызвало подозрения: падение трафика, проблемы индексации или последствия обновления.",
          "Список приоритетных разделов и сценариев для проверки."
        ],
        [
          "Сопоставляем результаты сканирования, XML-карты, индексацию, редиректы и шаблоны. Существенные ошибки подтверждаем примерами URL.",
          "Подтверждённые проблемы с конкретными адресами и оценкой масштаба."
        ],
        [
          "Сортируем проблемы по риску и бизнес-значимости; объясняем, что должно измениться, вместо абстрактных советов.",
          "Задачи для разработчика с приоритетами и критериями приёмки."
        ],
        [
          "Передаём план исправлений и объясняем, как проверить результат. Сам аудит не предполагает автоматического внедрения.",
          "Порядок исправлений и чек-лист повторной проверки."
        ]
      ],
      "google-ads": [
        [
          "Выясняем, какие продажи и лиды выгодны, каков цикл покупки и какие ограничения у бюджета.",
          "Ориентиры допустимого CPA, ROAS и ценности конверсии."
        ],
        [
          "Сверяем покупки и заявки в Google Ads, GA4 и доступных данных заказов. Ищем дубли и ложные сигналы.",
          "Список ошибок отслеживания и действий по их устранению."
        ],
        [
          "Изучаем поисковые запросы, товарные группы и посадочные страницы; предлагаем изменения с учётом спроса и маржи.",
          "План структуры кампаний и распределения расходов, а не набор случайных настроек."
        ],
        [
          "После согласованных изменений сравниваем периоды с учётом обучения, сезонности и задержки конверсий.",
          "Отчёт о расходах и ценности результата с конкретными следующими решениями."
        ]
      ],
      "performance-max": [
        [
          "Определяем, какие товары выгодно рекламировать, а где другая маржа или не хватает статистики.",
          "Критерии оценки товарных групп вместо единого ROAS на весь каталог."
        ],
        [
          "Проверяем Merchant Center, данные товаров, покупки и ценность конверсий. Не делаем выводы по искажённым сигналам.",
          "Список ограничений фида и отслеживания для первоочередного исправления."
        ],
        [
          "Проектируем понятные группы ассортимента и гипотезы для тестов. Не дробим кампании без необходимости и достаточных данных.",
          "Обоснованная структура сегментов и план проверяемых изменений."
        ],
        [
          "Сравниваем расходы, заказы и маржинальность после стабилизации тестов, не меняя стратегию каждый день.",
          "Критерии продолжения, корректировки или остановки эксперимента."
        ]
      ],
      "analytics": [
        [
          "Определяем, какие решения нужны на основе данных: где теряются заявки, какие каналы окупаются и что считать продажей.",
          "Карта ключевых событий, целей и бизнес-показателей."
        ],
        [
          "Сверяем GA4, Google Ads и доступные сведения о заказах. Проверяем теги, события, дубли и атрибуцию.",
          "Список расхождений и причин недостоверных цифр."
        ],
        [
          "Настраиваем согласованную логику измерения и отчёты под конкретные вопросы бизнеса.",
          "Спецификация событий и структура отчётности без лишних метрик."
        ],
        [
          "Проверяем тестовые события и корректность ключевых показателей, фиксируем правила контроля.",
          "Проверенная схема измерения и понятный способ отслеживать изменения."
        ]
      ]
    }
  },
  "en": {
    "steps": [
      "Clarify the business goal",
      "Identify the constraints",
      "Agree on the response",
      "Verify the outcome"
    ],
    "services": {
      "seo-audit": [
        [
          "Identify the pages that matter most and the trigger for the audit: traffic loss, missing indexing or a recent migration.",
          "A focused list of priority page types and scenarios to inspect."
        ],
        [
          "Compare crawl results, sitemaps, indexing signals, redirects and templates. Validate material issues against example URLs.",
          "Documented findings with affected URLs and an assessment of scope."
        ],
        [
          "Rank findings by risk and commercial impact, and specify expected behavior instead of vague suggestions.",
          "Developer-ready tickets with priorities and acceptance criteria."
        ],
        [
          "Hand over an implementation plan and verification checklist. An audit does not automatically include making the fixes.",
          "An ordered remediation roadmap and post-change validation criteria."
        ]
      ],
      "google-ads": [
        [
          "Define what a profitable order or qualified lead means, considering purchasing cycles and budget constraints.",
          "Working CPA, ROAS and conversion-value targets."
        ],
        [
          "Reconcile Google Ads and GA4 conversions with available order information; investigate duplicate or misleading signals.",
          "A record of tracking discrepancies and required fixes."
        ],
        [
          "Review search intent, product segments and landing pages to prioritize changes against demand and margins.",
          "A campaign and budget action plan grounded in business economics."
        ],
        [
          "Compare meaningful periods after agreed changes, accounting for learning, seasonality and conversion lag.",
          "A performance review linked to clear next decisions."
        ]
      ],
      "performance-max": [
        [
          "Determine which products can be promoted profitably and where margin or data volume requires a different approach.",
          "Evaluation criteria by product group, rather than one blanket ROAS target."
        ],
        [
          "Review Merchant Center, product data, purchases and conversion values before trusting the algorithmic signals.",
          "A prioritized feed and measurement issue list."
        ],
        [
          "Design sensible catalog segments and test hypotheses without unnecessary campaign fragmentation.",
          "A segmentation proposal and measurable test plan."
        ],
        [
          "Review spend, orders and margin after tests have stabilized rather than changing settings every day.",
          "Decision rules for continuing, revising or stopping each experiment."
        ]
      ],
      "analytics": [
        [
          "Identify which decisions data must support: missing leads, profitable channels and the meaning of a sale.",
          "A concise map of critical events, objectives and business metrics."
        ],
        [
          "Reconcile GA4, Google Ads and available order records; inspect tags, duplicates and attribution.",
          "An evidence-based list of measurement discrepancies."
        ],
        [
          "Establish consistent event definitions and reports tailored to actual business decisions.",
          "An event specification and reporting structure without vanity metrics."
        ],
        [
          "Test critical events and key metrics, and define how measurement quality will be maintained.",
          "A validated measurement setup and a practical monitoring approach."
        ]
      ]
    }
  }
}
MRSEO_PROCESS_DATA;
  $all=json_decode($raw,true);
  $lang=mrseo_locale();
  $localized=$all[$lang]??$all['uk'];
  $stages=$localized['services'][$slug]??array();
  $items=array();
  foreach($stages as $i=>$stage){
    $items[]=array('title'=>$localized['steps'][$i]??'', 'detail'=>$stage[0]??'', 'outcome'=>$stage[1]??'');
  }
  return $items;
}
