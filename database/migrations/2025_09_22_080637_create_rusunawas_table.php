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
       Schema::create('rusunawas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');   // foreign key ke areas
            $table->string('nama');                  // nama rusunawa
            $table->integer('jumlah_tower')->nullable();
            $table->integer('jumlah_blok')->nullable();
            $table->integer('total_unit')->nullable();
            $table->string('tipe_unit')->nullable();
            $table->integer('jumlah_unit_kosong')->nullable();
            $table->string('pengelola')->nullable();
            $table->string('nomor_hotline')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rusunawas');
    }
};
