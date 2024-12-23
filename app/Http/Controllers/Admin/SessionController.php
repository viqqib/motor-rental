<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class SessionController extends Controller
{
    function index()
    {
        return view('admin.session.index');
    }

    function login(Request $request)
    {

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
            return redirect('admin/')->with('success', "Berhasil Masuk");
        } else {
            //if fail
            return redirect('admin/session/')->withErrors('Username dan password tidak ditemukan');
        }

    }
}
