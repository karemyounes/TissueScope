<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Http\Controllers\Products\GetCategoriesFOrDropDownController;
use App\Services\ProductServices\ProductService;

class ProductController extends Controller
{

    protected ProductService $productService ;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService ;
    }

    // Start Get All Products
    public function index(Request $request)
    {   
        
        $Products = $this->productService->index($request) ;

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
        $this->productService->create($request->validated()) ;

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

    public function edit($id) {
        $Product = Product::find($id) ;

        $Categories = app(GetCategoriesFOrDropDownController::class)->GetCategory() ;

        return view('Products.Product.UpdateProduct', compact('Categories','Product'));
    }

    // Start Update Product
    public function update(StoreProductRequest $request, $id)
    {
        $this->productService->update($request->validated() , $id) ;

        return redirect()->route('product.index');
    }
    // End Update Product

    // Start Delete Product
    public function destroy($id)
    {
        $this->productService->delete($id);

        return redirect()->route('product.index');
    }
    // End Delete Product
}
