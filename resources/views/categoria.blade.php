@extends('layouts.app')

@section('contenido')

<div class="bg-white rounded-2xl shadow-lg p-10 mb-8 text-center">

    <h1 class="text-5xl font-extrabold text-gray-800 mb-3">
        {{ $categoria->nombre }}
    </h1>

    <p class="text-gray-500 text-lg">
        Descubre nuestra colección de {{ strtolower($categoria->nombre) }}
    </p>

</div>

<!-- Categorías -->
<div class="flex justify-center gap-4 mb-10 flex-wrap">


        <a href="/productos"
        class="px-5 py-2 bg-white shadow rounded-lg hover:bg-gray-100 transition">
            Todos
        </a>

    @php
        $categorias = App\Models\Categoria::all();
    @endphp

    @foreach($categorias as $cat)

<a href="/categoria/{{ $cat->id }}"
   class="px-5 py-2 rounded-lg transition
   {{ $cat->id == $categoria->id
        ? 'bg-gray-800 text-white'
        : 'bg-white shadow hover:bg-gray-100' }}">

    {{ $cat->nombre }}

</a>

@endforeach

</div>

<!-- Productos -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

@forelse($productos as $producto)

<div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">

    <img src="{{ asset('storage/'.$producto->imagen) }}"
         class="w-full h-64 object-cover">

    <div class="p-5">

        <h3 class="text-xl font-bold text-gray-800">
            {{ $producto->nombre }}
        </h3>

        <p class="text-gray-500 mt-2">
            {{ $producto->descripcion }}
        </p>

        <div class="mt-4">

            <span class="text-3xl font-bold text-blue-600">
                S/ {{ $producto->precio }}
            </span>

        </div>
        <form class="form-agregar-carrito" data-id="{{ $producto->id }}">
            @csrf

    @if($producto->stock > 0)

        <button
            type="submit"
            class="mt-5 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-bold transition">

            Comprar

        </button>

        <p class="mt-2 text-sm text-green-600 font-semibold">
            Stock disponible: {{ $producto->stock }}
        </p>

    @else

        <button
            type="button"
            disabled
            class="mt-5 w-full bg-gray-400 text-white py-3 rounded-xl font-bold cursor-not-allowed">

            Agotado

        </button>

        <p class="mt-2 text-sm text-red-600 font-semibold">
            Sin stock disponible
        </p>

    @endif

</form>

    </div>

</div>

@empty

<div class="col-span-4">

    <div class="bg-white rounded-2xl shadow-lg p-10 text-center">

        <h2 class="text-2xl font-bold text-gray-700">
            No hay productos en esta categoría
        </h2>

        <p class="text-gray-500 mt-3">
            Pronto agregaremos nuevos productos.
        </p>

    </div>

</div>

@endforelse

</div>

@endsection