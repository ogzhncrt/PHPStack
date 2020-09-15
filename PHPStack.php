<?php 
/**
  * Stack Implementation - PHPStack
  * @author Oguzhan Cerit
  */
class PHPStack {

	private $stack    = array();
	private $reversed = 0;
	
	public function push($item) {
		/*
			Inserts a new element at the top of the current stack.
		*/
		array_push($this->stack, $item);
	}

	public function pop() {
		/*
			Returns top element of the stack and remove it from the current stack.
		*/
		return array_pop($this->stack);
	}

	public function top() {
		/*
			Returns top element of the current stack.
		*/
		return end($this->stack);
	}

	public function size() {
		/*
			Returns size of the current stack.
		*/
		return count($this->stack);
	}

	public function reverse(){
		/* 
			This function reverses the current stack. 
		*/
		$this->stack    = array_reverse($this->stack,FALSE);
		$this->reversed = !$this->reversed;
	}

	public function isEmpty() {
		/*
			Returns the current stack is empty or not.
		*/
		return empty($this->stack);
	}

	public function isReversed() {
		/* 
			This function returns the current stack was previously reversed or not. 
		*/
		return $this->reversed;
	}
}

?>