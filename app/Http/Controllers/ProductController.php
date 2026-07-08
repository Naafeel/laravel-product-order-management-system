<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all products and include their category data
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // We MUST get all categories so we can show them in the dropdown!
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'category_id' => 'required|exists:categories,id',
        ]);

        // 2. Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store the image in the 'public/products' folder
            $imagePath = $request->file('image')->store('products', 'public');
        }
        $validated['image'] = $imagePath;

        // 3. Handle the checkbox
        $validated['is_active'] = $request->has('is_active');

        // 4. Save to database
        Product::create($validated);

        // 5. Redirect back to the list
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function show(Product $product) { }
    public function edit(Product $product) { }
    public function update(Request $request, Product $product) { }
    public function destroy(Product $product) { }
}