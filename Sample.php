<?php 

require('PHPStack.php');

$stack = new PHPStack();

$stack->push(10);
$stack->push(20);
$stack->push(30);

echo $stack->top();

$stack->reverse();
echo $stack->top();
echo $stack->isReversed();
echo $stack->pop();

?>