<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use DataTables;
use Illuminate\Http\Request;

class StoreProductController extends Controller
{
    public function create(){
        return view('product.create');
    }

    public function store(StoreProductRequest $request)
    {
        $productData = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'image_path' => $request->input('image_path'),
            'price' => $request->input('price'),
        ];
        
        // Use mass assignment to create a user
        Product::create($productData);
        
        return redirect()->route('product.card');
    }

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('product.index');
    }

    public function card()
    {
        // Fetch all products from the database
        $products = Product::all();
        $categories = Category::all();

        // Pass the products to the card view
        return view('product.card', ['products' => $products, 'categories' => $categories]);
        // // Product->card($this->
        // return view('product.card');
    }
}
