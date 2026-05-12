<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_location' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('testimonial'), $fileName);
            $imagePath = 'testimonial/' . $fileName;
        }
        $validatedData['image'] = $imagePath;


        Testimonial::create($validatedData);
        return to_route('testimonial.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  string $id)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_location' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $imagePath = $testimonial->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('testimonial'), $fileName);
            $imagePath = 'testimonial/' . $fileName;
        }
        $validatedData['image'] = $imagePath;

        $testimonial->update($validatedData);
        return to_route('testimonial.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        if ($testimonial->image) {
            unlink(public_path($testimonial->image));
        }
        return to_route('testimonial.index')->with('success', 'Testimonial deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        Testimonial::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Selected Testimonial deleted');
    }
}
