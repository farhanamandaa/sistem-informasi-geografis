<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('home');

Route::get('/posts', 'PostsLocationController@index');

Route::post('/posts', 'PostsLocationController@store');

Route::get('/lists', 'LocationsListController@index')->name('lists');

Route::get('/update/{location}', 'PostsLocationController@show');

Route::post('/update/{location}', 'PostsLocationController@update');

Route::get('/delete/{location}', 'PostsLocationController@delete');


