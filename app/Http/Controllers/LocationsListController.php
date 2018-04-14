<?php

namespace App\Http\Controllers;

use App\Repositories\Locations\LocationsRepo;
use Illuminate\Http\Request;

class LocationsListController extends Controller
{
	protected $location;

    public function __construct(LocationsRepo $location)
    {
    	$this->middleware('auth');
    	$this->location 	=	$location;
    }

    public function index ()
    {	
    	$locationsData	=	$this->location->showLocation();
    	// dd($locationData);
        return view('admin.locationsList', compact('locationsData'));
    }
}
