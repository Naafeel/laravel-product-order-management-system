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
        // 1. Ask the database for ALL categories
        $categories = Category::all();

        // 2. Send them to the 'categories.index' blade file
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // We will write this later
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // We will write this later
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