<div>
    <div class="card">

        <div class="card-header">
            <input type="text" wire:model="search" class="form-control" placeholder="Ingrese el Nombre del producto">

        </div>


        @if($productos->count())
                

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style=" width: 10px;">ID</th>
                        <th style=" width: 50px;">Nombre</th>
                        <th style=" width: 200px;">Descripcion</th>
                        <th style=" width: 100px;">Marca</th>
                        <th style=" width: 100px;">Precio</th>
                        <th style=" width: 100px;">Stock</th>
                        <th style=" width: 100px;">Imagen</th>
                        <th style=" width: 10px;">Operaiones</th>
                    </tr>
                </thead> 

                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>

                            <td>
                                @foreach($marcas as $marca)
                                    @if($producto->marca_id == $marca->id)
                                    {{$marca->nombre}}
                                    @endif
                                @endforeach
                            </td>

                            <td>{{ $producto->precio }} Bs</td>
                            <td>{{ $producto->stock }}</td>

                            <td>
                            <img src="{{$producto->imagen}}" width="100%" class="img-thumbnail center-block"> 
                            </td>

                            <td width="10px">
                                    <a class="btn btn-outline-secondary" href="{{route('admin.productos.show', $producto)}}">
                                        <i class="material-icons fa fa-eye"></i>
                                    </a>

                                    <a class="btn btn-outline-primary" href="{{route('admin.productos.edit', $producto)}}">
                                        <i class="material-icons fa fa-pen"></i>
                                    </a>
                                    
                                    <form action="{{route('admin.productos.show', $producto)}}" method="POST" onsubmit="return confirm('¿Estas seguro de eliminar el Producto:  {{$producto->nombre}} ?')">
                                     @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger my-1" type="" rel="tooltip">
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
            {{$productos->onEachSide(1)->links()}}
        </div>
        @else

            <div class="card-body">
                <strong> No hay Registros</strong>
            </div>

        @endif


    </div>
</div>
