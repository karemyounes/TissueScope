<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ControlUploadedImages extends Controller
{

    public function SaveImages(Request $request) {

        $store = $request['image']->store($request['path'],'public');

        return response()->json($store);
    }

    public function DeleteImages(Request $request) {

        $delete = Storage::disk('public')->delete($request['path']);

        return $delete ;

    }

}