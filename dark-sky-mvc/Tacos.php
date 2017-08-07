<?php
class Tacos
{
    private $getURL = 'http://taco-randomizer.herokuapp.com/random/';

    public function getKeys() {
        $curl = curl_init($this->getURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        curl_close($curl);

//        foreach ($resp as $key => $value) {
//            var_dump($value);
//        }
        return $resp;

    }
}