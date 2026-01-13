<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pertandingan;
use App\Models\KursiVip;

class KursiVipSeeder extends Seeder
{
    public function run(): void
    {
        $pertandingan = Pertandingan::first();

        if (!$pertandingan) {
            $this->command->warn('Tidak ada data pertandingan!');
            return;
        }

        foreach (range('A', 'D') as $row) {
            for ($i = 1; $i <= 10; $i++) {
                KursiVip::create([
                    'pertandingan_id' => $pertandingan->id,
                    'nomor_kursi' => $row.$i,
                    'status' => 'tersedia'
                ]);
            }
        }
    }
}
