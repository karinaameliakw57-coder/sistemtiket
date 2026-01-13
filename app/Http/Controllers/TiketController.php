<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Pertandingan;
use App\Models\KursiVip;

use Illuminate\Http\Request;

class TiketController extends Controller
{
    // ================================
    // TAMPILAN LIST DATA
    // ================================
    public function index()
    {
        $tiket = Tiket::with('pertandingan')->get();

        foreach ($tiket as $t) {
            if ($t->kategoriKursi === 'VIP') {
                $t->stok_vip = KursiVip::where('pertandingan_id', $t->idPertandingan)
                    ->where('status', 'tersedia')
                    ->count();
            } else {
                $t->stok_vip = $t->jumlahTersedia;
            }
        }

        return view('tiket.index', compact('tiket'));
    }
    // ================================
    // TAMPILAN FORM TAMBAH
    // ================================
    public function create()
    {
        $pertandingan = Pertandingan::all();
        return view('tiket.create', compact('pertandingan'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'idPertandingan' => 'required|exists:pertandingan,id',
            'harga' => 'required|numeric',
            'kategoriKursi' => 'required',
            'jumlahTersedia' => 'required|integer'
        ]);

        Tiket::create($request->only([
            'idPertandingan',
            'harga',
            'kategoriKursi',
            'jumlahTersedia'
        ]));

        return redirect()->route('tiket.index')
            ->with('success', 'Tiket berhasil ditambahkan');
    }

    public function show($id)
{
    $tiket = Tiket::findOrFail($id);
    return view('tiket.show', compact('tiket'));
}


    // ================================
    // TAMPILAN EDIT
    // ================================
    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);
        $pertandingan = Pertandingan::all();
        return view('tiket.edit', compact('tiket', 'pertandingan'));
    }

    // PROSES UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'pertandingan_id' => 'required',
            'jenis_tiket'     => 'required',
            'harga'           => 'required',
            'stok'            => 'required|integer'
        ]);

        $tiket = Tiket::findOrFail($id);

        $tiket->update([
            'idPertandingan' => $request->pertandingan_id,
            'kategoriKursi'  => $request->jenis_tiket,
            'harga'          => str_replace('.', '', $request->harga),
            'jumlahTersedia' => $request->stok,
        ]);

        return redirect()
            ->route('tiket.index')
            ->with('success', 'Tiket berhasil diperbarui!');
    }


    // ================================
    // HAPUS DATA
    // ================================
    public function destroy($id)
    {
        Tiket::findOrFail($id)->delete();

        return redirect()->route('tiket.index')->with('success', 'Tiket dihapus!');
    }

    public function pilihKursi($pertandinganId)
    {
        $kursi = KursiVip::where('pertandingan_id', $pertandinganId)->get();

        return view('tiket.pilih_kursi', compact('kursi', 'pertandinganId'));
    }

    public function beliVip(Request $request)
    {
        $request->validate([
            'kursi_id' => 'required|exists:kursi_vip,id'
        ]);

        $kursi = KursiVip::where('id', $request->kursi_id)
            ->where('status', 'tersedia')
            ->first();

        if (!$kursi) {
            return back()->with('error', 'Kursi sudah dipesan!');
        }

        // Update kursi
        $kursi->update(['status' => 'dipesan']);

        return redirect()->route('tiket.index')
            ->with('success', 'Tiket VIP berhasil dibeli');
    }

    public function halamanVip($pertandingan)
    {
        $pertandingan = Pertandingan::findOrFail($pertandingan);

        $kursiVip = KursiVip::where('pertandingan_id', $pertandingan->id)
            ->orderBy('nomor_kursi')
            ->get();

        return view('tiket.vip', compact('pertandingan', 'kursiVip'));
    }

    public function createVip()
    {
        $pertandingan = Pertandingan::all();
        return view('tiket.create-vip', compact('pertandingan'));
    }

    public function storeVip(Request $request)
    {
        $request->validate([
            'idPertandingan' => 'required|exists:pertandingan,id',
            'harga' => 'required|numeric',
        ]);

        Tiket::create([
            'idPertandingan' => $request->idPertandingan, // ✅ BENAR
            'harga' => $request->harga,
            'kategoriKursi' => 'VIP',
            'jumlahTersedia' => 0, // ✅ WAJIB ANGKA
        ]);

        return redirect()->route('tiket.index')
            ->with('success', 'Tiket VIP berhasil ditambahkan');
    }
}
