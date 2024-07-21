<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrador = Role::create(['name' => 'administrador']);
        $usuario = Role::create(['name' => 'usuario']);

        $permissionReports = Permission::create(['name' => 'reports'])->assignRole($administrador);
    }
}
