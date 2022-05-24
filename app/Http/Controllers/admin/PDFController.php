<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\detalle_pedido;
use App\Models\Factura;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Promocion;
use App\Models\User;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function PDFUsuarios(){
        $users = User::all();
        $date = date('d/m/Y');
        $configuracion = Configuration::find(1);
        $pdf =\PDF::loadView('admin.PDF.usuarios', compact('users', 'configuracion', 'date'));
        return $pdf->download('Reporte de Usuarios.pdf');
    }

    public function PDFClientes(){
        $users = User::all();
        $date = date('d/m/Y');
        $configuracion = Configuration::find(1);
        $pdf =\PDF::loadView('admin.PDF.clientes', compact('users', 'configuracion', 'date'));
        return $pdf->download('Reporte de Clientes.pdf');
    }

    public function PDFEmpleados(){
        $users = User::all();
        $date = date('d/m/Y');
        $configuracion = Configuration::find(1);
        $pdf =\PDF::loadView('admin.PDF.empleados', compact('users', 'configuracion', 'date'));
        return $pdf->download('Reporte de Empleados.pdf');
    }

    public function PDFFactura($id){
        $factura = Factura::find($id);
        $pedido = Pedido::where('id', $factura->pedido_id)->first();
        $verif = $pedido->promocion_id;

        if(is_null($verif)){
            $dato = true;
            $promocion = 0;
        }else{
            $dato = false;
            $promocion = Promocion::where('id', $pedido->promocion_id)->first();
        }
        $detalles = detalle_pedido::where('pedido_id', $pedido->id)->get();
        $productos = Producto::all();
        $clientes = User::all();
        $date = date('d/m/Y');
        $configuracion = Configuration::find(1);
        $pdf =\PDF::loadView('admin.PDF.factura', compact('clientes','dato','promocion', 'productos', 'detalles', 'configuracion', 'date', 'factura', 'pedido'));
        return $pdf->download('Factura.pdf');
    }
}
