<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Kerjasama;
use App\Models\JenisKerjaSama;

class KerjasamaSeeder extends Seeder
{
    public function run(): void
    {
        $jenisKerjasamas = JenisKerjaSama::pluck('id');

        if ($jenisKerjasamas->isEmpty()) {
            $this->command->error('⚠️ Jalankan JenisKerjaSamaSeeder terlebih dahulu!');
            return;
        }

        for ($i = 1; $i <= 20; $i++) {
            $namaMitra = fake()->company();
            $tanggalMulai = fake()->dateTimeBetween('-2 years', 'now');
            $tanggalSelesai = fake()->dateTimeBetween($tanggalMulai, '+1 years');

            Kerjasama::create([
                'id' => Str::uuid(),
                'jenis_kerjasama_id' => $jenisKerjasamas->random(),
                'slug' => Str::slug($namaMitra . '-' . $i),
                'nama_mitra' => $namaMitra,
                'tanggal_mulai' => $tanggalMulai->format('Y-m-d'),
                'tanggal_selesai' => $tanggalSelesai->format('Y-m-d'),
            ]);
        }
    }
}
