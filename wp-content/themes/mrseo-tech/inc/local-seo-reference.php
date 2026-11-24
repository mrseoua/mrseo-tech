<?php
if(!defined('ABSPATH'))exit;
/** Reference marketing page; existing UA local SEO route and semantic H1/lead are rendered by premium-seo-cluster.php. */
// The lower illustrations are intentionally still: retain the original art, remove SMIL only for this page.
$local_static_art=static function($id){
 ob_start();mrseo_psc_art($id);$svg=ob_get_clean();
 $svg=preg_replace('~<(?:animate|animateMotion|animateTransform|set)\\b[^>]*?/>~i','',$svg);
 $svg=preg_replace('~<(animate|animateMotion|animateTransform|set)\\b[^>]*>.*?</\\1>~is','',$svg);
 echo str_replace('class="psc-motion"','class="local-reference-static"',$svg);
};
$local_problems=array(
 array('Конкуренти помітніші в Google Maps','Клієнти шукають ваші послуги поблизу, але бачать інші компанії.','З’ясовуємо, за якими місцевими запитами вас не видно, порівнюємо профілі конкурентів і визначаємо пріоритети просування.'),
 array('Профіль компанії не переконує клієнтів','Неактуальні години роботи, мало інформації про послуги або незрозумілі контакти.','Уточнюємо категорії, послуги, опис, адресу, фотографії та інші доступні дані профілю.'),
 array('Люди знаходять вас, але не звертаються','На сайті незручно записатися, зателефонувати чи прокласти маршрут.','Перевіряємо мобільні сторінки послуг, кнопки зв’язку та шлях до звернення. Погоджуємо потрібні зміни.')
);
$local_work=array(
 array('01','Пошуковий попит','Аналізуємо локальні запити, конкурентів і видимість у Google та на Картах. Визначаємо послуги й райони, де є реальний попит.'),
 array('02','Google Business Profile','Оптимізуємо доступні поля профілю компанії, перевіряємо відповідність інформації на сайті та даємо рекомендації щодо роботи з відгуками.'),
 array('03','Сайт і місцеві сторінки','Покращуємо SEO наявних сторінок послуг, заголовки, локальні посадкові сторінки та контакти. Нові сторінки — за підтвердженим попитом і погодженим обсягом.')
);
?>
<section class="local-ref-position-section" id="local-seo-approach" aria-labelledby="local-ref-position-title">
 <div class="pti-wrap">
  <article class="local-ref-position" >
   <span class="pti-kicker">МИ НЕ ТИПОВА SEO-АГЕНЦІЯ</span>
   <h2 id="local-ref-position-title">Ви наймаєте фахівців,<br><em>а не продавців обіцянок.</em></h2>
   <div class="local-ref-position-grid">
    <div class="local-ref-position-item"><span class="local-ref-position-no" aria-hidden="true">01 /</span><h3>Не виставляємо рахунки на тисячі доларів лише тому, що можемо.</h3><p>Вартість визначає реальний обсяг роботи, а не амбіції агенції.</p></div>
    <div class="local-ref-position-item"><span class="local-ref-position-no" aria-hidden="true">02 /</span><h3>Дорогі звіти ще не зробили жоден бізнес успішним.</h3><p>Не підміняємо роботу красивими графіками та показниками, які не мають цінності для вашого бізнесу.</p></div>
    <div class="local-ref-position-item"><span class="local-ref-position-no" aria-hidden="true">03 /</span><h3>Не заробляємо на вашому незнанні.</h3><p>Не нав’язуємо зайвих послуг і не прикриваємося складними термінами, щоб виправдати високу вартість.</p></div>
   </div>
   <div class="local-ref-position-close"><p class="local-ref-position-motto">Без пафосу. Без переплат. <em>По суті.</em></p><p>Ми зацікавлені не в тому, щоб ви більше платили, а в тому, щоб ви більше заробляли.</p></div>
  </article>
 </div>
</section>
<section class="pti-section psc-problems local-ref-problems" id="<?php echo esc_attr($psc_problem_id);?>" aria-labelledby="psc-problem-title">
 <div class="pti-wrap">
  <div class="pti-section-head"><div><span class="pti-kicker">01 / ВПІЗНАЄТЕ СВОЮ СИТУАЦІЮ?</span><h2 id="psc-problem-title">Чому місцеві клієнти <em>обирають інших?</em></h2></div><p>Видимість у пошуку — лише початок. Важливо, щоб люди могли знайти потрібну інформацію та легко звернутися.</p></div>
  <div class="local-ref-problem-list">
   <?php foreach($local_problems as $i=>$row):?>
    <article class="psc-problem-card local-ref-row">
     <div class="local-ref-mini"><?php $local_static_art($psc_art['problem'][$i]);?></div>
     <div class="local-ref-pain"><span class="local-ref-label">ПРОБЛЕМА <?php echo esc_html(sprintf('%02d',$i+1));?></span><h3><?php echo esc_html($row[0]);?></h3><p><?php echo esc_html($row[1]);?></p></div>
     <div class="local-ref-answer"><span class="local-ref-label">НАШЕ РІШЕННЯ</span><p><?php echo esc_html($row[2]);?></p></div>
    </article>
   <?php endforeach;?>
  </div>
 </div>
