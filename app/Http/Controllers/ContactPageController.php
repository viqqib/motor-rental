<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index() {
        $socialLinks = SocialLink::all();
        $websiteInfo = WebsiteInfo::where('id', 1 )->first();
        return view('frontend.contact', compact('websiteInfo', 'socialLinks'));
    }
}
