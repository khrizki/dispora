<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JenisKerjaSamaSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('jenis_kerjasamas')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('jenis_kerjasamas')->insert([
            [
                'id' => Str::uuid(),
                'nama_jenis' => 'Mini Soccer',
                'deskripsi' => 'Kerjasama pengelolaan lapangan mini soccer.',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_jenis' => 'Futsal',
                'deskripsi' => 'Kerjasama penggunaan lapangan futsal.',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_jenis' => 'Renang',
                'deskripsi' => 'Kerjasama fasilitas kolam renang.',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_jenis' => 'Badminton',
                'deskripsi' => 'Kerjasama lapangan badminton.',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
