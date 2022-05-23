<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
 
        $products = Product::when($request->search , function($q) use($request) {

            return $q->whereTranslationLike('name',  '%' . $request->search . '%');
        })->when($request->category_id , function($q) use ($request){

       return $q->where('category_id',$request->category_id);

        })->latest()->paginate(5);
        return view('dashboard.products.index',compact('categories','products'));
        
    }// end o f index

    public function create()
    {
        
        $categories = Category::all();
        return view('dashboard.products.create',compact('categories'));

    }// end of create

    public function store(ProductRequest $request)
    {
        $request_date=$request->except(['image']);
        if($request->image){
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            
        })->save(public_path('upload/product_images/' . $request->image->hashName()));
        $request_date['image']=$request->image->hashName();
                
        }
        Product::create($request_date);
        return redirect()->route('dashboard.products.index');
    }// end of store

    public function edit(Product $product)
    {
        $categories = Category::all();
        
        return view('dashboard.products.edit' , compact ('categories','product'));
    }//end of edit

    public function update(Request $request, Product $product)
    {
        $request->validate([

            'category_id'=>'required',
            'ar.name'=>['required', Rule::unique('product_translations','name')->ignore($product->id ,'product_id')],
            'en.name'=>['required', Rule::unique('product_translations','name')->ignore($product->id ,'product_id')],
        ]);
        $request_date=$request->except(['image']);
        if($request->image){
            if($product->image != 'default.jpg'){
                Storage::disk('public_upload')->delete('/product_images/' . $product->image);
             

            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            
        })->save(public_path('upload/product_images/' . $request->image->hashName()));
        $request_date['image']=$request->image->hashName();
                
        }

        $product->update($request_date);
        return redirect()->route('dashboard.products.index');
        
    }// end of update


    public function destroy(Product $product)
    {
        if($product->image != 'default.jpg'){
            Storage::disk('public_upload')->delete('/product_images/' . $product->image);
        }
        $product->delete();
        return redirect()->route('dashboard.products.index');
    }// end of destroy
}// end of controller
    