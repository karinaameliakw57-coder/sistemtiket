<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use Illuminate\Support\Facades\DB;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use App\Models\Pembayaran;

class TiketOfflineController extends Controller
{
    // =========================
    // HALAMAN DAFTAR TIKET OFFLINE
    // =========================
    public function index()
    {
        $tikets = Tiket::with('pertandingan')->get();

        return view('tiket_offline.index', compact('tikets'));
    }

    // =========================
    // KERANJANG
    // =========================
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('tiket_offline.cart', compact('cart'));
    }

    // =========================
    // TAMBAH KE KERANJANG
    // =========================
    public function addToCart(Request $request)
    {
        $tiket = Tiket::with('pertandingan')->findOrFail($request->tiket_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$tiket->id])) {
            $cart[$tiket->id]['qty']++;
        } else {
            $cart[$tiket->id] = [
                'tiket_id' => $tiket->id,
                'nama'     => $tiket->pertandingan->namaPertandingan,
                'jenis'    => $tiket->kategoriKursi,
                'harga'    => $tiket->harga,
                'qty'      => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('tiket.offline.cart')
            ->with('success', 'Tiket berhasil ditambahkan ke keranjang');
    }

    // =========================
    // CHECKOUT
    // =========================
    public function checkout(Request $request)
{
    $cart = session()->get('cart', []);

    if (count($cart) == 0) {
        return redirect()->route('tiket.offline.index')
            ->with('error', 'Keranjang kosong');
    }

    DB::beginTransaction();

    try {
        // =========================
        // 1. SIMPAN PEMESANAN
        // =========================
        $pemesanan = Pemesanan::create([
            'user_id' => auth()->id(),
            'tanggal_pemesanan' => now(),
            'status' => 'offline'
        ]);

        $total = 0;

        // =========================
        // 2. SIMPAN DETAIL PEMESANAN
        // =========================
        foreach ($cart as $item) {
            $subtotal = $item['harga'] * $item['qty'];
            $total += $subtotal;

            DetailPemesanan::create([
                'pemesanan_id' => $pemesanan->id,
                'tiket_id' => $item['id'],
                'jumlah' => $item['qty'],
                'harga' => $item['harga'],
                'subtotal' => $subtotal
            ]);
        }

        // =========================
        // 3. SIMPAN PEMBAYARAN
        // =========================
        Pembayaran::create([
            'pemesanan_id' => $pemesanan->id,
            'tanggal_bayar' => now(),
            'total_bayar' => $total,
            'metode_bayar' => 'offline',
            'status' => 'lunas'
        ]);

        // =========================
        // 4. KOSONGKAN KERANJANG
        // =========================
        session()->forget('cart');

        DB::commit();

        return redirect()->route('pemesanan.show', $pemesanan->id)
            ->with('success', 'Transaksi offline berhasil');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}

}
