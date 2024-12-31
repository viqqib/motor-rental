<?php
// app/Http/Controllers/MotorController.php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\SocialLink;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');
    
        // Apply search and filter conditions
        $motors = Motor::where('status', 'tersedia')
                       ->when($search, function ($query, $search) {
                           return $query->where('tipe', 'like', "%$search%")
                                        ->orWhere('merek', 'like', "%$search%");
                       })
                       ->when($filter, function ($query, $filter) {
                           if ($filter == 'available') {
                               return $query->where('status', 'tersedia');
                           } elseif ($filter == 'rented') {
                               return $query->where('status', 'tidak tersedia');
                           }
                       })
                       ->get();
    
        // Handle no results case
        $message = $motors->isEmpty() ? 'Motor tidak ditemukan' : null;
    
        $rented_motors = Motor::where('status', 'tidak tersedia')->get();
        $socialLinks = SocialLink::all();
        $websiteInfo = WebsiteInfo::where('id', 1)->first();
    
        return view('frontend.motor.index', compact('motors', 'rented_motors', 'socialLinks', 'websiteInfo', 'message'));
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
