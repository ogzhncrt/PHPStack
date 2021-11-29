<?php 
/**
  * Stack Implementation - PHPStack
  * 
  * Stack is a linear data structure that follows a 
  * particular order in which the operations are performed. 
  * The order may be LIFO(Last In First Out) or FILO(First In Last Out).
  * 
  * @author ogzhncrt
  */
class PHPStack {

	private $stack    = array();
	private $reversed = 0;
	private $history  = array();
	
	/*
	 Inserts a new element at the top of the current stack.
	*/
	public function push($item) {
		array_push($this->stack, $item);
		$this->addHistory(__FUNCTION__,$item);
	}

	/*
		Returns top element of the stack and remove it from the current stack.
	*/
	public function pop() {
		$item = array_pop($this->stack);
		$this->addHistory(__FUNCTION__,$item);
		return $item;
	}

	/*
		Returns top element of the current stack.
	*/
	public function top() {
		return end($this->stack);
	}

	/*
		Returns size of the current stack.
	*/
	public function size() {
		return count($this->stack);
	}

	/* 
		This function reverses the current stack. 
	*/
	public function reverse(){
		$this->addHistory(__FUNCTION__);
		$this->stack    = array_reverse($this->stack,FALSE);
		$this->reversed = !$this->reversed;
	}

	/*
		This function print stack to screen with different modes
		ARRAY | ARRAYREVERSE | STACK
	*/
	public function print($mode = "ARRAY"){
		switch ($mode) {
			case 'ARRAY': //print as an array
				print_r($this->stack);
				break;
			case 'ARRAYREVERSE': //print as an reverse array
				print_r(array_reverse($this->stack,FALSE)); 
				break;
			case 'STACK': //print as an simple GUI stack.
				$reversed = array_reverse($this->stack);
				foreach ($reversed as $key => $value) {
					echo "| ".$value." |<br>";
				}
				break;
		}
	}

	/*
		This function reverses the current stack if it is already reversed. 
		If the current stack is not reversed, will do nothing.
	*/
	public function returnToOriginal(){
		if($this->reversed){
			$this->addHistory("reverse");
			$this->stack    = array_reverse($this->stack,FALSE);
			$this->reversed = 0;
		}
	}

	/*
		Returns the current stack is empty or not.
	*/
	public function isEmpty() {
		return empty($this->stack);
	}

	/* 
		This function returns the current stack was previously reversed or not. 
	*/
	public function isReversed() {
		return $this->reversed;
	}

	/*
		This function reverses the current stack as many steps as you want.
	*/
	public function stepBack($stepCount){
		for ($i=0; $i < $stepCount; $i++) { 
			$history = array_pop($this->history);

			switch ($history[0]) {
				case 'pop':
					array_push($this->stack, $history[1]);
					break;
				case 'push':
					array_pop($this->stack);
					break;
				case 'reverse':
					$this->stack    = array_reverse($this->stack,FALSE);
					$this->reversed = !$this->reversed;
					break;
			}
		}
	}

	/*
		This function adds changing to history array
		History array is actually another stack to store steps.
	*/
	private function addHistory($mode,$item = 0){
		array_push($this->history, array($mode,$item));
	}

}

?>