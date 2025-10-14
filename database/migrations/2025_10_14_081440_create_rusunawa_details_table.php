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
        Schema::create('rusunawa_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rusunawa_id'); // FK ke tabel rusunawas
            
            // Info detail
            $table->string('kode')->nullable();
            $table->string('uprs')->nullable(); // UPRS VIII
            $table->string('kepala_uprs')->nullable();
            $table->decimal('luas_area_m2', 10, 2)->nullable();
            
            // Kartu Inventaris Barang
            $table->string('nomor_imb')->nullable();
            $table->string('nomor_slf')->nullable();
            
            // Pembangunan & Tarif
            $table->decimal('dana_pembangunan', 15, 2)->nullable();
            $table->enum('status_serah_terima', ['Belum', 'Sudah'])->default('Belum');
            $table->string('tahun_pembuatan')->nullable(); // 2017 - 2018
            $table->decimal('tarif_unit_terprogram', 15, 2)->nullable();
            $table->decimal('tarif_unit_umum', 15, 2)->nullable();
            $table->decimal('batas_maksimum_gaji', 15, 2)->nullable();
            
            // Lokasi
            $table->text('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota_kabupaten')->nullable();
            $table->text('embed_gmaps_url')->nullable(); // Link embed Google Maps
            
            // Fasilitas (JSON) - Admin input sendiri
            // Format: [{"nama": "MUSHOLAH", "jumlah": 1}, {"nama": "PAUD", "jumlah": 2}]
            $table->json('fasilitas')->nullable();
            
            // Galeri foto (JSON)
            // Format: [{"path": "uploads/foto1.jpg", "caption": "Tampak Depan"}]
            $table->json('galeri_foto')->nullable();
            
            $table->text('deskripsi')->nullable();
            
            $table->timestamps();
            
            $table->foreign('rusunawa_id')->references('id')->on('rusunawas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rusunawa_details');
    }
};
