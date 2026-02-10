<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('setting.edit', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show() {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $setting = Setting::first();

        $imagePath = $setting->logo;

        if ($request->hasFile('logo')) {
            if ($setting->logo && file_exists(public_path($setting->logo))) {
                unlink(public_path($setting->logo));
            }
            $image = $request->file('logo');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('settings'), $fileName);
            $imagePath = 'settings/' . $fileName;
        }

        $faviconPath = $setting->favicon;
        if ($request->hasFile('favicon')) {
            if ($setting->favicon && file_exists(public_path($setting->favicon))) {
                unlink(public_path($setting->favicon));
            }
            $image = $request->file('favicon');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('settings'), $fileName);
            $faviconPath = 'settings/' . $fileName;
        }

        $setting->update(array_merge($request->all(), [
            'logo' => $imagePath,
            'favicon' => $faviconPath,
        ]));
        return redirect()->route('setting.index')->with('success', 'Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
