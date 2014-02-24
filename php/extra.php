<?php

include_once('endskin.php');





$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('register.html');
file_put_contents(SAVE_TO.'register.html',$s);
echo "register.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['nav'] = 'publications';
$t->assign($data);
$s = $t->result('publications-detailed.html');
file_put_contents(SAVE_TO.'publications-detailed.html',$s);
echo "publications-detailed.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['nav'] = 'publications';
$t->assign($data);
$s = $t->result('publications.html');
file_put_contents(SAVE_TO.'publications.html',$s);
echo "publications.html<br>";




$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('faqs.html');
file_put_contents(SAVE_TO.'FAQs.html',$s);
echo "FAQs.html<br>";


$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('contact-us.html');
file_put_contents(SAVE_TO.'contact-us.html',$s);
echo "contact-us.html<br>";



$t = new EndSkin('templates/');
$data = array();
$data['nav'] = 'e-library';
$t->assign($data);
$s = $t->result('e-library.html');
file_put_contents(SAVE_TO.'e-library.html',$s);
echo "e-library.html<br>";






$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('search-results.html');
file_put_contents(SAVE_TO.'search-results.html',$s);
echo "search-results.html<br>";


$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('program-pillars.html');
file_put_contents(SAVE_TO.'program-pillars.html',$s);
echo "program-pillars.html<br>";




$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('about-the-program.html');
file_put_contents(SAVE_TO.'about-the-program.html',$s);
echo "about-the-program.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['nav'] = 'satisfaction';
$t->assign($data);
$s = $t->result('customers-satisfaction.html');
file_put_contents(SAVE_TO.'customers-satisfaction.html',$s);
echo "customers-satisfaction.html<br>";


$t = new EndSkin('templates/');
$data = array();
$data['nav'] = 'opinion';
$t->assign($data);
$s = $t->result('employees-opinion.html');
file_put_contents(SAVE_TO.'employees-opinion.html',$s);
echo "employees-opinion.html<br>";



$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('sitemap.html');
file_put_contents(SAVE_TO.'sitemap.html',$s);
echo "sitemap.html<br>";


$t = new EndSkin('templates/');
$data = array();
$t->assign($data);
$s = $t->result('logo-usage.html');
file_put_contents(SAVE_TO.'logo-usage.html',$s);
echo "logo-usage.html<br>";


