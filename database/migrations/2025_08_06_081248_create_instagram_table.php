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
        Schema::create('instagram', function (Blueprint $table) {
            $table->id();
            $table->string('caption')->nullable(); // Judul atau keterangan
            $table->text('embed_code')->nullable(); // Simpan embed HTML Instagram
            $table->string('link')->nullable(); // Link asli Instagram
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instagram');
    }
};
