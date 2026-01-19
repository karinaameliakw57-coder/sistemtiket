<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pengguna;
use App\Models\Tiket;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // TAMPILKAN SEMUA PEMESANAN
  public function index()
{
    $tiket = Tiket::with('pertandingan')->get();
    return view('pemesanan.index', compact('tiket'));
}


    // FORM TAMBAH PEMESANAN
    public function create()
    {
        $pengguna = Pengguna::all(); // pilih siapa pemesannya
        return view('pemesanan.create', compact('pengguna'));
    }

    // SIMPAN PEMESANAN
    public function store(Request $request)
    {
        $request->validate([
            'idPengguna' => 'required',
            'tanggalPemesanan' => 'required|date',
            'statusPemesanan' => 'required'
        ]);

        Pemesanan::create($request->all());

        return redirect()->route('pemesanan.index')
                         ->with('success', 'Pemesanan berhasil ditambahkan!');
    }

    // DETAIL PEMESANAN
    /*public function show($id)
    {
        $pemesanan = Pemesanan::with('detail.tiket', 'pengguna')->findOrFail($id);
        return view('pemesanan.show', compact('pemesanan'));
    }

    // FORM EDIT
    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pengguna = Pengguna::all();
        return view('pemesanan.edit', compact('pemesanan','pengguna'));
    }

    // UPDATE PEMESANAN
    public function update(Request $request, $id)
    {
        $request->validate([
            'idPengguna' => 'required',
            'tanggalPemesanan' => 'required|date',
            'statusPemesanan' => 'required'
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($request->all());

        return redirect()->route('pemesanan.index')
                         ->with('success', 'Pemesanan berhasil diperbarui!');
    }

    // HAPUS PEMESANAN
    public function destroy($id)
    {
        Pemesanan::findOrFail($id)->delete();

        return redirect()->route('pemesanan.index')
                         ->with('success', 'Pemesanan berhasil dihapus!');
    }*/
}
