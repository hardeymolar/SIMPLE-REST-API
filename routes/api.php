<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\productController;
use App\Models\Product;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// protected routes

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::put('/products/{id}',[productController::class,'update']);
    Route::delete('/products/{id}',[productController::class,'destroy']);
    Route::post('/products',[productController::class,'store']);
    Route::post('/logout',[AuthController::class,'logout']);
});


// public routes

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::get('/products/search/{name}',[productController::class,'search']);
Route::get('/products',[productController::class,'index']);
Route::get('/products/{id}',[productController::class,'show']);


// Route::resource('products',productController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/products',[productController::class,'store']);
