<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\Category;
use App\Http\Requests\StoreCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Products\GetBrandsForDropDownController;
use App\Services\ProductServices\CategoryService;

class CategoryController extends Controller
{

    protected CategoryService $categoryService ;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService ; 
    }

    // Start Get All Categories
    public function index()
    {
        $Categories = $this->categoryService->index();

        return view('Products.Category.ShowCategory', compact('Categories'));
    }
    // End Of All Categories

    public function create() 
    {
        $Brands = app(GetBrandsForDropDownController::class)->GetBrands();
        
        return view('Products.Category.CreateCategory', compact('Brands'));
    }

    // Start Store Category
    public function store(StoreCategory $request)
    {
        $req = $request->validated();

        $this->categoryService->create($req) ;

        return redirect('category');
    }
    // End Store Category

    // Start Show Category
    public function show($id)
    {
        $Category = Category::find($id);

        return view('Products.Category.ShowOneCategory',compact('Category'));
    }
    // End Show Category

    public function edit($id) {
        $Category = Category::find($id) ;
        $Brands = app(GetBrandsForDropDownController::class)->GetBrands();
        return view('Products.Category.UpdateCategory', compact('Brands','Category'));
    }

    //  Start Update Category
    public function update(StoreCategory $request, $id)
    {
        $this->categoryService->update( $request->validated() , $id );

        return redirect()->route('category.index') ;
    }
    //  End Update Category

    //  Start Delete Category
    public function destroy( $id )
    {
        $this->categoryService->delete($id) ;

        return redirect('/category');
    }
    //  End Delete Category
}
