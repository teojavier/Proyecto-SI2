@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
<a class="btn btn-success btn-sm float-right" href="{{route('admin.categorias.create')}}">
    <i class="material-icons fa fa-plus"> Nueva Categoria </i>
</a>
<h1>Lista de Categorias</h1>

@stop

@section('content')

    @if(session('info'))
            <div class="alert alert-success">
                <strong> {{session('info')}}</strong>
            </div>
    @endif

@livewire('admin.categoria-index')



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@livewireStyles
@stop

@section('js')
<script>console.log('hi!')</script>
@livewireScripts
@stop