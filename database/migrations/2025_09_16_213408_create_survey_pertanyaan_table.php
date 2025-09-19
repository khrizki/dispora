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
        Schema::create('survey_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->text('pertanyaan');
            $table->string('tipe')->default('text'); // text, pilihan, rating, dll.
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_pertanyaan');
    }
};
