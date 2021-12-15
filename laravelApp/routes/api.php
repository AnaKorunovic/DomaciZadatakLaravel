<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/brands', [BrandController::class,'index'])->name('brands.index');
Route::get('/products', [ProductController::class,'index']);

Route::post('/AddBrand', [BrandController::class,'create']);

//api/brands/1
Route::resource('/products',ProductController::class);//api/products/2

Route::get('/productsOfBrand/{id}', [BrandProductController::class,'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/profile', function(Request $request) {
        return auth()->user();
        });
        Route::resource('products', ProductController::class)->only(['update','store','destroy']);
        


    // API route for logout user
        Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/products',[ProductController::class,'index']);
