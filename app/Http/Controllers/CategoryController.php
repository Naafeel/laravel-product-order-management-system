<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active');
        Category::create($validated);

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Send the specific category data to the edit view
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // 1. Validate the data. 
        // Notice the unique rule now ignores the current category's ID so it doesn't conflict with itself!
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
        ]);

        // 2. Handle the checkbox
        $validated['is_active'] = $request->has('is_active');

        // 3. Update the database row!
        $category->update($validated);

        // 4. Send the user back to the list
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        // We will write this later
    }

    public function destroy(Category $category)
    {
        // We will write this later
    }
}