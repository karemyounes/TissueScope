<?php 

namespace App\Services\ProductServices ;

use App\Models\Products\brand;

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

        $ImagePath = $request['path'];

        brand::create([
            'BrandName'   =>  $request['BrandName'],
            'BrandLogo'  =>  $ImagePath,
        ]);
    } 

    public function update($request , $id) {
        $Brand = brand::find($id);

        $ImagePath = $request['path'];

        $Brand->update([
            'BrandName' => $request['BrandName'],
            'BrandLogo' => $ImagePath,
        ]);
    }


    public function delete($id) {

        $Brand = brand::find($id);
        $Brand->delete();
        
    }
}