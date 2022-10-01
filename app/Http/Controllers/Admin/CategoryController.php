<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(){
        $data = Category::all();
        return view('admin.categories.index', ['categories' => $data]);
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required' 
        ]);
        try {
            Category::create([
                 'name' => $request->name,
                'slug' => Str::slug($request->name),
             ]);
            return redirect()->back()->with('success', 'Ctagory Created Succesfully');
        }catch(Exception $e){
            Log::error("Category store: ".$e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong! Please try again!');
       }

    }


    public function edit($id){
         $category = Category::find($id);
         return view('admin.categories.edit',['category' => $category]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required' 
        ]);
       try{

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->update();
        return redirect()->back()->with('success', 'Ctagory Updated Succesfully');

       }catch(Exception $e){
            Log::error("Category update: ".$e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong! Please try again!');
       }

    }

    public function destroy($id){
        try{
            Category::destroy($id);
            return redirect()->back()->with('success', 'Ctagory Deleted Succesfully');
    
           }catch(Exception $e){
                Log::error("Category destroy: ".$e->getMessage());
                return redirect()->back()->with('error', 'Something went wrong! Please try again!');
           }
    }
}
