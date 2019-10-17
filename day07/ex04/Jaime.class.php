<?php

	class Jaime extends Lannister {
		public function sleepWith($partner) {
			$parent = get_class($partner);
			if ($parent === "Cersei")
				printf("With pleasure, but only in a tower in Winterfell, then.\n");
			else
				parent::sleepWith($partner);
		}
	}

?>
