<?php

namespace App\Http\Controllers;

use App\Models\KursiVip;
use App\Models\Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KursiVipController extends Controller
{

   public function index()
{
    $kursiVip = KursiVip::with('pertandingan')
        ->orderBy('pertandingan_id')
        ->orderBy('nomor_kursi')
        ->get();

    return view('kursi_vip.index', compact('kursiVip'));
}


    // ===============================
    // FORM TAMBAH KURSI VIP (ADMIN)
    // ======== =======================
    public function create()
    {
        $pertandingan = Pertandingan::all();
        return view('kursi_vip.create', compact('pertandingan'));
    }

    // ===============================
    // SIMPAN & GENERATE KURSI VIP
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'pertandingan_id' => 'required',
            'baris' => 'required',
            'jumlah' => 'required|integer|min:1'
        ]);

        for ($i = 1; $i <= $request->jumlah; $i++) {
            KursiVip::create([
                'pertandingan_id' => $request->pertandingan_id,
                'nomor_kursi' => $request->baris . $i,
                'status' => 'tersedia'
            ]);
        }

        return redirect()->back()->with('success', 'Kursi VIP berhasil ditambahkan');
    }

    // ===============================
    // HALAMAN PILIH KURSI (PEMBELI)
    // ===============================
    public function pilihKursi($pertandingan)
    {
        $pertandingan = Pertandingan::findOrFail($pertandingan);

        $kursi = KursiVip::where('pertandingan_id', $pertandingan->id)
            ->orderBy('nomor_kursi')
            ->get();

        return view('kursi_vip.pilih', compact('pertandingan', 'kursi'));
    }

    // ===============================
    // BELI & LOCK KURSI VIP
    // ===============================
   public function beli(Request $request)
{
    $request->validate([
        'kursi_id' => 'required|array',
        'kursi_id.*' => 'exists:kursi_vip,id',
    ]);

    DB::transaction(function () use ($request) {
        foreach ($request->kursi_id as $id) {
            $kursi = KursiVip::lockForUpdate()->find($id);
            if ($kursi->status !== 'tersedia') {
                abort(409, 'Kursi sudah dipesan: ' . $kursi->nomor_kursi);
            }
            $kursi->update(['status' => 'dipesan']);
        }
    });

    return redirect()->back()->with('success', 'Kursi VIP berhasil dipesan');
}

}
