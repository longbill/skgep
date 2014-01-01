<?php

include('endskin.php');

$t = new EndSkin('templates/');

$data = array();
$s = $t->result('index.html');
file_put_contents('../index.html',$s);
echo "index.html\n";




echo 'ok';
echo "\n";











