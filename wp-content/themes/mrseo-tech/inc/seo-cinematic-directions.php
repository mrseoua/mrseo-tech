<?php if(!defined('ABSPATH'))exit; ?>
<?php
$seo_home_cards=array(
 array('seo-audit','SEO-аудит','ДІАГНОСТИКА / ПРІОРИТЕТИ','Виявляємо технічні та структурні перешкоди. Ви отримуєте пріоритетний план виправлень.',array('Індексація','Дублікати URL','План дій')),
 array('ecommerce-seo','SEO інтернет-магазинів','КАТАЛОГ / ПОПИТ','Зіставляємо категорії, фільтри й товари з пошуковим попитом покупців.',array('Категорії','Фільтри','Товари')),
 array('local-seo','Локальне SEO','МІСТО / ПОШУК','Допомагаємо клієнтам знаходити ваш бізнес у потрібному місті та звертатися до вас.',array('Місто','Профіль компанії','Контакти')),
 array('service-business-seo','SEO сайтів послуг','ПОСЛУГИ / ЗВЕРНЕННЯ','Створюємо зрозумілу пошукову структуру під конкретні послуги й запити.',array('Запит','Сторінка послуги','Заявка')),
 array('international-seo','Міжнародне SEO','МОВИ / РИНКИ','Узгоджуємо мовні версії, пошуковий попит і технічні налаштування для кожного ринку.',array('Мова','Ринок','Відповідна URL'))
);
?>
<section class="pti-section seo-directions" id="ukseo-services" aria-labelledby="seo-directions-title">
 <div class="pti-wrap">
  <div class="pti-section-head"><div><span class="pti-kicker">НАПРЯМИ SEO</span><h2 id="seo-directions-title">Оберіть рішення <em>для свого бізнесу.</em></h2></div><p>П’ять напрямів. Починаємо з вашої задачі, а не з універсального пакета.</p></div>
  <div class="seo-cards">
  <?php foreach($seo_home_cards as $i=>$dir):?>
   <article class="seo-card"><span class="pti-num"><?php echo esc_html(sprintf('%02d',$i+1));?> / SEO</span>
    <h3><?php echo esc_html($dir[1]);?></h3>
    <div class="seo-home-window seo-mini seo-mini-<?php echo esc_attr($i);?>" aria-hidden="true"><div class="seo-home-bar"><span class="seo-home-dots"><i></i><i></i><i></i></span><b><?php echo esc_html($dir[2]);?></b></div><div class="seo-mini-screen">
    <?php if($i===2):?><svg class="seo-mini-map" viewBox="0 0 280 105" aria-hidden="true"><path d="M0 30H280M0 75H280M60 0L100 105M190 0L140 105" fill="none" stroke="#d6e0da" stroke-width="9"/><circle cx="140" cy="50" r="34" fill="#a8443211" stroke="#a84432" stroke-dasharray="4 4"/><path d="M140 78C126 60 119 50 119 40a21 21 0 0 1 42 0c0 10-7 20-21 38Z" fill="#a84432"/><circle cx="140" cy="40" r="7" fill="#fff"/></svg><?php endif;?>
    <?php foreach($dir[4] as $j=>$item):?><div class="seo-mini-row"><span><?php echo esc_html($item);?></span><i></i><b><?php echo $j===2?'↗':'✓';?></b></div><?php endforeach;?>
    </div></div>
    <p><?php echo esc_html($dir[3]);?></p><a class="seo-card-link" href="<?php echo esc_url(mrseo_url($dir[0],'uk'));?>">Детальніше <span aria-hidden="true">↗</span></a>
   </article>
  <?php endforeach;?>
   <article class="seo-approach" id="seo-approach"><span class="pti-kicker">НЕ НАБІР ПОСЛУГ. РІШЕННЯ ВАШОЇ ЗАДАЧІ.</span><h3>Є проблема?<br><em>Знайдемо рішення.</em></h3><p>Не знаєте, з якого SEO-напряму почати? Розкажіть, що не працює на вашому сайті.</p><a class="pti-pill" href="<?php echo esc_url(mrseo_url('contact'));?>">Обговорити проєкт ↗</a></article>
  </div>
 </div>
</section>
