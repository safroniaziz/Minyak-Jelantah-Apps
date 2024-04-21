<?php

namespace Database\Seeders;

use App\Models\Narahubung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NarahubungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $narahubungs = [
            [
                'judul' => 'Email',
                'kontak' => 'adminjelantah@mail.com'
            ],
            [
                'judul' => 'WhatsApp',
                'kontak' => '081367948313'
            ]
            // Tambahkan entri baru sesuai kebutuhan
        ];

        // Loop melalui setiap entri dan masukkan ke dalam database
        foreach ($narahubungs as $narahubung) {
            Narahubung::create($narahubung);
        }
    }
}
