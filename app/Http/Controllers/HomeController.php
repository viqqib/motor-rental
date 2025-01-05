<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\HomepageContent;
use App\Models\Motor;
use App\Models\Review;
use App\Models\SocialLink;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the first 4 motors with status 'tersedia'
        $motors = Motor::where('status', 'tersedia')->limit(4)->get();

        $motorsAll = Motor::all();
        $availableCount = Motor::where('status', 'tersedia')->count();
        //review
        $reviews = Review::all();


        $facebook = SocialLink::where('name', 'Facebook')->first();
        $socialLinks = SocialLink::all();
        $websiteInfo = WebsiteInfo::where('id', 1 )->first();
        $heroContents = HomepageContent::where('section', 'hero')->first();
        // Pass the motors and count to the home view

        return view('frontend.home', compact('motors', 'availableCount', 'heroContents', 'socialLinks', 'facebook', 'websiteInfo', 'reviews', 'motorsAll'));
        // Pass the motors to the home view
    }

    // public function showReview() {
 
    //     return view('frontend.home_review');
    // }

    public function storeReview(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_motor' => 'required',
            'email' => 'required|email|max:255',
            'review' => 'required|string',
        ]);

        // Create a new review record
        Review::create($validated);

        // Redirect back to the homepage with a success message
        return redirect()->route('home')->with('success', 'Ulasan Anda telah berhasil dikirim!');
    }
}
