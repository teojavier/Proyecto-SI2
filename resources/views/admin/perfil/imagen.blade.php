@extends('layouts.cliente')

@section('title', 'cliente')

@section('content')

    <!-- component -->
    <div>
        
            <div class="px-10 bg-gray-100 grid gap-10 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2">
                @foreach ($productos as $producto)
                <div
                    class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer">
                    <div>
                        <iframe height="250" width="320" scrolling="no" src="{{ $producto->imagen }}"
                            frameBorder="0"></iframe>

                    </div>
                    <div class="py-4 px-4 bg-white">
                        <h3 class="text-md font-semibold text-gray-600">{{ $producto->nombre }} </h3>
                        <h3 class="text-md font-semibold text-gray-600">{{ $producto->descripcion }} </h3>
                        @foreach ($marcas as $marca)
                            @if ($marca->id == $producto->marca_id)
                                <h3 class="text-md font-semibold text-gray-600">{{ $marca->nombre }} </h3>
                            @endif
                        @endforeach
                        <p class="mt-4 text-lg font-thin">{{ $producto->precio }} BS</p>
                        <span
                            class="flex items-center justify-center mt-4 w-full bg-yellow-400 hover:bg-yellow-500 py-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <button class="font-semibold text-gray-800">Add to Basket</button>
                        </span>
                    </div>
                </div>
                @endforeach
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
