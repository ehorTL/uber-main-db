<?php

namespace App\Http\Requests\Trip;

use Illuminate\Foundation\Http\FormRequest;

class CreateTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'trip_id' => 'required',
            'client_id' => 'required',
            'driver_id' => 'required',

            'from_point' => 'required',
            'to_point' => 'required',

            'from_timestamp' => 'required',
            'to_timestamp' => 'required',
            'status' => 'present',
            'distance' => 'required',
            'price' => 'required'
        ];
    }
}
