<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;

class WebsiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websiteInfo = WebsiteInfo::where('id', 1 )->first();
        $socialLinks = SocialLink::all();
        return view('admin.settings.index', compact('websiteInfo', 'socialLinks'));
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
    public function edit($field)
    {
        $websiteInfo = WebsiteInfo::first();  // Get the first record, assuming only one record exists
        return view('admin.settings.websiteInfo.edit', compact('websiteInfo', 'field'));
    }
    
    public function update(Request $request, $field)
    {
        // Validate the input based on the field being updated
        $validated = $request->validate([
            'value' => 'required|string|max:255',  // Adjust validation as needed
        ]);
    
        $websiteInfo = WebsiteInfo::first();  // Get the first record
    
        // Dynamically update the field
        $websiteInfo->$field = $validated['value'];
    
        // Save the updated value
        $websiteInfo->save();
    
        // Redirect back to the settings page with a success message
        return redirect()->route('admin.settings.index')->with('success', ucfirst($field) . ' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
