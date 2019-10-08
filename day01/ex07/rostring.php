#!/usr/bin/php
<?php
	if ($argc === 1)
		return ;
	
	$input = $argv[1];
	$array = preg_split("/\s+/", $input);
	foreach (array_slice($array, 1) as $word)
		echo "$word"." ";
	echo "$array[0]"."\n";
?>
