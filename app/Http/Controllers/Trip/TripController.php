<?php

namespace App\Http\Controllers\Trip;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trip\CreateTripRequest;
use App\Http\Requests\Trip\PatchTripRequest;
use App\Http\Requests\Trip\UpdateTripRequest;
use App\Models\Trip\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create(CreateTripRequest $request)
    {
        $data = $request->validated();
        $trip = new Trip([
            'id' => $data['trip_id'],
            'rider_id' => $data['client_id'],
            'car_id' => $data['driver_id'],
            'ride_from_timestamp' => $data['from_timestamp'],
            'ride_to_timestamp' => $data['to_timestamp'],
            'from_coord_latitude' => $data['from_location']['latitude'],
            'from_coord_longitude' => $data['from_location']['longitude'],
            'to_coord_latitude' => $data['to_location']['latitude'],
            'to_coord_longitude' => $data['to_location']['longitude'],
            // 'address_from' => $data[],
            // 'address_to' => $data[],
            'cost' => $data['price'],
            'distance' => $data['distance'],
        ]);
        $trip->save();

        return $trip;
    }

    public function show(Request $request, $id)
    {
        return Trip::find($id);
    }

    public function update(UpdateTripRequest $request, $id)
    {
        $data = $request->validated();
        $trip = new Trip([
            'rider_id' => $data['client_id'],
            'car_id' => $data['driver_id'],
            'ride_from_timestamp' => $data['from_timestamp'],
            'ride_to_timestamp' => $data['to_timestamp'],
            'from_coord_latitude' => $data['from_location']['latitude'],
            'from_coord_longitude' => $data['from_location']['longitude'],
            'to_coord_latitude' => $data['to_location']['latitude'],
            'to_coord_longitude' => $data['to_location']['longitude'],
            // 'address_from' => $data[],
            // 'address_to' => $data[],
            'cost' => $data['price'],
            'distance' => $data['distance'],
        ]);
        $trip->save();

        return $trip;        
    }

    public function change(Request $request, $id)
    {
        $data = $request->all();
        $trip = Trip::find($id);

        if (isset($data['client_id'])){
            $trip->rider_id = $data['client_id'];
        }
        if (isset($data['car_id'])){
            $trip->rider_id = $data['car_id'];
        }
        if (isset($data['from_timestamp'])){
            $trip->ride_from_timestamp = $data['from_timestamp'];
        }
        if (isset($data['to_timestamp'])){
            $trip->ride_to_timestamp = $data['to_timestamp'];
        }
        if (isset($data['from_location']['latitude'])){
            $trip->from_coord_latitude = $data['from_location']['latitude'];
        }
        if (isset($data['from_location']['longitude'])){
            $trip->from_coord_longitude = $data['from_location']['longitude'];
        }
        if (isset($data['to_location']['latitude'])){
            $trip->to_coord_latitude = $data['to_location']['latitude'];
        }
        if (isset($data['to_location']['longitude'])){
            $trip->to_coord_longitude = $data['to_location']['longitude'];
        }
        if (isset($data['price'])){
            $trip->cost = $data['price'];
        }
        if (isset($data['distancear_id'])){
            $trip->distance = $data['distance'];
        }        

        $trip->save();
        
        return $trip;
    }

    public function delete(Request $request, $id)
    {
        return Trip::destroy($id);

    }
}
