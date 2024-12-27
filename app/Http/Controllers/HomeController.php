<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\HomepageContent;
use App\Models\Motor;
use App\Models\SocialLink;
use App\Models\WebsiteInfo;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the first 4 motors with status 'tersedia'
        $motors = Motor::where('status', 'tersedia')->limit(4)->get();

        $availableCount = Motor::where('status', 'tersedia')->count();

        $facebook = SocialLink::where('name', 'Facebook')->first();
        $socialLinks = SocialLink::all();
        $websiteInfo = WebsiteInfo::where('id', 1 )->first();
        $heroContents = HomepageContent::where('section', 'hero')->first();
        // Pass the motors and count to the home view
        return view('frontend.home', compact('motors', 'availableCount', 'heroContents', 'socialLinks', 'facebook', 'websiteInfo'));
        // Pass the motors to the home view
    }
}
