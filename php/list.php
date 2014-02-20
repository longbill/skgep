<?php

echo "\n";
$files = array();
$h = opendir(SAVE_TO);
while($v = readdir($h))
{
	if ( is_file(SAVE_TO.$v) && preg_match('/\.html$/',$v))
	{
		$files[] = $v;
	}
}
closedir($h);

ksort($files);

$html = array();
foreach($files as $f)
{
	if ($f == 'index.html' || $f == 'linkedin-share-button.html') continue;
	$html[] = '<p><a href="'.$f.'">'.$f.'</a></p>';
	echo $f."<br>";
}

file_put_contents(SAVE_TO.'index.html',join($html,''));
echo 'ok'."\n";
