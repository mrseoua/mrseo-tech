<?php
/** Russian service hubs reuse the approved category planets, catalogue and section sequence. */
if(!defined('ABSPATH'))exit;
$slug=mrseo_slug();if(!mrseo_ru_hub_route()){status_header(404);include get_404_template();return;}
require_once get_template_directory().'/inc/ru-premium-content.php';
require_once get_template_directory().'/inc/service-editorial.php';
$semantic=mrseo_ru_semantic_map()[$slug];
if($slug==='web-development'){
 $d=mrseo_dev_page('ru');
 $pairs=array();foreach($d['problems'] as $i=>$q)$pairs[]=array($q[0],$q[1],$d['solutions'][$i][0].'. '.$d['solutions'][$i][1]);
 $steps=$d['solutions'];$result=implode(' · ',$d['outcomes']);$heading='Где бизнес теряет время и контроль?';$final='Нужна разработка?';$faq=array(array('Нужно создавать систему с нуля?','Не обязательно. Сначала оцениваем текущую платформу и возможность небольшой интеграции.'),array('Можно подключиться к существующему проекту?','Да, после технического обзора репозитория, архитектуры, доступов и рисков.'),array('Как определяется стоимость?','После диагностики согласуем функции, этапы и критерии приёмки.'));
}else{
 $d=mrseo_ru_premium_content($slug);$story=mrseo_customer_journey_copy($slug,'ru');$pairs=array();foreach(array_slice($story['stories'],0,3) as $q)$pairs[]=array($q[0],$q[1],$q[2]);
 $heading=$d['problemHeading'];$steps=array_slice($d['steps'],0,3);$result=$d['deliveryLead'];$final=$d['finalHeading'][0];$faq=$d['faq']??array();
 if(!$faq){$ed=mrseo_service_editorial()[$slug]['ru']??array();for($i=6;$i<=9;$i++){if(!empty($ed[$i])&&str_contains($ed[$i],'|'))$faq[]=explode('|',$ed[$i],2);}}
}
get_header();?>
<div class="pti-page ru-category-hub" data-ru-category="<?php echo esc_attr($slug);?>">
<?php mrseo_ru_category_orbit($slug);?>
<section data-ua-stage="problems" id="ru-hub-problems" class="pti-section"><div class="pti-wrap"><div class="pti-section-head"><div><span class="pti-kicker">02 / ПРОБЛЕМА → РЕШЕНИЕ</span><h2><?php echo esc_html($heading);?></h2></div><p>Три ситуации, которые стоит проверить в первую очередь.</p></div><div class="pti-grid service-problem-list"><?php foreach($pairs as $i=>$q):?><article class="pti-card"><span class="pti-num"><?php echo esc_html(sprintf('%02d / 03',$i+1));?></span><div class="service-problem-copy"><span class="service-label">ПРОБЛЕМА</span><h3><?php echo esc_html($q[0]);?></h3><p><?php echo esc_html($q[1]);?></p></div><div class="service-problem-answer"><span class="service-label">НАШЕ РЕШЕНИЕ</span><p><?php echo esc_html($q[2]);?></p></div></article><?php endforeach;?></div></div></section>
<?php mrseo_ru_parity_approach($slug,$semantic['headline'][1],$semantic['lead']);?>
<?php mrseo_ru_category_catalog($slug);?>
<section data-ua-stage="work" class="pti-section pti-alt"><div class="pti-wrap pti-story category-text-work"><div><span class="pti-kicker">04 / КОНКРЕТНЫЕ РАБОТЫ</span><h2>Понятный <em>план действий.</em></h2><div class="pti-steps"><?php foreach($steps as $i=>$step):?><div class="pti-step"><b><?php echo esc_html(sprintf('%02d',$i+1));?></b><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div></div><?php endforeach;?></div></div></div></section>
<section data-ua-stage="result" class="ua-v2-result"><div class="ua-v2-wrap ua-v2-terms-grid"><div><span class="ua-v2-label">05 / РЕЗУЛЬТАТ</span><h2>Что получит <em>ваш бизнес.</em></h2></div><p><?php echo esc_html($result);?></p></div></section>
<?php mrseo_ru_parity_terms('Посмотрите стартовые цены и согласуйте подходящий формат работы.');?>
<div class="pti-wrap"><a class="pti-pill" href="<?php echo esc_url(mrseo_url('pricing','ru'));?>">Стоимость услуг ↗</a></div>
<section data-ua-stage="faq" class="pti-section"><div class="pti-wrap pti-faq"><div><span class="pti-kicker">07 / ПЕРЕД НАЧАЛОМ</span><h2>Коротко о <em>сотрудничестве.</em></h2></div><div><?php foreach($faq as $qa):?><details><summary><?php echo esc_html($qa[0]);?></summary><p><?php echo esc_html($qa[1]);?></p></details><?php endforeach;?></div></div></section>
<section data-ua-stage="cta" class="category-compact-cta category-hub-cta"><div class="category-cta-inner"><div><h2><?php echo esc_html($final);?></h2><p>Расскажите о вашей задаче. Предложим следующий шаг.</p></div><a class="category-cta-button" href="<?php echo esc_url(mrseo_url('contact','ru'));?>">Обсудить проект ↗</a></div></section>
</div><?php get_footer();?>
