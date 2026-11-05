<?php
/**
 * Premium, concise Ukrainian-only explanatory illustrations.
 * No external assets/JS, fake outcomes, tracking, or client case studies.
 */
if (!defined('ABSPATH')) exit;

function mrseo_ua4_visual_data($slug) {
 $pages=array(
  'ecommerce-seo'=>array(
   'journey'=>array(
    'eyebrow'=>'ПОШУК І КАТАЛОГ',
    'heading'=>array('Покупець шукає товар.','Магазин має показати потрібне.'),
    'lead'=>'Добре організований каталог допомагає знайти категорію, вибрати модель і перейти до товару.',
    'steps'=>array(
     array('КАТЕГОРІЯ','Знаходять категорію','Сторінка відповідає запиту покупця.','catalog'),
     array('ВИБІР','Зручно обирають','Фільтри допомагають без зайвих дублів.','filters'),
     array('ТОВАР','Переходять до товару','Опис і характеристики допомагають зробити вибір.','product')
    )),
   'plan'=>array(
    'eyebrow'=>'СТРУКТУРА, А НЕ МАСОВЕ СТВОРЕННЯ URL',
    'heading'=>array('Менше хаосу в каталозі.','Більше зрозумілих рішень.'),
    'lead'=>'Визначаємо, які сторінки потрібні пошуку, а які лише створюють технічний шум.',
    'type'=>'catalog',
    'artTitle'=>'Карта каталогу',
    'steps'=>array(
     array('Знаходимо попит','Категорії, бренди та моделі, які реально шукають.'),
     array('Прибираємо перешкоди','Дублі, індексація, навігація та перелінкування.'),
     array('Перевіряємо зміни','Доступність важливих URL і пошукові сигнали.')),
    'cta'=>'Обговорити мій каталог'
   )
  ),
  'analytics'=>array(
   'journey'=>array(
    'eyebrow'=>'АНАЛІТИКА БЕЗ ЗАЙВИХ ЦИФР',
    'heading'=>array('Від дії на сайті —','до зрозумілого рішення.'),
    'lead'=>'Спочатку перевіряємо, чи правильно збираються події. Лише потім використовуємо їх у звітах.',
    'steps'=>array(
     array('ДІЯ','Людина діє','Надсилає форму, телефонує або замовляє.','event'),
     array('ПЕРЕВІРКА','Дані підтверджені','Перевіряємо події, дублікати та пропуски.','verify'),
     array('РІШЕННЯ','Звіт допомагає','Показники пов’язані з питаннями бізнесу.','report')
    )),
   'plan'=>array(
    'eyebrow'=>'ДАНІ, ЯКИМ МОЖНА ДОВІРЯТИ',
    'heading'=>array('Не просто ще один звіт.','Чітка картина для рішень.'),
    'lead'=>'GA4 та Google Ads можуть рахувати по-різному. Пояснюємо відмінності, перевіряємо якість вимірювання.',
    'type'=>'analytics',
    'artTitle'=>'Перевірка вимірювання',
    'steps'=>array(
     array('Визначаємо потрібні дії','Які заявки та покупки важливі саме вам.'),
     array('Перевіряємо збір даних','Події, дублікати, передачу та атрибуцію.'),
     array('Робимо звіти зрозумілими','Показуємо, на що можна спиратися, а де є обмеження.')),
    'cta'=>'Перевірити мою аналітику'
   )
  ),
  'service-websites'=>array(
   'journey'=>array(
    'eyebrow'=>'САЙТ, НА ЯКОМУ ЛЕГКО ЗВЕРНУТИСЯ',
    'heading'=>array('Побачили послугу.','Зрозуміли. Звернулися.'),
    'lead'=>'Хороший сайт послуг не перевантажує людину — він допомагає швидко знайти відповідь.',
    'steps'=>array(
     array('ПОТРЕБА','Шукають послугу','Знаходять сторінку під свій запит.','search'),
     array('ДОВІРА','Розуміють пропозицію','Бачать, що входить у послугу та як працюєте.','website'),
     array('КОНТАКТ','Можуть звернутися','Форма або телефон доступні без зайвих кроків.','contact')
    )),
   'plan'=>array(
    'eyebrow'=>'СТВОРЕННЯ САЙТІВ ДЛЯ ПОСЛУГ',
    'heading'=>array('Не лише красивий макет.','Зручний шлях до заявки.'),
    'lead'=>'Поєднуємо структуру, дизайн і технічну готовність до просування.',
    'type'=>'website',
    'artTitle'=>'Від структури до сайту',
    'steps'=>array(
     array('Продумуємо сторінки','Що потрібно відвідувачам і як вони шукатимуть послуги.'),
     array('Створюємо зручний сайт','Адаптивна верстка, зрозумілий контент і контакти.'),
     array('Готуємо до запуску','Перевірка форм, швидкодії та базових SEO-вимог.')),
    'cta'=>'Обговорити створення сайту'
   )
  ),
  'horoshop'=>array(
   'journey'=>array(
    'eyebrow'=>'ХОРОШОП / ВІД КАТАЛОГУ ДО ЗАМОВЛЕННЯ',
    'heading'=>array('Платформа вже є.','Важливо правильно її налаштувати.'),
    'lead'=>'Працюємо з тим, що дозволяє Хорошоп: структурою каталогу, товарними даними та шляхом покупця.',
    'steps'=>array(
     array('КАТАЛОГ','Логічна структура','Категорії та фільтри відповідають потребам покупця.','catalog'),
     array('ТОВАРИ','Коректні дані','Перевіряємо назви, ціни та доступність товарів.','feed'),
     array('ПОКУПКА','Зручний шлях','Покупцю легко знайти товар і оформити замовлення.','checkout')
    )),
   'plan'=>array(
    'eyebrow'=>'З УРАХУВАННЯМ МОЖЛИВОСТЕЙ ХОРОШОП',
    'heading'=>array('Не обіцяємо неможливого.','Використовуємо доступне.'),
    'lead'=>'Не кожне рішення можна реалізувати на готовій платформі. Спочатку перевіряємо її можливості.',
    'type'=>'horoshop',
    'artTitle'=>'Налаштування магазину',
    'steps'=>array(
     array('Перевіряємо обмеження','Що доступно в налаштуваннях, інтеграціях та SEO-функціях.'),
     array('Визначаємо важливі зміни','Категорії, індексація, фід або рекламні дані.'),
     array('Контролюємо після запуску','Перевіряємо URL, товарні дані та цільові дії.')),
    'cta'=>'Обговорити мій Хорошоп'
   )
  )
 );
 return $pages[$slug]??null;
}

