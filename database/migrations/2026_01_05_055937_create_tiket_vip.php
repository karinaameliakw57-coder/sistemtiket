<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tiket_vip', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pertandingan_id')
                ->constrained('pertandingan')
                ->onDelete('cascade');

            $table->string('nomor_kursi'); // A1, A2, B1, dll
            $table->integer('harga');

            $table->enum('status', ['tersedia', 'dibooking', 'terjual'])
                ->default('tersedia');

            $table->timestamps();

            // Biar satu kursi tidak dobel di pertandingan yang sama
            $table->unique(['pertandingan_id', 'nomor_kursi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket_vip');
    }
};
