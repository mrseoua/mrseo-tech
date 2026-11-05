<?php
/**
 * Ukrainian SEO service: two editorial visual explainers placed below the hero.
 * Diagrams are illustrative, not case studies, charts of actual results or
 * performance forecasts. No external assets, JS, personal data or tracking.
 */
if (!defined('ABSPATH')) exit;

function mrseo_render_ua_seo_visual($variant) {
 if ($variant === 'journey') { ?>
 <section class="ukseo-visual-story ukseo-visual-story--journey" aria-labelledby="ukseo-journey-title">
  <div class="container">
   <header class="ukseo-visual-story-heading">
    <div>
     <span class="ukseo-kicker">ВІД ПОШУКУ ДО ЗВЕРНЕННЯ</span>
     <h2 id="ukseo-journey-title">Людина має знайти <em>не просто сайт, а відповідь.</em></h2>
    </div>
    <p>Працюємо з усім маршрутом: від потреби клієнта до сторінки, яка пояснює пропозицію і веде до зрозумілої дії.</p>
   </header>

   <ol class="ukseo-visual-journey" aria-label="Схематичний шлях клієнта від пошуку до звернення">
    <li class="ukseo-visual-stage ukseo-visual-stage--search">
     <div class="ukseo-visual-stage-label"><b>01</b><span>ПОШУКОВИЙ ПОПИТ</span></div>
     <div class="ukseo-visual-browser">
      <div class="ukseo-visual-browser-bar"><span class="ukseo-visual-dots" aria-hidden="true"><i></i><i></i><i></i></span><small>ПОШУК</small></div>
      <div class="ukseo-visual-search-line"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="10.7" cy="10.7" r="6.2"/><path d="m15.5 15.5 5.1 5.1"/></svg><span>Потрібна конкретна послуга</span></div>
      <div class="ukseo-visual-serp">
       <span class="ukseo-visual-serp-tag">ВІДПОВІДЬ НА ЗАПИТ</span>
       <strong>Сторінка потрібної послуги</strong>
       <small>Відповідність наміру · зрозуміла пропозиція</small>
      </div>
      <div class="ukseo-visual-serp ukseo-visual-serp--muted" aria-hidden="true"><i></i><i></i></div>
     </div>
     <p>Знаходимо запити, за якими бізнесу справді важливо бути видимим.</p>
    </li>
    <li class="ukseo-visual-stage ukseo-visual-stage--site">
     <div class="ukseo-visual-stage-label"><b>02</b><span>ПОСАДКОВА СТОРІНКА</span></div>
     <div class="ukseo-visual-browser">
      <div class="ukseo-visual-browser-bar"><span class="ukseo-visual-dots" aria-hidden="true"><i></i><i></i><i></i></span><small>СТОРІНКА</small></div>
      <div class="ukseo-visual-site-header"><span>ВАША ПОСЛУГА</span><span aria-hidden="true">☰</span></div>
      <div class="ukseo-visual-site-hero">
       <strong>Чітко про те, що потрібно клієнту</strong>
       <small>Умови · Переваги · Довіра</small>
       <span class="ukseo-visual-site-cta">Дізнатись умови <span aria-hidden="true">↗</span></span>
      </div>
      <div class="ukseo-visual-site-tiles" aria-hidden="true"><i></i><i></i><i></i></div>
     </div>
     <p>Покращуємо структуру й зміст, щоб сторінка відповідала наміру, а не просто містила ключові слова.</p>
    </li>
    <li class="ukseo-visual-stage ukseo-visual-stage--lead">
     <div class="ukseo-visual-stage-label"><b>03</b><span>ПІДТВЕРДЖЕНА ДІЯ</span></div>
     <div class="ukseo-visual-lead">
      <div class="ukseo-visual-lead-icon" aria-hidden="true"><svg viewBox="0 0 32 32" focusable="false"><rect x="7" y="5" width="18" height="22" rx="3"/><path d="M11 12h10M11 17h10M11 22h6"/></svg></div>
      <span class="ukseo-visual-lead-kicker">ЦІЛЬОВА ДІЯ</span>
      <strong>Заявка, дзвінок або замовлення</strong>
      <div class="ukseo-visual-lead-signal"><span class="ukseo-visual-led" aria-hidden="true"></span>Подію можна перевірити</div>
      <div class="ukseo-visual-lead-meter" aria-hidden="true"><i></i><i></i><i></i></div>
     </div>
     <p>Відділяємо покази й кліки від звернень, які мають значення для бізнесу.</p>
    </li>
   </ol>
   <div class="ukseo-visual-disclaimer"><span aria-hidden="true">◎</span> Це схема логіки роботи, а не реальні дані клієнта чи обіцянка кількості звернень.</div>
  </div>
 </section>
 <?php return; }

 if ($variant === 'priorities') { ?>
 <section class="ukseo-visual-story ukseo-visual-story--priorities" aria-labelledby="ukseo-priorities-title">
  <div class="container">
   <header class="ukseo-visual-story-heading">
    <div>
     <span class="ukseo-kicker">ЯК ВИЗНАЧАЄМО ПРІОРИТЕТИ</span>
     <h2 id="ukseo-priorities-title">Не всі зміни однаково важливі. <em>Починаємо з обґрунтованих.</em></h2>
    </div>
    <p>Красиві графіки не замінять рішення. Пояснюємо, що перевіряємо, чому це важливо для пошукового попиту і за якою ознакою приймемо роботу.</p>
   </header>
   <div class="ukseo-visual-priority-board">
    <div class="ukseo-visual-priority-top">
     <span><span class="ukseo-visual-led" aria-hidden="true"></span> КАРТА РІШЕНЬ / ПРИКЛАД</span>
     <span>Проблема → дія → перевірка</span>
    </div>
    <div class="ukseo-visual-priority-layout">
     <div class="ukseo-visual-priority-tasks">
      <div class="ukseo-visual-task">
       <div class="ukseo-visual-task-top"><span>01 / ТЕХНІЧНИЙ БАР'ЄР</span><span class="ukseo-visual-task-marker">ПЕРШИЙ КРОК</span></div>
       <strong>Важлива сторінка недоступна для індексації</strong>
       <p>Перевірити причину, усунути обмеження, проконтролювати доступність.</p>
       <div class="ukseo-visual-task-trace"><span></span><span></span><span></span><span></span></div>
      </div>
      <div class="ukseo-visual-task">
       <div class="ukseo-visual-task-top"><span>02 / ВТРАЧЕНИЙ ПОПИТ</span><span class="ukseo-visual-task-marker">ПІСЛЯ ОЦІНКИ</span></div>
       <strong>Немає сторінки для важливого запиту</strong>
       <p>Підтвердити попит, визначити посадкову сторінку, узгодити структуру.</p>
       <div class="ukseo-visual-task-trace"><span></span><span></span><span></span><span></span></div>
      </div>
      <div class="ukseo-visual-task">
       <div class="ukseo-visual-task-top"><span>03 / КОНТРОЛЬ ДІЇ</span><span class="ukseo-visual-task-marker">ПЕРЕВІРКА</span></div>
       <strong>Звернення не вимірюється належним чином</strong>
       <p>Перевірити подію, підтвердження відправлення та якість даних.</p>
       <div class="ukseo-visual-task-trace"><span></span><span></span><span></span><span></span></div>
      </div>
     </div>
     <aside class="ukseo-visual-priority-aside" aria-label="Критерії виконаної роботи">
      <span class="ukseo-visual-aside-kicker">ЩО ВВАЖАЄМО РОБОТОЮ</span>
      <div class="ukseo-visual-review-step"><span class="ukseo-visual-review-symbol">✓</span><div><strong>Причину підтверджено</strong><p>Не лише припущення, а перевірені сигнали.</p></div></div>
      <div class="ukseo-visual-review-step"><span class="ukseo-visual-review-symbol">↗</span><div><strong>Зміну впроваджено</strong><p>Конкретна правка або погоджене завдання.</p></div></div>
      <div class="ukseo-visual-review-step"><span class="ukseo-visual-review-symbol">◎</span><div><strong>Ефект перевіряємо</strong><p>Покази, кліки, індексація та звернення за потреби.</p></div></div>
      <div class="ukseo-visual-review-foot">Рішення мають бути прозорими для бізнесу.</div>
     </aside>
    </div>
   </div>
   <div class="ukseo-visual-disclaimer"><span aria-hidden="true">◎</span> Показано приклад формату пріоритизації. Послідовність у реальному проєкті визначаємо після діагностики.</div>
  </div>
 </section>
 <?php }
}
