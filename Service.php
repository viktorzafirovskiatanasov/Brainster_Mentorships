<?php



class Service{
    private $description;
    private $serviceDuration;
    private $price;

    public function __construct($description, $serviceDuration,$price)
    {
        $this->description = $description;
        $this->serviceDuration = $serviceDuration;
        $this->price = $price;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function getServiceDuration()
    {
        return $this->serviceDuration;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function information()
    {
        return 'The description of the service is: ' . $this->description . ' the duration of it is: ' . $this->serviceDuration . 'Hours  for the price of: ' . $this->price . "$ <br>";
    }
}