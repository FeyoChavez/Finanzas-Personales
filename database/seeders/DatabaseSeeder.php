<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria; // Añadido para usar el modelo Categoria


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'feyochavez',
            'email' => 'feyochavez@hotmail.com',
            'password' => 'adminadmin'
        ]);


        Categoria::create(['nombre'=>'Alimentacion', 'tipo'=>'gasto']);
        Categoria::create(['nombre'=>'Transporte', 'tipo'=>'ingreso']);
        Categoria::create(['nombre'=>'Salud', 'tipo'=>'gasto']);
        Categoria::create(['nombre'=>'Sueldos', 'tipo'=>'ingreso']);
        Categoria::create(['nombre'=>'Entretenimiento', 'tipo'=>'gasto']);
        Categoria::create(['nombre'=>'Otros', 'tipo'=>'gasto']);
        Categoria::create(['nombre'=>'Ahorros', 'tipo'=>'ingreso']);

    }
}
