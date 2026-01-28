<?php

namespace App\Http\Requests;

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
            'CategoryId.required' =>'1',
            'CategoryId.integer' =>'2',
            'ProductName.required' => 'please insert Product Name',
            'ProductName.string' =>'3',
            'Description.string' =>'4',
            'Description.required' =>'5',
            'SellingPrice.required' =>'6',
            'SellingPrice.numeric' =>'7',
            'BuyingPrice.required' =>'8',
            'BuyingPrice.numeric' =>'9',
            'Barcode.required' =>'10',
            'Barcode.string' =>'11',
            'ProductImage.required' =>'12',
            'ProductImage.image' =>'13',
        ];
    }
}
