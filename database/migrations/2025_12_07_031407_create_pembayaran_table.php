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
    Schema::create('pembayaran', function (Blueprint $table) {
        $table->id();
        $table->foreignId('idPemesanan')->constrained('pemesanan');
        $table->string('metodePembayaran');
        $table->double('jumlahBayar');
        $table->string('statusPembayaran');
        $table->date('tanggalPembayaran');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
