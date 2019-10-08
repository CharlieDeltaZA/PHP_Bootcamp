#!/usr/bin/php
<?php
	function cmp($a, $b)
	{
		$ref = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";

		$i = 0;
		while ($i < strlen($a) || $i < strlen($b))
		{
			$a_pos = stripos($ref, $a[$i]);
			$b_pos = stripos($ref, $b[$i]);
			if ($a_pos < $b_pos)
				return -1;
			else if ($a_pos > $b_pos)
				return 1;
			else
				$i++;
		}
	}

	$result = "";
	foreach (array_slice($argv, 1) as $words)
	{
		if (strlen($result) === 0)
			$result .= $words;
		else
			$result .= " $words";
	}
	$array = preg_split("/\s+/", $result);
	usort($array, cmp);
	foreach ($array as $yes)
		echo "$yes"."\n";
?>
