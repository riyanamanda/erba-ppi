<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $spesialis = [
            'Gigi dan Mulut',
            'Penyakit Dalam',
            'Anak',
            'Bedah',
            'Obstetri dan Ginekologi',
            'Mata',
            'Saraf/Neurologi',
            'Kulit dan Kelamin',
            'Kedokteran Jiwa',
            'Radiologi',
            'Kedokteran Forensik',
            'Gizi Klinik',
            'Fisik dan Rehabilitasi',
        ];

        return [
            'nama' => fake()->unique()->name(),
            'spesialis' => fake()->randomElement($spesialis),
        ];
    }
}
