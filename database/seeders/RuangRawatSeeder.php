<?php

namespace Database\Seeders;

use App\Enums\KelasRuangan;
use App\Models\RuangRawatInap;
use Illuminate\Database\Seeder;

class RuangRawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama_ruangan = [
            'ASOKA',
            'BANGAU',
            'CAMAR',
            'CEMPAKA',
            'CENDRAWASIH',
            'KENANGA',
            'MERPATI',
        ];

        foreach ($nama_ruangan as $nama) {
            RuangRawatInap::create([
                'nama' => $nama,
                'kelas' => fake()->randomElement(KelasRuangan::cases()),
            ]);
        }
    }
}
