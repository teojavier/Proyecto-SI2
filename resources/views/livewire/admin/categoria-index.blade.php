<div>
    <div class="card">

        <div class="card-header">
            <input type="text" wire:model="search" class="form-control" placeholder="Ingrese el Nombre de la Categoria">

        </div>

        @if($categorias->count())
                

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 

                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>


                            <td width="10px">
                                    <a class="btn btn-outline-primary" href="{{route('admin.categorias.edit', $categoria)}}">
                                        <i class="material-icons fa fa-pen"></i>
                                    </a>
                            </td>    

                            <td width="10px">
                                    <form action="{{route('admin.categorias.destroy', $categoria)}}" method="POST" onsubmit="return confirm('¿Estas seguro de eliminar la Categoria:  {{$categoria->nombre}} ?')">
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
            {{$categorias->onEachSide(1)->links()}}
        </div>
        @else

            <div class="card-body">
                <strong> No hay Registros</strong>
            </div>

        @endif


    </div>
</div>
