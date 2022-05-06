<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Configuration;
use App\Models\Marca;
use App\Models\Proveedor;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Configuration::create([
                'razon_social' => 'TiendaSI2',
                'factura' => '123456789',
                'email' => 'tiendaSI2@gmail.com',
                'telefono' => '+951 700000000',
                'direccion' => 'Urbanizacion Secret',
                'responsable' => 'Product Owner'
        ]);
        
        User::create([
            'name' => 'Teo Montalvo',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Takeshi Kanashiro',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Cliente');

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

        Proveedor::create([
            'nombre' => 'Juan Perez',
            'direccion' => 'Los Lotes',
            'telefono' => '745689258'
        ]);

    }
}
