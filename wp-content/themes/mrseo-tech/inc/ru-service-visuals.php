<?php
/**
 * Russian service visual stories. Illustrative examples, not client outcomes.
 * Reuses approved Ukrainian CSS tokens without changing Ukrainian templates.
 */
if (!defined('ABSPATH')) exit;

function mrseo_ru4_data($slug) {
 static $pages=null;
 if ($pages===null) {
  $json=<<<'MRSEO_RU4_JSON'
{"ecommerce-seo":{"journey":{"eyebrow":"ПОИСК И КАТАЛОГ","heading":["Покупатель ищет товар.","Магазин должен показать нужное."],"lead":"Логичная структура каталога помогает найти категорию, выбрать модель и перейти к товару.","steps":[["КАТЕГОРИЯ","Находят нужный раздел","Страница отвечает конкретному запросу покупателя.","catalog"],["ВЫБОР","Удобно выбирают","Фильтры помогают найти товар без лишних индексируемых дублей.","filters"],["ТОВАР","Переходят к покупке","Описание и характеристики помогают принять решение.","product"]]},"plan":{"eyebrow":"НЕ БЕСКОНЕЧНЫЕ URL, А СТРУКТУРА","heading":["Меньше хаоса в каталоге.","Больше ясности для покупателей."],"lead":"Определяем, какие страницы нужны поиску, а какие создают технический шум.","type":"catalog","artTitle":"Карта каталога","steps":[["Изучаем спрос","Выделяем категории, бренды и модели с реальными запросами."],["Исправляем препятствия","Проверяем дубли, индексацию, навигацию и внутренние ссылки."],["Проверяем изменения","Контролируем доступность важных URL и поисковые сигналы."]],"cta":"Обсудить мой каталог"}},"analytics":{"journey":{"eyebrow":"АНАЛИТИКА БЕЗ ЛИШНИХ ЦИФР","heading":["От действия на сайте —","к понятному решению."],"lead":"Сначала убеждаемся, что события собираются корректно. Только после этого строим отчёты.","steps":[["ДЕЙСТВИЕ","Посетитель действует","Отправляет заявку, звонит или оформляет заказ.","event"],["ПРОВЕРКА","Данным можно доверять","Проверяем события, дубликаты и пропуски.","verify"],["РЕШЕНИЕ","Отчёт помогает бизнесу","Метрики отвечают на конкретные вопросы.","report"]]},"plan":{"eyebrow":"ДАННЫЕ ДЛЯ РЕШЕНИЙ","heading":["Не просто ещё один отчёт.","Понятная картина бизнеса."],"lead":"GA4 и Google Ads могут считать по-разному. Разбираемся в различиях и проверяем качество измерения.","type":"analytics","artTitle":"Проверка измерений","steps":[["Определяем важные действия","Какие заявки и покупки действительно значимы для бизнеса."],["Проверяем сбор данных","События, дубликаты, передачу данных и атрибуцию."],["Настраиваем понятные отчёты","Показываем надёжные метрики и ограничения интерпретации."]],"cta":"Проверить мою аналитику"}},"service-websites":{"journey":{"eyebrow":"САЙТ, НА КОТОРОМ ЛЕГКО ОБРАТИТЬСЯ","heading":["Увидели услугу.","Разобрались. Обратились."],"lead":"Сайт услуг должен помогать посетителю найти ответ и связаться с компанией без лишних шагов.","steps":[["ПОТРЕБНОСТЬ","Ищут услугу","Находят страницу под свой запрос.","search"],["ДОВЕРИЕ","Понимают предложение","Видят состав услуги и порядок работы.","website"],["КОНТАКТ","Могут обратиться","Форма или телефон доступны и понятны.","contact"]]},"plan":{"eyebrow":"РАЗРАБОТКА САЙТОВ УСЛУГ","heading":["Не только красивый макет.","Продуманный путь к заявке."],"lead":"Соединяем структуру, дизайн и техническую готовность сайта к продвижению.","type":"website","artTitle":"От структуры к сайту","steps":[["Проектируем страницы","Учитываем вопросы посетителей и поисковые сценарии."],["Создаём удобный сайт","Адаптивность, понятное содержание и доступные контакты."],["Проверяем перед запуском","Формы, скорость и базовые требования SEO."]],"cta":"Обсудить создание сайта"}},"horoshop":{"journey":{"eyebrow":"ХОРОШОП: ОТ КАТАЛОГА ДО ЗАКАЗА","heading":["Платформа уже есть.","Важно правильно её настроить."],"lead":"Работаем с доступными возможностями Хорошоп: каталогом, товарными данными и маршрутом покупателя.","steps":[["КАТАЛОГ","Понятная структура","Категории и фильтры отвечают задачам покупателей.","catalog"],["ТОВАРЫ","Актуальные данные","Проверяем названия, цены и наличие.","feed"],["ЗАКАЗ","Удобный путь","Покупателю легко оформить заказ.","checkout"]]},"plan":{"eyebrow":"С УЧЁТОМ ОГРАНИЧЕНИЙ ХОРОШОП","heading":["Не обещаем невозможного.","Используем доступные инструменты."],"lead":"Не каждое решение реализуемо на готовой платформе. Сначала проверяем её технические возможности.","type":"horoshop","artTitle":"Настройка магазина","steps":[["Проверяем ограничения","Настройки, интеграции и SEO-возможности платформы."],["Выбираем приоритеты","Категории, индексация, товарный фид и рекламные данные."],["Контролируем изменения","URL, товарные данные и ключевые действия после внедрения."]],"cta":"Обсудить мой Хорошоп"}}}
MRSEO_RU4_JSON;
  $pages=json_decode($json,true);
 }
 return $pages[$slug]??null;
}

