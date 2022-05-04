@extends('adminlte::page')

@section('title', 'Dueño')

@section('content_header')
<h1>Editar Producto</h1>
@stop

@section('content')

@if(session('info'))
    <div class="alert alert-success">
        <strong> {{session('info')}}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
            
        {!! Form::model($producto,['route' => ['admin.productos.update', $producto], 'method' => 'put', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}

            <div class="row">
                    <label for="id" class="col-sm-1 col-form-label">ID:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="id" value="{{$producto->id}}" readonly>
                        </div>
            </div>

            <br>

            <div class="row">
                <label for="nombre" class="col-sm-1 col-form-label">Nombre:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombre" value="{{$producto->nombre}}" autofocus>
                        @error('nombre')
                        <strong class="text-danger">{{ $message }}</strong>               
                        @enderror
                    </div>
            </div>



            <br>

            <div class="row">
                <label for="descripcion" class="col-sm-1 col-form-label">Descripcion</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="descripcion" value="{{$producto->descripcion}}" autofocus>
                        @error('descripcion')
                        <strong class="text-danger">{{ $message }}</strong>               
                        @enderror
                    </div>
            </div>



            <br>

            <div class="row">
                            <label for="categoria" class="col-sm-1 col-form-label">Categoria:</label>
                            <div class="col-sm-7">
                                <select name=categoria_id id=categoria_id class="form-control" >
                                        @foreach ($categoria as $busqueda )
                                            @if($busqueda->id == $producto->categoria_id)
                                                <option value="{{$busqueda['id']}}" readonly>{{$busqueda['nombre']}}</option>
                                            @endif
                                        @endforeach

                                    <option value=""> -- Nueva Categoria --</option>

                                    @foreach($categoria as $categorias)
                                    <option value="{{$categorias['id']}}" readonly>{{$categorias['nombre']}}</option>
                                    @endforeach                                    
                                </select>                     
                            </div>
            </div>

            <br>

            <div class="row">
                            <label for="marca" class="col-sm-1 col-form-label">Marca:</label>
                            <div class="col-sm-7">
                                <select name=marca_id id=marca_id class="form-control" >
                                        @foreach ($marca as $datos )
                                            @if($datos->id == $producto->marca_id)
                                            <option value="{{$datos['id']}}" readonly>{{$datos['nombre']}}</option>
                                            @endif
                                        @endforeach

                                    <option value=""> -- Nueva Marca --</option>

                                    @foreach($marca as $marcas)
                                    <option value="{{$marcas['id']}}" readonly>{{$marcas['nombre']}}</option>
                                    @endforeach                                    
                                </select>                     
                            </div>
            </div>

            <br>

            <div class="row">
                <label for="precio" class="col-sm-1 col-form-label">Precio:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="precio" value="{{$producto->precio}}" autofocus>
                        @error('precio')
                        <strong class="text-danger">{{ $message }}</strong>               
                        @enderror
                    </div>
            </div>



            <br>

            <div class="row">
                <label for="stock" class="col-sm-1 col-form-label">stock:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="stock" value="{{$producto->stock}}" autofocus>
                        @error('stock')
                        <strong class="text-danger">{{ $message }}</strong>               
                        @enderror
                    </div>
            </div>

            <br>

            <div class="row">
                <label for="ima" class="col-sm-1 col-form-label">Imagen:</label>

                    <div class="col-sm-7">
                        <img src="{{$producto->imagen}}" width="50%" class="img-thumbnail center-block"> 

                        <br>
                        <br>

                        {!! Form::file('imagen',null,['class' => 'form-control']) !!}


                    </div>
            </div>


            <br>

            
            <button class="btn btn-primary" type="submit" rel="tooltip">
                <i class="material-icons fa fa-save"> Guardar</i>
            </button>
        {!! Form::close() !!}

        <br>
        <div class="form-group">
            <a class="btn btn-danger" href="{{route('admin.productos.index')}}">
                <i class="fa fa-arrow-left"> Atras</i>
            </a>   
        </div>
    </div>    
</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@livewireStyles
@stop

@section('js')
<script>console.log('hi!')</script>
@livewireScripts
@stop
