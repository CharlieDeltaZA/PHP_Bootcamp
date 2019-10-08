#!/usr/bin/php
<?php
	if (!$argv[1])
		return ;
	$input = $argv[1];
	$output = "";
	$array = preg_split("/\s+/", trim($input));
	
	foreach ($array as $word)
	{
		if (strlen($output) === 0)
			$output .= $word;
		else
			$output .= " $word";
	}
	echo "$output\n";
?>
