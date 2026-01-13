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
    Schema::create('detail_pemesanan', function (Blueprint $table) {
        $table->id();
        $table->foreignId('idPemesanan')
              ->constrained('pemesanan')
              ->onDelete('cascade'); // komposisi
        $table->foreignId('idTiket')->constrained('tiket');
        $table->integer('kuantitas');
        $table->double('subtotal');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pemesanan');
    }
};
