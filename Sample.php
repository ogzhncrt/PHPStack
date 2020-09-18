<?php 

	require('PHPStack.php');

	$stack = new PHPStack(); //Construct a stack.

	$stack->push(10); //add an item
	/*
		Current Stack
		|10|
	*/
	$stack->push(20); //add an item
	/*
		Current Stack
		|20|
		|10|
	*/
	$stack->push(30); //add an item
	/*
		Current Stack
		|30|
		|20|
		|10|
	*/
	echo $stack->top(); //return the item from the top of the stack.
	/*
		Current Stack
		|30|
		|20|
		|10|
	*/

	$stack->reverse(); //this line reverse the current stack, top will be bottom bottom is top.
	/*!Warning!*/
	//When the foot seeks the place of the head, the sacred line is crossed. Know your place. Keep your place. Be a shoe.
	/*
		Current Stack
		|10|
		|20|
		|30|
	*/
	
	echo $stack->isReversed(); //this line returns the current stack is reversed or not.
	/*
		Current Stack
		|30|
		|20|
		|10|
	*/
	echo $stack->pop(); //this line return the item from the top of the stack and remove it from the current stack.
	/*
		Current Stack
		|20|
		|10|
	*/

	echo $stack->size(); //returns how many item exist in the stack.

	echo $stack->isEmpty(); //returns the current stack is empty or not.

	$stack->returnToOriginal(); //this line reverse the current stack if it is already reversed.
	/*
		Current Stack
		|10|
		|20|
	*/


	$stack->push(30); //add an item
	$stack->push(40); //add an item
	$stack->push(50); //add an item
	/*
		Current Stack
		|50|
		|40|
		|30|
		|10|
		|20|
	*/

	$stack->stepBack(2); //Take it back 2 steps.
	/*
		Current Stack
		|30|
		|10|
		|20|
	*/

	$stack->print("STACK"); //Print as a stack! OTHER OPTIONS = ARRAY, ARRAYREVERSE, STACK
?>