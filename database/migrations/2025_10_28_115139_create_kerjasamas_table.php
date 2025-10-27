<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kerjasamas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('jenis_kerjasama_id')->nullable(); // FK ke jenis_kerjasamas
            $table->string('slug')->unique();
            $table->string('nama_mitra');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();

            // 🔗 Foreign key constraint
            $table->foreign('jenis_kerjasama_id')
                ->references('id')
                ->on('jenis_kerjasamas')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerjasamas');
    }
};
