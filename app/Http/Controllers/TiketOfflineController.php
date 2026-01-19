<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use Illuminate\Support\Facades\DB;

class TiketOfflineController extends Controller
{
    // =========================
    // DAFTAR TIKET OFFLINE
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
                'kategori' => $tiket->kategoriKursi,
                'harga'    => $tiket->harga,
                'qty'      => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('tiket.offline.cart')
            ->with('success', 'Tiket berhasil ditambahkan ke keranjang');
    }

    // =========================
    // HAPUS DARI KERANJANG
    // =========================
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->tiket_id]);
        session()->put('cart', $cart);

        return back()->with('success', 'Tiket dihapus dari keranjang');
    }

    // =========================
    // CHECKOUT OFFLINE
    // =========================
  public function checkout()
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()
            ->route('tiket.offline.index')
            ->with('error', 'Keranjang masih kosong');
    }

    DB::beginTransaction();

    try {
        // SIMPAN PEMESANAN (HANYA KOLOM YANG ADA)
        $pemesanan = Pemesanan::create([
            'statusPemesanan' => 'offline',
        ]);

        // SIMPAN DETAIL PEMESANAN & KURANGI STOK
        foreach ($cart as $item) {
            DetailPemesanan::create([
                'idPemesanan' => $pemesanan->id,
                'idTiket'     => $item['tiket_id'],
                'kuantitas'   => $item['qty'],
                'subtotal'    => $item['qty'] * $item['harga'],
            ]);

            // Kurangi stok tiket sesuai kolom 'jumlahTersedia'
            $tiket = Tiket::find($item['tiket_id']);
            if ($tiket) {
                $tiket->jumlahTersedia = max(0, $tiket->jumlahTersedia - $item['qty']);
                $tiket->save();
            }
        }

        session()->forget('cart');
        DB::commit();

        return redirect()->route('tiket.offline.struk', $pemesanan->id);

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}


    // =========================
    // STRUK OFFLINE
    // =========================
    public function struk($id)
    {
        $pemesanan = Pemesanan::with('details.tiket.pertandingan')
            ->findOrFail($id);

        return view('tiket_offline.struk', compact('pemesanan'));
    }
}
