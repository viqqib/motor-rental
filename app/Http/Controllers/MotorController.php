<?php
// app/Http/Controllers/MotorController.php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\SocialLink;
use App\Models\WebsiteInfo;

class MotorController extends Controller
{
    public function index()
    {
        // Fetch all motors from the database
        // $motors = Motor::all();
        $motors = Motor::where('status', 'tersedia')->get();
        $rented_motors = Motor::where('status', 'tidak tersedia')->get();
        $socialLinks = SocialLink::all();
        $websiteInfo = WebsiteInfo::where('id', 1 )->first();
        // Return the data to the view
        return view('frontend.motor.index', compact('motors', 'rented_motors','socialLinks','websiteInfo'));
    }

    // app/Http/Controllers/MotorController.php

    public function show($id)
    {
        // Fetch the motor by ID
        $websiteInfo = WebsiteInfo::where('id', 1 )->first();
        $socialLinks = SocialLink::all();
        $whatsappNumber = SocialLink::where('name', 'whatsapp')->first();
        $motor = Motor::with('motorHarga')->find($id);

        // Pass the motor data and pricing to the view
        return view('frontend.motor.show', compact('motor','socialLinks','whatsappNumber', 'websiteInfo'));
;
    }

}
