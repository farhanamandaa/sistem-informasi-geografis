<?php

namespace App\Http\Controllers;

use Mapper;
use App\Location;
use Illuminate\Http\Request;
use App\Repositories\Locations\LocationsRepo;
use App\Repositories\Categories\CategoriesRepo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LocationsRepo $location,CategoriesRepo $category,Request $request)
    {
        $this->middleware('auth')->except('index');
        $this->location =   $location;
        $this->category =   $category;
        $this->request  =   $request;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
        $showMap = Mapper::map(-6.175367966166508,106.82699570410159,['zoom' => 12,'cluster' => false,'eventAfterLoad' => 'initLegend(map);']);
        $informationWindow  = $this->setInformationWindow();
        $showCategory       = $this->category->showCategory();
        $showLocation       = $this->location->showLocation();
    	return view('layout.master', compact('showCategory','showLocation'));
    }

    private function setInformationWindow()
    {   
        if (empty($this->request->categories))
        {
            $dataLocations      =   $this->location->showLocation();
        }
        else
        {
            $dataLocations      =   $this->location->showLocationByCategory($this->request->categories);
        }
        foreach ($dataLocations as $dataLocation) {
            $options = array();

            if ($dataLocation->category_id == 1)
            {
                $options = ['icon' => 'storage/1.png']; 
            }
            elseif ($dataLocation->category_id == 2)
            {
                $options = ['icon' => 'storage/2.png']; 
            }
            else
            {
                $options = ['icon' => 'storage/3.png'];
            }
            
            Mapper::informationWindow($dataLocation->latitude,$dataLocation->longitude,
                '<div class="content">
                    <div class="header">
                        <h3>'.$dataLocation->name.'</h3>
                    </div>
                    <div class="address">
                        Alamat :'.$dataLocation->address.'
                    </div>
                    <div class="image">
                        <img src="'.$dataLocation->image.'" id="image"></img>
                    </div>
                    <div class="description">
                        Deskripsi :'.$dataLocation->description.'
                    </div>
                </div>',array_merge($options,['autoClose' => true])
            );
        }
        return $this;
    }

}

