<?php
/**
 * Shared approved Ukrainian, Russian and UK landings: five compact, conversion-focused sections
 * per service. Distinct miniature browser scenes, no unnecessary third-party JS.
 */
if(!defined('ABSPATH')) exit;
if(mrseo_locale()==='uk'&&in_array(mrseo_slug(),array('local-seo','service-business-seo','international-seo'),true)){require get_template_directory().'/premium-seo-cluster.php';return;}
if(!mrseo_ua_website_route() && !mrseo_ru_website_route() && !mrseo_en_gb_route()){
 status_header(404);
 include get_404_template();
 return;
}
$ru=mrseo_locale()==='ru';
$en=mrseo_locale()==='en';
$tr=static function($uk,$russian,$british) use($ru,$en){return $en?$british:($ru?$russian:$uk);};
$p=$en?mrseo_en_gb_data(mrseo_slug()):($ru?mrseo_ru_website_data(mrseo_slug()):mrseo_ua_website_data(mrseo_slug()));
if(!$p){
 status_header(404);
 include get_404_template();
 return;
}
$kind=$p['scene'];
require_once get_template_directory().'/inc/ua-service-scenes.php';
$category=$p['group']??($tr('Створення сайтів','Создание сайтов','Website design'));
$foot=$p['foot']??($tr('Дизайн · Мобільна версія · Зручний зв’язок','Дизайн · Мобильная версия · Связь','Design · Mobile · Enquiries'));
get_header();
?>
<div class="ukseo uws-page uws-page--<?php echo esc_attr($kind); ?>" id="main-content">
 <section class="ukseo-hero uws-hero" aria-labelledby="uws-title">
  <div class="container ukseo-hero-grid">
   <div class="ukseo-hero-copy">
    <nav class="ukseo-crumbs" aria-label="<?php echo esc_attr($tr('Навігація','Навигация','Breadcrumb')); ?>">
     <a href="<?php echo esc_url(mrseo_url()); ?>"><?php echo esc_html($tr('Головна','Главная','Home')); ?></a>
     <span aria-hidden="true">/</span>
     <span><?php echo esc_html($category); ?></span>
     <span aria-hidden="true">/</span>
     <span><?php echo esc_html($p['title']); ?></span>
    </nav>
    <div class="ukseo-kicker"><?php echo esc_html($p['kicker']); ?></div>
    <h1 id="uws-title"><?php echo esc_html($p['headline'][0]); ?> <em><?php echo esc_html($p['headline'][1]); ?></em></h1>
    <p class="ukseo-hero-lead"><?php echo esc_html($p['lead']); ?></p>
    <div class="ukseo-actions">
     <a class="ukseo-button ukseo-button-dark" href="<?php echo esc_url(mrseo_url('contact')); ?>"><?php echo esc_html($p['button']); ?> <span aria-hidden="true">↗</span></a>
     <a class="ukseo-text-link" href="#uws-pains"><?php echo esc_html($tr('Знайома ситуація?','Знакомая ситуация?','Does this sound familiar?')); ?> <span aria-hidden="true">↓</span></a>
    </div>
    <p class="ukseo-hero-foot"><?php echo esc_html($foot); ?></p>
   </div>
   <div class="ukseo-hero-art">
    <div class="uws-demo uws-demo--<?php echo esc_attr($kind); ?>" role="img" aria-label="<?php echo esc_attr($p['scenelabel']); ?>">
     <div class="uws-demo-top" aria-hidden="true">
      <span class="uws-demo-dot"></span><strong>MRSEO / <?php echo esc_html($p['title']); ?></strong>
      <span class="uws-demo-signal">● ● ●</span>
     </div>
     <?php if($kind==='local'): ?>
      <div class="uws-demo-body uws-local" aria-hidden="true">
       <div class="uws-local-search">⌕ <span><?php echo esc_html($tr('Послуги поруч із вами','Услуги рядом с вами','Services near you')); ?></span><b>↗</b></div>
       <div class="uws-local-result">
        <span class="uws-local-pin">⌖</span>
        <div><small><?php echo esc_html($tr('МІСЦЕВИЙ БІЗНЕС','МЕСТНЫЙ БИЗНЕС','LOCAL BUSINESS')); ?></small><strong><?php echo esc_html($tr('Ваша компанія','Ваша компания','Your business')); ?></strong><span><?php echo esc_html($tr('Адреса · Графік · Послуги','Адрес · График · Услуги','Address · Hours · Services')); ?></span></div>
       </div>
       <div class="uws-demo-mini-actions"><span><?php echo esc_html($tr('Зателефонувати ↗','Позвонить ↗','Call ↗')); ?></span><span><?php echo esc_html($tr('Маршрут ⤴','Маршрут ⤴','Directions ⤴')); ?></span></div>
      </div>
     <?php elseif($kind==='landing'): ?>
      <div class="uws-demo-body uws-landing" aria-hidden="true">
       <div class="uws-landing-tag"><?php echo esc_html($tr('РЕКЛАМА → СТОРІНКА','РЕКЛАМА → СТРАНИЦА','ADVERT → LANDING PAGE')); ?></div>
       <strong><?php echo esc_html($tr('Одна послуга.','Одна услуга.','One clear service.')); ?><br><?php echo esc_html($tr('Зрозуміла пропозиція.','Понятное предложение.','A useful offer.')); ?></strong>
       <div class="uws-landing-lines"><i></i><i></i><i></i></div>
       <div class="uws-landing-action"><?php echo esc_html($tr('Залишити заявку','Оставить заявку','Send an enquiry')); ?> <span>↗</span></div>
      </div>
     <?php elseif($kind==='corporate'): ?>
      <div class="uws-demo-body uws-corporate" aria-hidden="true">
       <div class="uws-corporate-bar"><b><?php echo esc_html($tr('КОМПАНІЯ','КОМПАНИЯ','COMPANY')); ?></b><span><?php echo esc_html($tr('Послуги · Про нас · Контакти','Услуги · О нас · Контакты','Services · About · Contact')); ?></span></div>
       <div class="uws-corporate-hero"><small><?php echo esc_html($tr('ПРОФЕСІЙНА КОМАНДА','ПРОФЕССИОНАЛЬНАЯ КОМАНДА','EXPERIENCED TEAM')); ?></small><strong><?php echo esc_html($tr('Ваша експертиза','Ваша экспертиза','Your expertise')); ?><br><?php echo esc_html($tr('в центрі уваги.','в центре внимания.','made clear.')); ?></strong><i></i></div>
       <div class="uws-corporate-cards"><span><?php echo esc_html($tr('Послуги ↗','Услуги ↗','Services ↗')); ?></span><span><?php echo esc_html($tr('Проєкти ↗','Проекты ↗','Projects ↗')); ?></span><span><?php echo esc_html($tr('Контакти ↗','Контакты ↗','Contact ↗')); ?></span></div>
      </div>
     <?php elseif($kind==='redesign'): ?>
      <div class="uws-demo-body uws-redesign" aria-hidden="true">
       <div class="uws-redesign-before"><small><?php echo esc_html($tr('ДО','ДО','BEFORE')); ?></small><div class="uws-redesign-old"><i></i><i></i><i></i><i></i></div></div>
       <div class="uws-redesign-divider"><span>→</span></div>
       <div class="uws-redesign-after"><small><?php echo esc_html($tr('ПІСЛЯ','ПОСЛЕ','AFTER')); ?></small><div class="uws-redesign-new"><i></i><strong><?php echo esc_html($tr('Зрозумілий сайт','Понятный сайт','A clearer website')); ?></strong><span><?php echo esc_html($tr('Послуги · Довіра · Заявка','Услуги · Доверие · Заявка','Services · Trust · Enquiry')); ?></span><b><?php echo esc_html($tr('Зв’язатися ↗','Связаться ↗','Get in touch ↗')); ?></b></div></div>
      </div>
     <?php else: ?>
      <?php mrseo_render_ua_service_scene($kind,$tr('uk','ru','en')); ?>
     <?php endif; ?>
     <div class="uws-demo-foot" aria-hidden="true"><span><?php echo esc_html($tr('Принцип дизайну, не приклад клієнтського сайту','Иллюстрация принципа, не реальный сайт клиента','Illustrative layout, not an actual client website')); ?></span><span>✳</span></div>
    </div>
    <div class="ukseo-visual-caption"><span class="ukseo-visual-caption-mark">01 / <?php echo esc_html($p['title']); ?></span><span><?php echo esc_html($tr('Рішення під конкретну задачу','Решение под конкретную задачу','Built around a specific business need')); ?></span></div>
   </div>
  </div>
 </section>
 <section class="ukseo-cases uws-pains" id="uws-pains" aria-labelledby="uws-pain-title">
  <div class="container">
   <div class="ukseo-section-head"><div><span class="ukseo-kicker"><?php echo esc_html($tr('ЗНАЙОМІ ПРОБЛЕМИ?','ЗНАКОМЫЕ СИТУАЦИИ?','FAMILIAR CHALLENGES?')); ?></span><h2 id="uws-pain-title"><?php echo esc_html($tr('Що заважає','Что мешает','What stops')); ?> <em><?php echo esc_html($tr('отримувати результат?','получать результат?','customers taking the next step?')); ?></em></h2></div></div>
   <div class="ukseo-problem-grid">
    <?php foreach($p['pains'] as $i=>$pain): ?>
    <article class="ukseo-problem-card">
     <div class="ukseo-card-number"><?php echo esc_html(sprintf('%02d',$i+1)); ?><span aria-hidden="true"><?php echo esc_html(array('◎','↗','◇')[$i]); ?></span></div>
     <h3><?php echo esc_html($pain[0]); ?></h3>
     <p><?php echo esc_html($pain[1]); ?></p>
    </article>
    <?php endforeach; ?>
   </div>
  </div>
 </section>
 <section class="uws-solution" id="uws-solution" aria-labelledby="uws-solution-title">
  <div class="container uws-solution-grid">
   <div class="uws-solution-lead">
    <span class="ukseo-kicker"><?php echo esc_html($tr('ЩО РОБИМО','ЧТО ДЕЛАЕМ','HOW WE HELP')); ?></span>
    <h2 id="uws-solution-title"><?php
     // The <em> segment is explicitly editorial, never user-supplied markup.
     $parts=explode('<em>',$p['sectionTitle'],2);
     echo esc_html($parts[0]);
     if(isset($parts[1]))echo ' <em>'.esc_html(str_replace('</em>','',$parts[1])).'</em>';
    ?></h2>
    <div class="uws-result" aria-label="<?php echo esc_attr($tr('Що ви отримаєте','Что вы получите','What you receive')); ?>">
     <span><?php echo esc_html($tr('ЩО ВИ ОТРИМАЄТЕ','ЧТО ВЫ ПОЛУЧИТЕ','WHAT YOU RECEIVE')); ?></span>
     <p><?php echo esc_html($p['result']); ?></p>
    </div>
    <?php if($en && mrseo_slug()==='ga4-conversions'):?>
    <p class="uws-en-gb-sibling">Need a commercial reporting view instead of technical event fixes?
     <a href="<?php echo esc_url(mrseo_url('analytics','en')); ?>">Explore marketing analytics <span aria-hidden="true">↗</span></a>
    </p>
    <?php endif;?>
    <a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('contact')); ?>"><?php echo esc_html($tr('Обговорити рішення','Обсудить решение','Discuss the approach')); ?> <span aria-hidden="true">↗</span></a>
   </div>
   <div class="uws-solution-list">
    <?php foreach($p['benefits'] as $i=>$benefit): ?>
    <div><span><?php echo esc_html(sprintf('%02d',$i+1)); ?></span><div><h3><?php echo esc_html($benefit[0]); ?></h3><p><?php echo esc_html($benefit[1]); ?></p></div></div>
    <?php endforeach; ?>
   </div>
  </div>
 </section>
 <section class="ukseo-faq uws-faq" aria-labelledby="uws-faq-title">
  <div class="container ukseo-faq-grid">
   <div><span class="ukseo-kicker"><?php echo esc_html($tr('ПЕРЕД ПОЧАТКОМ','ПЕРЕД НАЧАЛОМ','BEFORE YOU START')); ?></span><h2 id="uws-faq-title"><?php echo esc_html($tr('Коротко про','Коротко о','A few')); ?> <em><?php echo esc_html($tr('важливе.','важном.','practical questions.')); ?></em></h2></div>
   <div class="ukseo-faq-items">
    <?php foreach($p['faq'] as $item): ?>
     <details><summary><?php echo esc_html($item[0]); ?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($item[1]); ?></p></details>
    <?php endforeach; ?>
   </div>
  </div>
 </section>
 <section class="ukseo-final uws-final" aria-labelledby="uws-final-title">
  <div class="container ukseo-final-grid">
   <div><span class="ukseo-kicker"><?php echo esc_html($tr('ПОЧНІМО З ВАШОЇ ЗАДАЧІ','НАЧНЁМ С ВАШЕЙ ЗАДАЧИ','START WITH THE REAL PROBLEM')); ?></span><h2 id="uws-final-title"><?php
     $parts=explode('<em>',$p['ctaTitle'],2);
     echo esc_html($parts[0]);
     if(isset($parts[1]))echo ' <em>'.esc_html(str_replace('</em>','',$parts[1])).'</em>';
    ?></h2><p><?php echo esc_html($p['ctaLead']); ?></p></div>
   <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact')); ?>"><?php echo esc_html($tr('Обговорити проєкт','Обсудить проект','Discuss your project')); ?> <span aria-hidden="true">↗</span></a>
  </div>
 </section>
</div>
<?php get_footer(); ?>
