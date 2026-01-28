<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrand;
use App\Http\Controllers\Controller;
use App\Services\ProductServices\BrandService;

class BrandController extends Controller
{

    protected BrandService $brandService;

    public function __construct( BrandService $brandService )
    {
        $this->brandService = $brandService ;
    }

    // Start Get All Brands
    public function index(Request $request)
    {  
        $Brands = $this->brandService->index($request);
    
        return  view('Products.Brand.ShowBrands', compact('Brands'));
    }
    // End Get All Brands

    // Start Create Brand
    public function create() 
    {
        return view('Products.Brand.CreateBrand');
    }
    // End Create Brand

    // Start Store Brands
    public function store(StoreBrand $request)
    {   
        $req = $request->validated();

        $this->brandService->create($req);

        return redirect('brand');
    }
    // End Store Brands

    // Start Show Brands
    public function show($id)
    {
        $Brand = brand::find($id);

        return view('Products.Brand.ShowOneBrand',compact('Brand'));
    }
    // End Show Brands

    public function edit($id) {

        $Brand = brand::find($id);

        return view('Products.Brand.EditBrand',compact('Brand'));
    }

    // Start Update Brands
    public function update(StoreBrand $request, $id)
    {
        $this->brandService->update($request->validated() , $id) ;

        return redirect()->route('brand.index');
        
    }
    // End Update Brands

    // Start Delete Brands
    public function destroy($id)
    {
        $this->brandService->delete($id) ;

        return redirect('/brand');
    }
    // End Delete Brands
}
