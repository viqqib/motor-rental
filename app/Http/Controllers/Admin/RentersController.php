<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Renter;
use Illuminate\Http\Request;

class RentersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');
        $sortOrder = $request->query('sort', 'desc'); // Default to 'desc'
        $rentersQuery = Renter::query();

        if ($query) {
            $rentersQuery->where(function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                    ->orWhere('no_identitas', 'like', "%$query%")
                    ->orWhere('email', 'like', "%$query%");
            });
        }

        if ($sortOrder === 'newest') {
            $rentersQuery->orderBy('created_at', 'desc');
        } elseif ($sortOrder === 'oldest') {
            $rentersQuery->orderBy('created_at', 'asc');
        } elseif (in_array($sortOrder, ['asc', 'desc'])) {
            $rentersQuery->orderBy('name', $sortOrder);
        }


        $renters = $rentersQuery->paginate(5);
        return view('admin.renters.index', compact('renters'));
    }

    public function toggleStatus($id)
    {
        $renter = Renter::findOrFail($id);

        // Toggle the status
        $renter->status = $renter->status == 'aktif' ? 'nonaktif' : 'aktif';
        $renter->save();

        return redirect()->back()->with('success', 'Status penyewa berhasil diubah.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.renters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
           'no_identitas' => 'required|digits:16|unique:renters,no_identitas',
        ]);
    
        try {
            // Create a new renter
            Renter::create($validated);
    
            // Redirect with success message
            return redirect()->route('admin.renters.index')->with('success', 'Penyewa berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
        $renter = Renter::findOrFail($id);
        return view('admin.renters.create', compact('renter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $renter = Renter::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
           'no_identitas' => 'required|digits:16|unique:renters,no_identitas',
        ]);
    
        try {
            // Create a new renter
           
            $renter->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'address' => $validated['address'],
                'no_telp' => $validated['no_telp'],
                'no_identitas' => $validated['no_identitas'],
            ]);
    
            // Redirect with success message
            return redirect()->route('admin.renters.index')->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Renter::where('id', $id)->delete();
        return redirect()->route('admin.renters.index')->with('success', 'Berhasil Menghapus Data');
    }
}
