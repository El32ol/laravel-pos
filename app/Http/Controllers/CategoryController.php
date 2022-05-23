<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Product;
use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationRuleParser;


class CategoryController extends Controller
{
   
    public function index(Request $request)
    {
        $products = Product::all();

       $categories = Category::when($request->search,function($q) use ($request){
            return $q->whereTranslationLike( 'name',  '%' . $request->search . '%');
       })->get();
    
        return view('dashboard.categories.index' , compact('products','categories'));

    } // eng of index

  
    public function create()
    {
        return view('dashboard.categories.create');
    }// end of create

   
    public function store(CategoryRequest $request)
    {
       
        Category::create($request->all());
        return redirect()->route('dashboard.categories.index');

    }//end of store


    public function edit(Category $category)
    {
        
        return view('dashboard.categories.edit', compact('category'));
    }

   
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'ar.name' => ['required', Rule::unique('category_translations' ,'name')->ignore($category->id, 'category_id')],
            'en.name' => ['required', Rule::unique('category_translations','name')->ignore($category->id, 'category_id')],
        ]);
           

        $category->update($request->all());
         return redirect()->route('dashboard.categories.index');    
    }//end of update

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.categories.index');
    }// end of destroy
}//end of controller
