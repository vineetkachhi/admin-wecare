<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blog_Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = Blog_Category::where('status', 'active')->get();
        return view('blogs.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:blogs,slug|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_meta_tag' => 'nullable|string',
            'blog_category_id' => 'required|exists:blog_categories,id',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('blog'), $fileName);
            $imagePath = 'blog/' . $fileName;
        }

        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imagePath,
            'status' => $request->status,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_meta_tag' => $request->seo_meta_tag,
            'blog_category_id' => $request->blog_category_id,
        ]);

        return to_route('blogs.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blogCategories = Blog_Category::where('status', 'active')->get();
        return view('blogs.edit', compact('blog', 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:blogs,slug,' . $blog->id . '|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_meta_tag' => 'nullable|string',
            'blog_category_id' => 'required|exists:blog_categories,id',
        ]);

        $imagePath = $blog->image;

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            $image = $request->file('image');
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blog'), $fileName);
            $imagePath = 'blog/' . $fileName;
        }

        $blog->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imagePath,
            'status' => $request->status,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_meta_tag' => $request->seo_meta_tag,
            'blog_category_id' => $request->blog_category_id,
        ]);

        return to_route('blogs.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            unlink(public_path($blog->image));
        }
        $blog->delete();
        return to_route('blogs.index')->with('success', 'Blog deleted successfully');
    }

    public function bulkDelete(Request $request)
    {
        Blog::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Selected blogs deleted');
    }
}
