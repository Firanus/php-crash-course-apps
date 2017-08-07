<?php
require_once 'DarkSkyModel.php';

class DarkSkyController
{
    private $secret = '20135d3aeca2dadf8086c80265025915';
    private $getURL = 'https://api.darksky.net/forecast/';
    private $darkSkyModel;

    public function __construct()
    {
        $this->darkSkyModel = new DarkSkyModel();
    }

    public function addWeatherToDB($latitude, $longitude){
        $curl = curl_init($this->getURL . $this->secret . '/' . $latitude . ',' . $longitude);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true
        ));
        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        $queryParams = (object) [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'summary' => $resp->currently->summary,
            'time' => $resp->currently->time
        ];

        $this->darkSkyModel->create($queryParams);
    }

    public function getWeatherTable(){
        return $this->darkSkyModel->read();
    }
}