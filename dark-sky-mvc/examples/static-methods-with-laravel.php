<?php

class VehicleModel extends Eloquent
{
  public function scopeLand($query)
  {
    return $query->where('type', 'land');
  }
}

class landVehiclesController extends Controller
{
  public function index()
  {
    $landVehicles = VehicleModel::land()->get();
  }
}
