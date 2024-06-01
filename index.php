<?php
include 'Action.php'; // Include the interface definition
include 'Person.php';
include 'Service.php';
include 'Client.php';
include 'Detective.php';
include 'DetectiveAgency.php';




// Create three new Service objects
$service1 = new Service("Service A", 2, 120);
$service2 = new Service("Service B", 3, 180);
$service3 = new Service("Service C", 1, 60);

// Print the details of each Service object
echo "Service 1 details:\n";
echo $service1->information();


echo "Service 2 details:\n";
echo $service2->information();

echo "Service 3 details:\n";
echo $service3->information();

// Clients
$client1 = new Client("John", "Doe", "123 Main St", 1000, [$service1, $service2]);
$client2 = new Client("Jane", "Smith", "456 Elm St", 1500, [$service3]);
$client3 = new Client("Alice", "Johnson", "789 Oak St", 800, [$service2]);
echo "Client 1 details:<br>";
echo $client1->identity();
echo "<br>";

echo "Client 2 details:<br>";
echo $client2->identity();
echo "<br>";

echo "Client 3 details:<br>";
echo $client3->identity();

$detective1 = new Detective("Sherlock", "Holmes", "Baker Street", 10, [$service1, $service2]);
$detective2 = new Detective("Hercule", "Poirot", "Rue du Havre", 8, [$service3]);
$detective3 = new Detective("Miss", "Marple", "St. Mary Mead", 7, [$service2]);

// Print the details of each Detective object using the identity() method
echo "Detective 1 details:\n";
echo $detective1->identity();
echo "\n\n";

echo "Detective 2 details:\n";
echo $detective2->identity();
echo "\n\n";

echo "Detective 3 details:\n";
echo $detective3->identity();
echo "\n";

$agency = new DetectiveAgency("My Agency", [], []);

// Add clients to the agency
$agency->addClient($client1);
$agency->addClient($client2);
$agency->addClient($client3);

// Add detectives to the agency
$agency->addDetective($detective1);
$agency->addDetective($detective2);
$agency->addDetective($detective3);

// Print the details of the DetectiveAgency object
echo "Detective Agency details:\n";
echo $agency->displayAgencyInfo();
echo "\n";

// Print the agency's revenue
echo "Total agency revenue: $" . $agency->revenue() . "\n";
?>
