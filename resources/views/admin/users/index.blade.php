@extends('adminlte::page')

@section('title', 'Dueño')

@section('content_header')

<h1>Lista de Usuarios</h1>
<div class="row">
    <div class="form-group col-md-1">
        <p>Reportes en:   </p>
    </div>

    <div class="form-group col-md-2">
        <a class="btn btn-primary btn-sm float-left" href="{{route('admin.PDF.usuarios')}}">
            <i class="fa fa-download"></i> 
            PDF
        </a>       
    </div>

</div>

@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}}</strong>
        </div>
        @endif

        <div class="card-body">
            <table class="table table-striped" id="users">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>CI</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Tipo</th>

                    </tr>
                </thead> 

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ $user->ci }}</td>
                            <td>{{ $user->direccion }}</td>
                            <td>{{ $user->telefono }}</td>
                            <td>{{ $user->tipo }}</td>

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
     $('#users').DataTable();
    } );
</script>
@stop

