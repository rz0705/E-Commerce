<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use DataTables;
use Illuminate\Http\Request;
use Response;

class StoreProductController extends Controller
{
    public function create(){
        // Fetch all categories from the database
        $categories = Category::all();
    
        // Pass the categories to the create view
        return view('product.create', ['categories' => $categories]);
    }

    public function store(StoreProductRequest $request)
    {
        // Validate the incoming request using the StoreProductRequest class
        $request->validated();

        // Create a new Product instance and assign values
        $product = new Product;
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

        // Return a JSON response or redirect to a specific route
        return response()->json(['message' => 'Product created successfully']);
    }

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('product.index');
    }

    public function card()
    {
        // Fetch all products from the database
        $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::all();

        // Pass the products to the card view
        return view('product.card', ['products' => $products, 'categories' => $categories]);
    }
}
