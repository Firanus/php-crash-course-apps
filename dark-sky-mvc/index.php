<?php
    require_once 'Github.php';
    require_once 'Tacos.php';
    require_once 'DarkSkyController.php';
//    $GithubRequester = new GithubAccess('Firanus');
//    echo $GithubRequester->getKeys();
//    $Tacos = new Tacos();
//    echo $Tacos->getKeys();

$controller = new DarkSkyController();
//$controller->addWeatherToDB(51.5074, 0.1278);


require_once 'DarkSkyView.php';

