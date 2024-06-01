<?php

class Manager extends Person
{

    private int $points=0;

    public function setPoints($points)
    {
        $this->points = $points;
    }
    public function getPoints()
    {
        return $this->points;
    }
    public function addPoints($pointsToAdd)
    {
        $this->points += $pointsToAdd;
    }
    public function identity()
    {
        return 	"{$this->firstName} {$this->lastName} ";
    }
    public function calculateDiscount()
    {
       
        if ($this->points >= 80) {
            return 25;
        } elseif ($this->points >= 60) {
            return 20;
        } elseif ($this->points >= 40) {
            return 15;
        } elseif ($this->points >= 20) {
            return 10;
        } else {
            return 5;
        }
    }
}