/** Decorative scene is excluded from accessibility tree; surrounding prose is semantic. */
function mrseo_ua4_draw_art($kind) { ?>
 <div class="ua4-art ua4-art--<?php echo esc_attr($kind);?>" aria-hidden="true">
 <?php if(in_array($kind,array('catalog','filters','product','feed','checkout'),true)): ?>
  <div class="ua4-store-ui">
   <div class="ua4-browser-top"><i></i><i></i><i></i><span>МАГАЗИН</span></div>
   <?php if($kind==='catalog'):?>
    <div class="ua4-catalog-title">Категорії товарів</div>
    <div class="ua4-catalog-tiles"><i></i><i></i><i></i></div>
    <div class="ua4-catalog-bars"><i></i><i></i></div>
   <?php elseif($kind==='filters'):?>
    <div class="ua4-catalog-title">Оберіть потрібне</div>
    <div class="ua4-filter-chips"><span>Бренд</span><span>Модель</span><span>Тип</span></div>
    <div class="ua4-filter-found"><b>✓</b><i></i></div>
   <?php elseif($kind==='product'):?>
    <div class="ua4-product-layout"><div class="ua4-product-image">▣</div><div class="ua4-product-copy"><strong>Потрібний товар</strong><i></i><i></i><span>Деталі <b>↗</b></span></div></div>
   <?php elseif($kind==='feed'):?>
    <div class="ua4-catalog-title">Товарні дані</div>
    <div class="ua4-feed-row"><b>✓</b><span>Назва</span><i></i></div>
    <div class="ua4-feed-row"><b>✓</b><span>Ціна</span><i></i></div>
    <div class="ua4-feed-row"><b>✓</b><span>Наявність</span><i></i></div>
   <?php else:?>
    <div class="ua4-checkout-mark"><svg viewBox="0 0 80 80"><path d="M20 40l14 14 27-29"/></svg></div>
    <div class="ua4-checkout-title">Замовлення</div><div class="ua4-checkout-subtitle">Зрозуміле оформлення</div>
   <?php endif;?>
  </div>
 <?php elseif($kind==='event'):?>
   <div class="ua4-event-target"><span>↗</span><i></i><i></i></div><div class="ua4-art-biglabel">Подія на сайті</div>
 <?php elseif($kind==='verify'):?>
   <div class="ua4-verify-ring"><span>✓</span></div><div class="ua4-art-biglabel">Дані перевірено</div>
 <?php elseif($kind==='report'):?>
   <div class="ua4-report-card"><div class="ua4-report-heading">ЗВІТ</div><div class="ua4-report-bars"><i></i><i></i><i></i><i></i><i></i></div><div class="ua4-report-footer"><span></span><span></span></div></div>
 <?php elseif($kind==='search'):?>
   <div class="ua4-search-input"><span class="ua4-search-icon">⌕</span><strong>Потрібна послуга</strong></div>
   <div class="ua4-search-result"><b>Сторінка вашої послуги</b><i></i><i></i></div>
 <?php elseif($kind==='website'):?>
   <div class="ua4-webpage"><div class="ua4-browser-top"><i></i><i></i><i></i></div><div class="ua4-webpage-body"><strong>Зрозуміла пропозиція</strong><i></i><i></i><span>Докладніше ↗</span></div></div>
 <?php elseif($kind==='contact'):?>
   <div class="ua4-mail-icon"><svg viewBox="0 0 80 80"><rect x="10" y="19" width="60" height="43" rx="8"/><path d="m14 26 26 21 26-21"/></svg><b>✓</b></div>
   <div class="ua4-art-biglabel">Звернення</div>
 <?php endif; ?>
 </div>
 <?php }

