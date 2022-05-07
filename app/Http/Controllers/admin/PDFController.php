<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function PDFUsuarios(){
        $users = User::all();
        $date = date('d/m/Y');
        $configuracion = Configuration::find(1);
        $pdf =\PDF::loadView('admin.PDF.usuarios', compact('users', 'configuracion', 'date'));
        return $pdf->stream('Reporte de Usuarios.pdf');
    }

    public function PDFClientes(){
        $users = User::all();
        $date = date('d/m/Y');
        $configuracion = Configuration::find(1);
        $pdf =\PDF::loadView('admin.PDF.clientes', compact('users', 'configuracion', 'date'));
        return $pdf->stream('Reporte de Clientes.pdf');
    }

    public function PDFEmpleados(){
        $users = User::all();
        $date = date('d/m/Y');
        $configuracion = Configuration::find(1);
        $pdf =\PDF::loadView('admin.PDF.empleados', compact('users', 'configuracion', 'date'));
        return $pdf->stream('Reporte de Empleados.pdf');
    }
}
