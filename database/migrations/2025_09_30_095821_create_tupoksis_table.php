<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tupoksis', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan'); 
            $table->longText('deskripsi')->nullable(); 
            $table->longText('fungsi')->nullable(); 
            $table->integer('urutan')->default(0); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tupoksis');
    }
};
