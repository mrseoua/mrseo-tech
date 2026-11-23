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
function mrseo_udv_master_icon_paths(){
 return array(
  'lock'=>'<rect x="28" y="45" width="44" height="41" rx="7"/><path d="M36 45V30a14 14 0 0 1 28 0v15"/><circle cx="50" cy="64" r="3"/>',
  'file'=>'<path d="M29 15h28l15 15v55H29zM57 15v17h15M39 48h23M39 60h23M39 72h15"/>',
  'check'=>'<circle cx="50" cy="49" r="36"/><path d="M29 50l14 14 29-30"/>',
  'database'=>'<ellipse cx="50" cy="22" rx="31" ry="12"/><path d="M19 22v55q31 24 62 0V22M19 43q31 24 62 0M19 61q31 24 62 0"/>',
  'merge'=>'<rect x="7" y="15" width="27" height="22" rx="5"/><rect x="7" y="64" width="27" height="22" rx="5"/><rect x="67" y="40" width="27" height="22" rx="5"/><path d="M34 26h15v25h18M34 75h15V51"/>',
  'list'=>'<path d="M34 24h49M34 48h49M34 72h49M15 24h4M15 48h4M15 72h4"/>',
  'card'=>'<rect x="11" y="26" width="78" height="51" rx="8"/><path d="M11 44h78M23 63h22"/>',
  'shield'=>'<path d="M50 10L82 23v27q-2 26-32 40Q20 76 18 50V23zM34 51l12 12 23-25"/>',
  'phone'=>'<rect x="30" y="8" width="40" height="84" rx="10"/><path d="M43 19h14M42 81h16"/>',
  'touch'=>'<path d="M43 55V24a8 8 0 0 1 16 0v33l10-8a9 9 0 0 1 14 10L66 85H43L24 62a8 8 0 0 1 13-10z"/>',
  'bell'=>'<path d="M23 70h54L67 59V39a17 17 0 0 0-34 0v20zM42 78q8 12 16 0"/>',
  'box'=>'<path d="M15 33L50 15l35 18v39L50 91 15 72zM15 33l35 18 35-18M50 51v40"/>',
  'cart'=>'<path d="M12 20h12l11 48h43l11-34H29M41 82h2M73 82h2"/><circle cx="42" cy="82" r="6"/><circle cx="74" cy="82" r="6"/>',
  'bag'=>'<path d="M23 34h54l6 53H17zM35 35v-8a15 15 0 0 1 30 0v8M36 58l9 9 20-21"/>',
  'clipboard'=>'<rect x="23" y="19" width="54" height="72" rx="7"/><rect x="36" y="10" width="28" height="18" rx="5"/><path d="M35 47h30M35 62h30M35 77h21"/>',
  'users'=>'<circle cx="38" cy="34" r="13"/><circle cx="70" cy="38" r="10"/><path d="M13 81V67q3-18 25-18 22 0 25 18v14zM64 56q20-2 23 14v11H68"/>',
  'browser'=>'<rect x="10" y="16" width="80" height="67" rx="7"/><path d="M10 35h80M21 26h3M31 26h3M41 26h3M27 53h45M27 65h30"/>',
  'download'=>'<path d="M50 12v51M30 45l20 20 20-20M19 73v12h62V73"/>',
  'cloud'=>'<path d="M27 77h49a17 17 0 0 0 1-34 27 27 0 0 0-53-2A18 18 0 0 0 27 77zM36 58l11 11 19-22"/>'
 );
}
function mrseo_udv_master_scene($scene){
 $stages=mrseo_udv_master_scene_data($scene);
 if(!$stages)return;
 $icons=mrseo_udv_master_icon_paths();
 $unique='udv-'.$scene;
 $cards=array(array(42,90),array(265,275),array(488,75));
 ?>
 <svg class="psc-motion puc-motion udv-kinetic-svg" data-udv-svg="<?php echo esc_attr($scene);?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 720 520" aria-hidden="true" focusable="false">
  <defs>
   <linearGradient id="<?php echo esc_attr($unique);?>-metal" x2="1" y2="1"><stop stop-color="#fffdf6"/><stop offset=".55" stop-color="#e6d7c1"/><stop offset="1" stop-color="#c5ac8e"/></linearGradient>
   <linearGradient id="<?php echo esc_attr($unique);?>-accent" x2="1" y2="1"><stop stop-color="#e4b597"/><stop offset="1" stop-color="#ac4634"/></linearGradient>
   <filter id="<?php echo esc_attr($unique);?>-shadow" x="-30%" y="-30%" width="160%" height="180%"><feDropShadow dx="0" dy="9" stdDeviation="7" flood-color="#705335" flood-opacity=".16"/></filter>
   <?php foreach(array_unique(array_column($stages,1)) as $type):?>
    <symbol id="<?php echo esc_attr($unique.'-'.$type);?>" viewBox="0 0 100 100"><g stroke="currentColor" fill="none" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"><?php echo $icons[$type]; // audited static icon paths ?></g></symbol>
   <?php endforeach;?>
  </defs>
  <path id="<?php echo esc_attr($unique);?>-wire1" d="M137.5 175 C249 175 249 360 360.5 360" stroke="#a98461" stroke-width="3.5" fill="none" stroke-linecap="round"/>
  <path id="<?php echo esc_attr($unique);?>-wire2" d="M360.5 360 C472 360 472 160 583.5 160" stroke="#a98461" stroke-width="3.5" fill="none" stroke-linecap="round"/>
  <circle class="udv-moving-point" r="6" fill="#fff2d8" stroke="#ac4634" stroke-width="2"><animateMotion path="M137.5 175 C249 175 249 360 360.5 360" dur="4.1s" repeatCount="indefinite"/></circle>
  <circle class="udv-moving-point" r="6" fill="#fff2d8" stroke="#ac4634" stroke-width="2"><animateMotion path="M360.5 360 C472 360 472 160 583.5 160" dur="4.6s" repeatCount="indefinite"/></circle>
  <?php foreach($stages as $i=>$entry):$x=$cards[$i][0];$y=$cards[$i][1];$id=$entry[1];$label=$entry[0];?>
  <g class="udv-kinetic-card" data-udv-part="<?php echo (int)$i;?>">
   <g filter="url(#<?php echo esc_attr($unique);?>-shadow)">
    <rect x="<?php echo (int)($x+4);?>" y="<?php echo (int)($y+8);?>" width="191" height="170" rx="19" fill="#b6a087"/>
    <rect x="<?php echo (int)$x;?>" y="<?php echo (int)$y;?>" width="191" height="170" rx="19" fill="url(#<?php echo esc_attr($unique);?>-<?php echo $i===1?'accent':'metal';?>)" stroke="#b99e82" stroke-width="2"/>
    <rect x="<?php echo (int)($x+8);?>" y="<?php echo (int)($y+8);?>" width="175" height="154" rx="12" fill="none" stroke="#fff8eb" stroke-opacity=".65"/>
    <use href="#<?php echo esc_attr($unique.'-'.$id);?>" x="<?php echo (int)($x+51);?>" y="<?php echo (int)($y+18);?>" width="90" height="105" color="<?php echo $i===1?'#fff8eb':'#72543d';?>"/>
    <text x="<?php echo (int)($x+95.5);?>" y="<?php echo (int)($y+150);?>" text-anchor="middle" font-family="system-ui,sans-serif" font-size="<?php echo mb_strlen($label)>11?'17':'20';?>" font-weight="700" fill="#403d35"><?php echo esc_html($label);?></text>
   </g>
  </g>
  <?php endforeach;?>
  <circle class="udv-kinetic-pulse" cx="360.5" cy="459" r="5" fill="#ac4634"><animate attributeName="r" values="4;8;4" dur="3.1s" repeatCount="indefinite"/></circle>
 </svg>
 <?php
}
