<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // =====================
    // FORM LOGIN
    // =====================
    public function loginForm()
    {
        return view('auth.login');
    }

    // =====================
    // PROSES LOGIN
    // =====================
   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/tiket'); // semua user ke halaman yang sama
    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ]);
}


    // =====================
    // FORM REGISTER
    // =====================
   // public function registerForm()
   // {
    //    return view('register');
   // }

    // =====================
    // PROSES REGISTER
    // =====================
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }

    // =====================
    // LOGOUT
    // =====================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}
