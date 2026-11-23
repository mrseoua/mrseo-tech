<?php
/**
 * Unlisted concept route: Premium Tech SEO editorial design.
 * Deliberately no production SEO copy or global template modifications.
 */
if (!defined('ABSPATH')) exit;
add_action('wp_enqueue_scripts', static function () {
 wp_enqueue_style('mrseo-premium-seo-preview', get_template_directory_uri().'/assets/premium-seo-preview.css', array('mrseo-style'), '1.0.0');
 wp_enqueue_script('mrseo-premium-seo-preview', get_template_directory_uri().'/assets/premium-seo-preview.js', array(), '1.0.0', true);
},100);
get_header();
?>
<main class="psp" id="main-content">
 <div class="psp-shell">
  <div class="psp-top"><span class="psp-overline"><i></i> MRSEO / PREMIUM TECH CONCEPT</span><span class="psp-concept-label">ПРЕВ’Ю ДИЗАЙНУ · НЕ КОМЕРЦІЙНА СТОРІНКА</span></div>
  <section class="psp-hero" aria-labelledby="psp-head">
   <div class="psp-hero-copy">
    <nav class="psp-crumb" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url('')); ?>">Головна</a><span>/</span>SEO · Дизайн-концепція</nav>
    <p class="psp-kicker">01 / ПОШУКОВЕ ПРОСУВАННЯ</p>
    <h1 id="psp-head">Клієнти шукають у Google. <em>А знаходять конкурентів?</em></h1>
    <p class="psp-lead">SEO-просування сайту допомагає клієнтам знаходити ваші послуги в Google. Перевіримо пошуковий попит, структуру й технічні проблеми, погодимо пріоритети SEO-оптимізації та перевіримо результат.</p>
    <div class="psp-actions"><a class="psp-btn psp-btn--dark" href="<?php echo esc_url(mrseo_url('contact')); ?>">Розібрати проблему мого сайту <span>↗</span></a><a class="psp-link" href="#psp-problems">Що саме перевіряємо <span>↓</span></a></div>
    <p class="psp-hero-foot"><span class="psp-tick">✳</span> Без обіцянок ТОП-3. З конкретними діями та перевіркою результату.</p>
   </div>
   <div class="psp-hero-visual">
    <div class="psp-dashboard" aria-label="Демонстраційна SEO-анімація: попит, сторінка та перевірка результату">
     <div class="psp-dashboard-head"><span class="psp-browser-dots"><i></i><i></i><i></i></span><span>MRSEO / SEARCH INTELLIGENCE</span><b>● DEMO</b></div>
     <div class="psp-dashboard-inner">
      <div class="psp-dashboard-title"><span>ПОШУКОВИЙ ЗАПИТ</span><b>01 — 03</b></div>
      <div class="psp-search"><span class="psp-search-icon">⌕</span><strong id="psp-query" aria-live="off">ремонт кавомашин у Києві</strong><span class="psp-caret" aria-hidden="true"></span></div>
      <div class="psp-dashboard-layout">
       <div class="psp-serp"><span class="psp-serp-kicker">ПОШУКОВА ВИДАЧА · ПРИКЛАД</span>
        <div class="psp-result psp-result--primary"><small>site.example / послуги / ремонт</small><strong>Ремонт кавомашин — опис послуги</strong><span></span><span></span><span></span></div>
        <div class="psp-result psp-result--faded"><small>site.example / послуги</small><strong>Послуги компанії</strong><span></span><span></span></div>
        <div class="psp-scan-line" aria-hidden="true"></div>
       </div>
       <div class="psp-diagnostics"><span class="psp-diag-kicker">SEO / ПЕРЕВІРКА</span>
        <div class="psp-diag-row" data-n="0"><span>01</span><b>Пошуковий попит</b><i>✓</i></div>
        <div class="psp-diag-row" data-n="1"><span>02</span><b>Сторінка послуги</b><i>✓</i></div>
        <div class="psp-diag-row" data-n="2"><span>03</span><b>Доступність</b><i>✓</i></div>
        <div class="psp-diag-viz"><span>ПОСЛІДОВНІСТЬ ПЕРЕВІРОК</span><div class="psp-bars" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div></div>
       </div>
      </div>
     </div>
     <div class="psp-dashboard-foot"><span><i></i> ПОПИТ → СТОРІНКА → ПЕРЕВІРКА</span><b>ІЛЮСТРАЦІЯ, НЕ РЕЗУЛЬТАТИ КЛІЄНТА</b></div>
    </div>
    <div class="psp-scene-controls"><div class="psp-tabs" role="group" aria-label="Етапи SEO"><button type="button" class="is-active" data-psp-step="0" aria-pressed="true">01 Попит</button><button type="button" data-psp-step="1" aria-pressed="false">02 Сторінка</button><button type="button" data-psp-step="2" aria-pressed="false">03 Перевірка</button></div><button type="button" class="psp-motion-toggle" aria-pressed="false">Пауза <span>Ⅱ</span></button></div>
    <p class="psp-visual-caption" id="psp-scene-caption">Визначаємо, які саме запити приводять потенційних клієнтів.</p>
   </div>
  </section>
 </div>
 <section class="psp-problems" id="psp-problems"><div class="psp-shell">
   <div class="psp-section-head"><div><p class="psp-kicker">02 / ЯКІ ПРОБЛЕМИ ВИРІШУЄМО</p><h2>Де бізнес втрачає <em>клієнтів із Google?</em></h2></div><p>Починаємо не зі списку незрозумілих SEO-термінів, а з реальних причин, через які сайт не допомагає продажам.</p></div>
   <div class="psp-problem-grid">
    <article class="psp-problem"><span>01 / ВИДИМІСТЬ</span><div class="psp-problem-symbol" aria-hidden="true"><span class="psp-small-scan"></span><i>⌕</i></div><h3>Важливі сторінки не знаходять у Google</h3><p>Послуга є на сайті, але люди майже не бачать її сторінку серед результатів Google.</p><div class="psp-what"><b>Що перевіримо</b><span>Індексацію та технічні перешкоди</span></div></article>
    <article class="psp-problem"><span>02 / ПОПИТ</span><div class="psp-problem-symbol psp-problem-symbol--cluster" aria-hidden="true"><i>◯</i><i>◯</i><i>◯</i></div><h3>Клієнти шукають те, чого немає на сайті</h3><p>Покупці шукають конкретні послуги, бренди чи характеристики, а конкуренти мають під них окремі сторінки.</p><div class="psp-what"><b>Що перевіримо</b><span>Попит і відповідність сторінок запитам</span></div></article>
    <article class="psp-problem"><span>03 / ЗВЕРНЕННЯ</span><div class="psp-problem-symbol psp-problem-symbol--form" aria-hidden="true"><i></i><i></i><i>↗</i></div><h3>Переходи є, а заявок немає</h3><p>Сторінка отримує переходи, проте не пояснює пропозицію, не знімає сумніви або не веде до заявки.</p><div class="psp-what"><b>Що перевіримо</b><span>Зміст, контакти й шлях до звернення</span></div></article>
   </div>
 </div></section>
 <section class="psp-method"><div class="psp-shell psp-method-grid"><div><p class="psp-kicker">03 / ЯК ПРАЦЮЄМО</p><h2>Не сотня зауважень. <em>Зрозумілий план дій.</em></h2><p>Спочатку визначаємо, що заважає сайту. Потім погоджуємо пріоритети, впроваджуємо узгоджені зміни й перевіряємо результат. Аудит і впровадження — різні етапи роботи.</p><a class="psp-link" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити свій сайт ↗</a></div>
  <div class="psp-method-panel" aria-label="Приклад результату SEO-діагностики"><div class="psp-method-panel-head"><span>MRSEO / ПЛАН РОБОТИ</span><span>ПРИКЛАД</span></div><div><small>01 / ПРОБЛЕМА</small><strong>Сторінки не потрапляють у пошук</strong></div><div><small>02 / РІШЕННЯ</small><strong>Перелік причин і пріоритетні виправлення</strong></div><div><small>03 / ПЕРЕВІРКА</small><strong>Контроль доступності та пошукових сигналів</strong></div><p>Конкретні завдання, а не гарантія позицій або заявок.</p></div>
 </div></section>
 <section class="psp-trust"><div class="psp-shell"><div class="psp-section-head"><div><p class="psp-kicker">04 / ЧОМУ MRSEO</p><h2>Сильна експертиза. <em>Без зайвого пафосу.</em></h2></div><p>Невелика команда спеціалістів із приблизно 10-річним досвідом. Пояснюємо складні речі зрозуміло та беремося за задачі, де можемо принести практичну користь.</p></div><div class="psp-trust-row"><div><b>01</b><strong>Спеціалізація</strong><p>SEO, Google Ads, аналітика та розробка.</p></div><div><b>02</b><strong>Прозорий процес</strong><p>Погоджені дії, пріоритети та перевірка виконання.</p></div><div><b>03</b><strong>Без вигаданих цифр</strong><p>Не підмінюємо результати клієнтів красивими демо-графіками.</p></div></div></div></section>
 <section class="psp-cta"><div class="psp-shell psp-cta-grid"><div><p class="psp-kicker">05 / ПЕРШИЙ КРОК</p><h2>Сайт є. <em>А клієнти?</em></h2><p>Опишіть вашу задачу — визначимо, із чого варто почати перевірку.</p></div><a class="psp-btn psp-btn--light" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити проблему <span>↗</span></a></div></section>
</main>
<?php get_footer(); ?>
