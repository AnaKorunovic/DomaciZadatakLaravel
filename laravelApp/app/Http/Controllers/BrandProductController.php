<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BrandProductController extends Controller
{
    //svi producti koji pripadaju odredjenom brendu
    public function index($brand_id)
    {
        $products=Product::get()->where('brand_id',$brand_id);
        if(is_null($products)){
            return response()->json('Products not found',404);
        }return response()->json($products);
    }
}
