<?php

class Client extends Person
{
    private int $budget;
    private array $listOfCars = [];

    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    public function getBudget()
    {
        return $this->budget;
    }

    public function setListOfCars(array $listOfCars)
    {
        $this->listOfCars = $listOfCars;
    }
    public function addCar($car)
    {
        $this->listOfCars[] = $car;
    }
    
    public function getListOfCars()
    {
        return $this->listOfCars;
    }

    public function identity()
    {
        return "{$this->firstName} {$this->lastName}";
    }
}
