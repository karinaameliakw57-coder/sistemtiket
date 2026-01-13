<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Hapus kolom venue
     */
    public function up(): void
    {
        Schema::table('pertandingan', function (Blueprint $table) {
            $table->dropColumn('venue');
        });
    }

    /**
     * Tambahkan kembali kolom venue jika rollback
     */
    public function down(): void
    {
        Schema::table('pertandingan', function (Blueprint $table) {
            $table->string('venue')->nullable();
        });
    }
};
