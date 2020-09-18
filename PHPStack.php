<?php 
/**
  * Stack Implementation - PHPStack
  * @author Oguzhan Cerit
  */
class PHPStack {

	private $stack    = array();
	private $reversed = 0;
	private $history  = array();
	
	public function push($item) {
		/*
			Inserts a new element at the top of the current stack.
		*/
		array_push($this->stack, $item);
		$this->addHistory(__FUNCTION__,$item);
	}

	public function pop() {
		/*
			Returns top element of the stack and remove it from the current stack.
		*/
		$item = array_pop($this->stack);
		$this->addHistory(__FUNCTION__,$item);
		return $item;
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
		$this->addHistory(__FUNCTION__);
		$this->stack    = array_reverse($this->stack,FALSE);
		$this->reversed = !$this->reversed;
	}

	
	public function returnToOriginal(){
		/*
			This function reverses the current stack if it is already reversed. 
			If the current stack is not reversed, will do nothing.
		*/
		if($this->reversed){
			$this->addHistory("reverse");
			$this->stack    = array_reverse($this->stack,FALSE);
			$this->reversed = 0;
		}
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

	public function stepBack($stepCount){
		/*
			This function reverses the current stack as many steps as you want.
		*/
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

	private function addHistory($mode,$item = 0){
		/*
			This function adds changing to history array
			History array is actually another stack to store steps.
		*/
		array_push($this->history, array($mode,$item));
	}

}

?>