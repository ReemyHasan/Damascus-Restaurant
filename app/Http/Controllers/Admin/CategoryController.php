<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {

         $categories = Category::all();
         return view('admin.categories.index',compact('categories'));
     }

     public function store(CategoryRequest $request)
     {
         Category::create($request->all());

         session()->flash('success', 'Categroy added successfully!');
         return redirect()->route('admin.categories.index');
     }


     public function update(CategoryRequest $request, Category $category)
     {
         $category->update($request->all());

         session()->flash('success', 'Categroy updated successfully!');
         return redirect()->route('admin.categories.index');

     }

     public function destroy(Category $category)
     {
         $category->delete();

         session()->flash('success', 'Categroy deleted successfully!');
         return redirect()->route('admin.categories.index');
     }
}
