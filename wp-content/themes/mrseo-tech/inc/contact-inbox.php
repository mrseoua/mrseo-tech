<?php
/** Private Ukrainian enquiry backup; not a public post, API or email-delivery guarantee. */
if(!defined('ABSPATH'))exit;
add_action('init',static function(){
 $caps=array_fill_keys(array('edit_post','read_post','delete_post','edit_posts','edit_others_posts','publish_posts','read_private_posts','delete_posts','delete_private_posts','delete_published_posts','delete_others_posts','edit_private_posts','edit_published_posts','read'),'manage_options');
 $caps['create_posts']='do_not_allow';
 register_post_type('mrseo_enquiry',array(
  'labels'=>array('name'=>'Заявки MrSeo','singular_name'=>'Заявка','menu_name'=>'Заявки MrSeo','edit_item'=>'Перегляд заявки'),
  'public'=>false,'publicly_queryable'=>false,'exclude_from_search'=>true,'show_ui'=>true,'show_in_menu'=>true,'show_in_rest'=>false,'has_archive'=>false,'rewrite'=>false,'query_var'=>false,
  'menu_icon'=>'dashicons-email-alt','supports'=>array('title','editor'),'capabilities'=>$caps,'map_meta_cap'=>false
 ));
});
function mrseo_store_ua_enquiry($body){
 $reference='MR-'.strtoupper(substr(str_replace('-','',wp_generate_uuid4()),0,12));
 $id=wp_insert_post(wp_slash(array('post_type'=>'mrseo_enquiry','post_status'=>'private','post_title'=>$reference,'post_content'=>$body,'comment_status'=>'closed','ping_status'=>'closed','meta_input'=>array('_mrseo_mail_state'=>'pending'))),true);
 if(is_wp_error($id)||!$id)return 0;
 if(!wp_next_scheduled('mrseo_enquiry_cleanup'))wp_schedule_event(time()+DAY_IN_SECONDS,'daily','mrseo_enquiry_cleanup');
 return (int)$id;
}
add_action('mrseo_enquiry_cleanup',static function(){
 $ids=get_posts(array('post_type'=>'mrseo_enquiry','post_status'=>array('private','draft','trash'),'fields'=>'ids','numberposts'=>200,'date_query'=>array(array('column'=>'post_date_gmt','before'=>gmdate('Y-m-d H:i:s',time()-90*DAY_IN_SECONDS),'inclusive'=>true))));
 foreach($ids as $id)wp_delete_post($id,true);
});
add_filter('manage_mrseo_enquiry_posts_columns',static function($cols){
 $cols['mrseo_mail_state']='Передача пошті';return $cols;
});
add_action('manage_mrseo_enquiry_posts_custom_column',static function($column,$id){
 if($column!=='mrseo_mail_state')return;
 $labels=array('pending'=>'Очікує','accepted'=>'Прийнято поштовим сервісом (доставку не підтверджено)','failed'=>'Помилка відправлення');
 echo esc_html($labels[get_post_meta($id,'_mrseo_mail_state',true)]??'Невідомо');
},10,2);
add_action('template_redirect',static function(){
 if(mrseo_locale()==='uk'&&mrseo_slug()==='contact'){
  if(!defined('DONOTCACHEPAGE'))define('DONOTCACHEPAGE',true);
  nocache_headers();
 }
},1);
