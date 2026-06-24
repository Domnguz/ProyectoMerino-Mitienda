@extends('layouts.app')

@section('contenido')

<h1 class="text-4xl font-bold mb-8">
    Confirmar Pedido
</h1>

@if(count($carrito) > 0)

    <div class="bg-white rounded-xl shadow-lg p-6">

        @php
            $total = 0;
        @endphp

        @foreach($carrito as $item)

            @php
                $subtotal = $item['precio'] * $item['cantidad'];
                $total += $subtotal;
            @endphp

            <div class="border-b py-4">

                <h3 class="font-bold text-lg">
                    {{ $item['nombre'] }}
                </h3>

                <p>
                    Precio: S/ {{ number_format($item['precio'], 2) }}
                </p>

                <p>
                    Cantidad: {{ $item['cantidad'] }}
                </p>

                <p>
                    Subtotal: S/ {{ number_format($subtotal, 2) }}
                </p>

            </div>

        @endforeach

        <div class="mt-6">

            <h2 class="text-2xl font-bold">
                Total: S/ {{ number_format($total, 2) }}
            </h2>

        </div>

        <form action="/checkout" method="POST" class="mt-6">
            @csrf

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-bold px-8 py-3 rounded-xl">

                Confirmar Compra

            </button>

        </form>

    </div>

@else

    <div class="bg-yellow-100 border border-yellow-300 p-4 rounded-xl">
        No hay productos en el carrito.
    </div>

@endif

@endsection