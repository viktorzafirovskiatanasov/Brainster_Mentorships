<?php
class Client extends Person implements Actions {
    private $personalBudget;
    private $services;

    public function __construct($firstName, $lastName, $address, $personalBudget , array $services) {
        parent::__construct($firstName, $lastName, $address);
        $this->personalBudget = $personalBudget;
        $this->services = $services;
    }

    public function getPersonalBudget() {
        return $this->personalBudget;
    }

    public function getServices() {
        return $this->services;
    }
    public function identity()
    {
        $serviceInfo = '';
    
        if (!empty($this->getServices())) {
            $serviceInfo = implode("\n", array_map(function (Service $service) {
                return $service->information();
            }, $this->getServices()));
        } else {
            $serviceInfo = "No services assigned yet";
        }
    
        return "First name: {$this->getFirstName()} Last name: {$this->getLastName()} Address: {$this->getAdress()} Services: " . $serviceInfo;
    }
    
    

    public function addService($description, $serviceDuration, $price)
    {
        $service = new Service($description, $serviceDuration, $price);

        if ($this->canAffordService($service)) {
            $this->services[] = $service;
        } else {
            echo "Service: " . $service->information() . " is too expensive.<br/>";
        }
    }

    private function canAffordService(Service $service) {
        return $service->getPrice() <= $this->personalBudget;
    }
}
?>
