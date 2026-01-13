<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'noTelepon'
    ];

    // Relasi: Pengguna memiliki banyak Pemesanan
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'idPengguna');
    }
}
