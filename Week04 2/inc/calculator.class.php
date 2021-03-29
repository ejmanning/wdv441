<?php
// something used at home

class Calculator {
	
	// you can also default properties by using the equal sign
	var $lastAction = "";
	var $currentTotal = 0;
	var $previousValue = 0; 

	function currentTotal() {
		return $this->currentTotal;
	}
	
	function add($numberToAdd) {
		// store the current value to previous
		$this->previousValue = $this->currentTotal;
		// add the number to the total and set the last action to add
		$this->currentTotal = $this->currentTotal + $numberToAdd;
		$this->lastAction = "add";
	}
	
	function subtract($numberToSubtract) {
		// store the current value to previous
		$this->previousValue = $this->currentTotal;
		// subtract the number from the total and set the last action to subtract
		$this->currentTotal = $this->currentTotal - $numberToSubtract;
		$this->lastAction = "subtract";
	}
	
}
?>