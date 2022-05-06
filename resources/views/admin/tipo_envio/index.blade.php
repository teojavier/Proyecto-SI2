@extends('adminlte::page')

@section('title', 'Tipo de Envios')

@section('content_header')
<a class="btn btn-success btn-sm float-right" href="{{route('admin.tipo_envios.create')}}">
    <i class="material-icons fa fa-plus"> Nuevo Tipo de Envio </i>
</a>
<h1>Lista de Tipos de Envio</h1>

@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}}</strong>
        </div>
        @endif
@livewire('admin.tipo-envio-index')


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@livewireStyles
@stop

@section('js')
<script>console.log('hi!')</script>
@livewireScripts
@stop
