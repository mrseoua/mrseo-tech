<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/cs-service-part1.php';
require_once __DIR__.'/cs-service-part2.php';
function mrseo_cs_service_data(){static $data=null;if($data===null)$data=array_merge(mrseo_cs_service_part1(),mrseo_cs_service_part2());return $data;}
function mrseo_cs_service_slugs(){return array_keys(mrseo_cs_service_data());}
function mrseo_cs_service_page($slug=null){return mrseo_cs_service_data()[$slug??mrseo_slug()]??null;}
