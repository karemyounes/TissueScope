<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Http\Controllers\Products\GetCategoriesFOrDropDownController;

class ProductController extends Controller
{
    // Start Get All Products
    public function index(Request $request)
    {   

        // check if there is requests
        if ( count($request -> all()) == 0 )
            {
                $Products = Product::get();
            }
        else {
                // make variable to hold retrieved data
                $Products = Product::query();   
            
                // check if there is Product Name Request
                if ( $request -> filled('ProductName') )
                    {
                        $Products = $Products->where('ProductName' ,'like' ,'%' . $request->ProductName . '%') ;
                    } 

                // check if there is Category Name Request    
                if ( $request->filled('CategoryName') )  
                    {
                        $Products = $Products->where('ProductName', 'like' ,'%' . $request->ProductName . '%');
                    }

                // check if there is Barcode Request
                if ( $request->filled('Barcode') )  
                    {
                        $Products = $Products->where('Barcode', 'like' ,'%' . $request->Barcode . '%');
                    }

                // check if there is Starting Price Request
                if ( $request->filled('StartingPrice') )  
                    {
                        $Products = $Products->where('SellingPrice', '>=' , $request->StartingPrice) 
                                           ;
                                            
                    }

                // check if there is Ending Price Request
                if ( $request->filled('EndingPrice') )  
                    {
                        $Products = $Products->where('SellingPrice', '<=' , $request->EndingPrice)
                                            ;
                    }

                $Products = $Products -> get();

            }
        
        

        return view('Products.Product.ShowProducts',compact('Products'));
        
    }
    // End Get All Products

    public function create() {

        $Categories = app(GetCategoriesFOrDropDownController::class)->GetCategory() ;

        return view('Products.Product.CreateProduct', compact('Categories'));

    }

    // Start Store Product
    public function store(StoreProductRequest $request)
    {
        $req = $request->validated();

        $ImagePath = $req['ProductImage']->store('Products','public');

        $Products = Product::create([
            'CategoryId'    => $req['CategoryId'],
            'ProductName'   => $req['ProductName'],
            'Description'   => $req['Description'],
            'BuyingPrice'   => $req['BuyingPrice'],
            'SellingPrice'  => $req['SellingPrice'],
            'Barcode'       => $req['Barcode'], 
            'ProductImage'  => $ImagePath,
        ]);

        return redirect('/product');

    }
    // End Store Product

    // Start Show Product
    public function show($id)
    {
        $Product = Product::with('Category')->where('ProductId',$id)->first();

        return view('Products.Product.ShowOneProduct',compact('Product'));
    }
    // End Show Product

    // Start Update Product
    public function update(Request $request, $id)
    {
        $req = $request->validated();

        $Product = Product::find($id);

        $ImagePath = $req['ProductImage']->store('Products','public');

        $Products = $Product->update([
            'CategoryId'    => $req['CategoryId'],
            'ProductName'   => $req['ProductName'],
            'Description'   => $req['Description'],
            'BuyingPrice'   => $req['BuyingPrice'],
            'SellingPrice'  => $req['SellingPrice'],
            'Barcode'       => $req['Barcode'],
            'ProductImage'  => $ImagePath,
        ]);

        return response()->json([
            'data'      => $Products,
            'message'   => 'Product Updated Successfully'
        ], 200);
    }
    // End Update Product

    // Start Delete Product
    public function destroy($id)
    {
        $Product = Product::find($id);
        $Product->delete();

        return redirect()->route('product.index');
    }
    // End Delete Product
}
