<?php
/** Six distinct premium pages; original Horoshop hub remains intact. */
if(!defined('ABSPATH'))exit;
$key=mrseo_hs_key();
require_once get_template_directory().'/inc/horoshop-premium-story.php';
require_once get_template_directory().'/inc/horoshop-ads-scenes.php';
if(!$key){status_header(404);get_header();get_footer();return;}
$p=mrseo_hs_pages()[$key];
require_once get_template_directory().'/inc/ua-problem-answers.php';
$ua_hs_problems=mrseo_ua_hs_problem_titles($key);
$keys=array_keys(mrseo_hs_pages());
$scenes=array(
 'setup'=>array('Каталог','Кошик','Замовлення'),
 'seo'=>array('Запит','Категорія','Пошук'),
 'audit'=>array('URL','Правила','Звіт'),
 'ads'=>array('Товари','Кампанії','Продажі'),
 'feeds'=>array('Фід','Перевірка','Google'),
 'ga4'=>array('Покупка','GA4','Google Ads'),
 'search-ads'=>array('Запит','Оголошення','Категорія'),
 'shopping'=>array('Товар','Merchant','Shopping'),
 'pmax'=>array('Фід','Ресурси','Покупки')
);
$visual=$scenes[$key];
// Each service has its own authored diagram geometry, not a generic three-card illustration.
$ua_hs_visuals=json_decode(<<<'MRSEO_UA_HS_UNIQUE_VISUALS'
{"setup":["M48 131h105v65H48zM48 149h105M63 158h22v22H63zM96 162h43m-43 12h43","M255 81h61l-6 43h-49zM267 81V69a9 9 0 0 1 18 0v12M267 135h1m32 0h1","M418 133h106v62H418zM418 151h106M433 164h34m-34 12h24M484 176l8 8 19-19"],"seo":["M39 131h122v65H39zM39 145h122M52 157h31m-31 15h50M52 184h78","M275 82a22 22 0 1 0 0 44 22 22 0 1 0 0-44zM291 119l23 23M260 104h30","M423 135h97v60h-97zM438 181v-34m0 34h67M446 173l15-11 14 4 18-21"],"audit":["M54 124h92v80H54zM64 136h72M64 151h52M64 165h72M64 180h45","M256 75h59v67h-59zM266 88h40m-40 12h30m-30 12h40m-40 12h20M309 134l15 15","M420 128h104v72H420zM432 144h78m-78 16h78m-78 16h78M441 188h55"],"ads":["M47 145h106v45H47zM47 145l-8-13h122l-8 13M64 156h24v34m11-34h23v34","M255 91l48-23v83l-48-25h-17V91zM250 129l10 22M312 91l14-8m-12 26h18m-20 18 14 9","M419 132h105v64H419zM431 182v-36m0 36h81M439 176l17-16 13 9 27-23"],"feeds":["M51 125h75l19 18v60H51zM126 125v18h19M62 153h71m-71 15h71m-71 15h71","M248 83h75v49h-75zM257 96h57m-57 12h57m-57 12h57M284 66v17m-9-9 9 9 9-9","M421 128h100v72H421zM432 140h78m-78 15h78m-78 15h78m-78 15h78M464 140v45"],"ga4":["M39 127h122v75H39zM39 145h122M53 157h41m-41 14h55m-55 14h38M123 155h25v26h-25z","M248 82h73v58h-73zM259 125v-30m0 30h52M268 118v-13m14 13V95m14 23V87","M418 131h108v67H418zM430 144h30v19h-30zM472 144h42v19h-42zM430 174h84v12h-84z"],"search-ads":["M37 132h126v24H37zM48 144h76M146 138a6 6 0 1 0 0 12 6 6 0 1 0 0-12zM37 169h126m-126 15h105","M256 77h61v65h-61zM266 90h40m-40 15h40m-40 15h28M264 131h24","M420 126h102v77H420zM430 139h82M430 151h66M430 172h82v19h-82z"],"shopping":["M48 126h104v77H48zM48 144h104M59 155h33v35H59zM103 157h38m-38 12h38m-38 12h23","M247 78h77v64h-77zM255 90h29v40h-29zM294 91h21m-21 13h21m-21 13h16","M419 126h105v77H419zM419 144h105M430 153h38v28h-38zM476 153h37v28h-37zM430 190h83"],"pmax":["M45 132h110v65H45zM56 145h25v40H56zM88 145h25v40H88zM120 145h24v40h-24z","M285 84a15 15 0 1 0 0 30 15 15 0 1 0 0-30zM285 76v-13m-21 25-21-11m63 11 21-11m-42 37v30M253 135h15m35 0h15","M423 128h98v74h-98zM434 143h28v45h-28zM474 143h35v19h-35zM474 172h35v16h-35z"]}
MRSEO_UA_HS_UNIQUE_VISUALS
,true,512,JSON_THROW_ON_ERROR);
$ua_hs_visual=$ua_hs_visuals[$key]??null;

