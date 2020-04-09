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

Route::get('car/', 'CarController@init');
Route::post('car/place', 'CarController@place');
Route::delete('car', 'CarController@reset');
Route::put('car/move', 'CarController@move');
Route::put('car/left', 'CarController@left');
Route::put('car/right', 'CarController@right');
