@extends('layouts.cliente')

@section('title','cliente')

@section('content')


@endsection


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@livewireStyles
@stop

@section('js')
<script>console.log('hi!')</script>
@livewireScripts
@stop