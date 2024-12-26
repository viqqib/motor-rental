<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('admin.session.index');
    }

    function login(Request $request)
    {
        Session::flash('email',$request->email);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus terdiri dari minimal 6 karakter.'
        ]);
        $infologin =  [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($infologin)){
            //If success
            return redirect('admin/')->with('success', "Berhasil login");
        } else {
            //if fail
            return redirect('admin/session/')->withErrors('Username dan password tidak ditemukan');
        }

    }

    function logout(){
        Auth::logout();
        return redirect('admin/session')->with('success', "Berhasil Logout");
    }

    function register()
    {
        return view('admin/session/register');
    }


    function create(Request $request)
    {
    // Flash input values to the session for use in case of errors
    Session::flash('name', $request->name);
    Session::flash('email', $request->email);

    // Validation rules
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ], [
        'name.required' => 'Nama wajib diisi.',
        'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password harus terdiri dari minimal 6 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak sesuai.',
    ]);

    // Create the user
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ];

    User::create($data);

    $infologin = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if(Auth::attempt($infologin)){
        //If success
        return redirect('admin/session/')->with('success', 'Registrasi berhasil. Silakan login.');
    } else {
        //if fail
        return redirect('admin/session/')->withErrors('Username dan password tidak ditemukan');
    }

    // Redirect with success message
   
    }
}
