<?php
/** Six distinct premium pages; original Horoshop hub remains intact. */
if(!defined('ABSPATH'))exit;
$key=mrseo_hs_key();
if(!$key){status_header(404);get_header();get_footer();return;}
$p=mrseo_hs_pages()[$key];
$keys=array_keys(mrseo_hs_pages());
$scenes=array(
 'setup'=>array('Каталог','Кошик','Замовлення'),
 'seo'=>array('Запит','Категорія','Пошук'),
 'audit'=>array('URL','Правила','Звіт'),
 'ads'=>array('Товари','Кампанії','Продажі'),
 'feeds'=>array('Фід','Перевірка','Google'),
 'ga4'=>array('Покупка','GA4','Google Ads')
);
$visual=$scenes[$key];
get_header();
?>
<div class="hs-premium hs-premium--<?php echo esc_attr($key);?>" data-hs-premium="<?php echo esc_attr($key);?>">
 <section class="hs-premium-hero">
  <div class="hs-premium-wrap hs-premium-hero-grid">
   <div class="hs-premium-copy">
    <nav class="hs-premium-breadcrumb" aria-label="Навігаційний шлях"><a href="<?php echo esc_url(mrseo_url('','uk'));?>">Головна</a><span aria-hidden="true">/</span><a href="<?php echo esc_url(mrseo_url('horoshop','uk'));?>">Хорошоп</a><span aria-hidden="true">/</span><span><?php echo esc_html($p[0]);?></span></nav>
    <div class="hs-premium-partner"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-wordmark.svg');?>" width="157" height="30" alt="Хорошоп" loading="eager" decoding="async"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/horoshop-partner-active.svg');?>" width="68" height="50" alt="Хорошоп Partner ACTIVE" loading="eager" decoding="async"></div>
    <span class="hs-premium-eyebrow"><?php echo esc_html($p[3]);?></span>
    <h1><?php echo esc_html($p[0]);?><em><?php echo esc_html($p[1]);?></em></h1>
    <p class="hs-premium-lead"><?php echo esc_html($p[2]);?></p>
    <p class="hs-premium-issue"><?php echo esc_html($p[4]);?></p>
    <div class="hs-premium-buttons"><a class="hs-premium-button" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити задачу <span aria-hidden="true">↗</span></a><a class="hs-premium-textlink" href="#hs-process">Що зробимо <span aria-hidden="true">↓</span></a></div>
   </div>
   <div class="hs-premium-visual" role="img" aria-label="<?php echo esc_attr('Схема: '.$visual[0].' — '.$visual[1].' — '.$visual[2]);?>">
    <div class="hs-premium-visual-top"><span class="hs-premium-dot"></span><span class="hs-premium-dot"></span><span class="hs-premium-dot"></span><span>HOROSHOP / <?php echo esc_html(strtoupper($key));?></span></div>
    <div class="hs-premium-scene" aria-hidden="true">
     <svg viewBox="0 0 570 330" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
      <defs><linearGradient id="hsMetal" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#f9eee0"/><stop offset=".54" stop-color="#e5c7a6"/><stop offset="1" stop-color="#b68f73"/></linearGradient></defs>
      <path class="hs-premium-route" d="M100 164 C176 164 183 110 285 110 S402 164 472 164" fill="none" stroke="#c1a38c" stroke-width="3" stroke-dasharray="7 9"/>
      <path class="hs-premium-route-back" d="M100 164 C177 245 386 250 472 164" fill="none" stroke="#b7b5a7" stroke-width="2" stroke-dasharray="3 10"/>
      <g class="hs-premium-node hs-premium-node-one"><rect x="19" y="119" width="158" height="92" rx="17" fill="#fffdfa" stroke="#d5c0aa"/><rect x="28" y="128" width="140" height="74" rx="11" fill="url(#hsMetal)" opacity=".48"/><circle cx="47" cy="148" r="6" fill="#ae5d47"/><rect x="62" y="143" width="83" height="8" rx="4" fill="#ac9987"/><rect x="40" y="169" width="103" height="7" rx="4" fill="#c6b8a5"/><rect x="40" y="183" width="76" height="7" rx="4" fill="#c6b8a5"/></g>
      <g class="hs-premium-node hs-premium-node-two"><circle cx="285" cy="110" r="63" fill="#fffdfa" stroke="#c7ae94" stroke-width="2"/><circle cx="285" cy="110" r="46" fill="#eee1d2" stroke="#d5bea4"/><circle cx="285" cy="110" r="28" fill="#b65b45" opacity=".85"/><path d="M272 110l10 11 19-26" stroke="#fff9ee" stroke-width="7" fill="none" stroke-linecap="round" stroke-linejoin="round"/></g>
      <g class="hs-premium-node hs-premium-node-three"><rect x="393" y="119" width="158" height="92" rx="17" fill="#303b32" stroke="#667167"/><rect x="412" y="139" width="120" height="9" rx="4.5" fill="#afc1ac"/><rect x="412" y="159" width="84" height="8" rx="4" fill="#97a999"/><rect x="412" y="176" width="105" height="7" rx="3.5" fill="#97a999"/></g>
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
      <?php endif;?>
      <circle class="hs-premium-signal" r="7" fill="#b2503c"><animateMotion dur="4.8s" repeatCount="indefinite" path="M100 164 C176 164 183 110 285 110 S402 164 472 164"/></circle>
     </svg>
     <div class="hs-premium-scene-labels"><span><?php echo esc_html($visual[0]);?></span><span><?php echo esc_html($visual[1]);?></span><span><?php echo esc_html($visual[2]);?></span></div>
    </div>
    <p class="hs-premium-scene-caption">Задача <span aria-hidden="true">→</span> перевірка <span aria-hidden="true">→</span> результат</p>
   </div>
  </div>
 </section>
 <section class="hs-premium-problems" id="hs-process">
  <div class="hs-premium-wrap">
   <div class="hs-premium-head"><span class="hs-premium-eyebrow">ПОСЛІДОВНІ КРОКИ</span><h2>Що зробимо <em>для вашого магазину.</em></h2><p>Починаємо з перевірки реальної ситуації, погоджуємо зміни та перевіряємо їхній результат. Ніяких обіцянок, які не залежать від нас.</p></div>
   <div class="hs-premium-steps">
    <?php foreach(array(5,7,9) as $i):?>
    <article class="hs-premium-step">
     <span class="hs-premium-step-number"><?php echo esc_html(str_pad((string)(($i-5)/2+1),2,'0',STR_PAD_LEFT));?></span>
     <h3><?php echo esc_html($p[$i]);?></h3>
     <p><?php echo esc_html($p[$i+1]);?></p>
    </article>
    <?php endforeach;?>
   </div>
  </div>
 </section>
 <section class="hs-premium-outcome">
  <div class="hs-premium-wrap hs-premium-outcome-grid"><div><span class="hs-premium-eyebrow">ПЕРЕВІРЮВАНИЙ РЕЗУЛЬТАТ</span><h2>Що ви <em>отримаєте.</em></h2></div><div><p><?php echo esc_html($p[11]);?></p><a class="hs-premium-button" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити мій магазин ↗</a></div></div>
 </section>
 <section class="hs-premium-faq">
  <div class="hs-premium-wrap hs-premium-faq-grid"><div><span class="hs-premium-eyebrow">ПЕРЕД ПОЧАТКОМ</span><h2>Коротко про <em>роботу.</em></h2></div><div class="hs-premium-faq-list">
   <details><summary><?php echo esc_html($p[12]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($p[13]);?></p></details>
   <details><summary><?php echo esc_html($p[14]);?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($p[15]);?></p></details>
   <details><summary>Чи залежать зміни від тарифу Хорошоп?<span aria-hidden="true">+</span></summary><p>Так. Перш ніж обіцяти конкретний функціонал, перевіримо його доступність у вашому тарифі та способи реалізації.</p></details>
  </div></div>
 </section>
 <section class="hs-premium-related"><div class="hs-premium-wrap"><span class="hs-premium-eyebrow">ПОВ’ЯЗАНІ ПОСЛУГИ</span><div class="hs-premium-related-grid"><a href="<?php echo esc_url(mrseo_url('horoshop','uk'));?>">Усі послуги Хорошоп <span aria-hidden="true">↗</span></a><a href="<?php echo esc_url(mrseo_url($p[16],'uk'));?>"><?php echo esc_html($p[17]);?> <span aria-hidden="true">↗</span></a></div></div></section>
 <section class="hs-premium-final"><div class="hs-premium-wrap"><span class="hs-premium-eyebrow">Є КОНКРЕТНА ПРОБЛЕМА?</span><h2>Опишіть задачу. <em>Знайдемо реальне рішення.</em></h2><p>Надішліть адресу магазину й поясніть, що не працює. Спочатку перевіримо обсяг задачі та можливості платформи.</p><a class="hs-premium-button hs-premium-button-light" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити Хорошоп ↗</a></div></section>
</div>
<?php get_footer();?>
