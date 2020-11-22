<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Http\Requests\CreateCarRequest;
use App\Models\Car\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function create(CreateCarRequest $request)
    {
        $data = $request->all();
        $car = new Car([
            "id" => $data['uid'],
            "email" => $data['email'],
            "phone" => $data['phone'],
            "first_name" => $data['first_name'],
            "middle_name" => $data['middle_name'],
            "last_name" => $data['last_name'],
            "capacity" => $data['capacity'],
            "car_class_id" => $data['car_class_id'],
            "note" => $data['note'],
            "accepts_rides" => $data['accepts_rides'],
            "on_the_ride" => $data['on_the_ride'],
            "car_status_id" => $data['car_status_id'],
            "coord_latitude" => $data['coord_latitude'],
            "coord_longitude" => $data['coord_longitude'],
        ]);
        $car->save();

        return $car;
    }

    public function update(UpdateCarRequest $request, $id)
    {
        $data = $request->all();
        $car = Car::find($id);

        $car->email = $data['email'];
        $car->first_name = $data['first_name'];
        $car->middle_name = $data['middle_name'];
        $car->last_name = $data['last_name'];
        $car->phone = $data['phone'];
        $car->capacity = $data['capacity'];
        $car->car_class_id = $data['car_class_id'];
        $car->note = $data['note'];
        $car->accepts_rides = $data['accepts_rides'];
        $car->on_the_ride = $data['on_the_ride'];
        $car->car_status_id = $data['car_status_id'];
        $car->coord_latitude = $data['coord_latitude'];
        $car->coord_longitude = $data['coord_longitude'];

        $car->save();

        return $car;
    }

    public function show(Request $request, $id)
    {
        return Car::find($id);
    }

    public function delete(Request $request, $id)
    {
        Car::destroy($id);
    }
}
