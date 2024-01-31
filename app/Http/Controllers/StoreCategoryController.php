<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\DataTables\ProductDataTable;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use DataTables;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    // public function create(ProductDataTable $dataTable)
    // {
    //     return $dataTable->render('category.index');
    // }

    public function create(){
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $categoryData = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ];
        
        // Use mass assignment to create a user
        Category::create($categoryData);
        
        return redirect()->route('category.index');
    }

    // public function index() {

    //     $categories = Category::orderBy('created_at', 'desc')->get();
    //     // dd($products);

    //     // return view with category
    //     $categories = Category::all();
    //     // dd($categories);
    //     return view('category.index', ['categories' => $categories]);
    // }

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('category.index');
    }
}
