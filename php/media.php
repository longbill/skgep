<?php

include('endskin.php');





$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'media center';
$data['page'] = 'media-center';
$t->assign($data);
$s = $t->result('media-center.html');
file_put_contents('../media-center.html',$s);
echo "media-center.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'photo gallery';
$data['page'] = 'media-gallery';
$t->assign($data);
$s = $t->result('media-center.html');
file_put_contents('../media-gallery.html',$s);
echo "media-gallery.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'video gallery';
$data['page'] = 'media-video-gallery';
$t->assign($data);
$s = $t->result('media-center.html');
file_put_contents('../media-video-gallery.html',$s);
echo "media-video-gallery.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'press news';
$data['page'] = 'media-press';
$t->assign($data);
$s = $t->result('media-center.html');
file_put_contents('../media-press.html',$s);
echo "media-press.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'press news';
$data['page'] = 'media-press';
$t->assign($data);
$s = $t->result('media-news.html');
file_put_contents('../media-news.html',$s);
echo "media-news.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'testimonials';
$data['page'] = 'media-testimonial';
$t->assign($data);
$s = $t->result('media-testimonial.html');
file_put_contents('../media-testimonial.html',$s);
echo "media-testimonial.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'photo gallery';
$data['page'] = 'media-photo-gallery-detail';
$t->assign($data);
$s = $t->result('media-photo-gallery-detail.html');
file_put_contents('../media-photo-gallery-detail.html',$s);
echo "media-photo-gallery-detail.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page_name'] = 'video gallery';
$data['page'] = 'media-video-gallery-detail';
$t->assign($data);
$s = $t->result('media-video-gallery-detail.html');
file_put_contents('../media-video-gallery-detail.html',$s);
echo "media-video-gallery-detail.html<br>";



echo 'ok';
echo "\n<br><br>";


include('list.php');

