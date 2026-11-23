<?php
/**
 * Premium unified UA WebDev hero diagrams. Based on the existing business-automation
 * card language: 3 dimensional metal/rose cards, curved data paths and three clear phases.
 * Distinct icons and meanings per service; schematic only, no simulated client outcomes.
 */
if(!defined('ABSPATH'))exit;

function mrseo_udv_master_scene_data($scene){
 $scenes=array(
  'portal'=>array(array('Вхід','lock'),array('Дані','file'),array('Статус','check')),
  'parsing'=>array(array('Джерела','database'),array('Зіставлення','merge'),array('Каталог','list')),
  'payment'=>array(array('Оплата','card'),array('Перевірка','shield'),array('Статус','check')),
  'mobile'=>array(array('Екран','phone'),array('Дія','touch'),array('Сповіщення','bell')),
  'shop'=>array(array('Товар','box'),array('Кошик','cart'),array('Замовлення','bag')),
  'team'=>array(array('Завдання','clipboard'),array('Виконання','users'),array('Звіт','check')),
  'pwa'=>array(array('Браузер','browser'),array('Встановлення','download'),array('Офлайн','cloud'))
 );
 return $scenes[$scene]??null;
}
function mrseo_udv_master_hero_accents(){
 return array(
  'portal'=>'Клієнт бачить усе сам.',
  'parsing'=>'Без ручних оновлень.',
  'payment'=>'Без загублених оплат.',
  'mobile'=>'Під ваші сценарії.',
  'shop'=>'Щоб купували знову.',
  'team'=>'Команда працює злагоджено.',
  'pwa'=>'Вебсервіс як застосунок.'
 );
}

/**
 * Each hero is composed individually; shared palette is the only common visual grammar.
 * SVG intrinsic 720×520 keeps dimensions stable before the stylesheet loads.
 */
