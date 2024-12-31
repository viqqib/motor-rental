<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SettingsSocialLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = SocialLink::all();
        return view('admin.settings.socialLink.index', compact('socialLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.socialLink.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:social_links',
        'identifier' => 'required|string|max:255',
        'link' => 'required|url',
    ], [
        'name.unique' => 'Sosial Media ini sudah ada',
        'name.required' => 'Nama wajib diisi.',
        'name.string' => 'Nama harus berupa teks.',
        'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
        'identifier.required' => 'Alamat (Username / Nomor Telepon) wajib diisi.',
        'identifier.string' => 'Alamat (Username / Nomor Telepon) harus berupa teks.',
        'identifier.max' => 'Alamat (Username / Nomor Telepon) tidak boleh lebih dari 255 karakter.',
        'link.required' => 'Link wajib diisi.',
        'link.url' => 'Link harus berupa URL yang valid.',
    ]);

    // Create a new social link entry
    SocialLink::create([
        'name' => $validated['name'],
        'identifier' => $validated['identifier'],
        'link' => $validated['link'],
    ]);

    // Redirect with a success message
    return redirect()->route('admin.settings.index')
                     ->with('success', 'Social link berhasil ditambahkan.');
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
        $socialLink = SocialLink::where('id',$id)->first();
        return view('admin.settings.socialLink.edit', compact('socialLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the social link by its ID
        $socialLink = SocialLink::findOrFail($id);
    
        // Validate the request with custom messages
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'identifier' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'identifier.required' => 'Alamat (Username / Nomor Telepon) wajib diisi.',
            'identifier.string' => 'Alamat (Username / Nomor Telepon) harus berupa teks.',
            'identifier.max' => 'Alamat (Username / Nomor Telepon) tidak boleh lebih dari 255 karakter.',
            'link.required' => 'Link wajib diisi.',
            'link.string' => 'Link harus berupa teks.',
            'link.max' => 'Link tidak boleh lebih dari 255 karakter.',
        ]);
    
        // Update the social link with validated data
        $socialLink->update([
            'name' => $validated['name'],
            'identifier' => $validated['identifier'],
            'link' => $validated['link'],
        ]);
    
        // Redirect back with a success message
        return redirect()->route('admin.settings.index')
                         ->with('success', 'Social link berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the social link by its ID
        $socialLink = SocialLink::findOrFail($id);

        // Delete the social link
        $socialLink->delete();

        // Redirect back with a success message
        return redirect()->route('admin.settings.index')
                        ->with('success', 'Akun berhasil dihapus.');
    }
}
