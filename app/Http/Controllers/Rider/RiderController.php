<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRiderRequest;
use App\Http\Requests\Rider\UpdateRiderRequest;
use App\Models\Rider\Rider;
use App\Models\Trip\Trip;
use Illuminate\Http\Request;

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
        return Rider::find($id);
    }

    public function delete(Request $request, $id)
    {
        Rider::destroy($id);
    }

    public function showTrips($rider_id)
    {
        return Trip::where('rider_id', '=', $rider_id)->get();
    }
}
