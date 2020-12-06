<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\JsonMapper;

class HelperController extends Controller
{
    public function reduce(Request $request)
    {
        $accepts_rides = JsonMapper::boolCast($request->query('accepts_rides'));
        $on_the_ride = JsonMapper::boolCast($request->query('on_the_ride')); //not used
        $capacity = intval($request->query('capacity'));
        $car_type = intval($request->query('car_type')); // == car_class_id
        $drivers_id = json_decode($request->getContent(), true);

        $reduced_card = [];
        // accepts any car class
        if ($car_type == 1) {
            $reduced_cars = DB::table('cars')->select('id')->whereIn('id', $drivers_id)
                ->where('capacity', '>=', $capacity)
                ->where('accepts_rides', $accepts_rides)
                ->where('on_the_ride', $on_the_ride)
                ->get();
        } else {
            $reduced_cars = DB::table('cars')->select('id')->whereIn('id', $drivers_id)
                ->where('capacity', '>=', $capacity)
                ->where('car_class_id', $car_type)
                ->where('accepts_rides', $accepts_rides)
                ->where('on_the_ride', $on_the_ride)
                ->get();
        }

        $ans = array();
        foreach ($reduced_cars as $car) {
            $ans[] = $car->id;
        }

        return $ans;
    }
}
