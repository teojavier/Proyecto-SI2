@extends('adminlte::page')

@section('title', 'Dueño')

@section('content_header')
<a class="btn btn-success btn-sm float-right" href="{{route('admin.users.create')}}">
    <i class="material-icons fa fa-plus"> Nuevo Usuario </i>
</a>
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
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td width="10px">
                                    <a class="btn btn-outline-secondary" href="{{route('admin.users.show', $user)}}">
                                        <i class="material-icons fa fa-eye"></i>
                                    </a>
                            </td>

                            <td width="10px">
                                <a class="btn btn-outline-primary" href="{{route('admin.users.edit', $user)}}">
                                    <i class="material-icons fa fa-pen"></i>
                                </a>
                            </td>

                            <td width="10px">
                                <form action="{{ route('admin.users.destroy', $user->id )}}" method="POST" onsubmit="return confirm('¿Estas seguro de eliminar este a {{$user->name}}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="" rel="tooltip">
                                        <i class="material-icons fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>

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

