<?php

include_once('endskin.php');



$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'login';
$data['nav'] = 'event';
$t->assign($data);
$s = $t->result('event-login.html');
file_put_contents(SAVE_TO.'event-login.html',$s);
echo "event-login.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['nav'] = 'event';
$t->assign($data);
$s = $t->result('event-events.html');
file_put_contents(SAVE_TO.'event-events.html',$s);
echo "event-events.html<br>";




$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'edit profile';
$data['nav'] = 'event';
$data['login'] = true;
$t->assign($data);
$s = $t->result('edit-profile.html');
file_put_contents(SAVE_TO.'edit-profile.html',$s);
echo "edit-profile.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['login'] = true;
$data['nav'] = 'event';
$t->assign($data);
$s = $t->result('event-events.html');
file_put_contents(SAVE_TO.'event-events-logged-in.html',$s);
echo "event-events-logged-in.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['login'] = true;
$data['nav'] = 'event';
$t->assign($data);
$s = $t->result('event-manage.html');
file_put_contents(SAVE_TO.'event-manage.html',$s);
echo "event-manage.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['login'] = true;
$data['nav'] = 'event';
$t->assign($data);
$s = $t->result('event-detail.html');
file_put_contents(SAVE_TO.'event-detail.html',$s);
echo "event-detail.html<br>";




$t = new EndSkin('templates/');
$data = array();
$data['page'] = 'events';
$data['page_name'] = 'events';
$data['login'] = true;
$data['nav'] = 'event';
$t->assign($data);
$s = $t->result('event-register.html');
file_put_contents(SAVE_TO.'event-register.html',$s);
echo "event-register.html<br>";

