<?php

namespace App\Http\Controllers\Admin;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.categories.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'nullable',
            'products' => 'nullable|array'
        ]);

        $category = Category::create($request->only('name','description'));

        if($request->has('products')) {
            $category->products()->sync($request->products);
        }

        return redirect()->route('categories.index')
                         ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $products = Product::all();
        $selectedProducts = $category->products->pluck('id')->toArray();
        return view('admin.categories.edit', compact('category','products','selectedProducts'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'description' => 'nullable',
            'products' => 'nullable|array'
        ]);

        $category->update($request->only('name','description'));

        $category->products()->sync($request->products ?? []);

        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->products()->detach();
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
