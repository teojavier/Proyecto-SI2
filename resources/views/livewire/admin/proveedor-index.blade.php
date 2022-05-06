<div>
    <div class="card">

        <div class="card-header">
            <input type="text" wire:model="search" class="form-control" placeholder="Ingrese el Nombre del Proveedor">

        </div>

        @if($proveedores->count())
                

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 

                <tbody>
                    @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->id }}</td>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>{{ $proveedor->telefono }}</td>

                            <td width="10px">
                                <a class="btn btn-outline-secondary"  href="{{route('admin.proveedores.show', $proveedor->id)}}">
                                            <i class="material-icons fa fa-eye"></i>
                                </a>
                            </td>

                            <td width="10px">
                                    <a class="btn btn-outline-primary" href="{{route('admin.proveedores.edit', $proveedor)}}">
                                        <i class="material-icons fa fa-pen"></i>
                                    </a>
                            </td>    


                            <td width="10px">
                                    <form action="{{route('admin.proveedores.destroy', $proveedor->id)}}" method="POST" onsubmit="return confirm('¿Estas seguro de eliminar la Proveedor:  {{$proveedor->nombre}} ?')">
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

        <div class="card-footer d-flex justify-content-end">
            {{$proveedores->onEachSide(1)->links()}}
        </div>
        @else

            <div class="card-body">
                <strong> No hay Registros</strong>
            </div>

        @endif


    </div>
</div>

