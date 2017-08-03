<?php

namespace Test;

/**
 * Class AndiController is responsible to glue or DATA and REPRESENTATION layer together
 * @package Test
 */

class AndiController
{

    /**
     * Method to return all resources within the controller
     * @return mixed|string
     */
    public function index()
    {
        $andis = Andi::all();
        return View::render('index.template.php', ['andis' => $andis]);
    }

    /**
     * Method to return a single resource based on id
     * @param $id
     * @return mixed|string
     */
    public function show($id)
    {
        $andi = Andi::find($id);
        return View::render('show.template.php', ['andi' => $andi]);
    }

    /* create, read, update, delete, etc... */
}
