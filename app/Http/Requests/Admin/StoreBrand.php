<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrand extends FormRequest
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
            'BrandName' => 'required|string|min:2|max:20',
            'BrandLogo' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg',
            'path'      => 'required|string'
        ];
    }

    public function messages() {
        return [
            'BrandName.required'        => 'Please Insert The Brand Name',
            'BrandName.string'          => 'The Brand Name Must Be String',
            'BrandName.min'             => 'The Brand Name Must Be At Least 2 Charcters',
            'BrandName.max'             => 'The Brand Name Must Be muximun 20 Charcters',
            'BrandName.regex'           => 'The Brand Name Must Be only Charcters And Numbers',
            
            'BrandLogo.required'        => 'Please Insert The Brand Logo',
            'BrandLogo.image'           => 'The Brand Logo Must Be only Image',
        ];
    }
}
