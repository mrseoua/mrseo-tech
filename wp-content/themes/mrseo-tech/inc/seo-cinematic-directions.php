<?php
/** Five approved SEO specializations, no microcategory links or fabricated proof. */
if(!defined('ABSPATH'))exit;
$seo_cine_directions=array(
 array('seo-audit','SEO-аудит','Діагностика проблем і план дій','01','audit'),
 array('ecommerce-seo','SEO для інтернет-магазинів','Категорії, фільтри та товари','02','shop'),
 array('local-seo','Локальне SEO','Клієнти з вашого міста','03','local'),
 array('service-business-seo','SEO для сайтів послуг','Попит на ваші послуги','04','services'),
 array('international-seo','Міжнародне SEO','Розвиток на нових ринках','05','global')
);
?>
<section class="seo-cine-directions" id="ukseo-services" aria-labelledby="ukseo-services-title">
 <div class="seo-cine-shell">
  <div class="seo-cine-section-intro">
   <div><p class="seo-cine-kicker">НАПРЯМИ SEO / 05</p><h2 id="ukseo-services-title">Оберіть свій <em>вектор розвитку</em></h2></div>
   <p>Різні бізнес-завдання потребують різного SEO. Допоможемо знайти напрям, який відповідає вашому сайту та ринку.</p>
  </div>
  <nav class="seo-cine-direction-grid" aria-label="П’ять основних напрямів SEO">
   <?php foreach($seo_cine_directions as $dir): ?>
   <a class="seo-cine-direction seo-cine-direction--<?php echo esc_attr($dir[4]);?>" href="<?php echo esc_url(mrseo_url($dir[0],'uk'));?>">
    <span class="seo-cine-dir-number"><?php echo esc_html($dir[3]);?> / SEO</span>
    <span class="seo-cine-dir-art" aria-hidden="true">
     <?php if($dir[4]==='audit'):?>
      <svg viewBox="0 0 220 250" focusable="false"><defs><linearGradient id="sc-a" x1="0" x2="1" y1="0" y2="1"><stop stop-color="#c8b2a3"/><stop offset=".43" stop-color="#6f5b56"/><stop offset="1" stop-color="#211e20"/></linearGradient></defs><path d="M0 65L61 43L87 79L129 19L174 59L220 40V250H0Z" fill="url(#sc-a)"/><path d="M-10 197Q74 121 133 152T239 119M-10 215Q74 139 133 170T239 137M-10 233Q74 157 133 188T239 155" stroke="#e8b9a8" stroke-opacity=".35" fill="none" stroke-width="1.7"/><path d="M-10 203Q74 127 133 158T239 125" stroke="var(--mrseo-brand-red,#A84432)" stroke-width="5" fill="none"/></svg>
     <?php elseif($dir[4]==='shop'):?>
      <svg viewBox="0 0 220 250" focusable="false"><defs><linearGradient id="sc-s" x1=".1" x2=".9" y1="0" y2="1"><stop stop-color="#e6d5c6"/><stop offset="1" stop-color="#433e3d"/></linearGradient></defs><path d="M39 111Q39 53 110 53T181 111V204H39Z" fill="url(#sc-s)"/><path d="M68 110V77Q69 34 110 34T152 77V110" fill="none" stroke="#A84432" stroke-width="7" stroke-linecap="round"/><path d="M59 128L101 95L166 125V216H59Z" fill="#f4e5db" opacity=".29"/><path d="M55 153H165M55 177H165" stroke="#f0d5c4" opacity=".34"/></svg>
     <?php elseif($dir[4]==='local'):?>
      <svg viewBox="0 0 220 250" focusable="false"><defs><radialGradient id="sc-l"><stop stop-color="#b36b5b" stop-opacity=".45"/><stop offset="1" stop-color="#291f20" stop-opacity="0"/></radialGradient></defs><circle cx="110" cy="125" r="92" fill="url(#sc-l)"/><circle cx="110" cy="155" r="72" fill="none" stroke="#caa190" stroke-opacity=".32"/><circle cx="110" cy="155" r="43" fill="none" stroke="#caa190" stroke-opacity=".4"/><path d="M110 48C64 48 57 101 110 158C163 101 156 48 110 48Z" fill="#A84432" stroke="#edb5a2" stroke-width="3"/><circle cx="110" cy="89" r="16" fill="#f3e6dc"/></svg>
     <?php elseif($dir[4]==='services'):?>
      <svg viewBox="0 0 220 250" focusable="false"><defs><linearGradient id="sc-p" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#e2d1c4"/><stop offset=".5" stop-color="#a77869"/><stop offset="1" stop-color="#251f20"/></linearGradient></defs><path d="M0 176Q54 69 114 126T220 68V130Q173 212 114 166T0 234Z" fill="url(#sc-p)"/><path d="M-12 165Q55 58 117 115T232 56M-12 184Q55 77 117 134T232 75M-12 202Q55 95 117 152T232 93" stroke="#d99c89" stroke-opacity=".6" stroke-width="2" fill="none"/><path d="M-12 184Q55 77 117 134T232 75" stroke="#A84432" stroke-width="5" fill="none"/></svg>
     <?php else:?>
      <svg viewBox="0 0 220 250" focusable="false"><defs><radialGradient id="sc-g" cx=".3" cy=".2"><stop stop-color="#ae7f6e"/><stop offset=".7" stop-color="#423938"/><stop offset="1" stop-color="#1a1a1b"/></radialGradient></defs><circle cx="110" cy="134" r="91" fill="url(#sc-g)"/><ellipse cx="110" cy="134" rx="43" ry="91" fill="none" stroke="#e8c6b5" stroke-width="1.3" stroke-opacity=".6"/><ellipse cx="110" cy="134" rx="91" ry="30" fill="none" stroke="#e8c6b5" stroke-width="1.3" stroke-opacity=".6"/><path d="M23 104Q118 62 198 119M23 162Q118 203 198 148" fill="none" stroke="#e8c6b5" stroke-opacity=".36"/><ellipse cx="110" cy="134" rx="109" ry="53" fill="none" stroke="#A84432" stroke-width="2.4" transform="rotate(-23 110 134)"/></svg>
     <?php endif;?>
    </span>
    <span class="seo-cine-dir-copy"><strong><?php echo esc_html($dir[1]);?></strong><small><?php echo esc_html($dir[2]);?></small></span>
    <span class="seo-cine-dir-arrow" aria-hidden="true">↗</span>
   </a>
   <?php endforeach;?>
  </nav>
 </div>
</section>
<section class="seo-cine-manifest" aria-labelledby="seo-cine-manifest-title">
 <div class="seo-cine-shell seo-cine-manifest-layout">
  <div class="seo-cine-manifest-art" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></div>
  <div class="seo-cine-manifest-copy"><span class="seo-cine-manifest-kicker">НАШ ПІДХІД</span><h2 id="seo-cine-manifest-title">SEO, яке працює <em>на бізнес-цілі</em></h2><p>Не просто редагуємо метатеги. Знаходимо, що заважає клієнтам знайти ваш бізнес, погоджуємо конкретні дії й перевіряємо їх виконання.</p><a href="#ukseo-cases">Як ми вирішуємо проблеми <span aria-hidden="true">↗</span></a></div>
 </div>
</section>
