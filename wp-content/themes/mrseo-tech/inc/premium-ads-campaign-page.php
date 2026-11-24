<?php
if(!defined('ABSPATH'))exit;
/* Plain-language summaries only. The existing SEO copy remains the canonical source. */
$ads_briefs=json_decode(<<<'MRSEO_ADS_BRIEFS'
{"google-search-ads":{"name":"Пошукова реклама Google Ads","goal":"Залучати людей, які вже шукають вашу послугу.","check":"Запити, оголошення, сторінки та облік звернень.","output":"Кампанії під ваші послуги з погодженим бюджетом і перевіркою заявок.","solutions":["Перевіряємо пошукові фрази, додаємо мінус-слова та відсіюємо непотрібні покази.","Підбираємо окремі оголошення й відповідні сторінки під конкретні послуги.","Перевіряємо облік дзвінків і форм, зіставляємо їх із рекламними переходами."]},"performance-max":{"name":"Performance Max","goal":"Контролювати не лише продажі, а й економіку товарів.","check":"Товарний фід, облік покупок, витрати та маржу.","output":"План змін у кампаніях і контрольні показники з урахуванням економіки магазину.","solutions":["Зіставляємо витрати й продажі по групах товарів із доступними даними про маржу.","Перевіряємо відхилення Merchant Center, ціни, залишки та атрибути товарного фіда.","Аналізуємо історію змін і затримки конверсій, погоджуємо послідовні тести."]},"google-shopping":{"name":"Google Shopping","goal":"Зрозуміти, які товарні оголошення приводять замовлення.","check":"Ціни, наявність, товарні дані, витрати й покупки.","output":"Перелік проблем Merchant Center, структура реклами та звіт про витрати й покупки.","solutions":["Знаходимо відхилені товари та причини помилок у Merchant Center.","Зіставляємо товарні групи, пошуковий попит, сторінки й фактичні покупки.","Порівнюємо витрати та цінність замовлень з урахуванням маржинальних обмежень."]},"local-google-ads":{"name":"Локальна реклама Google Ads","goal":"Залучати клієнтів із міста або району, де ви працюєте.","check":"Географію показів, пошукові запити, дзвінки та форми.","output":"Кампанії з погодженою зоною показів і перевіркою реальних звернень.","solutions":["Уточнюємо територію обслуговування та перевіряємо налаштування місцеперебування.","Виключаємо нерелевантні запити й ведемо людей на потрібну послугу.","За можливості налаштовуємо та перевіряємо фіксацію дзвінків і заявок."]},"google-remarketing":{"name":"Ремаркетинг Google Ads","goal":"Повертати увагу відвідувачів, які вже цікавилися товарами.","check":"Події сайту, товарні ID, згоду, аудиторії та виключення.","output":"Погоджена структура ремаркетингу з контрольованими витратами.","solutions":["Перевіряємо джерела дозволених сигналів, події перегляду та статуси аудиторій.","Звіряємо товарні ID у подіях сайту з актуальним фідом Merchant Center.","Погоджуємо виключення покупців і контролюємо зайві повторні покази."]}}
MRSEO_ADS_BRIEFS
,true,512,JSON_THROW_ON_ERROR);
$ads=$ads_briefs[$psc_slug];
?>
<div class="pti-page puc-page puc-ads-campaign ads-v2" data-puc-route="<?php echo esc_attr($psc_slug);?>" data-ads-layout="problem-solution-v2" id="main-content">
 <section class="pti-hero psc-hero ads-opening" aria-labelledby="<?php echo esc_attr($psc_title_id);?>">
  <div class="pti-wrap">
   <nav class="pti-crumb" aria-label="Навігація"><a href="<?php echo esc_url(mrseo_url());?>">Головна</a> / <a href="<?php echo esc_url(mrseo_url('google-ads'));?>">Google Ads</a> / <span><?php echo esc_html($psc['title']);?></span></nav>
   <div class="pti-hero-grid">
    <div class="pti-hero-copy">
     <span class="pti-kicker"><?php echo esc_html($ads['name']);?></span>
     <h1 id="<?php echo esc_attr($psc_title_id);?>"><?php echo esc_html($psc['headline'][0]);?> <em><?php echo esc_html($psc['headline'][1]);?></em></h1>
     <p class="ads-goal"><?php echo esc_html($ads['goal']);?></p>
     <p class="pti-lead"><?php echo esc_html($psc['lead']);?></p>
     <div class="pti-actions"><a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($psc['button']);?> ↗</a><a class="pti-pill pti-secondary" href="#<?php echo esc_attr($psc_problem_id);?>">Як вирішуємо ↓</a></div>
     <p class="pti-footnote"><?php echo esc_html($psc['foot']);?></p>
    </div>
    <div class="psc-hero-scene" data-puc-phase="0">
     <div class="psc-hero-stage"><div class="psc-stage-meta"><span><?php echo esc_html($ads['name']);?></span><span>MRSEO / ADS</span></div><?php mrseo_puc_art($psc_art['hero']);?></div>
     <div class="pti-scene-controls"><div class="pti-tabs" role="group" aria-label="Етапи процесу"><?php foreach($psc['tabs'] as $i=>$tab):?><button type="button" data-puc-tab="<?php echo esc_attr($i);?>" data-puc-caption="<?php echo esc_attr($tab[1]);?>" aria-pressed="<?php echo $i===0?'true':'false';?>"><?php echo esc_html($tab[0]);?></button><?php endforeach;?></div><button class="pti-pause psc-pause" type="button" aria-pressed="false">Призупинити рух</button></div>
     <p class="pti-scene-caption" aria-live="polite"><b data-puc-index>01 / 03</b><span data-puc-caption-text><?php echo esc_html($psc['tabs'][0][1]);?></span></p>
     <p class="pti-footnote psc-demo-note">Ілюстрація принципу, не дані клієнтського проєкту.</p>
    </div>
   </div>
   <div class="ads-brief" aria-label="Послуга коротко">
    <div><span>01 / ВАША ЗАДАЧА</span><p><?php echo esc_html($ads['goal']);?></p></div>
    <div><span>02 / ЩО ПЕРЕВІРИМО</span><p><?php echo esc_html($ads['check']);?></p></div>
    <div><span>03 / РЕЗУЛЬТАТ РОБОТИ</span><p><?php echo esc_html($ads['output']);?></p></div>
   </div>
  </div>
 </section>
 <section class="pti-section psc-problems ads-diagnosis" id="<?php echo esc_attr($psc_problem_id);?>" aria-labelledby="psc-problem-title">
  <div class="pti-wrap">
   <div class="pti-section-head"><div><span class="pti-kicker">01 / ПРОБЛЕМА → РІШЕННЯ</span><h2 id="psc-problem-title"><?php echo esc_html($psc['problemHeading']);?></h2></div><p><?php echo esc_html($psc['problemLead']);?></p></div>
   <div class="pti-grid psc-problem-grid ads-problem-rows">
   <?php foreach($psc['pains'] as $i=>$problem):?>
    <article class="pti-card psc-problem-card ads-problem-row">
     <div class="psc-mini-art"><?php mrseo_puc_art($psc_art['problem'][$i]);?></div>
     <div class="ads-problem-copy"><span class="pti-num"><?php echo esc_html(sprintf('%02d',$i+1));?> / ПРОБЛЕМА</span><h3><?php echo esc_html($problem[0]);?></h3><p><?php echo esc_html($problem[1]);?></p></div>
     <div class="ads-problem-fix"><span>НАШЕ РІШЕННЯ ↗</span><p><?php echo esc_html($ads['solutions'][$i]);?></p><?php if(!empty($problem[2])&&$problem[2]!==$ads['solutions'][$i]):?><small><?php echo esc_html($problem[2]);?></small><?php endif;?></div>
    </article>
   <?php endforeach;?>
   </div>
  </div>
 </section>
 <?php if(!empty($psc['plan'])):$plan=$psc['plan'];?>
 <section class="pti-section pti-alt puc-plan" aria-labelledby="puc-plan-title"><div class="pti-wrap psc-story-grid">
  <div class="psc-story-visual"><?php mrseo_puc_art($psc_art['plan']);?></div>
  <div><span class="pti-kicker"><?php echo esc_html($plan['eyebrow']);?></span><h2 id="puc-plan-title"><?php echo esc_html($plan['heading'][0]);?> <em><?php echo esc_html($plan['heading'][1]);?></em></h2><p class="pti-lead"><?php echo esc_html($plan['lead']);?></p><div class="pti-steps"><?php foreach($plan['steps'] as $i=>$step):?><div class="pti-step"><b><?php echo esc_html(sprintf('%02d',$i+1));?></b><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div></div><?php endforeach;?></div><a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($plan['cta']);?> ↗</a><p class="pti-footnote">Ілюстрація підходу, не клієнтський кейс.</p></div>
 </div></section>
 <?php endif;?>
 <section class="pti-section psc-delivery ads-work" id="uws-solution" aria-labelledby="<?php echo esc_attr($psc_delivery_id);?>">
  <div class="pti-wrap">
   <div class="pti-section-head"><div><span class="pti-kicker">02 / ЩО САМЕ РОБИМО</span><h2 id="<?php echo esc_attr($psc_delivery_id);?>"><?php $psc_head($psc['sectionTitle']);?></h2></div><p>Ви розумієте, що перевіряємо, які зміни погоджуємо та як оцінюємо їхній результат.</p></div>
   <div class="ads-work-board">
    <div class="psc-story-visual"><?php mrseo_puc_art($psc_art['storyId']);?></div>
    <div class="psc-delivery-copy"><div class="pti-steps"><?php foreach($psc['benefits'] as $i=>$item):?><div class="pti-step"><b><?php echo esc_html(sprintf('%02d',$i+1));?></b><div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[1]);?></p></div></div><?php endforeach;?></div><p class="pti-footnote">Ілюстрація підходу, не дані конкретного проєкту.</p><button class="psc-pause psc-lower-pause" type="button" aria-pressed="false">Призупинити рух</button></div>
   </div>
   <div class="psc-result ads-result"><div><span class="pti-kicker">03 / ЩО ОТРИМУЄ БІЗНЕС</span><h3><?php echo esc_html($ads['output']);?></h3></div><p><?php echo esc_html($psc['result']);?></p></div>
  </div>
 </section>
 <section class="pti-section psc-faq-section"><div class="pti-wrap pti-faq">
  <div><span class="pti-kicker">04 / ПЕРЕД ПОЧАТКОМ</span><h2 id="<?php echo esc_attr($psc_faq_id);?>"><?php echo esc_html($psc['faqHeading']??'Коротко про важливе.');?></h2><?php if(!empty($psc['faqLead'])):?><p><?php echo esc_html($psc['faqLead']);?></p><?php endif;?></div>
  <div><?php foreach($psc['faq'] as $i=>$item):?><details><summary><?php echo esc_html($item[0]);?></summary><p><?php echo esc_html($item[1]);?></p></details><?php endforeach;?></div>
 </div></section>
 <section class="pti-final psc-final"><div class="pti-wrap">
  <div class="psc-final-art"><?php mrseo_puc_art($psc_art['endId']);?></div>
  <div><span class="pti-kicker">05 / ПЕРШИЙ КРОК</span><h2 id="<?php echo esc_attr($psc_final_id);?>"><?php $psc_head($psc['ctaTitle']);?></h2><p><?php echo esc_html($psc['ctaLead']);?></p><?php if(!empty($psc['related'])):?><div class="puc-related-inline"><?php foreach($psc['related'] as $link):?><a href="<?php echo esc_url(mrseo_url($link[0]));?>"><?php echo esc_html($link[1]);?> ↗</a><?php endforeach;?></div><?php endif;?></div>
  <a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($psc['finalButton']??$psc['button']);?> ↗</a>
 </div></section>
</div>
