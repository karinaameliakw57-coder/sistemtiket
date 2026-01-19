<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $primaryKey = 'id';


    protected $fillable = [
        'statusPemesanan'
    ];

    // Relasi ke Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'idPengguna');
    }

    // Relasi: Pemesanan memiliki banyak Detail
    public function details()
    {
        return $this->hasMany(DetailPemesanan::class, 'idPemesanan');
    }

    // Relasi: Pemesanan memiliki 1 pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'idPemesanan');
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'tiket_id');
    }
}
