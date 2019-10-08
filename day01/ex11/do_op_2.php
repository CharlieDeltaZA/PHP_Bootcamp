#!/usr/bin/php
<?php
	if ($argc !== 2)
	{
		echo "Incorrect Parameters"."\n";
		exit(1);
	}

	$info = preg_match("/\s*([0-9]+)\s*([+,-,\*,\/,%])\s*([0-9]+)\s*/", $argv[1], $store);
	var_dump($store);
	// var_dump($info);
	$num1 = trim($store[1]);
	$num2 = trim($store[3]);
	$op = trim($store[2]);

// FIX ME
// ./do_op_2.php  "six6*7sept"

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
