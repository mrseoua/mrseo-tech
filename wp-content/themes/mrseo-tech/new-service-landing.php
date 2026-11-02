<?php
/**
 * Commercial service landings — original Ukrainian and Russian content.
 * Globally approved warm design system; no homepage / Earth dependencies.
 */
if(!defined('ABSPATH'))exit;
if(!mrseo_new_service_route()){status_header(404);include get_404_template();return;}
$slug=mrseo_slug();$lang=mrseo_locale();$page=mrseo_new_service_copy($slug,$lang);
if(!$page){status_header(404);include get_404_template();return;}
$group=mrseo_new_service_group($slug);
$ru=$lang==='ru';
$parent=mrseo_new_service_parent_slugs()[$slug]??'web-development';
$copy=$ru?array(
 'home'=>'Главная','explore'=>'Разобрать причины','rule'=>'Сначала выясняем причину, затем предлагаем решение.','problem'=>'Где бизнес теряет результат?',
 'intro'=>'Смотрим не только на симптомы, но и на то, как проверить исправление.','diagnosis'=>'Что проверяем','example'=>'ПРИМЕР РЕШЕНИЯ','scenario'=>'Это пример метода, а не результат клиента.',
 'process'=>'ПЛАН РАБОТЫ','processTitle'=>'От проблемы — к проверяемому решению','processLead'=>'Каждый этап завершается понятным действием и результатом, который можно принять.',
 'outcomes'=>'ЧТО ПОЛУЧАЕТ БИЗНЕС','outcomesTitle'=>'Не обещания. Конкретные результаты работы.',
 'limitations'=>'ЧЕСТНО ОБ ОГРАНИЧЕНИЯХ','limitationsTitle'=>'Что важно знать заранее',
 'faqLabel'=>'ВОПРОСЫ ДО НАЧАЛА','faqTitle'=>'Что стоит уточнить','related'=>'Связанное направление',
 'footer'=>'ПЕРВЫЙ ШАГ','finalTitle'=>'Расскажите, что не работает.','finalLead'=>'Отправьте ссылку на сайт и опишите ситуацию. Уточним исходные данные, оценим реалистичность и предложим следующие шаги.'
):array(
 'home'=>'Головна','explore'=>'Розібрати причини','rule'=>'Спочатку підтверджуємо причину. Потім пропонуємо рішення.','problem'=>'Де бізнес втрачає результат?',
 'intro'=>'Перевіряємо не лише симптоми, а й те, як підтвердити ефект виправлення.','diagnosis'=>'Що перевіряємо','example'=>'ПРИКЛАД РІШЕННЯ','scenario'=>'Приклад підходу, а не результат клієнта.',
 'process'=>'ПЛАН РОБОТИ','processTitle'=>'Від проблеми — до перевірюваного рішення','processLead'=>'Кожен етап має конкретну дію та результат, який можна прийняти.',
 'outcomes'=>'ЩО ОТРИМУЄ БІЗНЕС','outcomesTitle'=>'Не обіцянки. Конкретні результати роботи.',
 'limitations'=>'ЧЕСНО ПРО ОБМЕЖЕННЯ','limitationsTitle'=>'Що важливо знати заздалегідь',
 'faqLabel'=>'ЗАПИТАННЯ ДО ПОЧАТКУ','faqTitle'=>'Що варто уточнити','related'=>'Суміжний напрям',
 'footer'=>'ПЕРШИЙ КРОК','finalTitle'=>'Розкажіть, що зараз не працює.','finalLead'=>'Надішліть сайт і опишіть ситуацію. Уточнимо вихідні дані, оцінимо реалістичність і запропонуємо наступні кроки.'
);
get_header();
?>
<div class="ukseo ns-page ns-page--<?php echo esc_attr($slug);?>" data-service-group="<?php echo esc_attr($group);?>">
 <section class="ukseo-hero ns-hero" aria-labelledby="ns-title">
 <div class="container ukseo-hero-grid">
  <div class="ukseo-hero-copy">
   <nav class="ukseo-crumbs" aria-label="<?php echo esc_attr($copy['home']);?>"><a href="<?php echo esc_url(mrseo_url());?>"><?php echo esc_html($copy['home']);?></a><span aria-hidden="true">/</span><span><?php echo esc_html($page['title']);?></span></nav>
   <span class="ukseo-kicker"><?php echo esc_html(mb_strtoupper($page['title'],'UTF-8'));?></span>
   <h1 id="ns-title"><?php echo esc_html($page['head'][0]);?> <em><?php echo esc_html($page['head'][1]);?></em></h1>
   <p class="ukseo-hero-lead"><?php echo esc_html($page['lead']);?></p>
   <div class="ukseo-actions"><a class="ukseo-button ukseo-button-dark" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($page['cta']);?> <span aria-hidden="true">↗</span></a><a class="ukseo-text-link" href="#ns-problems"><?php echo esc_html($copy['explore']);?> <span aria-hidden="true">↓</span></a></div>
   <p class="ukseo-hero-foot"><?php echo esc_html($copy['rule']);?></p>
  </div>
  <div class="ukseo-hero-art ns-hero-art">
   <div class="ns-scene ns-scene--<?php echo esc_attr($group);?>" role="img" aria-label="<?php echo esc_attr(implode(' — ',$page['scene']));?>">
    <div class="ns-scene-top"><span class="ns-scene-signal" aria-hidden="true"></span> <span>MRSEO / <?php echo esc_html($page['title']);?></span><span aria-hidden="true">✳</span></div>
    <?php if($group==='audit'):?>
     <div class="ns-audit-wave" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
    <?php elseif($group==='ads'):?>
     <div class="ns-product-preview" aria-hidden="true"><div>▤</div><div>◈</div><div>▣</div></div>
    <?php elseif($group==='commerce'):?>
     <div class="ns-commerce-preview" aria-hidden="true"><div>▥ <span></span><span></span></div><div>▥ <span></span><span></span></div><div>▥ <span></span><span></span></div></div>
    <?php elseif($group==='dev'):?>
     <div class="ns-dev-preview" aria-hidden="true"><span>&lt;/&gt;</span><i></i><span>API</span><i></i><span>✓</span></div>
    <?php else:?>
     <div class="ns-data-preview" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
    <?php endif;?>
    <div class="ns-scene-pipeline">
     <?php foreach($page['scene'] as $i=>$node):?>
      <div class="ns-scene-node"><small><?php echo esc_html(sprintf('%02d',$i+1));?></small><strong><?php echo esc_html($node);?></strong></div>
      <?php if($i<2):?><span class="ns-scene-arrow" aria-hidden="true">→</span><?php endif;?>
     <?php endforeach;?>
    </div>
    <div class="ns-scene-foot"><span><?php echo esc_html($ru?'Схема проверки':'Схема перевірки');?></span><span class="ns-scene-breath" aria-hidden="true"><i></i><i></i><i></i></span></div>
   </div>
   <div class="ukseo-visual-caption"><span class="ukseo-visual-caption-mark">01 / <?php echo esc_html($page['title']);?></span><span><?php echo esc_html($ru?'Сначала проверяем факты':'Спочатку перевіряємо факти');?></span></div>
  </div>
 </div></section>
 <section class="ukseo-cases" id="ns-problems" aria-labelledby="ns-problem-title"><div class="container">
  <div class="ukseo-section-head"><div><span class="ukseo-kicker"><?php echo esc_html($ru?'ПРОБЛЕМА → ПРИЧИНА → ПРОВЕРКА':'ПРОБЛЕМА → ПРИЧИНА → ПЕРЕВІРКА');?></span><h2 id="ns-problem-title"><?php echo esc_html($copy['problem']);?></h2></div><p><?php echo esc_html($copy['intro']);?></p></div>
  <div class="ukseo-problem-grid"><?php foreach($page['problems'] as $i=>$problem):?>
   <article class="ukseo-problem-card"><div class="ukseo-card-number"><?php echo esc_html(sprintf('%02d',$i+1));?><span aria-hidden="true">↗</span></div>
    <h3><?php echo esc_html($problem[0]);?></h3><p><?php echo esc_html($problem[1]);?></p>
    <div class="ukseo-card-diagnosis"><span><?php echo esc_html($copy['diagnosis']);?></span><strong><?php echo esc_html($problem[2]);?></strong></div>
   </article>
  <?php endforeach;?></div>
 </div></section>
 <section class="ukseo-decision" aria-labelledby="ns-example-title"><div class="container ukseo-decision-layout">
  <div class="ukseo-decision-copy"><span class="ukseo-kicker"><?php echo esc_html($copy['example']);?></span>
   <h2 id="ns-example-title"><?php echo esc_html($ru?'Не угадать причину.':'Не вгадати причину.');?> <em><?php echo esc_html($ru?'А проверить гипотезу.':'А перевірити гіпотезу.');?></em></h2>
   <p><?php echo esc_html($copy['scenario']);?></p>
   <a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url($page['related']));?>"><?php echo esc_html($copy['related']);?> <span aria-hidden="true">↗</span></a>
  </div>
  <div class="ukseo-spec" aria-label="<?php echo esc_attr($copy['example']);?>">
   <div class="ukseo-spec-top"><span><?php echo esc_html($copy['example']);?></span><span aria-hidden="true">✳</span></div>
   <?php foreach($page['example'] as $line):$parts=explode(': ',$line,2);?>
    <div class="ukseo-spec-row"><small><?php echo esc_html($parts[0]);?></small><strong><?php echo esc_html($parts[1]??$line);?></strong></div>
   <?php endforeach;?>
   <div class="ukseo-spec-foot"><?php echo esc_html($copy['scenario']);?></div>
  </div>
 </div></section>
 <section class="ukseo-work" aria-labelledby="ns-process-title"><div class="container">
  <div class="ukseo-section-head"><div><span class="ukseo-kicker"><?php echo esc_html($copy['process']);?></span><h2 id="ns-process-title"><?php echo esc_html($copy['processTitle']);?></h2></div><p><?php echo esc_html($copy['processLead']);?></p></div>
  <ol class="ukseo-steps"><?php foreach($page['steps'] as $i=>$step):?>
   <li><div class="ukseo-step-index"><?php echo esc_html(sprintf('%02d',$i+1));?></div><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div><strong><?php echo esc_html($i<3 ? $page['outcomes'][$i] : ($ru?'Проверка после внедрения':'Перевірка після впровадження'));?></strong></li>
  <?php endforeach;?></ol>
 </div></section>
 <section class="ukseo-delivery" aria-labelledby="ns-outcomes-title"><div class="container ukseo-delivery-grid">
  <div><span class="ukseo-kicker"><?php echo esc_html($copy['outcomes']);?></span><h2 id="ns-outcomes-title"><?php echo esc_html($copy['outcomesTitle']);?></h2><p><?php echo esc_html($ru?'Состав работ зависит от исходной системы и подтверждённых ограничений.':'Обсяг робіт залежить від вихідної системи та підтверджених обмежень.');?></p></div>
  <div class="ukseo-delivery-list"><?php foreach($page['outcomes'] as $i=>$outcome):?>
   <div><span aria-hidden="true"><?php echo esc_html(sprintf('%02d',$i+1));?></span><div><h3><?php echo esc_html($outcome);?></h3><p><?php echo esc_html($ru?'Проверяем результат по согласованным критериям и фактическим данным.':'Перевіряємо результат за погодженими критеріями й фактичними даними.');?></p></div></div>
  <?php endforeach;?></div>
 </div></section>
 <section class="ukseo-proof" aria-labelledby="ns-limits-title"><div class="container ukseo-proof-layout">
  <div><span class="ukseo-kicker"><?php echo esc_html($copy['limitations']);?></span><h2 id="ns-limits-title"><?php echo esc_html($copy['limitationsTitle']);?></h2></div>
  <div><p><?php echo esc_html($page['risk']);?></p><a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html($ru?'Смотреть портфолио':'Переглянути портфоліо');?> <span aria-hidden="true">↗</span></a></div>
 </div></section>
 <section class="ukseo-faq" aria-labelledby="ns-faq-title"><div class="container ukseo-faq-grid">
  <div><span class="ukseo-kicker"><?php echo esc_html($copy['faqLabel']);?></span><h2 id="ns-faq-title"><?php echo esc_html($copy['faqTitle']);?></h2></div>
  <div class="ukseo-faq-items"><?php foreach($page['faq'] as $pair):?><details><summary><?php echo esc_html($pair[0]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($pair[1]);?></p></details><?php endforeach;?></div>
 </div></section>
 <section class="ukseo-final" aria-labelledby="ns-final-title"><div class="container ukseo-final-grid">
  <div><span class="ukseo-kicker"><?php echo esc_html($copy['footer']);?></span><h2 id="ns-final-title"><?php echo esc_html($copy['finalTitle']);?></h2><p><?php echo esc_html($copy['finalLead']);?></p></div>
  <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($page['cta']);?> <span aria-hidden="true">↗</span></a>
 </div></section>
</div>
<?php get_footer();?>
