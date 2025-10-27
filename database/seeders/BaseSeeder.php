<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BaseSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        // ✅ Gunakan locale Indonesia
        $this->faker = Faker::create('id_ID');
    }
}
