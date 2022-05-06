<?php

use App\Http\Controllers\admin\BitacoraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\PerfilController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductoController;
use App\Http\Controllers\admin\CategoriaController;
use App\Http\Controllers\admin\MarcaController;
use App\Http\Controllers\admin\ProveedorController;
use App\Http\Controllers\admin\detalle_productoController;
use App\Http\Controllers\admin\PedidoController;
use App\Http\Controllers\admin\FacturaController;
use App\Http\Controllers\admin\Tipo_envioController;
use App\Http\Controllers\admin\Tipo_PagoController;
use App\Http\Controllers\admin\ConfiguracionController;
use App\Http\Controllers\admin\PromocionController;

Route::get('',[HomeController::class, 'index'])->name('admin.home');

Route::resource('perfil', PerfilController::class)->names('admin.perfil');

Route::resource('users', UserController::class)->names('admin.users');
Route::resource('productos', ProductoController::class)->names('admin.productos');
Route::resource('categorias', CategoriaController::class)->names('admin.categorias');
Route::resource('marcas', MarcaController::class)->names('admin.marcas');
Route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');
Route::resource('detalle_productos', detalle_productoController::class)->names('admin.detalle_productos');
Route::resource('configuracion', ConfiguracionController::class)->names('admin.configuracion');
Route::resource('tipo_envios', Tipo_envioController::class)->names('admin.tipo_envios');
Route::resource('tipo_pagos', Tipo_PagoController::class)->names('admin.tipo_pagos');
Route::resource('Bitacora',BitacoraController::class)->names('Bitacora');

//falta
Route::resource('pedidos', PedidoController::class)->names('admin.pedidos');
Route::resource('facturas', FacturaController::class)->names('admin.facturas');
Route::resource('promociones', PromocionController::class)->names('admin.promociones');


//Generar PDF
Route::get('/pdf/usuarios', 'App\Http\Controllers\admin\PDFController@PDFUsuarios')->name('admin.PDF.usuarios');



