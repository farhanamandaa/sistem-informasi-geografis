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
		return $this->location->all();
	}

	public function updateLocation ($id,array $locationData)
	{
		return $this->location->find($id)->update($locationData);
	}

	public function searchById ($id)
	{
		return $this->location->find($id);
	}

	public function showLocationByCategory(array $id)
	{
		return $this->location->whereIn('category_id',$id)->get();
	}
}