<?php
/**
 * Ukrainian SEO service — two calm, illustrated explanations.
 * No invented client results, fake dashboards, remote assets or scripts.
 */
if (!defined('ABSPATH')) exit;

function mrseo_render_ua_seo_visual($variant) {
 if ($variant === 'journey') { ?>
<section class="ukseo-visual-story ukseo-visual-story--journey" aria-labelledby="ukseo-journey-title">
 <div class="container">
  <div class="ukseo-visual-story-heading">
   <div><span class="ukseo-kicker">ЯК ПРАЦЮЄ SEO</span><h2 id="ukseo-journey-title">Від пошуку до звернення. <em>Без зайвих складнощів.</em></h2></div>
   <p>Допомагаємо людині знайти саме вашу пропозицію, зрозуміти її та зробити наступний крок.</p>
  </div>
  <ol class="ukseo-visual-journey" aria-label="Схематичний шлях від пошуку до звернення">
   <li class="ukseo-visual-stage">
    <span class="ukseo-visual-stage-label">01 / ПОШУК</span>
    <div class="ukseo-visual-art ukseo-visual-art--search" aria-hidden="true">
     <div class="ukseo-visual-search-bar">
      <svg viewBox="0 0 24 24" focusable="false"><circle cx="10.5" cy="10.5" r="6.2"/><path d="m15 15 5.5 5.5"/></svg>
      <span>Потрібна послуга</span>
     </div>
     <div class="ukseo-visual-search-result">
      <span>ЗНАЙДЕНА ВІДПОВІДЬ</span>
      <strong>Ваша послуга</strong>
      <i></i><i></i>
     </div>
    </div>
    <h3>Вас знаходять</h3>
    <p>Працюємо із запитами ваших потенційних клієнтів.</p>
   </li>
   <li class="ukseo-visual-stage">
    <span class="ukseo-visual-stage-label">02 / СТОРІНКА</span>
    <div class="ukseo-visual-art ukseo-visual-art--page" aria-hidden="true">
     <div class="ukseo-visual-page-bar"><i></i><i></i><i></i><span></span></div>
     <div class="ukseo-visual-page-content">
      <strong>Те, що шукав клієнт</strong>
      <span class="ukseo-visual-page-line"></span><span class="ukseo-visual-page-line short"></span>
      <span class="ukseo-visual-page-button">Дізнатися більше <b>↗</b></span>
     </div>
    </div>
    <h3>Розуміють пропозицію</h3>
    <p>Сторінка відповідає на запитання й допомагає обрати.</p>
   </li>
   <li class="ukseo-visual-stage">
    <span class="ukseo-visual-stage-label">03 / ЗВЕРНЕННЯ</span>
    <div class="ukseo-visual-art ukseo-visual-art--lead" aria-hidden="true">
     <div class="ukseo-visual-lead-icon">
      <svg viewBox="0 0 64 64" focusable="false"><rect x="11" y="15" width="42" height="34" rx="7"/><path d="m14 21 18 16 18-16"/></svg>
      <span class="ukseo-visual-lead-check">✓</span>
     </div>
     <strong>Заявка надіслана</strong>
     <span class="ukseo-visual-lead-caption">Приклад цільової дії</span>
    </div>
    <h3>Можуть звернутися</h3>
    <p>Робимо шлях до заявки зрозумілим і перевірюваним.</p>
   </li>
  </ol>
  <p class="ukseo-visual-disclaimer">Схема ілюструє підхід, а не результати конкретного проєкту.</p>
 </div>
</section>
<?php return; }

 if ($variant === 'priorities') { ?>
<section class="ukseo-visual-story ukseo-visual-story--priorities" aria-labelledby="ukseo-priorities-title">
 <div class="container">
  <div class="ukseo-visual-story-heading">
   <div><span class="ukseo-kicker">ЩО ОТРИМУЄ БІЗНЕС</span><h2 id="ukseo-priorities-title">Не сотня зауважень. <em>Зрозумілий план дій.</em></h2></div>
   <p>Ви знаєте, що заважає сайту, що робитимемо спочатку та як перевіримо зміни.</p>
  </div>
  <div class="ukseo-visual-priority-board">
   <div class="ukseo-visual-priority-illustration" aria-hidden="true">
    <div class="ukseo-visual-plan-sheet">
     <div class="ukseo-visual-plan-header">
      <span class="ukseo-visual-plan-mark">✳</span>
      <span>ПЛАН ДЛЯ САЙТУ</span>
     </div>
     <div class="ukseo-visual-plan-row"><span>✓</span><i></i></div>
     <div class="ukseo-visual-plan-row"><span>✓</span><i></i></div>
     <div class="ukseo-visual-plan-row"><span>✓</span><i></i></div>
    </div>
    <div class="ukseo-visual-plan-flair"><svg viewBox="0 0 80 80" focusable="false"><circle cx="33" cy="33" r="18"/><path d="m47 47 20 20"/></svg></div>
   </div>
   <div class="ukseo-visual-priority-content">
    <span class="ukseo-visual-priority-eyebrow">ТРИ РЕЧІ, ЯКІ БУДУТЬ ЗРОЗУМІЛІ</span>
    <div class="ukseo-visual-priority-steps">
     <div class="ukseo-visual-priority-step"><span class="ukseo-visual-step-num">01</span><div><strong>Де проблема</strong><p>Знаходимо причину, а не здогадуємося.</p></div></div>
     <div class="ukseo-visual-priority-step"><span class="ukseo-visual-step-num">02</span><div><strong>Що виправимо</strong><p>Узгоджуємо найважливіші зміни.</p></div></div>
     <div class="ukseo-visual-priority-step"><span class="ukseo-visual-step-num">03</span><div><strong>Як перевіримо</strong><p>Оцінюємо, що змінилося після роботи.</p></div></div>
    </div>
    <a class="ukseo-visual-priority-link" href="<?php echo esc_url(mrseo_url('contact')); ?>">Обговорити мій сайт <span aria-hidden="true">↗</span></a>
   </div>
  </div>
  <p class="ukseo-visual-disclaimer">Ілюстрація процесу. Обсяг робіт визначаємо після перевірки сайту.</p>
 </div>
</section>
<?php }
}
