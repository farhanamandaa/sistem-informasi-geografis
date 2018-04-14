<?php

namespace App\Http\Controllers;

use Mapper;
use App\Location;
use Illuminate\Http\Request;
use App\Repositories\Locations\LocationsRepo;
use App\Repositories\Categories\CategoriesRepo;

class PostsLocationController extends Controller
{
	protected $locations;
    const LATITUDE  = -6.175367966166508;
    const LONGITUDE = 106.82699570410159;

    public function __construct(LocationsRepo $locations, CategoriesRepo $category)
    {
    	$this->middleware('auth');
    	$this->locations    = $locations;
        $this->category     = $category;  
    }

    public function index()
    {
    	$showMap = Mapper::map(self::LATITUDE, self::LONGITUDE, ['zoom' => 12,'marker' => 'true' ,'draggable' => true, 'eventDragEnd' => 'setLatLngToForm(event);']);
        $categoryList   = $this->category->showCategory();
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
        $categoryList   = $this->category->showCategory();
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
