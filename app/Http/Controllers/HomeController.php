<?php

namespace App\Http\Controllers;

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
        Mapper::map(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDragEnd' => 'console.log(event.latLng.lat()); console.log(event.latLng.lng());']);
    	return view('layout.master');
    }
}
