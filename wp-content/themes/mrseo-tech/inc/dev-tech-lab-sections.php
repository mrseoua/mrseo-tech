<?php
if (!defined('ABSPATH')) exit;
/* Premium Tech preview: service-specific vector models; no client data. */
function mrseo_dev_lab_art($kind) {
 $kind=(int)$kind;
 static $serial=0;
 $id='dtm-'.(++$serial);
 ?>
 <svg class="dtm-art dtm-art--<?php echo $kind;?>" viewBox="0 0 320 180" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
 <defs>
  <linearGradient id="<?php echo $id;?>-paper" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#fffdf9"/><stop offset="1" stop-color="#ddd4c7"/></linearGradient>
  <linearGradient id="<?php echo $id;?>-metal" x1="0" y1="0" x2="0" y2="1"><stop stop-color="#e5dfd4"/><stop offset=".48" stop-color="#b4a89a"/><stop offset="1" stop-color="#f0e9de"/></linearGradient>
  <linearGradient id="<?php echo $id;?>-ink" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#434641"/><stop offset="1" stop-color="#222622"/></linearGradient>
  <filter id="<?php echo $id;?>-shadow" x="-30%" y="-40%" width="160%" height="210%"><feDropShadow dx="0" dy="9" stdDeviation="6" flood-color="#65503b" flood-opacity=".17"/></filter>
 </defs>
 <ellipse cx="160" cy="147" rx="112" ry="18" fill="#9d8d76" opacity=".09"/>
 <path d="M46 125 160 61 274 125 160 169Z" fill="none" stroke="#b9ad9a" stroke-dasharray="3 5" opacity=".55"/>
 <?php $paper='url(#'.$id.'-paper)';$metal='url(#'.$id.'-metal)';$ink='url(#'.$id.'-ink)';$shadow='url(#'.$id.'-shadow)';?>
 <?php if($kind===0): ?>
 <!-- storefront: browser with actual product tiles and a separate order card -->
 <g class="dtm-float" filter="<?php echo $shadow;?>">
 <path d="M61 45 220 29 247 43 247 132 88 150 61 136Z" fill="<?php echo $metal;?>" stroke="#9e9386"/>
 <path d="M61 45 220 29 220 119 61 136Z" fill="<?php echo $paper;?>" stroke="#a99d8d"/>
 <path d="M61 45 220 29V46L61 62Z" fill="<?php echo $ink;?>"/>
 <circle cx="72" cy="52" r="2.5" fill="#e4a195"/><circle cx="82" cy="51" r="2.5" fill="#d8d1c5"/>
 <path d="M75 72 205 59V73L75 86Z" fill="#d5c9b9"/>
 <?php for($i=0;$i<3;$i++):$x=75+$i*44;$y=92-$i*4.4;?>
 <path d="M<?php echo $x.' '.$y;?>l38 -4v24l-38 4Z" fill="<?php echo $i===1?'#b75243':'#e8dfd1';?>" stroke="#b4a797"/>
 <path d="M<?php echo ($x+7).' '.($y+19);?>l20 -2" stroke="<?php echo $i===1?'#fff5ea':'#95897a';?>" stroke-width="2"/>
 <?php endfor;?>
 </g>
 <g class="dtm-rise" filter="<?php echo $shadow;?>"><rect x="205" y="95" width="67" height="50" rx="8" fill="#fffdf9" stroke="#c8bbab"/><path d="M215 106h7l4 16h24l4-12h-29M230 130h1m14 0h1" fill="none" stroke="#a53e32" stroke-width="2.5" stroke-linecap="round"/><path d="M216 137h43" stroke="#d2c7b7" stroke-width="2"/></g>
 <?php elseif($kind===1): ?>
 <!-- portal: phone, identity card, document -->
 <g class="dtm-float" filter="<?php echo $shadow;?>"><rect x="104" y="22" width="78" height="132" rx="13" fill="<?php echo $ink;?>"/><rect x="110" y="29" width="66" height="118" rx="9" fill="<?php echo $paper;?>"/><rect x="129" y="35" width="28" height="4" rx="2" fill="#4a4a43"/><circle cx="143" cy="66" r="14" fill="#c8b8a6"/><path d="M133 69q10-12 20 0v5h-20Z" fill="#fffdf7"/><circle cx="143" cy="61" r="5" fill="#fffdf7"/><rect x="122" y="91" width="42" height="6" rx="3" fill="#a63c32"/><rect x="122" y="106" width="42" height="6" rx="3" fill="#c7baaa"/><rect x="122" y="120" width="30" height="6" rx="3" fill="#c7baaa"/></g>
 <g class="dtm-rise" filter="<?php echo $shadow;?>"><rect x="169" y="63" width="90" height="60" rx="9" fill="#fffdf9" stroke="#c6b9a8"/><path d="M183 77h42m-42 9h57m-57 9h32" stroke="#a79a8a" stroke-width="3" stroke-linecap="round"/><circle cx="242" cy="104" r="10" fill="#a53e32"/><path d="m237 104 4 4 6-8" fill="none" stroke="#fff" stroke-width="2"/></g>
 <?php elseif($kind===2): ?>
 <!-- CRM: a three-stage kanban system, a moving record -->
 <g class="dtm-float" filter="<?php echo $shadow;?>"><rect x="42" y="31" width="236" height="121" rx="13" fill="<?php echo $paper;?>" stroke="#baad9c"/><rect x="42" y="31" width="236" height="20" rx="10" fill="<?php echo $ink;?>"/><circle cx="55" cy="41" r="3" fill="#d99a88"/>
 <?php for($i=0;$i<3;$i++):$x=54+$i*73;?>
 <rect x="<?php echo $x;?>" y="60" width="66" height="80" rx="5" fill="<?php echo $i===1?'#e5d6cd':'#e9e3d9';?>"/>
 <path d="M<?php echo $x+8;?> 69h38" stroke="#8e8374" stroke-width="3" stroke-linecap="round"/>
 <?php for($j=0;$j<2;$j++):?><rect x="<?php echo $x+7;?>" y="<?php echo 78+$j*27;?>" width="52" height="20" rx="3" fill="#fffdf8" stroke="#c8bbaa"/><path d="M<?php echo $x+13;?> <?php echo 85+$j*27;?>h29" stroke="#b0a391" stroke-width="2"/><?php endfor;?>
 <?php endfor;?></g>
 <g class="dtm-transfer" filter="<?php echo $shadow;?>"><rect x="62" y="103" width="52" height="24" rx="4" fill="#a94135"/><path d="M70 111h34m-34 7h20" stroke="#fff7ee" stroke-width="2"/></g>
 <?php elseif($kind===3): ?>
 <!-- API: central chip, distinct ports, routed packet paths -->
 <g class="dtm-float" filter="<?php echo $shadow;?>"><path d="M160 29 267 81 160 137 53 81Z" fill="<?php echo $paper;?>" stroke="#b4a695"/><path d="M53 81 160 137 267 81v10l-107 56-107-56Z" fill="<?php echo $metal;?>" stroke="#b4a695"/>
 <g fill="none" stroke="#ac5749" stroke-width="2.5"><path d="M160 78 100 51M160 78l60-27M160 78l-60 32M160 78l60 32"/></g>
 <?php foreach(array(array(100,51),array(220,51),array(100,110),array(220,110)) as $xy):?><rect x="<?php echo $xy[0]-13;?>" y="<?php echo $xy[1]-8;?>" width="26" height="16" rx="4" fill="#fffdf9" stroke="#a99b89"/><circle cx="<?php echo $xy[0];?>" cy="<?php echo $xy[1];?>" r="3" fill="#a53e32"/><?php endforeach;?>
 <path d="M160 55 194 72 160 89 126 72Z" fill="<?php echo $ink;?>" stroke="#766e61"/><path d="M126 72 160 89 194 72v9l-34 17-34-17Z" fill="#5e5c53"/><path d="M145 72 160 64 175 72 160 80Z" fill="#b64c3c"/></g>
 <circle class="dtm-api-packet" cx="160" cy="78" r="4.5" fill="#b84a3a" stroke="#fff" stroke-width="1.5"/>
 <?php elseif($kind===4): ?>
 <!-- automation: one event splits into two tasks and a verified completion -->
 <g class="dtm-float" filter="<?php echo $shadow;?>"><path d="M67 94H140M180 94H253M160 94V46H239M160 94v45h79" fill="none" stroke="#ad9c87" stroke-width="3" stroke-linejoin="round"/>
 <rect x="43" y="77" width="52" height="34" rx="7" fill="<?php echo $paper;?>" stroke="#b6a795"/><path d="m54 86 15 11 15-11" fill="none" stroke="#a53e32" stroke-width="2"/>
 <rect x="135" y="72" width="50" height="45" rx="8" fill="<?php echo $ink;?>"/><path d="m163 79-13 17h10l-5 14 15-20h-10Z" fill="#e8a194"/>
 <rect x="218" y="29" width="56" height="34" rx="7" fill="<?php echo $paper;?>" stroke="#b6a795"/><rect x="218" y="122" width="56" height="34" rx="7" fill="<?php echo $paper;?>" stroke="#b6a795"/><path d="m230 45 6 6 12-13m-18 101 6 6 12-13" fill="none" stroke="#a53e32" stroke-width="2.8" stroke-linecap="round"/>
 <circle cx="253" cy="94" r="13" fill="#f9f3e9" stroke="#b7a995"/><path d="M247 94h12m-6-6v12" stroke="#a53e32" stroke-width="2"/></g>
 <circle class="dtm-auto-packet" cx="67" cy="94" r="5" fill="#b84a3a" stroke="#fff" stroke-width="1.5"/>
 <?php else: ?>
 <!-- maintenance: diagnostic scanner and a verified module -->
 <g class="dtm-float" filter="<?php echo $shadow;?>"><rect x="65" y="34" width="190" height="112" rx="12" fill="<?php echo $ink;?>"/><rect x="72" y="41" width="176" height="98" rx="8" fill="#f6f0e5"/><path d="M83 65h154M83 89h154M83 113h154M107 50v81m35-81v81m35-81v81m35-81v81" stroke="#d9cebd" stroke-width="1"/><path d="M86 108 111 93 131 101 158 66 183 86 209 59 234 73" fill="none" stroke="#a53e32" stroke-width="3" stroke-linejoin="round"/><g fill="#a53e32"><circle cx="158" cy="66" r="4"/><circle cx="209" cy="59" r="4"/></g><g class="dtm-scan"><rect x="84" y="49" width="20" height="80" fill="#b65c4a" opacity=".15"/><path d="M104 49v80" stroke="#b65c4a" stroke-width="2"/></g></g>
 <g class="dtm-rise" filter="<?php echo $shadow;?>"><circle cx="244" cy="127" r="22" fill="#fffdf7" stroke="#c0b3a3"/><path d="m233 127 8 8 15-17" fill="none" stroke="#a53e32" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></g>
 <?php endif;?>
 </svg>
 <?php
}
function mrseo_dev_lab_connections() { ?>
<section class="ua-sv ua-sv--dev-connections dtm-connections" aria-labelledby="ua-sv-dev-flow-title">
 <div class="dev-wrap">
 <header class="ua-sv-heading"><div><span class="ua-sv-eyebrow">КОЛИ СИСТЕМИ НЕ ПРАЦЮЮТЬ РАЗОМ</span><h2 id="ua-sv-dev-flow-title">З’єднуємо інструменти. <em>Прибираємо ручну роботу.</em></h2></div><p>Сайт, CRM та облік можуть працювати як одна система — якщо інтеграція потрібна й технічно можлива.</p></header>
 <div class="dtm-flow" data-flow>
 <div class="dtm-flow-head"><span>АРХІТЕКТУРА ІНТЕГРАЦІЇ</span><button type="button" class="dtm-play" aria-pressed="false">Запустити приклад <span aria-hidden="true">↗</span></button></div>
 <div class="dtm-flow-grid">
 <?php foreach(array(array(0,'01','Сайт','Заявки та замовлення'),array(3,'02','Інтеграція','Передача даних'),array(2,'03','CRM та облік','Робота команди')) as $n=>$node):?>
 <div class="dtm-node" data-node="<?php echo $n;?>"><span class="dtm-node-index"><?php echo esc_html($node[1]);?></span><?php mrseo_dev_lab_art($node[0]);?><strong><?php echo esc_html($node[2]);?></strong><small><?php echo esc_html($node[3]);?></small></div>
 <?php if($n<2):?><div class="dtm-link" aria-hidden="true"><i></i></div><?php endif;?>
 <?php endforeach;?>
 </div>
 <div class="dtm-flow-status" aria-live="polite"><span class="dtm-status-dot"></span><p>Приклад: заявка з сайту автоматично потрапляє до CRM.</p></div>
 </div>
 <div class="ua-sv-dev-points">
 <div><span>01</span><strong>Менше дублювання</strong><p>Не потрібно повторно вводити одні й ті самі дані, якщо системи це дозволяють.</p></div>
 <div><span>02</span><strong>Зрозумілі процеси</strong><p>Статуси, ролі та відповідальність узгоджені до розробки.</p></div>
 <div><span>03</span><strong>Контроль помилок</strong><p>Перевіряємо обмін даними, доступи й обробку збоїв.</p></div>
 </div><p class="ua-sv-note">Умовна схема інтеграції; реальна архітектура залежить від API, доступів і вимог.</p>
 </div>
</section>
<?php }
