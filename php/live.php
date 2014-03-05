<?php

$p = isset($_GET['p'])? $_GET['p'] : 'index';
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'AR';

define('LANG',$lang);

include_once('endskin.php');



$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['login'] = true;
$data['live'] = true;
$data['has_video'] = true;
$data['nav'] = 'event';
$data['page_name'] = 'video gallery';
$data['page'] = 'media-video-gallery-detail';
$data['nav'] = 'media';
$t->assign($data);
$t->display($p.'.html');
