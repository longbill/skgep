<?php

include('endskin.php');

$t = new EndSkin('templates/');

$data = array();
$s = $t->result('award-about.html');
file_put_contents('../award-about.html',$s);
echo "award-about.html<br>";

$data = array();
$s = $t->result('award-categories.html');
file_put_contents('../award-categories.html',$s);
echo "award-categories.html<br>";




echo 'ok';
echo "\n";

