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
        Permission::findOrCreate('Ver Categorias', 'web');
        Permission::findOrCreate('Crear Categorias', 'web');
        Permission::findOrCreate('Editar Categorias', 'web');
        Permission::findOrCreate('Eliminar Categorias', 'web');

        // Crear roles (vacíos, sin permisos asignados todavía)
        Role::findOrCreate('Administrador', 'web');
    }
}
