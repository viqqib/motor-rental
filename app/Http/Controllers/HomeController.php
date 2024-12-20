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

        // Pass the motors to the home view
        return view('frontend.home', compact('motors'));
    }
}
