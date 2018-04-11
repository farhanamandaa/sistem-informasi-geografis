<?php

namespace App\Http\Controllers;

use App\Location;
use App\Category;
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
    	$showMap = Mapper::map(-6.175367966166508, 106.82699570410159, ['zoom' => 12,'marker' => 'true' ,'draggable' => true, 'eventDragEnd' => 'setLatLngToForm(event);']);
        $categoryList   = Category::all();
    	return view('admin.add',compact('categoryList'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
    	$validatedData 	=	$request->validate([
    		'name'            =>	'required',
    		'address'         =>	'required',
    		'latitude'        =>	'required',
    		'longitude'       =>	'required',
            'image'           =>    'required', 
    		'description'     =>	'required',
            'category_id'     =>    'required'
    	]);

    	
    	$storeData		=	$this->locations->createLocation($request->all());

    	session()->flash('message','Success to post');
    	return redirect('/admin');
    }

    public function show(Location $location)
    {   
        $showMap        = Mapper::map($location->latitude, $location->longitude, ['zoom' => 12,'marker' => 'true' ,'draggable' => true, 'eventDragEnd' => 'setLatLngToForm(event);']);
        $categoryList   = Category::all();
        return view('admin.updateLocation', compact('location','categoryList'));
    }

    public function update(Request $request,$id)
    {   
        // dd($request->all());
        $validatedData  =   $request->validate([
            'name'            =>    'required',
            'address'         =>    'required',
            'latitude'        =>    'required',
            'longitude'       =>    'required',
            'image'           =>    'required', 
            'description'     =>    'required',
            'category_id'     =>    'required'
        ]);

        // $updatedData = $this->locations->updateLocation($validatedData);
        $updatedData = $this->locations->updateLocation($id,$validatedData);
        session()->flash('message','Success to update location');
        return redirect('/admin');
    }

    public function delete($id)
    {
        $locationData = $this->locations->searchById($id);
        $deleteData = $locationData->delete();
        session()->flash('message','Success to delete location');
        return redirect('/admin');
    }
}
