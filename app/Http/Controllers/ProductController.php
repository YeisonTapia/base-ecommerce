<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {      
            $category = Category::find($request['category_id']);
               
            /* Validation if the category has subcategories */
            if(count($category->children) > 1){
                throw new Exception("The category $category->name has subcategories", 204);
            }
            $product = Product::create($request->all());
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        try {      
            $category = Category::find($request['category_id']);
               
            /* Validation if the category has subcategories */
            if(count($category->children) > 1){
                throw new Exception("The category $category->name has subcategories", 204);
            }
            $product->fill($request->all())->save();
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json($e);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json($product);
    }
}
