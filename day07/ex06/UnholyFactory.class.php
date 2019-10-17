<?php
class UnholyFactory
{
	private $fighters;

	public function	__construct() {
		$this->fighters = array();
	}

	public function	absorb($fighter) {
		if($fighter instanceof Fighter)
		{
			foreach($this->fighters as $in) {
				if($in == $fighter)
				{
					printf("(Factory already absorbed a fighter of type ".$fighter->getDiv().")".PHP_EOL);
					return ;
				}
			}
			print("(Factory absorbed a fighter of type ".$fighter->getDiv().")".PHP_EOL);
			$this->fighters[] = $fighter;
		}
		else
		{
			print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
			return ;
		}
	}

	public function	fabricate($div) {
		foreach($this->fighters as $f) {
			if($f->getDiv() == $div)
			{
				print("(Factory fabricates a fighter of type ".$div.")".PHP_EOL);
				return $f;
			}
		}
		print("(Factory hasn't absorbed any fighter of type ".$div.")".PHP_EOL);
		return;
	}
}
?>
