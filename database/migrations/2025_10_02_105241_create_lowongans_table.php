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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');              // Judul lowongan
            $table->string('posisi')->nullable(); // Nama posisi yang dicari (optional)
            $table->text('deskripsi');            // Konten pakai Summernote (HTML)
            $table->string('lokasi')->nullable(); // Contoh: "Padang" atau "Dinas PERKIM Kota Padang"
            $table->string('tipe')->nullable();   // Contoh: "Kontrak", "Magang", "Honorer"
            $table->string('status')->default('aktif'); // aktif / ditutup
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
