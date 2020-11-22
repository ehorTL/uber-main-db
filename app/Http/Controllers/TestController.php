<?php

namespace App\Http\Controllers;

use App\Models\Car\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function test()
    {
        return DB::table('cars')->select('id')->where('email', '=', 'hello@test.test')->get();
        // $car = new Car([
        //     "id" => "2UJoDWbQhEZiAlUtwfLclaQMti22",
        //     "email" => "hello@test.test",
        //     "phone" => "+380987654321",
        //     "first_name" => "John",
        //     "middle_name" => "Bryan",
        //     "last_name" => "Johnson",
        //     "capacity" => 5,
        //     "accepts_rides" => false,
        //     "on_the_ride" => true,
        //     "car_class_id" => 1,
        //     "note" => "my car is super",
        // ]);        
        // $car->save();

        return Car::all();
    }
}
