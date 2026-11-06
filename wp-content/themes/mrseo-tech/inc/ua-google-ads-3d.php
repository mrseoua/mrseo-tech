<?php
/**
 * Ukrainian Google Ads supporting scenes, displayed only below existing sections.
 * No fabricated customer account data, sales, ROI or performance figures.
 * The approved first screen and global homepage are intentionally untouched.
 */
if (!defined('ABSPATH')) exit;

function mrseo_ua_ads_depth_scene($scene) {
 $scenes=array(
  'economy'=>array(
   'index'=>'03 / ЕКОНОМІКА',
   'title'=>'ROAS показує дохід. А де витрати бізнесу?',
   'text'=>'Дивимося не лише на цифру в рекламному кабінеті: для рішення потрібні маржа, комісії, повернення та реальні замовлення.',
   'label'=>'Умовна схема економіки, без показників клієнта.',
  ),
  'deliverables'=>array(
   'index'=>'05 / РЕЗУЛЬТАТ РОБОТИ',
   'title'=>'Не хаотичні правки. Конкретні матеріали для рішень.',
   'text'=>'Після перевірки зрозуміло, які сигнали некоректні, що потрібно змінити спочатку та за якими критеріями перевіряти ефект.',
   'label'=>'Приклад структури матеріалів, а не клієнтський звіт.',
  ),
  'control'=>array(
   'index'=>'06 / ПРОЗОРІСТЬ',
   'title'=>'Ви бачите причину кожної зміни.',
   'text'=>'Перед тестом формулюємо гіпотезу, після — зіставляємо дані та пояснюємо наступний крок без удаваної точності.',
   'label'=>'Ілюстрація циклу перевірки гіпотез.',
  ),
  'start'=>array(
   'index'=>'07 / ПЕРШ НІЖ ЗМІНЮВАТИ',
   'title'=>'Не зупиняємо працюючу рекламу навмання.',
   'text'=>'Спочатку фіксуємо поточний стан, перевіряємо відстеження та обмеження. Лише потім погоджуємо потрібні зміни.',
   'label'=>'Приклад послідовності робіт, не дані акаунта.',
  ),
 );
 if(!isset($scenes[$scene]))return;
 $item=$scenes[$scene];
 ?>
 <div class="container ua3-wrap">
  <div class="ua3-scene ua3-scene--<?php echo esc_attr($scene);?>" role="group" aria-label="<?php echo esc_attr($item['title']);?>">
   <div class="ua3-copy">
    <span class="ua3-eyebrow"><?php echo esc_html($item['index']);?></span>
    <h3><?php echo esc_html($item['title']);?></h3>
    <p><?php echo esc_html($item['text']);?></p>
    <span class="ua3-note"><?php echo esc_html($item['label']);?></span>
   </div>
   <div class="ua3-art ua3-art--<?php echo esc_attr($scene);?>" aria-hidden="true">
    <?php if($scene==='economy'):?>
     <div class="ua3-horizon"></div>
     <div class="ua3-finance ua3-finance--income"><span>01 / ДОХІД</span><strong>Замовлення</strong><i class="ua3-finance-signal"></i></div>
     <div class="ua3-finance ua3-finance--cost"><span>02 / ВИТРАТИ</span><strong>Маржа й комісії</strong><i class="ua3-finance-signal"></i></div>
     <div class="ua3-finance ua3-finance--return"><span>03 / ФАКТ</span><strong>Повернення</strong><i class="ua3-finance-signal"></i></div>
     <div class="ua3-finance-core"><span>РОЗУМІТИ</span><strong>Прибуток</strong><b>↗</b></div>
     <div class="ua3-orbit ua3-orbit--one"></div><div class="ua3-orbit ua3-orbit--two"></div>
    <?php elseif($scene==='deliverables'):?>
     <div class="ua3-dossier-grid"></div>
     <div class="ua3-sheet ua3-sheet--left"><span>01 / ДІАГНОСТИКА</span><strong>Що працює не так</strong><i></i><i></i><i></i><b>✓</b></div>
     <div class="ua3-sheet ua3-sheet--center"><span>02 / ПРІОРИТЕТИ</span><strong>План виправлень</strong><i></i><i></i><i></i><b>↗</b></div>
     <div class="ua3-sheet ua3-sheet--right"><span>03 / ПЕРЕВІРКА</span><strong>Критерії результату</strong><i></i><i></i><i></i><b>◎</b></div>
     <div class="ua3-dossier-stamp">ПРОЗОРИЙ ПЛАН</div>
    <?php elseif($scene==='control'):?>
     <div class="ua3-radar-back"></div>
     <div class="ua3-radar-ring ua3-radar-ring--one"></div>
     <div class="ua3-radar-ring ua3-radar-ring--two"></div>
     <div class="ua3-radar-center"><span>КОНТРОЛЬ</span><strong>Даних</strong><b>✓</b></div>
     <div class="ua3-radar-tag ua3-radar-tag--one"><small>01</small><strong>Гіпотеза</strong></div>
     <div class="ua3-radar-tag ua3-radar-tag--two"><small>02</small><strong>Тест</strong></div>
     <div class="ua3-radar-tag ua3-radar-tag--three"><small>03</small><strong>Висновок</strong></div>
    <?php else:?>
     <div class="ua3-safety-back"></div>
     <div class="ua3-safety-window"><div class="ua3-safety-toolbar"><i></i><i></i><i></i><span>GOOGLE ADS / АУДИТ</span></div>
      <div class="ua3-safety-row"><span>Відстеження заявок</span><b>✓</b></div>
      <div class="ua3-safety-row"><span>Історія змін</span><b>✓</b></div>
      <div class="ua3-safety-row"><span>Цілі кампаній</span><b>✓</b></div>
      <div class="ua3-safety-bottom"><span>ПЕРЕВІРКА</span><i>→</i><strong>РІШЕННЯ</strong></div>
     </div>
     <div class="ua3-safety-seal"><span>СПОЧАТКУ</span><strong>АУДИТ</strong><b>✓</b></div>
    <?php endif;?>
   </div>
  </div>
 </div>
 <?php
}
