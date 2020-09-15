<?php 

class PHPStack {

	private $stack    = array();
	private $reversed = 0;
	
	public function push($item) {
		array_push($this->stack, $item);
	}

	public function pop($item) {
		return array_pop($this->stack);
	}

	public function top() {
		return end($this->stack);
	}

	public function size() {
		return count($this->stack);
	}

	public function reverse(){
		$this->stack    = array_reverse($this->stack,FALSE);
		$this->reversed = !$this->reversed;
	}

	public function isEmpty() {
		return empty($this->stack);
	}

	public function isReversed() {
		return $this->reversed;
	}
}

?>