<?php

class DetectiveAgency
{
    private $name;
    private $clients = [];
    private $detectives = [];

    public function __construct($name , $clients , $detectives)
    {
        $this->name = $name;
        $this->clients = $clients;
        $this->detectives = $detectives;
    }

    public function addClient(Client $client)
    {
        if (count((array)$client->getServices()) > 3) {
            echo "Customer " . $client->identity() . " cannot be added to this agency. <br>";
        } else {
            $this->clients[] = $client;
            // Agency receives 90% of the client's service budget
            $agencyRevenue = $client->getPersonalBudget() * 0.9;
            echo "Agency received $" . $agencyRevenue . " from client " . $client->identity() . "<br/>";
        }
    }

    public function addDetective(Detective $detective)
    {
        $this->detectives[] = $detective;
        
        // Calculate revenue for this detective
        $agencyRevenue = array_reduce((array)$detective->getListOfServices(), function ($sum, $service) {
            return $sum + ($service->getPrice() * 0.15);
        }, 0);
        
        echo "Agency received $" . $agencyRevenue . " from detective " . $detective->identity() . "<br/>";
    }

    public function revenue()
    {
        $totalRevenue = 0;
        
        // Calculate revenue from clients
        foreach ($this->clients as $client) {
            $totalRevenue += $client->getPersonalBudget() * 0.9;
        }

        // Calculate revenue from detectives
        foreach ($this->detectives as $detective) {
            $totalRevenue += array_reduce($detective->getListOfServices(), function ($sum, $service) {
                return $sum + ($service->getPrice() * 0.15);
            }, 0);
        }

        return $totalRevenue;
    }
    public function displayAgencyInfo()
    {
        $agencyInfo = "Agency Name: {$this->name}\n\n";

        $agencyInfo .= "Clients:\n";
        foreach ($this->clients as $client) {
            $agencyInfo .= $client->identity() . "\n";
        }

        $agencyInfo .= "Detectives:\n";
        foreach ($this->detectives as $detective) {
            $agencyInfo .= $detective->identity() . "\n";
        }

        return $agencyInfo;
    }
}
?>
