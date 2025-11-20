<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrand;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{

    // Start Get All Brands
    public function index(Request $request)
    {  
        if( $request->filled('BrandName') ) {

            $Brands = Brand::where('BrandName', 'like' , '%' . $request->BrandName . '%')->get();

        }else {

            $Brands = Brand::get();
            
        }
    
        return  view('Products.Brand.ShowBrands', compact('Brands'));
    }
    // End Get All Brands

    // Start Create Brand
    public function create() 
    {
        return view('Products.Brand.CreateBrand');
    }
    // End Create Brand

    // Start Store Stores
    public function store(StoreBrand $request)
    {   
        $req = $request->validated();

        $ImagePath = $req['BrandLogo']->store('Brands','public');

        $Brand = brand::create([
            'BrandName'   =>  $req['BrandName'],
            'BrandLogo'  =>  $ImagePath,
        ]);

        return redirect('brand');
    }
    // End Store Stores

    // Start Show Stores
    public function show($id)
    {
        $Brand = brand::find($id);

        return view('Products.Brand.ShowOneBrand',compact('Brand'));
    }
    // End Show Stores

    // Start Update Store
    public function update(StoreBrand $request, $id)
    {
        $req = $request->validated();

        $Brand = brand::find($id);

        $brand = $Brand->update([
            'BrandName' => $req['BrandName'],
            'BrandLogo' => $req['BrandLogo'],
        ]);

        return response()->json([
            'data' => $brand,
            'message' => 'the Brand Is Updated Successfully'
        ],200);
        
    }
    // End Update Store

    // Start Delete Store
    public function destroy($id)
    {
        $Brand = brand::find($id);
        $Brand->delete();

        return redirect('/brand');
    }
    // End Delete Store
}
