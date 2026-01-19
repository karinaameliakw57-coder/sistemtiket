<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;

class PemesananApiController extends Controller
{
    public function show($id)
    {
        $pemesanan = Pemesanan::with([
            'details.tiket.pertandingan'
        ])->find($id);

        if (!$pemesanan) {
            return response()->json([
                'status' => false,
                'message' => 'Data pemesanan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => [
                'id_transaksi' => $pemesanan->id,
                'tanggal' => $pemesanan->created_at,
                'status' => $pemesanan->statusPemesanan,
                'total_qty' => $pemesanan->details->sum('kuantitas'),
                'total_bayar' => $pemesanan->details->sum('subtotal'),
                'tiket' => $pemesanan->details->map(function ($item) {
                    return [
                        'pertandingan' =>
                            optional($item->tiket->pertandingan)->timHome .
                            ' vs ' .
                            optional($item->tiket->pertandingan)->timAway,
                        'kategori' => $item->tiket->kategoriKursi,
                        'harga' => $item->tiket->harga,
                        'qty' => $item->kuantitas,
                        'subtotal' => $item->subtotal,
                    ];
                })
            ]
        ]);
    }
}
