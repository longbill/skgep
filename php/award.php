<?php

include('endskin.php');



$t = new EndSkin('templates/');

$data = array();
$data['page'] = 'about';
$t->assign($data);
$s = $t->result('award-about.html');
file_put_contents('../award-about.html',$s);
echo "award-about.html<br>";

$data = array();
$data['page'] = 'categories';
$data['category'] = 'all';
$t->assign($data);
$s = $t->result('award-categories.html');
file_put_contents('../award-categories.html',$s);
echo "award-categories.html<br>";


$data = array();
$data['page'] = 'categories';
$data['category'] = 'main';
$t->assign($data);
$s = $t->result('award-main-category.html');
file_put_contents('../award-main-category.html',$s);
echo "award-main-category.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'timeline';
$t->assign($data);
$s = $t->result('award-timeline.html');
file_put_contents('../award-timeline.html',$s);
echo "award-timeline.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'winners';
$t->assign($data);
$s = $t->result('award-winners.html');
file_put_contents('../award-winners.html',$s);
echo "award-winners.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'winners';
$t->assign($data);
$s = $t->result('award-participating.html');
file_put_contents('../award-participating.html',$s);
echo "award-participating.html<br>";




echo 'ok';
echo "\n";

