<?php 

namespace App\Services\ProductServices;

use App\Models\Products\Product ;


class ProductService {

    public function Search($request) {
        // make variable to hold retrieved data
        $Products = Product::with('Category');   
    
        // check if there is Product Name Request
        if ( $request -> filled('ProductName') )
            {
                $Products = $Products->where('ProductName' ,'like' ,'%' . $request->ProductName . '%') ;
            } 

        // check if there is Category Name Request    
        if ( $request->filled('CategoryName') )  
            {
                $Products = $Products->where('ProductName', 'like' ,'%' . $request->ProductName . '%') ;
            }

        // check if there is Barcode Request
        if ( $request->filled('Barcode') )  
            {
                $Products = $Products->where('Barcode', 'like' ,'%' . $request->Barcode . '%') ;
            }

        // check if there is Starting Price Request
        if ( $request->filled('StartingPrice') )  
            {
                $Products = $Products->where('SellingPrice', '>=' , $request->StartingPrice) ;
                                    
            }

        // check if there is Ending Price Request
        if ( $request->filled('EndingPrice') )  
            {
                $Products = $Products->where('SellingPrice', '<=' , $request->EndingPrice) ;
            }

        $Products = $Products -> get();

        return $Products;
    }

    public function index($request) {
        if ( count($request -> all()) == 0 )
            {
                $Products = Product::with('Category:CategoryId,CategoryName')->get();
            }
        else {
                $Products = $this->Search($request);
            }

        return $Products;
    }

    public function create($request) {
        
        $ImagePath = $request['path'] ; 

        Product::create([
            'CategoryId'    => $request['CategoryId'],
            'ProductName'   => $request['ProductName'],
            'Description'   => $request['Description'],
            'BuyingPrice'   => $request['BuyingPrice'],
            'SellingPrice'  => $request['SellingPrice'],
            'Barcode'       => $request['Barcode'], 
            'ProductImage'  => $ImagePath,
        ]);
    }



    public function update($request , $id) {

        $Product = Product::find($id);

        $ImagePath = $request['path'];

        $Product->update([
            'CategoryId'    => $request['CategoryId'],
            'ProductName'   => $request['ProductName'],
            'Description'   => $request['Description'],
            'BuyingPrice'   => $request['BuyingPrice'],
            'SellingPrice'  => $request['SellingPrice'],
            'Barcode'       => $request['Barcode'],
            'ProductImage'  => $ImagePath,
        ]);
        
    }



    public function delete($id) {
        $Product = Product::find($id);
        $Product->delete();
    }

}