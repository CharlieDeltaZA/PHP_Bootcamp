#!/usr/bin/php
<?php
	if (!$argc === 2)
	{
		echo "Incorrect Parameters"."\n";
		exit(1);
	}

	// $num1 = trim($argv[1]);
	// $num2 = trim($argv[3]);
	// $op = trim($argv[2]);
	// $regex = /s*[0-9]+/s*[+-*/%]/s*[0-9]+/s*

	if (!is_numeric($num1) || !is_numeric($num2))
	{
		echo "Syntax Error"."\n";
		exit(1);
	}

	if ($op == '+')
		$result = $num1 + $num2;
	else if ($op == '-')
		$result = $num1 - $num2;
	else if ($op == '*')
		$result = $num1 * $num2;
	else if ($op == '/')
		$result = $num1 / $num2;
	else if ($op == '%')
		$result = $num1 % $num2;
	else
	{
		echo "Syntax Error"."\n";
		exit(1);
	}
	
	echo "$result"."\n";
?>
