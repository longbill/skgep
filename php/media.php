<?php

include_once('endskin.php');





$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'media center';
$data['page'] = 'media-center';
$data['nav'] = 'media';
$t->assign($data);
$s = $t->result('media-center.html');
file_put_contents(SAVE_TO.'media-center.html',$s);
echo "media-center.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'photo gallery';
$data['page'] = 'media-gallery';
$data['nav'] = 'media';
$t->assign($data);
$s = $t->result('media-center.html');
file_put_contents(SAVE_TO.'media-gallery.html',$s);
echo "media-gallery.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'video gallery';
$data['page'] = 'media-video-gallery';
$data['nav'] = 'media';
$t->assign($data);
$s = $t->result('media-center.html');
file_put_contents(SAVE_TO.'media-video-gallery.html',$s);
echo "media-video-gallery.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'press news';
$data['page'] = 'media-press';
$data['nav'] = 'media';
$t->assign($data);
$s = $t->result('media-center.html');
file_put_contents(SAVE_TO.'media-press.html',$s);
echo "media-press.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'press news';
$data['page'] = 'media-press';
$data['nav'] = 'media';
$t->assign($data);
$s = $t->result('media-news.html');
file_put_contents(SAVE_TO.'media-news.html',$s);
echo "media-news.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'testimonials';
$data['page'] = 'media-testimonial';
$data['nav'] = 'media';
$t->assign($data);
$s = $t->result('media-testimonial.html');
file_put_contents(SAVE_TO.'media-testimonial.html',$s);
echo "media-testimonial.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'photo gallery';
$data['page'] = 'media-photo-gallery-detail';
$data['nav'] = 'media';
$t->assign($data);
$s = $t->result('media-photo-gallery-detail.html');
file_put_contents(SAVE_TO.'media-photo-gallery-detail.html',$s);
echo "media-photo-gallery-detail.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'video gallery';
$data['page'] = 'media-video-gallery-detail';
$data['nav'] = 'media';
$data['has_video'] = true;
$t->assign($data);
$s = $t->result('media-video-gallery-detail.html');
file_put_contents(SAVE_TO.'media-video-gallery-detail.html',$s);
echo "media-video-gallery-detail.html<br>";

