#!/usr/bin/php
<?php

	function bad_form()
	{
		echo "Wrong Format"."\n";
		exit(1);
	}

	date_default_timezone_set("Europe/Paris");

	if ($argc !== 2)
		return ;

	$days = [
		"lundi" => "monday",
		"mardi" => "tuesday",
		"mercredi" => "wednesday",
		"jeudi" => "thursday",
		"vendredi" => "friday",
		"samedi" => "saturday",
		"dimanche" => "sunday"
	];

	$months = [
		"janvier" => "january",
		"fevrier" => "february",
		"mars" => "march",
		"avril" => "april",
		"mai" => "may",
		"juin" => "june",
		"juillet" => "july",
		"aout" => "august",
		"septembre" => "september",
		"octobre" => "october",
		"novembre" => "november",
		"decembre" => "december"
	];

	$ret = preg_match("/([A-Z]?[a-z]+) ([\d]{1,2}) ([A-Z]?[a-z]+) ([\d]{4}) ([\d]{2}):([\d]{2}):([\d]{2})/", $argv[1], $date);

	if ($ret === 1)
	{
		if (array_key_exists(strtolower($date[1]), $days))
			$eng_day = $days[strtolower($date[1])];
		else
			bad_form();
		if (array_key_exists(strtolower($date[3]), $months))
			$eng_month = $months[strtolower($date[3])];
		else
			bad_form();
		if ((int)$date[2] > 31 || (int)$date[2] < 0)
			bad_form();
		if ((int)$date[5] > 24 || (int)$date[5] < 0)
			bad_form();
		if ((int)$date[6] > 59 || (int)$date[6] < 0)
			bad_form();
		if ((int)$date[7] > 59 || (int)$date[7] < 0)
			bad_form();
		$convert = "$date[2] $eng_month $date[4] $date[5]:$date[6]:$date[7]";

		$epoch = strtotime($convert);
	
		if ($epoch >= 0)
			echo "$epoch"."\n";
	}
	else
		bad_form();
?>
