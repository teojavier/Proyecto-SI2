<div>
    <div class="card">

        <div class="card-header">
            <input type="text" wire:model="search" class="form-control" placeholder="Ingrese el Nombre o Correo de un Usuario">

        </div>

        @if($users->count())
                

        <div class="card-body">
            <table class="table table-striped">
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

        <div class="card-footer d-flex justify-content-end">
            {{$users->onEachSide(1)->links()}}
        </div>
        @else

            <div class="card-body">
                <strong> No hay Registros</strong>
            </div>

        @endif


    </div>
</div>
