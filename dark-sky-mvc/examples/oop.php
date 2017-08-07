<?php

/**
 * Procedural
 */
function andiList()
{
    return [
        'andis' => []
    ];
}

function addAndi($andiList, $name, $role)
{
    $andiList['andis'][$name] = $role;
    return $andiList;
}

function getAndi($andiList, $name)
{
    return isset($andiList['andis'][$name]) ? $andiList['andis'][$name] : null;
}

$list = andiList();
$list = addAndi($list, 'Andi', 'PD');

print_r($list); // Array ( [andis] => Array ( [Andi] => PD ) )

$andi = getAndi($list, 'Andi');

echo $andi; // PD


/**
 * Object oriented
 */
class Andis
{
    private $list = [];

    public function set($name, $role)
    {
        $this->list[$name] = $role;
    }

    public function get($name)
    {
        return isset($this->list[$name]) ? $this->list[$name] : null;
    }
}

$andis = new Andis();
$andis->set('Andi', 'PD');
echo $andis->get('Andi'); // PD


/**
 * Slide example
 */

namespace Dekker;

class Andi extends Squad implements AndiInterface{
    use ClubTrait;

    public $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    private function getAge(){
        return $this->age;
    }

    protected function getName(){
        return $this->name;
    }
}
