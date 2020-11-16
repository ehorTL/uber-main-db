<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarReduceRequest;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function reduce(CarReduceRequest $request)
    {
        $data = $request->all();
        // return where && && .... toarray
    }
}
