<?php

	function ft_is_sort($array)
	{
		$sorted = $array;
		sort($sorted);

		if ($sorted === $array)
			return 1;
		return 0;
	}
?>
