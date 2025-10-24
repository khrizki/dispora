<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Kerjasama;

class KerjasamaSeeder extends BaseSeeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $namaMitra = $this->faker->company;
            $tanggalMulai = $this->faker->dateTimeBetween('-2 years', 'now');
            $tanggalSelesai = $this->faker->dateTimeBetween($tanggalMulai, '+1 years');

            Kerjasama::create([
                'id' => Str::uuid(),
                'slug' => Str::slug($namaMitra . '-' . $i),
                'nama_mitra' => $namaMitra,
                'jenis_kerjasama' => $this->faker->randomElement([
                    'Sponsorship',
                    'Pelatihan',
                    'Kegiatan Olahraga',
                    'Event Kolaborasi',
                    'CSR Program',
                    'Kampus Merdeka'
                ]),
                'tanggal_mulai' => $tanggalMulai->format('Y-m-d'),
                'tanggal_selesai' => $tanggalSelesai->format('Y-m-d'),
            ]);
        }
    }
}
