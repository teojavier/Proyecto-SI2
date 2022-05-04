@extends('adminlte::page')

@section('title', 'Dueño')

@section('content_header')
<a class="btn btn-success btn-sm float-right" href="{{route('admin.detalle_productos.create')}}">
    <i class="material-icons fa fa-plus"> Nueva compra </i>
</a>
<h1>Lista de Detalles de compra</h1>

@stop

@section('content')

    @if(session('info'))
            <div class="alert alert-success">
                <strong> {{session('info')}}</strong>
            </div>
    @endif

    @livewire('admin.detalle-producto-index')



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@livewireStyles
@stop

@section('js')
<script>console.log('hi!')</script>
@livewireScripts
@stop
