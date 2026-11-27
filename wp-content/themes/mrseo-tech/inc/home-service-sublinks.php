<?php
if(!defined('ABSPATH'))exit;
function mrseo_home_subservice_groups($key){
 if(!in_array($key,array('seo','ads','horoshop','sites','dev'),true))return array();
 require_once __DIR__.'/ua-header-six.php';
 return mrseo_ua_visible_menu_sections($key);
}
