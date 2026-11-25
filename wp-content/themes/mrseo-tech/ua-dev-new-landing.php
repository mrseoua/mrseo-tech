<?php
/** Premium Ukrainian-only landing, original page-specific technology scene. */
if(!defined('ABSPATH'))exit;
if(!mrseo_ua_dev_new_route()||!($p=mrseo_ua_dev_new_page())){
 status_header(404);include get_404_template();return;
}
require_once get_template_directory().'/inc/ua-dev-master-hero.php';
require_once get_template_directory().'/inc/ua-problem-answers.php';
$ua_dev_answers=mrseo_ua_dev_problem_answers(mrseo_slug());
$scene=$p['scene'];
$hero_accent=mrseo_udv_master_hero_accents()[$scene]??$p['highlight'];
// Storyboard describes a real workflow, not fabricated client results.
$motion_stages=array(
 'portal'=>array('Авторизація','Дані клієнта','Оновлення статусу'),
 'parsing'=>array('Джерело даних','Зіставлення полів','Оновлення каталогу'),
 'payment'=>array('Створення платежу','Підтвердження банку','Статус замовлення'),
 'mobile'=>array('Відкрити сервіс','Виконати дію','Отримати сповіщення'),
 'shop'=>array('Вибір товару','Кошик і оплата','Статус замовлення'),
 'team'=>array('Нове завдання','Робота команди','Звіт і синхронізація'),
 'pwa'=>array('Відкрити браузер','Встановити PWA','Доступ до даних')
);
get_header();
?>
<main class="pti-page puc-page udv-page udv-page--<?php echo esc_attr($scene);?>" data-udv-route="<?php echo esc_attr(mrseo_slug());?>" id="main-content">
 <section data-ua-stage="hero" class="pti-hero psc-hero udv-hero" aria-labelledby="udv-h1">
  <div class="pti-wrap pti-hero-grid udv-hero-grid">
   <div class="pti-hero-copy udv-hero-copy">
    <nav class="pti-crumb udv-crumbs" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url('','uk'));?>">Головна</a> / <a href="<?php echo esc_url(mrseo_url('web-development','uk'));?>">Веброзробка</a> / <span><?php echo esc_html($p['title']);?></span></nav>
    <span class="pti-kicker udv-eyebrow"><?php echo esc_html($p['tag']);?></span>
    <h1 id="udv-h1"><?php echo esc_html($p['title']);?><em><?php echo esc_html($hero_accent);?></em></h1>
    <p class="pti-lead udv-lead"><?php echo esc_html($p['intro']);?></p>
    <div class="pti-actions udv-actions">
     <a class="pti-pill udv-cta" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити розробку ↗</a>
     <a class="pti-pill pti-secondary udv-text-cta" href="#udv-problems">З чого почнемо ↓</a>
    </div>
    <p class="pti-footnote udv-disclaimer">Склад робіт і технології визначаємо після аналізу задачі.</p>
   </div>
   <div class="psc-hero-scene udv-visual-wrap" data-udv-scene="<?php echo esc_attr($scene);?>" data-udv-step="0">
    <div class="psc-hero-stage udv-visual">
     <div class="psc-stage-meta"><span><?php echo esc_html(implode(' · ',array_slice($motion_stages[$scene],0,3)));?></span><span>MRSEO / 01</span></div>
     <?php mrseo_udv_master_scene($scene);?>
    </div>
    <div class="pti-scene-controls udv-scene-controls">
     <div class="pti-tabs udv-storyboard" role="group" aria-label="Етапи процесу">
      <?php foreach($motion_stages[$scene] as $step=>$title):?>
       <button type="button" class="udv-story-step<?php echo $step===0?' is-current':'';?>" data-udv-stage="<?php echo (int)$step;?>" data-udv-caption="<?php echo esc_attr($p['actions'][$step][1]);?>" aria-pressed="<?php echo $step===0?'true':'false';?>"><?php echo esc_html($title);?></button>
      <?php endforeach;?>
     </div>
     <button type="button" class="pti-pause udv-motion-toggle" aria-pressed="false">Призупинити рух</button>
    </div>
    <p class="pti-scene-caption udv-scene-caption" aria-live="polite"><b data-udv-index>01 / 03</b><span data-udv-caption-text><?php echo esc_html($p['actions'][0][1]);?></span></p>
    <p class="pti-footnote psc-demo-note udv-demo-note">Ілюстрація принципу, не дані клієнтського проєкту.</p>
   </div>
  </div>
 </section>
 <section data-ua-stage="problems" class="pti-section udv-section udv-section--problems" id="udv-problems" aria-labelledby="udv-problems-h">
  <div class="container"><div class="udv-heading"><span class="pti-kicker udv-eyebrow">01 / ПРОБЛЕМА → РІШЕННЯ</span><h2 id="udv-problems-h"><?php echo esc_html($p['h1']);?></h2><p>Визначаємо, де саме бізнес втрачає час, дані або контроль над процесом.</p></div>
   <div class="udv-illustrated-grid"><div class="udv-problem-illustration"><?php mrseo_udv_lower_art($scene,'problem',$p['problems']);?></div><div class="pti-grid udv-cards"><?php foreach($p['problems'] as $i=>$item):?><article class="pti-card udv-card ua-paired-row ua-paired-row--compact" data-ua-problem-pair><div class="ua-paired-problem"><span class="udv-count"><?php echo esc_html(sprintf('%02d',$i+1));?> / ПРОБЛЕМА</span><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></div><div class="ua-paired-answer"><span>НАШЕ РІШЕННЯ</span><p><?php echo esc_html($ua_dev_answers[$i]);?></p></div></article><?php endforeach;?></div></div>
  </div>
 </section>
 <?php mrseo_ua_v2_approach(mrseo_slug());?>
 <section data-ua-stage="work" class="pti-section udv-section udv-section--solution" aria-labelledby="udv-solutions-h">
  <div class="container"><div class="udv-heading"><span class="pti-kicker udv-eyebrow">ЩО РОБИМО</span><h2 id="udv-solutions-h">Що зробимо для вашого бізнесу</h2><p>Працюємо з конкретними сценаріями, доступами й перевіркою результату.</p></div>
   <div class="udv-illustrated-grid udv-illustrated-grid--solution"><div class="udv-steps"><?php foreach($p['actions'] as $i=>$item):?><article class="udv-step"><span class="udv-count"><?php echo esc_html(sprintf('%02d',$i+1));?></span><div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></div></article><?php endforeach;?></div><div class="udv-solution-illustration"><?php mrseo_udv_lower_art($scene,'solution',$p['actions']);?></div></div>
   <div data-ua-stage="result" class="udv-result"><span class="udv-eyebrow">КОНКРЕТНИЙ РЕЗУЛЬТАТ</span><p><?php echo esc_html($p['result']);?></p></div>
  </div>
 </section>
 <?php mrseo_ua_v2_terms("До розробки погоджуємо функції, інтеграції та критерії приймання.");?>
 <section data-ua-stage="faq" class="pti-section udv-section udv-section--faq" aria-labelledby="udv-faq-h">
  <div class="container udv-faq-grid"><div class="udv-heading"><span class="pti-kicker udv-eyebrow">ПЕРЕД ПОЧАТКОМ</span><h2 id="udv-faq-h">Що варто знати</h2><p>Без універсальних цін і обіцянок: обсяг залежить від ваших систем та вимог.</p></div><div class="udv-faq-list"><?php foreach($p['faq'] as $item):?><details><summary><?php echo esc_html($item[0]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($item[1]);?></p></details><?php endforeach;?></div></div>
 </section>
 <section data-ua-stage="cta" class="pti-final udv-section udv-section--close" aria-labelledby="udv-close-h"><div class="container udv-close-grid"><div><span class="pti-kicker udv-eyebrow">ПЕРШИЙ КРОК</span><h2 id="udv-close-h">Рішення має працювати. <em>А не просто виглядати технологічно.</em></h2><p><?php echo esc_html($p['cta']);?></p><a href="<?php echo esc_url(mrseo_url('contact','uk'));?>" class="udv-cta udv-cta--light">Обговорити проєкт <span aria-hidden="true">↗</span></a></div><div class="udv-related"><strong>Пов’язані послуги</strong><?php foreach($p['related'] as $item):?><a href="<?php echo esc_url(mrseo_url($item[0],'uk'));?>"><?php echo esc_html($item[1]);?><span aria-hidden="true">↗</span></a><?php endforeach;?><a href="<?php echo esc_url(mrseo_url('web-development','uk'));?>">Усі напрями веброзробки <span aria-hidden="true">↗</span></a></div></div></section>
</main>
<?php get_footer(); ?>
