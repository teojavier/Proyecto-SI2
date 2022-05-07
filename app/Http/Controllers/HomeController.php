<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
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
                return view('cliente.index');
            } else {
                if (auth()->user()->tipo == 'Empleado') {
                    $configuration = Configuration::find(1);
                    return view('admin.index', compact('configuration'));
                }
            }
        }
    }
}
