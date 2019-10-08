#!/usr/bin/php
<?php
	$result = "";
	foreach (array_slice($argv, 1) as $words)
	{
		if (strlen($result) === 0)
			$result .= $words;
		else
			$result .= " $words";
	}
	$array = preg_split("/\s+/", $result);
	sort($array);
	foreach ($array as $yes)
		echo "$yes"."\n";
?>
