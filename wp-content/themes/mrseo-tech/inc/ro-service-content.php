<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/ro-service-part1.php';
require_once __DIR__.'/ro-service-part2.php';
function mrseo_ro_service_data(){static $data=null;if($data===null)$data=array_merge(mrseo_ro_service_part1(),mrseo_ro_service_part2());return $data;}
function mrseo_ro_service_slugs(){return array_keys(mrseo_ro_service_data());}
function mrseo_ro_service_page($slug=null){return mrseo_ro_service_data()[$slug??mrseo_slug()]??null;}
