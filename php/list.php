<?php

echo "\n";
$files = array();
$h = opendir('../');
while($v = readdir($h))
{
	if ( is_file('../'.$v) && preg_match('/\.html$/',$v))
	{
		$files[] = $v;
	}
}
closedir($h);

ksort($files);

$html = array();
foreach($files as $f)
{
	if ($f == 'list.html') continue;
	$html[] = '<p><a href="'.$f.'">'.$f.'</a></p>';
	echo $f."\n";
}

file_put_contents('../list.html',join($html,''));
echo 'ok'."\n";
