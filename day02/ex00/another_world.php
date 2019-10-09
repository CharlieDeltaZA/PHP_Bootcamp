#!/usr/bin/php
<?php
	if ($argc === 1)
		return ;

	$content = trim($argv[1]);
	$output = "";
	$array = preg_split("/\s+/", trim($content));
	
	foreach ($array as $word)
	{
		if (strlen($output) === 0)
			$output .= $word;
		else
			$output .= " $word";
	}
	echo "$output\n";
?>
