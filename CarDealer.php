<?php

class CarDealer
{
    private $name;
    private $employees = [];
    private $availableCars = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addCar($car, $quantity)
    {
        $this->availableCars[] = ['car' => $car, 'quantity' => $quantity];
    }

    public function addEmployee($manager)
    {
        $this->employees[] = $manager;
    }

    public function sellCar($manager, $client, $manufacturer, $model) {
        $carToSell = null;
    
        // Find the car in availableCars based on manufacturer and model
        foreach ($this->availableCars as $key => $carData) {
            $car = $carData['car'];
            if ($car->getManufacturer() === $manufacturer && $car->getModel() === $model && $carData['quantity'] > 0) {
                $carToSell = $car;
                $this->availableCars[$key]['quantity'] -= 1;
                break;
            }
        }
    
        if ($carToSell === null) {
            echo "Selling process is not completed for customer: {$client->identity()}\n";
            return;
        }
    
        // Calculate discount for the manager based on their points
        $discount = $manager->calculateDiscount();
    
        // Calculate the final price for the client after applying the discount
        $finalPrice = $carToSell->getPrice() - ($carToSell->getPrice() * $discount / 100);
    
        // Check if the client has enough budget
        if ($client->getBudget() >= $finalPrice) {
            // Deduct the car price from the client's budget
            $client->setBudget($client->getBudget() - $finalPrice);
    
            // Add the car to the client's list of cars
            $client->addCar($carToSell);
    
            // Add points to the manager
            $manager->addPoints(11);
    
            echo "Car sold to {$client->identity()} for $finalPrice\n";
        } else {
            echo "Selling process is not completed for customer: {$client->identity()}\n";
        }
    }
    
    
    
    
    public function topRatedEmployee() {
        if (empty($this->employees)) {
            echo "Car dealer does not have employees or cars were not sold\n";
            return;
        }
    
        // Find the manager with the highest points
        $topRatedManager = null;
        $maxPoints = -1;
    
        foreach ($this->employees as $manager) {
            if ($manager->getPoints() > $maxPoints) {
                $topRatedManager = $manager;
                $maxPoints = $manager->getPoints();
            }
        }
    
        if ($topRatedManager !== null) {
            echo "{$topRatedManager->identity()} points: {$topRatedManager->getPoints()}\n";
        } else {
            echo "Car dealer does not have employees or cars were not sold\n";
        }
    }
    
}
