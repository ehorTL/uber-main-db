<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('car_classes', 'Car\CarClassController@getClassesList');
Route::prefix('front')->group(function () {
    Route::post('rider', 'Rider\RiderController@create');
    Route::get('rider/{id}', 'Rider\RiderController@show');
    Route::put('rider/{id}', 'Rider\RiderController@update');
    Route::patch('rider/{id}', 'Rider\RiderController@patch');
    Route::delete('rider/{id}', 'Rider\RiderController@delete');
    Route::get('rider/{id}/trips', 'Rider\RiderController@showTrips');

    // car = driver
    Route::post('car', 'Car\CarController@create');
    Route::get('car/{id}', 'Car\CarController@show');
    Route::put('car/{id}', 'Car\CarController@update');
    Route::patch('car/{id}', 'Car\CarController@change');
    Route::delete('car/{id}', 'Car\CarController@delete');
});

Route::prefix('services')->group(function () {
    Route::post('helper/reduce', 'Service\HelperController@reduce');

    Route::post('trip', 'Trip\TripController@create');
    Route::get('trip/{id}', 'Trip\TripController@show');
    Route::put('trip/{id}', 'Trip\TripController@update');
    Route::patch('trip/{id}', 'Trip\TripController@change');
    Route::delete('trip/{id}', 'Trip\TripController@delete');
});

Route::get('test', 'TestController@test');
