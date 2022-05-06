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

Route::get('',[HomeController::class, 'index'])->name('admin.home');

Route::resource('perfil', PerfilController::class)->names('admin.perfil');

Route::resource('users', UserController::class)->names('admin.users');
Route::resource('productos', ProductoController::class)->names('admin.productos');
Route::resource('categorias', CategoriaController::class)->names('admin.categorias');
Route::resource('marcas', MarcaController::class)->names('admin.marcas');
Route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');
Route::resource('detalle_productos', detalle_productoController::class)->names('admin.detalle_productos');
Route::resource('Bitacora',BitacoraController::class)->names('Bitacora');

//Generar PDF
Route::get('/pdf/usuarios', 'App\Http\Controllers\admin\PDFController@PDFUsuarios')->name('admin.PDF.usuarios');



