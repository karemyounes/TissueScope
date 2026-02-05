<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'BrandId'       => 'required|integer',
            'CategoryName'  => 'required|string',
            'CategoryImage' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg',
            'path'          => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'BrandId.required'       => 'Sry You Must Select Brand From Brands List',
            'BrandId.integer'        => 'Sry The Brand Id Must Be Integer',

            'CategoryName.required'  => 'You Must Enter Name For The Category',
            'CategoryName.string'    => 'The Category Name Must Be String',

            'path.required'          => 'You Must Select Image For Category'           
        ];
    }
}
