<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        User::create([
            'name' => 'Teo Montalvo',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Takeshi Kanashiro',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');

        User::create([
            'name' => 'Oscar Oros',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Erick Lopez',
            'email' => 'user4@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::factory(99)->create();
        
        Categoria::create([
            'nombre' => 'Frutas'
        ]);

        Categoria::create([
            'nombre' => 'Verduras'
        ]);

        Categoria::create([
            'nombre' => 'Lacteos'
        ]);

        Categoria::create([
            'nombre' => 'Juguetes'
        ]);

        Categoria::create([
            'nombre' => 'Ropa'
        ]);

        Categoria::create([
            'nombre' => 'Herramientas'
        ]);

        Marca::create([
            'nombre' => 'Samsung'
        ]);

        Marca::create([
            'nombre' => 'LG'
        ]);

        Marca::create([
            'nombre' => 'Xiaomi'
        ]);

    }
}
