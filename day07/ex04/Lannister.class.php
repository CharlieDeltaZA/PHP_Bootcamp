<?php

	class Lannister {
		public function sleepWith($partner) {
			$parent = get_parent_class($partner);
			if ($parent === "Lannister")
				printf("Not even if I'm drunk !\n");
			else
				printf("Let's do this.\n");
		}
	}

?>
