<?php
// we need to include the class definition in order to create an instance
require_once("../inc/vehicle.class.php");

// instantiate 2 car instances
$car1 = new CarVehicle();
$car2 = new CarVehicle();

// set the color of the first car instance using the set function
$car1->setColor("blue");

// set the color of the second car instance using the set function
$car2->setColor("red");

// both cars have the same class definition, but we have changed 
// the value of the color specific to each instance of the class

// you can also set properties directly if they have not been hidden
$car1->numberOfDoors = 2;
$car2->numberOfDoors = 4;


$bicycle = new BicycleVehicle();

$bicycle->setColor("green");
?>
<html>
	<body>
		car 1 color: <?php echo $car1->getColor(); ?><br>
		car 2 color: <?php echo $car2->getColor(); ?><br><br>
		car 1 doors: <?php echo $car1->getNumberOfDoors(); ?><br>
		car 2 doors: <?php echo $car2->getNumberOfDoors(); ?><br>
	</body>
</html>