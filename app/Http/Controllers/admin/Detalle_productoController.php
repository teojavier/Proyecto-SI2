<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\detalle_productos;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class Detalle_productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $detalles = detalle_productos::all();
        $proveedor = Proveedor::all();
        $producto = Producto::all();
        return view('admin.detalleProducto.index', compact('detalles', 'proveedor', 'producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('admin.detalleProducto.create', compact('proveedores', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'producto_id' => 'required',
            'proveedor_id' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        $detalle = new detalle_productos();
        $detalle->producto_id = $request->producto_id;
        $detalle->proveedor_id = $request->proveedor_id;
        $detalle->precio = $request->precio;
        $detalle->cantidad = $request->cantidad;
        $detalle->save();

        //Actualizar el stock por la compra de productos

        //busca el producto
        $producto = Producto::where('id', $detalle->producto_id)->first();
        //actualiza el stock del producto


        $producto->stock = $producto->stock + $detalle->cantidad ;
        $producto->save();

        return redirect()->route('admin.detalle_productos.index')->with('info', 'La Compra se ha registrado correctamente');

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
    public function edit($id){
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $detalle = detalle_productos::where('id', $id)->first();
        return view('admin.detalleProducto.edit', compact('detalle', 'productos', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'producto_id' => 'required',
            'proveedor_id' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);
        $detalle = detalle_productos::where('id', $id)->first();
        $detalle->producto_id = $request->producto_id;
        $detalle->proveedor_id = $request->proveedor_id;
        $detalle->precio = $request->precio;
        
        
        
        //buscamos el producto de ese detalle
        $producto = Producto::where('id', $detalle->producto_id)->first();
        
            $producto->stock = $producto->stock - $detalle->cantidad; //quito el viejo
            $producto->stock = $producto->stock + $request->cantidad ; //Añado el nuevo

        $producto->save();
        $detalle->cantidad = $request->cantidad;
        $detalle->save();
        return redirect()->route('admin.detalle_productos.edit', $detalle->id)->with('info', 'Los datos se editaron correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //buscamos y eliminamos el detalle
        $detalle = detalle_productos::where('id', $id)->first();

        $producto = Producto::where('id', $detalle->producto_id)->first();

        $producto->stock = $producto->stock - $detalle->cantidad ;
        if($producto->stock < 1){
            $producto->stock = 0;
        }
        $producto->save();

        $detalle->delete();
        return back()->with('info','El detalle ha sido eliminado correctamente');
    }
}
