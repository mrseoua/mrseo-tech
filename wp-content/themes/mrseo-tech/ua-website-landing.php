<?php
/**
 * Shared approved Ukrainian/Russian landings: five compact, conversion-focused sections
 * per service. Distinct miniature browser scenes, no unnecessary third-party JS.
 */
if(!defined('ABSPATH')) exit;
if(!mrseo_ua_website_route() && !mrseo_ru_website_route()){
 status_header(404);
 include get_404_template();
 return;
}
$ru=mrseo_locale()==='ru';
$p=$ru?mrseo_ru_website_data(mrseo_slug()):mrseo_ua_website_data(mrseo_slug());
if(!$p){
 status_header(404);
 include get_404_template();
 return;
}
$kind=$p['scene'];
require_once get_template_directory().'/inc/ua-service-scenes.php';
$category=$p['group']??($ru?'Создание сайтов':'Створення сайтів');
$foot=$p['foot']??($ru?'Дизайн · Мобильная версия · Связь':'Дизайн · Мобільна версія · Зручний зв’язок');
get_header();
?>
<div class="ukseo uws-page uws-page--<?php echo esc_attr($kind); ?>" id="main-content">
 <section class="ukseo-hero uws-hero" aria-labelledby="uws-title">
  <div class="container ukseo-hero-grid">
   <div class="ukseo-hero-copy">
    <nav class="ukseo-crumbs" aria-label="<?php echo esc_attr($ru?'Навигация':'Навігація'); ?>">
     <a href="<?php echo esc_url(mrseo_url()); ?>"><?php echo esc_html($ru?'Главная':'Головна'); ?></a>
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
     <a class="ukseo-text-link" href="#uws-pains"><?php echo esc_html($ru?'Знакомая ситуация?':'Знайома ситуація?'); ?> <span aria-hidden="true">↓</span></a>
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
       <div class="uws-local-search">⌕ <span><?php echo esc_html($ru?'Услуги рядом с вами':'Послуги поруч із вами'); ?></span><b>↗</b></div>
       <div class="uws-local-result">
        <span class="uws-local-pin">⌖</span>
        <div><small><?php echo esc_html($ru?'МЕСТНЫЙ БИЗНЕС':'МІСЦЕВИЙ БІЗНЕС'); ?></small><strong><?php echo esc_html($ru?'Ваша компания':'Ваша компанія'); ?></strong><span><?php echo esc_html($ru?'Адрес · График · Услуги':'Адреса · Графік · Послуги'); ?></span></div>
       </div>
       <div class="uws-demo-mini-actions"><span><?php echo esc_html($ru?'Позвонить ↗':'Зателефонувати ↗'); ?></span><span><?php echo esc_html($ru?'Маршрут ⤴':'Маршрут ⤴'); ?></span></div>
      </div>
     <?php elseif($kind==='landing'): ?>
      <div class="uws-demo-body uws-landing" aria-hidden="true">
       <div class="uws-landing-tag"><?php echo esc_html($ru?'РЕКЛАМА → СТРАНИЦА':'РЕКЛАМА → СТОРІНКА'); ?></div>
       <strong><?php echo esc_html($ru?'Одна услуга.':'Одна послуга.'); ?><br><?php echo esc_html($ru?'Понятное предложение.':'Зрозуміла пропозиція.'); ?></strong>
       <div class="uws-landing-lines"><i></i><i></i><i></i></div>
       <div class="uws-landing-action"><?php echo esc_html($ru?'Оставить заявку':'Залишити заявку'); ?> <span>↗</span></div>
      </div>
     <?php elseif($kind==='corporate'): ?>
      <div class="uws-demo-body uws-corporate" aria-hidden="true">
       <div class="uws-corporate-bar"><b><?php echo esc_html($ru?'КОМПАНИЯ':'КОМПАНІЯ'); ?></b><span><?php echo esc_html($ru?'Услуги · О нас · Контакты':'Послуги · Про нас · Контакти'); ?></span></div>
       <div class="uws-corporate-hero"><small><?php echo esc_html($ru?'ПРОФЕССИОНАЛЬНАЯ КОМАНДА':'ПРОФЕСІЙНА КОМАНДА'); ?></small><strong><?php echo esc_html($ru?'Ваша экспертиза':'Ваша експертиза'); ?><br><?php echo esc_html($ru?'в центре внимания.':'в центрі уваги.'); ?></strong><i></i></div>
       <div class="uws-corporate-cards"><span><?php echo esc_html($ru?'Услуги ↗':'Послуги ↗'); ?></span><span><?php echo esc_html($ru?'Проекты ↗':'Проєкти ↗'); ?></span><span><?php echo esc_html($ru?'Контакты ↗':'Контакти ↗'); ?></span></div>
      </div>
     <?php elseif($kind==='redesign'): ?>
      <div class="uws-demo-body uws-redesign" aria-hidden="true">
       <div class="uws-redesign-before"><small>ДО</small><div class="uws-redesign-old"><i></i><i></i><i></i><i></i></div></div>
       <div class="uws-redesign-divider"><span>→</span></div>
       <div class="uws-redesign-after"><small><?php echo esc_html($ru?'ПОСЛЕ':'ПІСЛЯ'); ?></small><div class="uws-redesign-new"><i></i><strong><?php echo esc_html($ru?'Понятный сайт':'Зрозумілий сайт'); ?></strong><span><?php echo esc_html($ru?'Услуги · Доверие · Заявка':'Послуги · Довіра · Заявка'); ?></span><b><?php echo esc_html($ru?'Связаться ↗':'Зв’язатися ↗'); ?></b></div></div>
      </div>
     <?php else: ?>
      <?php mrseo_render_ua_service_scene($kind,$ru?'ru':'uk'); ?>
     <?php endif; ?>
     <div class="uws-demo-foot" aria-hidden="true"><span><?php echo esc_html($ru?'Иллюстрация принципа, не реальный сайт клиента':'Принцип дизайну, не приклад клієнтського сайту'); ?></span><span>✳</span></div>
    </div>
    <div class="ukseo-visual-caption"><span class="ukseo-visual-caption-mark">01 / <?php echo esc_html($p['title']); ?></span><span><?php echo esc_html($ru?'Решение под конкретную задачу':'Рішення під конкретну задачу'); ?></span></div>
   </div>
  </div>
 </section>
 <section class="ukseo-cases uws-pains" id="uws-pains" aria-labelledby="uws-pain-title">
  <div class="container">
   <div class="ukseo-section-head"><div><span class="ukseo-kicker"><?php echo esc_html($ru?'ЗНАКОМЫЕ СИТУАЦИИ?':'ЗНАЙОМІ ПРОБЛЕМИ?'); ?></span><h2 id="uws-pain-title"><?php echo esc_html($ru?'Что мешает':'Що заважає'); ?> <em><?php echo esc_html($ru?'получать результат?':'отримувати результат?'); ?></em></h2></div></div>
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
    <span class="ukseo-kicker"><?php echo esc_html($ru?'ЧТО ДЕЛАЕМ':'ЩО РОБИМО'); ?></span>
    <h2 id="uws-solution-title"><?php
     // The <em> segment is explicitly editorial, never user-supplied markup.
     $parts=explode('<em>',$p['sectionTitle'],2);
     echo esc_html($parts[0]);
     if(isset($parts[1]))echo ' <em>'.esc_html(str_replace('</em>','',$parts[1])).'</em>';
    ?></h2>
    <div class="uws-result" aria-label="<?php echo esc_attr($ru?'Что вы получите':'Що ви отримаєте'); ?>">
     <span><?php echo esc_html($ru?'ЧТО ВЫ ПОЛУЧИТЕ':'ЩО ВИ ОТРИМАЄТЕ'); ?></span>
     <p><?php echo esc_html($p['result']); ?></p>
    </div>
    <a class="ukseo-text-link" href="<?php echo esc_url(mrseo_url('contact')); ?>"><?php echo esc_html($ru?'Обсудить решение':'Обговорити рішення'); ?> <span aria-hidden="true">↗</span></a>
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
   <div><span class="ukseo-kicker"><?php echo esc_html($ru?'ПЕРЕД НАЧАЛОМ':'ПЕРЕД ПОЧАТКОМ'); ?></span><h2 id="uws-faq-title"><?php echo esc_html($ru?'Коротко о':'Коротко про'); ?> <em><?php echo esc_html($ru?'важном.':'важливе.'); ?></em></h2></div>
   <div class="ukseo-faq-items">
    <?php foreach($p['faq'] as $item): ?>
     <details><summary><?php echo esc_html($item[0]); ?><span aria-hidden="true">+</span></summary><p><?php echo esc_html($item[1]); ?></p></details>
    <?php endforeach; ?>
   </div>
  </div>
 </section>
 <section class="ukseo-final uws-final" aria-labelledby="uws-final-title">
  <div class="container ukseo-final-grid">
   <div><span class="ukseo-kicker"><?php echo esc_html($ru?'НАЧНЁМ С ВАШЕЙ ЗАДАЧИ':'ПОЧНІМО З ВАШОЇ ЗАДАЧІ'); ?></span><h2 id="uws-final-title"><?php
     $parts=explode('<em>',$p['ctaTitle'],2);
     echo esc_html($parts[0]);
     if(isset($parts[1]))echo ' <em>'.esc_html(str_replace('</em>','',$parts[1])).'</em>';
    ?></h2><p><?php echo esc_html($p['ctaLead']); ?></p></div>
   <a class="ukseo-button ukseo-button-light" href="<?php echo esc_url(mrseo_url('contact')); ?>"><?php echo esc_html($ru?'Обсудить проект':'Обговорити проєкт'); ?> <span aria-hidden="true">↗</span></a>
  </div>
 </section>
</div>
<?php get_footer(); ?>
