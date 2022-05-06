@extends('adminlte::page')

@section('title', 'Configuraciones')

@section('content_header')
    <h1>Configuraciones</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }}</strong>
        </div>
    @endif

    
<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="form-group col-md-4">
                <p class="h5">ID: </p>
                <p class="form-control">{{$configuracion->id}}</p>
            </div>

            <div class="form-group col-md-4">
                <p class="h5">Razon Social: </p>
                <p class="form-control">{{$configuracion->razon_social}}</p>
            </div>

            <div class="form-group col-md-4">
                <p class="h5">Nro de Factura: </p>
                <p class="form-control">{{$configuracion->factura}}</p>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <p class="h5">E-mail: </p>
                <p class="form-control">{{$configuracion->email}}</p>
            </div>

            <div class="form-group col-md-4">
                <p class="h5">Telefono: </p>
                <p class="form-control">{{$configuracion->telefono}}</p>
            </div>

            <div class="form-group col-md-4">
                <p class="h5">Direccion: </p>
                <p class="form-control">{{$configuracion->direccion}}</p>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <p class="h5">Responsable: </p>
                <p class="form-control">{{$configuracion->responsable}}</p>
            </div>


        </div>

        <a class="btn btn-warning" href="{{route('admin.configuracion.edit', 1)}}">
                <i class="fa fa-pen"></i> 
                Editar
        </a>
      
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('hi!')
    </script>
@stop
