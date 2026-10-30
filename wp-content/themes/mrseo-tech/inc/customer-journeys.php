<?php
if(!defined('ABSPATH'))exit;

/**
 * Reusable problem-to-decision storytelling for service pages.
 * Editorial is localized, illustrative and does not claim verified customer results.
 */
function mrseo_customer_journey_copy($slug=null,$locale=null){
  static $data=null;
  if($data===null){
    $raw=@file_get_contents(get_template_directory().'/assets/customer-journeys.json');
    $decoded=$raw?json_decode($raw,true):null;
    $data=is_array($decoded)&&isset($decoded['pages'])?$decoded['pages']:array();
  }
  $slug=$slug?:mrseo_slug();
  $locale=$locale?:mrseo_locale();
  return $data[$slug][$locale]??$data[$slug]['uk']??null;
}
function mrseo_render_customer_journey($slug=null){
  $slug=$slug?:mrseo_slug();
  $story=mrseo_customer_journey_copy($slug);
  if(!$story||empty($story['stories']))return;
  $titles=array(
    'eyebrow'=>mrseo_t('ВАША СИТУАЦІЯ — НАША ВІДПОВІДАЛЬНІСТЬ','ВАША СИТУАЦИЯ — НАША ЗАДАЧА','YOUR CHALLENGE, OUR FOCUS'),
    'heading'=>mrseo_t('Знайдіть свою ситуацію. Подивіться, що зробимо.','Узнайте свою ситуацию. Посмотрите, что изменим.','Recognize your challenge. See what we would change.'),
    'note'=>mrseo_t('Це приклади типових ситуацій та логіки роботи, а не вигадані історії клієнтів. Реальну причину визначаємо після діагностики.','Это примеры типичных ситуаций и подхода, а не выдуманные клиентские кейсы. Реальную причину определяем после диагностики.','These are illustrative problem-solving scenarios, not invented client case studies. Diagnosis determines the actual cause.'),
    'because'=>mrseo_t('Що може бути причиною','Что может быть причиной','What may be happening'),
    'do'=>mrseo_t('Як знаходимо рішення','Что конкретно меняем','How we approach the fix'),
    'proof'=>mrseo_t('За чим перевіряємо результат','Как проверяем результат','What we measure'),
    'deliver'=>mrseo_t('Ви отримуєте не просто роботи, а ясність','Вы получаете не просто работы, а ясность','A clear decision, not just completed tasks'),
    'cta'=>mrseo_t('Розберімо ваш сайт ↗','Разберём ваш сайт ↗','Let’s diagnose your website ↗')
  );
  ?>
  <section class="mrseo-journey" aria-labelledby="mrseo-journey-title">
    <div class="container mrseo-journey-inner">
      <div class="mrseo-journey-head">
        <div>
          <div class="eyebrow"><?php echo esc_html($titles['eyebrow']);?></div>
          <h2 id="mrseo-journey-title"><?php echo esc_html($titles['heading']);?></h2>
        </div>
        <p><?php echo esc_html($titles['note']);?></p>
      </div>
      <div class="mrseo-journey-layout">
        <div class="mrseo-journey-cases">
          <?php foreach($story['stories'] as $i=>$scenario): if(count($scenario)<4)continue;?>
          <details class="mrseo-journey-case" <?php if($i===0)echo 'open';?>>
            <summary>
              <span class="mrseo-journey-num"><?php echo esc_html(sprintf('%02d',$i+1));?></span>
              <span class="mrseo-journey-question"><?php echo esc_html($scenario[0]);?></span>
              <span class="mrseo-journey-toggle" aria-hidden="true">+</span>
            </summary>
            <div class="mrseo-journey-detail">
              <div class="mrseo-journey-reason"><span><?php echo esc_html($titles['because']);?></span><p><?php echo esc_html($scenario[1]);?></p></div>
              <div class="mrseo-journey-answer"><span><?php echo esc_html($titles['do']);?></span><p><?php echo esc_html($scenario[2]);?></p></div>
              <div class="mrseo-journey-check"><span><?php echo esc_html($titles['proof']);?></span><p><?php echo esc_html($scenario[3]);?></p></div>
            </div>
          </details>
          <?php endforeach;?>
        </div>
        <aside class="mrseo-journey-outcome">
          <span class="mrseo-journey-mark" aria-hidden="true">✳</span>
          <span class="mrseo-journey-kicker">MRSEO.TECH / SOLUTION</span>
          <h3><?php echo esc_html($titles['deliver']);?></h3>
          <p><?php echo esc_html($story['outcome']);?></p>
          <a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html($titles['cta']);?></a>
          <div class="mrseo-journey-orbit" aria-hidden="true"><i></i><i></i><i></i></div>
        </aside>
      </div>
    </div>
  </section>
  <?php
}
