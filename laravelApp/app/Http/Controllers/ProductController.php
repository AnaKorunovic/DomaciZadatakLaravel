<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProductController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return new ProductCollection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Product::truncate();
        Product::factory()->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            
            'name'=>'required|string|max:255',
            'slug'=>'required|string|max:100',
            'description'=>'required|string',
            'price'=>'required',
            'brand_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $product=Product::create([
            
            
            'name'=>$request->name,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'price'=>$request->price,
            'brand_id'=>$request->brand_id,
            'user_id'=>7
        ]);
        return response()->json(['Product is created',
        new ProductResource($product)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator=Validator::make($request->all(),[
            'brand_id'=>'required',
            
            
            'name'=>'required|string|max:255',
            'slug'=>'required|string|max:100',
            'description'=>'required|string',
            'price'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
         $product->brand_id = $request->brand_id;
         
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->description=$request->description;
        $product->price=$request->price;
        
        $product->save();
        return response()->json(['Product is updated',
        new ProductResource($product)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $pr= Product::find($product_id);
        if(is_null($pr)){
            return response()->json('Data not found',404);
        }
        $pr->delete();
        return response()->json('Product is deleted');

    }
}
