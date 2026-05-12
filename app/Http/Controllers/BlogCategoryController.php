<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog_Category;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = Blog_Category::where('status', 'active')->get();


        return view('blog-categories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_categories,slug',
            'status' => 'required|in:active,inactive',
        ]);

        Blog_Category::create($request->all());

        return to_route('blog-categories.index')->with('success', 'Blog category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Blog_Category::findOrFail($id);
        return view('blog-categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_categories,slug,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        $category = Blog_Category::findOrFail($id);
        $category->update($request->all());

        return to_route('blog-categories.index')->with('success', 'Blog category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Blog_Category::findOrFail($id);
        $category->delete();

        return to_route('blog-categories.index')->with('success', 'Blog category deleted successfully.');
    }
}
