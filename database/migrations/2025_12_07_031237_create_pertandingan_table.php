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
    Schema::create('pertandingan', function (Blueprint $table) {
        $table->id();
        $table->string('timHome');
        $table->string('timAway');
        $table->date('tanggal');
        $table->time('waktu');
        $table->string('venue');
        $table->foreignId('idStadion')->constrained('stadion');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertandingan');
    }
};
