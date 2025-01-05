<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\Rental;
use App\Models\Renter;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');
        $sortOrder = $request->query('sort', 'desc'); // Default to 'desc'
        $rentalsQuery = Rental::query();

        if ($query) {
            $rentalsQuery->join('motors', 'rentals.id_motor', '=', 'motors.id')
                         ->join('renters', 'rentals.id_renter', '=', 'renters.id')
                         ->where(function ($q) use ($query) {
                            $q->where('motors.tipe', 'like', "%$query%")
                              ->orWhere('motors.merek', 'like', "%$query%")
                              ->orWhere('renters.name', 'like', "%$query%")
                              ->orWhere('renters.no_identitas', 'like', "%$query%");
                         });
        }
        

        if ($sortOrder === 'newest') {
            $rentalsQuery->orderBy('created_at', 'desc');
        } elseif ($sortOrder === 'oldest') {
            $rentalsQuery->orderBy('created_at', 'asc');
        } 


        $rentals = $rentalsQuery->paginate(5);
        return view('admin.rentals.index', compact('rentals'));
    }


    public function toggleStatus($id)
    {
        $rental = Rental::findOrFail($id);
    
        // Toggle the rental status
        $rental->status = $rental->status == 'dirental' ? 'selesai' : 'selesai';
        $rental->save();
    
        // Get the associated motor
        $motor = Motor::findOrFail($rental->id_motor);
    
        // Update motor status based on rental status
        if ($rental->status == 'selesai') {
            $motor->status = 'tersedia';
        } else {
            $motor->status = 'tidak tersedia';
        }
    
        $motor->save();
    
        return redirect()->back()->with('success', 'Status penyewaan berhasil diubah dan status motor diperbarui.');
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $renters = Renter::where('status', 'aktif')->get();
        $motors = Motor::where('status', 'tersedia')->get();
        $selectedRenter = $request->query('renter_id');
        $selectedMotor = $request->query('motor_id');

        return view('admin.rentals.create', compact('renters','motors', 'selectedRenter', 'selectedMotor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_renter' => 'required|exists:renters,id',
            'id_motor' => 'required|exists:motors,id',
            'tgl_mulai' => 'required|date|after_or_equal:today',
            'tgl_selesai' => 'required|date|after:tgl_mulai',
            'durasi_sewa' => 'required|numeric|min:1',
            'total_harga' => 'required|numeric|min:1',
            'status' => 'required',
        ]);
        
    
        try {
            // Create a new rental record
            Rental::create($validated);
            
            $motor = Motor::findOrFail($validated['id_motor']);


            if (in_array($validated['status'], ['dipesan', 'dirental'])) {
                $motor->status = 'tidak tersedia';
            } else {
                $motor->status = 'tersedia';
            }
            $motor->save();
            // Redirect with success message
            return redirect()->route('admin.penyewaan.index')->with('success', 'Pesanan berhasil ditambahkan.');
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
        $renters = Renter::all();
        $motors = Motor::all();

         $rental = Rental::findOrFail($id);
        return view('admin.rentals.create', compact('renters', 'motors', 'rental'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rental = Rental::findOrFail($id);

        $validated = $request->validate([
            'id_renter' => 'required|exists:renters,id',
            'id_motor' => 'required|exists:motors,id',
            'tgl_mulai' => 'required|date|after_or_equal:today',
            'tgl_selesai' => 'required|date|after:tgl_mulai',
            'durasi_sewa' => 'required|numeric|min:1',
            'total_harga' => 'required|numeric|min:1',
            'status' => 'required',
        ]);
    
        try {
            // Create a new rental record
            $rental->update([
                'id_renter' => $validated['id_renter'],
                'id_motor' => $validated['id_motor'],
                'tgl_mulai' => $validated['tgl_mulai'],
                'notgl_selesai' => $validated['tgl_selesai'],
                'durasi_sewa' => $validated['durasi_sewa'],
                'total_harga' => $validated['total_harga'],
                'status' => $validated['status'],
            ]);

            $motor = Motor::findOrFail($validated['id_motor']);


            if (in_array($validated['status'], ['dipesan', 'dirental'])) {
                $motor->status = 'tidak tersedia';
            } else {
                $motor->status = 'tersedia';
            }
            $motor->save();
            
            // Redirect with success message
            return redirect()->route('admin.penyewaan.index')->with('success', 'Data berhasil diupdate!');
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
        Rental::where('id', $id)->delete();
        return redirect()->route('admin.penyewaan.index')->with('success', 'Berhasil Menghapus Data');
    }
}
