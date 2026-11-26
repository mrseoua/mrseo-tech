<?php
/** Ukrainian category orbit navigation; existing landing content and metadata remain intact. */
if (!defined('ABSPATH')) exit;
function mrseo_category_orbit_data(){
 return array(
 'seo'=>array('SEO-просування сайтів','seo',array('local-seo'=>'Локальне SEO','ecommerce-seo'=>'SEO інтернет-магазинів','service-business-seo'=>'SEO сайтів послуг','international-seo'=>'Міжнародне SEO','seo-audit'=>'SEO-аудит')),
 'google-ads'=>array('Реклама Google Ads','ads',array('google-search-ads'=>'Пошукова реклама','google-shopping'=>'Google Shopping','performance-max'=>'Performance Max','merchant-center'=>'Merchant Center','google-ads-audit'=>'Аудит Google Ads','local-google-ads'=>'Локальна реклама')),
 'horoshop'=>array('Послуги для магазинів на Хорошоп','shop',array('horoshop/setup'=>'Створення магазину','horoshop/seo'=>'SEO на Хорошоп','horoshop/audit'=>'Аудит','horoshop/ads'=>'Google Ads','horoshop/feeds'=>'Товарні фіди','horoshop/ga4'=>'GA4 та конверсії')),
 'service-websites'=>array('Створення сайтів для бізнесу','sites',array('local-business-websites'=>'Сайт для малого бізнесу','landing-pages'=>'Лендінги','corporate-websites'=>'Корпоративні сайти','website-redesign'=>'Редизайн сайту','website-maintenance'=>'Технічна підтримка')),
 'web-development'=>array('Веброзробка для бізнесу','dev',array('business-automation'=>'Автоматизація бізнесу','crm-development'=>'CRM','api-integrations'=>'API-інтеграції','ai-agents'=>'AI-агенти','web-applications'=>'Вебзастосунки','mobile-app-development'=>'Мобільні застосунки'))
 );
}

