<?php
if(!defined('ABSPATH'))exit;
get_header();
?>
<main class="about-page">
  <section class="about-hero" aria-labelledby="about-heading">
    <div class="container about-hero-grid">
      <div class="about-hero-copy">
        <nav class="breadcrumbs" aria-label="<?php echo esc_attr(mrseo_t('Навігація','Навигация','Breadcrumb'));?>">
          <a href="<?php echo esc_url(mrseo_url());?>"><?php echo esc_html(mrseo_t('Головна','Главная','Home'));?></a>
          <span>/</span>
          <span><?php echo esc_html(mrseo_t('Про нас','О нас','About'));?></span>
        </nav>
        <div class="eyebrow"><?php echo esc_html(mrseo_t('ЗНАЙОМСТВО З MRSEO.TECH','ЗНАКОМСТВО С MRSEO.TECH','MEET MRSEO.TECH'));?></div>
        <h1 id="about-heading"><?php echo esc_html(mrseo_t(
          'Невелика команда. Великі задачі — зрозумілі рішення.',
          'Небольшая команда. Большие задачи — понятные решения.',
          'A small team. Big challenges. Clear solutions.'
        ));?></h1>
        <p class="about-hero-lead"><?php echo esc_html(mrseo_t(
          'Ми — невелика команда професіоналів із 10-річним досвідом у SEO, Google Ads, аналітиці та створенні сайтів. Допомагаємо бізнесу знаходити причини проблем і вирішувати їх без зайвої складності.',
          'Мы — небольшая команда профессионалов с 10-летним опытом в SEO, Google Ads, аналитике и создании сайтов. Помогаем бизнесу находить причины проблем и решать их без лишней сложности.',
          'We are a small team of professionals with 10 years of experience in SEO, Google Ads, analytics and website development. We help businesses understand what is not working and fix it without unnecessary complexity.'
        ));?></p>
        <a class="btn about-hero-action" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити вашу задачу','Обсудить вашу задачу','Discuss your challenge'));?> <span aria-hidden="true">↗</span></a>
      </div>
      <div class="about-experience" aria-label="<?php echo esc_attr(mrseo_t('10 років практичного досвіду','10 лет практического опыта','10 years of practical experience'));?>">
        <div class="about-experience-top"><span>MRSEO.TECH</span><span>↗</span></div>
        <div class="about-experience-main">
          <span class="about-experience-number">10</span>
          <span class="about-experience-caption"><?php echo esc_html(mrseo_t('років практичного досвіду','лет практического опыта','years of hands-on experience'));?></span>
        </div>
        <div class="about-experience-bottom">
          <span><?php echo esc_html(mrseo_t('НЕВЕЛИКА КОМАНДА','НЕБОЛЬШАЯ КОМАНДА','SMALL TEAM'));?></span>
          <div><span>SEO</span><span>ADS</span><span>DATA</span><span>WEB</span></div>
        </div>
        <span class="about-experience-ring about-experience-ring-one" aria-hidden="true"></span>
        <span class="about-experience-ring about-experience-ring-two" aria-hidden="true"></span>
      </div>
    </div>
  </section>
  <section class="about-method" aria-labelledby="about-method-heading">
    <div class="container">
      <div class="about-section-intro">
        <div class="eyebrow"><?php echo esc_html(mrseo_t('ЯК МИ ПРАЦЮЄМО','КАК МЫ РАБОТАЕМ','HOW WE WORK'));?></div>
        <h2 id="about-method-heading"><?php echo esc_html(mrseo_t('Спочатку розуміємо проблему. Потім діємо.','Сначала понимаем проблему. Потом действуем.','Understand the problem first. Then act.'));?></h2>
      </div>
      <div class="about-method-grid">
        <?php
        $steps=array(
          array('01',mrseo_t('Слухаємо','Слушаем','We listen'),mrseo_t(
            'З’ясовуємо, що турбує бізнес: мало звернень, дорогі продажі чи сайт, який не знаходять у Google.',
            'Выясняем, что беспокоит бизнес: мало заявок, дорогие продажи или сайт, который не находят в Google.',
            'We start with the real issue: too few enquiries, expensive sales or a website that customers cannot find.'
          )),
          array('02',mrseo_t('Перевіряємо','Проверяем','We investigate'),mrseo_t(
            'Дивимося на сайт, рекламу та дані. Шукаємо причини, а не припускаємо, що потрібно все переробляти.',
            'Смотрим сайт, рекламу и данные. Ищем причины, а не предполагаем, что нужно переделать всё.',
            'We examine the site, campaigns and data to find causes rather than assume everything needs replacing.'
          )),
          array('03',mrseo_t('Вирішуємо','Решаем','We solve'),mrseo_t(
            'Пропонуємо зрозумілий план, впроваджуємо погоджені зміни й перевіряємо, що вони дали бізнесу.',
            'Предлагаем понятный план, внедряем согласованные изменения и проверяем, что они дали бизнесу.',
            'We agree on a clear plan, make the chosen improvements and check what they changed for the business.'
          ))
        );
        foreach($steps as $step):?>
        <article class="about-method-item">
          <span class="about-method-index"><?php echo esc_html($step[0]);?></span>
          <h3><?php echo esc_html($step[1]);?></h3>
          <p><?php echo esc_html($step[2]);?></p>
        </article>
        <?php endforeach;?>
      </div>
    </div>
  </section>
  <section class="about-fit" aria-labelledby="about-fit-heading">
    <div class="container">
      <div class="about-section-intro about-fit-heading">
        <div class="eyebrow"><?php echo esc_html(mrseo_t('З ЧИМ ДО НАС ЗВЕРТАЮТЬСЯ','С ЧЕМ К НАМ ОБРАЩАЮТСЯ','WHAT WE HELP WITH'));?></div>
        <h2 id="about-fit-heading"><?php echo esc_html(mrseo_t('У кожного бізнесу — своя задача.','У каждого бизнеса — своя задача.','Every business has a different challenge.'));?></h2>
      </div>
      <div class="about-fit-grid">
        <?php
        $audiences=array(
          array('ecommerce-seo',mrseo_t('Інтернет-магазинам','Интернет-магазинам','Online stores'),mrseo_t('Коли товарів багато, а покупців із пошуку замало.','Когда товаров много, а покупателей из поиска мало.','When a large catalog brings too few search-driven buyers.')),
          array('service-websites',mrseo_t('Бізнесу послуг','Бизнесу услуг','Service businesses'),mrseo_t('Коли сайт є, але звернення приходять рідко.','Когда сайт есть, но обращений мало.','When the website exists but enquiries are scarce.')),
          array('google-ads',mrseo_t('Тим, хто рекламується','Тем, кто запускает рекламу','Advertisers'),mrseo_t('Коли бюджет витрачається, а результат незрозумілий.','Когда бюджет расходуется, а результат непонятен.','When the ad budget is spent but results are unclear.'))
        );
        foreach($audiences as $i=>$audience):?>
        <a class="about-fit-card" href="<?php echo esc_url(mrseo_url($audience[0]));?>">
          <span class="about-fit-top"><span><?php echo esc_html(sprintf('%02d',$i+1));?></span><span aria-hidden="true">↗</span></span>
          <h3><?php echo esc_html($audience[1]);?></h3>
          <p><?php echo esc_html($audience[2]);?></p>
        </a>
        <?php endforeach;?>
      </div>
    </div>
  </section>
  <section class="about-final">
    <div class="container about-final-inner">
      <div>
        <div class="eyebrow"><?php echo esc_html(mrseo_t('ПОЧНІМО З ГОЛОВНОГО','НАЧНЁМ С ГЛАВНОГО','START WITH WHAT MATTERS'));?></div>
        <h2><?php echo esc_html(mrseo_t('Розкажіть, що не працює. Знайдемо, з чого почати.','Расскажите, что не работает. Найдём, с чего начать.','Tell us what is not working. We will find where to start.'));?></h2>
      </div>
      <a class="about-final-link" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити проєкт','Обсудить проект','Discuss your project'));?> <span aria-hidden="true">↗</span></a>
    </div>
  </section>
</main>
<?php get_footer();?>
