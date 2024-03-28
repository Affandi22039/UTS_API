<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
   
    public function authorize()
        {
            return true;
        }
    
        public function rules()
        {
            return [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:contacts,email',
                'phone' => 'required|string|max:20',
                'user_id' => 'required|exists:users,id'
            ];
        }
}
