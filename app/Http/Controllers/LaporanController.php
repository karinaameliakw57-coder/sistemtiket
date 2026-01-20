<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporanPenjualan(Request $request)
    {
        $query = DB::table('detail_pemesanan')
            ->select(
                'pemesanan.id as id_pemesanan',
                'pemesanan.created_at as tanggal',
                'pertandingan.namaPertandingan',
                'pertandingan.timHome',
                'pertandingan.timAway',
                DB::raw("
                    GROUP_CONCAT(
                        CONCAT(
                            tiket.kategoriKursi,
                            ' (',
                            detail_pemesanan.kuantitas,
                            ')'
                        ) SEPARATOR ', '
                    ) as detail_kursi
                "),
                DB::raw('SUM(detail_pemesanan.subtotal) as total_bayar')
            )
            ->join('pemesanan', 'detail_pemesanan.idPemesanan', '=', 'pemesanan.id')
            ->join('tiket', 'detail_pemesanan.idTiket', '=', 'tiket.id')
            ->join('pertandingan', 'tiket.idPertandingan', '=', 'pertandingan.id');

        // ✅ FILTER TANGGAL
        if ($request->start_date && $request->end_date) {
            $query->whereBetween('pemesanan.created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $laporan = $query
            ->groupBy(
                'pemesanan.id',
                'pemesanan.created_at',
                'pertandingan.namaPertandingan',
                'pertandingan.timHome',
                'pertandingan.timAway'
            )
            ->orderBy('pemesanan.created_at', 'desc')
            ->get();

        // ✅ TOTAL SEMUA PENJUALAN (mengikuti filter)
        $grandTotal = $laporan->sum('total_bayar');

        return view('laporan.penjualan', compact('laporan', 'grandTotal'));
    }
}
