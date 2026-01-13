<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    protected $table = 'detail_pemesanan';

    protected $fillable = [
        'idPemesanan',
        'idTiket',
        'kuantitas',
        'subtotal'
    ];

    // Relasi ke Pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'idPemesanan');
    }

    // Relasi ke Tiket
    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'idTiket');
    }
}
