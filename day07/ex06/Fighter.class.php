<?php
	abstract class Fighter {
		private $div;

		public function __construct($type) {
			$this->div = $type;
		}

		abstract function fight($target);
		
		public function getDiv() {
			return($this->div);
		}
	}
?>
