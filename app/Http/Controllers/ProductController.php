<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  public function index(){
      $allProducts = Product::all();
      return view('visitors.products.index', ['products' => $allProducts]);
  }


  public function create(){
    $getCategories = Category::all();
    return view('visitors.products.create', ['categories' => $getCategories]);
  }

  public function store(Request $r){
try{

  // image uploading 

  $dbImagePath = null;
  if($r->hasFile('cimage')){
      // get originial image name
      $imageName = $r->file('cimage')->getClientOriginalName();
      // you can see the originial image name.
      // dd($imageName); 

      // save your image to "storage/app/public/products" directory
      // the default storage location is storage/app/public/" it is Laravel recomended.
      // need to run this commend "php artisan storage:link" for create storage link
      $r->file('cimage')->storeAs('public/products/',$imageName);

      // you can set your image name, that name save your database.
      // yoy can set another name
      // like: product.image.$imageName
      $dbImagePath = 'storage/products/'.$imageName;
      // you can see whose name save your database.
      // dd($dbImagePath); 
      
  }


  Product::create([
    // 'name' is Product table field name of database
    // $r->cname; is <input type="text" name="cname"> of create.blade.php 
    'name' => $r->cname,
    // for create slug.
    'slug' => Str::slug($r->cname),
    'category_id' => $r->ccategory_id,
    'price' => $r->cprice,
    'quantity' => $r->cquantity,
    // insert only image name into database
    'image' => $dbImagePath,
    'description' => $r->cdescription,
    'status' => $r->cstatus
  ]);
  return redirect()->back()->with('ok', 'Product create successfully');
}
catch(Exception $e){
Log::error('Product Store:'.$e->getMessage());
return redirect()->back()->with('problem', 'Something went wrong, please try again');
}
  }

  public function edit(Product $eid){
    $getCat = Category::all();
    return view('visitors.products.edit', ['ecat' => $getCat, 'eproduct' => $eid]);
    // dd($pid);
    // dd($getCat->name);
  }



// Request $req from edit.blade.php
// Product $uid from web.php (Route::put('products/{uid}/update')
  public function update(Request $req, Product $uid){
// image uploading 
 try{

 $dbImagePath = null;
 if($req->hasFile('uimage')){
     // get originial image name
     $imageName = $req->file('uimage')->getClientOriginalName();
     // you can see the originial image name.
     // dd($imageName); 

     // save your image to "storage/app/public/products" directory
     // the default storage location is storage/app/public/" it is Laravel recomended.
     // need to run this commend "php artisan storage:link" for create storage link
     $req->file('uimage')->storeAs('public/products/',$imageName);

     // you can set your image name, that name save your database.
     // yoy can set another name
     // like: product.image.$imageName
     $dbImagePath = 'storage/products/'.$imageName;
     // you can see whose name save your database.
     // dd($dbImagePath); 
     
    // delete previous image path
    $deleteImagePath = $uid->image;
    // replace previous image path
    $deleteImagePath = str_replace('storage','public',$deleteImagePath);
    // delete previous image path
    Storage::delete($deleteImagePath);
 }
    // $uid->name is Product table field name of database
    // $req->uname; is <input type="text" name="uname"> of edit.blade.php 
     $uid->name = $req->uname;
     $uid->slug = Str::slug($req->uname);
     $uid->category_id = $req->ucategory_id;
     $uid->price = $req->uprice;
     $uid->quantity = $req->uquantity;
     $uid->description = $req->udescription;
     $uid->status = $req->ustatus;
    // delete previous image path
     if(isset($dbImagePath)){
     $uid->image = $dbImagePath;
     }
     $uid->update();

     return redirect()->back()->with('success', 'Product update successfully');
}catch(Exception $ex){
    Log::error('Product Update'.$ex->getMessage());
    return redirect()->back()->with('error', 'Update faild, please try again');
}
  }


  public function destroy(Product $did){
    try{
      // dd($did);
      $did->delete();
    return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
  catch(Exception $ex){
    return redirect()->back()->with('error', 'Delete faild, please try again!');
   Log::error('Product Delete'.$ex->getMessage());
  }
}

public function getDeletedData(){
  $deletedProducts = Product::withTrashed()->get();
  return view('visitors.products.delete', ['dPro' => $deletedProducts]);
}

}