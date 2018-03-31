<?php

namespace App\Http\Controllers;

use App\Location;
use Mapper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
        $showMap = Mapper::map(-6.175367966166508,106.82699570410159,['zoom' => 12,]);
        // $listMarkers    =   Location::select('latitude','longitude')->get();
        $dataLocations    =   Location::all();
        foreach ($dataLocations as $dataLocation) {
            Mapper::informationWindow($dataLocation->latitude,$dataLocation->longitude,
                '<div class="content">
                    <div class="header">
                        <h3>'.$dataLocation->name.'</h3>
                    </div>
                    <div class="address">
                        Alamat :'.$dataLocation->address.'
                    </div>
                    <div class="description">
                        Deskripsi :'.$dataLocation->description.'
                    </div>
                </div>');   
        }
        // Mapper::map(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDragEnd' => 'console.log(event.latLng.lat()); console.log(event.latLng.lng());']);
    	return view('layout.master');
    }
}
