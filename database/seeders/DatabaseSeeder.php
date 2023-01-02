<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dokter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Dokter::factory(20)->create();

        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            RuangRawatSeeder::class,
        ]);
    }
}
