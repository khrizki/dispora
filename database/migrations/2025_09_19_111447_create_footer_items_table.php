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
        Schema::create('footer_items', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // contoh: kontak, sosial, layanan, link_terkait
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('link')->nullable();
            $table->string('icon')->nullable(); // untuk media sosial / icon kontak
            $table->integer('order')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_items');
    }
};
