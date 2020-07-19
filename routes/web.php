<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('properties', 'PropertyController@index');
Route::any('properties/create', 'PropertyController@create');
Route::any('properties/edit', 'PropertyController@create');
Route::get('fetch-properties', function(){
	\Artisan::call('properties:fetch');
});
Route::delete('properties/delete', 'PropertyController@delete');
