<?php
// app/Http/Controllers/MotorController.php

namespace App\Http\Controllers;

use App\Models\Motor;

class MotorController extends Controller
{
    public function index()
    {
        // Fetch all motors from the database
        // $motors = Motor::all();
        $motors = Motor::where('status', 'tersedia')->get();
        $rented_motors = Motor::where('status', 'tidak tersedia')->get();

        // Return the data to the view
        return view('frontend.motor.index', compact('motors', 'rented_motors'));
    }

    // app/Http/Controllers/MotorController.php

    public function show($id)
    {
        // Fetch the motor by ID
        $motor = Motor::with('motorHarga')->find($id);

        // Pass the motor data and pricing to the view
        return view('frontend.motor.show', compact('motor'));
;
    }

}
