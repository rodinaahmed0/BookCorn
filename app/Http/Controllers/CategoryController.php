<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(){
          $categories=  Category::all();
          return view('dashboard.categories.index' , compact('categories'));
    }
    public function create(){
        return view('dashboard.categories.create');
    }

    public function store(Request $r){
          $validated= $r->validate([
            'name' => 'required|unique:categories|min:3|max:50',
         ]);

          Category::create($validated);

          return redirect(route('categories.index'));
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit',compact('category'));
    }

    public function update(Request $r,$id){
        $validated=$r->validate([
            'name' => ['required', Rule::unique('categories')->ignore($id),'between:3,50'],

        ]);

        Category::where('id',$id)->update($validated)->toSql();

       return redirect(route('categories.index'));
    }

    public function destroy($id){
        Category::where('id' , $id)->delete();
        return redirect(route('categories.index'));
    }
}
