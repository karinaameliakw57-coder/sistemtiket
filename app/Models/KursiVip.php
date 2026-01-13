<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KursiVip extends Model
{
    protected $table = 'kursi_vip';

    protected $fillable = [
        'pertandingan_id',
        'nomor_kursi',
        'status'
    ];

    public function pertandingan()
    {
        return $this->belongsTo(Pertandingan::class);
    }
}
