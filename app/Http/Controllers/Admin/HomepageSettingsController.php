<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomepageSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroContent = HomepageContent::where('section', 'hero')->first();
        return view('admin.homepageContent.index', compact('heroContent'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.homepageContent.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the hero content (assumes only one record with section 'hero')
        $heroContent = HomepageContent::where('section', 'hero')->first();

        // If no hero content exists, create a new entry (optional)
        if (!$heroContent) {
            $heroContent = new HomepageContent();
            $heroContent->section = 'hero';
        }

        // Update the fields with validated data
        $heroContent->heading = $validated['heading'];
        $heroContent->tag = $validated['tag'];
        $heroContent->content = $validated['content'];

        // Handle image upload if a new file is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($heroContent->image) {
                Storage::delete('public/' . $heroContent->image);
            }

            // Store the new image and save the path
            $imagePath = $request->file('image')->store('hero_images', 'public');
            $heroContent->image = $imagePath;
        }

        // Save the updated hero content to the database
        $heroContent->save();

        // Redirect back with success message
        return redirect()->route('admin.homepageContent.index')->with('success', 'Hero section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
