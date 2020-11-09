<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car\CarClass;
use Illuminate\Http\Request;

class CarClassController extends Controller
{
    public function getClassesList(Request $request)
    {
        return CarClass::all();
    }
}
