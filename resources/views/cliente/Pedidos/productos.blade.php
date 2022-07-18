@extends('layouts.cliente')

@section('title', 'Elegir Productos')

@section('content')

    <div>
        <div class="flex">
            <!-- aside -->
            <aside class="flex w-72 flex-col space-y-2 border-r-2 border-black bg-white p-2" style="height: 90.5vh"
                x-show="asideOpen">
                <p class="my-5 text-center font-semibold text-3xl text-black font-sans ">Pedido {{ $pedido->id }}</p>
                <p class="my-5 text-center font-semibold text-3xl text-black font-sans ">Categorias</p>

                @foreach ($categorias as $categoria)
                    <a href="{{ route('cliente.pedidos.indexCategoria', [$categoria->id,  $pedido->id] ) }}" class="">
                        <span
                            class="flex items-center justify-center mt-4 w-full bg-red-400 hover:bg-red-600 hover:text-white py-1 rounded transform transition duration-100 hover:scale-105">{{ $categoria->nombre }}</span>
                    </a>
                @endforeach
            </aside>

            <!-- Los productos -->
            <div class="w-full p-4">
                <div class="px-10 py-10 bg-white grid gap-10 lg:grid-cols-3 xl:grid-cols-3 sm:grid-cols-2">

                    @if ($productos->count())
                        @foreach ($productos as $producto)
                            <div
                                class="max-w-xs  rounded-lg overflow-hidden border-gray-400 hover:border-gray-800 bg-white border-4 cursor-pointer">
                                <div>
                                    <iframe height="250" width="320" scrolling="no" src="{{ $producto->imagen }}"
                                        frameBorder="0"></iframe>

                                </div>
                                <div class="py-4 px-4 bg-white">
                                    <h3 class="text-md font-semibold text-gray-600">
                                        <strong>Producto:</strong>
                                        {{ $producto->nombre }}
                                    </h3>
                                    <h3 class="my-2 text-md font-semibold text-gray-600">
                                        <strong>Descripcion:</strong>
                                        {{ $producto->descripcion }}
                                    </h3>
                                    @foreach ($marcas as $marca)
                                        @if ($marca->id == $producto->marca_id)
                                            <h3 class="my-2 text-md font-semibold text-gray-600">
                                                <strong>Marca:</strong>
                                                {{ $marca->nombre }}
                                            </h3>
                                        @endif
                                    @endforeach
                                    <h3 class="my-2 text-md font-semibold text-gray-600">
                                        <strong>Disponible:</strong>
                                        {{ $producto->stock }}
                                    </h3>

                                    {!! Form::open(['route' => ['cliente.pedidos.storeP', $producto->id], 'autocomplete' => 'off']) !!}
                                    <input style=" width: 50px;" type="text" class="form-control" name="idpedido" id="idpedido"
                                    value="{{ $pedido->id }}" readonly>
                                    <br>
                                    <input type="text"
                                        class="border-gray-400 border-2 rounded-md text-center hover:bg-gray-200"
                                        name="cantidad" id="cantidad" placeholder=" -- Cantidad --" autofocus>
                                        <br>
                                    @error('cantidad')
                                        <strong class="text-red-600">{{ $message }}</strong>
                                    @enderror
                                    <p class="text-right text-2xl font-thin">{{ $producto->precio }} BS</p>

                                    <span
                                        class="flex items-center justify-center mt-4 w-full bg-yellow-400 hover:bg-yellow-500 py-1 rounded transform transition duration-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <button class="font-semibold text-gray-800 ">Add to Basket</button>
                                    </span>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endforeach
                </div>

                {{ $productos->onEachSide(1)->links() }}
            @else
                <div class="card-body">
                    <strong> No hay Productos</strong>
                </div>

                @endif

            </div>
        </div>

    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles
@stop

@section('js')
    <script>
        console.log('hi!')
    </script>
    @livewireScripts
@stop
