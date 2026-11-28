<?php
/** Russian adaptation of the same approved 7 original premium WebP assets. */
if (!defined('ABSPATH')) exit;

function mrseo_rdv_master_scene_data($scene) {
    return array(
        'portal'=>array(array('Вход','profile'),array('Данные','documents'),array('Статус','verified')),
        'parsing'=>array(array('Источники','api'),array('Сопоставление','mapping'),array('Каталог','catalog')),
        'payment'=>array(array('Оплата','checkout'),array('Проверка','gateway'),array('Статус','receipt')),
        'mobile'=>array(array('Экран','app'),array('Действие','interaction'),array('Уведомление','push')),
        'shop'=>array(array('Товар','product'),array('Корзина','cart'),array('Заказ','order')),
        'team'=>array(array('Задание','tasks'),array('Выполнение','work'),array('Отчёт','reports')),
        'pwa'=>array(array('Браузер','web'),array('Установка','install'),array('Офлайн','offline')),
    )[$scene] ?? null;
}
function mrseo_rdv_master_hero_accents(){
    return array(
        'portal'=>'Клиент видит всё сам.',
        'parsing'=>'Без ручных обновлений.',
        'payment'=>'Без потерянных платежей.',
        'mobile'=>'Под ваши сценарии.',
        'shop'=>'Для повторных покупок.',
        'team'=>'Команда работает слаженно.',
        'pwa'=>'Веб-сервис как приложение.'
    );
}
function mrseo_rdv_visual_config($scene){
    $config=array(
        'portal'=>array('alt'=>'Объёмная иллюстрация личного кабинета клиента с доступами, документами и подтверждением статуса.','spots'=>array(array(18,56),array(49,48),array(83,54))),
        'parsing'=>array('alt'=>'Иллюстрация парсинга: источники API, таблицы и синхронизация каталога.','spots'=>array(array(19,54),array(51,53),array(83,54))),
        'payment'=>array('alt'=>'Иллюстрация онлайн-оплаты: платёжный сервис и подтверждение заказа.','spots'=>array(array(17,55),array(51,52),array(84,53))),
        'mobile'=>array('alt'=>'Объёмная композиция трёх мобильных экранов, действий и уведомлений.','spots'=>array(array(25,51),array(51,50),array(77,49))),
        'shop'=>array('alt'=>'Мобильная коммерция: каталог товаров, корзина и подтверждение покупки.','spots'=>array(array(22,51),array(51,50),array(79,52))),
        'team'=>array('alt'=>'Корпоративная доска задач с этапами работы и взаимодействием команды.','spots'=>array(array(23,52),array(50,54),array(78,50))),
        'pwa'=>array('alt'=>'Интерфейс PWA: браузер, установка приложения и офлайн-синхронизация.','spots'=>array(array(22,52),array(52,52),array(81,53)))
    );
    return $config[$scene] ?? null;
}
function mrseo_rdv_art_url($scene){
    if(!mrseo_rdv_visual_config($scene))return '';
    return get_template_directory_uri().'/assets/ua-dev-premium-'.$scene.'.webp';
}
function mrseo_rdv_master_scene($scene){
    $config=mrseo_rdv_visual_config($scene);
    if(!$config)return;
    $src=mrseo_rdv_art_url($scene);
    ?>
    <div class="udv-premium-scene udv-premium-scene--<?php echo esc_attr($scene);?>" data-udv-premium-scene="<?php echo esc_attr($scene);?>">
      <img class="udv-premium-hero-image" src="<?php echo esc_url($src);?>"
        alt="<?php echo esc_attr($config['alt']);?>" width="1280" height="960"
        loading="eager" fetchpriority="high" decoding="async" />
      <div class="udv-premium-points" aria-hidden="true">
      <?php foreach($config['spots'] as $i=>$point):?>
        <span class="udv-premium-point" data-udv-part="<?php echo (int)$i;?>"
           style="--udv-x:<?php echo (int)$point[0];?>%;--udv-y:<?php echo (int)$point[1];?>%"><i></i></span>
      <?php endforeach;?>
      </div>
      <span class="udv-premium-sheen" aria-hidden="true"></span>
    </div>
    <?php
}
function mrseo_rdv_lower_art($scene,$variant,$items){
    $config=mrseo_rdv_visual_config($scene);
    if(!$config)return;
    $is_problem=$variant==='problem';
    $title=$is_problem?'ГДЕ ВОЗНИКАЕТ ПРОБЛЕМА':'КАК РАБОТАЕТ РЕШЕНИЕ';
    $label=$is_problem?'ДИАГНОСТИКА':'РЕАЛИЗАЦИЯ';
    $src=mrseo_rdv_art_url($scene);
    ?>
    <figure class="udv-lower-graphic udv-lower-graphic--<?php echo esc_attr($scene.'-'.$variant);?>"
        data-udv-lower="<?php echo esc_attr($variant);?>">
      <div class="udv-lower-graphic-top"><span><?php echo esc_html($title);?></span><span>MRSEO / <?php echo $is_problem?'02':'03';?></span></div>
      <div class="udv-premium-detail-frame">
        <img class="udv-premium-detail-image" src="<?php echo esc_url($src);?>" alt=""
          loading="lazy" decoding="async" width="1280" height="960" />
        <div class="udv-premium-detail-overlay" aria-hidden="true">
          <span class="udv-premium-detail-ping"><i></i><?php echo esc_html($label);?></span>
          <span class="udv-premium-detail-tracer"></span>
        </div>
      </div>
      <figcaption class="udv-lower-legend">
       <?php foreach($items as $i=>$item):?>
         <span><b><?php echo esc_html(sprintf('%02d',$i+1));?></b><?php echo esc_html($item[0]);?></span>
       <?php endforeach;?>
      </figcaption>
    </figure>
    <?php
}
