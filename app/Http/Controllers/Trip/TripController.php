<?php

namespace App\Http\Controllers\Trip;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trip\CreateTripRequest;
use App\Http\Requests\Trip\UpdateTripRequest;
use App\Models\Trip\Trip;
use Illuminate\Http\Request;
use App\Services;
use App\Services\JsonMapper;

class TripController extends Controller
{
    public function create(CreateTripRequest $request)
    {
        $data = $request->validated();
        $trip = new Trip([
            'id' => $data['trip_id'],
            'rider_id' => $data['client_id'],
            'car_id' => $data['driver_id'],

            'from_coord_latitude' => $data['from_point']['location']['latitude'],
            'from_coord_longitude' => $data['from_point']['location']['longitude'],
            'to_coord_latitude' => $data['to_point']['location']['latitude'],
            'to_coord_longitude' => $data['to_point']['location']['longitude'],
            'address_from' => $data['from_point']['address']['address_full'],
            'address_to' => $data['to_point']['address']['address_full'],

            'ride_from_timestamp' => $data['from_timestamp'],
            'ride_to_timestamp' => $data['to_timestamp'],
            'price' => $data['price'],
            'distance' => $data['distance'],
            'status' => $data['status'],
        ]);
        $trip->save();

        return JsonMapper::tripFromDBToJson($trip);
    }

    public function show(Request $request, $id)
    {
        $trip = Trip::find($id);
        if ($trip) {
            $tripMapped = JsonMapper::tripFromDBToJson($trip);
            return response()->json($tripMapped);
        } else {
            return response('Not found', 404);
        }
    }

    public function update(UpdateTripRequest $request, $id)
    {
        $data = $request->validated();

        $trip = Trip::find($id);
        if (empty($trip)) {
            return response('Not found', 404);
        }

        $trip->rider_id = $data['client_id'];
        $trip->car_id = $data['driver_id'];
        $trip->from_coord_latitude = $data['from_point']['location']['latitude'];
        $trip->from_coord_longitude = $data['from_point']['location']['longitude'];
        $trip->to_coord_latitude = $data['to_point']['location']['latitude'];
        $trip->to_coord_longitude = $data['to_point']['location']['longitude'];
        $trip->address_from = $data['from_point']['address']['address_full'];
        $trip->address_to = $data['to_point']['address']['address_full'];

        $trip->ride_from_timestamp = $data['from_timestamp'];
        $trip->ride_to_timestamp = $data['to_timestamp'];
        $trip->price = $data['price'];
        $trip->distance = $data['distance'];
        $trip->status = $data['status'];

        $trip->save();

        return JsonMapper::tripFromDBToJson($trip);
    }

    public function change(Request $request, $id)
    {
        $data = $request->all();

        $trip = Trip::find($id);
        if (empty($trip)) {
            return response('Not found', 404);
        }

        if (isset($data['client_id'])) {
            $trip->rider_id = $data['client_id'];
        }
        if (isset($data['driver_id'])) {
            $trip->car_id = $data['driver_id'];
        }
        if (isset($data['from_timestamp'])) {
            $trip->ride_from_timestamp = $data['from_timestamp'];
        }
        if (isset($data['to_timestamp'])) {
            $trip->ride_to_timestamp = $data['to_timestamp'];
        }
        if (isset($data['from_point']['location']['latitude'])) {
            $trip->from_coord_latitude = $data['from_point']['location']['latitude'];
        }
        if (isset($data['from_point']['location']['longitude'])) {
            $trip->from_coord_longitude = $data['from_point']['location']['longitude'];
        }
        if (isset($data['to_point']['location']['latitude'])) {
            $trip->to_coord_latitude = $data['to_point']['location']['latitude'];
        }
        if (isset($data['to_point']['location']['longitude'])) {
            $trip->to_coord_longitude = $data['to_point']['location']['longitude'];
        }
        if (isset($data['from_point']['address']['address_full'])) {
            $trip->address_from = $data['from_point']['address']['address_full'];
        }
        if (isset($data['to_point']['address']['address_full'])) {
            $trip->address_to = $data['to_point']['address']['address_full'];
        }
        if (isset($data['price'])) {
            $trip->price = $data['price'];
        }
        if (isset($data['distance'])) {
            $trip->distance = $data['distance'];
        }
        if (isset($data['status'])) {
            $trip->status = $data['status'];
        }

        $trip->save();

        return JsonMapper::tripFromDBToJson($trip);
    }

    public function delete(Request $request, $id)
    {
        return Trip::destroy($id);
    }
}
