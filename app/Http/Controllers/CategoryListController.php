<?php

namespace App\Http\Controllers;

use App\Category;
use App\Repositories\Categories\CategoriesRepo;
use Illuminate\Http\Request;

class CategoryListController extends Controller
{
    protected $location;

    public function __construct(CategoriesRepo $repo)
    {
    	$this->middleware('auth');
    	$this->repo 	=	$repo;
    }

    public function index ()
    {
    	$categoriesData	=	$this->repo->showCategory();
    	return view('admin.categoriesList', compact('categoriesData'));
    }

    public function store(Request $request)
    {
        $validatedData  =   $request->validate(['name'  =>  'required']);
        $storeData      =   $this->repo->createCategory($validatedData);

        session()->flash('message','Success to post');
        return redirect('/categories');
    }
}
