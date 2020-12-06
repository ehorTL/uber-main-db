<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarReduceRequest;
use Illuminate\Support\Facades\DB;

class HelperController extends Controller
{
    public function reduce(CarReduceRequest $request)
    {
        $data = $request->validated();

        // accepts any car class
        if ($data['car_class_id'] == 1) {
            return DB::table('cars')->select('id')->whereIn('id', $data['cars_uid'])
                ->where('capacity', '>=', $data['capacity'])
                ->where('accept_rides', $data['accept_rides']) //true
                ->get();
        } else {
            return DB::table('cars')->select('id')->whereIn('id', $data['cars_uid'])
                ->where('capacity', '>=', $data['capacity'])
                ->where('car_class_id', $data['car_class_id'])
                ->where('accept_rides', $data['accept_rides']) //true
                ->get();
        }
    }
}
