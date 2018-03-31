<?php

namespace App\Repositories\Locations;

interface LocationsInterfaces 
{
	public function createLocation(array $locationData);
	public function showLocation();
	public function updateLocation(array $locationData);
	public function deleteLocation();
}