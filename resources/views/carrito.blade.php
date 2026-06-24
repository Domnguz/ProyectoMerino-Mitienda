@extends('layouts.app')

@section('contenido')

<div class="max-w-6xl mx-auto">
    
<div class="text-center mb-10">

    <h1 class="text-5xl font-extrabold text-gray-800 animate-title">
        🛒 Mi Carrito
    </h1>

    <p class="text-gray-500 mt-2">
        Revisa tus productos antes de finalizar la compra
    </p>

</div>

@if(session('error'))

<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-xl mb-6 shadow">

    {{ session('error') }}

</div>

@endif

@if(count($carrito) > 0)

    <div class="grid lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-5">

            @foreach($carrito as $item)

            <div class="producto-card bg-white rounded-2xl shadow-lg p-6 flex justify-between items-center">

                <div>

                    <h3 class="text-xl font-bold text-gray-800">
                        {{ $item['nombre'] }}
                    </h3>

                    <p class="text-blue-600 text-lg font-semibold mt-2">
                        S/ {{ number_format($item['precio'],2) }}
                    </p>

                    <p class="text-gray-500 mt-1">
                        Cantidad: {{ $item['cantidad'] }}
                    </p>

                    <p class="font-bold text-green-600 mt-2">
                        Subtotal:
                        S/ {{ number_format($item['precio'] * $item['cantidad'],2) }}
                    </p>

                </div>

                <form action="/carrito/eliminar/{{ $item['id'] }}" method="POST">

                    @csrf

                    <button
                        class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-xl transition duration-300 transform hover:scale-105">

                        🗑 Eliminar

                    </button>

                </form>

            </div>

            @endforeach

        </div>

        <div>

            @php

            $total = 0;

            foreach($carrito as $item){
                $total += $item['precio'] * $item['cantidad'];
            }

            @endphp

            <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-5">

                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    Resumen del Pedido
                </h2>

                <div class="flex justify-between mb-3">

                    <span>Total</span>

                    <span class="font-bold text-2xl text-blue-600">
                        S/ {{ number_format($total,2) }}
                    </span>

                </div>

                <hr class="my-5">

                @auth

                    <a href="/checkout"
                       class="block text-center bg-green-600 hover:bg-green-700 text-white py-4 rounded-xl font-bold transition duration-300 transform hover:scale-105">

                        Finalizar Compra

                    </a>

                @else

                    <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 p-4 rounded-xl mb-4">

                        ⚠️ Debes iniciar sesión para continuar.

                    </div>

                    <a href="/login"
                       class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold transition duration-300">

                        Iniciar Sesión

                    </a>

                @endauth

            </div>

        </div>

    </div>

@else

    <div class="bg-white rounded-3xl shadow-xl p-16 text-center">

        <div class="text-7xl mb-5">
            🛒
        </div>

        <h2 class="text-3xl font-bold text-gray-700">
            Tu carrito está vacío
        </h2>

        <p class="text-gray-500 mt-3">
            Agrega algunos productos para comenzar.
        </p>

    </div>

@endif

</div>

<style>

.animate-title{
    animation: aparecer 1s ease;
}

.producto-card{
    transition: all .3s ease;
}

.producto-card:hover{
    transform: translateY(-5px);
}

@keyframes aparecer{

    from{
        opacity:0;
        transform:translateY(-20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

</style>

@endsection
