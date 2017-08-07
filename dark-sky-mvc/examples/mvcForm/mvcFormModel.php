<?php
/**
 * Created by IntelliJ IDEA.
 * User: adaniilidis
 * Date: 26/07/2017
 * Time: 15:04
 */
class DataAccessClass
{
    private $conn;

    private $host;

    private $user;

    private $pass;

    function __construct($hostname, $username, $password)
    {
        $this->host = $hostname;
        $this->user = $username;
        $this->pass = $password;
        $this->connect_and_create_db($hostname, $username, $password);
    }

    private function connect_and_create_db($hostname, $username, $password)
    {
        try {
            $this->conn = new PDO("mysql:host=$hostname", $username, $password);

            // Create database
            $sql = "CREATE DATABASE IF NOT EXISTS myDB";
            $this->conn->exec($sql);

            $sql = "USE myDB";
            $this->conn->exec($sql);
            echo "Connected and created DB successfully";
        } catch (PDOException $e) {
            die("DB ERROR: " . $e->getMessage());
            }
    }

    public function create_table($tbl_name)
    {
        $sql = "CREATE TABLE IF NOT EXISTS $tbl_name (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                ssn VARCHAR(50)
              )";

        try {
            $this->conn->exec($sql);
            echo "Created table successfully";
            } catch (PDOException $e) {
                die("DB ERROR: " . $e->getMessage());
            }
    }

    public function put_data($name, $last, $ssn, $tbl)
    {
        $sql = "INSERT INTO $tbl (firstname, lastname, ssn)
                VALUES ('$name', '$last', '$ssn')";

        try {
            $this->conn->exec($sql);
            echo "Inserted data successfully";
        } catch (PDOException $e) {
            die("DB ERROR: " . $e->getMessage());
        }
    }

    public function get_data($name)
    {
        try {
            foreach($this->conn->query("SELECT id, firstname, lastname, ssn FROM my_data") as $row) {
                echo $row['id'].' '.$row['firstname'].' '.$row['lastname'].' '.$row['ssn'].'<br>';
            }
        } catch (PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }
    }
}
?>