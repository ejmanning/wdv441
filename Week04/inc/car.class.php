<?php

class Car {
	
	// properties that store values unique to the class instance
	var $color;
	var $numberOfDoors;
	var $engineType;
	
	// return the value of color on this instance
	function getColor() {
		return $this->color;
	}

	// set the color value on this instance
	function setColor($newColor) {
		$this->color = $newColor;
	}

	// get the number of doors on this instance
	function getNumberOfDoors() {
		return $this->numberOfDoors;
	}

	// get the engine type for this instance
	function getEngineType() {
		return $this->engineType;
	}

}
?>