<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // TAMPIL SEMUA PEMBAYARAN
    public function index()
    {
        $pembayaran = Pembayaran::with('pemesanan')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    // FORM TAMBAH PEMBAYARAN
    public function create()
    {
        $pemesanan = Pemesanan::all();
        return view('pembayaran.create', compact('pemesanan'));
    }

    // SIMPAN PEMBAYARAN
    public function store(Request $request)
    {
        $request->validate([
            'idPemesanan' => 'required',
            'metodePembayaran' => 'required',
            'jumlahBayar' => 'required|numeric',
            'statusPembayaran' => 'required',
            'tanggalPembayaran' => 'required|date'
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')
                         ->with('success', 'Pembayaran berhasil ditambahkan!');
    }

    // FORM EDIT PEMBAYARAN
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pemesanan = Pemesanan::all();

        return view('pembayaran.edit', compact('pembayaran','pemesanan'));
    }

    // UPDATE PEMBAYARAN
    public function update(Request $request, $id)
    {
        $request->validate([
            'idPemesanan' => 'required',
            'metodePembayaran' => 'required',
            'jumlahBayar' => 'required|numeric',
            'statusPembayaran' => 'required',
            'tanggalPembayaran' => 'required|date'
        ]);

        $bayar = Pembayaran::findOrFail($id);
        $bayar->update($request->all());

        return redirect()->route('pembayaran.index')
                         ->with('success', 'Data pembayaran berhasil diperbarui!');
    }
}
