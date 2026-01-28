<?php

namespace App\Services\ProductServices;

use App\Models\Products\Category;

class CategoryService {

    public function index() {

        $Categories = Category::with('Brand')->get();

        return $Categories ;
    }

    public function create($request) {
        
        $imagePath = $request['path'];

        Category::create([
            'BrandId'           => $request['BrandId'],
            'CategoryName'      => $request['CategoryName'],
            'CategoryImage'     => $imagePath,
        ]);

    }

    public function update($request , $id) {

        $Cat = Category::find($id);

        $imagePath = $request['path'];

        $Cat->update([
            'BrandId'           => $request['BrandId'],
            'CategoryName'      => $request['CategoryName'],
            'CategoryImage'     => $imagePath,
        ]);

    }

    public function delete($id) {

        $Category = Category::find($id);
        $Category -> delete();

    }

}