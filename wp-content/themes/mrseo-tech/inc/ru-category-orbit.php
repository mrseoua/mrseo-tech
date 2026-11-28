<?php
/** Same approved category navigation and assets; Russian labels and real counterpart URLs. */
if(!defined('ABSPATH'))exit;
function mrseo_ru_category_home_data(){
 $data=mrseo_category_home_data();$sem=mrseo_ru_semantic_map();
 $copy=array('seo'=>array('SEO-ПРОДВИЖЕНИЕ САЙТОВ','Найти причину слабой видимости','SEO / ПОИСК'),'google-ads'=>array('КОНТЕКСТНАЯ РЕКЛАМА GOOGLE ADS','Проверить эффективность рекламы','ADS / КАМПАНИИ'),'horoshop'=>array('СОЗДАНИЕ И РАЗВИТИЕ МАГАЗИНОВ','Найти точки роста магазина','HOROSHOP / МАГАЗИН'),'service-websites'=>array('СОЗДАНИЕ САЙТОВ ДЛЯ БИЗНЕСА','Обсудить будущий сайт','WEB / ДИЗАЙН'),'web-development'=>array('ВЕБ-РАЗРАБОТКА ДЛЯ БИЗНЕСА','Разобрать бизнес-процесс','DEV / СИСТЕМЫ'));
 foreach($data as $slug=>&$d){$d[0]=$copy[$slug][0];$d[1]=$sem[$slug]['headline'][0];$d[2]=$sem[$slug]['headline'][1];$d[3]=$sem[$slug]['lead'];$d[4]=$copy[$slug][1];$d[5]=$copy[$slug][2];$d[6]='ru-hub-problems';$d[7]='ru-hub-catalog';}unset($d);
 return $data;
}
function mrseo_ru_hub_route(){return mrseo_locale()==='ru'&&isset(mrseo_ru_semantic_map()[mrseo_slug()])&&in_array(mrseo_slug(),array('seo','google-ads','horoshop','service-websites','web-development'),true)&&trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/')==='ru/'.mrseo_slug();}
function mrseo_ru_menu_sections($key){
 require_once __DIR__.'/ua-header-six.php';
 $out=array();$names=json_decode('{"SEO-послуги":"SEO-услуги","Рекламні кампанії":"Рекламные кампании","SEO та просування":"SEO и продвижение","Товари та аналітика":"Товары и аналитика","Бізнес-системи":"Бизнес-системы","Інтеграції й функціонал":"Интеграции и функциональность","Штучний інтелект":"Искусственный интеллект","Мобільні застосунки":"Мобильные приложения","Створення сайтів":"Создание сайтов","Формати сайтів":"Форматы сайтов","Розробка сайтів":"Разработка сайтов","Сайти для бізнесу":"Сайты для бизнеса"}',true);
 foreach(mrseo_ua_visible_menu_sections($key) as $section){
  $items=array();foreach($section['items'] as $item){
   $ua=trim(wp_parse_url($item['url'],PHP_URL_PATH),'/');
   $ru=mrseo_i18n_matching_slug('uk',$ua,'ru');
   if($ru===null||$ru==='')continue;
   $items[]=array('slug'=>$ru,'label'=>mrseo_ru_parity_label($ru),'url'=>mrseo_i18n_exact_url('ru',$ru));
  }
  if($items)$out[]=array('title'=>$names[$section['title']]??'Направления работы','items'=>$items);
 }
 return $out;
}
function mrseo_ru_category_items($slug){
 $d=mrseo_ru_category_home_data()[$slug]??null;if(!$d)return array();
 $desc=json_decode('{"local-seo":"Привлекайте клиентов из вашего города и региона.","ecommerce-seo":"Категории, фильтры и товары под спрос покупателей.","service-business-seo":"Страницы услуг, которые отвечают запросам клиентов.","international-seo":"Поисковая стратегия для разных стран и языков.","seo-audit":"Диагностика препятствий и приоритетный план исправлений.","google-search-ads":"Объявления по релевантным коммерческим запросам.","google-shopping":"Товарные кампании с контролем качества каталога.","performance-max":"Кампании с проверкой конверсий и экономики продаж.","local-google-ads":"Реклама в реальной зоне обслуживания.","horoshop/seo":"Категории и фильтры под поисковый спрос.","horoshop/audit":"Индексация, canonical и технические ограничения платформы.","horoshop/ads":"Кампании для товаров и контроль покупок.","horoshop/feeds":"Точность цен, наличия и атрибутов товаров.","wordpress-development":"Управляемый сайт с редактором контента.","landing-pages":"Отдельное предложение для целевой рекламной кампании.","local-business-websites":"Понятные услуги, контакты и удобная запись.","corporate-websites":"Структура для направлений, команды и клиентов компании.","business-automation":"Меньше ручных операций в ежедневных процессах.","crm-development":"Заявки, статусы и работа менеджеров в одной системе.","web-applications":"Онлайн-сервисы с бизнес-логикой и ролями.","business-dashboards":"Показатели компании в понятном интерфейсе.","client-portals":"Доступ клиентов к статусам, документам и заявкам.","api-integrations":"Обмен данными между нужными сервисами.","data-parsing":"Сбор и синхронизация нужных данных.","payment-integration":"Оплата, подтверждение и статусы транзакций.","ai-agents":"Ассистенты для согласованных задач и процессов.","chatbot-development":"Диалоги, ответы и передача обращений команде.","mobile-app-development":"Мобильный продукт для iOS и Android.","ecommerce-mobile-apps":"Мобильный путь от каталога до покупки.","corporate-mobile-apps":"Рабочие инструменты для мобильной команды.","pwa-development":"Веб-приложение с возможностью установки."}',true);$out=array();
 foreach(mrseo_ru_menu_sections($d[9]) as $section)foreach($section['items'] as $item)$out[$item['slug']]=array($item['label'],$item['url'],$desc[$item['slug']]??'Проверяем задачу и согласуем конкретные работы.');
 return $out;
}
function mrseo_ru_category_orbit($slug){
 $d=mrseo_ru_category_home_data()[$slug]??null;if(mrseo_locale()!=='ru'||!$d)return;
 $nodes=mrseo_ru_category_items($slug);$assets=get_template_directory_uri().'/assets/';
 $map=$assets.'category-map-'.$d[8].'.svg';$preview=$assets.'category-planet-'.$d[8].'.svg';
 $first=reset($nodes);
 ?>
 <div class="pt-ua-home category-home" data-category-home="<?php echo esc_attr($d[8]);?>">
 <section data-ua-stage="hero" class="pt-home" aria-labelledby="category-title">
 <div class="pt-home-copy"><div class="pt-home-kicker"><?php echo esc_html($d[0]);?></div>
 <h1 class="pt-home-title" id="category-title"><?php echo esc_html($d[1]);?><br><em><?php echo esc_html($d[2]);?></em></h1>
 <p class="pt-home-lead"><?php echo esc_html($d[3]);?></p>
 <?php if($slug==='horoshop'):?><div class="category-partner"><img src="<?php echo esc_url($assets.'horoshop-wordmark.svg');?>" alt="Хорошоп" width="150" height="28"><img src="<?php echo esc_url($assets.'horoshop-partner-active.svg');?>" alt="Официальный партнёр Хорошоп — Partner ACTIVE" width="70" height="52"></div><?php endif;?>
 
 <div class="pt-home-actions"><a class="pt-home-cta" href="<?php echo esc_url(mrseo_url('contact','ru'));?>"><?php echo esc_html($d[4]);?> ↗</a><a class="pt-home-secondary" href="#<?php echo esc_attr($d[7]);?>">Посмотреть услуги ↓</a></div>
 <p class="pt-home-caption"><i aria-hidden="true"></i>Выберите спутник или посмотрите каталог ниже.</p></div>
 <div class="pt-orbit-shell"><div class="pt-orbit<?php if(count($nodes)>6)echo ' category-dense-orbit';?>" aria-label="Подкатегории услуг"><div class="pt-orbit-ring" aria-hidden="true"></div><div class="pt-orbit-ring r2" aria-hidden="true"></div><div class="pt-orbit-ring r3" aria-hidden="true"></div><svg class="pt-orbit-lines" aria-hidden="true"></svg>
 <div class="pt-globe" data-earth-src="<?php echo esc_url($map);?>" data-map="<?php echo esc_url($map);?>"><img src="<?php echo esc_url($preview);?>" alt="" width="420" height="420" decoding="async"><canvas aria-hidden="true"></canvas><span class="category-planet-name" aria-hidden="true"><?php echo esc_html(array('seo'=>'SEO','ads'=>'Google Ads','shop'=>'Хорошоп','sites'=>'WEB','dev'=>'DEV')[$d[8]]);?></span></div>
 <div class="pt-globe-tag"><?php echo esc_html($d[5]);?></div>
 <?php $i=0;foreach($nodes as $path=>$item):$label=$item[0];$url=$item[1];?>
 <a class="pt-node n<?php echo esc_attr($i);?>" href="<?php echo esc_url($url);?>" data-title="<?php echo esc_attr($label);?>" data-detail="<?php echo esc_attr($item[2]);?>"><span class="pt-node-icon" aria-hidden="true"><?php mrseo_category_icon($i);?></span><span class="pt-node-label"><?php echo esc_html($label);?></span><span class="pt-node-arrow" aria-hidden="true">↗</span></a><?php $i++;endforeach;?>
 </div><div class="pt-orbit-bottom"><div class="pt-orbit-detail" aria-live="polite"><strong>01 / <?php echo esc_html($first[0]??'');?></strong><span><?php echo esc_html($first[2]??'');?></span></div></div></div>
 </section></div><?php
}

function mrseo_ru_category_catalog($slug){
 $items=mrseo_ru_category_items($slug);$heading=array('seo'=>'Поисковые решения для вашего сайта','google-ads'=>'Кампании под вашу экономику','horoshop'=>'Инструменты развития магазина','service-websites'=>'Выберите формат вашего сайта','web-development'=>'Разработка для бизнес-процессов, а не ради кода.')[$slug];
 ?>
 <section data-ua-stage="catalog" class="category-catalog" id="ru-hub-catalog"><div class="category-shell"><span class="category-kicker">НАПРАВЛЕНИЯ РАБОТЫ</span><h2><?php echo esc_html($heading);?></h2><div class="category-tiles"><?php $i=0;foreach($items as $path=>$item):?><article class="category-tile"><span class="category-kicker"><?php echo esc_html(sprintf('%02d / %02d',++$i,count($items)));?></span><div class="category-tile-art" aria-hidden="true"><?php mrseo_category_tile_art($path,$i);?></div><h3><?php echo esc_html($item[0]);?></h3><p><?php echo esc_html($item[2]);?></p><a href="<?php echo esc_url($item[1]);?>">Подробнее <span aria-hidden="true">↗</span></a></article><?php endforeach;?></div></div></section><?php
}
function mrseo_ru_header_catalog(){
 $names=array('seo'=>'SEO','ads'=>'Google Ads','horoshop'=>'Хорошоп','sites'=>'Сайты','dev'=>'Веб-разработка');
 $parents=array('seo'=>'seo','ads'=>'google-ads','horoshop'=>'horoshop','sites'=>'service-websites','dev'=>'web-development');
 echo '<div class="mrseo-mega mrseo-mega--catalog" data-ru-mega="v4"><div class="mrseo-mega-grid mrseo-catalog-grid">';
 foreach($names as $key=>$label){echo '<section class="mrseo-catalog-group mrseo-catalog-group--'.esc_attr($key).'" data-catalog-group="'.esc_attr($key).'"><h3><a class="mrseo-catalog-parent" href="'.esc_url(mrseo_url($parents[$key],'ru')).'"><span class="mrseo-catalog-title">'.esc_html($label).'</span><span class="mrseo-catalog-arrow" aria-hidden="true">↗</span></a></h3><div class="mrseo-catalog-links">';
 foreach(mrseo_ru_menu_sections($key) as $section){echo '<section class="mrseo-catalog-subgroup"><h3>'.esc_html($section['title']).'</h3>';foreach($section['items'] as $service)echo '<a class="mrseo-mega-item mrseo-catalog-link" href="'.esc_url($service['url']).'">'.esc_html($service['label']).'</a>';echo '</section>';}
 echo '</div></section>';}
 echo '</div><div class="mrseo-catalog-footer"><div><strong>Нестандартная задача?</strong><p>Расскажите о ней — предложим возможное решение.</p></div><a href="'.esc_url(mrseo_url('contact','ru')).'">Обсудить проект ↗</a></div></div>';
}
add_filter('template_include',static fn($template)=>mrseo_ru_hub_route()?get_template_directory().'/ru-category-hub.php':$template,200);
add_action('wp_enqueue_scripts',static function(){
 if(mrseo_locale()!=='ru'||mrseo_slug()==='')return;
 $uri=get_template_directory_uri();
 wp_enqueue_style('mrseo-ru-simple-menu',$uri.'/assets/ua-simple-menu.css',array('mrseo-services-menu-toggle'),'1.1.0');
 wp_enqueue_style('mrseo-ru-catalog-header',$uri.'/assets/ua-catalog-header.css',array('mrseo-ru-simple-menu'),'4.0.1');
 if(!mrseo_ru_hub_route())return;
 wp_enqueue_style('mrseo-ru-hub-base',$uri.'/assets/premium-ua-interiors.css',array('mrseo-style'),'1.1.1');
 wp_enqueue_style('mrseo-ru-hub-engine',$uri.'/assets/home-uk-premium.css',array('mrseo-ru-hub-base'),'1.0.1');
 wp_enqueue_style('mrseo-ru-hub-layout',$uri.'/assets/ru-category-home.css',array('mrseo-ru-hub-engine'),'1.0.0');
 wp_enqueue_style('mrseo-ru-hub-tiles',$uri.'/assets/category-tiles.css',array('mrseo-ru-hub-layout'),'2.0.2');
 wp_enqueue_script('mrseo-ru-hub-orbit',$uri.'/assets/ru-category-orbit-engine.js',array(),'1.0.0',true);
},150);
