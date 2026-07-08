<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Just show the empty form
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the data coming from the form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
        ]);

        // 2. Handle the checkbox (if unchecked, it sends nothing, so we make it false)
        $validated['is_active'] = $request->has('is_active');

        // 3. Save it to the database!
        Category::create($validated);

        // 4. Send the user back to the categories list
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // We will write this later
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // We will write this later
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // We will write this later
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // We will write this later
    }
}