</section>
<section class="pti-section pti-alt psc-delivery local-ref-work" id="uws-solution" aria-labelledby="<?php echo esc_attr($psc_delivery_id);?>">
 <div class="pti-wrap">
  <div class="pti-section-head"><div><span class="pti-kicker">02 / КОНКРЕТНІ РОБОТИ</span><h2 id="<?php echo esc_attr($psc_delivery_id);?>">Що входить <em>у локальне SEO?</em></h2></div><p>Не універсальний пакет. Підбираємо роботи для вашого бізнесу, міста та стану сайту.</p></div>
  <div class="local-ref-work-grid">
   <?php foreach($local_work as $item):?>
    <article class="pti-step local-ref-work-card"><span class="local-ref-label"><?php echo esc_html($item[0]);?> / 03</span><h3><?php echo esc_html($item[1]);?></h3><p><?php echo esc_html($item[2]);?></p></article>
   <?php endforeach;?>
  </div>
 </div>
</section>
<section class="pti-section local-ref-outcome" aria-labelledby="local-reference-outcome">
 <div class="pti-wrap local-ref-outcome-grid">
  <div class="local-ref-result psc-result"><span class="pti-kicker">03 / РЕЗУЛЬТАТ І КОНТРОЛЬ</span><h2 id="local-reference-outcome">Ви бачите, <em>за що платите.</em></h2><p>На старті — список проблем і пріоритети. Після погоджених робіт — перелік внесених змін та звіт про доступні показники.</p><ul><li>Видимість за важливими локальними запитами.</li><li>Покази, переходи та доступні дії в профілі Google.</li><li>Звернення із сайту, якщо налаштовано їх облік.</li></ul><p class="local-ref-small">Порівнюємо зміни з вихідними даними. Позиції залежать також від відстані, конкуренції та алгоритмів Google.</p></div>
  <div class="local-ref-terms"><span class="pti-kicker">04 / УМОВИ СПІВПРАЦІ</span><h2>Зрозумілий старт.</h2><ol><li><strong>З’ясовуємо, що потрібно.</strong> Враховуємо місто, послуги, стан сайту й профілю Google.</li><li><strong>Погоджуємо розумний бюджет.</strong> Обсяг робіт, вартість і строки відомі до початку.</li><li><strong>Працюємо та звітуємо.</strong> Показуємо конкретні зміни й доступні показники, не обіцяємо гарантованого ТОПу.</li></ol><p>Можна почати з окремої перевірки, без зобов’язання замовляти регулярне просування.</p></div>
 </div>
</section>
<section class="pti-section psc-faq-section local-ref-faq">
 <div class="pti-wrap pti-faq"><div><span class="pti-kicker">05 / ПЕРЕД ПОЧАТКОМ</span><h2 id="<?php echo esc_attr($psc_faq_id);?>">Коротко про <em>важливе.</em></h2></div>
 <div><?php foreach($psc['faq'] as $item):?><details><summary><?php echo esc_html($item[0]);?></summary><p><?php echo esc_html($item[1]);?></p></details><?php endforeach;?>
 <details><summary>Скільки коштує локальне SEO?</summary><p>Залежить від стану профілю, сайту, кількості локацій та конкуренції. Погоджуємо конкретний обсяг і вартість перед стартом.</p></details>
 <details><summary>Коли можна очікувати зміни?</summary><p>Строк залежить від стану сайту й профілю, конкуренції та переобробки даних Google. Спочатку фіксуємо вихідні показники, потім оцінюємо динаміку після робіт.</p></details></div>
 </div>
</section>
<section class="pti-final psc-final local-ref-final" aria-labelledby="<?php echo esc_attr($psc_final_id);?>">
 <div class="pti-wrap"><div class="local-ref-final-card">
  <div><span class="pti-kicker">ПЕРШИЙ КРОК</span><h2 id="<?php echo esc_attr($psc_final_id);?>">Вас мають знаходити <em>у вашому місті.</em></h2><p>Надішліть назву бізнесу, місто та посилання на сайт або профіль Google. Обговоримо, що заважає отримувати більше місцевих звернень.</p></div>
  <div class="local-ref-final-action"><a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>">Обговорити просування ↗</a><p>Умови погоджуємо до початку робіт.</p></div>
 </div>
 <nav class="psc-seo-related" aria-label="Суміжні SEO-послуги"><a href="<?php echo esc_url(mrseo_url('seo','uk'));?>">Усі напрями SEO ↗</a><a href="<?php echo esc_url(mrseo_url('service-business-seo','uk'));?>">SEO сайтів послуг ↗</a></nav>
 </div>
</section>
