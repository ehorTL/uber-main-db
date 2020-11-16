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
            'email' => 'required|email',
            'uid' => 'required',
            'first_name' => 'present',
            'middle_name' => 'present',
            'last_name' => 'present',
            'phone' => 'present',
            'capacity' => 'present',
            'car_class_id' => 'present',
            'note' => 'present'
        ];
    }
}