function mrseo_ru4_art($kind) { ?>
 <div class="ua4-art ua4-art--<?php echo esc_attr($kind);?>" aria-hidden="true">
 <?php if(in_array($kind,array('catalog','filters','product','feed','checkout'),true)):?>
 <div class="ua4-store-ui">
  <div class="ua4-browser-top"><i></i><i></i><i></i><span>МАГАЗИН</span></div>
  <?php if($kind==='catalog'):?>
   <div class="ua4-catalog-title">Категории товаров</div><div class="ua4-catalog-tiles"><i></i><i></i><i></i></div><div class="ua4-catalog-bars"><i></i><i></i></div>
  <?php elseif($kind==='filters'):?>
   <div class="ua4-catalog-title">Выберите нужное</div><div class="ua4-filter-chips"><span>Бренд</span><span>Модель</span><span>Тип</span></div><div class="ua4-filter-found"><b>✓</b><i></i></div>
  <?php elseif($kind==='product'):?>
   <div class="ua4-product-layout"><div class="ua4-product-image">▣</div><div class="ua4-product-copy"><strong>Нужный товар</strong><i></i><i></i><span>Подробнее <b>↗</b></span></div></div>
  <?php elseif($kind==='feed'):?>
   <div class="ua4-catalog-title">Данные о товарах</div>
   <?php foreach(array('Название','Цена','Наличие') as $field):?><div class="ua4-feed-row"><b>✓</b><span><?php echo esc_html($field);?></span><i></i></div><?php endforeach;?>
  <?php else:?>
   <div class="ua4-checkout-mark"><svg viewBox="0 0 80 80"><path d="M20 40l14 14 27-29"/></svg></div><div class="ua4-checkout-title">Заказ</div><div class="ua4-checkout-subtitle">Простое оформление</div>
  <?php endif;?>
 </div>
 <?php elseif($kind==='event'):?>
  <div class="ua4-event-target"><span>↗</span><i></i><i></i></div><div class="ua4-art-biglabel">Событие на сайте</div>
 <?php elseif($kind==='verify'):?>
  <div class="ua4-verify-ring"><span>✓</span></div><div class="ua4-art-biglabel">Данные проверены</div>
 <?php elseif($kind==='report'):?>
  <div class="ua4-report-card"><div class="ua4-report-heading">ОТЧЁТ</div><div class="ua4-report-bars"><i></i><i></i><i></i><i></i><i></i></div><div class="ua4-report-footer"><span></span><span></span></div></div>
 <?php elseif($kind==='search'):?>
  <div class="ua4-search-input"><span class="ua4-search-icon">⌕</span><strong>Нужная услуга</strong></div><div class="ua4-search-result"><b>Страница вашей услуги</b><i></i><i></i></div>
 <?php elseif($kind==='website'):?>
  <div class="ua4-webpage"><div class="ua4-browser-top"><i></i><i></i><i></i></div><div class="ua4-webpage-body"><strong>Понятное предложение</strong><i></i><i></i><span>Подробнее ↗</span></div></div>
 <?php elseif($kind==='contact'):?>
  <div class="ua4-mail-icon"><svg viewBox="0 0 80 80"><rect x="10" y="19" width="60" height="43" rx="8"/><path d="m14 26 26 21 26-21"/></svg><b>✓</b></div><div class="ua4-art-biglabel">Заявка</div>
 <?php endif;?>
 </div>
 <?php }

