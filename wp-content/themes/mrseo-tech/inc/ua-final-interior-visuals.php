<?php
/**
 * Final Ukrainian-only interior polish.
 * Two service stories for SEO audit and PMax + three editorial/support visuals.
 * All figures are illustrative; do not imply client performance or guarantee outcomes.
 */
if (!defined('ABSPATH')) exit;
require_once get_template_directory().'/inc/ua-four-service-visuals.php';

function mrseo_ua_final_service_copy($slug) {
 $copy=array(
  'seo-audit'=>array(
   'journey'=>array(
    'eyebrow'=>'ЯК ЗНАХОДИМО ПРИЧИНУ',
    'heading'=>array('Не просто помилка.','Зрозуміле завдання для виправлення.'),
    'lead'=>'Перевіряємо конкретні сторінки, відділяємо симптоми від причин і пояснюємо наступний крок.',
    'steps'=>array(
     array('СТОРІНКА','Знаходимо симптом','Важливий URL зник із пошуку або працює неправильно.','website'),
     array('ПЕРЕВІРКА','Підтверджуємо причину','Аналізуємо сигнали, посилання та технічні обмеження.','verify'),
     array('ЗАВДАННЯ','Даємо план дій','Фіксуємо, що виправити й як прийняти результат.','report'))),
   'plan'=>array(
    'eyebrow'=>'АУДИТ, ЯКИЙ МОЖНА ВИКОРИСТАТИ',
    'heading'=>array('Менше технічного шуму.','Більше конкретних пріоритетів.'),
    'lead'=>'Помилки мають різний вплив. Важливо знати, що виправляти насамперед і чому.',
    'type'=>'audit','artTitle'=>'План технічних змін',
    'steps'=>array(
     array('Показуємо приклади URL','На яких сторінках і як проявляється проблема.'),
     array('Визначаємо пріоритет','Враховуємо цінність сторінки, ризик і складність.'),
     array('Перевіряємо виправлення','Повторна перевірка сигналів і доступності URL.')),
    'cta'=>'Обговорити SEO-аудит')),
  'performance-max'=>array(
   'journey'=>array(
    'eyebrow'=>'PMax / ТОВАРИ ТА ЕКОНОМІКА',
    'heading'=>array('Бачимо не лише витрати.','Розуміємо, що рекламуємо.'),
    'lead'=>'Перевіряємо товарні дані й вимірювання покупок перед рішеннями про бюджет.',
    'steps'=>array(
     array('ТОВАРИ','Перевіряємо каталог','Назви, ціни, наявність та якість товарного фіда.','feed'),
     array('СТРУКТУРА','Визначаємо пріоритети','Оцінюємо асортимент з урахуванням маржі та попиту.','filters'),
     array('ДАНІ','Перевіряємо покупки','Відрізняємо реальні сигнали від помилок у звітах.','report'))),
   'plan'=>array(
    'eyebrow'=>'КОНТРОЛЬ АВТОМАТИЗОВАНОЇ РЕКЛАМИ',
    'heading'=>array('Автоматизація допомагає.','Стратегія залишається за бізнесом.'),
    'lead'=>'Не розділяємо кампанії без достатніх даних: зміни мають економічне обґрунтування.',
    'type'=>'pmax','artTitle'=>'Пріоритети реклами',
    'steps'=>array(
     array('Перевіряємо основу','Дані Merchant Center, події та цінність покупок.'),
     array('Обираємо тест','Узгоджуємо зміни без поспішних перезапусків.'),
     array('Оцінюємо за даними','Враховуємо затримки конверсій та різницю в маржі.')),
    'cta'=>'Обговорити Performance Max'))
 );
 return $copy[$slug]??null;
}

function mrseo_render_ua_final_service($slug,$variant) {
 if(mrseo_locale()!=='uk'||!in_array($variant,array('journey','plan'),true))return;
 $set=mrseo_ua_final_service_copy($slug);
 if(!$set)return;
 $p=$set[$variant];
 $id='uaf-'.str_replace('-','',$slug).'-'.$variant;
 ?>
 <section class="ua4-section ua4-section--final-<?php echo esc_attr($slug);?> ua4-section--<?php echo esc_attr($variant);?>" aria-labelledby="<?php echo esc_attr($id);?>">
  <div class="container">
   <header class="ua4-heading">
    <div><span class="ua4-eyebrow"><?php echo esc_html($p['eyebrow']);?></span>
     <h2 id="<?php echo esc_attr($id);?>"><?php echo esc_html($p['heading'][0]);?> <em><?php echo esc_html($p['heading'][1]);?></em></h2></div>
    <p><?php echo esc_html($p['lead']);?></p>
   </header>
   <?php if($variant==='journey'):?>
   <ol class="ua4-journey">
    <?php foreach($p['steps'] as $i=>$step):?>
     <li class="ua4-journey-card">
      <span class="ua4-count"><?php echo esc_html(sprintf('%02d',$i+1));?> / <?php echo esc_html($step[0]);?></span>
      <?php mrseo_ua4_draw_art($step[3]);?>
      <h3><?php echo esc_html($step[1]);?></h3><p><?php echo esc_html($step[2]);?></p>
     </li>
    <?php endforeach;?>
   </ol>
   <?php else:?>
   <div class="ua4-plan">
    <div class="ua4-plan-illustration ua4-plan-illustration--<?php echo esc_attr($p['type']);?>" aria-hidden="true">
     <div class="ua4-plan-sheet">
      <div class="ua4-plan-sheet-head"><span class="ua4-plan-star">✳</span><strong><?php echo esc_html($p['artTitle']);?></strong></div>
      <div class="ua4-plan-sheet-row"><span>✓</span><i></i></div>
      <div class="ua4-plan-sheet-row"><span>✓</span><i></i></div>
      <div class="ua4-plan-sheet-row"><span>✓</span><i></i></div>
     </div>
     <div class="ua4-plan-symbol"><?php echo esc_html($p['type']==='audit'?'⌕':'◎');?></div>
    </div>
    <div class="ua4-plan-content">
     <span class="ua4-eyebrow">ТРИ ЗРОЗУМІЛІ КРОКИ</span>
     <?php foreach($p['steps'] as $i=>$step):?>
      <div class="ua4-plan-step"><span><?php echo esc_html(sprintf('%02d',$i+1));?></span><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div></div>
     <?php endforeach;?>
     <a class="ua4-plan-link" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($p['cta']);?><span aria-hidden="true">↗</span></a>
    </div>
   </div>
   <?php endif;?>
   <p class="ua4-disclaimer">Схема показує підхід. Не містить даних клієнтів або гарантованих результатів.</p>
  </div>
 </section>
 <?php
}

