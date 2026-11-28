<?php
/** Horoshop-specific visual stories below the hero. No client stats or implied live integration. */
if(!defined('ABSPATH'))exit;
function mrseo_ru_hs_story_content($key){
 $stories=json_decode('{"seo":["Видимость каталога","Поисковые запросы","Страницы категорий","Связи между страницами","Запросы покупателей","SEO-структура","План оптимизации","search"],"audit":["Технический аудит","Проверка URL","Индексация и canonical","Отчёт с приоритетами","Страницы каталога","Технические дубли","Рекомендации","scan"],"ads":["Товарная реклама","Каталог и фид","Рекламные кампании","Учёт покупок","Данные товаров","Расходы и события","Проверка конверсий","campaign"],"feeds":["Merchant Center","Товарный фид","Проверка атрибутов","Статусы товаров","Цены и остатки","Проблемные позиции","Повторная проверка","feed"]}',true);
 return $stories[$key]??null;
}
function mrseo_ru_hs_workbench($key){
 $s=mrseo_ru_hs_story_content($key);if(!$s)return;
 ?>
 <section class="hs-story-workbench"<?php if(mrseo_locale()==='ru')echo ' data-ua-stage="work"';?> aria-labelledby="hs-story-workbench-title">
  <div class="hs-premium-wrap hs-story-workbench-grid">
   <div class="hs-story-narrative">
    <span class="hs-premium-eyebrow">НЕ ТОЛЬКО РЕКОМЕНДАЦИИ</span>
    <h2 id="hs-story-workbench-title">Показываем процесс. <em>Проверяем каждый шаг.</em></h2>
    <p>Сначала определяем причину проблемы, затем выполняем согласованные действия и проверяем результат. Так выглядит порядок работы с вашей задачей.</p>
    <p class="hs-story-caution">Схематическая визуализация процесса — не данные реального магазина.</p>
   </div>
   <div class="hs-story-machine hs-story-machine--<?php echo esc_attr($s[7]);?>" role="img" aria-label="<?php echo esc_attr($s[0].': '.$s[1].', '.$s[2].', '.$s[3]);?>">
    <div class="hs-story-machine-head"><span class="hs-story-machine-mark" aria-hidden="true"><i></i><i></i><i></i></span><span><?php echo esc_html($s[0]);?></span><span class="hs-story-machine-status">СХЕМА ПРОЦЕССА</span></div>
    <div class="hs-story-machine-body" aria-hidden="true">
     <div class="hs-story-machine-lane">
      <?php foreach(array(1,2,3) as $i): ?>
       <div class="hs-story-machine-node hs-story-machine-node--<?php echo esc_attr((string)$i);?>">
        <div class="hs-story-machine-icon"><span class="hs-story-machine-icon-mark"></span><span class="hs-story-machine-icon-line"></span><span class="hs-story-machine-icon-line"></span></div>
        <span class="hs-story-machine-index"><?php echo esc_html('0'.$i);?></span>
        <strong><?php echo esc_html($s[$i]);?></strong>
       </div>
      <?php endforeach;?>
      <div class="hs-story-machine-flow hs-story-machine-flow--first"><span></span></div>
      <div class="hs-story-machine-flow hs-story-machine-flow--second"><span></span></div>
     </div>
     <div class="hs-story-machine-trace"><span></span><span></span><span></span><span></span><span></span><span></span></div>
     <div class="hs-story-machine-foot"><span>Диагностика</span><span>Действие</span><span>Контроль</span></div>
    </div>
   </div>
  </div>
 </section>
 <?php
}
function mrseo_ru_hs_result_visual($key){
 $s=mrseo_ru_hs_story_content($key);if(!$s)return;
 ?>
 <div class="hs-story-proof" role="img" aria-label="<?php echo esc_attr('Схематическая проверка: '.$s[4].', '.$s[5].', '.$s[6]);?>">
  <div class="hs-story-proof-bar"><span class="hs-story-proof-indicator" aria-hidden="true"></span><span>КОНТРОЛЬ РЕЗУЛЬТАТА</span><span class="hs-story-proof-symbol" aria-hidden="true">◎</span></div>
  <div class="hs-story-proof-content">
   <?php foreach(array(4,5,6) as $i):?>
   <div class="hs-story-proof-row"><span class="hs-story-proof-check" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5 9-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span><?php echo esc_html($s[$i]);?></span><span class="hs-story-proof-pulse" aria-hidden="true"></span></div>
   <?php endforeach;?>
   <div class="hs-story-proof-progress"><span></span></div>
   <p class="hs-story-proof-note">Согласованный перечень проверок. Иллюстрация, не фактический отчёт.</p>
  </div>
 </div>
 <?php
}


require_once __DIR__.'/horoshop-premium-story.php';
