<?php

/**
 * COMPOSER psr-4 autoload classes being used in the project.
 * Note that every time you change the composer.json file you have to run `composer dump-autoload` to refresh cache
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Tell the program to use the AndiController class within the Test workspace
 */
use Test\AndiController;

/**
 * Instantiate the AndiController
 */
$controller = new AndiController();

/**
 * Display the response from the controller which is evidently the template
 */
echo $controller->show(1);
