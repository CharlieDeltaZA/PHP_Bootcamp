<?php

	class NightsWatch {
		private $fighters;

		public function recruit($recruit) {
			$this->fighters[] = $recruit;
		}

		public function fight() {
			foreach ($this->fighters as $fighter)
				if ($fighter instanceof IFighter)
					$fighter->fight();
		}
	}

?>
