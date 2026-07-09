<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // UPDATED: Added 'admin.' to the view path
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        // UPDATED: Added 'admin.' to the view path
        return view('admin.categories.create');
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

        // UPDATED: Redirect to the new admin URL
        return redirect('/admin/categories')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        // UPDATED: Added 'admin.' to the view path
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $category->update($validated);

        // UPDATED: Redirect to the new admin URL
        return redirect('/admin/categories')->with('success', 'Category updated successfully!');
    }

    public function show(Category $category) { }

    public function destroy(Category $category)
    {
        $category->delete();
        // UPDATED: Redirect to the new admin URL
        return redirect('/admin/categories')->with('success', 'Category deleted successfully!');
    }
}