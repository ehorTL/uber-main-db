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
    }

    public function change(PatchTripRequest $request, $id)
    {
    }

    public function delete(Request $request, $id)
    {
        Trip::destroy($id);
    }
}
