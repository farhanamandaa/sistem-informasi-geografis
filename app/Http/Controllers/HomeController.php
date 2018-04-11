<?php

namespace App\Http\Controllers;

use App\Location;
use Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $showMap = Mapper::map(-6.175367966166508,106.82699570410159,['zoom' => 12,'cluster' => false]);
        $informationWindow = $this->setInformationWindow();
    	return view('layout.master');
    }

    private function setInformationWindow()
    {
        $dataLocations    =   Location::all();
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
                    <div class="description">
                        Deskripsi :'.$dataLocation->description.'
                    </div>
                </div>',$options
            );
        }
        return $this;
    }

}