function mrseo_render_ru4_visual($slug,$variant) {
 if(mrseo_locale()!=='ru'||!in_array($variant,array('journey','plan'),true))return;
 $page=mrseo_ru4_data($slug);
 if(!$page)return;
 $p=$page[$variant];
 $id='ru4-'.str_replace('-','',$slug).'-'.$variant;
 ?>
 <section class="ua4-section ua4-section--<?php echo esc_attr($slug);?> ua4-section--<?php echo esc_attr($variant);?>" aria-labelledby="<?php echo esc_attr($id);?>-title">
  <div class="container">
   <header class="ua4-heading">
    <div><span class="ua4-eyebrow"><?php echo esc_html($p['eyebrow']);?></span><h2 id="<?php echo esc_attr($id);?>-title"><?php echo esc_html($p['heading'][0]);?> <em><?php echo esc_html($p['heading'][1]);?></em></h2></div>
    <p><?php echo esc_html($p['lead']);?></p>
   </header>
   <?php if($variant==='journey'):?>
   <ol class="ua4-journey">
    <?php foreach($p['steps'] as $i=>$step):?>
    <li class="ua4-journey-card">
     <span class="ua4-count"><?php echo esc_html(sprintf('%02d',$i+1));?> / <?php echo esc_html($step[0]);?></span>
     <?php mrseo_ru4_art($step[3]);?>
     <h3><?php echo esc_html($step[1]);?></h3><p><?php echo esc_html($step[2]);?></p>
    </li>
    <?php endforeach;?>
   </ol>
   <?php else:?>
   <div class="ua4-plan">
    <div class="ua4-plan-illustration ua4-plan-illustration--<?php echo esc_attr($p['type']);?>" aria-hidden="true">
     <div class="ua4-plan-sheet"><div class="ua4-plan-sheet-head"><span class="ua4-plan-star">✳</span><strong><?php echo esc_html($p['artTitle']);?></strong></div>
      <?php for($i=0;$i<3;$i++):?><div class="ua4-plan-sheet-row"><span>✓</span><i></i></div><?php endfor;?>
     </div>
     <div class="ua4-plan-symbol"><?php echo esc_html(array('catalog'=>'▦','analytics'=>'◎','website'=>'▣','horoshop'=>'✳')[$p['type']]);?></div>
    </div>
    <div class="ua4-plan-content"><span class="ua4-eyebrow">ТРИ ПОНЯТНЫХ ШАГА</span>
     <?php foreach($p['steps'] as $i=>$step):?><div class="ua4-plan-step"><span><?php echo esc_html(sprintf('%02d',$i+1));?></span><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div></div><?php endforeach;?>
     <a class="ua4-plan-link" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($p['cta']);?><span aria-hidden="true">↗</span></a>
    </div>
   </div>
   <?php endif;?>
   <p class="ua4-disclaimer">Иллюстрация принципа работы, а не данные реального клиента или гарантия результата.</p>
  </div>
 </section>
 <?php
}
