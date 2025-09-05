<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsKeys = ['category'];

        foreach ($permissionsKeys as $key) {
            Permission::findOrCreate('read ' . $key, 'web');
            Permission::findOrCreate('create ' . $key, 'web');
            Permission::findOrCreate('update ' . $key, 'web');
            Permission::findOrCreate('delete ' . $key, 'web');
        }

        // Crear rol Administrador
        $adminRole = Role::findOrCreate('Administrator', 'web');

        // Asignar todos los permisos al rol Administrador
        $adminRole->syncPermissions(Permission::all());
    }
}
