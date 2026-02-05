<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'CategoryId'    => 'required|integer',
            'ProductName'   => 'required|string',
            'Description'   => 'required|string',
            'path'          => 'required|string',
            'SellingPrice'  => 'required|numeric',
            'BuyingPrice'   => 'required|numeric',
            'Barcode'       => 'required|string',
            'ProductImage'  => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages() {
        return [
            'CategoryId.required'       => 'You Must Select Category',
            'CategoryId.integer'        => 'The Category Must Be Number',

            'ProductName.required'      => 'please insert Product Name',
            'ProductName.string'        => 'The Product Name Must Be String',

            'Description.required'      => 'Please Enter Description For The Product',
            'Description.string'        => 'The Product Description Must Be String',

            'SellingPrice.required'     => 'You Must Enter Selling Price',
            'SellingPrice.numeric'      => 'The Product Selling Price Must Be Number',

            'BuyingPrice.required'      => 'You Must Enter Buying Price',
            'BuyingPrice.numeric'       => 'The Product Buying Price Must Be Integer',

            'Barcode.required'          => 'You Must Enter The Product Barcode',

            'path.required'             => 'You Must Select Image For The Product',
        ];
    }
}
