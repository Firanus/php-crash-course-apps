<?php

namespace Test;

class Andi
{
    private static $andis = [
        'Peter',
        'David',
        'Jack'
    ];

    public function all()
    {
        return self::$andis;
    }

    public function find($id)
    {
        return self::$andis[$id];
    }

    public function create($name)
    {
        // function here
    }

    public function update()
    {
        // function here
    }

    public function delete()
    {
        // function here
    }
}