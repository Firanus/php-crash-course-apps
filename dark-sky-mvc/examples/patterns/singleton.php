<?php

class Database
{
    private static $instance = null;

    private function __construct(){}

    private function __clone(){}

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new Database();
        }
        return static::$instance;
    }
}

$db1 = Database::getInstance();
$db2 = Database::getInstance();

if ($db1 === $db2) {
    echo 'The two object instance is the same!';
} else {
    echo 'The object instances don\'t match!';
}
