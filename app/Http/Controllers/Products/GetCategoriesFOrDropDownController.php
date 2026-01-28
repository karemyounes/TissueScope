<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetCategoriesFOrDropDownController extends Controller
{
    public function GetCategory () 
    {
        $Categories = Category::select('CategoryId','CategoryName')->get();

        return $Categories ;
    }
}