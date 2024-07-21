<?php

namespace Database\Seeders;

use App\Models\Cancha;
use App\Models\Cocimiento;
use App\Models\Fermentacion;
use App\Models\Malteria;
use App\Models\TemperaturaCocimiento;
use App\Models\TemperaturaMalteria;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Fermentacion::factory(25)->create();

        Cancha::factory()->create([
            'nombre' => 'Cancha 1',
        ]);
        Cancha::factory()->create([
            'nombre' => 'Cancha 2',
        ]);

        Cocimiento::factory(10)->create();
        TemperaturaCocimiento::factory(10)->create();

        Malteria::factory(10)->create();
        TemperaturaMalteria::factory(10)->create();

        $this->call(RoleSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Prueba',
            'email' => 'prueba@example.com',
            'password' => 'password',
        ])->assignRole('administrador');

        User::factory()->create([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => 'password',
        ])->assignRole('usuario');
    }
}
