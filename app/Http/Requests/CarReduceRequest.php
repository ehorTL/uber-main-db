<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarReduceRequest extends FormRequest
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
            'cars_uid' => 'required|array',
            'capacity' => 'present',
            'car_class_id' => 'present',
            'accept_rides' => 'present'
        ];
    }
}
