<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    // ============================
    //  TAMPILAN REGISTER
    // ============================
    public function registerPage()
    {
        return view('auth.register');
    }

    // PROSES REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'namaPengguna' => 'required',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|min:6',
            'noTelepon' => 'required'
        ]);

        Pengguna::create([
            'namaPengguna' => $request->namaPengguna,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'noTelepon' => $request->noTelepon
        ]);

        return redirect()->route('login.page')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ============================
    //  TAMPILAN LOGIN
    // ============================
    public function loginPage()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $pengguna = Pengguna::where('email', $request->email)->first();

        if (!$pengguna || !Hash::check($request->password, $pengguna->password)) {
            return back()->with('error', 'Email atau password salah!');
        }

        // simpan user ke session
        session([
            'login' => true,
            'user' => $pengguna
        ]);

        return redirect()->route('dashboard');
    }

    // ============================
    //  LOGOUT
    // ============================
    public function logout()
    {
        session()->flush();
        return redirect()->route('login.page');
    }
}
