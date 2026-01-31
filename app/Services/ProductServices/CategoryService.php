<?php

namespace App\Services\ProductServices;

use App\Models\Products\Category;
use App\Models\Products\Product;
use Illuminate\Support\Facades\DB;

class CategoryService {

    public function index() {

        $Categories = Category::with('Brand')->get();

        return $Categories ;
    }

    public function create($request) {

        Category::create([
            'BrandId'           => $request['BrandId'],
            'CategoryName'      => $request['CategoryName'],
            'CategoryImage'     => $request['path'],
        ]);

    }

    public function update($request , $id) {

        Category::where('CategoryId' , $id)->update([
            'BrandId'           => $request['BrandId'],
            'CategoryName'      => $request['CategoryName'],
            'CategoryImage'     => $request['path'],
        ]);

    }

    public function delete($id) {

        DB::transaction(function () use ($id) {
            
            Product::where('CategoryId' , $id)->delete() ;

            Category::whereKey($id)->delete() ;

        });

    }

}