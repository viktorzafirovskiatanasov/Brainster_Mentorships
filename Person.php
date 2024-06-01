<?php



abstract class Person {
    private $firstName;
    private $lastName;
    private $adress;
    
    public function __construct($firstName, $lastName,$adress)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->adress = $adress;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getAdress()
    {
        return $this->adress;
    }
    abstract public function identity();
}