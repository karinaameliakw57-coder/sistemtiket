<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';

    protected $fillable = [
        'idPertandingan',
        'kategoriKursi',
        'harga',
        'jumlahTersedia'
    ];

    // Relasi ke Pertandingan
    public function pertandingan()
    {
        return $this->belongsTo(Pertandingan::class, 'idPertandingan');
    }

    // Relasi: Tiket muncul di banyak detail pemesanan
    public function detailPemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'idTiket');
    }
}
