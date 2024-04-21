<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'nama_lengkap' => 'Administrator',
            'email' => 'admin@example.com',
            'nomor_whatsapp' => '081234567890', // Nilai dummy
            'alamat' => $faker->address(), // Menggunakan Faker untuk alamat acak
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang diinginkan
            'email_verified_at' => now(),
        ]);
    }
}
