<?php
if(!defined('ABSPATH'))exit;
$groups=array(
 array('01','SEO-просування','seo','search',array(
  array('Локальне SEO','6 000','/ місяць','local-seo'),
  array('SEO сайтів послуг','8 000','/ місяць','service-business-seo'),
  array('SEO інтернет-магазинів','10 000','/ місяць','ecommerce-seo'),
  array('SEO-аудит','3 000','разово','seo-audit')
 ),'Обсяг оптимізації, сторінки та пріоритетні завдання погоджуємо на старті.'),
 array('02','Google Ads','google-ads','ads',array(
  array('Налаштування та ведення Google Ads','5 000','/ місяць','google-ads'),
  array('Performance Max','6 000','/ місяць','performance-max')
 ),'Робота з рекламними кампаніями та їх ефективністю. Рекламний бюджет сплачується окремо.'),
 array('03','Хорошоп','horoshop','shop',array(
  array('SEO та Google Ads для магазину',null,'','horoshop')
 ),'Вартість залежить від каталогу, рекламних кампаній та обраних послуг. Розрахунок за тарифами SEO й Google Ads після оцінки магазину.'),
 array('04','Створення сайтів','service-websites','web',array(
  array('Лендінг','8 000','за проєкт','landing-pages'),
  array('Сайт на WordPress','12 000','за проєкт','wordpress-development'),
  array('Корпоративний сайт','20 000','за проєкт','corporate-websites')
 ),'Погоджуємо структуру, дизайн, функціональність і наповнення до початку робіт.'),
 array('05','Веброзробка','web-development','dev',array(
  array('AI-агенти та автоматизація','10 000','за проєкт','business-automation'),
  array('CRM та складна розробка',null,'','crm-development')
 ),'Оцінюємо бізнес-процес, інтеграції та функціональні вимоги. Вартість складних систем визначаємо індивідуально.')
);
$icons=array('search'=>'<circle cx="10" cy="10" r="6"/><path d="m15 15 6 6"/>','ads'=>'<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/>','shop'=>'<path d="M4 8h16l1 13H3zM8 8V6a4 4 0 0 1 8 0v2"/>','web'=>'<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M7 6.5h.1M10 6.5h.1"/>','dev'=>'<path d="m8 6-6 6 6 6m8-12 6 6-6 6m-3-15-5 18"/>');
get_header();?>
<div class="mp-price">
 <section class="mp-price-hero mp-price-wrap">
  <div><span class="mp-kicker">ВАРТІСТЬ ПОСЛУГ / MRSEO.TECH</span>
   <h1>Професійний рівень.<br><em>Без зайвих націнок.</em></h1>
   <p>Зрозумілі стартові ціни на SEO, Google Ads, створення сайтів та розробку. Погоджуємо обсяг робіт і вартість до початку співпраці.</p>
   <a class="mp-button" href="#mp-tariffs">Переглянути ціни <span aria-hidden="true">↓</span></a>
  </div>
  <div class="mp-price-feature"><span class="mp-kicker">КОМПЛЕКСНЕ ПРОСУВАННЯ</span><h2>SEO + Google Ads</h2><p class="mp-big">від <strong>13 000</strong><small>грн / місяць</small></p><p>Пошукова видимість і рекламні кампанії в межах узгодженого плану. Рекламний бюджет окремо.</p><a href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Обговорити співпрацю ↗</a></div>
 </section>
 <section id="mp-tariffs" class="mp-price-wrap mp-tariffs" aria-labelledby="mp-tariffs-title">
  <div class="mp-section-head"><span class="mp-kicker">05 / НАПРЯМИ РОБОТИ</span><h2 id="mp-tariffs-title">Оберіть потрібну послугу</h2><p>Усі ціни наведено в гривнях. Це стартова вартість, а не фіксований кошторис для будь-якого проєкту.</p></div>
  <div class="mp-grid">
  <?php foreach($groups as $group):?>
   <article class="mp-card" data-pricing-group="<?php echo esc_attr($group[2]);?>">
    <div class="mp-card-head"><span class="mp-symbol"><svg viewBox="0 0 24 24" width="29" height="29" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $icons[$group[3]];?></svg></span><span class="mp-number"><?php echo esc_html($group[0]);?></span></div>
    <h3><a href="<?php echo esc_url(mrseo_url($group[2],'uk'));?>"><?php echo esc_html($group[1]);?> ↗</a></h3>
    <div class="mp-rates"><?php foreach($group[4] as $rate):?>
     <div class="mp-rate"><a href="<?php echo esc_url(mrseo_url($rate[3],'uk'));?>"><?php echo esc_html($rate[0]);?></a><span class="mp-rate-amount"><?php if($rate[1]!==null):?><small>від</small> <strong><?php echo esc_html($rate[1]);?></strong> <small>грн <?php echo esc_html($rate[2]);?></small><?php else:?><strong class="mp-custom">Індивідуально</strong><?php endif;?></span></div>
    <?php endforeach;?></div>
    <p class="mp-note"><?php echo esc_html($group[5]);?></p>
   </article>
  <?php endforeach;?>
  </div>
 </section>
 <section class="mp-price-wrap mp-conditions" aria-labelledby="mp-conditions-title"><div><span class="mp-kicker">ПРОЗОРІ УМОВИ</span><h2 id="mp-conditions-title">За що ви платите</h2></div><div class="mp-conditions-list"><div><h3>01 / Обсяг робіт</h3><p>Фіксуємо завдання, строки й очікуваний результат перед стартом. Додаткові роботи погоджуємо окремо.</p></div><div><h3>02 / Окремі витрати</h3><p>Рекламний бюджет, платні сервіси, купівля посилань, хостинг і ліцензії не входять до стартових тарифів.</p></div><div><h3>03 / Остаточна вартість</h3><p>Залежить від стану сайту, розміру проєкту, конкуренції та потрібних функцій. Узгоджуємо її до початку робіт.</p></div></div></section>
 <section class="mp-price-wrap mp-price-faq"><h2>Поширені запитання</h2><details><summary>Чому вказано ціни «від»?</summary><p>Невеликий локальний сайт і великий інтернет-магазин потребують різного обсягу робіт. Стартові ціни допомагають оцінити бюджет, а точну пропозицію готуємо після знайомства з вашим проєктом.</p></details><details><summary>Чи входить рекламний бюджет у вартість Google Ads?</summary><p>Ні. Оплата роботи команди та витрати на покази й кліки в Google Ads — окремі статті бюджету.</p></details><details><summary>Чи можна замовити лише одну послугу?</summary><p>Так. Можна почати з окремого аудиту, SEO, реклами або розробки й надалі розширювати співпрацю за потреби.</p></details></section>
 <section class="mp-price-wrap mp-final"><div><h2>Потрібна точна вартість?</h2><p>Розкажіть про бізнес і завдання. Підготуємо пропозицію під ваш проєкт.</p></div><a class="mp-button" href="<?php echo esc_url(mrseo_url('contact','uk'));?>">Отримати пропозицію ↗</a></section>
</div>
<?php get_footer();?>
