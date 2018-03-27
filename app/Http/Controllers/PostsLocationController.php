<?php

namespace App\Http\Controllers;

use Mapper;
use Illuminate\Http\Request;

class PostsLocationController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	Mapper::map(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDragEnd' => 'setLatLng(event);']);
    	return view('admin.add');
    }
}
