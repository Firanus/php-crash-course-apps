<?php

class Andi
{
    public function __construct($name, $role, $years)
    {
        $this->name = $name;
        $this->role = $role;
        $this->years = $years;
    }

    public function getInfo()
    {
        return 'You have been a ' .$this->role . ' for ' . $this->years . ' years!';
    }

    public function greet()
    {
        return 'Hello ' . $this->name . '!';
    }
}

class AndiFactory
{
    public static function create($name, $role, $firstEmployment)
    {
        $since = date('Y') - date('Y', mktime(0, 0, 0, 1, 1, $firstEmployment));
        return new Andi($name, $role, $since);
    }
}

$andi = AndiFactory::create('Dave', 'PD', 1990);
echo $andi->greet(); // Hello Dave!
echo $andi->getInfo(); // You have been a PD for 27 years!
