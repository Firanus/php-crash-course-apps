<?php
class GithubAccess
{
    private $getURL = 'https://api.github.com/users/';
    private $user;

    public function __construct($name) {
        $this->user = $name;
    }

    public function getKeys() {
        $curl = curl_init($this->getURL . $this->user . '/keys');
        curl_setopt_array($curl, array(
            CURLOPT_USERAGENT => 'PHP-Demo-App',
            CURLOPT_RETURNTRANSFER => true
        ));
        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        $keys = [];
        foreach ($resp as $value) {
            array_push($keys, $value->id);
        }
        return $keys;
    }
}