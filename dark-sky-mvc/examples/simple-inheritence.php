<?php

class Vehicle
{
    protected $transportType;
}

class Car extends Vehicle
{
    private $wheels;
    private $doors;

    function __construct()
    {
      $this->transportType = 'land';
    }

    protected function setWheels(Int $count)
    {
      $this->wheels = $count;
    }

    protected function setDoors(Int $count)
    {
      $this->doors = $count;
    }

    protected function getWheels()
    {
      return $this->wheels;
    }

    protected function getDoors()
    {
      return $this->doors;
    }
}

class Nissan extends Car
{
    protected $vehicleModel;

    function __construct()
    {
      parent::__construct();

      $this->vehicleModel = '350z';
      $this->setWheels(4);
      $this->setDoors(3);
    }

    public function getInfo()
    {
      return [
        'doors' => $this->getDoors(),
        'wheels' => $this->getWheels(),
        'transportType' => $this->transportType
      ];
    }
}

print_r((new Nissan)->getInfo());
