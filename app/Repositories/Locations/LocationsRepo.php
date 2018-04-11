<?php

namespace App\Repositories\Locations;

use App\Location;


class LocationsRepo implements LocationsInterfaces
{
	protected $location;

	public function __construct(Location $location)
	{
		$this->location = $location;
	}

	public function createLocation (array $locationData)
	{
		return $this->location->create($locationData);
	}

	public function showLocation ()
	{
		return Location::all();
	}

	public function updateLocation ($id,array $locationData)
	{
		return $this->location->find($id)->update($locationData);
	}

	public function searchById ($id)
	{
		return Location::find($id);
	}

	public function showCategory()
	{
		return Category::all();
	}
}