/**
 * Only the four approved Ukrainian service routes invoke this from their
 * corresponding existing template. Never called from homepage or other locales.
 */
function mrseo_render_ua4_visual($slug,$variant) {
 $data=mrseo_ua4_visual_data($slug);
 if(!$data||mrseo_locale()!=='uk'||!in_array($variant,array('journey','plan'),true))return;
 $p=$data[$variant];
 $prefix='ua4-'.str_replace('-','',$slug).'-'.$variant;
 ?>
 <section class="ua4-section ua4-section--<?php echo esc_attr($slug);?> ua4-section--<?php echo esc_attr($variant);?>" aria-labelledby="<?php echo esc_attr($prefix);?>-title">
  <div class="container">
   <header class="ua4-heading">
    <div><span class="ua4-eyebrow"><?php echo esc_html($p['eyebrow']);?></span>
    <h2 id="<?php echo esc_attr($prefix);?>-title"><?php echo esc_html($p['heading'][0]);?> <em><?php echo esc_html($p['heading'][1]);?></em></h2></div>
    <p><?php echo esc_html($p['lead']);?></p>
   </header>
   <?php if($variant==='journey'):?>
    <ol class="ua4-journey">
     <?php foreach($p['steps'] as $i=>$step):?>
     <li class="ua4-journey-card">
      <span class="ua4-count"><?php echo esc_html(sprintf('%02d',$i+1));?> / <?php echo esc_html($step[0]);?></span>
      <?php mrseo_ua4_draw_art($step[3]);?>
      <h3><?php echo esc_html($step[1]);?></h3><p><?php echo esc_html($step[2]);?></p>
     </li>
     <?php endforeach;?>
    </ol>
   <?php else:?>
    <div class="ua4-plan">
     <div class="ua4-plan-illustration ua4-plan-illustration--<?php echo esc_attr($p['type']);?>" aria-hidden="true">
      <div class="ua4-plan-sheet">
       <div class="ua4-plan-sheet-head"><span class="ua4-plan-star">✳</span><strong><?php echo esc_html($p['artTitle']);?></strong></div>
       <div class="ua4-plan-sheet-row"><span>✓</span><i></i></div>
       <div class="ua4-plan-sheet-row"><span>✓</span><i></i></div>
       <div class="ua4-plan-sheet-row"><span>✓</span><i></i></div>
      </div>
      <div class="ua4-plan-symbol"><?php echo esc_html(array('catalog'=>'▦','analytics'=>'◎','website'=>'▣','horoshop'=>'✳')[$p['type']]);?></div>
     </div>
     <div class="ua4-plan-content">
      <span class="ua4-eyebrow">ТРИ ЗРОЗУМІЛІ КРОКИ</span>
      <?php foreach($p['steps'] as $i=>$step):?>
       <div class="ua4-plan-step"><span><?php echo esc_html(sprintf('%02d',$i+1));?></span><div><h3><?php echo esc_html($step[0]);?></h3><p><?php echo esc_html($step[1]);?></p></div></div>
      <?php endforeach;?>
      <a class="ua4-plan-link" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($p['cta']);?><span aria-hidden="true">↗</span></a>
     </div>
    </div>
   <?php endif;?>
   <p class="ua4-disclaimer">Ілюстрація принципу роботи, не приклад реального клієнта чи гарантія результату.</p>
  </div>
 </section>
 <?php
}
