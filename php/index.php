<?php

include('endskin.php');

$t = new EndSkin('templates/');

$data = array('page_type'=>'home');
$t->assign($data);
$s = $t->result('index.html');
file_put_contents('../index-real.html',$s);
echo "index-real.html\n";




echo 'ok';
echo "\n";











