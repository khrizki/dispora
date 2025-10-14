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
        Schema::create('rtlh_contents', function (Blueprint $table) {
            $table->id();

            $table->string('section_key')->unique();
            
            $table->string('section_title'); 
            $table->enum('content_type', ['text', 'gallery', 'download', 'faq'])->default('text');
            
          
            $table->longText('content')->nullable(); 
            $table->json('data')->nullable();
            
            // Metadata
            $table->integer('order')->default(0); 
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
            
            $table->index('section_key');
            $table->index('content_type');
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rtlh_contents');
    }
};