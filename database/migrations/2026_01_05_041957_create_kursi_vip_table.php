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
   Schema::create('kursi_vip', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pertandingan_id')
          ->constrained('pertandingan')
          ->onDelete('cascade');
    $table->string('nomor_kursi');
    $table->enum('status', ['tersedia', 'dipesan'])->default('tersedia');
    $table->timestamps();
});

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursi_vip');
    }
};
