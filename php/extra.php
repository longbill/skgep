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
$s = $t->result('search-results.html');
file_put_contents('../search-results.html',$s);
echo "search-results.html<br>";





echo 'ok';
echo "\n<br><br>";


include('list.php');

