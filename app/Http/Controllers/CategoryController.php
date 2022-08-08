<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();

        return view('admin.categories.category-list', ['categories' => $categories]);
    }

    public function addCategory(Request $request)
    {
        $fields = $request->validate(['name' => 'required']);

        Category::create([
            'name' => $fields['name']
        ]);

        return redirect()->route('categoryList');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.category-edit', ['category' => $category]);
    }

    public function updCategory(Request $request, $id)
    {
        $fields = $request->validate(['name' => 'required']);

        $category = Category::findOrFail($id);

        $category->name = $fields['name'];

        $category->save();

        return redirect()->route('categoryList');
    }

    public function delCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Product::whereCategoryId($id)->delete();

        return redirect()->back();
    }
}
