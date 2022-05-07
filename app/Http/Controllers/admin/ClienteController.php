<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.clientes.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clientes.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
            'direccion' => 'required',
            'ci' => 'required',
            'telefono' => 'required',   
        ]);
        $cliente = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'ci' => $request->ci,
            'tipo' => 'Cliente'
        ]);

        return redirect()->route('admin.clientes.index')->with('info', 'El Cliente: '. $cliente->name .' se registro correctamente');


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
        $cliente = User::find($id);
        return view('admin.clientes.edit', compact('cliente'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'direccion' => 'required',
            'ci' => 'required',
            'telefono' => 'required',   
        ]);
        $cliente = User::find($id);
        $data = $request->except('password');
        if (trim($request->password == '')) {
            $data = $request->except('password');
        }else{
             $data = $request->all();
             $data['password'] = bcrypt($request->password);
        }
        $cliente->update($data);
        return redirect()->route('admin.clientes.edit', $cliente->id)->with('info', 'Los datos se editaron correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = User::find($id);
        $cliente->delete();
        return back()->with('info','El Cliente '. $cliente->name .' se ha eliminado correctamente');
    }
}
