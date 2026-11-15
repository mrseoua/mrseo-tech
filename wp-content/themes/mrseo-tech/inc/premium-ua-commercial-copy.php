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
   'foot'=>'Спочатку підтверджуємо причину. Потім пропонуємо рішення.',
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
   'foot'=>'Спочатку підтверджуємо причину. Потім пропонуємо рішення.',
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
 // Three explicit semantic phase explanations derived from each route's existing deliverables.
 $data['label']=$r['label'];
 $data['tabs']=array();
 foreach($r['phases'] as $i=>$label)$data['tabs'][]=array($label,$data['benefits'][$i][1]);
 $data['resultTitle']='Що ви отримаєте';
 return $data;
}
