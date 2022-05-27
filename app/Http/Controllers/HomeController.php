<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Configuration;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->tipo == 'Administrador') {
            $configuration = Configuration::find(1);
            return view('admin.index', compact('configuration'));
        } else {
            if (auth()->user()->tipo == 'Cliente') {
                $categorias = Categoria::all();
                $productos = Producto::paginate(3);
                $marcas = Marca::all();
                return view('cliente.index', compact('productos', 'marcas', 'categorias'));
            } else {
                if (auth()->user()->tipo == 'Empleado') {
                    $configuration = Configuration::find(1);
                    return view('admin.index', compact('configuration'));
                }
            }
        }
    }
}