function mrseo_udv_master_scene($scene){
 if(!mrseo_udv_master_scene_data($scene))return;
 $names=array(
  'portal'=>'Захищений кабінет та ролі',
  'parsing'=>'Потік даних та синхронізація',
  'payment'=>'Безпечний шлях платежу',
  'mobile'=>'Мобільні інтерфейси та події',
  'shop'=>'Мобільні покупки',
  'team'=>'Робочі процеси команди',
  'pwa'=>'Встановлюваний вебзастосунок'
 );
 ?>
 <svg class="psc-motion puc-motion udv-kinetic-svg udv-kinetic-svg--<?php echo esc_attr($scene);?>" data-udv-svg="<?php echo esc_attr($scene);?>" viewBox="0 0 720 520" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
  <defs>
   <linearGradient id="udv-milk" x1="0" x2="1" y1="0" y2="1"><stop stop-color="#fffdf6"/><stop offset="1" stop-color="#e9dcc9"/></linearGradient>
   <linearGradient id="udv-rose" x1="0" x2="1" y1="0" y2="1"><stop stop-color="#ecc5ae"/><stop offset="1" stop-color="#b75e49"/></linearGradient>
   <linearGradient id="udv-sage" x1="0" x2="1" y1="0" y2="1"><stop stop-color="#eef4e9"/><stop offset="1" stop-color="#bdd2bd"/></linearGradient>
   <filter id="udv-relief" x="-30%" y="-40%" width="170%" height="190%"><feDropShadow dx="0" dy="11" stdDeviation="10" flood-color="#614c34" flood-opacity=".19"/></filter>
   <pattern id="udv-points" width="29" height="29" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="1" fill="#bb9c7a" opacity=".33"/></pattern>
  </defs>
  <rect width="720" height="520" fill="url(#udv-points)" opacity=".43"/>
  <text class="udv-graphic-kicker" x="36" y="45"><?php echo esc_html($names[$scene]);?></text>
  <?php switch($scene):
  case 'portal':?>
    <path id="udv-path-portal" d="M388 249 C440 240 452 148 502 148" class="udv-connector"/>
    <path d="M388 282 C444 291 454 370 502 370" class="udv-connector"/>
    <g data-udv-part="0" class="udv-kinetic-card">
     <rect x="43" y="83" width="351" height="340" rx="25" fill="url(#udv-milk)" stroke="#bba48b" stroke-width="2" filter="url(#udv-relief)"/>
     <rect x="62" y="101" width="312" height="51" rx="13" fill="#e9ded0"/>
     <circle cx="88" cy="127" r="9" fill="#b75e49"/><text x="111" y="133" class="udv-svg-small">КАБІНЕТ КЛІЄНТА</text>
     <circle cx="136" cy="218" r="42" fill="#e2eadf" stroke="#adbea9" stroke-width="2"/>
     <path d="M116 233q20-31 40 0M136 202a12 12 0 1 0 0-24a12 12 0 0 0 0 24" fill="none" stroke="#56745e" stroke-width="5" stroke-linecap="round"/>
     <text x="205" y="204" class="udv-svg-title">Особистий доступ</text><text x="205" y="232" class="udv-svg-small">Ролі та права користувачів</text>
     <rect x="85" y="291" width="265" height="15" rx="7" fill="#d7cebf"/><rect x="85" y="324" width="212" height="15" rx="7" fill="#e5dbcf"/><rect x="85" y="356" width="245" height="15" rx="7" fill="#e5dbcf"/>
    </g>
    <g data-udv-part="1" class="udv-kinetic-card">
     <rect x="493" y="88" width="194" height="147" rx="23" fill="url(#udv-rose)" stroke="#ae7d67" stroke-width="2" filter="url(#udv-relief)"/>
     <path d="M529 130h43l16 16v38h-59zM572 130v16h16M539 158h36M539 170h28" stroke="#fff4ea" stroke-width="4" fill="none" stroke-linejoin="round"/>
     <text x="519" y="213" class="udv-svg-label">Документи</text>
    </g>
    <g data-udv-part="2" class="udv-kinetic-card">
     <rect x="493" y="294" width="194" height="147" rx="23" fill="url(#udv-sage)" stroke="#a6b5a5" stroke-width="2" filter="url(#udv-relief)"/>
     <circle cx="589" cy="345" r="27" stroke="#6a9271" stroke-width="4" fill="none"/><path d="M573 345l11 11 21-25" stroke="#6a9271" stroke-width="5" stroke-linecap="round" fill="none"/>
     <text x="519" y="417" class="udv-svg-label">Статус заявки</text>
    </g>
    <circle class="udv-moving-point" r="7"><animateMotion dur="4s" repeatCount="indefinite" path="M388 249 C440 240 452 148 502 148"/></circle>
  <?php break;case 'parsing':?>
    <path d="M194 260H279M455 260H539" class="udv-connector"/>
    <g data-udv-part="0" class="udv-kinetic-card">
     <text x="58" y="93" class="udv-svg-small">ЗОВНІШНІ ДЖЕРЕЛА</text>
     <?php foreach(array('API','CSV','Прайс') as $i=>$label):?>
      <rect x="54" y="<?php echo (int)(126+$i*91);?>" width="146" height="71" rx="15" fill="url(#udv-milk)" stroke="#b9a78f" filter="url(#udv-relief)"/>
      <circle cx="82" cy="<?php echo (int)(162+$i*91);?>" r="11" fill="<?php echo $i===1?'#b7644f':'#d5c6b4';?>"/>
      <text x="108" y="<?php echo (int)(168+$i*91);?>" class="udv-svg-label"><?php echo esc_html($label);?></text>
     <?php endforeach;?>
    </g>
    <g data-udv-part="1" class="udv-kinetic-card">
     <rect x="267" y="143" width="203" height="235" rx="28" fill="url(#udv-rose)" stroke="#bd8b78" stroke-width="2" filter="url(#udv-relief)"/>
     <circle cx="369" cy="231" r="54" fill="none" stroke="#fff1e4" stroke-width="3" stroke-dasharray="8 12" class="udv-gear"/>
     <path d="M333 231h73M369 194v74M343 205l52 52M395 205l-52 52" stroke="#fff8f0" stroke-width="5" stroke-linecap="round"/>
     <text x="298" y="329" class="udv-svg-label">Зіставлення</text>
    </g>
    <g data-udv-part="2" class="udv-kinetic-card">
     <rect x="528" y="106" width="162" height="326" rx="23" fill="url(#udv-sage)" stroke="#a5b7a4" stroke-width="2" filter="url(#udv-relief)"/>
     <text x="551" y="144" class="udv-svg-small">КАТАЛОГ</text>
     <?php foreach(array('SKU','ЦІНА','ЗАЛИШОК') as $i=>$label):?>
      <rect x="546" y="<?php echo (int)(179+$i*67);?>" width="126" height="48" rx="9" fill="#f8faf5" stroke="#c7d7c7"/>
      <text x="556" y="<?php echo (int)(208+$i*67);?>" class="udv-svg-small"><?php echo esc_html($label);?></text><circle cx="651" cy="<?php echo (int)(202+$i*67);?>" r="5" fill="#72937b"/>
     <?php endforeach;?>
    </g>
    <circle class="udv-moving-point" r="7"><animateMotion dur="2.8s" repeatCount="indefinite" path="M198 260H530"/></circle>
  <?php break;case 'payment':?>
    <path d="M273 245H445" class="udv-connector"/>
    <g data-udv-part="0" class="udv-kinetic-card">
     <rect x="49" y="110" width="247" height="280" rx="25" fill="url(#udv-milk)" stroke="#b8a187" stroke-width="2" filter="url(#udv-relief)"/>
     <text x="79" y="153" class="udv-svg-small">ОФОРМЛЕННЯ</text>
     <rect x="77" y="187" width="191" height="108" rx="15" fill="#e6d9c9" stroke="#bba188"/>
     <path d="M95 220h150M96 246h72" stroke="#826b57" stroke-width="7" stroke-linecap="round"/>
     <rect x="77" y="322" width="191" height="39" rx="10" fill="#b05745"/>
     <text x="118" y="348" class="udv-svg-label" fill="#fffaf1">Оплатити</text>
    </g>
    <g data-udv-part="1" class="udv-kinetic-card">
     <path d="M365 151l73 69-73 69-73-69z" fill="url(#udv-rose)" stroke="#b07f6a" stroke-width="2" filter="url(#udv-relief)"/>
     <path d="M344 221l14 14 27-31" stroke="#fff8f0" stroke-width="7" fill="none" stroke-linecap="round"/>
     <text x="318" y="319" class="udv-svg-small">WEBHOOK / API</text>
    </g>
    <g data-udv-part="2" class="udv-kinetic-card">
     <rect x="451" y="87" width="222" height="333" rx="25" fill="url(#udv-sage)" stroke="#a5b6a1" stroke-width="2" filter="url(#udv-relief)"/>
     <text x="475" y="127" class="udv-svg-small">СТАТУС ЗАМОВЛЕННЯ</text>
     <circle cx="562" cy="226" r="58" fill="#f9faf3" stroke="#a6bea8" stroke-width="2"/>
     <path d="M531 227l22 21 40-49" stroke="#629171" stroke-width="9" fill="none" stroke-linecap="round"/>
     <text x="499" y="343" class="udv-svg-label">Підтверджено</text>
    </g>
    <circle class="udv-moving-point" r="7"><animateMotion dur="3.6s" repeatCount="indefinite" path="M278 245H443"/></circle>
  <?php break;case 'mobile':?>
    <?php foreach(array(array(73,152,207,282,'ЕКРАН'),array(268,72,211,373,'ДІЯ'),array(488,139,162,275,'PUSH')) as $i=>$c):?>
     <g data-udv-part="<?php echo (int)$i;?>" class="udv-kinetic-card">
      <rect x="<?php echo (int)$c[0];?>" y="<?php echo (int)$c[1];?>" width="<?php echo (int)$c[2];?>" height="<?php echo (int)$c[3];?>" rx="31" fill="<?php echo $i===1?'url(#udv-rose)':'url(#udv-milk)';?>" stroke="#8b7766" stroke-width="7" filter="url(#udv-relief)"/>
      <rect x="<?php echo (int)($c[0]+13);?>" y="<?php echo (int)($c[1]+24);?>" width="<?php echo (int)($c[2]-26);?>" height="<?php echo (int)($c[3]-44);?>" rx="16" fill="<?php echo $i===1?'#fbede2':'#f8f9f2';?>"/>
      <path d="M<?php echo (int)($c[0]+$c[2]/2-23);?> <?php echo (int)($c[1]+16);?>h46" stroke="#807064" stroke-width="5" stroke-linecap="round"/>
      <text x="<?php echo (int)($c[0]+25);?>" y="<?php echo (int)($c[1]+91);?>" class="udv-svg-small"><?php echo esc_html($c[4]);?></text>
      <rect x="<?php echo (int)($c[0]+27);?>" y="<?php echo (int)($c[1]+120);?>" width="<?php echo (int)($c[2]-54);?>" height="50" rx="12" fill="<?php echo $i===1?'#dfb3a0':'#e2e9df';?>"/>
      <path d="M<?php echo (int)($c[0]+30);?> <?php echo (int)($c[1]+200);?>h<?php echo (int)($c[2]-72);?>" stroke="#b0b8aa" stroke-width="8" stroke-linecap="round"/>
      <?php if($i===2):?><circle cx="<?php echo (int)($c[0]+$c[2]-24);?>" cy="<?php echo (int)($c[1]+35);?>" r="15" fill="#b7503d" class="udv-alert-pulse"/><?php endif;?>
     </g>
    <?php endforeach;?>
    <path d="M234 460Q357 487 511 436" class="udv-connector" stroke-dasharray="6 10"/>
    <circle class="udv-moving-point" r="7"><animateMotion dur="4.5s" repeatCount="indefinite" path="M234 460Q357 487 511 436"/></circle>
  <?php break;case 'shop':?>
    <path d="M272 250Q359 156 456 250" class="udv-connector"/>
    <g data-udv-part="0" class="udv-kinetic-card">
     <rect x="40" y="99" width="261" height="328" rx="26" fill="url(#udv-milk)" stroke="#b9a68b" stroke-width="2" filter="url(#udv-relief)"/>
     <text x="69" y="137" class="udv-svg-small">КАТАЛОГ</text>
     <?php foreach(array(0,1,2,3) as $i):$x=68+($i%2)*104;$y=164+intdiv($i,2)*109;?>
      <rect x="<?php echo $x;?>" y="<?php echo $y;?>" width="90" height="93" rx="12" fill="<?php echo $i%2?'#e2eadd':'#eddfd1';?>" stroke="#d1c1b0"/>
      <rect x="<?php echo $x+13;?>" y="<?php echo $y+12;?>" width="64" height="44" rx="8" fill="#d6c3ad"/><path d="M<?php echo $x+13;?> <?php echo $y+68;?>h55" stroke="#a3917e" stroke-width="6" stroke-linecap="round"/>
     <?php endforeach;?>
    </g>
    <g data-udv-part="1" class="udv-kinetic-card">
     <circle cx="370" cy="222" r="65" fill="url(#udv-rose)" stroke="#b78670" stroke-width="2" filter="url(#udv-relief)"/>
     <path d="M329 194h13l10 46h42l13-35h-57M355 258h3M390 258h3" fill="none" stroke="#fff4ec" stroke-width="6" stroke-linecap="round"/>
     <text x="334" y="321" class="udv-svg-label">Кошик</text>
    </g>
    <g data-udv-part="2" class="udv-kinetic-card">
     <rect x="459" y="120" width="218" height="292" rx="25" fill="url(#udv-sage)" stroke="#a6baa6" stroke-width="2" filter="url(#udv-relief)"/>
     <text x="479" y="161" class="udv-svg-small">ЗАМОВЛЕННЯ</text>
     <circle cx="568" cy="235" r="52" fill="#f6faf3"/><path d="M540 234l22 21 37-45" stroke="#719579" stroke-width="8" fill="none" stroke-linecap="round"/>
     <text x="493" y="342" class="udv-svg-label">Оформлено</text>
    </g>
    <circle class="udv-moving-point" r="7"><animateMotion dur="3.9s" repeatCount="indefinite" path="M279 249Q365 153 460 246"/></circle>
  <?php break;case 'team':?>
    <g class="udv-team-board">
     <rect x="40" y="88" width="640" height="354" rx="27" fill="#fff9f0" stroke="#c9b39a" stroke-width="2" filter="url(#udv-relief)"/>
     <rect x="40" y="88" width="640" height="65" rx="25" fill="#e7dccc"/>
     <text x="72" y="129" class="udv-svg-small">РОБОЧА ДОШКА КОМАНДИ</text><circle cx="628" cy="121" r="10" fill="#76967b"/>
    </g>
    <?php foreach(array(array(61,'НОВЕ'),array(279,'В РОБОТІ'),array(497,'ГОТОВО')) as $i=>$d):?>
     <g class="udv-kinetic-card" data-udv-part="<?php echo $i;?>">
      <rect x="<?php echo $d[0];?>" y="170" width="190" height="247" rx="18" fill="<?php echo $i===1?'url(#udv-rose)':'url(#udv-milk)';?>" stroke="#c3ab93"/>
      <text x="<?php echo $d[0]+17;?>" y="203" class="udv-svg-small"><?php echo esc_html($d[1]);?></text>
      <rect x="<?php echo $d[0]+17;?>" y="225" width="155" height="119" rx="12" fill="<?php echo $i===1?'#f8e8dd':'#e6eadd';?>"/>
      <circle cx="<?php echo $d[0]+41;?>" cy="254" r="14" fill="#b2c6b1"/>
      <path d="M<?php echo $d[0]+66;?> 250h72M<?php echo $d[0]+28;?> 287h125M<?php echo $d[0]+28;?> 315h91" stroke="#a2a99c" stroke-width="7" stroke-linecap="round"/>
      <rect x="<?php echo $d[0]+18;?>" y="363" width="81" height="18" rx="9" fill="<?php echo $i===2?'#a9c6aa':'#d0c6b8';?>"/>
     </g>
    <?php endforeach;?>
    <circle class="udv-moving-point" r="8"><animateMotion dur="5s" repeatCount="indefinite" path="M160 365H596"/></circle>
  <?php break;case 'pwa':?>
    <g data-udv-part="0" class="udv-kinetic-card">
     <rect x="49" y="113" width="398" height="296" rx="25" fill="url(#udv-milk)" stroke="#b6a58d" stroke-width="2" filter="url(#udv-relief)"/>
     <rect x="49" y="113" width="398" height="53" rx="23" fill="#e8dfd2"/>
     <circle cx="82" cy="141" r="7" fill="#bf6e58"/><circle cx="103" cy="141" r="7" fill="#c9baaa"/><circle cx="124" cy="141" r="7" fill="#c9baaa"/>
     <rect x="157" y="128" width="247" height="25" rx="9" fill="#f9f4ed"/><text x="201" y="145" class="udv-svg-tiny">app.example</text>
     <text x="95" y="223" class="udv-svg-title">Ваш вебсервіс</text>
     <rect x="95" y="258" width="129" height="87" rx="13" fill="#dee8da"/><rect x="239" y="258" width="129" height="87" rx="13" fill="#e8dbcb"/>
     <path d="M119 300h72M264 300h72" stroke="#a2b3a0" stroke-width="7" stroke-linecap="round"/>
    </g>
    <g data-udv-part="1" class="udv-kinetic-card">
     <rect x="391" y="182" width="213" height="140" rx="22" fill="url(#udv-rose)" stroke="#be8b75" filter="url(#udv-relief)"/>
     <path d="M498 210v54M477 246l21 21 21-21M468 284h60" stroke="#fff7ed" stroke-width="7" fill="none" stroke-linecap="round"/>
     <text x="426" y="305" class="udv-svg-small" fill="#fff">ВСТАНОВИТИ</text>
    </g>
    <g data-udv-part="2" class="udv-kinetic-card">
     <circle cx="610" cy="380" r="78" fill="url(#udv-sage)" stroke="#a5baa7" stroke-width="2" filter="url(#udv-relief)"/>
     <path d="M574 387h69q20-5 14-25q-4-14-20-13q-8-24-31-19q-23 2-23 23q-19-1-20 17q0 11 11 17z" fill="none" stroke="#719577" stroke-width="4" stroke-linejoin="round"/>
     <text x="581" y="423" class="udv-svg-small">ОФЛАЙН</text>
    </g>
    <circle class="udv-moving-point" r="7"><animateMotion dur="4.3s" repeatCount="indefinite" path="M430 260C520 190 595 262 613 325"/></circle>
  <?php break;endswitch;?>
 </svg>
 <?php
}

