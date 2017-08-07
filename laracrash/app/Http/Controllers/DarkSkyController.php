<?php

namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;

class DarkSkyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weather = Weather::all();
        return view('weather', ['weather' => $weather]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secret = '20135d3aeca2dadf8086c80265025915';
        $getURL = 'https://api.darksky.net/forecast/';

        $latitude = 36.1408;
        $longitude = -5.3536;

        $curl = curl_init($getURL . $secret . '/' . $latitude . ',' . $longitude);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true
        ));
        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        $weather = new Weather();
        $weather->latitude = $latitude;
        $weather->longitude = $longitude;
        $weather->summary = $resp->currently->summary;
        $weather->time = $resp->currently->time;

        $weather->save();

        return redirect('/weather');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
