<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Product::query();

        // Search
        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%")
                  ->orWhere('sku', 'like', "%{$request->search}%");
        }

        // Category filter
        if ($request->category_id) {
            $query->where('more_parent_id', $request->category_id);
        }

        // Sort
        if ($request->sort_by) {
            $query->orderBy($request->sort_by, 'asc');
        }

        $products = $query->paginate(10);

        // Total counts
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        return view('frontend.index', compact('products', 'categories', 'totalProducts', 'totalCategories'));
    }
}
