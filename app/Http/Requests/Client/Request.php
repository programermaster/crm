<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
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

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required_without:phone', 'string', 'max:255'],
            'phone' => ['required_without:email', 'numeric'],
            "amount" =>" nullable|regex:/^\d+(\.\d{1,2})?$/",
            "down_payment_amount" =>"nullable|regex:/^\d+(\.\d{1,2})?$/",
            "property_value" =>" nullable|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Title is Must',
            'last_name.required' => 'Last name is Must',
            'email.required' => 'Email is Must',
            'phone.required' => 'Phone is Must',
        ];
    }
}
