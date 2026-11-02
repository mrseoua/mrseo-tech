<?php
/** Russian premium service pages: problem -> diagnosed cause -> practical fix -> verification. */
if (!defined('ABSPATH')) exit;
require_once get_template_directory().'/inc/ru-premium-content.php';
require_once get_template_directory().'/inc/service-editorial.php';
$slug=mrseo_slug();
$page=mrseo_ru_premium_content($slug);
$story=mrseo_customer_journey_copy($slug,'ru');
if (!$page || !$story || empty($story['stories'])) { status_header(404); include get_404_template(); return; }
$editorial=mrseo_service_editorial()[$slug]['ru']??null;
$faq=$page['faq']??array();
if (!$faq && is_array($editorial)) {
 for ($i=6; $i<=9; $i++) {
  if (empty($editorial[$i])) continue;
  $parts=explode('|',$editorial[$i],2);
  if (count($parts)===2) $faq[]=$parts;
 }
}
get_header();
?>
<div class="ukseo ru-premium ukseo--solution ukseo--<?php echo esc_attr($slug); ?>">
 <section class="ukseo-hero" aria-labelledby="ru-hero-title">
  <div class="container ukseo-hero-grid">
   <div class="ukseo-hero-copy">
    <nav class="ukseo-crumbs" aria-label="Навигация"><a href="<?php echo esc_url(mrseo_url()); ?>">Главная</a><span aria-hidden="true">/</span><span><?php echo esc_html($page['kicker']); ?></span></nav>
    <p class="ukseo-kicker"><?php echo esc_html($page['kicker']); ?></p>
    <h1 id="ru-hero-title"><?php echo esc_html($page['headline'][0]); ?> <em><?php echo esc_html($page['headline'][1]); ?></em></h1>
    <p class="ukseo-hero-lead"><?php echo esc_html($story['lead']); ?></p>
    <div class="ukseo-actions"><a class="ukseo-button ukseo-button-dark" href="<?php echo esc_url(mrseo_url('contact')); ?>"><?php echo esc_html($page['cta']); ?> <span aria-hidden="true">↗</span></a><a class="ukseo-text-link" href="#ru-problems">С чего начнём <span aria-hidden="true">↓</span></a></div>
    <p class="ukseo-hero-foot">Никаких гарантированных позиций или окупаемости. Только проверяемые действия и понятные критерии.</p>
   </div>
   <div class="ukseo-hero-art">
    <?php if($slug==='horoshop'):?>
    <div class="ru-horoshop-brand" aria-label="Хорошоп — партнёрство"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-wordmark.svg'); ?>" alt="Хорошоп" width="170" height="38" loading="eager"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-partner-active.svg'); ?>" alt="Хорошоп Partner ACTIVE" width="72" height="58" loading="eager"></div>
    <?php endif;?>
    <?php mrseo_render_motion_scene($slug,'ru'); ?>
    <div class="ukseo-visual-caption"><span class="ukseo-visual-caption-mark">01 / <?php echo esc_html($slug==='seo'?'ПОИСК':'ДИАГНОСТИКА'); ?></span><span><?php echo esc_html($page['caption']); ?></span></div>
   </div>
  </div>
 </section>
 <section class="ukseo-cases" id="ru-problems" aria-labelledby="ru-problems-title">
  <div class="container">
   <div class="ukseo-section-head">
    <div><span class="ukseo-kicker">СИТУАЦИЯ → ПРИЧИНА → РЕШЕНИЕ</span><h2 id="ru-problems-title"><?php echo esc_html($page['problemHeading']); ?></h2></div>
    <p><?php echo esc_html($page['problemIntro']); ?></p>
   </div>
   <div class="ukseo-problem-grid">
   <?php foreach($story['stories'] as $i=>$item):if(count($item)<4)continue;?>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number"><?php echo esc_html(sprintf('%02d',$i+1)); ?><span aria-hidden="true">↗</span></div>
     <h3><?php echo esc_html($item[0]); ?></h3><p><?php echo esc_html($item[1]); ?></p>
     <div class="ukseo-card-diagnosis"><span>Что делаем</span><strong><?php echo esc_html($item[2]); ?></strong></div>
     <div class="ru-case-proof"><span>Как проверяем</span><p><?php echo esc_html($item[3]); ?></p></div>
    </article>
   <?php endforeach;?>
   </div>
  </div>
 </section>
 <section class="ukseo-decision" aria-labelledby="ru-decision-title">
  <div class="container ukseo-decision-layout">
   <div class="ukseo-decision-copy">
    <span class="ukseo-kicker">ПОКАЗЫВАЕМ ЛОГИКУ РЕШЕНИЯ</span>
    <h2 id="ru-decision-title"><?php echo esc_html($page['decisionHeading'][0]); ?> <em><?php echo esc_html($page['decisionHeading'][1]); ?></em></h2>
    <p><?php echo esc_html($page['decisionLead']); ?></p>
    <a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url($page['related'][1])); ?>"><?php echo esc_html($page['related'][0]); ?> <span aria-hidden="true">↗</span></a>
   </div>
   <div class="ukseo-spec" aria-label="Иллюстрация подхода">
    <div class="ukseo-spec-top"><span>ПРИМЕР РАБОЧЕЙ ЗАДАЧИ</span><span aria-hidden="true">✳</span></div>
    <?php foreach(array('ПРОБЛЕМА','РЕШЕНИЕ','КАК ПРОВЕРИТЬ') as $i=>$title):?><div class="ukseo-spec-row"><small><?php echo esc_html($title); ?></small><strong><?php echo esc_html($page['example'][$i]); ?></strong></div><?php endforeach;?>
    <div class="ukseo-spec-foot">Пример методики, а не результат или данные конкретного клиента.</div>
   </div>
  </div>
 </section>
 <section class="ukseo-work" aria-labelledby="ru-process-title">
  <div class="container">
   <div class="ukseo-section-head"><div><span class="ukseo-kicker">ПОНЯТНЫЙ ПЛАН РАБОТЫ</span><h2 id="ru-process-title"><?php echo esc_html($page['processHeading']); ?></h2></div><p>На каждом этапе — конкретное действие и результат, который можно проверить.</p></div>
   <ol class="ukseo-steps"><?php foreach($page['steps'] as $i=>$step):?>
    <li><div class="ukseo-step-index"><?php echo esc_html(sprintf('%02d',$i+1)); ?></div><div><h3><?php echo esc_html($step[0]); ?></h3><p><?php echo esc_html($step[1]); ?></p></div><strong><?php echo esc_html($step[2]); ?></strong></li>
   <?php endforeach;?></ol>
  </div>
 </section>
 <section class="ukseo-delivery" aria-labelledby="ru-delivery-title">
  <div class="container ukseo-delivery-grid">
   <div><span class="ukseo-kicker">ЧТО ПОЛУЧАЕТ БИЗНЕС</span><h2 id="ru-delivery-title"><?php echo esc_html($page['deliveryHeading'][0]); ?> <em><?php echo esc_html($page['deliveryHeading'][1]); ?></em></h2><p><?php echo esc_html($page['deliveryLead']); ?></p></div>
   <div class="ukseo-delivery-list"><?php foreach($page['deliveries'] as $i=>$item):?>
    <div><span aria-hidden="true"><?php echo esc_html(sprintf('%02d',$i+1)); ?></span><div><h3><?php echo esc_html($item[0]); ?></h3><p><?php echo esc_html($item[1]); ?></p></div></div>
   <?php endforeach;?></div>
  </div>
 </section>
 <section class="ukseo-proof" aria-labelledby="ru-proof-title">
  <div class="container ukseo-proof-layout"><div><span class="ukseo-kicker">ПРОЗРАЧНОСТЬ ВМЕСТО ОБЕЩАНИЙ</span><h2 id="ru-proof-title"><?php echo esc_html($page['proofHeading'][0]); ?> <em><?php echo esc_html($page['proofHeading'][1]); ?></em></h2></div>
   <div><p><?php echo esc_html($page['proofText']); ?></p><a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('portfolio')); ?>">Посмотреть проекты из портфолио <span aria-hidden="true">↗</span></a></div></div>
 </section>
 <?php if($faq):?>
 <section class="ukseo-faq" aria-labelledby="ru-faq-title"><div class="container ukseo-faq-grid"><div><span class="ukseo-kicker">ПЕРЕД СОТРУДНИЧЕСТВОМ</span><h2 id="ru-faq-title"><?php echo esc_html($page['faqHeading']); ?></h2><p>Ограничения и возможности — без сложных обещаний.</p></div><div class="ukseo-faq-items"><?php foreach($faq as $qa):?>
  <details><summary><?php echo esc_html($qa[0]); ?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($qa[1]); ?></p></details>
 <?php endforeach;?></div></div></section>
 <?php endif;?>
 <section class="ukseo-final" aria-labelledby="ru-final-title"><div class="container ukseo-final-grid"><div><span class="ukseo-kicker">ПЕРВЫЙ ШАГ</span><h2 id="ru-final-title"><?php echo esc_html($page['finalHeading'][0]); ?> <em><?php echo esc_html($page['finalHeading'][1]); ?></em></h2><p><?php echo esc_html($page['finalText']); ?></p></div><a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact')); ?>"><?php echo esc_html($page['cta']); ?> <span aria-hidden="true">↗</span></a></div></section>
</div>
<?php get_footer(); ?>
