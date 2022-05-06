<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Configuration;
use App\Models\Marca;
use App\Models\Promocion;
use App\Models\Proveedor;
use App\Models\Tipo_envio;
use App\Models\Tipo_pago;

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
            'name' => 'Product Owner',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678'),
            'tipo' => 'Administrador'
        ])->assignRole('Admin');

        User::create([
            'name' => 'Takeshi Kanashiro',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('12345678'),
            'tipo' => 'Empleado',
            'direccion' => 'Pampa de la Isla',
            'telefono' => '785958930',
            'ci' => '202020',
            'sueldo' => 2400,
            'cargo' => 'Encargado de Ventas'
        ])->assignRole('Admin');

        User::create([
            'name' => 'Oscar Oros',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('12345678'),
            'direccion' => 'Plan 3k',
            'telefono' => '785222930',
            'ci' => '2028590',
            'tipo' => 'Cliente'
        ])->assignRole('Admin');

        User::create([
            'name' => 'Erick Lopez',
            'email' => 'user4@gmail.com',
            'password' => bcrypt('12345678'),
            'direccion' => 'El Urubo',
            'telefono' => '700008930',
            'ci' => '748520',
            'tipo' => 'Cliente'
        ])->assignRole('Admin');

        
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
        
        Proveedor::create([
            'nombre' => 'Luis Lopez',
            'direccion' => 'La cuchilla',
            'telefono' => '78024256'
        ]);

        Proveedor::create([
            'nombre' => 'Xoca Suarez',
            'direccion' => 'Las Palmas',
            'telefono' => '73024578'
        ]);
         
        Proveedor::create([
            'nombre' => 'Juana Barrios',
            'direccion' => 'El Quior',
            'telefono' => '78036987'
        ]);
        
        Proveedor::create([
            'nombre' => 'Lucas Gutierrez',
            'direccion' => 'Pampa de la Isla',
            'telefono' => '780245398'
        ]);
        
        Proveedor::create([
            'nombre' => 'Luiza Mendoza',
            'direccion' => 'Plan 3000',
            'telefono' => '78235896'
        ]);
        
        Proveedor::create([
            'nombre' => 'Julio Plata',
            'direccion' => 'Guapurú 1',
            'telefono' => '78023612'
        ]);
         
        Proveedor::create([
            'nombre' => 'Eduardo Castillo',
            'direccion' => 'Plan 4000',
            'telefono' => '780146325'
        ]);
 
        Proveedor::create([
            'nombre' => 'David Zeballos',
            'direccion' => '2do anillo',
            'telefono' => '78024269'
        ]);

        Proveedor::create([
            'nombre' => 'Felipe Gonzales',
            'direccion' => '6to anillo',
            'telefono' => '78025214'
        ]);

        Proveedor::create([
            'nombre' => 'Victoria Cruz',
            'direccion' => '4to anillo la feria',
            'telefono' => '78024532'
        ]);

        Proveedor::create([
            'nombre' => 'Antonio Sosa',
            'direccion' => '3er anillo externo',
            'telefono' => '78326111'
        ]);

        Proveedor::create([
            'nombre' => 'Jose Mamani',
            'direccion' => '3er anillo interno',
            'telefono' => '78302651'
        ]);

        Proveedor::create([
            'nombre' => 'Jhon Niuman',
            'direccion' => 'av.pirai',
            'telefono' => '78362489'
        ]);

        Proveedor::create([
            'nombre' => 'Oscar Oros',
            'direccion' => 'Pampa de la isla 6to anillo',
            'telefono' => '78065499'
        ]);

        Tipo_envio::create([
            'nombre' => 'Pedidos YA',
            'descripcion' => 'Delivery de color rojo'
        ]);

        Tipo_envio::create([
            'nombre' => 'Radio Movil Vallegrande',
            'descripcion' => 'radio movil ubicado en el Barrio Villa Warnes'
        ]);

        Tipo_envio::create([
            'nombre' => 'Yaigo',
            'descripcion' => 'Delivery de color lila'
        ]);

        Tipo_pago::create([
            'nombre' => 'Transaccion QR',
            'descripcion' => 'Deposito bancario mediante QR'
        ]);

        Tipo_pago::create([
            'nombre' => 'Al contado',
            'descripcion' => 'Pago en mano, ese preciso momento'
        ]);

        Promocion::create([
            'nombre' => 'Dia del Padre',
            'porcentaje' => 10
        ]);

        Promocion::create([
            'nombre' => 'Dia de la Madre',
            'porcentaje' => 10
        ]);

        Promocion::create([
            'nombre' => 'Dia del niño',
            'porcentaje' => 5
        ]);

        Promocion::create([
            'nombre' => 'Cumpleaños',
            'porcentaje' => 8
        ]);

    }
}
