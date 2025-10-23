<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         User::create([
            "name"     => "Admin",
            "email"    => "admindispora@padang.go.id", // gunakan huruf kecil biar konsisten
            "password" => Hash::make("Admin12345"),
            // "role"=> "admin",
        ]);
    }
}
