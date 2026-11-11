<?php
if(!defined('ABSPATH'))exit;
require_once __DIR__.'/es-service-part1.php';
require_once __DIR__.'/es-service-part2.php';
function mrseo_es_service_data(){static $data=null;if($data===null)$data=array_merge(mrseo_es_service_part1(),mrseo_es_service_part2());return $data;}
function mrseo_es_service_slugs(){return array_keys(mrseo_es_service_data());}
function mrseo_es_service_page($slug=null){return mrseo_es_service_data()[$slug??mrseo_slug()]??null;}
