@php
$carrito = session('carrito', []);
@endphp

@if(count($carrito) > 0)

@foreach($carrito as $item)

<div class="p-4 border-b flex justify-between items-start">

    <div>

        <h3 class="font-bold text-gray-800">
            {{ $item['nombre'] }}
        </h3>

        <p class="text-blue-600">
            S/ {{ number_format($item['precio'],2) }}
        </p>

        <p class="text-sm text-gray-500">
            Cantidad: {{ $item['cantidad'] }}
        </p>

    </div>

        <form action="/carrito/eliminar/{{ $item['id'] }}" method="POST">
            @csrf

            <button
                type="submit"
                class="flex items-center justify-center
                w-7 h-7 rounded-full
                bg-red-100 text-red-500
                hover:bg-red-500 hover:text-white
                transition-all duration-300">

                ✕

            </button>

        </form>

</div>

@endforeach

<div class="mt-6">

    <a href="/carrito"
       class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl">

        Ver Carrito Completo

    </a>

</div>


@else


<p class="text-gray-500">
    No hay productos en el carrito.
</p>

@endif
