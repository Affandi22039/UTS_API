<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'contact_id' => 'required|exists:contacts,id',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'contact_id.required' => 'The contact ID field is required.',
            'contact_id.exists' => 'The selected contact ID is invalid.',
            'address.required' => 'The address field is required.',
            'city.required' => 'The city field is required.',
            'country.required' => 'The country field is required.',
        ];
    }
}
