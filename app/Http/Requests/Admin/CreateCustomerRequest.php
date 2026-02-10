<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'CustomerName'      => 'required|string',
            'CustomerPhone'     => 'required|string',
            'CustomerMail'      => 'required|email',
            'CustomerGender'    => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'CustomerName.required'      => 'Please Insert Customer Name',
            'CustomerName.String'        => 'The Customer Name Must Be String',

            'CustomerPhone.required'     => 'Please Enter Customer Phone Number',
            'CustomerPhone.String'       => 'The Customer Phone Must Be String',

            'CustomerMail.required'      => 'Please Enter Customer Mail',
            'CustomerMail.email'         => 'The Customer Mail Must Be Email',

            'CustomerGender.required'    => 'Please Enter Customer Gender',
            'CustomerGender.boolean'     => 'The Customer Gender Must Be Boolean'
        ];
    }
}
