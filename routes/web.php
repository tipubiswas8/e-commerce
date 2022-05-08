<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function(){
    return view('vue.vuejs');
});



    
// resource route
Route::resource('categories', CategoryController::class);

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{eid}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{uid}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{did}/delete', [ProductController::class, 'destroy'])->name('products.delete');
Route::get('products/deleted', [ProductController::class, 'getDeletedData']);

Route::get('orders', [OrderController::class,'index'])->name('orders.index')->middleware('myMidd');
Route::get('orders/change-status/{id}', [OrderController::class,'changeStatus'])->name('orders-change-status');

Route::get('template', function(){
    return view('admin.layout.main');
});

Route::get('/{path}', function(){
    return view('vue.vuejs');
   })->where('path','.*');
   
