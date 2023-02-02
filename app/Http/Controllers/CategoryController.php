<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategory;
use App\Http\Requests\EditVape;
use App\Http\Requests\VapeRequest;
use App\Models\Category;
use App\Models\Vape;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view(){

        return view('category.create');
    }
    public function create(CategoryRequest $request){
        $data = $request->validated();
        $category = new Category($data);
        $category->save();

        session()->flash('success', 'Категория добавлена!');
        return redirect()->back();
    }
    public function delete(Category $category){
        $category->delete();
        session()->flash('success', 'Категория удалена');
        return redirect()->back();
    }
    public function show(Category $category){
        return view('category.show', compact('category'));
    }
    public function edit(Category $category, EditCategory $request){
        $data = $request->validated();
        $category->fill($data);
        $category->save();
        session()->flash('success', 'Категория изменена');
        return redirect()->route('showcategory', ['category' => $category->id]);
    }
    public function editForm(Category $category){
        return view('category.edit', compact('category'));
    }
    public function list(){
        $categories = Category::all();
        return view('category.list', ['categories' => $categories]);
    }
}
