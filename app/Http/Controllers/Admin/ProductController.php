<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Product List
    public function index()
    {
       $products = Product::with('categories')->paginate(4);

        return view('admin.products.index', compact('products'));
    }

    // Create Form
    public function create()
    {

          $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    // Store Product
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'more_parent_id' => 'required|exists:categories,id',
            'sku' => 'required|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    // Edit Form
    public function edit(Product $product)
    {
         $categories = Category::all(); // load all categories
    $selectedCategory = $product->more_parent_id; // store current category
    return view('admin.products.edit', compact('product', 'categories', 'selectedCategory'));
    }

    // Update Product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'more_parent_id' => 'required|exists:categories,id',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    // Delete Product
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
