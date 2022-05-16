@extends('adminlte::page')

@section('title', 'Dueño')

@section('content_header')
    <a class="btn btn-danger float-left" href="{{ route('admin.pedidos.index') }}">
        <i class="fa fa-arrow-left"> Atras</i>
    </a>
    <br>
    <br>
    <h1 class="float-left">
        <strong>Detalle de todos los Pedidos:</strong>
    </h1>


@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }}</strong>
        </div>
    @endif
    <br>
    <div class="card-body">
        <table class="table table-striped" id="detalle">
            <thead>
                <tr>
                    <th>Pedido</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Precio Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($detalles as $detalle)
                    <tr>
                        <td>{{ $detalle->pedido_id }}</td>
                        @foreach ($pedidos as $pedido)
                            @if ($detalle->pedido_id == $pedido->id)
                                @foreach ($clientes as $cliente)
                                    @if ($cliente->id == $pedido->cliente_id)
                                        <td>{{$cliente->name}}</td>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @foreach ($productos as $producto)
                            @if ($producto->id == $detalle->producto_id)
                                <td>{{ $producto->nombre }}</td>
                            @endif
                        @endforeach

                        @foreach ($productos as $producto)
                            @if ($producto->id == $detalle->producto_id)
                                <td>{{ $producto->precio }}</td>
                            @endif
                        @endforeach
                        <td>{{ $detalle->cantidad }}</td>
                        <td>{{ $detalle->precio }}</td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#detalle').DataTable();
        });
    </script>
    <script>
        console.log('hi!')
    </script>
@stop
