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
    public function index()
    {
           // Fetch all MotorsHarga records
        $motorsHarga = MotorHarga::paginate(5);

        // Pass the data to the view
        return view('admin.motorHarga.index', compact('motorsHarga'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $motors = Motor::all();
        return view('admin.motorHarga.create', compact('motors'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
