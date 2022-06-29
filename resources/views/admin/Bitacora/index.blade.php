@extends('adminlte::page')

@section('title', 'Bitacora')

@section('content_header')
<h1>Bitacora Dinamica:</h1>

@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}}</strong>
        </div>
        @endif
        
@livewire('bitacora-index')


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@livewireStyles
@stop

@section('js')
<script>console.log('hi!')</script>
@livewireScripts
@stop

