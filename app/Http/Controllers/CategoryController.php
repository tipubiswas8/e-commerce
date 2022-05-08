<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
       $catData =  Category::all();
        return view('admin.categories.index', ['data' => $catData]);
    }


    public function create()
    {
       return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        try {
            Category::create([
           'name' => $request->name,
           // for create slug
           'slug' => Str::slug($request->name)
        ]);
           // for give success message
           return redirect()->back()->with('success', 'Ctagory Created Succesfully');
        }catch(Exception $e){
            Log::error("Category store: ".$e->getMessage());
             // for error message
            return redirect()->back()->with('error', 'Something went wrong! Please try again!');
    }
}


    public function show(Category $category)
    {
        //
    }



    public function edit($id)
    {
      $editData = Category::find($id);
      return view('admin.categories.edit', ['edata' => $editData]);
    }

    public function update(Request $request, $id)
    {
      try{
      $uData = Category::find($id);
      $uData->name = $request->name; 
      $uData->slug = Str::slug($request->name);
      $uData->update();
      // for give success message
      return redirect()->back()->with('success', 'Ctagory Updated Succesfully');

      }catch(Exception $e){
      Log::error("Category update: ".$e->getMessage());
      // for error message
      return redirect()->back()->with('error', 'Something went wrong! Please try again!');
 }

    }


    public function destroy($id)
    {
     try{
     Category::destroy($id);
     // for give success message
     return redirect()->back()->with('success', 'Category Deleted Sussesfully');

     }catch(Exception $e){
     Log::error("Category destroy:" .$e->getMessage());
     // for error message
     return redirect()->back()->with('error', 'Something went wrong! Please try again!');
     }
    }
}
