<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'create_dokter',
            'update_dokter',
            'delete_dokter',

            'create_ruang_rawat_inap',
            'update_ruang_rawat_inap',
            'delete_ruang_rawat_inap',

            'create_pasien',
            'update_pasien',
            'delete_pasien',

            'create_surveilans',
            'update_surveilans',
            'delete_surveilans',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        Role::create([
            'name' => 'superadmin',
        ]);

        Role::create([
            'name' => 'ipcn',
        ])->syncPermissions([
            'create_dokter',
            'update_dokter',
            'delete_dokter',

            'create_ruang_rawat_inap',
            'update_ruang_rawat_inap',

            'create_pasien',
            'update_pasien',

            'create_surveilans',
            'update_surveilans',
        ]);
    }
}
