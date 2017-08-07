<?php

namespace DarkSkyBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DarkSkyControllerTest extends WebTestCase
{
    public function testGetallweather()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getAllWeather');
    }

}
