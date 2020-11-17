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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', 'TestController@test');
Route::get('car_classes', 'Car\CarClassController@getClassesList');

Route::prefix('front')->group(function () {
    Route::post('rider', 'Rider\RiderController@create');
    Route::get('rider/{id}', 'Rider\RiderController@show');
    Route::put('rider/{id}', 'Rider\RiderController@update');

    Route::post('car', 'Car\CarController@create');
    Route::get('car/{id}', 'Car\CarController@show');
    Route::put('car/{id}', 'Car\CarController@update');
});

Route::prefix('services')->group(function () {
    Route::post('helper/reduce', 'Service\HelperController@reduce');

    Route::post('trip', 'Trip\TripController@create');
    Route::get('trip/{id}', 'Trip\TripController@show');
    Route::put('trip/{id}', 'Trip\TripController@update');
});
