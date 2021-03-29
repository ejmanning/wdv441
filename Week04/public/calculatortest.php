<?php
// we need to include the class definition in order to create an instance
require_once("../inc/calculator.class.php");

// we use the "new" keyword to create an instance from the class definition
$calculator = new Calculator();

$calculator->add(23);
echo "<br>the previous total was: " . $calculator->previousValue . ". the user called " . $calculator->lastAction . " and the current total is: " . $calculator->currentTotal();

$calculator->add(573);
echo "<br>the previous total was: " . $calculator->previousValue . ". the user called " . $calculator->lastAction . " and the current total is: " . $calculator->currentTotal();

$calculator->subtract(1999);
echo "<br>the previous total was: " . $calculator->previousValue . ". the user called " . $calculator->lastAction . " and the current total is: " . $calculator->currentTotal();
?>