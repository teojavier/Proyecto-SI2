@extends('adminlte::page')

@section('title', 'Dueño')

@section('content_header')
<h1 class="text-center">Datos Del Proveedor</h1>
@stop

@section('content')

@if(session('info'))
    <div class="alert alert-success">
        <strong> {{session('info')}}</strong>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p class="h5">ID: </p>
                    <p class="form-control">{{$proveedor->id}}</p>

                    <p class="h5">Nombre: </p>
                    <p class="form-control">{{$proveedor->nombre}}</p>

                    <p class="h5">Direccion: </p>
                    <p class="form-control">{{$proveedor->direccion}}</p>

                    <p class="h5">Telefono: </p>
                    <p class="form-control">{{$proveedor->telefono}}</p>

                </div>
                <div class="form-group col-md-4">
                    <a class="btn btn-danger" href="{{route('admin.proveedores.index')}}">
                        <i class="fa fa-arrow-left"> Atras</i>
                    </a>   
                </div>
            </div>
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
