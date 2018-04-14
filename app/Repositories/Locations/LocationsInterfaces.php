<?php

namespace App\Repositories\Locations;

interface LocationsInterfaces 
{
	public function createLocation(array $locationData);
	public function showLocation();
	public function updateLocation($id,array $locationData);
	public function searchById($id);
	public function showLocationByCategory(array $id);
}