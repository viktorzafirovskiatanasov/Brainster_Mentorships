<?php
class Detective extends Person implements Actions
{
   
    private $availableTime;
    private $listOfServices;

    public function __construct($firstName, $lastName, $address, $availableTime, array $listOfServices)
    {
        parent::__construct($firstName, $lastName, $address);
        $this->availableTime = $availableTime;
        $this->listOfServices  = $listOfServices;
    }

    public function addService($description, $serviceDuration, $price)
    {
        $service = new Service($description, $serviceDuration, $price);

        $totalDuration = array_reduce((array) $this->listOfServices, function ($sum, $service) {
            return $sum + $service->getServiceDuration();
        }, 0);

        if ($totalDuration + $service->getServiceDuration() <= $this->availableTime) {
            $this->listOfServices[] = $service;
        } else {
            echo "Detective is too busy for service: " . $service->information() . "<br>";
        }
    }

    public function getListOfServices()
    {
        return $this->listOfServices;
    }

    public function identity()
    {
        if (empty($this->listOfServices)) {
            return "First name: " . $this->getFirstName() . " Last name: " . $this->getLastName() . " Address: " . $this->getAdress() . " Services: Services are not assigned yet <br>";
        }

        $serviceInfo = implode(", ", array_map(function (Service $service) {
            return $service->information(); // Corrected method name to infomation()
        },(array) $this->listOfServices));

        return "First name: " . $this->getFirstName() . " Last name: " . $this->getLastName() . " Address: " . $this->getAdress() . " Services: (" . $serviceInfo . ") <br>";
    }
    
    // Getter for availableTime
    public function getAvailableTime()
    {
        return $this->availableTime;
    }
}
