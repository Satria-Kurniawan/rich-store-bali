<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::with('category')->get();

        return view('admin.products.product-list', ['products' => $products]);
    }

    public function displayCategories()
    {
        $categories = Category::all();

        return view('admin.products.product-add', ['categories' => $categories]);
    }

    public function addProduct(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
        ]);

        $file = $request->photo;
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('photos'), $file_name);

        Product::create([
            'name' => $fields['name'],
            'description' => $fields['description'],
            'price' => $fields['price'],
            'photo' => $file_name,
            'stock' => $fields['stock'],
            'category_id' => $fields['category_id']
        ]);

        return redirect()->route('productList');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.product-edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function updProduct(Request $request, $id)
    {
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => '',
            'stock' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $fields['name'];
        $product->description = $fields['description'];
        $product->price = $fields['price'];
        if ($request->has('photo')) {
            $file = $request->photo;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('photos'), $file_name);
            $product->photo = $file_name;
        }
        $product->stock = $fields['stock'];
        $product->category_id = $fields['category_id'];

        $product->save();

        return redirect()->route('productList');
    }

    public function delProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back();
    }
}
