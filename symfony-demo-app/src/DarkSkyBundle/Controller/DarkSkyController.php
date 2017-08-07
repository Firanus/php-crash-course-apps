<?php

namespace DarkSkyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use DarkSkyBundle\Entity\Weather;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class DarkSkyController extends Controller
{
    private $secret = '20135d3aeca2dadf8086c80265025915';
    private $getURL = 'https://api.darksky.net/forecast/';
    /**
     * @Route("/getAllWeather")
     */
    public function getAllWeatherAction()
    {
        return $this->render('DarkSkyBundle:DarkSky:get_all_weather.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/createWeather")
     */
    public function createAction()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: createAction(EntityManagerInterface $em)
        $em = $this->getDoctrine()->getManager();
        $latitude = -36.8485;
        $longitude = 174.7633;

        $curl = curl_init($this->getURL . $this->secret . '/' . $latitude . ',' . $longitude);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true
        ));
        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        $weather = new Weather();
        $weather->setLatitude($latitude);
        $weather->setLongitude($longitude);
        $weather->setSummary($resp->currently->summary);
        $weather->setTime($resp->currently->time);

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($weather);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new weather with id '.$weather->getId());
    }

// if you have multiple entity managers, use the registry to fetch them
    public function editAction()
    {
//        $doctrine = $this->getDoctrine();
//        $em = $doctrine->getManager();
//        $em2 = $doctrine->getManager('other_connection');
    }

    /**
     * @Route("/showWeather/{weatherID}")
     */
    public function showAction($weatherID)
    {
        $weather = $this->getDoctrine()
            ->getRepository(Weather::class)
            ->find($weatherID);

        if (!$weather) {
            throw $this->createNotFoundException(
                'No product found for id '.$weatherID
            );
        }

        // ... do something, like pass the $product object into a template
        return $this->render('DarkSkyBundle:DarkSky:showWeather.html.twig', array('weather' => $weather));
    }

}
