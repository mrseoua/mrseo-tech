<?php
/** Premium Ukrainian service visuals from locally bundled, optimized WebP artwork. */
if (!defined('ABSPATH')) exit;

function mrseo_udv_master_scene_data($scene) {
    return array(
        'portal'=>array(array('Вхід','profile'),array('Дані','documents'),array('Статус','verified')),
        'parsing'=>array(array('Джерела','api'),array('Зіставлення','mapping'),array('Каталог','catalog')),
        'payment'=>array(array('Оплата','checkout'),array('Перевірка','gateway'),array('Статус','receipt')),
        'mobile'=>array(array('Екран','app'),array('Дія','interaction'),array('Сповіщення','push')),
        'shop'=>array(array('Товар','product'),array('Кошик','cart'),array('Замовлення','order')),
        'team'=>array(array('Завдання','tasks'),array('Виконання','work'),array('Звіт','reports')),
        'pwa'=>array(array('Браузер','web'),array('Встановлення','install'),array('Офлайн','offline')),
    )[$scene] ?? null;
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
function mrseo_udv_visual_config($scene){
    $config=array(
        'portal'=>array('alt'=>'Тривимірна панель клієнтського кабінету з доступами, документами та підтвердженням статусу.','spots'=>array(array(18,56),array(49,48),array(83,54))),
        'parsing'=>array('alt'=>'Візуальна схема збору даних з API, таблиць і бази та синхронізації каталогу.','spots'=>array(array(19,54),array(51,53),array(83,54))),
        'payment'=>array('alt'=>'Візуалізація безпечної онлайн-оплати через інтеграцію сервісу та підтвердження замовлення.','spots'=>array(array(17,55),array(51,52),array(84,53))),
        'mobile'=>array('alt'=>'Три преміальні мобільні інтерфейси з діями користувача та сповіщеннями.','spots'=>array(array(25,51),array(51,50),array(77,49))),
        'shop'=>array('alt'=>'Мобільна комерція: каталог товарів, кошик та завершення покупки.','spots'=>array(array(22,51),array(51,50),array(79,52))),
        'team'=>array('alt'=>'Корпоративна дошка робочих задач зі станами виконання та взаємодією команди.','spots'=>array(array(23,52),array(50,54),array(78,50))),
        'pwa'=>array('alt'=>'Інтерфейс PWA: веббраузер, встановлення застосунку та офлайн-синхронізація.','spots'=>array(array(22,52),array(52,52),array(81,53)))
    );
    return $config[$scene] ?? null;
}
function mrseo_udv_art_url($scene){
    if(!mrseo_udv_visual_config($scene))return '';
    return get_template_directory_uri().'/assets/ua-dev-premium-'.$scene.'.webp';
}
function mrseo_udv_master_scene($scene){
    $config=mrseo_udv_visual_config($scene);
    if(!$config)return;
    $src=mrseo_udv_art_url($scene);
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
function mrseo_udv_lower_art($scene,$variant,$items){
    $config=mrseo_udv_visual_config($scene);
    if(!$config)return;
    $is_problem=$variant==='problem';
    $title=$is_problem?'ДЕ ВИНИКАЄ ПРОБЛЕМА':'ЯК ПРАЦЮЄ РІШЕННЯ';
    $label=$is_problem?'ДІАГНОСТИКА':'РЕАЛІЗАЦІЯ';
    $src=mrseo_udv_art_url($scene);
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
