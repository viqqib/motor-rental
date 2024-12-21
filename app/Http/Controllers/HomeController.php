<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Motor;

class HomeController extends Controller
{
    public function showAvailableBikes()
    {
        // Fetch the first 4 motors with status 'tersedia'
        $motors = Motor::where('status', 'tersedia')->limit(4)->get();

        $availableCount = Motor::where('status', 'tersedia')->count();

        // Pass the motors and count to the home view
        return view('frontend.home', compact('motors', 'availableCount'));
        // Pass the motors to the home view
    }
}
