<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CategoryApiController extends Controller
{
    public function getCategories (){
        $categories = Category::all();
        // dd($categories);
        return $categories;
    }

    public function getCategoryBySlug(string $myCatSlug){
        $category = Category::where('slug', $myCatSlug)->first();
        // dd($category);
        return $category;
    } 

    public function update(Request $myReq, Category $myUId){
        try{
         $myUId->name = $myReq->name_of_category;
         $myUId->slug = $myReq->name_of_slug;
         $myUId->update();
         
        // $myUId->name = "Tipu";
        // $myUId->slug = "biswas";
        // dd($request->p_name);
         
         return ['mySuccess'=> true];
    }catch(Exception $ex){
        Log::error('Category Update'.$ex->getMessage());
        return ['mySuccess'=> false];
    }
      }
}
