<?php
if(!defined('ABSPATH'))exit;
/** Adapt the existing published Ukrainian content without rewriting business promises. */
function mrseo_puc_copy($slug){
 $r=mrseo_puc_route($slug);
 if(!$r)return null;
 $core=in_array($slug,array('performance-max','analytics','service-websites'),true);
 if($core){
  require_once __DIR__.'/uk-solution-content.php';
  $d=mrseo_uk_solution_content($slug);
  if(!$d)return null;
  if($slug==='performance-max'){
   require_once __DIR__.'/ua-final-interior-visuals.php';
   $plan=mrseo_ua_final_service_copy($slug)['plan'];
  }else{
   require_once __DIR__.'/ua-four-service-visuals.php';
   $plan=mrseo_ua4_visual_data($slug)['plan'];
  }
  $data=array(
   'title'=>mrseo_translation($slug)[0],
   'group'=>$slug==='performance-max'?'Google Ads':($slug==='analytics'?'Аналітика':'Створення сайтів'),
   'parent'=>$slug==='performance-max'?'google-ads':($slug==='analytics'?'':'web-development'),
   'kicker'=>$d['eyebrow'],'headline'=>$d['headline'],'lead'=>$d['lead'],'button'=>$d['button'],
   'pains'=>$d['problems'],'problemHeading'=>$d['symptomHeading'],'problemLead'=>$d['symptomLead'],
   'sectionTitle'=>$d['deliveryHeading'][0].' <em>'.$d['deliveryHeading'][1].'</em>',
   'benefits'=>$d['deliveries'],'result'=>$d['deliveryLead'],
   'faq'=>$d['faq'],'faqHeading'=>$d['faqHeading'],'faqLead'=>'Відповіді, які допоможуть прийняти рішення.',
   'ctaTitle'=>$d['finalHeading'][0].' <em>'.$d['finalHeading'][1].'</em>','ctaLead'=>$d['finalText'],
   'related'=>array(array($d['relatedSlug'],$d['related'])),'plan'=>$plan,
   'problemId'=>'uksolution-symptoms','titleId'=>'uksolution-title','deliveryId'=>'uksolution-deliver-title','faqId'=>'uksolution-faq-title','finalId'=>'uksolution-final-title'
  );
 }elseif(in_array($slug,mrseo_new_service_slugs(),true)){
  $d=mrseo_new_service_copy($slug,'uk');
  $e=mrseo_new_service_editorial($slug,'uk');
  $u=mrseo_ua_service_ux($slug,'uk');
  if(!$d)return null;
  $data=array(
   'title'=>$d['title'],'group'=>array('ads'=>'Google Ads','commerce'=>'Інтернет-магазини','dev'=>'Веброзробка','audit'=>'SEO','data'=>'Аналітика')[mrseo_new_service_group($slug)]??'Послуги',
   'parent'=>mrseo_new_service_parent_slugs()[$slug]??'web-development',
   'kicker'=>mb_strtoupper($d['title'],'UTF-8'),'headline'=>$d['head'],'lead'=>$u['hero']??$d['lead'],'button'=>$d['cta'],
   'pains'=>$d['problems'],'problemHeading'=>$e['problem']??'Де бізнес втрачає результат?','problemLead'=>$u['problemLead']??'Перевіряємо не лише симптоми, а й те, як підтвердити ефект виправлення.',
   'sectionTitle'=>$u['deliveryTitle']??'Не обіцянки. Конкретні результати роботи.',
   'benefits'=>array_map(static function($outcome,$i)use($e){return array($outcome,$e['outcomes'][$i]??'Конкретний результат за погодженими критеріями.');},$d['outcomes'],array_keys($d['outcomes'])),
   'result'=>$u['deliveryLead']??'Обсяг робіт залежить від вихідної системи та підтверджених обмежень.',
   'faq'=>$d['faq'],'faqHeading'=>'Що варто уточнити',
   'ctaTitle'=>$u['finalTitle']??'Розкажіть, що зараз не працює.',
   'ctaLead'=>$u['finalLead']??'Надішліть сайт і опишіть ситуацію. Уточнимо вихідні дані, оцінимо реалістичність і запропонуємо наступні кроки.',
   'problemId'=>'ns-problems','titleId'=>'ns-title','deliveryId'=>'ns-outcomes-title','faqId'=>'ns-faq-title','finalId'=>'ns-final-title'
  );
 }else{
  $d=mrseo_ua_website_data($slug);
  if(!$d)return null;
  $data=$d;
  $data['group']=$d['group']??'Створення сайтів';
  $data['parent']=in_array($slug,array('local-google-ads','google-ads-audit'),true)?'google-ads':(in_array($slug,array('store-conversion','store-migration'),true)?'online-store-development':(in_array($slug,array('website-maintenance','website-speed-security'),true)?'web-development':'service-websites'));
 }
 // Route-specific first-screen notes and problem introductions; preserve original offer and FAQ.
 $footnotes=array(
  'performance-max'=>'Оцінюємо продажі з урахуванням витрат на рекламу й маржі товарів.',
  'analytics'=>'Порівнюємо канали за заявками, продажами та витратами, а не лише кліками.',
  'service-websites'=>'До запуску перевіряємо сторінки послуг, контакти й форми заявок.',
  'merchant-center'=>'Починаємо з конкретного повідомлення Google про відхилення або обмеження.',
  'google-shopping'=>'Зіставляємо витрати на товарні оголошення з підтвердженими покупками.',
  'ga4-conversions'=>'Одна покупка має враховуватися один раз із правильною сумою.',
  'business-dashboards'=>'У кожного показника має бути зрозуміле джерело й дата оновлення.',
  'reporting-automation'=>'Якщо дані не оновилися, відповідальна людина має отримати повідомлення.',
  'online-store-development'=>'Платформу обираємо за асортиментом, оплатою, доставкою та потребами магазину.',
  'catalog-automation'=>'Оновлення цін і залишків має зупинятися, якщо дані помилкові.',
  'api-integrations'=>'Повторне надсилання замовлення не повинно створювати його копію.',
  'web-applications'=>'Кожен користувач отримує доступ лише до потрібних йому функцій.',
  'custom-functionality'=>'Спочатку погоджуємо правила нової функції, потім перевіряємо її на прикладах.',
  'website-audit'=>'Звіт містить конкретні сторінки, проблеми та черговість виправлень.',
  'traffic-recovery'=>'Зіставляємо дату падіння переходів з останніми змінами на сайті.',
  'local-business-websites'=>'Адреса, графік і спосіб зв’язку мають бути помітні навіть на телефоні.',
  'landing-pages'=>'Одна рекламна сторінка — одна пропозиція та зрозуміла дія для відвідувача.',
  'corporate-websites'=>'Партнер має швидко знайти інформацію про компанію, її послуги та контакти.',
  'website-redesign'=>'Під час оновлення дизайну зберігаємо важливі адреси сторінок і перевіряємо форми.'
 );
 if(isset($footnotes[$slug]))$data['foot']=$footnotes[$slug];
 $problemIntros=array(
  'local-google-ads'=>array('Чому реклама не приводить клієнтів із вашого міста?','Перевіряємо, де показуються оголошення, за якими фразами люди переходять і чи надходять дзвінки з потрібного району.'),
  'google-ads-audit'=>array('Де рекламний бюджет витрачається без потрібного результату?','Зіставляємо витрати, фактичні звернення та зміни в кампаніях, щоб визначити пріоритети разового аудиту.'),
  'store-conversion'=>array('На якому кроці покупець відмовляється від замовлення?','Проходимо шлях від пошуку товару до оплати: перевіряємо каталог, картку товару, кошик і доставку.'),
  'store-migration'=>array('Що може піти не так під час перенесення магазину?','До переїзду визначаємо, які дані треба перенести, які адреси зберегти та які інтеграції перевірити.'),
  'local-business-websites'=>array('Чого бракує клієнту, який шукає ваш бізнес поруч?','Перевіряємо, чи легко знайти адресу, графік, перелік послуг і спосіб запису або дзвінка.'),
  'landing-pages'=>array('Чому люди переходять з реклами, але не залишають заявку?','З’ясовуємо, чи відповідає сторінка оголошенню, чи зрозуміла пропозиція та чи працює форма.'),
  'corporate-websites'=>array('Що заважає сайту представити вашу компанію?','Дивимося, чи може майбутній партнер знайти напрями роботи, інформацію про досвід і потрібні контакти.'),
  'website-redesign'=>array('Які недоліки старого сайту заважають клієнтам?','Визначаємо, які екрани та сценарії потребують оновлення, не втрачаючи сторінок, що вже приводять людей із Google.'),
  'website-maintenance'=>array('Які збої заважають сайту працювати щодня?','Перевіряємо проблемні функції, останні оновлення та причини повторних помилок, перш ніж змінювати код.'),
  'website-speed-security'=>array('Що робить сайт повільним, вразливим або незручним?','Вимірюємо швидкість, перевіряємо оновлення й резервні копії, оцінюємо зручність кнопок, тексту та форм.')
 );
 if(isset($problemIntros[$slug])){
  $data['problemHeading']=$problemIntros[$slug][0];
  $data['problemLead']=$problemIntros[$slug][1];
 }
 // Three explicit semantic phase explanations derived from each route's existing deliverables.
 $data['label']=$r['label'];
 $data['tabs']=array();
 foreach($r['phases'] as $i=>$label)$data['tabs'][]=array($label,$data['benefits'][$i][1]);
 $data['resultTitle']='Що ви отримаєте';
 return $data;
}
