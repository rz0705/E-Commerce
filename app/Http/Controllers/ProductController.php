<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        // dd($products);

        // return view with category
        $categories = Category::all();
        // dd($categories);
        return view('product.card', ['products' => $products, 'categories' => $categories]);
    }

    public function card(Request $request)
    {
        // Fetch all products from the database
        $products = Product::orderBy('created_at', 'desc');

        // Check if specific categories are selected
        if ($request->has('categories') && is_array($request->input('categories'))) {
            $selectedCategories = $request->input('categories');
            $products->whereHas('categories', function ($query) use ($selectedCategories) {
                $query->whereIn('id', $selectedCategories);
            });
        }

        $products = $products->get();
        $categories = Category::all();

        // Pass the products to the card view
        return view('product.card', ['products' => $products, 'categories' => $categories]);
    }

    public function create()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        // Pass the categories to the create view
        return view('product.create', ['categories' => $categories]);
    }

    public function edit(Product $product)
    {
    }

    public function store(StoreProductRequest $request)
    {
        // Validate the incoming request using the StoreProductRequest class
        $request->validated();

        // Create a new Product instance and assign values
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->image_path = $request->image_path;
        $product->price = $request->price;

        // Save the product to the database
        $product->save();

        // Retrieve category ids from the request
        $categoryIds = $request->input('select_category');

        // Attach selected categories to the product
        $product->categories()->attach($categoryIds);

        return redirect()->route('product.card');
        // Return a JSON response or redirect to a specific route
        // return response()->json(['message' => 'Product created successfully']);
    }

    public function destory()
    {
    }
}