function mrseo_category_home_data(){return json_decode('{"seo":["SEO-ПРОСУВАННЯ САЙТІВ","Клієнти шукають.","Чому знаходять конкурентів?","Знаходимо, що заважає вашим сторінкам бути видимими в Google: від технічних помилок до невідповідності пошуковому попиту. Погоджуємо роботи, які мають сенс саме для вашого бізнесу.","Знайти причину низької видимості","SEO / ПОШУК","ukseo-cases","ukseo-services","seo","seo"],"google-ads":["КОНТЕКСТНА РЕКЛАМА GOOGLE ADS","Реклама працює.","А бізнес заробляє?","Налаштовуємо та ведемо Google Ads із фокусом на заявки, покупки й витрати. Перевіряємо конверсії та економіку кампаній. Не роздуваємо бюджети й не продаємо красиві звіти.","Перевірити ефективність реклами","ADS / КАМПАНІЇ","ukads-problems","ukads-services","ads","ads"],"horoshop":["СТВОРЕННЯ ТА РОЗВИТОК МАГАЗИНІВ","Магазин відкрито.","А де замовлення?","Допомагаємо запустити магазин на Хорошоп або поліпшити наявний: каталог, SEO, Google Ads, товарні фіди та аналітика. Враховуємо можливості платформи й тарифу.","Знайти точки росту магазину","HOROSHOP / МАГАЗИН","ukhoroshop-start","hs-services","shop","horoshop"],"service-websites":["СТВОРЕННЯ САЙТІВ ДЛЯ БІЗНЕСУ","Ваш бізнес заслуговує","на сайт, який продає.","Проєктуємо сайти, де клієнт швидко розуміє вашу пропозицію, знаходить потрібну послугу та може звернутися. Від структури й дизайну до адаптивності та запуску.","Обговорити майбутній сайт","WEB / ДИЗАЙН","uws-pains","category-services","sites","sites"],"web-development":["ВЕБРОЗРОБКА ДЛЯ БІЗНЕСУ","Бізнес зростає.","Чи встигають ваші системи?","Розробляємо CRM, вебзастосунки, інтеграції й автоматизацію під реальні процеси компанії. Прибираємо ручні операції там, де це виправдано, та погоджуємо критерії приймання.","Розібрати бізнес-процес","DEV / СИСТЕМИ","problems","dev-services","dev","dev"]}',true);}
function mrseo_category_service_desc(){return json_decode('{"local-seo":"Залучайте клієнтів із вашого міста й регіону.","ecommerce-seo":"Категорії, фільтри та товари під попит покупців.","service-business-seo":"Сторінки послуг, які відповідають запитам клієнтів.","international-seo":"Пошукова стратегія для різних країн і мов.","seo-audit":"Діагностика перешкод і пріоритетний план виправлень.","google-search-ads":"Оголошення за релевантними комерційними запитами.","google-shopping":"Товарні кампанії з контролем якості каталогу.","performance-max":"Кампанії з перевіркою конверсій та економіки продажів.","merchant-center":"Перевірка товарних даних і причин відхилень.","google-ads-audit":"Знаходимо непродуктивні витрати та помилки обліку.","local-google-ads":"Реклама в реальній зоні обслуговування.","google-remarketing":"Повернення зацікавленої аудиторії з урахуванням згоди.","setup":"Каталог, оплата, доставка та перевірка замовлення.","seo":"Категорії та фільтри під пошуковий попит.","audit":"Індексація, canonical і технічні обмеження платформи.","ads":"Кампанії для товарів і контроль покупок.","search-ads":"Пошукові оголошення під асортимент магазину.","shopping":"Товарна реклама на основі коректного фіда.","pmax":"Performance Max із перевіреними сигналами продажів.","feeds":"Точність цін, наявності й атрибутів товарів.","ga4":"Вимірювання покупок і шляху до замовлення.","wordpress-development":"Керований сайт із редактором контенту.","landing-pages":"Окрема пропозиція для цільової рекламної кампанії.","local-business-websites":"Зрозумілі послуги, контакти та зручний запис.","corporate-websites":"Структура для напрямів, команди й клієнтів компанії.","website-redesign":"Оновлення інтерфейсу зі збереженням важливих URL.","website-maintenance":"Оновлення, резервні копії та контроль роботи.","website-speed-security":"Перевірка швидкості й технічних ризиків.","business-automation":"Менше ручних операцій у щоденних процесах.","crm-development":"Заявки, статуси та робота менеджерів в одній системі.","web-applications":"Онлайн-сервіси з бізнес-логікою та ролями.","business-dashboards":"Показники компанії в зрозумілому інтерфейсі.","client-portals":"Доступ клієнтів до статусів, документів і заявок.","api-integrations":"Обмін даними між потрібними сервісами.","custom-functionality":"Функції, яких бракує готовим рішенням.","data-parsing":"Збір та синхронізація потрібних даних.","payment-integration":"Оплата, підтвердження та статуси транзакцій.","ai-agents":"Асистенти для погоджених задач і процесів.","chatbot-development":"Діалоги, відповіді та передача звернень команді.","mobile-app-development":"Мобільний продукт для iOS та Android.","ecommerce-mobile-apps":"Мобільний шлях від каталогу до покупки.","corporate-mobile-apps":"Робочі інструменти для мобільної команди.","pwa-development":"Вебзастосунок із можливостями встановлення."}',true);}
function mrseo_category_is_root(){
 $slug=mrseo_slug();if(mrseo_locale()!=='uk'||!isset(mrseo_category_home_data()[$slug]))return false;
 $path=wp_parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH);
 return untrailingslashit($path)===untrailingslashit(wp_parse_url(home_url('/'.$slug.'/'),PHP_URL_PATH));
}
add_action('wp_enqueue_scripts',function(){
 if(!mrseo_category_is_root())return;
 wp_enqueue_style('mrseo-category-home-engine',get_template_directory_uri().'/assets/home-uk-premium.css',array('mrseo-style'),'1.0.1');
 wp_enqueue_style('mrseo-category-home-layout',get_template_directory_uri().'/assets/category-home.css',array('mrseo-category-home-engine'),'2.0.0');
 wp_enqueue_script('mrseo-category-home-engine',get_template_directory_uri().'/assets/home-uk-premium.js',array(),'1.0.1',true);
},150);
function mrseo_category_items($slug){
 $d=mrseo_category_home_data()[$slug];$out=array();
 require_once get_template_directory().'/inc/home-service-sublinks.php';
 foreach(mrseo_home_subservice_groups($d[9]) as $group)foreach($group['items'] as $item){
  $path=trim(wp_parse_url($item['url'],PHP_URL_PATH),'/');$key=basename($path);
  if($slug==='google-ads'&&$key==='google-remarketing')continue;
  $out[$path]=array($item['label'],$item['url'],mrseo_category_service_desc()[$key]??'Перевіряємо потреби проєкту й погоджуємо конкретні роботи.');
 }
 if($slug==='horoshop')$out=array('horoshop/setup'=>array('Створення магазину',mrseo_hs_url('setup'),mrseo_category_service_desc()['setup']))+$out;
 return $out;
}
function mrseo_category_orbit($slug){
 $d=mrseo_category_home_data()[$slug]??null;if(mrseo_locale()!=='uk'||!$d)return;
 $nodes=mrseo_category_orbit_data()[$slug][2];$assets=get_template_directory_uri().'/assets/';
 $map=$assets.'category-map-'.$d[8].'.svg';$preview=$assets.'category-planet-'.$d[8].'.svg';
 $details=mrseo_category_service_desc();
 ?>
 <div class="pt-ua-home category-home" data-category-home="<?php echo esc_attr($d[8]);?>">
 <section data-ua-stage="hero" class="pt-home" aria-labelledby="category-title">
 <div class="pt-home-copy"><div class="pt-home-kicker"><?php echo esc_html($d[0]);?></div>
 <h1 class="pt-home-title" id="category-title"><?php echo esc_html($d[1]);?><br><em><?php echo esc_html($d[2]);?></em></h1>
 <p class="pt-home-lead"><?php echo esc_html($d[3]);?></p>
 <?php if($slug==='horoshop'):?><div class="category-partner"><img src="<?php echo esc_url($assets.'horoshop-wordmark.svg');?>" alt="Хорошоп" width="150" height="28"><img src="<?php echo esc_url($assets.'horoshop-partner-active.svg');?>" alt="Офіційний партнер Хорошоп — Partner ACTIVE" width="70" height="52"></div><?php endif;?>
 <?php if($slug==='google-ads')mrseo_ads_position_hero('google-ads');?>
 <div class="pt-home-actions"><a class="pt-home-cta" href="<?php echo esc_url(mrseo_url('contact','uk'));?>"><?php echo esc_html($d[4]);?> ↗</a><a class="pt-home-secondary" href="#<?php echo esc_attr($d[7]);?>">Переглянути послуги ↓</a></div>
 <p class="pt-home-caption"><i aria-hidden="true"></i>Оберіть супутник або перегляньте каталог нижче. Наведіть на послугу, щоб зупинити орбіту.</p></div>
 <div class="pt-orbit-shell"><div class="pt-orbit" aria-label="Підкатегорії послуг"><div class="pt-orbit-ring" aria-hidden="true"></div><div class="pt-orbit-ring r2" aria-hidden="true"></div><div class="pt-orbit-ring r3" aria-hidden="true"></div><svg class="pt-orbit-lines" aria-hidden="true"></svg>
 <div class="pt-globe" data-earth-src="<?php echo esc_url($map);?>" data-map="<?php echo esc_url($map);?>"><img src="<?php echo esc_url($preview);?>" alt="" width="420" height="420" decoding="async"><canvas aria-hidden="true"></canvas></div>
 <div class="pt-globe-tag"><?php echo esc_html($d[5]);?></div>
 <?php $i=0;foreach($nodes as $path=>$label):$key=basename($path);$url=$slug==='horoshop'?mrseo_hs_url($key):($key==='mobile-app-development'?home_url('/'.$key.'/'):mrseo_url($key,'uk'));?>
 <a class="pt-node n<?php echo esc_attr($i);?>" href="<?php echo esc_url($url);?>" data-title="<?php echo esc_attr($label);?>" data-detail="<?php echo esc_attr($details[$key]??$label);?>"><span class="pt-node-icon" aria-hidden="true"><?php mrseo_category_icon($i);?></span><span class="pt-node-label"><?php echo esc_html($label);?></span><span class="pt-node-arrow" aria-hidden="true">↗</span></a><?php $i++;endforeach;?>
 </div><div class="pt-orbit-bottom"><div class="pt-orbit-detail" aria-live="polite"><strong>01 / <?php echo esc_html(reset($nodes));?></strong><span><?php echo esc_html($details[basename(key($nodes))]??reset($nodes));?></span></div><button type="button" class="pt-rotate" aria-pressed="false">Призупинити рух</button></div></div>
 </section></div><?php
}
function mrseo_category_icon($i){
 $icons=array('<circle cx="10" cy="10" r="6"/><path d="m15 15 6 6"/>','<path d="M3 5h3l3 12h11l2-9H7M10 21h.1M19 21h.1"/>','<rect x="4" y="4" width="16" height="16" rx="3"/><path d="M4 9h16M8 14h8"/>','<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c-5 5-5 13 0 18 5-5 5-13 0-18"/>','<path d="M5 20V5h14v15zM8 9h8M8 13h8M8 17h5"/>','<path d="m4 9 8-5 8 5-8 5zM4 13l8 5 8-5M4 17l8 5 8-5"/>');
 echo '<svg viewBox="0 0 24 24" fill="none" stroke="#9a4c3b" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">'.$icons[$i%count($icons)].'</svg>';
}
function mrseo_category_catalog($slug){
 $d=mrseo_category_home_data()[$slug];$items=mrseo_category_items($slug);
 ?>
 <section data-ua-stage="catalog" class="category-catalog" id="<?php echo esc_attr($d[7]);?>"><div class="category-shell"><span class="category-kicker">НАПРЯМИ РОБОТИ</span><h2><?php echo esc_html(array('seo'=>'Пошукові рішення для вашого сайту','google-ads'=>'Кампанії під вашу економіку','horoshop'=>'Інструменти розвитку магазину','service-websites'=>'Оберіть формат вашого сайту','web-development'=>'Рішення для ваших процесів')[$slug]);?></h2><div class="category-tiles">
 <?php $i=0;foreach($items as $path=>$item):?><article class="category-tile"<?php if($slug==='horoshop')echo ' id="hs-'.esc_attr(basename($path)).'"';?>><span class="category-kicker"><?php echo esc_html(sprintf('%02d',++$i));?> / <?php echo esc_html($d[5]);?></span><h3><?php echo esc_html($item[0]);?></h3><div class="category-tile-art" aria-hidden="true"><?php mrseo_category_tile_art($path,$i);?></div><p><?php echo esc_html($item[2]);?></p><a href="<?php echo esc_url($item[1]);?>">Детальніше <span aria-hidden="true">↗</span></a></article><?php endforeach;?>
 </div></div></section><?php
}
function mrseo_category_tile_art($path,$i){
 $seed=crc32($path);$kind=$seed%6;
 ?><svg viewBox="0 0 280 136" aria-hidden="true"><rect x="9" y="9" width="262" height="118" rx="10" fill="#fcf9f3" stroke="#d3c2b0"/><path d="M9 27h262" stroke="#d3c2b0"/><g fill="#ad8f7d"><circle cx="20" cy="18" r="2.4"/><circle cx="29" cy="18" r="2.4"/><circle cx="38" cy="18" r="2.4"/></g>
 <?php if($kind===0):?><g fill="#e9d9c8"><rect x="25" y="40" width="230" height="17" rx="7"/><?php for($j=0;$j<3;$j++):?><rect x="25" y="<?php echo 66+$j*17;?>" width="<?php echo 205-($seed%27)-$j*23;?>" height="9" rx="3"/><?php endfor;?></g><circle cx="238" cy="48" r="5" fill="none" stroke="#a84432" stroke-width="2"/>
 <?php elseif($kind===1):?><path d="M27 110h224M27 110V42" stroke="#c8b6a3"/><g fill="#b76e57"><?php for($j=0;$j<6;$j++):$h=15+($seed>>$j)%25+$j*7;?><rect x="<?php echo 43+$j*34;?>" y="<?php echo 110-$h;?>" width="20" height="<?php echo $h;?>" rx="4"/><?php endfor;?></g>
 <?php elseif($kind===2):?><g fill="#ede3d8" stroke="#c8b6a3"><?php for($j=0;$j<3;$j++):?><rect x="<?php echo 25+$j*79;?>" y="43" width="66" height="66" rx="7"/><rect x="<?php echo 34+$j*79;?>" y="51" width="48" height="<?php echo 25+($seed>>$j)%10;?>" rx="4" fill="#ba8c74"/><path d="M<?php echo 35+$j*79;?> 99h43" stroke="#a84432"/><?php endfor;?></g>
 <?php elseif($kind===3):?><g fill="#e7d6c4" stroke="#bca58e"><rect x="25" y="43" width="81" height="64" rx="7"/><rect x="174" y="43" width="81" height="64" rx="7"/><path d="M106 60h68M106 90h68" fill="none" stroke="#a84432" stroke-width="2" stroke-dasharray="4 4"/><circle cx="<?php echo 125+$seed%30;?>" cy="60" r="5" fill="#a84432"/></g>
 <?php elseif($kind===4):?><rect x="28" y="40" width="165" height="73" rx="5" fill="#ede3d5" stroke="#bda992"/><rect x="39" y="50" width="140" height="22" rx="4" fill="#b77761"/><path d="M39 84h83M39 94h105" stroke="#b2a08f" stroke-width="5" stroke-linecap="round"/><rect x="183" y="57" width="<?php echo 39+$seed%8;?>" height="57" rx="6" fill="#fffaf1" stroke="#ac9380"/><path d="M192 70h23M192 80h18" stroke="#a84432" stroke-width="4"/>
 <?php else:?><g fill="#ded0c0" stroke="#b59d87"><circle cx="140" cy="75" r="23"/><?php for($j=0;$j<5;$j++):$a=$j*2*M_PI/5+($seed%19)/19;$x=140+91*cos($a);$y=75+34*sin($a);?><path d="M140 75L<?php echo $x.' '.$y;?>" stroke="#a84432"/><circle cx="<?php echo $x;?>" cy="<?php echo $y;?>" r="11" fill="#f4e9db"/><?php endfor;?></g><?php endif;?>
 </svg><?php
}
