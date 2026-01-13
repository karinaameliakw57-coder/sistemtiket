<?php

namespace App\Http\Controllers;

use App\Models\Pertandingan;
use App\Models\Stadion;
use Illuminate\Http\Request;

class PertandinganController extends Controller
{
    // TAMPILKAN SEMUA PERTANDINGAN
    public function index()
    {
        $pertandingan = Pertandingan::with('stadion')->get();
        return view('pertandingan.index', compact('pertandingan'));
    }

    // FORM TAMBAH
    public function create()
    {
        $stadion = Stadion::all();
        return view('pertandingan.create', compact('stadion'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'namaPertandingan' => 'required',
            'timHome' => 'required',
            'timAway' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'idStadion' => 'required'
        ]);

        Pertandingan::create($request->all());

        return redirect()->route('pertandingan.index')
                         ->with('success', 'Data pertandingan berhasil ditambahkan!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        Pertandingan::findOrFail($id)->delete();

        return redirect()->route('pertandingan.index')
                         ->with('success', 'Data pertandingan berhasil dihapus!');
    }
}
