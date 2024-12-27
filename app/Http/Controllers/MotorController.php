<?php
// app/Http/Controllers/MotorController.php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\SocialLink;

class MotorController extends Controller
{
    public function index()
    {
        // Fetch all motors from the database
        // $motors = Motor::all();
        $motors = Motor::where('status', 'tersedia')->get();
        $rented_motors = Motor::where('status', 'tidak tersedia')->get();
        $socialLinks = SocialLink::all();
        // Return the data to the view
        return view('frontend.motor.index', compact('motors', 'rented_motors','socialLinks'));
    }

    // app/Http/Controllers/MotorController.php

    public function show($id)
    {
        // Fetch the motor by ID
        $socialLinks = SocialLink::all();
        $motor = Motor::with('motorHarga')->find($id);

        // Pass the motor data and pricing to the view
        return view('frontend.motor.show', compact('motor','socialLinks'));
;
    }

}
