<?php

use App\Http\Controllers\api\ProductApiController;
use App\Http\Controllers\api\OrderApiController;
use App\Http\Controllers\api\CategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products-list', [ProductApiController::class, 'getProducts']);
Route::get('/product/{myProSlug}', [ProductApiController::class, 'getProductBySlug']);
Route::post('/place-order',[OrderApiController::class,'store']);

Route::get('/categories-list', [CategoryApiController::class, 'getCategories']);
Route::get('/category/{myCatSlug}', [CategoryApiController::class, 'getCategoryBySlug']);
Route::put('/categoryUpdateById/{myUId}',[CategoryApiController::class,'update']);

Route::delete('/deleteById/{myDId}',[ProductApiController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
