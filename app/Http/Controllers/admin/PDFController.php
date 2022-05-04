<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function PDFUsuarios(){
        $users = User::all();
        $pdf =\PDF::loadView('admin.PDF.usuarios', compact('users'));
        return $pdf->stream('Reporte de Usuarios.pdf');
    }
}