/** Ukrainian About page: complementary capabilities presented once, not more method text. */
function mrseo_render_ua_about_visual() {
 if(mrseo_locale()!=='uk')return;
 ?>
 <section class="uaf-story uaf-story--about" aria-labelledby="uaf-about-heading">
  <div class="container">
   <div class="uaf-heading"><div><span class="uaf-eyebrow">СПІЛЬНА РОБОТА НАД ОДНІЄЮ ЗАДАЧЕЮ</span><h2 id="uaf-about-heading">Сайт, реклама й аналітика. <em>Не окремо одне від одного.</em></h2></div>
    <p>Рішення в одній сфері може впливати на іншу. Тому дивимося на задачу бізнесу цілісно.</p></div>
   <div class="uaf-capability-card">
    <div class="uaf-network" role="img" aria-label="Візуальна схема: SEO, реклама, дані та розробка пов'язані з бізнесовою задачею">
     <div class="uaf-network-center"><span>ВАША ЗАДАЧА</span><strong>Знайти рішення</strong></div>
     <div class="uaf-network-satellite uaf-network-satellite--seo">SEO</div>
     <div class="uaf-network-satellite uaf-network-satellite--ads">Google Ads</div>
     <div class="uaf-network-satellite uaf-network-satellite--data">Аналітика</div>
     <div class="uaf-network-satellite uaf-network-satellite--dev">Розробка</div>
    </div>
    <div class="uaf-capability-copy">
     <span class="uaf-eyebrow">НАША ЛОГІКА</span>
     <h3>Не продавати зайве. <em>Розв’язати головне.</em></h3>
     <p>Якщо проблемі достатньо виправлення вимірювання, не пропонуємо новий сайт. Якщо реклама веде на незручну сторінку — починаємо з перевірки цього шляху.</p>
     <a href="<?php echo esc_url(mrseo_url('contact'));?>">Обговорити вашу задачу <span aria-hidden="true">↗</span></a>
    </div>
   </div>
  </div>
 </section>
 <?php
}

/** Ukrainian portfolio: explain evidence without inventing case-study numbers. */
function mrseo_render_ua_portfolio_visual() {
 if(mrseo_locale()!=='uk')return;
 ?>
 <section class="uaf-story uaf-story--portfolio" aria-labelledby="uaf-portfolio-heading">
  <div class="container">
   <div class="uaf-heading"><div><span class="uaf-eyebrow">ЯК ЧИТАТИ НАШЕ ПОРТФОЛІО</span><h2 id="uaf-portfolio-heading">Реальні сайти. <em>Без вигаданих графіків зростання.</em></h2></div>
    <p>Показуємо компанії та напрями роботи. Не приписуємо кожному логотипу результати, яких не можемо публічно підтвердити.</p></div>
   <div class="uaf-evidence" aria-label="Три принципи представлення портфоліо">
    <div class="uaf-evidence-item"><div class="uaf-evidence-figure"><span>WWW</span><b>↗</b></div><h3>Перевірювані сайти</h3><p>У каталозі — назви й посилання на проєкти.</p></div>
    <div class="uaf-evidence-item"><div class="uaf-evidence-figure"><span>◎</span><b>✳</b></div><h3>Різні галузі</h3><p>Інтернет-магазини, послуги та інші бізнеси.</p></div>
    <div class="uaf-evidence-item"><div class="uaf-evidence-figure"><span>✓</span><b>◇</b></div><h3>Повага до даних</h3><p>Бюджети й внутрішню статистику не розкриваємо.</p></div>
   </div>
  </div>
 </section>
 <?php
}

/** Ukrainian contact: minimal help strip; must never change post form. */
function mrseo_render_ua_contact_visual() {
 if(mrseo_locale()!=='uk')return;
 ?>
 <section class="uaf-contact-guide" aria-labelledby="uaf-contact-heading">
  <div class="container">
   <div class="uaf-contact-guide-top"><span class="uaf-eyebrow">ПОЧАТИ ПРОСТО</span><h2 id="uaf-contact-heading">Не потрібне технічне завдання. <em>Достатньо описати проблему.</em></h2></div>
   <ol class="uaf-contact-steps">
    <li><span>01</span><div><strong>Опишіть ситуацію</strong><p>Що зараз не працює або що хочете створити.</p></div></li>
    <li><span>02</span><div><strong>Залиште контакт</strong><p>Можна додати адресу сайту, якщо він уже є.</p></div></li>
    <li><span>03</span><div><strong>Обговоримо наступний крок</strong><p>Уточнимо задачу й можливі способи її вирішення.</p></div></li>
   </ol>
  </div>
 </section>
 <?php
}
