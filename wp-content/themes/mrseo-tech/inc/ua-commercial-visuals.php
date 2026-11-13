<?php
/**
 * Clear, premium Ukrainian service illustrations for Google Ads and
 * Web Development. Illustrations demonstrate our methods, never client
 * case studies, guaranteed performance, live data or invented outcomes.
 */
if (!defined('ABSPATH')) exit;

function mrseo_render_ua_commercial_visual($service, $variant) {
 if ($service === 'google-ads' && $variant === 'journey') { ?>
<section class="ua-sv ua-sv--ads-journey" aria-labelledby="ua-sv-ads-journey-title">
 <div class="container">
  <header class="ua-sv-heading">
   <div><span class="ua-sv-eyebrow">ЯК РЕКЛАМА ПРАЦЮЄ ДЛЯ БІЗНЕСУ</span>
    <h2 id="ua-sv-ads-journey-title">Важливі не кліки. <em>Важливі звернення.</em></h2></div>
   <p>Зв’язуємо рекламу з діями клієнтів, щоб рішення про бюджет спиралися на перевірені дані.</p>
  </header>
  <ol class="ua-sv-steps ua-sv-steps--ads">
   <li class="ua-sv-step">
    <span class="ua-sv-step-index">01 / ОГОЛОШЕННЯ</span>
    <div class="ua-sv-art ua-sv-art--ad" aria-hidden="true">
     <div class="ua-sv-ad-card"><span class="ua-sv-ad-tag">Реклама в Google</span>
      <strong>Знайдіть те, що шукаєте</strong>
      <span class="ua-sv-ad-line"></span><span class="ua-sv-ad-line short"></span>
      <span class="ua-sv-ad-action">Перейти на сайт <b>↗</b></span>
     </div>
    </div>
    <h3>Залучаємо потрібних людей</h3>
    <p>Обираємо запити, товари й аудиторії відповідно до цілей бізнесу.</p>
   </li>
   <li class="ua-sv-step">
    <span class="ua-sv-step-index">02 / САЙТ</span>
    <div class="ua-sv-art ua-sv-art--site" aria-hidden="true">
     <div class="ua-sv-site-window">
      <div class="ua-sv-browser-dots"><i></i><i></i><i></i></div>
      <div class="ua-sv-site-product"><span>ВАША ПРОПОЗИЦІЯ</span><strong>Товар або послуга</strong>
       <i></i><span class="ua-sv-site-cta">Оформити запит <b>↗</b></span></div>
     </div>
    </div>
    <h3>Допомагаємо зробити вибір</h3>
    <p>Перевіряємо, чи сторінка відповідає очікуванням від реклами.</p>
   </li>
   <li class="ua-sv-step">
    <span class="ua-sv-step-index">03 / КОНВЕРСІЯ</span>
    <div class="ua-sv-art ua-sv-art--conversion" aria-hidden="true">
     <div class="ua-sv-success-icon"><svg viewBox="0 0 64 64" focusable="false"><path d="M15 34l12 12 23-27"/></svg></div>
     <strong>Дію зафіксовано</strong><span>Заявка, дзвінок чи покупка</span>
    </div>
    <h3>Бачимо цінні дії</h3>
    <p>Перевіряємо відстеження, щоб не плутати кліки з результатом.</p>
   </li>
  </ol>
  <p class="ua-sv-note">Схематичний приклад, не дані рекламного акаунта або гарантія кількості заявок.</p>
 </div>
</section>
<?php return; }

 if ($service === 'google-ads' && $variant === 'decisions') { ?>
<section class="ua-sv ua-sv--ads-decisions" aria-labelledby="ua-sv-ads-plan-title">
 <div class="container">
  <header class="ua-sv-heading">
   <div><span class="ua-sv-eyebrow">КОНТРОЛЬ БЮДЖЕТУ</span>
    <h2 id="ua-sv-ads-plan-title">Кожна гривня має <em>зрозумілу мету.</em></h2></div>
   <p>Не змінюємо кампанії навмання: спочатку перевіряємо дані, далі визначаємо пріоритети.</p>
  </header>
  <div class="ua-sv-spotlight">
   <div class="ua-sv-spotlight-art ua-sv-spotlight-art--ads" aria-hidden="true">
    <div class="ua-sv-budget-circle"><div class="ua-sv-budget-currency">₴</div><span>РЕКЛАМНИЙ БЮДЖЕТ</span></div>
    <div class="ua-sv-budget-branches"><span><b>↗</b> Попит</span><span><b>◎</b> Товари</span><span><b>✓</b> Дії</span></div>
   </div>
   <div class="ua-sv-spotlight-copy">
    <span class="ua-sv-eyebrow">ПРОСТИЙ ПЛАН</span>
    <div class="ua-sv-list">
     <div><span>01</span><div><strong>Перевіряємо дані</strong><p>Чи правильно враховані покупки й звернення.</p></div></div>
     <div><span>02</span><div><strong>Визначаємо пріоритети</strong><p>Що варто рекламувати, а що потребує змін.</p></div></div>
     <div><span>03</span><div><strong>Контролюємо витрати</strong><p>Оцінюємо рішення з урахуванням цілей і маржі.</p></div></div>
    </div>
    <a class="ua-sv-link" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити мою рекламу <span aria-hidden="true">↗</span></a>
   </div>
  </div>
  <p class="ua-sv-note">Візуалізація підходу. Результати та бюджет залежать від бізнесу й даних кампаній.</p>
 </div>
</section>
<?php return; }

 if ($service === 'web-development' && $variant === 'connections') { ?>
<section class="ua-sv ua-sv--dev-connections" aria-labelledby="ua-sv-dev-flow-title">
 <div class="dev-wrap">
  <header class="ua-sv-heading">
   <div><span class="ua-sv-eyebrow">КОЛИ СИСТЕМИ НЕ ПРАЦЮЮТЬ РАЗОМ</span>
    <h2 id="ua-sv-dev-flow-title">З’єднуємо інструменти. <em>Прибираємо ручну роботу.</em></h2></div>
   <p>Сайт, CRM та облік можуть працювати як одна система — якщо інтеграція потрібна й технічно можлива.</p>
  </header>
  <div class="ua-sv-dev-diagram pdi-integration" role="img" aria-label="Сайт передає заявки через інтеграцію до CRM та обліку">
 <div class="pdi-system"><div class="pdi-system-screen"><div class="pdi-window-top"><i></i><i></i><i></i><span>САЙТ</span></div><div class="pdi-web-body"><div><b></b><i></i><i></i><em></em></div><div class="pdi-web-tile"><svg viewBox="0 0 60 60" aria-hidden="true"><path d="M12 14h8l6 24h22l5-17H22" fill="none" stroke="#a34b36" stroke-width="3" stroke-linecap="round"/><circle cx="30" cy="46" r="4" fill="#a34b36"/><circle cx="46" cy="46" r="4" fill="#a34b36"/></svg></div></div><div class="pdi-site-order">✓ Заявка</div></div><strong>Сайт</strong><small>Заявки та замовлення</small></div>
 <div class="pdi-wire" aria-hidden="true"><i></i><b></b></div>
 <div class="pdi-system pdi-system-api"><div class="pdi-api-object"><svg viewBox="0 0 100 100" aria-hidden="true"><path d="m35 32-20 18 20 18m30-36 20 18-20 18M57 24 43 76" fill="none" stroke="#fff3e3" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/></svg><span>API</span></div><strong>Інтеграція</strong><small>Передача даних</small></div>
 <div class="pdi-wire" aria-hidden="true"><i></i><b></b></div>
 <div class="pdi-system"><div class="pdi-system-screen"><div class="pdi-window-top"><i></i><i></i><i></i><span>CRM</span></div><div class="pdi-crm"><div><b></b><i></i><i></i></div><div><b></b><i></i></div><div><b></b><i></i><i></i></div></div><div class="pdi-site-order">✓ Статус</div></div><strong>CRM та облік</strong><small>Робота команди</small></div>
 </div>
  <div class="ua-sv-dev-points">
   <div><span>01</span><strong>Менше дублювання</strong><p>Не потрібно повторно вводити одні й ті самі дані, якщо системи це дозволяють.</p></div>
   <div><span>02</span><strong>Зрозумілі процеси</strong><p>Статуси, ролі та відповідальність узгоджені до розробки.</p></div>
   <div><span>03</span><strong>Контроль помилок</strong><p>Перевіряємо обмін даними, доступи й обробку збоїв.</p></div>
  </div>
  <p class="ua-sv-note">Умовна схема інтеграції; реальна архітектура залежить від API, доступів і вимог.</p>
 </div>
</section>
<?php return; }

 if ($service === 'web-development' && $variant === 'build') { ?>
<section class="ua-sv ua-sv--dev-build" aria-labelledby="ua-sv-dev-build-title">
 <div class="dev-wrap">
  <header class="ua-sv-heading">
   <div><span class="ua-sv-eyebrow">ВІД ЗАДАЧІ ДО РОБОЧОГО ПРОДУКТУ</span>
    <h2 id="ua-sv-dev-build-title">Спочатку логіка. <em>Потім красивий інтерфейс.</em></h2></div>
   <p>Показуємо, що саме створюємо, погоджуємо ключові сценарії та перевіряємо систему перед запуском.</p>
  </header>
  <div class="ua-sv-spotlight">
   <div class="ua-sv-spotlight-art ua-sv-spotlight-art--dev" aria-hidden="true">
    <div class="ua-sv-wireframe">
     <div class="ua-sv-browser-dots"><i></i><i></i><i></i></div>
     <div class="ua-sv-wireframe-title"></div><div class="ua-sv-wireframe-lines"><i></i><i></i></div>
     <div class="ua-sv-wireframe-tiles"><i></i><i></i><i></i></div>
    </div>
    <div class="ua-sv-build-arrow">→</div>
    <div class="ua-sv-finished">
     <div class="ua-sv-browser-dots"><i></i><i></i><i></i></div>
     <div class="ua-sv-finished-hero"><strong>Ваш продукт</strong><span>Просто. Зрозуміло. Зручно.</span></div>
     <div class="ua-sv-finished-tiles"><i></i><i></i><i></i></div>
    </div>
   </div>
   <div class="ua-sv-spotlight-copy">
    <span class="ua-sv-eyebrow">ТРИ ЕТАПИ</span>
    <div class="ua-sv-list">
     <div><span>01</span><div><strong>Розбираємо задачу</strong><p>Визначаємо користувачів, сценарії та обмеження.</p></div></div>
     <div><span>02</span><div><strong>Створюємо рішення</strong><p>Розробляємо й перевіряємо потрібні функції.</p></div></div>
     <div><span>03</span><div><strong>Передаємо результат</strong><p>Узгоджуємо запуск, документацію та підтримку.</p></div></div>
    </div>
    <a class="ua-sv-link" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити мій проєкт <span aria-hidden="true">↗</span></a>
   </div>
  </div>
  <p class="ua-sv-note">Ілюстрація робочого процесу, а не скриншот виконаного клієнтського проєкту.</p>
 </div>
</section>
<?php }
}
