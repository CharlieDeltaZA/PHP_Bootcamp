#!/usr/bin/php
<?php

	if ($argc !== 2)
		return ;

		// title="([a-zA-Z ]+)"
		// <a.+>([a-zA-Z ]+)<

	$file = $argv[1];
	$content = file_get_contents($file);
	$ret = explode("\n", $content);
	foreach ($ret as $line)
	{
		$bool_1 = preg_match("/title=\"([a-zA-Z ]+)\"/", $line, $store1);
		$bool_2 = preg_match("/<a.+>([a-zA-Z ]+)</", $line, $store2);
		if (!$bool_1 || !$bool_2)
			echo "$line\n";
		else
		{
			if ($bool_1)
				$line = preg_replace_callback("/title=\"([a-zA-Z ]+)\"/", function ($matches) {
				return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));}, $line);
			if ($bool_2)
				$line = preg_replace_callback("/<a.+>([a-zA-Z ]+)</", function ($matches) {
						return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));}, $line);
			echo "$line\n";
		}
	}
?>
