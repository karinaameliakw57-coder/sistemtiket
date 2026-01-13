<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'idPemesanan',
        'metodePembayaran',
        'jumlahBayar',
        'statusPembayaran',
        'tanggalPembayaran'
    ];

    // Relasi ke Pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'idPemesanan');
    }
}
