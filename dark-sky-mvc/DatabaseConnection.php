<?php
/**
 * Created by IntelliJ IDEA.
 * User: itchernev
 * Date: 04/08/2017
 * Time: 11:50
 */
class DatabaseConnection {
    private static $instance;

    private function __construct(){}
    private function __clone (){}

//    function __invoke()
//    {
//        return self::instance;
//    }

    public static function getConnection(){
        if(!self::$instance){
            $dbname = 'crash';
            $username = 'root';
            $password = 'root';

            self::$instance = new PDO('mysql:host=mysql;dbname=' . $dbname .
                ';charset=utf8mb4', $username, $password);
        }
        return self::$instance;
    }
}