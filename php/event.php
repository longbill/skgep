<?php

include('endskin.php');



$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'login';
$t->assign($data);
$s = $t->result('event-login.html');
file_put_contents('../event-login.html',$s);
echo "event-login.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$t->assign($data);
$s = $t->result('event-events.html');
file_put_contents('../event-events.html',$s);
echo "event-events.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['login'] = true;
$t->assign($data);
$s = $t->result('event-events.html');
file_put_contents('../event-events-logged-in.html',$s);
echo "event-events-logged-in.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['login'] = true;
$t->assign($data);
$s = $t->result('event-manage.html');
file_put_contents('../event-manage.html',$s);
echo "event-manage.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['login'] = true;
$t->assign($data);
$s = $t->result('event-detail.html');
file_put_contents('../event-detail.html',$s);
echo "event-detail.html<br>";




$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['login'] = true;
$t->assign($data);
$s = $t->result('event-register.html');
file_put_contents('../event-register.html',$s);
echo "event-register.html<br>";



echo 'ok';
echo "\n<br><br>";


include('list.php');

