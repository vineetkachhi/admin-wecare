<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Popular_Work;

class PopularWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $popular_works = Popular_Work::all();

        return view('popular_works.index', compact('popular_works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('popular_works.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // Add other validation rules as needed
        ]);

        Popular_Work::create($request->all());

        return to_route('popular_work.index')
            ->with('success', 'Popular work created successfully.');
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
        $popularWorks = Popular_Work::find($id);
        return view('popular_works.edit', compact('popularWorks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // Add other validation rules as needed
        ]);

        $popularWorks = Popular_Work::find($id);
        $popularWorks->update($request->all());

        return to_route('popular_work.index')
            ->with('success', 'Popular work updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $popularWorks = Popular_Work::find($id);
        $popularWorks->delete();

        return to_route('popular_work.index')
            ->with('success', 'Popular work deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        Popular_Work::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Selected Popular Work deleted');
    }
}
