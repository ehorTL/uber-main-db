<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
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
        ]);
        $car->save();

        return $car;
    }

    public function update(Request $request, $id)
    {
    }

    public function show(Request $request, $id)
    {
        return Car::find($id);
    }
}