get_header();
?>
<div class="hs-premium hs-premium--<?php echo esc_attr($key);?>" data-hs-premium="<?php echo esc_attr($key);?>">
 <section data-ua-stage="hero" class="hs-premium-hero">
  <div class="hs-premium-wrap hs-premium-hero-grid">
   <div class="hs-premium-copy">
    <nav class="hs-premium-breadcrumb" aria-label="Навігаційний шлях"><a href="<?php echo esc_url(mrseo_url('','uk'));?>">Головна</a><span aria-hidden="true">/</span><a href="<?php echo esc_url(mrseo_url('horoshop','uk'));?>">Хорошоп</a><span aria-hidden="true">/</span><span><?php echo esc_html($p[0]);?></span></nav>
    <div class="hs-premium-partner"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-wordmark.svg');?>" width="157" height="30" alt="Хорошоп" loading="eager" decoding="async"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-partner-active.svg');?>" width="68" height="50" alt="Хорошоп Partner ACTIVE" loading="eager" decoding="async"></div>
    <p class="hs-premium-trust-inline">Офіційний партнер Хорошоп <span aria-hidden="true">·</span> Команда з 10-річним досвідом у SEO та Google Ads</p>
    <span class="hs-premium-eyebrow"><?php echo esc_html($p[3]);?></span>
    <h1><?php echo esc_html($p[0]);?><em><?php echo esc_html($p[1]);?></em></h1>
    <p class="hs-premium-lead"><?php echo esc_html($p[2]);?></p>
    <p class="hs-premium-issue"><?php echo esc_html($p[4]);?></p>
    <div class="hs-premium-buttons"><a class="hs-premium-button" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити задачу <span aria-hidden="true">↗</span></a><a class="hs-premium-textlink" href="#hs-process">Що зробимо <span aria-hidden="true">↓</span></a></div>
   </div>
   <div class="hs-premium-visual" role="group" aria-label="<?php echo esc_attr('Інтерактивна схема: '.$visual[0].' — '.$visual[1].' — '.$visual[2]);?>" data-hs-active-stage="0">
    <div class="hs-premium-visual-top"><span class="hs-premium-dot"></span><span class="hs-premium-dot"></span><span class="hs-premium-dot"></span><span>HOROSHOP / <?php echo esc_html(strtoupper($key));?></span></div>
    <div class="hs-premium-scene" aria-hidden="true"><div class="hs-premium-scanline"></div>
     <svg viewBox="0 0 570 330" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
      <defs><linearGradient id="hsMetal" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#f9eee0"/><stop offset=".54" stop-color="#e5c7a6"/><stop offset="1" stop-color="#b68f73"/></linearGradient></defs>
      <path class="hs-premium-route" d="M100 164 C176 164 183 110 285 110 S402 164 472 164" fill="none" stroke="#c1a38c" stroke-width="3" stroke-dasharray="7 9"/>
      <path class="hs-premium-route-back" d="M100 164 C177 245 386 250 472 164" fill="none" stroke="#b7b5a7" stroke-width="2" stroke-dasharray="3 10"/>
      <?php if($ua_hs_visual):?>
      <g class="hs-premium-node hs-premium-node-one" stroke="#786c5a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"><rect x="25" y="115" width="150" height="100" rx="17" fill="#fffdfa" stroke="#d5c0aa"/><path d="<?php echo esc_attr($ua_hs_visual[0]);?>"/></g>
      <g class="hs-premium-node hs-premium-node-two" stroke="#A84432" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"><circle cx="285" cy="110" r="63" fill="#fffdfa" stroke="#d0bba2"/><path d="<?php echo esc_attr($ua_hs_visual[1]);?>"/></g>
      <g class="hs-premium-node hs-premium-node-three" stroke="#fff6e9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"><rect x="395" y="115" width="155" height="100" rx="17" fill="#303b32" stroke="#667167"/><path d="<?php echo esc_attr($ua_hs_visual[2]);?>"/></g>
      <?php endif;?>
      <?php /* A distinct service-specific symbolic detail beneath the shared process diagram. */ ?>
      <?php if($key==='setup'):?>
       <g class="hs-premium-service-symbol" fill="none" stroke="#a65d45" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"><path d="M236 267h97l-8 30h-80zM251 267v-12a8 8 0 0 1 16 0v12M304 267v-12a8 8 0 0 1 16 0v12"/><circle cx="256" cy="306" r="4" fill="#a65d45"/><circle cx="310" cy="306" r="4" fill="#a65d45"/></g>
      <?php elseif($key==='seo'):?>
       <g class="hs-premium-service-symbol" fill="none" stroke="#a65d45" stroke-width="5" stroke-linecap="round"><circle cx="279" cy="274" r="27"/><path d="M300 295l21 21M262 274h34M279 258v32"/></g>
      <?php elseif($key==='audit'):?>
       <g class="hs-premium-service-symbol" fill="none" stroke="#a65d45" stroke-width="5" stroke-linejoin="round" stroke-linecap="round"><rect x="253" y="236" width="66" height="76" rx="9"/><path d="M267 256h37M267 274h26M267 291h31"/><circle cx="319" cy="301" r="16" fill="#f9eee0"/><path d="M329 311l10 11"/></g>
      <?php elseif($key==='ads'):?>
       <g class="hs-premium-service-symbol" fill="none" stroke="#a65d45" stroke-width="5" stroke-linejoin="round" stroke-linecap="round"><path d="M252 295v-33l45-24v70l-45-21M252 267h-20v23h20M249 293l10 25M313 256l16-11M313 273h22M313 290l16 12"/></g>
      <?php elseif($key==='feeds'):?>
       <g class="hs-premium-service-symbol" fill="none" stroke="#a65d45" stroke-width="5" stroke-linecap="round"><rect x="235" y="246" width="94" height="66" rx="8"/><path d="M248 262h48M248 280h66M248 296h39M300 233v24M291 248l9 9 9-9"/></g>
      <?php elseif($key==='ga4'):?>
       <g class="hs-premium-service-symbol" fill="#a65d45"><rect x="240" y="284" width="19" height="28" rx="7"/><rect x="272" y="266" width="19" height="46" rx="7"/><rect x="304" y="244" width="19" height="68" rx="7"/><circle cx="249" cy="264" r="7" fill="#caab8f"/></g>
      <?php elseif($key==='search-ads'):?>
       <g class="hs-premium-service-symbol" fill="none" stroke="#a65d45" stroke-width="5" stroke-linecap="round"><circle cx="271" cy="272" r="26"/><path d="M290 292l25 24"/><path d="M255 270h30M255 281h18"/></g>
      <?php elseif($key==='shopping'):?>
       <g class="hs-premium-service-symbol" fill="none" stroke="#a65d45" stroke-width="5" stroke-linejoin="round"><path d="M238 252h88v59h-88zM238 270h88M248 244h68v8"/><path d="M258 286h48M258 297h30"/></g>
      <?php elseif($key==='pmax'):?>
       <g class="hs-premium-service-symbol" fill="none" stroke="#a65d45" stroke-width="4" stroke-linejoin="round"><circle cx="283" cy="277" r="23"/><circle cx="238" cy="304" r="9"/><circle cx="328" cy="304" r="9"/><path d="M264 291l-20 10M302 291l20 10M283 254v-22"/></g>
      <?php endif;?>
      <circle class="hs-premium-ping hs-premium-ping--one" cx="100" cy="164" r="20" fill="none" stroke="#b75942" stroke-width="2"/>
      <circle class="hs-premium-ping hs-premium-ping--two" cx="285" cy="110" r="69" fill="none" stroke="#b75942" stroke-width="2"/>
      <circle class="hs-premium-ping hs-premium-ping--three" cx="472" cy="164" r="25" fill="none" stroke="#b75942" stroke-width="2"/>
      <g class="hs-premium-meter" aria-hidden="true">
       <rect x="214" y="319" width="142" height="4" rx="2" fill="#d2c5b5"/>
       <rect x="214" y="319" width="142" height="4" rx="2" fill="#ab5643" class="hs-premium-meter-progress"/>
      </g>
      <circle class="hs-premium-signal" r="7" fill="#b2503c"><animateMotion dur="4.8s" repeatCount="indefinite" path="M100 164 C176 164 183 110 285 110 S402 164 472 164"/></circle>
     </svg>
     <div class="hs-premium-scene-labels" role="group" aria-label="Кроки роботи">
      <?php foreach($visual as $index=>$label):?><button class="hs-premium-stage-button<?php echo $index===0?' is-active':'';?>" type="button" data-hs-stage="<?php echo esc_attr((string)$index);?>" aria-pressed="<?php echo $index===0?'true':'false';?>"><span class="hs-premium-stage-index"><?php echo esc_html('0'.($index+1));?></span><span><?php echo esc_html($label);?></span></button><?php endforeach;?>
     </div>
     <p class="hs-premium-stage-description" data-hs-stage-description aria-live="polite" data-hs-stage-text="<?php echo esc_attr(wp_json_encode(array($p[6],$p[8],$p[10]),JSON_UNESCAPED_UNICODE));?>"><?php echo esc_html($p[6]);?></p>
    </div>
    <p class="hs-premium-scene-caption">Задача <span aria-hidden="true">→</span> перевірка <span aria-hidden="true">→</span> результат</p>
   </div>
  </div>
 </section>
 
 <section data-ua-stage="problems" class="hs-premium-problems" id="hs-process">
  <div class="hs-premium-wrap">
   <div class="hs-premium-head"><span class="hs-premium-eyebrow">02 / ПРОБЛЕМА → РІШЕННЯ</span><h2>Що зробимо <em>для вашого магазину.</em></h2><p>Починаємо з перевірки реальної ситуації, погоджуємо зміни та перевіряємо їхній результат. Ніяких обіцянок, які не залежать від нас.</p></div>
   <div class="hs-premium-steps">
    <?php foreach(array(5,7,9) as $i):?>
    <article class="hs-premium-step ua-paired-row ua-paired-row--compact" data-ua-problem-pair>
     <div class="hs-story-step-visual" aria-hidden="true"><span class="hs-story-step-ring"></span><span class="hs-story-step-core"><i></i><i></i><i></i></span><span class="hs-story-step-ray"></span></div>
     <span class="hs-premium-step-number"><?php echo esc_html(str_pad((string)(($i-5)/2+1),2,'0',STR_PAD_LEFT));?></span>
     <div class="ua-paired-problem"><span class="ua-pair-label">ПРОБЛЕМА</span><h3><?php echo esc_html($ua_hs_problems[(int)(($i-5)/2)]);?></h3></div>
     <div class="ua-paired-answer"><span>НАШЕ РІШЕННЯ</span><h4><?php echo esc_html($p[$i]);?></h4><p><?php echo esc_html($p[$i+1]);?></p></div>
    </article>
    <?php endforeach;?>
   </div>
  </div>
 </section>
 <?php mrseo_ua_v2_approach('horoshop/'.$key);?>
 <?php mrseo_hs_trust(); ?>
 <?php mrseo_hs_paid_scene($key);?>
 <?php mrseo_hs_workbench($key);?>
 <section data-ua-stage="result" class="hs-premium-outcome">
  <div class="hs-premium-wrap hs-premium-outcome-grid"><div><span class="hs-premium-eyebrow">05 / ПЕРЕВІРЮВАНИЙ РЕЗУЛЬТАТ</span><h2>Що ви <em>отримаєте.</em></h2></div><div><p><?php echo esc_html($p[11]);?></p><?php mrseo_hs_result_visual($key);?><a class="hs-premium-button" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити мій магазин ↗</a></div></div>
 </section>
 <?php mrseo_ua_v2_terms("Перед змінами перевіряємо можливості вашого тарифу Хорошоп; оплату платформи й сторонніх сервісів погоджуємо окремо.");?>
 <section data-ua-stage="faq" class="hs-premium-faq">
  <div class="hs-premium-wrap hs-premium-faq-grid"><div><span class="hs-premium-eyebrow">07 / ПЕРЕД ПОЧАТКОМ</span><h2>Коротко про <em>роботу.</em></h2></div><div class="hs-premium-faq-list">
   <details><summary><?php echo esc_html($p[12]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($p[13]);?></p></details>
   <details><summary><?php echo esc_html($p[14]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($p[15]);?></p></details>
   <details><summary>Чи залежать зміни від тарифу Хорошоп?<span aria-hidden="true">+</span></summary><p>Так. Перш ніж обіцяти конкретний функціонал, перевіримо його доступність у вашому тарифі та способи реалізації.</p></details>
  </div></div>
 </section>
 <section class="hs-premium-related"><div class="hs-premium-wrap"><span class="hs-premium-eyebrow">ПОВ’ЯЗАНІ ПОСЛУГИ</span><div class="hs-premium-related-grid"><a href="<?php echo esc_url(mrseo_url('horoshop','uk'));?>">Усі послуги Хорошоп <span aria-hidden="true">↗</span></a><a href="<?php echo esc_url(mrseo_url($p[16],'uk'));?>"><?php echo esc_html($p[17]);?> <span aria-hidden="true">↗</span></a><?php if($key==='seo'):?><a href="<?php echo esc_url(mrseo_hs_url('audit'));?>">SEO-аудит сайтів на Хорошоп <span aria-hidden="true">↗</span></a><?php elseif($key==='audit'):?><a href="<?php echo esc_url(mrseo_hs_url('seo'));?>">SEO-просування сайтів на Хорошоп <span aria-hidden="true">↗</span></a><?php elseif(in_array($key,array('ads','search-ads','shopping','pmax'),true)):?><?php foreach(array('search-ads'=>'Пошукова реклама для Хорошоп','shopping'=>'Google Shopping для Хорошоп','pmax'=>'Performance Max для Хорошоп') as $other=>$label):?><?php if($key!==$other):?><a href="<?php echo esc_url(mrseo_hs_url($other));?>"><?php echo esc_html($label);?> <span aria-hidden="true">↗</span></a><?php endif;?><?php endforeach;?><?php endif;?></div></div></section>
 <section data-ua-stage="cta" class="hs-premium-final"><div class="hs-premium-wrap"><div class="hs-story-final-orbit" aria-hidden="true"><i></i><i></i><i></i><span></span></div><span class="hs-premium-eyebrow">Є КОНКРЕТНА ПРОБЛЕМА?</span><h2>Опишіть задачу. <em>Знайдемо реальне рішення.</em></h2><p>Надішліть адресу магазину й поясніть, що не працює. Спочатку перевіримо обсяг задачі та можливості платформи.</p><a class="hs-premium-button hs-premium-button-light" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити Хорошоп ↗</a></div></section>
</div>
<?php get_footer();?>