/** Distinct second- and third-screen diagrams. Labels come from the same user-approved
 *  pain/action copy so every animated visualization explains a specific business issue.
 */
function mrseo_udv_lower_art($scene,$variant,$items){
 $is_problem=$variant==='problem';
 $tone=$is_problem?'#bd6a54':'#648c70';
 $title=$is_problem?'ДЕ ВИНИКАЄ ВТРАТА':'ЯК ПРОХОДИТЬ РІШЕННЯ';
 $layout=array(
  'portal'=>array('identity','document','history'),
  'parsing'=>array('feed','transform','catalog'),
  'payment'=>array('checkout','callback','order'),
  'mobile'=>array('phone','gesture','push'),
  'shop'=>array('product','basket','delivery'),
  'team'=>array('task','progress','report'),
  'pwa'=>array('browser','install','offline')
 );
 $nodes=$layout[$scene]??array('source','change','result');
 ?>
 <div class="udv-lower-graphic udv-lower-graphic--<?php echo esc_attr($scene.'-'.$variant);?>" data-udv-lower="<?php echo esc_attr($variant);?>" role="img" aria-label="<?php echo esc_attr($title.': '.implode(' → ',array_column($items,0)));?>">
 <div class="udv-lower-graphic-top"><span><?php echo esc_html($title);?></span><span>MRSEO / <?php echo $is_problem?'02':'03';?></span></div>
 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 660 280" class="udv-lower-svg" aria-hidden="true" focusable="false">
  <defs><linearGradient id="udv-lower-<?php echo esc_attr($variant);?>-face" x2="0.8" y2="1"><stop stop-color="#fffdf6"/><stop offset="1" stop-color="#e6d9c6"/></linearGradient></defs>
  <?php if($scene==='mobile'||$scene==='pwa'):?>
   <path class="udv-lower-connector" d="M135 138C235 76 373 198 530 135" fill="none" stroke="<?php echo esc_attr($tone);?>" stroke-width="3"/>
  <?php elseif($scene==='payment'||$scene==='shop'):?>
   <path class="udv-lower-connector" d="M137 143Q330 48 525 144" fill="none" stroke="<?php echo esc_attr($tone);?>" stroke-width="3"/>
  <?php else:?>
   <path class="udv-lower-connector" d="M137 146H521" fill="none" stroke="<?php echo esc_attr($tone);?>" stroke-width="3" stroke-dasharray="5 10"/>
  <?php endif;?>
  <?php foreach($nodes as $i=>$node):$x=37+$i*218;$y=($i===1?78:100);?>
   <g class="udv-lower-node" data-udv-lower-step="<?php echo (int)$i;?>">
    <rect x="<?php echo (int)$x;?>" y="<?php echo (int)$y;?>" width="150" height="130" rx="<?php echo in_array($scene,array('mobile','pwa'),true)?'29':'19';?>" fill="<?php echo $i===1?'#e4bbaa':'url(#udv-lower-'.esc_attr($variant).'-face)';?>" stroke="#bca58d" stroke-width="2"/>
    <text x="<?php echo (int)($x+17);?>" y="<?php echo (int)($y+33);?>" class="udv-lower-index">0<?php echo (int)($i+1);?></text>
    <?php if(in_array($scene,array('mobile','pwa'),true)):?>
      <rect x="<?php echo (int)($x+19);?>" y="<?php echo (int)($y+50);?>" width="112" height="49" rx="9" fill="#f6eee2" stroke="#ccb9a4"/>
      <path d="M<?php echo (int)($x+31);?> <?php echo (int)($y+65);?>h81M<?php echo (int)($x+31);?> <?php echo (int)($y+80);?>h50" stroke="#bfac97" stroke-width="6" stroke-linecap="round"/>
    <?php elseif($scene==='parsing'):?>
      <rect x="<?php echo (int)($x+24);?>" y="<?php echo (int)($y+51);?>" width="96" height="13" rx="6" fill="#c9baa8"/>
      <rect x="<?php echo (int)($x+24);?>" y="<?php echo (int)($y+77);?>" width="72" height="13" rx="6" fill="#c9baa8"/>
      <circle cx="<?php echo (int)($x+126);?>" cy="<?php echo (int)($y+83);?>" r="6" fill="#9cad9d"/>
    <?php elseif($scene==='team'):?>
      <circle cx="<?php echo (int)($x+43);?>" cy="<?php echo (int)($y+69);?>" r="17" fill="#d4c9b7"/>
      <path d="M<?php echo (int)($x+67);?> <?php echo (int)($y+60);?>h55M<?php echo (int)($x+67);?> <?php echo (int)($y+78);?>h44" stroke="#b7a895" stroke-width="7" stroke-linecap="round"/>
    <?php else:?>
      <circle cx="<?php echo (int)($x+73);?>" cy="<?php echo (int)($y+78);?>" r="29" fill="#f7f2e9" stroke="#baa78c"/>
      <path d="M<?php echo (int)($x+56);?> <?php echo (int)($y+79);?>l11 11 23-26" stroke="<?php echo esc_attr($tone);?>" stroke-width="6" fill="none" stroke-linecap="round"/>
    <?php endif;?>
    <text x="<?php echo (int)($x+75);?>" y="<?php echo (int)($y+115);?>" text-anchor="middle" class="udv-lower-node-name"><?php echo esc_html($node);?></text>
   </g>
  <?php endforeach;?>
  <circle class="udv-lower-traveler" r="7" fill="<?php echo esc_attr($tone);?>">
   <?php if(in_array($scene,array('mobile','pwa'),true)):?>
    <animateMotion path="M135 138C235 76 373 198 530 135" dur="4.8s" repeatCount="indefinite"/>
   <?php elseif(in_array($scene,array('payment','shop'),true)):?>
    <animateMotion path="M137 143Q330 48 525 144" dur="4.2s" repeatCount="indefinite"/>
   <?php else:?>
    <animateMotion path="M137 146H521" dur="4.5s" repeatCount="indefinite"/>
   <?php endif;?>
  </circle>
 </svg>
 <div class="udv-lower-legend"><?php foreach($items as $i=>$item):?><span><b>0<?php echo (int)($i+1);?></b> <?php echo esc_html($item[0]);?></span><?php endforeach;?></div>
 </div>
 <?php
}
