<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stadion extends Model
{
    protected $table = 'stadion';

    protected $fillable = [
        'namaStadion',
        'alamat',
        'kapasitas'
    ];

    // Relasi: 1 stadion memiliki banyak pertandingan
    public function pertandingan()
    {
        return $this->hasMany(Pertandingan::class, 'idStadion');
    }
}
