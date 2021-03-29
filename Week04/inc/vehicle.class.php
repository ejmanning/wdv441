<?php
class Vehicle {
	// all vehicles will have a color
	var $color;

	// return the value of color on this instance
	function getColor() {
		return $this->color;
	}

	// set the color value on this instance
	function setColor($newColor) {
		$this->color = $newColor;
	}
}

// car vehicle class extends from vehicle
// we _do not_ need to give it a color or the color functions
// because it will inherit them from the Vehicle class definition

class CarVehicle extends Vehicle {

	var $numberOfDoors;
	var $engineType;
	
	// get the number of doors on this instance
	function getNumberOfDoors() {
		return $this->numberOfDoors;
	}

	// get the engine type for this instance
	function getEngineType() {
		return $this->engineType;
	}	
}

class BicycleVehicle extends Vehicle {
	var $chainSize;
	

	function resetChain() {
		
	}
}
?>