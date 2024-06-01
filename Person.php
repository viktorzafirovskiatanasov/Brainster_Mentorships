<?php

abstract class Person
{

    protected string $firstName;
    protected string $lastName;

    public function __construct(
        $firstName,
        $lastName
        )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    abstract public function identity();
}
