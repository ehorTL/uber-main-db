<?php

namespace App\Http\Requests\Trip;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTripRequest extends FormRequest
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
            'client_id' => 'required',
            'driver_id' => 'required',
            'from_location' => 'required',
            'to_location' => 'required',
            'from_timestamp' => 'required',
            'to_timestamp' => 'required',
            'status' => 'present',
            'distance' => 'required',
            'price' => 'required'
        ];
    }
}
