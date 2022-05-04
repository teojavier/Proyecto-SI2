<div>
    <div class="card">

        <div class="card-header">
            <input type="text" wire:model="search" class="form-control"
                placeholder="Ingrese el Nombre del proveedor o producto">

        </div>

        @if ($detalles->count())


            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Proveedor</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->id }}</td>

                                @foreach ($proveedor as $prov)
                                    @if ($prov->id == $detalle->proveedor_id)
                                        <td>{{ $prov->nombre }}</td>
                                    @endif
                                @endforeach

                                @foreach ($producto as $prod)
                                    @if ($prod->id == $detalle->producto_id)
                                        <td>{{ $prod->nombre }}</td>
                                    @endif
                                @endforeach

                                <td>{{ $detalle->cantidad }}</td>
                                <td>{{ $detalle->precio }}</td>

                                <td width="10px">
                                    <a class="btn btn-outline-primary"
                                        href="{{ route('admin.detalle_productos.edit', $detalle) }}">
                                        <i class="material-icons fa fa-pen"></i>
                                    </a>
                                </td>

                                <td width="10px">
                                    <form action="{{ route('admin.detalle_productos.destroy', $detalle) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Estas seguro de eliminar la detalle de compra:  {{ $detalle->id }} ?')">
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
                {{ $detalles->onEachSide(1)->links() }}
            </div>
        @else
            <div class="card-body">
                <strong> No hay Registros</strong>
            </div>

        @endif


    </div>
</div>
