@extends('adminlte::page')

@section('title', 'Tipo de Pagos')

@section('content_header')
<a class="btn btn-success btn-sm float-right" href="{{route('admin.tipo_pagos.create')}}">
    <i class="material-icons fa fa-plus"> Nuevo Tipo de Pago </i>
</a>
<h1>Lista de Tipos de Pago</h1>

@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}}</strong>
        </div>
        @endif
@livewire('admin.tipo-pago-index')


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@livewireStyles
@stop

@section('js')
<script>console.log('hi!')</script>
@livewireScripts
@stop
