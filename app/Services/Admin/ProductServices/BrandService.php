<?php 

namespace App\Services\Admin\ProductServices ;

use App\Models\Admin\Products\brand;
use App\Models\Admin\Products\Category;
use App\Models\Admin\Products\Product;
use Illuminate\Support\Facades\DB;

class BrandService {

    public function index($request) {

        if( $request->filled('BrandName') ) {

            $Brands = brand::where('BrandName', 'like' , '%' . $request->BrandName . '%')->get();

        }else {

            $Brands = brand::get();
            
        }

        return $Brands ;

    }

    public function create($request) {

        brand::create([
            'BrandName'   =>  $request['BrandName'],
            'BrandLogo'   =>  $request['path'],
        ]);
    } 

    public function update($request , $id) {

        brand::where('BrandId', $id)->update([
            'BrandName' => $request['BrandName'],
            'BrandLogo' => $request['path'],
        ]);
    }


    public function delete($id) {

        DB::transaction(function () use ($id) {

            Product::whereIn('CategoryId', function ($query) 
                use ($id) {
                    $query ->select('CategoryId')
                           ->from('category')
                           ->where('BrandId', $id);
                }
                    )->delete() ;

            Category::where('BrandId', $id)->delete();

            brand::whereKey($id)->delete();
        });
           
    }
}