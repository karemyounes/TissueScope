<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetBrandsForDropDownController extends Controller
{
    public function GetBrands () 
    {
        $Brands = Brand::select('BrandId','BrandName')->get();

        return $Brands ;
    }
}