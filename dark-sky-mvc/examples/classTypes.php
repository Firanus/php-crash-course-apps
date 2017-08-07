<?php

/**
 * Regular
 */
class Cats
{
    public function __construct()
    {
        $this->cats = ['Fluffy', 'Ms. McClaw', 'Catalie Portman'];
    }

    public function getAll()
    {
        return $this->cats;
    }
}

$cats = new Cats();
print_r($cats->getAll()); // Array ( [0] => Fluffy [1] => Ms. McClaw [2] => Catalie Portman )

/**
 * Static methods
 */
class Dogs{
    private static $dogs = ['Doggo' => 'Bulldog', 'Doge' => 'Shiba Inu', 'Frodo' => 'Husky'];

    public static function getAll(){
        return static::$dogs;
    }

    public static function getOne($name){
        return static::$dogs[$name];
    }
}

print_r(Dogs::getAll()); // Array ( [Doggo] => Bulldog [Doge] => Shiba Inu [Frodo] => Husky )
echo Dogs::getOne('Frodo'); // Husky

/**
 * Abstract
 */
abstract class MonkeyAbstraction{
    abstract function getName($name);
    abstract function getAge();
}

class Monkey extends MonkeyAbstraction{
    public function getName($name)
    {
        // TODO: Implement getName() method.
    }
    public function getAge()
    {
        // TODO: Implement getAge() method.
    }
}

/**
 * Final
 */
final class CantTouchThis{
    public function __construct()
    {
        // Can not be extended
    }
    final public function getName(){
        // Can not be overridden by children
    }
}