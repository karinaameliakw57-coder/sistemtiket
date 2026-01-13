<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;

class LandingController extends Controller
{
    public function index()
    {
        $pertandingan = Pertandingan::with('stadion')->get(); 
        return view('landing.index', compact('pertandingan'));
    }
}
