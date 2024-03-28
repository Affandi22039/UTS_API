<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'The address field is required.',
            'city.required' => 'The city field is required.',
            'country.required' => 'The country field is required.',
        ];
    }
}
