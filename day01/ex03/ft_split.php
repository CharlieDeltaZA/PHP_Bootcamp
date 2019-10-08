<?php
	function ft_split($input)
	{
		$array = preg_split("/\s+/", $input);
		sort($array);
		return $array;
	}
?>
