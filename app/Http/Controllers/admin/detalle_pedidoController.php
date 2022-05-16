<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\detalle_pedido;
use App\Models\Marca;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class detalle_pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalles = detalle_pedido::all();
        $productos = Producto::all();
        $pedidos = Pedido::all();
        $clientes = User::all();
        return view('admin.detallePedido.indexGeneral', compact('detalles', 'productos', 'pedidos', 'clientes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalles = detalle_pedido::where('pedido_id', $id)->get();
        $pedido = Pedido::where('id', $id)->first();
        $cliente = User::where('id', $pedido->cliente_id)->first();
        $productos = Producto::all();
        return view('admin.detallePedido.index', compact('detalles', 'cliente', 'pedido', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function indexP($id)
    {
        $pedido = Pedido::where('id', $id)->first();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $productos = Producto::all();
        return view('admin.detallePedido.productos', compact('productos','categorias','marcas','pedido'));
    }

    public function storeP(Request $request, $idproducto){
        $request->validate([
            //'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);
        $pedido = Pedido::where('id',$request->idpedido)->first();
        $producto = Producto::find($idproducto);
        $detalle = new detalle_pedido();
        $detalle->producto_id = $idproducto;
        $detalle->pedido_id = $request->idpedido;
        $detalle->cantidad = $request->cantidad;
        //si la cantidad es mayor al stock
        if($detalle->cantidad > $producto->stock){
            return redirect()->route('admin.detalle_pedidos.indexP', $pedido->id)->with('info2', 'No hay suficiente Stock de: '. $producto->nombre);
        }
        //calcula el precio
        $detalle->precio = $request->cantidad * $producto->precio;
        //descuenta stock de productos
        $producto->stock = $producto->stock - $detalle->cantidad;
        $producto->save();
        $detalle->save();
        return redirect()->route('admin.detalle_pedidos.indexP', $pedido->id)->with('info', 'Producto Agregado correctamente');

    }
}
