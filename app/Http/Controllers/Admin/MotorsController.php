<?php

namespace App\Http\Controllers\Admin;
use App\Models\Motor;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MotorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query'); // Use 'search' as a query parameter (or change it based on your front-end)
        
        if (strlen($query)) {
            $motors = Motor::where('tipe', 'like', "%$query%")
                ->orWhere('merek', 'like', "%$query%")
                ->orWhere('tahun', 'like', "%$query%")
                ->paginate(2);
        } else {
            $motors = Motor::with('motorHarga')->paginate(10);
        }
    
        return view('admin.motor.index', compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.motor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('tipe', $request->tipe);
        Session::flash('merek', $request->merek);
        Session::flash('tahun', $request->tahun);
        Session::flash('warna', $request->warna);
        Session::flash('status', $request->status);
        Session::flash('nomor_plat', $request->plat_nomor);
    

        // Validate the request data
        $validated = $request->validate([
            'tipe' => 'required|string|max:255',
            'nomor_plat' => 'required|unique:motors|max:10',
            'merek' => 'required|string|max:255',
            'tahun' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'warna' => 'required|in:Hitam,Putih,Merah,Biru,Hijau,Kuning,Silver',
            'status' => 'required|in:tersedia,tidak tersedia,perawatan',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], [
            'tipe.required' => 'Tipe motor wajib diisi.',
            'merek.required' => 'Merek motor wajib diisi.',
            'tahun.required' => 'Tahun motor wajib diisi.',
            'nomor_plat.required' => 'Plat nomor kendaraan wajib diisi ',
            'nomor_plat.unique' => 'Plat nomor telah terdaftar ',
            'tahun.integer' => 'Tahun motor harus berupa angka.',
            'warna.required' => 'Warna Harus Dipilih',
            'tahun.digits' => 'Tahun motor harus terdiri dari 4 digit.',
            'tahun.min' => 'Tahun motor tidak boleh kurang dari 1900.',
            'tahun.max' => 'Tahun motor tidak boleh lebih dari tahun saat ini.',
            'status.required' => 'Status motor wajib dipilih.',
            'status.in' => 'Status motor harus berupa salah satu dari: tersedia atau tidak tersedia.',
            'gambar.required' => 'Gambar motor wajib diunggah.',
            'gambar.mimes' => 'Gambar harus berformat png, jpg, atau jpeg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);
    
        // Handle the image upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = date('Y-m-d') . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('photo-motor', $filename, 'public');
        }
    
        // Create a new motor entry
        Motor::create([
            'nomor_plat' => $validated['nomor_plat'],
            'tipe' => $validated['tipe'],
            'merek' => $validated['merek'],
            'tahun' => $validated['tahun'],
            'warna' => $validated['warna'],  
            'status' => $validated['status'],
            'gambar' => $path ?? null,  // Store the image path in the database
        ]);
    
        // Redirect back with a success message
        return redirect()->route('admin.motor.index')->with('success', 'Berhasil menambahkan data motor');
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
    public function edit($id)
    {
        $data = Motor::where('id',$id)->first();
        return view('admin.motor.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request data
    $validated = $request->validate([
        'nomor_plat' => 'required|max:10',
        'tipe' => 'required|string|max:255',
        'merek' => 'required|string|max:255',
        'tahun' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
        'warna' => 'required|in:Hitam,Putih,Merah,Biru,Hijau,Kuning',
        'status' => 'required|in:tersedia,tidak tersedia,perawatan',
        'gambar' => 'nullable|mimes:png,jpg,jpeg|max:2048', // Gambar is optional in update
    ], [
        'tipe.required' => 'Tipe motor wajib diisi.',
        'merek.required' => 'Merek motor wajib diisi.',
        'tahun.required' => 'Tahun motor wajib diisi.',
        'nomor_plat.required' => 'Plat nomor kendaraan wajib diisi ',
        // 'nomor_plat.unique' => 'Plat nomor telah terdaftar ',
        'tahun.integer' => 'Tahun motor harus berupa angka.',
        'warna.required' => 'Warna Harus Dipilih',
        'tahun.digits' => 'Tahun motor harus terdiri dari 4 digit.',
        'tahun.min' => 'Tahun motor tidak boleh kurang dari 1900.',
        'tahun.max' => 'Tahun motor tidak boleh lebih dari tahun saat ini.',
        'status.required' => 'Status motor wajib dipilih.',
        'status.in' => 'Status motor harus berupa salah satu dari: tersedia atau tidak tersedia.',
    ]);
    
    // Find the motor entry to be updated
    $motor = Motor::findOrFail($id);

    // Handle the image upload if a new image is provided
    if ($request->hasFile('gambar')) {
        // Delete the old image from storage
        if ($motor->gambar) {
            Storage::disk('public')->delete('photo-motor/' . $motor->gambar);
        }
        
        // Upload the new image
        $gambar = $request->file('gambar');
        $filename = date('Y-m-d') . '_' . $gambar->getClientOriginalName();
        $path = $gambar->storeAs('photo-motor', $filename, 'public');
    }

    // Update the motor entry
    $motor->update([
        'nomor_plat' => $validated['nomor_plat'],
        'tipe' => $validated['tipe'],
        'merek' => $validated['merek'],
        'tahun' => $validated['tahun'],
        'warna' => $validated['warna'],
        'status' => $validated['status'],
        'gambar' => isset($path) ? $path : $motor->gambar, // Update image only if a new one is uploaded
    ]);

    // Redirect back with a success message
    return redirect()->route('admin.motor.index')->with('success', 'Berhasil update data motor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        Motor::where('id', $id)->delete();
        return redirect()->route('admin.motor.index')->with('success', 'Berhasil Menghapus Data');
    }
}
