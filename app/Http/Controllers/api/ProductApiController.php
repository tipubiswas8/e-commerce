<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductApiController extends Controller
{
    public function getProducts (){
        $products = Product::all();
        // dd($products);
        return $products;
    }

    public function getProductBySlug(string $myProSlug){
        $product = Product::where('slug', $myProSlug)->first();
        // dd($product);
        return $product;
    } 


    public function destroy(Product $myDId){
        try{
          // dd($myId);
          $myDId->delete();
        return ['mySuccess'=> true];
        }
      catch(Exception $ex){
        return ['mySuccess'=> false];
       Log::error('Product Delete'.$ex->getMessage());
      }
    }

}
