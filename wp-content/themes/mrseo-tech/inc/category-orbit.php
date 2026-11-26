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
add_action('wp_enqueue_scripts',function(){
 if(mrseo_locale()!=='uk'||!isset(mrseo_category_orbit_data()[mrseo_slug()]))return;
 wp_enqueue_style('mrseo-category-orbit',get_template_directory_uri().'/assets/category-orbit.css',array('mrseo-style'),'1.0.0');
 wp_enqueue_script('mrseo-category-orbit',get_template_directory_uri().'/assets/category-orbit.js',array(),'1.0.0',true);
},150);
function mrseo_category_orbit($slug){
 $d=mrseo_category_orbit_data()[$slug]??null;
 if(mrseo_locale()!=='uk'||!$d)return;
 ?>
 <section class="category-orbit" data-category-orbit="<?php echo esc_attr($d[1]);?>" aria-label="<?php echo esc_attr($d[0]);?>">
 <div class="co-shell">
 <div class="co-heading"><span>MRSEO.TECH / НАПРЯМИ ПОСЛУГ</span><h2><?php echo esc_html($d[0]);?></h2><p>Оберіть напрям, який відповідає задачі вашого бізнесу.</p></div>
 <div class="co-stage">
 <svg class="co-tracks" viewBox="0 0 1000 500" preserveAspectRatio="none" aria-hidden="true"><ellipse cx="500" cy="250" rx="375" ry="170"/><ellipse cx="500" cy="250" rx="310" ry="207" transform="rotate(-8 500 250)"/><ellipse cx="500" cy="250" rx="265" ry="135" transform="rotate(15 500 250)"/><g class="co-connectors"></g></svg>
 <div class="co-center" aria-hidden="true"><div class="co-plinth"></div><div class="co-core">
 <?php if($d[1]==='seo'):?><div class="co-sphere"><i></i><i></i><i></i><div class="co-search">⌕ <b>SEO</b></div><div class="co-bars"><i></i><i></i><i></i><i></i></div></div>
 <?php elseif($d[1]==='ads'):?><div class="co-prism"><div class="co-prism-face"></div><strong>Ads</strong><div class="co-bars"><i></i><i></i><i></i><i></i></div></div>
 <?php elseif($d[1]==='shop'):?><div class="co-store"><div class="co-awning"></div><b>Хорошоп</b><div class="co-products"><i>◈</i><i>▣</i><i>◉</i></div><div class="co-store-footer"></div></div>
 <?php elseif($d[1]==='sites'):?><div class="co-monitor"><div class="co-window"><i></i><i></i><i></i><b>Ваш бізнес<br>онлайн</b><span></span></div></div><div class="co-tablet"><i></i><b></b><span></span></div><div class="co-phone"><i></i><b></b><span></span></div>
 <?php else:?><div class="co-cubes"><div>CRM</div><div>API</div><div>&lt;/&gt;</div><div>AI</div><div>DATA</div></div><?php endif;?>
 </div></div>
 <nav class="co-satellites" aria-label="Послуги напряму">
 <?php $n=count($d[2]);$i=0;foreach($d[2] as $path=>$label):$angle=-M_PI/2+2*M_PI*$i/$n;$x=50+37*cos($angle);$y=50+34*sin($angle);?>
 <a class="co-satellite" data-angle="<?php echo esc_attr($angle);?>" style="--x:<?php echo esc_attr($x);?>%;--y:<?php echo esc_attr($y);?>%" href="<?php echo esc_url(home_url('/'.$path.'/'));?>"><span class="co-node" aria-hidden="true"><?php echo esc_html(sprintf('%02d',$i+1));?></span><span><?php echo esc_html($label);?></span><span class="co-arrow" aria-hidden="true">↗</span></a>
 <?php $i++;endforeach;?>
 </nav></div>
 <div class="co-actions"><a class="co-cta" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити проєкт ↗</a><button class="co-pause" type="button" aria-pressed="false">Призупинити рух</button></div>
 </div></section>
 <?php
}
