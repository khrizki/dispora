<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visimisis', function (Blueprint $table) {
            $table->id();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->timestamps();
        });

        // Insert default empty row (karena cuma 1 data)
        DB::table('visimisis')->insert([
            'visi' => '',
            'misi' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visimisis');
    }
};
