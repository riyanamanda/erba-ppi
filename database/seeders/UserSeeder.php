<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Riyan Amanda',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
        ])
        ->assignRole('superadmin');

        User::create([
            'name' => 'Amanda Nasution',
            'email' => 'ipcn@email.com',
            'password' => Hash::make('password'),
        ])
        ->assignRole('ipcn');
    }
}
