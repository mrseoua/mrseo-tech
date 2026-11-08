</main>
<footer class="footer mrseo-footer">
<div class="container mrseo-footer-inner">
<div class="mrseo-footer-feature">
<div class="mrseo-footer-brand">
<a class="mrseo-footer-logo" href="<?php echo esc_url(mrseo_url());?>">MrSeo<span>.</span>tech</a>
<p><?php echo esc_html(mrseo_t('Сайт є. А клієнти? Знаходимо причини, вирішуємо маркетингові й технічні задачі та допомагаємо бізнесу зростати.','Сайт есть. А клиенты? Находим причины, решаем маркетинговые и технические задачи и помогаем бизнесу расти.','Have a website. Where are the customers? We connect marketing and technology to solve business challenges.'));?></p>
<span class="mrseo-footer-region"><?php echo esc_html(mrseo_t('Працюємо з бізнесами в Україні та за кордоном','Работаем с бизнесом в Украине и за рубежом','Working with businesses in Ukraine and internationally'));?></span>
</div>
<a class="mrseo-footer-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити вашу задачу','Обсудить вашу задачу','Discuss your challenge'));?> <span>↗</span></a>
</div>
<?php $mrseo_eu_footer_labels=(function_exists("mrseo_eu_markets") && isset(mrseo_eu_markets()[mrseo_locale()])) ? mrseo_eu_service_labels(mrseo_locale()) : array(); ?>
<div class="mrseo-footer-top">
<div class="mrseo-footer-col"><h2><?php echo esc_html(mrseo_t('Напрями','Направления','Expertise'));?></h2>
<a href="<?php echo esc_url(mrseo_url('seo'));?>">SEO</a>
<a href="<?php echo esc_url(mrseo_url('google-ads'));?>">Google Ads</a>
<a href="<?php echo esc_url(mrseo_url('analytics'));?>"><?php echo esc_html($mrseo_eu_footer_labels['analytics'] ?? (mrseo_locale()==='pl'?'Analityka':(mrseo_locale()==='de'?'Webanalyse':mrseo_t('Аналітика','Аналитика','Analytics'))));?></a>
<a href="<?php echo esc_url(mrseo_url('ecommerce-seo'));?>"><?php echo esc_html(mrseo_t('SEO інтернет-магазинів','SEO интернет-магазинов','E-commerce SEO'));?></a>
<?php if(in_array(mrseo_locale(),array('uk','ru'),true)):?><a href="<?php echo esc_url(mrseo_url('horoshop'));?>"><?php echo esc_html(mrseo_t('Магазини на Хорошоп','Магазины на Хорошоп','Horoshop'));?></a><?php endif;?>
<a href="<?php echo esc_url(mrseo_url('seo-audit'));?>"><?php echo esc_html($mrseo_eu_footer_labels['seo-audit'] ?? (mrseo_locale()==='pl'?'Audyt SEO':(mrseo_locale()==='de'?'Technisches SEO-Audit':mrseo_t('SEO-аудит','SEO-аудит','Technical SEO'))));?></a>
<a href="<?php echo esc_url(mrseo_url('web-development'));?>"><?php echo esc_html(mrseo_t('Веброзробка','Веб-разработка','Web Development'));?></a>
<?php if(mrseo_locale()!=='de'): // Poland has its own real website-creation route. ?>
<a href="<?php echo esc_url(mrseo_url($mrseo_eu_footer_labels ? 'website-design' : 'service-websites'));?>"><?php echo esc_html($mrseo_eu_footer_labels['website-design'] ?? mrseo_t('Створення сайтів','Создание сайтов','Website Creation'));?></a>
<?php endif;?>
</div>
<div class="mrseo-footer-col"><h2><?php echo esc_html(mrseo_t('Компанія','Компания','Company'));?></h2>
<a href="<?php echo esc_url(mrseo_url('about'));?>"><?php echo esc_html(mrseo_t('Про нас','О нас','About'));?></a>
<a href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html(mrseo_t('Портфоліо','Портфолио','Portfolio'));?></a>
<a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Контакти','Контакты','Contact'));?></a>
<?php mrseo_privacy_footer_link();?>
</div>
<div class="mrseo-footer-col mrseo-footer-contact"><h2><?php echo esc_html(mrseo_t('Зв’язок','Связаться','Get in touch'));?></h2>
<?php mrseo_render_contact_channels();?>
<a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Форма зв’язку ↗','Форма обратной связи ↗','Contact form ↗'));?></a>
 </div>
</div>
<div class="mrseo-footer-bottom">
  <span>© <?php echo esc_html(date('Y'));?> MrSeo.tech · <?php echo esc_html(mrseo_t('Усі права захищено','Все права защищены','All rights reserved'));?></span>
  <span class="mrseo-footer-promise"><?php echo esc_html(mrseo_t('Стратегія · Реалізація · Результат','Стратегия · Реализация · Результат','Strategy · Execution · Outcomes'));?></span>
  <div class="mrseo-footer-utilities">
   <?php mrseo_render_language_dropdown(mrseo_slug(),mrseo_locale(),'footer');?>
   <a href="#main"><?php echo esc_html(mrseo_t('Нагору ↑','Наверх ↑','Back to top ↑'));?></a>
  </div>
 </div>
</div></footer><?php mrseo_render_floating_contact();?><?php wp_footer();?></body></html>