</main>
<footer class="footer mrseo-footer">
<div class="container mrseo-footer-inner">
<div class="mrseo-footer-top">
<div class="mrseo-footer-brand">
<a class="mrseo-footer-logo" href="<?php echo esc_url(mrseo_url());?>">MrSeo<span>.</span>tech</a>
<p><?php echo esc_html(mrseo_t('Сайт є. А клієнти? Знаходимо причини, вирішуємо маркетингові й технічні задачі та допомагаємо бізнесу зростати.','Сайт есть. А клиенты? Находим причины, решаем маркетинговые и технические задачи и помогаем бизнесу расти.','Have a website. Where are the customers? We connect marketing and technology to solve business challenges.'));?></p>
<a class="mrseo-footer-cta" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити вашу задачу','Обсудить вашу задачу','Discuss your challenge'));?> <span>↗</span></a>
</div>
<div class="mrseo-footer-col"><h2><?php echo esc_html(mrseo_t('Напрями','Направления','Expertise'));?></h2>
<a href="<?php echo esc_url(mrseo_url('seo'));?>">SEO</a>
<a href="<?php echo esc_url(mrseo_url('google-ads'));?>">Google Ads</a>
<a href="<?php echo esc_url(mrseo_url('analytics'));?>">Analytics</a>
<a href="<?php echo esc_url(mrseo_url('ecommerce-seo'));?>"><?php echo esc_html(mrseo_t('SEO інтернет-магазинів','SEO интернет-магазинов','E-commerce SEO'));?></a>
<?php if(mrseo_locale()!=='en'):?><a href="<?php echo esc_url(mrseo_url('horoshop'));?>"><?php echo esc_html(mrseo_t('Магазини на Хорошоп','Магазины на Хорошоп','Horoshop'));?></a><?php endif;?>
<a href="<?php echo esc_url(mrseo_url('seo-audit'));?>">Technical SEO</a>
<a href="<?php echo esc_url(mrseo_url('service-websites'));?>">Web Development</a>
<a href="<?php echo esc_url(mrseo_url('service-websites'));?>"><?php echo esc_html(mrseo_t('Створення сайтів','Создание сайтов','Website Creation'));?></a>
</div>
<div class="mrseo-footer-col"><h2><?php echo esc_html(mrseo_t('Компанія','Компания','Company'));?></h2>
<a href="<?php echo esc_url(mrseo_url('about'));?>"><?php echo esc_html(mrseo_t('Про нас','О нас','About'));?></a>
<a href="<?php echo esc_url(mrseo_url('portfolio'));?>"><?php echo esc_html(mrseo_t('Портфоліо','Портфолио','Portfolio'));?></a>
<a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Контакти','Контакты','Contact'));?></a>
</div>
<div class="mrseo-footer-col mrseo-footer-contact"><h2><?php echo esc_html(mrseo_t('Зв’язок','Связаться','Get in touch'));?></h2>
<a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Форма зв’язку ↗','Форма обратной связи ↗','Contact form ↗'));?></a>
<span><?php echo esc_html(mrseo_t('Працюємо з бізнесами в Україні та за кордоном','Работаем с бизнесом в Украине и за рубежом','Working with businesses in Ukraine and internationally'));?></span>
<div class="mrseo-footer-languages" aria-label="Language"><?php foreach(array('uk'=>'UA','ru'=>'RU','en'=>'EN') as $lang=>$label):?><a <?php if(mrseo_locale()===$lang)echo 'aria-current="page"';?> href="<?php echo esc_url(mrseo_url(mrseo_slug(),$lang));?>"><?php echo esc_html($label);?></a><?php endforeach;?></div>
</div>
</div>
<div class="mrseo-footer-bottom"><span>© <?php echo esc_html(date('Y'));?> MrSeo.tech · <?php echo esc_html(mrseo_t('Усі права захищено','Все права защищены','All rights reserved'));?></span><span><?php echo esc_html(mrseo_t('Стратегія · Реалізація · Результат','Стратегия · Реализация · Результат','Strategy · Execution · Outcomes'));?></span><a href="#main"><?php echo esc_html(mrseo_t('Нагору ↑','Наверх ↑','Back to top ↑'));?></a></div>
</div></footer><?php wp_footer();?></body></html>