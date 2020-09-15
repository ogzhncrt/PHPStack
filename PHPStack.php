<?php 

class PHPStack {

	private $stack = array();
	
	public function push($item) {
		array_push($this->stack, $item);
	}

	public function pop($item) {
		return array_pop($this->stack);
	}

	public function isEmpty() {
		return empty($this->stack);
	}
}

?>