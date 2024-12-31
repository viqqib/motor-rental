<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\MotorHarga;
use Illuminate\Http\Request;

class MotorsHargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $query = $request->query('query'); // Use 'query' as a query parameter

        if (strlen($query)) {
            // Filter MotorHarga based on the search query, matching 'harga_12_jam', 'harga_24_jam', etc.
            $motorsHarga = MotorHarga::whereHas('motor', function ($q) use ($query) {
                $q->where('merek', 'like', '%' . $query . '%') // Search in 'merek' column
                  ->orWhere('tipe', 'like', '%' . $query . '%') // Or search in 'tipe' column
                  ->orWhere('tahun', 'like', '%' . $query . '%'); // Or search in 'tahun' column
            })->paginate(10); // Paginate the results
        } else {
            // If no search query, return all records
            $motorsHarga = MotorHarga::paginate(10);
        }
        
        return view('admin.motorHarga.index', compact('motorsHarga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $motors = Motor::whereDoesntHave('motorHarga')->get();
        $selectedMotorId = $request->query('motor_id'); // Get the motor_id from the query string

        return view('admin.motorHarga.create', compact('motors', 'selectedMotorId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_motor' => 'required|exists:motors,id', // Ensure motor exists
            'harga_12_jam' => 'required|integer|min:0',
            'harga_24_jam' => 'required|integer|min:0',
            'harga_1_minggu' => 'required|integer|min:0',
            'harga_1_bulan' => 'required|integer|min:0',
        ]);
    
        // Create a new MotorHarga record
        MotorHarga::create([
            'id_motor' => $validated['id_motor'],
            'harga_12_jam' => $validated['harga_12_jam'],
            'harga_24_jam' => $validated['harga_24_jam'],
            'harga_1_minggu' => $validated['harga_1_minggu'],
            'harga_1_bulan' => $validated['harga_1_bulan'],
        ]);
    
        // Redirect back with success message
        return redirect()->route('admin.motorHarga.index')->with('success', 'Motor price added successfully.');
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
        // Retrieve the MotorHarga record by its ID
        $motorHarga = MotorHarga::findOrFail($id);

        // Retrieve all motors that do not yet have a price
        $motors = Motor::whereDoesntHave('motorHarga')->get();

        // Pass the motorHarga and motors to the view for editing
        return view('admin.motorHarga.edit', compact('motorHarga', 'motors'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'id_motor' => 'required|exists:motors,id', // Ensure motor exists
            'harga_12_jam' => 'required|integer|min:0',
            'harga_24_jam' => 'required|integer|min:0',
            'harga_1_minggu' => 'required|integer|min:0',
            'harga_1_bulan' => 'required|integer|min:0',
        ]);

        // Find the existing MotorHarga record
        $motorHarga = MotorHarga::findOrFail($id);

        // Update the record with the validated data
        $motorHarga->update([
            'id_motor' => $validated['id_motor'],
            'harga_12_jam' => $validated['harga_12_jam'],
            'harga_24_jam' => $validated['harga_24_jam'],
            'harga_1_minggu' => $validated['harga_1_minggu'],
            'harga_1_bulan' => $validated['harga_1_bulan'],
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.motorHarga.index')->with('success', 'Motor price updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MotorHarga::where('id', $id)->delete();
        return redirect()->route('admin.motorHarga.index')->with('success', 'Berhasil Menghapus Data');
    }
}
