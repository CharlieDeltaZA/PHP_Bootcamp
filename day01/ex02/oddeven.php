#!/usr/bin/php
<?php
while (1)
{
	echo "Enter a number: ";
	$handle = fopen("php://stdin", "r");
	$num = fgets($handle);

		if (feof($handle))
			die ("^D\n");
		
		$num = trim($num);
		if (is_numeric($num))
		{
			if ($num % 2 === 0)
				echo "The number ".$num." is even"."\n";
			else
				echo "The number ".$num." is odd"."\n";
		}
		else
			echo "'$num' is not a number"."\n";
	
	fclose($handle);
}
?>