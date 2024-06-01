<?php

class Car {
    private $manufacturer;
    private $model;
    private $year;
    private $price;

    public function __construct($manufacturer, $model, $year, $price) {
        if ($this->isValidManufacturerModel($manufacturer, $model)) {
            $this->manufacturer = $manufacturer;
            $this->model = $model;
            $this->year = $year;
            $this->price = $price;
            echo "Car added successfully." . "<br>";
        } else {
            echo "Manufacturer or model is not valid." . PHP_EOL;
        }
    }
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function getModel()
    {
        return $this->model;
    }
    private function isValidManufacturerModel($manufacturer, $model) {
        $manufacturers = $this->getManufacturersFromFile();
        return isset($manufacturers[$manufacturer]) && in_array($model, $manufacturers[$manufacturer]);
    }

    private function getManufacturersFromFile() {
        $manufacturers = [];
        $fileContent = file_get_contents("manufacturer.txt");

        if ($fileContent) {
            $lines = explode("\n", $fileContent);
            foreach ($lines as $line) {
                $parts = explode(":", trim($line));
                $manufacturer = $parts[0];
                $models = explode(",", $parts[1]);
                $manufacturers[$manufacturer] = $models;
            }
        }

        return $manufacturers;
    }
}


