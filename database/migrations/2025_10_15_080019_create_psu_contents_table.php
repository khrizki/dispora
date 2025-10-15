<?php

// database/migrations/2025_10_15_000001_create_psu_contents_table.php
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
        Schema::create('psu_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique();
            $table->string('section_title'); 
            $table->enum('content_type', [
                'program',      
                'statistic',    
                'report',       
                'gallery',      
                'info'          
            ])->default('program');
            
            $table->longText('content')->nullable();
            $table->json('data')->nullable(); 
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_published')->default(false); 
            
            $table->timestamps();
        
            $table->index('section_key');
            $table->index('content_type');
            $table->index('order');
            $table->index('is_active');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psu_contents');
    }
};