<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
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
            'uid' => 'required',
            'email' => 'required|email',
            'first_name' => 'present',
            'middle_name' => 'present',
            'last_name' => 'present',
            'phone' => 'present',
            'capacity' => 'present',
            'accepts_rides' => 'present',
            'on_the_ride' => 'present',
            'car_class_id' => 'present',
            'note' => 'present',
            'car_status_id' => 'present',
            'coord_latitude' => 'present',
            'coord_longitude' => 'present',
        ];
    }
}
