<?php

include('endskin.php');





$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('register.html');
file_put_contents('../register.html',$s);
echo "register.html<br>";


$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('publications-detailed.html');
file_put_contents('../publications-detailed.html',$s);
echo "publications-detailed.html<br>";



$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('publications.html');
file_put_contents('../publications.html',$s);
echo "publications.html<br>";




$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('faqs.html');
file_put_contents('../FAQs.html',$s);
echo "FAQs.html<br>";


$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('contact-us.html');
file_put_contents('../contact-us.html',$s);
echo "contact-us.html<br>";



$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('e-library.html');
file_put_contents('../e-library.html',$s);
echo "e-library.html<br>";



$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('edit-profile.html');
file_put_contents('../edit-profile.html',$s);
echo "edit-profile.html<br>";




$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('search-results.html');
file_put_contents('../search-results.html',$s);
echo "search-results.html<br>";


$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('program-pillars.html');
file_put_contents('../program-pillars.html',$s);
echo "program-pillars.html<br>";




$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('about-the-program.html');
file_put_contents('../about-the-program.html',$s);
echo "about-the-program.html<br>";


$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('customers-satisfaction.html');
file_put_contents('../customers-satisfaction.html',$s);
echo "customers-satisfaction.html<br>";


$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('employees-opinion.html');
file_put_contents('../employees-opinion.html',$s);
echo "employees-opinion.html<br>";





echo 'ok';
echo "\n<br><br>";


include('list.php');

