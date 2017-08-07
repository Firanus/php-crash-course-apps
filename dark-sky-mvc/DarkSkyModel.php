<?php
require_once 'DatabaseConnection.php';

class DarkSkyModel
{
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = DatabaseConnection::getConnection();
    }

    public function create($params){
        $stmt = $this->dbConnection->prepare('
            INSERT INTO Weather (latitude, longitude, summary, `time`)  
            VALUES (:latitude, :longitude, :summary, :time );');

        //TODO Extract this into a seperate query factory
        $stmt = $this->bindParams($stmt, $params);
        $stmt->execute();
    }

    public function read(){
        $stmt = $this->dbConnection->prepare('SELECT * FROM Weather');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($params){
        $stmt = $this->dbConnection->prepare('
            UPDATE Weather 
            SET latitude = :latitude, longitude = :longitude, summary = :summart, `time` = :time)  
            WHERE id = :id;'
        );

        $stmt = $this->bindParams($stmt, $params);
        $stmt->execute();
    }
    public function delete($id){
        $stmt = $this->dbConnection->prepare('
            DELETE FROM Weather WHERE id = :id;'
        );

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    private function bindParams($query, $params){
        if($params->id) $query->bindParam(':id', $params->id, PDO::PARAM_INT);
        if($params->latitude) $query->bindParam(':latitude', $params->latitude, PDO::PARAM_STR);
        if($params->longitude) $query->bindParam(':longitude', $params->longitude, PDO::PARAM_STR);
        if($params->summary) $query->bindParam(':summary', $params->summary, PDO::PARAM_STR);
        if($params->time) $query->bindParam(':time', $params->time, PDO::PARAM_INT);

        return $query;
    }
}