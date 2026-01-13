<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DetailPemesananController extends Controller
{
    // TAMPILKAN DETAIL BERDASARKAN ID PEMESANAN
    public function index($idPemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($idPemesanan);
        $detail = DetailPemesanan::with('tiket')
            ->where('idPemesanan', $idPemesanan)
            ->get();

        return view('detail.index', compact('pemesanan', 'detail'));
    }

    // FORM TAMBAH
    public function create($idPemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($idPemesanan);
        $tiket = Tiket::all();

        return view('detail.create', compact('pemesanan','tiket'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'idPemesanan' => 'required',
            'idTiket' => 'required',
            'kuantitas' => 'required|integer|min:1',
            'subtotal' => 'required'
        ]);

        DetailPemesanan::create($request->all());

        return redirect()->route('detail.index', $request->idPemesanan)
                         ->with('success', 'Detail pemesanan berhasil ditambahkan!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $detail = DetailPemesanan::findOrFail($id);
        $idPemesanan = $detail->idPemesanan;

        $detail->delete();

        return redirect()->route('detail.index', $idPemesanan)
                         ->with('success', 'Detail pemesanan berhasil dihapus!');
    }
}
