<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\Category;
use App\Http\Requests\StoreCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Products\GetBrandsForDropDownController;

class CategoryController extends Controller
{
    // Start Get All Categories
    public function index()
    {
        $Categories = Category::with('Brand')->get();

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

        $imagePath = $req['CategoryImage']->store('Categories', 'public');

        $Category = Category::create([
            'BrandId'           => $req['BrandId'],
            'CategoryName'      => $req['CategoryName'],
            'CategoryImage'     => $imagePath,
        ]);

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

    //  Start Update Category
    public function update(StoreCategory $request, $id)
    {
        $req = $request->validated();

        $Cat = Category::find($id);

        $imagePath = $req['CategoryImage']->store('posts', 'public');

        $Category = $Cat->update([
            'CategoryName'      => $Cat['CategoryName'],
            'CategoryImage'     => $Cat['CategoryImage'],
            'CategoryImage'     => $imagePath,
        ]);

        return response()->json([

            'data'      => $Category,
            'message'   => 'Category Created Successfully'

        ] , 200);
    }
    //  End Update Category

    //  Start Delete Category
    public function destroy( $id )
    {
        $Category = Category::find($id);
        $Category -> delete();

        return response()->json([

            'data'      => $Category,
            'message'   => 'Category Deleted Successfully'

        ] , 200);
    }
    //  End Delete Category
}
