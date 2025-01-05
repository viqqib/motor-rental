<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\Rental;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index()
    {

        $today = Carbon::today(); // Start of today
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY); // Start of the current week (Monday)
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY); // End of the current week (Sunday)
        $startOfMonth = Carbon::now()->startOfMonth(); // Start of the current month
        $endOfMonth = Carbon::now()->endOfMonth();

        // Get counts
        $rentedToday = Rental::whereDate('tgl_mulai', $today)->count();
        $rentedThisWeek = Rental::whereBetween('tgl_mulai', [$startOfWeek, $endOfWeek])->count();
        $rentedThisMonth = Rental::whereBetween('tgl_mulai', [$startOfMonth, $endOfMonth])->count();

            // Admin dashboard logic
        $availableMotors = Motor::where('status', 'tersedia')->get();
        $bookedMotors = Rental::where('status', 'dipesan')->get();
        $rentedMotors = Rental::where('status', 'dirental')->get();
        $maintenancedMotors = Motor::where('status', 'perawatan')->get();
        return view('admin.dashboard', compact('availableMotors', 'rentedMotors', 'maintenancedMotors', 'rentedToday', 'rentedThisWeek', 'rentedThisMonth', 'bookedMotors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
