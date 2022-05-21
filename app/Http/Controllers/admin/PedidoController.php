<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\detalle_pedido;
use App\Models\Marca;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Promocion;
use App\Models\Tipo_envio;
use App\Models\Tipo_pago;
use App\Models\User;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $clientes = User::all();
        return view('admin.pedidos.index', compact('pedidos', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipopagos = Tipo_pago::all();
        $tipoenvios = Tipo_envio::all();
        $promociones = Promocion::all();
        $clientes = User::all();
        return view('admin.pedidos.create', compact('tipopagos', 'tipoenvios', 'promociones', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required',
            'tipoEnvio_id' => 'required',
            'tipoPago_id' => 'required',
            'cliente_id' => 'required',
        ]);
        $pedido = New Pedido();
        $pedido->direccion = $request->direccion;
        $pedido->tipoEnvio_id = $request->tipoEnvio_id;
        $pedido->tipoPago_id = $request->tipoPago_id;
        $pedido->promocion_id = $request->promocion_id;
        $pedido->cliente_id = $request->cliente_id;
        $pedido->fecha_pedido = now();
        $pedido->estado = 'En espera';
        $pedido->estado_pago = 'Impagado';
        $pedido->save();
        return redirect()->route('admin.pedidos.index')->with('info', 'El Pedido se ha registrado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::where('id', $id)->first();
        $tipopagos = Tipo_pago::all();
        $tipoenvios = Tipo_envio::all();
        $promociones = Promocion::all();
        $clientes = User::all();
        return view('admin.pedidos.edit', compact('tipopagos', 'tipoenvios', 'promociones', 'clientes', 'pedido'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'direccion' => 'required',
            'tipoEnvio_id' => 'required',
            'tipoPago_id' => 'required',
            'cliente_id' => 'required',
        ]);

        $pedido = Pedido::where('id', $id)->first();
        $pedido->cliente_id = $request->cliente_id;
        $pedido->direccion = $request->direccion;
        $pedido->tipoEnvio_id = $request->tipoEnvio_id;
        $pedido->tipoPago_id = $request->tipoPago_id;
        $pedido->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function entregado($id){
        $pedido = Pedido::find($id);
        $pedido->estado = 'Entregado';
        $pedido->save();
        return back()->with('info','Cambio de estado a Entregado');
    }

    public function espera($id){
        $pedido = Pedido::find($id);
        $pedido->estado = 'En espera';
        $pedido->save();
        return back()->with('info','Cambio de estado a En Espera');
    }

    
}
