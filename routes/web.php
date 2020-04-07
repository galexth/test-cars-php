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

Route::any('car/', 'CarController@index');
Route::any('car/place', 'CarController@place');
Route::any('car/move', 'CarController@move');
Route::any('car/left', 'CarController@left');
Route::any('car/right', 'CarController@right');
