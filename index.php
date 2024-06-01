<?php
include 'Car.php';
include 'Person.php';
include 'Client.php';
include 'Manager.php';
include 'CarDealer.php';

// Create Car objects
$car1 = new Car("Toyota", "corolla", 2023, 25000);
$car2 = new Car("Kia", "ceed", 2023, 22000);

// Create Client objects
$client1 = new Client("John", "Doe");
$client1->setBudget(30000);

// Create Manager objects
$manager1 = new Manager("Alice", "Smith");
$manager2 = new Manager("Bob", "Johnson");

// Create CarDealer object
$carDealer = new CarDealer("Best Cars");

// Add cars to the dealer's inventory
$carDealer->addCar($car1, 5);
$carDealer->addCar($car2, 3);

// Add employees to the dealer
$carDealer->addEmployee($manager1);
$carDealer->addEmployee($manager2);

// Simulate car sales
echo "Simulating car sales:<br>";
echo "-----------------------<br>";
echo "Client: {$client1->identity()} (Budget: {$client1->getBudget()})<br>";

echo "Car 1: {$car1->getManufacturer()} {$car1->getModel()} (Price: {$car1->getPrice()})<br>";
$carDealer->sellCar($manager1, $client1, "Toyota", "corolla");

echo "<br>Car 2: {$car2->getManufacturer()} {$car2->getModel()} (Price: {$car2->getPrice()})<br>";
$carDealer->sellCar($manager2, $client1, "Kia", "ceed");

// Print top-rated employee
echo "<br>Top-rated Employee:<br>";
echo "-------------------<br>";
$carDealer->topRatedEmployee();
?>
