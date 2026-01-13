<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    protected $table = 'pertandingan';

    protected $fillable = [
        'namaPertandingan',
        'timHome',
        'timAway',
        'tanggal',
        'waktu',
        'idStadion'
    ];

    // Relasi: ke Stadion
    public function stadion()
    {
        return $this->belongsTo(Stadion::class, 'idStadion');
    }

    // Relasi: pertandingan memiliki banyak tiket
    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'idPertandingan');
    }

      public function kursiVip()
    {
        return $this->hasMany(KursiVip::class);
    }

public function tiketVip()
{
    return $this->hasMany(TiketVip::class);
}

    
}
