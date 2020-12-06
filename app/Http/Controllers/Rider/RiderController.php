<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRiderRequest;
use App\Http\Requests\Rider\UpdateRiderRequest;
use App\Models\Rider\Rider;
use App\Models\Trip\Trip;
use Illuminate\Http\Request;
use App\Services\JsonMapper;

class RiderController extends Controller
{
    public function create(CreateRiderRequest $request)
    {
        $data = $request->validated();
        $rider = new Rider([
            'email' => $data['email'],
            'id' => $data['uid'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone']
        ]);
        $rider->save();

        return $rider;
    }

    public function update(UpdateRiderRequest $request, $id)
    {
        $data = $request->all();
        $rider = Rider::find($id);
        if (!$rider) {
            return response('Not found', 404);
        }

        $rider->email = $data['email'];
        $rider->phone = $data['phone'];
        $rider->first_name = $data['first_name'];
        $rider->middle_name = $data['middle_name'];
        $rider->last_name = $data['last_name'];

        $rider->save();

        return $rider;
    }

    public function show(Request $request, $id)
    {
        $rider = Rider::find($id);
        if ($rider) {
            return response()->json($rider);
        } else {
            return response('Not found', 404);
        }
    }

    public function delete(Request $request, $id)
    {
        $wasDeleted = Rider::destroy($id);
        if ($wasDeleted) {
            return response()->json(['Status' => 'deleted']);
        } else {
            return response('Not found', 404);
        }
    }

    public function showTrips($rider_id)
    {
        $trips = Trip::where('rider_id', '=', $rider_id)->get();
        $ans = array();

        foreach ($trips as $trip) {
            $ans = JsonMapper::tripFromDBToJson($trip);
        }
        return $ans;
    }
}
