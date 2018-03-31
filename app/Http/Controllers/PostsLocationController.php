<?php

namespace App\Http\Controllers;

use App\Location;
use Mapper;
use Illuminate\Http\Request;
use App\Repositories\Locations\LocationsRepo;

class PostsLocationController extends Controller
{
	protected $locations;

    public function __construct(LocationsRepo $locations)
    {
    	$this->middleware('auth');
    	$this->locations = $locations;
    }

    public function index()
    {
    	$showMap = Mapper::map(-6.175367966166508, 106.82699570410159, ['marker' => 'true' ,'draggable' => true, 'eventDragEnd' => 'setLatLngToForm(event);']);
    	return view('admin.add');
    }

    public function store(Request $request)
    {
    	$validatedData 	=	$request->validate([
    		'name'            =>	'required',
    		'address'         =>	'required',
    		'latitude'        =>	'required',
    		'longitude'       =>	'required',
            'image'           =>    'required', 
    		'description'     =>	'required'
    	]);

    	// dd($request->all());
    	$storeData		=	$this->locations->createLocation($request->all());
    	session()->flash('message','Success to post');
    	return redirect('/admin');
    }

    public function show(Location $location)
    {   
        $showMap = Mapper::map(-6.175367966166508, 106.82699570410159, ['marker' => 'true' ,'draggable' => true, 'eventDragEnd' => 'setLatLngToForm(event);']);
        return view('admin.updateLocation', compact('location'));
    }

    public function update(Request $request,Location $location)
    {
        $updatedData = $this->locations->updateLocation($request->all());
        session()->flash('message','Success to update location');
        return redirect('/admin');
    }

    public function delete($id)
    {
        $data = Location::where('id',$id);
        $deleteData = $data->delete();
        session()->flash('message','Success to delete location');
        return redirect('/admin');
    }
}
